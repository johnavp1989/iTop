<?php
// Copyright (C) 2010-2013 Combodo SARL
//
//   This file is part of iTop.
//
//   iTop is free software; you can redistribute it and/or modify	
//   it under the terms of the GNU Affero General Public License as published by
//   the Free Software Foundation, either version 3 of the License, or
//   (at your option) any later version.
//
//   iTop is distributed in the hope that it will be useful,
//   but WITHOUT ANY WARRANTY; without even the implied warranty of
//   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//   GNU Affero General Public License for more details.
//
//   You should have received a copy of the GNU Affero General Public License
//   along with iTop. If not, see <http://www.gnu.org/licenses/>

/**
 * ModelFactory: in-memory manipulation of the XML MetaModel
 *
 * @copyright   Copyright (C) 2010-2012 Combodo SARL
 * @license     http://opensource.org/licenses/AGPL-3.0
 */


require_once(APPROOT.'setup/moduleinstaller.class.inc.php');

 /**
 * ModelFactoryModule: the representation of a Module (i.e. element that can be selected during the setup)
 * @package ModelFactory
 */
class MFModule
{
	protected $sId;
	protected $sName;
	protected $sVersion;
	protected $sRootDir;
	protected $sLabel;
	protected $aDataModels;
	
	public function __construct($sId, $sRootDir, $sLabel)
	{
		$this->sId = $sId;	
		
		list($this->sName, $this->sVersion) = ModuleDiscovery::GetModuleName($sId);
		if (strlen($this->sVersion) == 0)
		{
			$this->sVersion = '1.0.0';
		}

		$this->sRootDir = $sRootDir;
		$this->sLabel = $sLabel;
		$this->aDataModels = array();
	
		// Scan the module's root directory to find the datamodel(*).xml files
		if ($hDir = opendir($sRootDir))
		{
			// This is the correct way to loop over the directory. (according to the documentation)
			while (($sFile = readdir($hDir)) !== false)
			{
				if (preg_match('/^datamodel(.*)\.xml$/i', $sFile, $aMatches))
				{
					$this->aDataModels[] = $this->sRootDir.'/'.$aMatches[0];
				}
			}
			closedir($hDir);
		}
	}
	
	
	public function GetId()
	{
		return $this->sId;
	}
	
	public function GetName()
	{
		return $this->sName;
	}

	public function GetVersion()
	{
		return $this->sVersion;
	}

	public function GetLabel()
	{
		return $this->sLabel;
	}
	
	public function GetRootDir()
	{
		return $this->sRootDir;
	}

	public function GetModuleDir()
	{
		return basename($this->sRootDir);
	}

	public function GetDataModelFiles()
	{
		return $this->aDataModels;
	}
			
	/**
	 * List all classes in this module
	 */
	public function ListClasses()
	{
		return array();
	}
	
	public function GetDictionaryFiles()
	{
		$aDictionaries = array();
		if ($hDir = opendir($this->sRootDir))
		{
			while (($sFile = readdir($hDir)) !== false)
			{
				$aMatches = array();
				if (preg_match("/^[^\\.]+.dict.".$this->sName.".php$/i", $sFile, $aMatches)) // Dictionary files are named like <Lang>.dict.<ModuleName>.php
				{
					$aDictionaries[] = $this->sRootDir.'/'.$sFile;
				}
			}
			closedir($hDir);
		}
		return $aDictionaries;		
	}
}

 /**
 * MFDeltaModule: an optional module, made of a single file
 * @package ModelFactory
 */
class MFDeltaModule extends MFModule
{
	public function __construct($sDeltaFile)
	{
		$this->sId = 'datamodel-delta';	
		
		$this->sName = 'delta';
		$this->sVersion = '1.0';

		$this->sRootDir = '';
		$this->sLabel = 'Additional Delta';
		$this->aDataModels = array($sDeltaFile);
	}

	public function GetName()
	{
		return ''; // Objects created inside this pseudo module retain their original module's name
	}

	public function GetRootDir()
	{
		return '';
	}

	public function GetModuleDir()
	{
		return '';
	}

	public function GetDictionaryFiles()
	{
		return array();
	}
}

/**
 * ModelFactory: the class that manages the in-memory representation of the XML MetaModel
 * @package ModelFactory
 */
class ModelFactory
{
	protected $aRootDirs;
	protected $oDOMDocument;
	protected $oRoot;
	protected $oModules;
	protected $oClasses;
	protected $oMenus;
	protected $oDictionaries;
	static protected $aLoadedClasses;
	static protected $aWellKnownParents = array('DBObject', 'CMDBObject','cmdbAbstractObject');
//	static protected $aWellKnownMenus = array('DataAdministration', 'Catalogs', 'ConfigManagement', 'Contact', 'ConfigManagementCI', 'ConfigManagement:Shortcuts', 'ServiceManagement');
	static protected $aLoadedModules;
	static protected $aLoadErrors;
	protected $aDict;
	protected $aDictKeys;
	
	
	public function __construct($aRootDirs, $aRootNodeExtensions = array())
	{
		$this->aDict = array();
		$this->aDictKeys = array();
		$this->aRootDirs = $aRootDirs;
		$this->oDOMDocument = new MFDocument();
		$this->oRoot = $this->oDOMDocument->CreateElement('itop_design');
		$this->oRoot->setAttribute('xmlns:xsi', "http://www.w3.org/2001/XMLSchema-instance");
		$this->oDOMDocument->AppendChild($this->oRoot);
		$this->oModules = $this->oDOMDocument->CreateElement('loaded_modules');
		$this->oRoot->AppendChild($this->oModules);
		$this->oClasses = $this->oDOMDocument->CreateElement('classes');
		$this->oRoot->AppendChild($this->oClasses);
		$this->oDictionaries = $this->oDOMDocument->CreateElement('dictionaries');
		$this->oRoot->AppendChild($this->oDictionaries);
		
		foreach (self::$aWellKnownParents as $sWellKnownParent)
		{
			$this->AddWellKnownParent($sWellKnownParent);
		}
		$this->oMenus = $this->oDOMDocument->CreateElement('menus');
		$this->oRoot->AppendChild($this->oMenus);
		
		foreach($aRootNodeExtensions as $sElementName)
		{
			$oElement = $this->oDOMDocument->CreateElement($sElementName);
			$this->oRoot->AppendChild($oElement);
		}
		self::$aLoadedModules = array();
		self::$aLoadErrors = array();

		libxml_use_internal_errors(true);
	}
	
	public function Dump($oNode = null, $bReturnRes = false)
	{
		if (is_null($oNode))
		{
			$oNode = $this->oRoot;
		}
		return $oNode->Dump($bReturnRes);
	}

	public function LoadFromFile($sCacheFile)
	{
		$this->oDOMDocument->load($sCacheFile);
		$this->oRoot = $this->oDOMDocument->firstChild;
		
		$this->oModules = $this->oRoot->getElementsByTagName('loaded_modules')->item(0);
		self::$aLoadedModules = array();
		foreach($this->oModules->getElementsByTagName('module') as $oModuleNode)
		{
			$sId = $oModuleNode->getAttribute('id');
			$sRootDir = $oModuleNode->GetChildText('root_dir');
			$sLabel = $oModuleNode->GetChildText('label');
			self::$aLoadedModules[] = new MFModule($sId, $sRootDir, $sLabel);
		}
	}

