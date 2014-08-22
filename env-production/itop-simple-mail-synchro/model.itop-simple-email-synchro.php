<?php
// Copyright (C) 2010-2012 Combodo SARL
//
//   This program is free software; you can redistribute it and/or modify
//   it under the terms of the GNU General Public License as published by
//   the Free Software Foundation; version 3 of the License.
//
//   This program is distributed in the hope that it will be useful,
//   but WITHOUT ANY WARRANTY; without even the implied warranty of
//   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//   GNU General Public License for more details.
//
//   You should have received a copy of the GNU General Public License
//   along with this program; if not, write to the Free Software
//   Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA


/**
 * Module itop-simple-email-synchro: Creation of User request tickets from emails
 *
 * @author      Erwan Taloc <erwan.taloc@combodo.com>
 * @author      Romain Quetiez <romain.quetiez@combodo.com>
 * @author      Denis Flaven <denis.flaven@combodo.com>
 * @license     http://www.opensource.org/licenses/gpl-3.0.html GPL
 */


class iTopSimpleEmailProcessor extends EmailProcessor
{
	protected $bDebug;
	protected $aExcludeAttachments;
	protected $aDefaultValues;
	protected $sProtocol;
	protected $bCreateOnly;
	protected $sTicketClass;
	
	/**
	 * Construct a new EmailProcessor... some initialization, reading configuration parameters
	 */
	public function __construct()
	{
		$sModuleName = 'itop-simple-email-synchro';
		$this->bDebug = MetaModel::GetModuleSetting($sModuleName, 'debug', false);
		$this->aExcludeAttachments = MetaModel::GetModuleSetting($sModuleName, 'exclude_attachment_types', array());
		$this->aDefaultValues = MetaModel::GetModuleSetting($sModuleName, 'default_values', array());		
		$this->sProtocol = MetaModel::GetModuleSetting($sModuleName, 'protocol', 'IMAP');
		// Pattern to search for in the mail's "subject" to check if the mail is associated to a specific ticket	
		$this->sTitlePattern = MetaModel::GetModuleSetting($sModuleName, 'title_pattern', '/R-([0-9]+)/');		
		// Set create_only to true to disable the update of existing tickets
		$this->bCreateOnly = (bool) MetaModel::GetModuleSetting($sModuleName, 'create_only', false);
		// Class of tickets to create, you'd better put a valid class name here...
		$this->sTicketClass = MetaModel::GetModuleSetting($sModuleName, 'ticket_class', 'UserRequest');	
	}
	
	/**
	 * Outputs some debug text if debugging is enabled from the configuration
	 * @param string $sText The text to output
	 * @return void
	 */
	protected function Trace($sText)
	{
		if ($this->bDebug)
		{
			echo $sText."\n";
		}
	}
	/**
	 * Initializes the email sources... in our case: just one POP3 mailbox
	 * @param void
	 * @return array An array of EmailSource objects
	 */
	public function ListEmailSources()
	{
		$sServer = MetaModel::GetModuleSetting('itop-simple-email-synchro', 'mail_server', '');
		$sLogin = MetaModel::GetModuleSetting('itop-simple-email-synchro', 'login', '');
		$sPwd = MetaModel::GetModuleSetting('itop-simple-email-synchro', 'pwd', '');
		$iPort = MetaModel::GetModuleSetting('itop-simple-email-synchro', 'port', 110);
		$sBodyPartsOrder = MetaModel::GetModuleSetting('itop-simple-email-synchro', 'parts_order', 'text/plain,text/html');		
		
		$aSources = array();
		try
		{
			switch(strtolower($this->sProtocol))
			{
				case 'imap':
				$aImapOptions = MetaModel::GetModuleSetting('itop-simple-email-synchro', 'imap_options', array('pop3'));
				$sMailbox = MetaModel::GetModuleSetting('itop-simple-email-synchro', 'mailbox', '');
				$this->Trace("Protocol: {$this->sProtocol} Mail server: $sServer, port: $iPort, login: $sLogin, password: $sPwd, mailbox: $sMailbox, options: /".implode('/', $aImapOptions));
				$oSource = new IMAPEmailSource($sServer, $iPort, $sLogin, $sPwd, $sMailbox, $aImapOptions);
				break;

				case 'pop3':
				$sPop3AuthOption = MetaModel::GetModuleSetting('itop-simple-email-synchro', 'pop3_auth_option', 'USER');
				$this->Trace("Protocol: {$this->sProtocol} Mail server: $sServer, port: $iPort, login: $sLogin, password: $sPwd, auth_option: $sPop3AuthOption");
				$oSource = new POP3EmailSource($sServer, $iPort, $sLogin, $sPwd, $sPop3AuthOption);
				break;
				
				default:
				$this->Trace("Error: unsupported protocol: {$this->sProtocol} - please use one of: pop3, imap.");	
			}
			$oSource->SetPartsOrder($sBodyPartsOrder); // in which order to decode the message's body
			$aSources[] = $oSource;
		}
		catch(Exception $e)
		{
			$this->Trace("Failed to initialize the mailbox: $sLogin, the mailbox will not be polled. Reason (".$e->getMessage().")");
		}

		return $aSources;
	}
	
