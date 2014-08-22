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

SetupWebPage::AddModule(
	__FILE__, // Path to the current file, all other file names are relative to the directory containing this file
	'itop-simple-email-synchro',
	array(
		// Identification
		//
		'label' => 'Ticket Creation from Emails',
		'category' => 'business',

		// Setup
		//
		'dependencies' => array(
			'combodo-email-synchro/1.0.0'
		),
		'mandatory' => false,
		'visible' => true,

		// Components
		//
		'datamodel' => array(
			'model.itop-simple-email-synchro.php'
		),
		'webservice' => array(
			
		),
		'data.struct' => array(
			// add your 'structure' definition XML files here,
		),
		'data.sample' => array(
			// add your sample data XML files here,
		),
		
		// Documentation
		//
		'doc.manual_setup' => '', // hyperlink to manual setup documentation, if any
		'doc.more_information' => '', // hyperlink to more information, if any 

		// Default settings
		//
		'settings' => array(
			// Module specific settings
			'protocol' => 'IMAP',
			'mail_server' => 'imap.demo.com',
			'port' => 143,
			'login' => 'mailbox-name',
			'pwd' => 'your-password',
			'mailbox' => '',
			'pop3_auth_option' => 'USER',
			'imap_options' => array('imap'),
			'debug' => false,
			'create_only' => false, // Never update tickets, always create a new ticket for each incoming email
			'exclude_attachment_types' => array('application/exe'), // Example: 'application/exe', 'application/x-winexe', 'application/msdos-windows'
			'ticket_class' => 'UserRequest',
			'default_values' => array(
				// Examples:
				//'org_id' => 'Demo',
				//'service_id' => 'Telecom and connectivity',
				//'servicesubcategory_id' => 'Troubleshooting',
				//'workgroup_id' => 'NW Support',
			),
			'parts_order' => 'text/plain,text/html',
			'title_pattern' => '/R-([0-9]+)/',
		),
	)
);
