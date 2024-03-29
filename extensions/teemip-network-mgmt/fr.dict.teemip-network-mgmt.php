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
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

//////////////////////////////////////////////////////////////////////
// Classes in 'Teemip-Network-Mgmt Module'
//////////////////////////////////////////////////////////////////////
//

//
// Class: DNSObject
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:DNSObject' => 'Object DNS',
	'Class:DNSObject+' => '',
	'Class:DNSObject/Attribute:org_id' => 'Organisation',
	'Class:DNSObject/Attribute:org_id+' => '',
	'Class:DNSObject/Attribute:org_name' => 'Nom Organisation',
	'Class:DNSObject/Attribute:org_name+' => '',
	'Class:DNSObject/Attribute:name' => 'Nom Object DNS',
	'Class:DNSObject/Attribute:name+' => '',
	'Class:DNSObject/Attribute:comment' => 'Description',
	'Class:DNSObject/Attribute:comment+' => '',
));

//
// Class: Domain
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:Domain' => 'Domaine',
	'Class:Domain+' => 'Domaine DNS',
	'Class:Domain:baseinfo' => 'Informations Générales',
	'Class:Domain:admininfo' => 'Informations Administratives',
	'Class:Domain/Attribute:name' => 'Nom',
	'Class:Domain/Attribute:name+' => '',
	'Class:Domain/Attribute:parent_id' => 'Parent',
	'Class:Domain/Attribute:parent_id+' => '',
	'Class:Domain/Attribute:parent_name' => 'Nom Parent',
	'Class:Domain/Attribute:parent_name+' => '',
	'Class:Domain/Attribute:requestor_id' => 'Demandeur',
	'Class:Domain/Attribute:requestor_id+' => '',
	'Class:Domain/Attribute:requestor_name' => 'Nom Demandeur',
	'Class:Domain/Attribute:requestor_name+' => '',
	'Class:Domain/Attribute:release_date' => 'Date de libération',
	'Class:Domain/Attribute:release_date+' => 'Date à laquelle le domaine a été libéré et n\'est plus utilisé.',
	'Class:Domain/Attribute:registrar' => 'Registre Internet',
	'Class:Domain/Attribute:registrar+' => '',
	'Class:Domain/Attribute:validity_start' => 'Date de début de validité',
	'Class:Domain/Attribute:validity_start+' => 'Date après laquelle le domaine est valide.',
	'Class:Domain/Attribute:validity_end' => 'Date de fin de validité',
	'Class:Domain/Attribute:validity_end+' => 'Date après laquelle le domaine n\'est plus valide.',
	'Class:Domain/Attribute:renewal' => 'Renouvellement',
	'Class:Domain/Attribute:renewal+' => 'Méthode de renouvellement',
	'Class:Domain/Attribute:renewal/Value:na' => 'Non Applicable',
	'Class:Domain/Attribute:renewal/Value:manual' => 'Manuelle',
	'Class:Domain/Attribute:renewal/Value:automatic' => 'Automatique',
));

//
// Class extensions for Domain
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:Domain/Tab:hosts' => 'Hosts (%1$s)',
	'Class:Domain/Tab:hosts+' => 'Hosts appartenant au domaine',
	'Class:Domain/Tab:child_domain' => 'Domaines enfants(%1$s)',
	'Class:Domain/Tab:child_domain+' => 'Domaines directement attachés',
));