	public function SaveToFile($sCacheFile)
	{
		$this->oDOMDocument->save($sCacheFile);
	}
	/**
	 * To progressively replace LoadModule
	 * @param xxx xxx
	 */
	public function LoadDelta(DOMDocument $oDeltaDoc, $oSourceNode, $oTargetParentNode)
	{
		if (!$oSourceNode instanceof DOMElement) return;
		//echo "Load $oSourceNode->tagName::".$oSourceNode->getAttribute('id')." (".$oSourceNode->getAttribute('_delta').")<br/>\n";
		$oTarget = $this->oDOMDocument;

		if (($oSourceNode->tagName == 'class') && ($oSourceNode->parentNode->tagName == 'classes') && ($oSourceNode->parentNode->parentNode->tagName == 'itop_design'))
		{
			if ($oSourceNode->getAttribute('_delta') == 'define')
			{
				// This tag is organized in hierarchy: determine the real parent node (as a subnode of the current node)
				$sParentId = $oSourceNode->GetChildText('parent');
				
				$oTargetParentNode = $oTarget->GetNodeById('/itop_design/classes//class', $sParentId)->item(0);
	
				if (!$oTargetParentNode)
				{
					echo "Dumping target doc - looking for '$sParentId'<br/>\n";
					$this->oDOMDocument->firstChild->Dump();
					throw new Exception("could not find parent node for $oSourceNode->tagName(id:".$oSourceNode->getAttribute('id').") with parent id $sParentId");
				}
			}
			else 
			{
				$oTargetNode = $oTarget->GetNodeById('/itop_design/classes//class', $oSourceNode->getAttribute('id'))->item(0);
				if (!$oTargetNode)
				{
					echo "Dumping target doc - looking for '".$oSourceNode->getAttribute('id')."'<br/>\n";
					$this->oDOMDocument->firstChild->Dump();
					throw new Exception("could not find node for $oSourceNode->tagName(id:".$oSourceNode->getAttribute('id').")");
				}
				else
				{
					$oTargetParentNode = $oTargetNode->parentNode;
				}				
								
			}
		}

		switch ($oSourceNode->getAttribute('_delta'))
		{
		case 'must_exist':
		case 'merge':
		case '':
			$bMustExist = ($oSourceNode->getAttribute('_delta') == 'must_exist');
			$sSearchId = $oSourceNode->hasAttribute('_rename_from') ? $oSourceNode->getAttribute('_rename_from') : $oSourceNode->getAttribute('id');
			$oTargetNode = $oSourceNode->MergeInto($oTargetParentNode, $sSearchId, $bMustExist);
			foreach($oSourceNode->childNodes as $oSourceChild)
			{
				// Continue deeper
				$this->LoadDelta($oDeltaDoc, $oSourceChild, $oTargetNode);
			}			
			break;

		case 'define_if_not_exists':
			$oExistingNode = $oTargetParentNode->FindExistingChildNode($oSourceNode);
			if ($oExistingNode == null)
			{
				// Same as 'define' below
				$oTargetNode = $oTarget->ImportNode($oSourceNode, true);
				$oTargetParentNode->AddChildNode($oTargetNode);	
			}
			else
			{
				$oTargetNode = $oExistingNode;
			}
			$oTargetNode->setAttribute('_alteration', 'needed');
			break;
			
		case 'define':
			// New node - copy child nodes as well
			$oTargetNode = $oTarget->ImportNode($oSourceNode, true);
			$oTargetParentNode->AddChildNode($oTargetNode);
			break;

		case 'redefine':
			// Replace the existing node by the given node - copy child nodes as well
			$oTargetNode = $oTarget->ImportNode($oSourceNode, true);
			$sSearchId = $oSourceNode->hasAttribute('_rename_from') ? $oSourceNode->getAttribute('_rename_from') : $oSourceNode->getAttribute('id');
			$oTargetParentNode->RedefineChildNode($oTargetNode, $sSearchId);
			break;

		case 'delete':
			$oTargetNode = $oTargetParentNode->FindExistingChildNode($oSourceNode);
			if($oTargetNode == null)
			{
				throw new Exception("Trying to delete node for {$oSourceNode->tagName} (id:".$oSourceNode->getAttribute('id').") under {$oTargetParentNode->tagName} (id:".$oTargetParentNode->getAttribute('id').'). but nothing found.');
			}
			$oTargetNode->Delete();
			break;
		}

		if ($oSourceNode->hasAttribute('_rename_from'))
		{
			$oTargetNode->Rename($oSourceNode->getAttribute('id'));
		}
		if ($oTargetNode->hasAttribute('_delta'))
		{
			$oTargetNode->removeAttribute('_delta');
		}
	}

	/**
	 * Loads the definitions corresponding to the given Module
	 * @param MFModule $oModule
	 * @param Array $aLanguages The list of languages to process (for the dictionaries). If empty all languages are kept
	 */
	public function LoadModule(MFModule $oModule, $aLanguages = array())
	{
		try
		{
			$aDataModels = $oModule->GetDataModelFiles();
			$sModuleName = $oModule->GetName();
			$aClasses = array();
			self::$aLoadedModules[] = $oModule;
		
			// For persistence in the cache
			$oModuleNode = $this->oDOMDocument->CreateElement('module');
			$oModuleNode->setAttribute('id', $oModule->GetId());
			$oModuleNode->AppendChild($this->oDOMDocument->CreateElement('root_dir', $oModule->GetRootDir()));
			$oModuleNode->AppendChild($this->oDOMDocument->CreateElement('label', $oModule->GetLabel()));
			$this->oModules->AppendChild($oModuleNode);
			
			foreach($aDataModels as $sXmlFile)
			{
				$oDocument = new MFDocument();
				libxml_clear_errors();
				$oDocument->load($sXmlFile);
				//$bValidated = $oDocument->schemaValidate(APPROOT.'setup/itop_design.xsd');
				$aErrors = libxml_get_errors();
				if (count($aErrors) > 0)
				{
					self::$aLoadErrors[$sModuleName] = $aErrors;
					return;
				}
	
				$oXPath = new DOMXPath($oDocument);
				$oNodeList = $oXPath->query('/itop_design/classes//class');
				foreach($oNodeList as $oNode)
				{
					if ($oNode->getAttribute('_created_in') == '')
					{
						$oNode->SetAttribute('_created_in', $sModuleName);
					}
				}
				$oNodeList = $oXPath->query('/itop_design/constants/constant');
				foreach($oNodeList as $oNode)
				{
					if ($oNode->getAttribute('_created_in') == '')
					{
						$oNode->SetAttribute('_created_in', $sModuleName);
					}
				}
				$oNodeList = $oXPath->query('/itop_design/menus/menu');
				foreach($oNodeList as $oNode)
				{
					if ($oNode->getAttribute('_created_in') == '')
					{
						$oNode->SetAttribute('_created_in', $sModuleName);
					}
				}
				$oUserRightsNode = $oXPath->query('/itop_design/user_rights')->item(0);
				if ($oUserRightsNode)
				{
					if ($oUserRightsNode->getAttribute('_created_in') == '')
					{
						$oUserRightsNode->SetAttribute('_created_in', $sModuleName);
					}
				}
	
				$oDeltaRoot = $oDocument->childNodes->item(0);
				$this->LoadDelta($oDocument, $oDeltaRoot, $this->oDOMDocument);
			}
			
			$aDictionaries = $oModule->GetDictionaryFiles();
			
			try
			{
				$this->ResetTempDictionary();
				foreach($aDictionaries as $sPHPFile)
				{
					$sDictFileContents = file_get_contents($sPHPFile);
					$sDictFileContents = str_replace(array('<'.'?'.'php', '?'.'>'), '', $sDictFileContents);
					$sDictFileContents = str_replace('Dict::Add', '$this->AddToTempDictionary', $sDictFileContents);
					eval($sDictFileContents);
				}
				
				foreach ($this->aDict as $sLanguageCode => $aDictDefinition)
				{
					if ((count($aLanguages) > 0 ) && !in_array($sLanguageCode, $aLanguages))
					{
						// skip some languages if the parameter says so
						continue;
					}
					
					$oNodes = $this->GetNodeById('dictionary', $sLanguageCode, $this->oDictionaries);
					if ($oNodes->length == 0)
					{
						$oXmlDict = $this->oDOMDocument->CreateElement('dictionary');
						$oXmlDict->setAttribute('id', $sLanguageCode);
						$this->oDictionaries->AddChildNode($oXmlDict);
						$oXmlEntries = $this->oDOMDocument->CreateElement('english_description', $aDictDefinition['english_description']);
						$oXmlDict->AppendChild($oXmlEntries);
						$oXmlEntries = $this->oDOMDocument->CreateElement('localized_description', $aDictDefinition['localized_description']);
						$oXmlDict->AppendChild($oXmlEntries);
						$oXmlEntries = $this->oDOMDocument->CreateElement('entries');
						$oXmlDict->AppendChild($oXmlEntries);
					}
					else
					{
						$oXmlDict = $oNodes->item(0);
						$oXmlEntries = $oXmlDict->GetUniqueElement('entries');
					}
							
					foreach ($aDictDefinition['entries'] as $sCode => $sLabel)
					{
						
						$oXmlEntry = $this->oDOMDocument->CreateElement('entry');
						$oXmlEntry->setAttribute('id', $sCode);
						$oXmlValue = $this->oDOMDocument->CreateCDATASection($sLabel);
						$oXmlEntry->appendChild($oXmlValue);
						if (array_key_exists($sLanguageCode, $this->aDictKeys) && array_key_exists($sCode, $this->aDictKeys[$sLanguageCode]))
						{
							$oXmlEntries->RedefineChildNode($oXmlEntry);
						}
						else 
						{
							$oXmlEntries->appendChild($oXmlEntry);
						}
						$this->aDictKeys[$sLanguageCode][$sCode] = true;
					}
				}	 				
			}
			catch(Exception $e)
			{
				throw new Exception('Failed to load dictionary file "'.$sPHPFile.'", reason: '.$e->getMessage());
			}
			
		}
		catch(Exception $e)
		{
			$aLoadedModuleNames = array();
			foreach (self::$aLoadedModules as $oModule)
			{
				$aLoadedModuleNames[] = $oModule->GetName();
			}
			throw new Exception('Error loading module "'.$oModule->GetName().'": '.$e->getMessage().' - Loaded modules: '.implode(',', $aLoadedModuleNames));
		}
	}

	/**
	 * Collects the PHP Dict entries into the ModelFactory for transforming the dictionary into an XML structure
	 * @param string $sLanguageCode The language code
	 * @param string $sEnglishLanguageDesc English description of the language (unused but kept for API compatibility)
	 * @param string $sLocalizedLanguageDesc Localized description of the language (unused but kept for API compatibility)
	 * @param hash $aEntries The entries to load: string_code => translation
	 */
	protected function AddToTempDictionary($sLanguageCode, $sEnglishLanguageDesc, $sLocalizedLanguageDesc, $aEntries)
	{
		$this->aDict[$sLanguageCode]['english_description'] = $sEnglishLanguageDesc;
		$this->aDict[$sLanguageCode]['localized_description'] = $sLocalizedLanguageDesc;
		if (!array_key_exists('entries', $this->aDict[$sLanguageCode]))
		{
			$this->aDict[$sLanguageCode]['entries'] = array();
		}

		foreach($aEntries as $sKey => $sValue)
		{
			$this->aDict[$sLanguageCode]['entries'][$sKey] = $sValue;
		}
	}
	