	/**
	 * Decides whether a message should be downloaded and processed, deleted, or simply ignored
	 * (i.e left as-is in the mailbox)
	 */
	public function DispatchMessage(EmailSource $oSource, $index, $sUIDL, $oEmailReplica = null)
	{
		$this->Trace("iTop Simple Email Synchro: dispatch of the message $index ($sUIDL)");
		$iRetCode = EmailProcessor::NO_ACTION; // By default, do nothing on this message
		$sRetCode = 'NO_ACTION';
		if ($oEmailReplica == null)
		{
			// New (unread) message
			$this->Trace("The message is new (unread).");
			$iRetCode = EmailProcessor::PROCESS_MESSAGE;
			$sRetCode = 'PROCESS_MESSAGE';
		}
		else
		{
			$iTicketId = $oEmailReplica->Get('ticket_id');
			$oTicket = MetaModel::GetObject('Ticket', $iTicketId, false /* => may not exist anymore */);
			if (is_object($oTicket))
			{
				if ($oTicket->Get('status') == 'closed')
				{
					// The ticket was closed, delete the email (and the replica)
					$this->Trace("The ticket ($iTicketId) corresponding to the message is already closed.");
					$iRetCode = EmailProcessor::DELETE_MESSAGE;
					$sRetCode = 'DELETE_MESSAGE';
				}
				else
				{
					$this->Trace("The ticket ($iTicketId) corresponding to the message exists and is NOT closed.");
				}
			}
			else
			{
				// The ticket was deleted, delete the email (and the replica) as well
				$this->Trace("The ticket ($iTicketId) corresponding to the message no longer exists.");
				$iRetCode = EmailProcessor::DELETE_MESSAGE;
				$sRetCode = 'DELETE_MESSAGE';
			}
		}
		$this->Trace("iTop Simple Email Synchro: dispatch of the message $index ($sUIDL) returned $iRetCode ($sRetCode)");
		return $iRetCode;
	}