//
// Class: WANLink
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:WANLink' => 'Lien WAN',
	'Class:WANLink+' => '',
	'Class:WANLink:baseinfo' => 'Informations Générales',
	'Class:WANLink:carrierinfo' => 'Informations Opérateur',
	'Class:WANLink/Attribute:status' => 'Etat',
	'Class:WANLink/Attribute:status+' => '',
	'Class:WANLink/Attribute:status/Value:implementation' => 'Implémentation',
	'Class:WANLink/Attribute:status/Value:implementation+' => '',
	'Class:WANLink/Attribute:status/Value:production' => 'Production',
	'Class:WANLink/Attribute:status/Value:production+' => '',
	'Class:WANLink/Attribute:status/Value:obsolete' => 'Obsolète',
	'Class:WANLink/Attribute:status/Value:obsolete+' => '',
	'Class:WANLink/Attribute:status/Value:stock' => 'En stock',
	'Class:WANLink/Attribute:status/Value:stock+' => '',
	'Class:WANLink/Attribute:location_id1' => 'Site #1',
	'Class:WANLink/Attribute:location_id1+' => 'Site à un bout du lien',
	'Class:WANLink/Attribute:location_name1' => 'Nom du site #1',
	'Class:WANLink/Attribute:location_name1+' => '',
	'Class:WANLink/Attribute:location_id2' => 'Site #2',
	'Class:WANLink/Attribute:location_id2+' => 'Site à l\'autre bout',
	'Class:WANLink/Attribute:location_name2' => 'Nom du site #2',
	'Class:WANLink/Attribute:location_name2+' => '',
	'Class:WANLink/Attribute:carrier' => 'Opérateur',
	'Class:WANLink/Attribute:carrier+' => '',
	'Class:WANLink/Attribute:carrier_reference' => 'Référence Opérateur',
	'Class:WANLink/Attribute:carrier_reference+' => '',
	'Class:WANLink/Attribute:networkinterface_id1' => 'Interface réseau #1',
	'Class:WANLink/Attribute:networkinterface_id1+' => 'Interface réseau au site #1',
	'Class:WANLink/Attribute:networkinterface_name1' => 'Nom de l\'interface réseau #1',
	'Class:WANLink/Attribute:networkinterface_name1+' => '',
	'Class:WANLink/Attribute:networkinterface_id2' => 'Interface réseau #2',
	'Class:WANLink/Attribute:networkinterface_id2+' => 'Interface réseau au site #2',
	'Class:WANLink/Attribute:networkinterface_name2' => 'Nom de l\'interface réseau #2',
	'Class:WANLink/Attribute:networkinterface_name2+' => '',
	'Class:WANLink/Attribute:purchase_date' => 'Date d\'achat',
	'Class:WANLink/Attribute:purchase_date+' => '',
	'Class:WANLink/Attribute:renewal_date' => 'Date de renouvellement',
	'Class:WANLink/Attribute:renewal_date+' => '',
));

//
// Class: ASNumber
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:ASNumber' => 'Numéro d\'AS',
	'Class:ASNumber+' => 'Numéro de Système Autonome',
	'Class:ASNumber:baseinfo' => 'Information Générale',
	'Class:ASNumber:admininfo' => 'Information Administrative',
	'Class:ASNumber/Attribute:number' => 'Numéro',
	'Class:ASNumber/Attribute:number+' => '',
	'Class:ASNumber/Attribute:registrar' => 'Registre Internet',
	'Class:ASNumber/Attribute:registrar+' => '',
	'Class:ASNumber/Attribute:whois' => 'Whois',
	'Class:ASNumber/Attribute:whois+' => 'URL vers le whois du registre',
	'Class:ASNumber/Attribute:move2production' => 'Date d\'enregistrement',
	'Class:ASNumber/Attribute:move2production+' => 'Date à laquelle l\'AS a été enregistré.',
	'Class:ASNumber/Attribute:validity_end' => 'Date de fin de validité',
	'Class:ASNumber/Attribute:validity_end+' => 'Date après laquelle l\'AS n\'est plus valide.',
	'Class:ASNumber/Attribute:renewal_date' => 'Date de renouvellement',
	'Class:ASNumber/Attribute:renewal_date+' => 'Date à laquelle l\'AS a été renouvelé.',
));

//
// Application Menu
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Menu:ConfigManagement:Network' => 'Réseau',
	'Menu:ConfigManagement:Network+' => '',

//
// Management of Domains
//
	// Creation Management	
	'UI:IPManagement:Action:New:Domain:NameCollision' => 'Le nom de domain existe déjà !',
		
	// Display list of domains
	'UI:IPManagement:Action:DisplayList:Domain' => 'Afficher la Liste',
	'UI:IPManagement:Action:DisplayList:Domain+' => '',
	'UI:IPManagement:Action:DisplayList:Domain:PageTitle_Class' => 'Domaines DNS',
	'UI:IPManagement:Action:DisplayList:Domain:Title_Class' => 'Domaines DNS',
	
	// Display tree of domains
	'UI:IPManagement:Action:DisplayTree:Domain' => 'Afficher l\'Arbre',
	'UI:IPManagement:Action:DisplayTree:Domain+' => '',
	'UI:IPManagement:Action:DisplayTree:Domain:PageTitle_Class' => 'Domaines DNS',
	'UI:IPManagement:Action:DisplayTree:Domain:Title_Class' => 'Domaines DNS',
	'UI:IPManagement:Action:DisplayTree:Domain:OrgName' => 'Organisation %1$s',

));