	protected function ResetTempDictionary()
	{
		$this->aDict = array();
	}
	
	/**
	 *	XML load errors (XML format and validation)
	 */	
	function HasLoadErrors()
	{
		return (count(self::$aLoadErrors) > 0);
	}
	function GetLoadErrors()
	{
		return self::$aLoadErrors;
	}

	function GetLoadedModules($bExcludeWorkspace = true)
	{
		if ($bExcludeWorkspace)
		{
			$aModules = array();
			foreach(self::$aLoadedModules as $oModule)
			{
				if (!$oModule instanceof MFWorkspace)
				{
					$aModules[] = $oModule;
				}
			}
		}
		else
		{
			$aModules = self::$aLoadedModules;
		}
		return $aModules;
	}
	
	
	function GetModule($sModuleName)
	{
		foreach(self::$aLoadedModules as $oModule)
		{
			if ($oModule->GetName() == $sModuleName) return $oModule;
		}
		return null;
	}
	
	public function CreateElement($sTagName, $sValue = '')
	{
		return $this->oDOMDocument->createElement($sTagName, $sValue);
	}
	
	public function GetNodeById($sXPath, $sId, $oContextNode = null)
	{
		return $this->oDOMDocument->GetNodeById($sXPath, $sId, $oContextNode);
	}

	/**
	 * Apply extensibility rules into the DOM
	 * @param array aRestrictionRules Array of array ('selectors' => array of XPaths, 'rules' => array of rules)
	 * @return void
	 */
	public function RestrictExtensibility($aRestrictionRules)
	{
		foreach ($aRestrictionRules as $aRestriction)
		{
			foreach ($aRestriction['selectors'] as $sSelector)
			{
				foreach($this->GetNodes($sSelector) as $oNode)
				{
					$oNode->RestrictExtensibility($aRestriction['rules']);
				}
			}
		}
	}
	
	/**
	 * Check if the class specified by the given node already exists in the loaded DOM
	 * @param DOMNode $oClassNode The node corresponding to the class to load
	 * @throws Exception
	 * @return bool True if the class exists, false otherwise
	 */
	protected function ClassExists(DOMNode $oClassNode)
	{
	assert(false);
		if ($oClassNode->hasAttribute('id'))
		{
			$sClassName = $oClassNode->GetAttribute('id');
		}
		else
		{
			throw new Exception('ModelFactory::AddClass: Cannot add a class with no name');
		}
	
		return (array_key_exists($sClassName, self::$aLoadedClasses));
	}
	
	/**
	 * Check if the class specified by the given name already exists in the loaded DOM
	 * @param string $sClassName The node corresponding to the class to load
	 * @throws Exception
	 * @return bool True if the class exists, false otherwise
	 */
	protected function ClassNameExists($sClassName, $bFlattenLayers = true)
	{
		return !is_null($this->GetClass($sClassName, $bFlattenLayers));
	}

	/**
	 * Add the given class to the DOM
	 * @param DOMNode $oClassNode
	 * @param string $sModuleName The name of the module in which this class is declared
	 * @throws Exception
	 */
	public function AddClass(DOMNode $oClassNode, $sModuleName)
	{
		if ($oClassNode->hasAttribute('id'))
		{
			$sClassName = $oClassNode->GetAttribute('id');
		}
		else
		{
			throw new Exception('ModelFactory::AddClass: Cannot add a class with no name');
		}
		if ($this->ClassNameExists($oClassNode->getAttribute('id')))
		{
			throw new Exception("ModelFactory::AddClass: Cannot add the already existing class $sClassName");
		}
		
		$sParentClass = $oClassNode->GetChildText('parent', '');
		$oParentNode = $this->GetClass($sParentClass);
		if ($oParentNode == null)
		{
			throw new Exception("ModelFactory::AddClass: Cannot find the parent class of '$sClassName': '$sParentClass'");
		}
		else
		{
			if ($sModuleName != '')
			{
				$oClassNode->SetAttribute('_created_in', $sModuleName);
			}
			$oParentNode->AddChildNode($this->oDOMDocument->importNode($oClassNode, true));
			
			if (substr($sParentClass, 0, 1) == '/') // Convention for well known parent classes
			{
				// Remove the leading slash character
				$oParentNameNode = $oClassNode->GetOptionalElement('parent')->firstChild; // Get the DOMCharacterData node
				$oParentNameNode->data = substr($sParentClass, 1);
			}
		}
	}
	
	/**
	 * Remove a class from the DOM
	 * @param string $sClass
	 * @throws Exception
	 */
	public function RemoveClass($sClass)
	{
		$oClassNode = $this->GetClass($sClass);
		if ($oClassNode == null)
		{
			throw new Exception("ModelFactory::RemoveClass: Cannot remove the non existing class $sClass");
		}

		// Note: the child classes are removed entirely
		$oClassNode->Delete();
	}

	/**
	 * Modify a class within the DOM
	 * @param string $sMenuId
	 * @param DOMNode $oMenuNode
	 * @throws Exception
	 */
	public function AlterClass($sClassName, DOMNode $oClassNode)
	{
		$sOriginalName = $sClassName;
		if ($this->ClassNameExists($sClassName))
		{
			$oDestNode = self::$aLoadedClasses[$sClassName];
		}
		else
		{
			$sOriginalName = $oClassNode->getAttribute('_original_name');
			if ($this->ClassNameExists($sOriginalName))
			{
				// Class was renamed !
				$oDestNode = self::$aLoadedClasses[$sOriginalName];
			}
			else
			{
				throw new Exception("ModelFactory::AddClass: Cannot alter the non-existing class $sClassName / $sOriginalName");
			}
		}
		$this->_priv_AlterNode($oDestNode, $oClassNode);
		$sClassName = $oDestNode->getAttribute('id');
		if ($sOriginalName != $sClassName)
		{
			unset(self::$aLoadedClasses[$sOriginalName]);
			self::$aLoadedClasses[$sClassName] = $oDestNode;
		}
		$this->_priv_SetFlag($oDestNode, 'modified');
	}

	
	public function GetClassXMLTemplate($sName, $sIcon)
	{
		$sHeader = '<?'.'xml version="1.0" encoding="utf-8"?'.'>';
		return
<<<EOF
$sHeader
<class id="$sName">
	<comment/>
	<properties>
	</properties>
	<naming format=""><attributes/></naming>
	<reconciliation><attributes/></reconciliation>
	<display_template/>
	<icon>$sIcon</icon>
	</properties>
	<fields/>
	<lifecycle/>
	<methods/>
	<presentation>
		<details><items/></details>
		<search><items/></search>
		<list><items/></list>
	</presentation>
</class>
EOF
		;
	}

	/**
	 * List all constants from the DOM, for a given module
	 * @param string $sModuleName
	 * @param bool $bFlattenLayers
	 * @throws Exception
	 */
	public function ListConstants($sModuleName, $bFlattenLayers = true)
	{
		$sXPath = "/itop_design/constants/constant[@_created_in='$sModuleName']";
		if ($bFlattenLayers)
		{
			$sXPath = "/itop_design/constants/constant[@_created_in='$sModuleName' and (not(@_alteration) or @_alteration!='removed')]";
		}
		return $this->GetNodes($sXPath);
	}

	/**
	 * List all classes from the DOM, for a given module
	 * @param string $sModuleName
	 * @param bool $bFlattenLayers
	 * @throws Exception
	 */
	public function ListClasses($sModuleName, $bFlattenLayers = true)
	{
		$sXPath = "/itop_design/classes//class[@_created_in='$sModuleName']";
		if ($bFlattenLayers)
		{
			$sXPath = "/itop_design/classes//class[@_created_in='$sModuleName' and (not(@_alteration) or @_alteration!='removed')]";
		}
		return $this->GetNodes($sXPath);
	}
		
	/**
	 * List all classes from the DOM
	 * @param bool $bFlattenLayers
	 * @throws Exception
	 */
	public function ListAllClasses($bFlattenLayers = true)
	{
		$sXPath = "/itop_design/classes//class";
		if ($bFlattenLayers)
		{
			$sXPath = "/itop_design/classes//class[not(@_alteration) or @_alteration!='removed']";
		}
		return $this->GetNodes($sXPath);
	}
	
	/**
	 * List top level (non abstract) classes having child classes
	 * @param bool $bFlattenLayers
	 * @throws Exception
	 */
	public function ListRootClasses($bFlattenLayers = true)
	{
		$sXPath = "/itop_design/classes/class/class/class/..";
		if ($bFlattenLayers)
		{
			$sXPath = "/itop_design/classes/class/class[not(@_alteration) or @_alteration!='removed']/class[not(@_alteration) or @_alteration!='removed']/..";
		}
		return $this->GetNodes($sXPath);
	}