	/**
	 * Process the email downloaded from the mailbox.
	 * This implementation creates a UserRequest ticket for each new email.
	 * The caller (identified by its email) must already exists in the database
	 * @param EmailSource $oSource The source from which the email was read
	 * @param integer $index The index of the message in the mailbox
	 * @param EmailMessage $oEmail The downloaded/decoded email message
	 * @param EmailReplica $oEmailReplica The information associating a ticket to the email. Null for new emails
	 */
	public function ProcessMessage(EmailSource $oSource, $index, EmailMessage $oEmail, $oEmailReplica = null)
	{
		$this->Trace("iTop Simple Email Synchro: Processing message $index ({$oEmail->sUIDL})");
		if ($oEmailReplica == null)
		{
			$sContactQuery = 'SELECT Contact WHERE email = :email';
			$oSet = new DBObjectSet(DBObjectSearch::FromOQL($sContactQuery), array(), array('email' => $oEmail->sCallerEmail));
			$sAdditionalDescription = '';
			switch($oSet->Count())
			{
				case 1:
				// Ok, the caller was found in iTop
				$oCaller = $oSet->Fetch();
				break;
				
				case 0:
				// Here decide what to do ? Create a new user, assign the ticket to a 'fixed' Unknown Caller, reject the ticket...
				// For now: let's do nothing, just ignore the ticket, it will be processed again later... in case the caller gets created
				$this->Trace('No contact found for the email address ('.$oEmail->sCallerEmail.'), the ticket will NOT be created');
				return EmailProcessor::NO_ACTION;
				break;
				
				default:
				$this->Trace('Found '.$oSet->Count().' callers with the same email address ('.$oEmail->sCallerEmail.'), the first one will be used...');
				// Multiple callers with the same email address !!!
			 	$sAdditionalDescription = "Warning:\nThere are ".$oSet->Count()." callers with the same email address (".$oEmail->sCallerEmail.") ";
				$sAdditionalDescription = ".\nThe ticket was assigned to the first one found (at random).\n\n";
				$oCaller = $oSet->Fetch();
			}
			// Check whether we need to create a new ticket or to update an existing one
			// First check if there are any iTop object mentioned in the headers of the eMail
			$oTicket = $oEmail->oRelatedObject;
			
			if (($oTicket != null) && !($oTicket instanceof Ticket))
			{
				// The object referenced by the email is not a ticket !!
				// => Forward the message and delete the ticket ??
				$this->Trace("iTop Simple Email Synchro: WARNING the message $index ({$oEmail->sUIDL}) contains a reference to a valid iTop object that is NOT a ticket !");
				$oTicket = null;
			}
			
			if ($oTicket == null)
			{
				// No associated ticket found by parsing the headers, check
				// if the subject does not match a specific pattern
				if(preg_match($this->sTitlePattern, $oEmail->sSubject, $aMatches))
				{
					$iTicketId = 0;
					sscanf($aMatches[1], '%d', $iTicketId);
					$this->Trace("iTop Simple Email Synchro: Retrieving ticket ".$iTicketId." (match by subject pattern)...");
					$oTicket = MetaModel::GetObject('Ticket', $iTicketId, false);
				}
			}
			
			if ($this->bCreateOnly || !is_object($oTicket))
			{
				// No ticket associated with the incoming email, let's create a new ticket
				$oTicket = $this->CreateTicketFromEmail($oEmail, $oCaller);
			}
			else
			{
				// Update the ticket with the incoming eMail
				$this->UpdateTicketFromEmail($oTicket, $oEmail, $oCaller);
			}
			// Create a replica to keep track that we've processed this email
			$oEmailReplica = new EmailReplica();
			$oEmailReplica->Set('uidl', $oEmail->sUIDL);	
			$oEmailReplica->Set('message_id', $oEmail->sMessageId);
			$oEmailReplica->Set('ticket_id', $oTicket->GetKey());
			$oEmailReplica->DBInsert();			
		}
		$this->Trace("iTop Simple Email Synchro: End of processing of the new message $index ({$oEmail->sUIDL}) retCode: NO_ACTION");
		return EmailProcessor::NO_ACTION;	
	}
	
	public function OnDecodeError(EmailSource $oSource, $index, EmailMessage $oEmail)
	{
		
	}

	/**
	 * Create a ticket from the incoming Email and for the given caller and save it
	 * @param EmailMessage $oEmail
	 * @param Contact $oCaller
	 * @return Ticket The newly created ticket (inserted in the database)
	 */
	protected function CreateTicketFromEmail(EmailMessage $oEmail, Contact $oCaller)
	{
		if (!MetaModel::IsValidClass($this->sTicketClass))
		{
			throw new Exception('Invalid "ticket_class" configured: "'.$this->sTicketClass.'" is not a valid class. Cannot create such an object.');
		}
		$oTicket = MetaModel::NewObject($this->sTicketClass);
		$oTicket->Set('org_id', $oCaller->Get('org_id'));
		$oTicket->Set('caller_id', $oCaller->GetKey());
		if (MetaModel::IsValidAttCode(get_class($oTicket), 'origin'))
		{
			$oTicket->Set('origin', 'mail');
		}
		if ($oEmail->sSubject == '')
		{
			$oTicket->Set('title', 'No subject');
		}
		else
		{
			$oTicket->Set('title', $oEmail->sSubject);
		}
		$this->Trace("Email body format: ".$oEmail->sBodyFormat);
		if ($oEmail->sBodyFormat == 'text/html')
		{
			$this->Trace("Removing HTML tags...");
			$sBodyText = $oEmail->StripTags();
		}
		else
		{
			$sBodyText = $oEmail->sBodyText;
		}
		$sTicketDescription = $sBodyText;
		if (empty($sTicketDescription))
		{
			$sTicketDescription = 'No description provided.';
		}
		$oTicket->Set('description', $sTicketDescription);
		
		foreach($this->aDefaultValues as $sAttCode => $value)
		{
			$this->InitFromDefaultValue($oTicket, $sAttCode, $value);
		}
		
		// Creating a CMDBChange is no longer needed in 2.0, but let's keep doing it for compatibility with 1.x
		$oMyChange = MetaModel::NewObject("CMDBChange");
		$oMyChange->Set("date", time());
		$sUserString = CMDBChange::GetCurrentUserName();
		$oMyChange->Set("userinfo", $sUserString);
		$iChangeId = $oMyChange->DBInsert();
		$oTicket->DBInsertTracked($oMyChange);
		
		// Process attachments
		$this->AddAttachments($oTicket, $oEmail, $oMyChange);
		
		return $oTicket;
	}
	
