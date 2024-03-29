<?php
// Copyright (C) 2014 TeemIp
//
//   This file is part of TeemIp.
//
//   TeemIp is free software; you can redistribute it and/or modify	
//   it under the terms of the GNU Affero General Public License as published by
//   the Free Software Foundation, either version 3 of the License, or
//   (at your option) any later version.
//
//   TeemIp is distributed in the hope that it will be useful,
//   but WITHOUT ANY WARRANTY; without even the implied warranty of
//   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//   GNU Affero General Public License for more details.
//
//   You should have received a copy of the GNU Affero General Public License
//   along with TeemIp. If not, see <http://www.gnu.org/licenses/>

/**
 * @copyright   Copyright (C) 2014 TeemIp
 * @copyright   Copyright (C) 2014 ITOMIG GmbH (deutsche Übersetzung)
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

//////////////////////////////////////////////////////////////////////
// Classes in 'Teemip-Network-Mgmt Module'
//////////////////////////////////////////////////////////////////////
//

//
// Class: DNSObject
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:DNSObject' => 'DNS Objekt',
	'Class:DNSObject+' => '',
	'Class:DNSObject/Attribute:org_id' => 'Organisation',
	'Class:DNSObject/Attribute:org_id+' => '',
	'Class:DNSObject/Attribute:org_name' => 'Organizationsname',
	'Class:DNSObject/Attribute:org_name+' => '',
	'Class:DNSObject/Attribute:name' => 'Name des DNS Objekts',
	'Class:DNSObject/Attribute:name+' => '',
	'Class:DNSObject/Attribute:comment' => 'Beschreibung',
	'Class:DNSObject/Attribute:comment+' => '',
));

//
// Class: Domain
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:Domain' => 'Domain',
	'Class:Domain+' => 'DNS Domain',
	'Class:Domain:baseinfo' => 'Allgemeine Informationen',
	'Class:Domain:admininfo' => 'Administrative Informationen',
	'Class:Domain/Attribute:name' => 'Name',
	'Class:Domain/Attribute:name+' => '',
	'Class:Domain/Attribute:parent_id' => 'Parent',
	'Class:Domain/Attribute:parent_id+' => '',
	'Class:Domain/Attribute:parent_name' => 'Parent Name',
	'Class:Domain/Attribute:parent_name+' => '',
	'Class:Domain/Attribute:requestor_id' => 'Anforderung durch',
	'Class:Domain/Attribute:requestor_id+' => '',
	'Class:Domain/Attribute:requestor_name' => 'Name des Anfordernden',
	'Class:Domain/Attribute:requestor_name+' => '',
	'Class:Domain/Attribute:release_date' => 'Freigabe Datum',
	'Class:Domain/Attribute:release_date+' => 'Datum, an dem die Domain wieder freigegeben wurde und nicht mehr benutzt wurde.',
	'Class:Domain/Attribute:registrar' => 'Internet Registrar',
	'Class:Domain/Attribute:registrar+' => 'Registrar, Organisation, die die Allokierung von Domain Namen überwacht.',
	'Class:Domain/Attribute:validity_start' => 'Startdatum',
	'Class:Domain/Attribute:validity_start+' => 'Datum, ab dem die Domain gültig ist.',
	'Class:Domain/Attribute:validity_end' => 'Enddatum',
	'Class:Domain/Attribute:validity_end+' => 'Datum, nach dem die Domain nicht mehr gültig ist.',
	'Class:Domain/Attribute:renewal' => 'Verlängerung (Renewal)',
	'Class:Domain/Attribute:renewal+' => 'Verlängerungsmethode',
	'Class:Domain/Attribute:renewal/Value:na' => 'Nicht zutreffend',
	'Class:Domain/Attribute:renewal/Value:manual' => 'Manuell',
	'Class:Domain/Attribute:renewal/Value:automatic' => 'Automatisch',
));

//
// Class extensions for Domain
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:Domain/Tab:hosts' => 'Hosts (%1$s)',
	'Class:Domain/Tab:hosts+' => 'Hosts, die zur Domain gehören',
	'Class:Domain/Tab:child_domain' => 'Child Domains (%1$s)',
	'Class:Domain/Tab:child_domain+' => 'Child Domains, die direkt angehängt sind.',
));

//
// Class: WANLink
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:WANLink' => 'WAN Link',
	'Class:WANLink+' => 'Wide Area Network Link',
	'Class:WANLink:baseinfo' => 'Allgemeine Informationen',
	'Class:WANLink:carrierinfo' => 'Anbieter Informationen',
	'Class:WANLink/Attribute:status' => 'Status',
	'Class:WANLink/Attribute:status+' => '',
	'Class:WANLink/Attribute:status/Value:implementation' => 'Implementatierung',
	'Class:WANLink/Attribute:status/Value:implementation+' => '',
	'Class:WANLink/Attribute:status/Value:production' => 'Produktion',
	'Class:WANLink/Attribute:status/Value:production+' => '',
	'Class:WANLink/Attribute:status/Value:obsolete' => 'Veraltet (obsolet)',
	'Class:WANLink/Attribute:status/Value:obsolete+' => '',
	'Class:WANLink/Attribute:status/Value:stock' => 'Lager',
	'Class:WANLink/Attribute:status/Value:stock+' => '',
	'Class:WANLink/Attribute:location_id1' => 'Standort #1',
	'Class:WANLink/Attribute:location_id1+' => 'Standort des einen Ende des Links',
	'Class:WANLink/Attribute:location_name1' => 'Name des Standorts #1',
	'Class:WANLink/Attribute:location_name1+' => '',
	'Class:WANLink/Attribute:location_id2' => 'Standort #2',
	'Class:WANLink/Attribute:location_id2+' => 'Standort des anderen Ende des Links',
	'Class:WANLink/Attribute:location_name2' => 'Name des Standorts #2',
	'Class:WANLink/Attribute:location_name2+' => '',
	'Class:WANLink/Attribute:carrier' => 'Anbieter',
	'Class:WANLink/Attribute:carrier+' => '',
	'Class:WANLink/Attribute:carrier_reference' => 'Anbieter Referenz',
	'Class:WANLink/Attribute:carrier_reference+' => '',
	'Class:WANLink/Attribute:networkinterface_id1' => 'Netzwerk Interface #1',
	'Class:WANLink/Attribute:networkinterface_id1+' => 'Netzwerk Interface am Standort #1',
	'Class:WANLink/Attribute:networkinterface_name1' => 'Name des Netzwerk Interfaces #1',
	'Class:WANLink/Attribute:networkinterface_name1+' => '',
	'Class:WANLink/Attribute:networkinterface_id2' => 'Netzwerk Interface #2',
	'Class:WANLink/Attribute:networkinterface_id2+' => 'Netzwerk Interface am Standort #2',
	'Class:WANLink/Attribute:networkinterface_name2' => 'Name des Netzwerk Interfaces #2',
	'Class:WANLink/Attribute:networkinterface_name2+' => '',
	'Class:WANLink/Attribute:purchase_date' => 'Kaufdatum',
	'Class:WANLink/Attribute:purchase_date+' => '',
	'Class:WANLink/Attribute:renewal_date' => 'Verlängerungsdatum (Renewal)',
	'Class:WANLink/Attribute:renewal_date+' => '',
));

//
// Class: ASNumber
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:ASNumber' => 'AS Nummer',
	'Class:ASNumber+' => 'Autonomous System Number',
	'Class:ASNumber:baseinfo' => 'Allgemeine Informationen',
	'Class:ASNumber:admininfo' => 'Administrative Informationen',
	'Class:ASNumber/Attribute:number' => 'Nummer',
	'Class:ASNumber/Attribute:number+' => '',
	'Class:ASNumber/Attribute:registrar' => 'Registrar',
	'Class:ASNumber/Attribute:registrar+' => '',
	'Class:ASNumber/Attribute:whois' => 'Whois',
	'Class:ASNumber/Attribute:whois+' => 'URL zur Whois Information des Registrars',
	'Class:ASNumber/Attribute:move2production' => 'Registrierungsdatum',
	'Class:ASNumber/Attribute:move2production+' => 'Datum, an dem AS registriert wurde.',
	'Class:ASNumber/Attribute:validity_end' => 'Enddatum',
	'Class:ASNumber/Attribute:validity_end+' => 'Datum, nach dem AS nicht mehr gültig ist.',
	'Class:ASNumber/Attribute:renewal_date' => 'Verlängerungsdatum',
	'Class:ASNumber/Attribute:renewal_date+' => 'Datum, an dem AS verlängert wurde',
));

//
// Application Menu
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Menu:ConfigManagement:Network' => 'Netzwerk',
	'Menu:ConfigManagement:Network+' => '',

//
// Management of Domains
//
	// Creation Management	
	'UI:IPManagement:Action:New:Domain:NameCollision' => 'Domain Name existiert bereits!',
		
	// Display list of domains
	'UI:IPManagement:Action:DisplayList:Domain' => 'Listenansicht',
	'UI:IPManagement:Action:DisplayList:Domain+' => '',
	'UI:IPManagement:Action:DisplayList:Domain:PageTitle_Class' => 'DNS Domains',
	'UI:IPManagement:Action:DisplayList:Domain:Title_Class' => 'DNS Domains',
	
	// Display tree of domains
	'UI:IPManagement:Action:DisplayTree:Domain' => 'Baumansicht',
	'UI:IPManagement:Action:DisplayTree:Domain+' => '',
	'UI:IPManagement:Action:DisplayTree:Domain:PageTitle_Class' => 'DNS Domains',
	'UI:IPManagement:Action:DisplayTree:Domain:Title_Class' => 'DNS Domains',
	'UI:IPManagement:Action:DisplayTree:Domain:OrgName' => 'Organisation %1$s',
	
));
	