	public function GetClass($sClassName, $bFlattenLayers = true)
	{
		$oClassNode = $this->GetNodes("/itop_design/classes//class[@id='$sClassName']")->item(0);
		if (($oClassNode != null) && ($bFlattenLayers))
		{
			$sOperation = $oClassNode->getAttribute('_alteration');
			if ($sOperation == 'removed')
			{
				$oClassNode = null;
			}
		}
		return $oClassNode;
	}
	
	public function AddWellKnownParent($sWellKnownParent)
	{
		$oWKClass = $this->oDOMDocument->CreateElement('class');
		$oWKClass->setAttribute('id', $sWellKnownParent);
		$this->oClasses->AppendChild($oWKClass);
		return $oWKClass;	
	}
	
	public function GetChildClasses($oClassNode, $bFlattenLayers = true)
	{
		$sXPath = "class";
		if ($bFlattenLayers)
		{
			$sXPath = "class[(@_operation!='removed')]";
		}
		return $this->GetNodes($sXPath, $oClassNode);
	}
		
	
	public function GetField($sClassName, $sAttCode, $bFlattenLayers = true)
	{
		if (!$this->ClassNameExists($sClassName))
		{
			return null;
		}
		$oClassNode = self::$aLoadedClasses[$sClassName];
		if ($bFlattenLayers)
		{
			$sOperation = $oClassNode->getAttribute('_operation');
			if ($sOperation == 'removed')
			{
				$oClassNode = null;
			}
		}
		$sXPath = "fields/field[@id='$sAttCode']";
		if ($bFlattenLayers)
		{
			$sXPath = "fields/field[(@id='$sAttCode' and (not(@_operation) or @_operation!='removed'))]";
		}
		$oFieldNode = $this->GetNodes($sXPath, $oClassNode)->item(0);
		if (($oFieldNode == null) && ($sParentClass = $oClassNode->GetChildText('parent')))
		{
			return $this->GetField($sParentClass, $sAttCode, $bFlattenLayers);
		}
		return $oFieldNode;
	}
		
	/**
	 * List all classes from the DOM
	 * @param bool $bFlattenLayers
	 * @throws Exception
	 */
	public function ListFields(DOMNode $oClassNode, $bFlattenLayers = true)
	{
		$sXPath = "fields/field";
		if ($bFlattenLayers)
		{
			$sXPath = "fields/field[not(@_alteration) or @_alteration!='removed']";
		}
		return $this->GetNodes($sXPath, $oClassNode);
	}
	
	public function AddField(DOMNode $oClassNode, $sFieldCode, $sFieldType, $sSQL, $defaultValue, $bIsNullAllowed, $aExtraParams)
	{
		$oNewField = $this->oDOMDocument->createElement('field');
		$oNewField->setAttribute('id', $sFieldCode);
		$this->_priv_AlterField($oNewField, $sFieldType, $sSQL, $defaultValue, $bIsNullAllowed, $aExtraParams);
		$oFields = $oClassNode->getElementsByTagName('fields')->item(0);
		$oFields->AppendChild($oNewField);
		$this->_priv_SetFlag($oNewField, 'added');
	}
	
	public function RemoveField(DOMNode $oClassNode, $sFieldCode)
	{
		$sXPath = "fields/field[@id='$sFieldCode']";
		$oFieldNodes = $this->GetNodes($sXPath, $oClassNode);
		if (is_object($oFieldNodes) && (is_object($oFieldNodes->item(0))))
		{
			$oFieldNode = $oFieldNodes->item(0);
			$sOpCode = $oFieldNode->getAttribute('_operation');
			if ($oFieldNode->getAttribute('_operation') == 'added')
			{
				$oFieldNode->parentNode->removeChild($oFieldNode);
			}
			else
			{
				$this->_priv_SetFlag($oFieldNode, 'removed');
			}
		}
	}
	
	public function AlterField(DOMNode $oClassNode, $sFieldCode, $sFieldType, $sSQL, $defaultValue, $bIsNullAllowed, $aExtraParams)
	{
		$sXPath = "fields/field[@id='$sFieldCode']";
		$oFieldNodes = $this->GetNodes($sXPath, $oClassNode);
		if (is_object($oFieldNodes) && (is_object($oFieldNodes->item(0))))
		{
			$oFieldNode = $oFieldNodes->item(0);
			//@@TODO: if the field was 'added' => then let it as 'added'
			$sOpCode = $oFieldNode->getAttribute('_operation');
			switch($sOpCode)
			{
				case 'added':
				case 'modified':
				// added or modified, let it as it is
				break;
				
				default:
				$this->_priv_SetFlag($oFieldNodes->item(0), 'modified');
			}
			$this->_priv_AlterField($oFieldNodes->item(0), $sFieldType, $sSQL, $defaultValue, $bIsNullAllowed, $aExtraParams);
		}
	}

	protected function _priv_AlterField(DOMNode $oFieldNode, $sFieldType, $sSQL, $defaultValue, $bIsNullAllowed, $aExtraParams)
	{
		switch($sFieldType)
		{			
			case 'Blob':
			case 'Boolean':
			case 'CaseLog':
			case 'Deadline':
			case 'Duration':
			case 'EmailAddress':
			case 'EncryptedString':
			case 'HTML':
			case 'IPAddress':
			case 'LongText':
			case 'OQL':
			case 'OneWayPassword':
			case 'Password':
			case 'Percentage':
			case 'String':
			case 'Text':
			case 'Text':
			case 'TemplateHTML':
			case 'TemplateString':
			case 'TemplateText':
			case 'URL':
			case 'Date':
			case 'DateTime':
			case 'Decimal':
			case 'Integer':
			break;	
			
			case 'ExternalKey':
			$this->_priv_AddFieldAttribute($oFieldNode, 'target_class', $aExtraParams);
			// Fall through
			case 'HierarchicalKey':
			$this->_priv_AddFieldAttribute($oFieldNode, 'on_target_delete', $aExtraParams);
			$this->_priv_AddFieldAttribute($oFieldNode, 'filter', $aExtraParams);
			break;

			case 'ExternalField':
			$this->_priv_AddFieldAttribute($oFieldNode, 'extkey_attcode', $aExtraParams);
			$this->_priv_AddFieldAttribute($oFieldNode, 'target_attcode', $aExtraParams);
			break;
				
			case 'Enum':
			$this->_priv_SetFieldValues($oFieldNode, $aExtraParams);
			break;
			
			case 'LinkedSetIndirect':
			$this->_priv_AddFieldAttribute($oFieldNode, 'ext_key_to_remote', $aExtraParams);
			// Fall through
			case 'LinkedSet':
			$this->_priv_AddFieldAttribute($oFieldNode, 'linked_class', $aExtraParams);
			$this->_priv_AddFieldAttribute($oFieldNode, 'ext_key_to_me', $aExtraParams);
			$this->_priv_AddFieldAttribute($oFieldNode, 'count_min', $aExtraParams);
			$this->_priv_AddFieldAttribute($oFieldNode, 'count_max', $aExtraParams);
			break;
			
			default:
			throw(new Exception('Unsupported type of field: '.$sFieldType));
		}
		$this->_priv_SetFieldDependencies($oFieldNode, $aExtraParams);
		$oFieldNode->setAttribute('type', $sFieldType);
		$oFieldNode->setAttribute('sql', $sSQL);
		$oFieldNode->setAttribute('default_value', $defaultValue);
		$oFieldNode->setAttribute('is_null_alllowed', $bIsNullAllowed ? 'true' : 'false');
	}
	
	protected function _priv_AddFieldAttribute(DOMNode $oFieldNode, $sAttributeCode, $aExtraParams, $bMandatory = false)
	{
		$value = array_key_exists($sAttributeCode, $aExtraParams) ? $aExtraParams[$sAttributeCode] : '';
		if (($value == '') && (!$bMandatory)) return;
		$oFieldNode->setAttribute($sAttributeCode, $value);
	}
	
	protected function _priv_SetFieldDependencies($oFieldNode, $aExtraParams)
	{
		$aDeps = array_key_exists('dependencies', $aExtraParams) ? $aExtraParams['dependencies'] : '';
		$oDependencies = $oFieldNode->getElementsByTagName('dependencies')->item(0);

		// No dependencies before, and no dependencies to add, exit
		if (($oDependencies == null) && ($aDeps == '')) return;
		
		// Remove the previous dependencies
		$oFieldNode->removeChild($oDependencies);
		// If no dependencies, exit
		if ($aDeps == '') return;

		// Build the new list of dependencies
		$oDependencies = $this->oDOMDocument->createElement('dependencies');

		foreach($aDeps as $sAttCode)
		{
			$oDep = $this->oDOMDocument->createElement('attribute');
			$oDep->setAttribute('id', $sAttCode);
			$oDependencies->addChild($oDep);
		}
		$oFieldNode->addChild($oDependencies);
	}
	
	protected function _priv_SetFieldValues($oFieldNode, $aExtraParams)
	{
		$aVals = array_key_exists('values', $aExtraParams) ? $aExtraParams['values'] : '';
		$oValues = $oFieldNode->getElementsByTagName('values')->item(0);

		// No dependencies before, and no dependencies to add, exit
		if (($oValues == null) && ($aVals == '')) return;
		
		// Remove the previous dependencies
		$oFieldNode->removeChild($oValues);
		// If no dependencies, exit
		if ($aVals == '') return;

		// Build the new list of dependencies
		$oValues = $this->oDOMDocument->createElement('values');

		foreach($aVals as $sValue)
		{
			$oVal = $this->oDOMDocument->createElement('value', $sValue);
			$oValues->appendChild($oVal);
		}
		$oFieldNode->appendChild($oValues);
	}