	/**
	 * Update a ticket from the incoming Email and for the given caller and save it
	 * @param Ticket $oTicket
	 * @param EmailMessage $oEmail
	 * @param Contact $oCaller
	 * @return Ticket The updated ticket (updated in the database)
	 */
	protected function UpdateTicketFromEmail(Ticket $oTicket, EmailMessage $oEmail, Contact $oCaller)
	{
		// Try to extract what's new from the message's body
		$this->Trace("iTop Simple Email Synchro: Updating the iTop ticket ".$oTicket->GetName()."...");

		$this->Trace("Email body format: ".$oEmail->sBodyFormat);
		if ($oEmail->sBodyFormat == 'text/html')
		{
			$this->Trace("Extracting the new part and removing HTML tags...");
			$sBodyText = $oEmail->StripTags($oEmail->GetNewPart());
		}
		else
		{
			$this->Trace("Extracting the new part...");
			$sBodyText = $oEmail->GetNewPart();
		}
		// Write the log on behalf of the caller
		$sCallerName = $oEmail->sCallerName;
		if (empty($sCallerName))
		{
			$sCallerName = $oEmail->sCallerEmail;
		}
		$oLog = $oTicket->Get('public_log');
		$oLog->AddLogEntry($sBodyText, $sCallerName);
		$oTicket->Set('public_log', $oLog);

		// Creating a CMDBChange is no longer needed in 2.0, but let's keep doing it for compatibility with 1.x
		$oMyChange = MetaModel::NewObject("CMDBChange");
		$oMyChange->Set("date", time());
		$sUserString = CMDBChange::GetCurrentUserName();
		$oMyChange->Set("userinfo", $sUserString);
		$oMyChange->DBInsert();
		$oTicket->DBUpdateTracked($oMyChange);			
		$this->Trace("Ticket ".$oTicket->GetName()." updated.");
					
		// Process attachments
		$this->AddAttachments($oTicket, $oEmail, $oMyChange);
		
		// If there are any TriggerOnMailUpdate defined, let's activcate them
		//
		$aClasses = MetaModel::EnumParentClasses(get_class($oTicket), ENUM_PARENT_CLASSES_ALL);
		$sClassList = implode(", ", CMDBSource::Quote($aClasses));
		$oSet = new DBObjectSet(DBObjectSearch::FromOQL("SELECT TriggerOnMailUpdate AS t WHERE t.target_class IN ($sClassList)"));
		while ($oTrigger = $oSet->Fetch())
		{
			$oTrigger->DoActivate($oTicket->ToArgs('this'));
		}
						
		return $oTicket;
	}
	