	public function SetPresentation(DOMNode $oClassNode, $sPresentationCode, $aPresentation)
	{
		$oPresentation = $oClassNode->getElementsByTagName('presentation')->item(0);
		if (!is_object($oPresentation))
		{
			$oPresentation = $this->oDOMDocument->createElement('presentation');
			$oClassNode->appendChild($oPresentation);
		}
		$oZlist = $oPresentation->getElementsByTagName($sPresentationCode)->item(0);
		if (is_object($oZlist))
		{
			// Remove the previous Zlist
			$oPresentation->removeChild($oZlist);
		}
		// Create the ZList anew
		$oZlist = $this->oDOMDocument->createElement($sPresentationCode);
		$oPresentation->appendChild($oZlist);
		$this->AddZListItem($oZlist, $aPresentation);
		$this->_priv_SetFlag($oZlist, 'replaced');
	}

	protected function AddZListItem($oXMLNode, $value)
	{
		if (is_array($value))
		{
			$oXmlItems = $this->oDOMDocument->CreateElement('items');
			$oXMLNode->appendChild($oXmlItems);
			
			foreach($value as $key => $item)
			{
				$oXmlItem = $this->oDOMDocument->CreateElement('item');
				$oXmlItems->appendChild($oXmlItem);
	
				if (is_string($key))
				{
					$oXmlItem->SetAttribute('key', $key);
				}
				$this->AddZListItem($oXmlItem, $item);
			}
		}
		else
		{
			$oXmlText = $this->oDOMDocument->CreateTextNode((string) $value);
			$oXMLNode->appendChild($oXmlText);
		}
	}
	
	/**
	 * List all transitions from a given state
	 * @param DOMNode $oStateNode The state
	 * @param bool $bFlattenLayers
	 * @throws Exception
	 */
	public function ListTransitions(DOMNode $oStateNode, $bFlattenLayers = true)
	{
		$sXPath = "transitions/transition";
		if ($bFlattenLayers)
		{
			//$sXPath = "transitions/transition[@_operation!='removed']";
		}
		return $this->GetNodes($sXPath, $oStateNode);
	}
		
	/**
	 * List all states of a given class
	 * @param DOMNode $oClassNode The class
	 * @param bool $bFlattenLayers
	 * @throws Exception
	 */
	public function ListStates(DOMNode $oClassNode, $bFlattenLayers = true)
	{
		$sXPath = "lifecycle/states/state";
		if ($bFlattenLayers)
		{
			//$sXPath = "lifecycle/states/state[@_operation!='removed']";
		}
		return $this->GetNodes($sXPath, $oClassNode);
	}
		
	/**
	 * List Zlists from the DOM for a given class
	 * @param bool $bFlattenLayers
	 * @throws Exception
	 */
	public function ListZLists(DOMNode $oClassNode, $bFlattenLayers = true)
	{
		// Not yet implemented !!!
		return array();
	}
		
	public function ApplyChanges()
	{
		$oNodes = $this->ListChanges();
		foreach($oNodes as $oNode)
		{
			$sOperation = $oNode->GetAttribute('_alteration');
			switch($sOperation)
			{
				case 'added':
				case 'replaced':
				case 'needed':
				// marked as added or modified, just reset the flag
				$oNode->removeAttribute('_alteration');
				break;
				
				case 'removed':
				// marked as deleted, let's remove the node from the tree
				$oNode->parentNode->removeChild($oNode);
				// TODO!!!!!!!
				//unset(self::$aLoadedClasses[$sClass]);
				break;
			}
			if ($oNode->hasAttribute('_old_id'))
			{
				$oNode->removeAttribute('_old_id');
			}
		}
	}
	
	public function ListChanges()
	{
		return $this->GetNodes('//*[@_alteration or @_old_id]');
	}


	/**
	 * Create path for the delta
	 * @param DOMDocument oTargetDoc  Where to attach the top of the hierarchy
	 * @param MFElement   oNode       The node to import with its path	 	 
	 */
	protected function ImportNodeAndPathDelta($oTargetDoc, $oNode)
	{
		// Preliminary: skip the parent if this node is organized hierarchically into the DOM
		// Only class nodes are organized this way
		$oParent = $oNode->parentNode;
		if ($oNode->tagName == 'class')
		{
			while (($oParent instanceof DOMElement) && ($oParent->tagName == $oNode->tagName) && $oParent->hasAttribute('id'))
			{
				$oParent = $oParent->parentNode;
			}
		}
		// Recursively create the path for the parent
		if ($oParent instanceof DOMElement)
		{
			$oParentClone = $this->ImportNodeAndPathDelta($oTargetDoc, $oParent);
		}
		else
		{
			// We've reached the top let's add the node into the root recipient
			$oParentClone = $oTargetDoc;
		}
		// Look for the node into the parent node
		// Note: this is an identified weakness of the algorithm,
		//       because for each node modified, and each node of its path
		//       we will have to lookup for the existing entry
		//       Anyhow, this loop is quite quick to execute because in the delta
		//       the number of nodes is limited
		$oNodeClone = null;
		foreach ($oParentClone->childNodes as $oChild)
		{
			if (($oChild instanceof DOMElement) && ($oChild->tagName == $oNode->tagName))
			{
				if (!$oNode->hasAttribute('id') || ($oNode->getAttribute('id') == $oChild->getAttribute('id')))
				{
					$oNodeClone = $oChild;
					break;
				}
			}
		} 
		if (!$oNodeClone)
		{
			$sAlteration = $oNode->getAttribute('_alteration');
			$bCopyContents = ($sAlteration == 'replaced') || ($sAlteration == 'added') || ($sAlteration == 'needed');
			$oNodeClone = $oTargetDoc->importNode($oNode->cloneNode($bCopyContents), $bCopyContents);
			$oNodeClone->removeAttribute('_alteration');
			if ($oNodeClone->hasAttribute('_old_id'))
			{
				$oNodeClone->setAttribute('_rename_from', $oNodeClone->getAttribute('_old_id'));
				$oNodeClone->removeAttribute('_old_id');
			}
			switch ($sAlteration)
			{
			case '':
				if ($oNodeClone->hasAttribute('id'))
				{
					$oNodeClone->setAttribute('_delta', 'must_exist');
				}
				break;
			case 'added':
				$oNodeClone->setAttribute('_delta', 'define');
				break;
			case 'replaced':
				$oNodeClone->setAttribute('_delta', 'redefine');
				break;
			case 'removed':
				$oNodeClone->setAttribute('_delta', 'delete');
				break;
			case 'needed':
				$oNodeClone->setAttribute('_delta', 'define_if_not_exists');
				break;
			}
			$oParentClone->appendChild($oNodeClone);
		}
		return $oNodeClone;
	}

	/**
	 * Get the text/XML version of the delta
	 */	
	public function GetDelta($aNodesToIgnore = array(), $iRevisionId = null)
	{
		$oDelta = new MFDocument();
		foreach($this->ListChanges() as $oAlteredNode)
		{
			$this->ImportNodeAndPathDelta($oDelta, $oAlteredNode);
		}
		foreach($aNodesToIgnore as $sXPath)
		{
			$oNodesToRemove = $oDelta->GetNodes($sXPath);
			foreach($oNodesToRemove as $oNode)
			{
				$oNode->parentNode->removeChild($oNode);
			}
		}
		if ($iRevisionId != null)
		{
			$oDelta->documentElement->setAttribute('revision_id', $iRevisionId);
		}
		return $oDelta->saveXML();
	}
	
	/**
	 * Searches on disk in the root directories for module description files
	 * and returns an array of MFModules
	 * @return array Array of MFModules
	 */
	public function FindModules()
	{
		$aAvailableModules = ModuleDiscovery::GetAvailableModules($this->aRootDirs);
		$aResult = array();
		foreach($aAvailableModules as $sId => $aModule)
		{
			$aResult[] = new MFModule($sId, $aModule['root_dir'], $aModule['label']);
		}
		return $aResult;
	}
	
	public function TestAlteration()
	{
		try
		{
			$sHeader = '<?xml version="1.0" encoding="utf-8"?'.'>';
			$sOriginalXML =
<<<EOF
$sHeader
<itop_design>
	<a id="first a">
		<b>Text</b>
		<c id="1">
			<d>D1</d>
			<d>D2</d>
		</c>
	</a>
	<a id="second a">
		<parent>first a</parent>
	</a>
	<a id="third a">
		<parent>first a</parent>
		<x>blah</x>
	</a>
</itop_design>
EOF;

			$this->oDOMDocument = new MFDocument();
			$this->oDOMDocument->loadXML($sOriginalXML);
	
			// DOM Get the original values, then modify its contents by the mean of the API
			$oRoot = $this->GetNodes('//itop_design')->item(0);
			//$oRoot->Dump();
			$sDOMOriginal = $oRoot->Dump(true);
	
			$oNode = $oRoot->GetNodes('a/b')->item(0);
			$oNew = $this->oDOMDocument->CreateElement('b', 'New text');
			$oNode->parentNode->RedefineChildNode($oNew);		
	
			$oNode = $oRoot->GetNodes('a/c')->item(0);
			$oNewC = $this->oDOMDocument->CreateElement('c');
			$oNewC->setAttribute('id', '1');
			$oNode->parentNode->RedefineChildNode($oNewC);		

			$oNewC->appendChild($this->oDOMDocument->CreateElement('d', 'x'));
			$oNewC->appendChild($this->oDOMDocument->CreateElement('d', 'y'));
			$oNewC->appendChild($this->oDOMDocument->CreateElement('d', 'z'));
			$oNamedNode = $this->oDOMDocument->CreateElement('z');
			$oNamedNode->setAttribute('id', 'abc');
			$oNewC->AddChildNode($oNamedNode);
			$oNewC->AddChildNode($this->oDOMDocument->CreateElement('r', 'to be replaced'));

			// Alter this "modified node", no flag should be set in its subnodes
			$oNewC->Rename('blah');
			$oNewC->Rename('foo');
			$oNewC->AddChildNode($this->oDOMDocument->CreateElement('y', '(no flag)'));
			$oNewC->AddChildNode($this->oDOMDocument->CreateElement('x', 'To delete programatically'));
			$oSubNode = $oNewC->GetUniqueElement('z');
			$oSubNode->Rename('abcdef');
			$oSubNode = $oNewC->GetUniqueElement('x');
			$oSubNode->Delete();
			$oNewC->RedefineChildNode($this->oDOMDocument->CreateElement('r', 'replacement'));		

			$oNode = $oRoot->GetNodes("//a[@id='second a']")->item(0);
			$oNode->Rename('el 2o A');		
			$oNode->Rename('el secundo A');		
			$oNew = $this->oDOMDocument->CreateElement('e', 'Something new here');
			$oNode->AddChildNode($oNew);		
			$oNewA = $this->oDOMDocument->CreateElement('a');
			$oNewA->setAttribute('id', 'new a');
			$oNode->AddChildNode($oNewA);		
			$oSubnode = $this->oDOMDocument->CreateElement('parent', 'el secundo A');
			$oSubnode->setAttribute('id', 'to be changed');
			$oNewA->AddChildNode($oSubnode);
			$oNewA->AddChildNode($this->oDOMDocument->CreateElement('f', 'Welcome to the newcomer'));
			$oNewA->AddChildNode($this->oDOMDocument->CreateElement('x', 'To delete programatically'));
	
			// Alter this "new a", as it is new, no flag should be set
			$oNewA->Rename('new_a');
			$oSubNode = $oNewA->GetUniqueElement('parent');
			$oSubNode->Rename('alter ego');
			$oNewA->RedefineChildNode($this->oDOMDocument->CreateElement('f', 'dummy data'));
			$oSubNode = $oNewA->GetUniqueElement('x');
			$oSubNode->Delete();
	
			$oNode = $oRoot->GetNodes("//a[@id='third a']")->item(0);
			$oNode->Delete();		
	
			//$oRoot->Dump();
			$sDOMModified = $oRoot->Dump(true);

			// Compute the delta
			//
			$sDeltaXML = $this->GetDelta();
			//echo "<pre>\n";
			//echo htmlentities($sDeltaXML);
			//echo "</pre>\n";
	
			// Reiterating - try to remake the DOM by applying the computed delta
			//
			$this->oDOMDocument = new MFDocument();
			$this->oDOMDocument->loadXML($sOriginalXML);
			$oRoot = $this->GetNodes('//itop_design')->item(0);
			//$oRoot->Dump();
			echo "<h4>Rebuild the DOM - Delta applied...</h4>\n";
			$oDeltaDoc = new MFDocument();
			$oDeltaDoc->loadXML($sDeltaXML);
			
			//$oDeltaDoc->Dump();
			//$this->oDOMDocument->Dump();
			$oDeltaRoot = $oDeltaDoc->childNodes->item(0);
			$this->LoadDelta($oDeltaDoc, $oDeltaRoot, $this->oDOMDocument);
			//$oRoot->Dump();
			$sDOMRebuilt = $oRoot->Dump(true);
		}
		catch (Exception $e)
		{
			echo "<h1>Exception: ".$e->getMessage()."</h1>\n";
			echo "<pre>\n";
			debug_print_backtrace();
			echo "</pre>\n";
		}
		$sArrStyle = "font-size: 40;";
		echo "<table>\n";
		echo " <tr>\n";
		echo "  <td width=\"50%\">\n";
		echo "   <h4>DOM - Original values</h4>\n";
		echo "   <pre>".htmlentities($sDOMOriginal)."</pre>\n";
		echo "  </td>\n";
		echo "  <td width=\"50%\" align=\"left\" valign=\"center\"><span style=\"$sArrStyle\">&rArr; &rArr; &rArr;</span></td>\n";
		echo " </tr>\n";
		echo " <tr><td align=\"center\"><span style=\"$sArrStyle\">&dArr;</div></td><td align=\"center\"><span style=\"$sArrStyle\"><span style=\"$sArrStyle\">&dArr;</div></div></td></tr>\n";
		echo " <tr>\n";
		echo "  <td width=\"50%\">\n";
		echo "   <h4>DOM - Altered with various changes</h4>\n";
		echo "   <pre>".htmlentities($sDOMModified)."</pre>\n";
		echo "  </td>\n";
		echo "  <td width=\"50%\">\n";
		echo "   <h4>DOM - Rebuilt from the Delta</h4>\n";
		echo "   <pre>".htmlentities($sDOMRebuilt)."</pre>\n";
		echo "  </td>\n";
		echo " </tr>\n";
		echo " <tr><td align=\"center\"><span style=\"$sArrStyle\">&dArr;</div></td><td align=\"center\"><span style=\"$sArrStyle\">&uArr;</div></td></tr>\n";
		echo "  <td width=\"50%\">\n";
		echo "   <h4>Delta (Computed by ModelFactory)</h4>\n";
		echo "   <pre>".htmlentities($sDeltaXML)."</pre>\n";
		echo "  </td>\n";
		echo "  <td width=\"50%\" align=\"left\" valign=\"center\"><span style=\"$sArrStyle\">&rArr; &rArr; &rArr;</span></td>\n";
		echo " </tr>\n";
		echo "</table>\n";
	} // TEST !


	/**
	 * Extracts some nodes from the DOM
	 * @param string $sXPath A XPath expression
	 * @return DOMNodeList
	 */
	public function GetNodes($sXPath, $oContextNode = null)
	{
		return $this->oDOMDocument->GetNodes($sXPath, $oContextNode);
	}

	public function ListActiveChildNodes($sContextXPath, $sTagName)
	{
		$oContextPath = $this->oRoot->GetNodes($sContextXPath)->item(0);
		return $oContextPath->ListActiveChildNodes($sTagName);
	}
}


/**
 * Allow the setup page to load and perform its checks (including the check about the required extensions)
 */
if (!class_exists('DOMElement'))
{
class DOMElement {function __construct(){throw new Exception('The dom extension is not enabled');}}
}

/**
 * MFElement: helper to read/change the DOM
 * @package ModelFactory
 */
class MFElement extends DOMElement
{
	/**
	 * Extracts some nodes from the DOM
	 * @param string $sXPath A XPath expression
	 * @return DOMNodeList
	 */
	public function GetNodes($sXPath)
	{
		return $this->ownerDocument->GetNodes($sXPath, $this);
	}

	/**
	 * Extracts some nodes from the DOM (active nodes only !!!)
	 * @param string $sXPath A XPath expression
	 * @return DOMNodeList
	 */
	public function GetNodeById($sXPath, $sId)
	{
		return $this->ownerDocument->GetNodeById($sXPath, $sId, $this);
	}

	/**
	 * For debugging purposes
	 */
	public function Dump($bReturnRes = false)
	{
		$oMFDoc = new MFDocument();
		$oClone = $oMFDoc->importNode($this->cloneNode(true), true);
		$oMFDoc->appendChild($oClone);

		$sXml = $oMFDoc->saveXML($oClone);
		if ($bReturnRes)
		{
			return $sXml;
		}
		else
		{
			echo "<pre>\n";
			echo htmlentities($sXml);
			echo "</pre>\n";	 	
		}
	}

	/**
	 * Returns the node directly under the given node 
	 */ 
	public function GetUniqueElement($sTagName, $bMustExist = true)
	{
		$oNode = null;
		foreach($this->childNodes as $oChildNode)
		{
			if ($oChildNode->nodeName == $sTagName)
			{
				$oNode = $oChildNode;
				break;
			}
		}
		if ($bMustExist && is_null($oNode))
		{
			throw new DOMFormatException('Missing unique tag: '.$sTagName);
		}
		return $oNode;
	}
	