	/**
	 * 
	 * Add the eMail's attachments to the Ticket
	 * @param Ticket $oTicket
	 * @param EmailMessage $oEmail
	 * @param CMDBChange $oMyCHange The current change used to record the modifications (for iTop 1.x compatibility)
	 * @param bool $bNoDuplicates If true, don't add attachment that seem already attached to the ticket (same type, same name, same size, same md5 checksum)
	 * @return void
	 */
	protected function AddAttachments(Ticket $oTicket, EmailMessage $oEmail, CMDBChange $oMyChange, $bNoDuplicates = true)
	{
		// Process attachments (if any)
		$aPreviousAttachments = array();
		if ($bNoDuplicates)
		{
			$sOQL = "SELECT Attachment WHERE item_class = :class AND item_id = :id";
			$oAttachments = new DBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array('class' => get_class($oTicket), 'id' => $oTicket->GetKey()));
			while($oPrevAttachment = $oAttachments->Fetch())
			{
				$oDoc = $oPrevAttachment->Get('contents');
				$data = $oDoc->GetData();
				$aPreviousAttachments[] = array(
					'filename' => $oDoc->GetFileName(),
					'mimeType' => $oDoc->GetMimeType(),
					'size' => strlen($data),
					'md5' => md5($data),
				);
			}
		}
		foreach($oEmail->aAttachments as $aAttachment)
		{
			$bIgnoreAttachment =false;
			// First check if the type is allowed as an attachment...
			if (!in_array($aAttachment['mimeType'], $this->aExcludeAttachments))
			{
				if ($bNoDuplicates)
				{
					// Check if an attachment with the same name/type/size/md5 already exists
					$iSize = strlen($aAttachment['content']);
					$sMd5 = md5($aAttachment['content']);
					foreach($aPreviousAttachments as $aPrevious)
					{
						if (($aAttachment['filename'] == $aPrevious['filename']) &&
						    ($aAttachment['mimeType'] == $aPrevious['mimeType']) &&
						    ($iSize == $aPrevious['size']) &&
						    ($sMd5 == $aPrevious['md5']) )
						{
							// Skip this attachment
							$this->Trace("Info: Attachment {$aAttachment['filename']} skipped, already attached to the ticket.");
							$bIgnoreAttachment = true;
							break;
						}
						
						// Remember this attachment to avoid adding it twice (in case it is contained two times in the message)
						$aPreviousAttachments[] = array(
							'filename' => $aAttachment['filename'],
							'mimeType' => $aAttachment['mimeType'],
							'size' => $iSize,
							'md5' => $sMd5,
						);
					}
				}
				if ($this->ContainsViruses($aAttachment))
				{
					// Skip this attachment
					$this->Trace("Info: Attachment {$aAttachment['filename']} is reported as containing a virus, skipped.");
					$bIgnoreAttachment = true;
				}
				if (!$bIgnoreAttachment)
				{
					$oAttachment = new Attachment;
					$oAttachment->Set('item_class', get_class($oTicket));
					$oAttachment->Set('item_id', $oTicket->GetKey());
					$oBlob = new ormDocument($aAttachment['content'], $aAttachment['mimeType'], $aAttachment['filename']);
					$oAttachment->Set('contents', $oBlob);
					$oAttachment->DBInsert();
					$oMyChangeOp = MetaModel::NewObject("CMDBChangeOpPlugin");
					$oMyChangeOp->Set("change", $oMyChange->GetKey());
					$oMyChangeOp->Set("objclass", get_class($oTicket));
					$oMyChangeOp->Set("objkey", $oTicket->GetKey());
					$oMyChangeOp->Set("description", Dict::Format('Attachments:History_File_Added', $aAttachment['filename']));
					$iId = $oMyChangeOp->DBInsertNoReload();
					$this->Trace("Info: Attachment {$aAttachment['filename']} added to the ticket.");
				}
			}
			else
			{
				$this->Trace("Info: The attachment {$aAttachment['filename']} was NOT added to the ticket because its type '{$aAttachment['mimeType']}' is excluded according to the configuration");
			}
		}
	}
	
	/**
	 * Check if the supplied attachment contains a virus
	 * @param hash $aAttachment
	 * @return bool True if the attachment contains a virus (and should be attached to the ticket), false otherwise
	 */
	protected function ContainsViruses($aAttachment)
	{
		// TODO: Scan with an antivirus before uploading to iTop ??
		// Not implemented, depends on your antivirus solution...
		$bResult = false;
		
		/*
		// Below is an untested example of such a check, using Clan AntiVirus and the php-clamv extension
		// (http://www.clamav.net/lang/en/ and http://php-clamav.sourceforge.net/)
		if (function_exists('cl_scanfile'))
		{
			// Save the attachment to a temporary file
			require_once(APPROOT.'setup/setuputils.class.inc.php');
			$sTempFile = tempnam(SetupUtils::GetTmpDir(), 'clamav-');
			@file_put_contents($sTempFile, $aAttachment['data']);
			
			// Scan the file
			$retcode = cl_scanfile($sTempFile, $sVirusName);
			if ($retcode == CL_VIRUS)
			{
				$this->Trace("Virus '$sVirusName' found in the attachment {$aAttachment['filename']}");
				$bResult = true;
			}
			
			// Remove the temporary file
			unlink($sTempFile);
		}
		*/
		return $bResult;
	}
	
	/**
	 * Initializes the ticket from the values specified in the configuration
	 * Each default value must be a valid value for the given field
	 * @param Ticket $oTicket The ticket to update
	 * @param string $sAttCode The code of the attribute to update
	 * @param mixed $value The value to set, for an external key, this is the name of the pointed object
	 */
	protected function InitFromDefaultValue($oTicket, $sAttCode, $value)
	{
		if (!MetaModel::IsValidAttCode(get_class($oTicket), $sAttCode))
	 	{
 			$this->Trace("Warning: cannot set default value '$value'; '$sAttCode' is not a valid attribute of the class ".get_class($oTicket).".");		 		
	 	}
	 	else
	 	{
		 	$oAttDef = MetaModel::GetAttributeDef(get_class($oTicket), $sAttCode);
		 	if (!$oAttDef->IsWritable())
		 	{
		 		$this->Trace("Warning: cannot set default value '$value' for the non-writable attribute: '$sAttCode'.");		 		
		 	}
		 	else
		 	{
		 		$aArgs = array('this' => $oTicket->ToArgs());
		 		$aValues = $oAttDef->GetAllowedValues($aArgs);
		 		if ($aValues == null)
		 		{
		 			// No special constraint for this attribute
			 		if ($oAttDef->IsExternalKey())
			 		{
			 			$oTarget = MetaModel::GetObjectByName($oAttDef->GetTargetClass(), $value, false);
			 			if (is_object($oTarget))
			 			{
			 				$oTicket->Set($sAttCode, $oTarget->GetKey());
			 			}
			 			else
			 			{
				 			$this->Trace("Warning: cannot set default value '$value' for the external key: '$sAttCode'. Unable to find an object of class ".$oAttDef->GetTargetClass()." named '$value'.");
			 			}
			 		}
			 		else if($oAttDef->IsScalar())
			 		{
			 			$oTicket->Set($sAttCode, $value);
			 		}
			 		else
			 		{
			 			$this->Trace("Warning: cannot set default value '$value' for the non-scalar attribute: '$sAttCode'.");
			 		}
		 		}
		 		else
		 		{
		 			// Check that the specified value is a possible/allowed value
			 		if ($oAttDef->IsExternalKey())
			 		{
			 			$bFound = false;
			 			foreach($aValues as $id => $sName)
			 			{
			 				if (strcasecmp($sName,$value) == 0)
			 				{
			 					$bFound = true;
			 					$oTicket->Set($sAttCode, $id);
			 					break;
			 				}
			 			}
			 		}
			 		else if($oAttDef->IsScalar())
			 		{
			 			foreach($aValues as $allowedValue)
			 			{
			 				if ($allowedValue == $value)
			 				{
			 					$bFound = true;
			 					$oTicket->Set($sAttCode, $value);
			 					break;
			 				}
			 			}
			 		}
			 		else
			 		{
			 			$bFound = true;
			 			$this->Trace("Warning: cannot set default value '$value' for the non-scalar attribute: '$sAttCode'.");
			 		}
			 		
			 		if (!$bFound)
			 		{
			 			$this->Trace("Warning: cannot set the value '$value' for the field $sAttCode of the ticket. '$value' is not a valid value for $sAttCode.");		
			 		}
		 		}
			}
		}
	}
}


/**
 * To trigger notifications when a ticket is updated from an incoming eMail
 */
class TriggerOnMailUpdate extends TriggerOnObject
{
	public static function Init()
	{
		$aParams = array
		(
			"category" => "core/cmdb",
			"key_type" => "autoincrement",
			"name_attcode" => "description",
			"state_attcode" => "",
			"reconc_keys" => array(),
			"db_table" => "priv_trigger_onmailupdate",
			"db_key_field" => "id",
			"db_finalclass_field" => "",
			"display_template" => "",
		);
		MetaModel::Init_Params($aParams);
		MetaModel::Init_InheritAttributes();

		// Display lists
		MetaModel::Init_SetZListItems('details', array('description', 'target_class', 'action_list')); // Attributes to be displayed for the complete details
		MetaModel::Init_SetZListItems('list', array('finalclass', 'target_class', 'description')); // Attributes to be displayed for a list
		// Search criteria
	}
}
// register the background action for asynchronous execution in cron.php
EmailBackgroundProcess::RegisterEmailProcessor('iTopSimpleEmailProcessor');