	/**
	 * Returns the node directly under the current node, or null if missing 
	 */ 
	public function GetOptionalElement($sTagName)
	{
		return $this->GetUniqueElement($sTagName, false);
	}
	
	
	/**
	 * Returns the TEXT of the current node (possibly from several subnodes) 
	 */ 
	public function GetText($sDefault = null)
	{
		$sText = null;
		foreach($this->childNodes as $oChildNode)
		{
			if ($oChildNode instanceof DOMCharacterData) // Base class of DOMText and DOMCdataSection
			{
				if (is_null($sText)) $sText = '';
				$sText .= $oChildNode->wholeText;
			}
		}
		if (is_null($sText))
		{
			return $sDefault;
		}
		else
		{
			return $sText;
		}
	}
	
	/**
	 * Get the TEXT value from the child node 
	 */ 
	public function GetChildText($sTagName, $sDefault = null)
	{
		$sRet = $sDefault;
		if ($oChild = $this->GetOptionalElement($sTagName))
		{
			$sRet = $oChild->GetText($sDefault);
		}
		return $sRet;
	}

	/**
	 * Assumes the current node to be either a text or
	 * <items>
	 *   <item [key]="..."]>value<item>
	 *   <item [key]="..."]>value<item>
	 * </items>
	 * where value can be the either a text or an array of items... recursively 
	 * Returns a PHP array 
	 */ 
	public function GetNodeAsArrayOfItems($sElementName = 'items')
	{
		$oItems = $this->GetOptionalElement($sElementName);
		if ($oItems)
		{
			$res = array();
			$aRanks = array();
			foreach($oItems->childNodes as $oItem)
			{
				if ($oItem instanceof DOMElement)
				{
					// When an attribute is missing
					if ($oItem->hasAttribute('id'))
					{
						$key = $oItem->getAttribute('id');
						if (array_key_exists($key, $res))
						{
							// Houston!
							throw new DOMFormatException("Tag ".$oItem->getNodePath().", id '$key' already used!!!");
						}
						$res[$key] = $oItem->GetNodeAsArrayOfItems();
					}
					else
					{
						$res[] = $oItem->GetNodeAsArrayOfItems();
					}
					$sRank = $oItem->GetChildText('rank');
					if ($sRank != '')
					{
						$aRanks[] = (float) $sRank;
					}
					else
					{
						$aRanks[] = count($aRanks) > 0 ? max($aRanks) + 1 : 0;
					}
					array_multisort($aRanks, $res);
				}
			}
		}
		else
		{
			$res = $this->GetText();
		}
		return $res;
	}

	public function SetNodeAsArrayOfItems($aList)
	{
		$oNewNode = $this->ownerDocument->CreateElement($this->tagName);
		if ($this->getAttribute('id') != '')
		{
			$oNewNode->setAttribute('id', $this->getAttribute('id'));
		}
		self::AddItemToNode($this->ownerDocument, $oNewNode, $aList);
		$this->parentNode->RedefineChildNode($oNewNode);
	}
	
	protected static function AddItemToNode($oXmlDoc, $oXMLNode, $itemValue)
	{
		if (is_array($itemValue))
		{
			$oXmlItems = $oXmlDoc->CreateElement('items');
			$oXMLNode->AppendChild($oXmlItems);
			
			foreach($itemValue as $key => $item)
			{
				$oXmlItem = $oXmlDoc->CreateElement('item');
				$oXmlItems->AppendChild($oXmlItem);
	
				if (is_string($key))
				{
					$oXmlItem->SetAttribute('key', $key);
				}
				self::AddItemToNode($oXmlDoc, $oXmlItem, $item);
			}
		}
		else
		{
			$oXmlText = $oXmlDoc->CreateTextNode((string) $itemValue);
			$oXMLNode->AppendChild($oXmlText);
		}
	}

	/**
	 * Helper to remove child nodes	
	 */	
	public function DeleteChildren()
	{
		while (isset($this->firstChild))
		{
			if ($this->firstChild instanceof MFElement)
			{
				$this->firstChild->DeleteChildren();
			}
			$this->removeChild($this->firstChild);
		}
	} 

	/**
	 * Find the child node matching the given node
	 * @param MFElement $oRefNode The node to search for
	 * @param bool      $sSearchId substitutes to the value of the 'id' attribute 
	 */	
	public function FindExistingChildNode(MFElement $oRefNode, $sSearchId = null)
	{
		return self::FindNode($this, $oRefNode, $sSearchId);
	}
	
	/**
	 * Seems to work fine (and is about 10 times faster than above) EXCEPT for menus !!!!
	 * @param unknown_type $oParent
	 * @param unknown_type $oRefNode
	 * @param unknown_type $sSearchId
	 * @throws Exception
	 */
	public static function FindNode(DOMNode $oParent, MFElement $oRefNode, $sSearchId = null)
	{
		$oRes = null;
		if ($oParent instanceof DOMDocument)
		{
			$oDoc = $oParent->firstChild->ownerDocument;
			$oRoot = $oParent;
		}
		else
		{
			$oDoc = $oParent->ownerDocument;
			$oRoot = $oParent;
		}

		$oXPath = new DOMXPath($oDoc);
		if ($oRefNode->hasAttribute('id'))
		{
			// Find the first element having the same tag name and id
			if (!$sSearchId)
			{
				$sSearchId = $oRefNode->getAttribute('id');
			}
			$sXPath = './'.$oRefNode->tagName."[@id='$sSearchId']";
		
			$oRes = $oXPath->query($sXPath, $oRoot)->item(0);
		}
		else
		{
			// Get the first one having the same tag name (ignore others)
			$sXPath = './'.$oRefNode->tagName;
		
			$oRes = $oXPath->query($sXPath, $oRoot)->item(0);
		}
		return $oRes;
	}
	
	public function ListActiveChildNodes($sTagName)
	{
		$sXPath = $sTagName."[not(@_alteration) or @_alteration!='removed']";
		return $this->GetNodes($sXPath);
	}


	/**
	 * Check if the current node is under a node 'added' or 'altered'
	 * Usage: In such a case, the change must not be tracked	 	
	 */
	 public function IsInDefinition()
	 {
		// Iterate through the parents: reset the flag if any of them has a flag set 
		for($oParent = $this ; $oParent instanceof MFElement ; $oParent = $oParent->parentNode)
		{
			if ($oParent->getAttribute('_alteration') != '')
			{
				return true;
			}
		}
		return false;
	}
	

	/**
	 * Add a node and set the flags that will be used to compute the delta
	 * @param MFElement $oNode The node (including all subnodes) to add
	 */	
	public function AddChildNode(MFElement $oNode)
	{
		// First: cleanup any flag behind the new node
		$oNode->ApplyChanges();
	
		$oExisting = $this->FindExistingChildNode($oNode);
		if ($oExisting)
		{
			if ($oExisting->getAttribute('_alteration') != 'removed')
			{
				throw new Exception("Attempting to add a node that already exists: $oNode->tagName (id: ".$oNode->getAttribute('id')."");
			}
			$oExisting->ReplaceWith($oNode);
			$sFlag = 'replaced';
		}
		else
		{
			$this->appendChild($oNode);
			$sFlag = 'added';
		}
		if (!$this->IsInDefinition())
		{
			$oNode->setAttribute('_alteration', $sFlag);
		}
	}

	/**
	 * Modify a node and set the flags that will be used to compute the delta
	 * @param MFElement $oNode       The node (including all subnodes) to set
	 */	
	public function RedefineChildNode(MFElement $oNode, $sSearchId = null)
	{
		// First: cleanup any flag behind the new node
		$oNode->ApplyChanges();

		$oExisting = $this->FindExistingChildNode($oNode, $sSearchId);
		if (!$oExisting)
		{
			throw new Exception("Attempting to modify a non existing node: $oNode->tagName (id: ".$oNode->getAttribute('id').")");
		}
		$sPrevFlag = $oExisting->getAttribute('_alteration');
		if ($sPrevFlag == 'removed')
		{
			throw new Exception("Attempting to modify a deleted node: $oNode->tagName (id: ".$oNode->getAttribute('id')."");
		}
		$oExisting->ReplaceWith($oNode);
		if (!$this->IsInDefinition())
		{
			if ($sPrevFlag == '')
			{
				$sPrevFlag = 'replaced';
			}
			$oNode->setAttribute('_alteration', $sPrevFlag);
		}
	}

	/**
	 * Combination of AddChildNode or RedefineChildNode... it depends
	 * This should become the preferred way of doing things (instead of implementing a test + the call to one of the APIs!
	 * @param MFElement $oNode       The node (including all subnodes) to set
	 */	
	public function SetChildNode(MFElement $oNode, $sSearchId = null)
	{
		// First: cleanup any flag behind the new node
		$oNode->ApplyChanges();

		$oExisting = $this->FindExistingChildNode($oNode, $sSearchId);
		if ($oExisting)
		{
			$sPrevFlag = $oExisting->getAttribute('_alteration');
			if ($sPrevFlag == 'removed')
			{
				$sFlag = 'replaced';
			}
			else
			{
				$sFlag = $sPrevFlag; // added, replaced or ''
			}
			$oExisting->ReplaceWith($oNode);
		}
		else
		{
			$this->appendChild($oNode);
			$sFlag = 'added';
		}
		if (!$this->IsInDefinition())
		{
			if ($sFlag == '')
			{
				$sFlag = 'replaced';
			}
			$oNode->setAttribute('_alteration', $sFlag);
		}
	}

	/**
	 * Check that the current node is actually a class node, under classes
	 */	
	protected function IsClassNode()
	{
		if ($this->tagName == 'class')
		{
			return $this->parentNode->IsClassNode();
		}
		elseif (($this->tagName == 'classes') && ($this->parentNode->tagName == 'itop_design') ) // Beware: classes/class also exists in the group definition
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	/**
	 * Replaces a node by another one, making sure that recursive nodes are preserved
	 * @param MFElement $oNewNode The replacement
	 */	
	protected function ReplaceWith($oNewNode)
	{
		// Move the classes from the old node into the new one
		if ($this->IsClassNode())
		{
			foreach($this->GetNodes('class') as $oChild)
			{
				$oNewNode->appendChild($oChild);
			}
		}

		$oParentNode = $this->parentNode;
		$oParentNode->replaceChild($oNewNode, $this);
	}

	/**
	 * Remove a node and set the flags that will be used to compute the delta
	 */	
	public function Delete()
	{
		$oParent = $this->parentNode;
		switch ($this->getAttribute('_alteration'))
		{
		case 'replaced':
			$sFlag = 'removed';
			break;
		case 'added':
		case 'needed':
			$sFlag = null;
			break;
		case 'removed':
			throw new Exception("Attempting to remove a deleted node: $this->tagName (id: ".$this->getAttribute('id')."");

		default:
			$sFlag = 'removed';
			if ($this->IsInDefinition())
			{
				$sFlag = null;
				break;
			}
		}
		if ($sFlag)
		{
			$this->setAttribute('_alteration', $sFlag);
			$this->DeleteChildren();
		}
		else
		{
			// Remove the node entirely
			$this->parentNode->removeChild($this);
		}
	}

	/**
	 * Merge the current node into the given container
	 * 	 
	 * @param DOMNode $oContainer An element or a document	 
	 * @param string  $sSearchId  The id to consider (could be blank)
	 * @param bool    $bMustExist Throw an exception if the node must already be found (and not marked as deleted!)
	 */
	public function MergeInto($oContainer, $sSearchId, $bMustExist)
	{
		$oTargetNode = $oContainer->FindExistingChildNode($this, $sSearchId);
		if ($oTargetNode)
		{
			if ($oTargetNode->getAttribute('_alteration') == 'removed')
			{
				if ($bMustExist)
				{
					throw new Exception("found mandatory node $this->tagName(id:$sSearchId) marked as deleted in ".$oContainer->getNodePath());
				}
				// Beware: ImportNode(xxx, false) DOES NOT copy the node's attribute on *some* PHP versions (<5.2.17)
				// So use this workaround to import a node and its attributes on *any* PHP version
				$oTargetNode = $oContainer->ownerDocument->ImportNode($this->cloneNode(false), true);
				$oContainer->AddChildNode($oTargetNode);
			}
		}
		else
		{
			if ($bMustExist)
			{
				echo "Dumping parent node<br/>\n";
				$oContainer->Dump();
				throw new Exception("could not find $this->tagName(id:$sSearchId) in ".$oContainer->getNodePath());
			}
			// Beware: ImportNode(xxx, false) DOES NOT copy the node's attribute on *some* PHP versions (<5.2.17)
			// So use this workaround to import a node and its attributes on *any* PHP version
			$oTargetNode = $oContainer->ownerDocument->ImportNode($this->cloneNode(false), true);
			$oContainer->AddChildNode($oTargetNode);
		}
		return $oTargetNode;
	}

	/**
	 * Renames a node and set the flags that will be used to compute the delta
	 * @param String    $sNewId The new id	 
	 */	
	public function Rename($sId)
	{
		if (($this->getAttribute('_alteration') == 'replaced') || !$this->IsInDefinition())
		{
			$sOriginalId = $this->getAttribute('_old_id');
			if ($sOriginalId == '')
			{
				$this->setAttribute('_old_id', $this->getAttribute('id'));
			}
			else if($sOriginalId == $sId)
			{
				$this->removeAttribute('_old_id');
			}
		}
		$this->setAttribute('id', $sId);
	}

	/**
	 * Apply extensibility rules onto this node
	 * @param array aRules Array of rules (strings)
	 * @return void
	 */
	 public function RestrictExtensibility($aRules)
	 {
	 	$oRulesNode = $this->GetOptionalElement('rules');
	 	if ($oRulesNode)
	 	{
	 		$aCurrentRules = $oRulesNode->GetNodeAsArrayOfItems();
	 		$aCurrentRules = array_merge($aCurrentRules, $aRules);
	 		$oRulesNode->SetNodeAsArrayOfItems($aCurrentRules);
	 	}
	 	else
	 	{
	 		$oNewNode = $this->ownerDocument->CreateElement('rules');
	 		$this->appendChild($oNewNode);
	 		$oNewNode->SetNodeAsArrayOfItems($aRules);
	 	}
	 }	 	

	/**
	 * Read extensibility rules for this node
	 * @return Array of rules (strings)
	 */
	 public function GetExtensibilityRules()
	 {
		$aCurrentRules = array();
		$oRulesNode = $this->GetOptionalElement('rules');
		if ($oRulesNode)
		{
			$aCurrentRules = $oRulesNode->GetNodeAsArrayOfItems();
		}
		return $aCurrentRules;
	 }

	/**
	 * List changes below a given node (see also MFDocument::ListChanges)	
	 */	
	public function ListChanges()
	{
		// Note: omitting the dot will make the query be global to the whole document!!!
		return $this->GetNodes('.//*[@_alteration or @_old_id]');
	}

	/**
	 * List changes below a given node (see also MFDocument::ApplyChanges)	
	 */	
	public function ApplyChanges()
	{
		$oNodes = $this->ListChanges();
		foreach($oNodes as $oNode)
		{
			$sOperation = $oNode->GetAttribute('_alteration');
			switch($sOperation)
			{
				case 'added':
				case 'replaced':
				case 'needed':
				// marked as added or modified, just reset the flag
				$oNode->removeAttribute('_alteration');
				break;
				
				case 'removed':
				// marked as deleted, let's remove the node from the tree
				$oNode->parentNode->removeChild($oNode);
				break;
			}
			if ($oNode->hasAttribute('_old_id'))
			{
				$oNode->removeAttribute('_old_id');
			}
		}
	}
}

/**
 * Allow the setup page to load and perform its checks (including the check about the required extensions)
 */
if (!class_exists('DOMDocument'))
{
class DOMDocument {function __construct(){throw new Exception('The dom extension is not enabled');}}
}

/**
 * MFDocument - formating rules for XML input/output
 * @package ModelFactory
 */
class MFDocument extends DOMDocument
{
	public function __construct()
	{
		parent::__construct('1.0', 'UTF-8');
		$this->registerNodeClass('DOMElement', 'MFElement');

		$this->formatOutput = true; // indent (must be loaded with option LIBXML_NOBLANKS)
		$this->preserveWhiteSpace = true; // otherwise the formatOutput option would have no effect
	}

	/**
	 * Overload of the standard API	
	 */
	public function load($filename, $options = 0)
	{
		parent::load($filename, LIBXML_NOBLANKS);
	}

	/**
	 * Overload of the standard API	
	 */
	public function loadXML($source, $options = 0)
	{
		parent::loadXML($source, LIBXML_NOBLANKS);
	}

	/**
	 * Overload the standard API
	 */
	public function saveXML(DOMNode $node = null, $options = 0)
	{
		$oRootNode = $this->firstChild;
		if (!$oRootNode)
		{
			$oRootNode = $this->createElement('itop_design'); // make sure that the document is not empty
			$oRootNode->setAttribute('xmlns:xsi', "http://www.w3.org/2001/XMLSchema-instance");
			$this->appendChild($oRootNode);
		}
		return parent::saveXML();
	}
	/**
	 * For debugging purposes
	 */
	public function Dump($bReturnRes = false)
	{
		$sXml = $this->saveXML();
		if ($bReturnRes)
		{
			return $sXml;
		}
		else
		{
			echo "<pre>\n";
			echo htmlentities($sXml);
			echo "</pre>\n";	 	
		}
	}

	/**
	 * Find the child node matching the given node
	 * @param MFElement $oRefNode The node to search for
	 * @param bool      $sSearchId substitutes to the value of the 'id' attribute 
	 */	
	public function FindExistingChildNode(MFElement $oRefNode, $sSearchId = null)
	{
		return MFElement::FindNode($this, $oRefNode, $sSearchId);
	}

	/**
	 * Extracts some nodes from the DOM
	 * @param string $sXPath A XPath expression
	 * @return DOMNodeList
	 */
	public function GetNodes($sXPath, $oContextNode = null)
	{
		$oXPath = new DOMXPath($this);
		
		if (is_null($oContextNode))
		{
			return $oXPath->query($sXPath);
		}
		else
		{
			return $oXPath->query($sXPath, $oContextNode);
		}
	}
	
	public function GetNodeById($sXPath, $sId, $oContextNode = null)
	{
		$oXPath = new DOMXPath($this);
		$sXPath .= "[@id='$sId' and(not(@_alteration) or @_alteration!='removed')]";
		
		if (is_null($oContextNode))
		{
			return $oXPath->query($sXPath);
		}
		else
		{
			return $oXPath->query($sXPath, $oContextNode);
		}
	}
}