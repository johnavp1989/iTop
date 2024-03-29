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
// Classes in 'Teemip-ip-Mgmt Module'
//////////////////////////////////////////////////////////////////////
//

//
// Class: IPObject
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:IPObject' => 'Object IP',
	'Class:IPObject+' => '',
	'Class:IPObject/Attribute:org_id' => 'Organisation',
	'Class:IPObject/Attribute:org_id+' => '',
	'Class:IPObject/Attribute:org_name' => 'Nom de l\'organisation',
	'Class:IPObject/Attribute:org_name+' => '',
	'Class:IPObject/Attribute:status' => 'Etat',
	'Class:IPObject/Attribute:status+' => '',
	'Class:IPObject/Attribute:status/Value:reserved' => 'Réservé',
	'Class:IPObject/Attribute:status/Value:reserved+' => '',
	'Class:IPObject/Attribute:status/Value:allocated' => 'Alloué',
	'Class:IPObject/Attribute:status/Value:allocated+' => '',
	'Class:IPObject/Attribute:status/Value:released' => 'Libéré',
	'Class:IPObject/Attribute:status/Value:released+' => '',
	'Class:IPObject/Attribute:status/Value:unassigned' => 'Non assigné',
	'Class:IPObject/Attribute:status/Value:unassigned+' => '',
	'Class:IPObject/Attribute:comment' => 'Note',
	'Class:IPObject/Attribute:comment+' => '',
	'Class:IPObject/Attribute:requestor_id' => 'Demandeur',
	'Class:IPObject/Attribute:requestor_id+' => '',
	'Class:IPObject/Attribute:requestor_name' => 'Nom Demandeur',
	'Class:IPObject/Attribute:requestor_name+' => '',
	'Class:IPObject/Attribute:contact_list' => 'Contacts',
	'Class:IPObject/Attribute:contact_list+' => 'Contacts liés à l\'object IP',
	'Class:IPObject/Attribute:document_list' => 'Documents',
	'Class:IPObject/Attribute:document_list+' => 'Documents liés à l\'object IP',
));

//
// Class: lnkContactToIPObject
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:lnkContactToIPObject' => 'Lien Contact / Objet IP',
	'Class:lnkContactToIPObject+' => '',
	'Class:lnkContactToIPObject/Attribute:ipobject_id' => 'Object IP',
	'Class:lnkContactToIPObject/Attribute:ipobject_id+' => '',
	'Class:lnkContactToIPObject/Attribute:contact_id' => 'Contact',
	'Class:lnkContactToIPObject/Attribute:contact_id+' => '',
	'Class:lnkContactToIPObject/Attribute:contact_name' => 'Nom Contact',
	'Class:lnkContactToIPObject/Attribute:contact_name+' => '',
));

//
// Class: lnkDocToIPObject
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:lnkDocToIPObject' => 'Lien Document / Objet IP',
	'Class:lnkDocToIPObject+' => '',
	'Class:lnkDocToIPObject/Attribute:ipobject_id' => 'Object IP',
	'Class:lnkDocToIPObject/Attribute:ipobject_id+' => '',
	'Class:lnkDocToIPObject/Attribute:document_id' => 'Document',
	'Class:lnkDocToIPObject/Attribute:document_id+' => '',
	'Class:lnkDocToIPObject/Attribute:document_name' => 'Nom Document',
	'Class:lnkDocToIPObject/Attribute:document_name+' => '',
));

//
// Class: IPBlock
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:IPBlock' => 'Bloc de Sous-réseaux',
	'Class:IPBlock+' => '',
	'Class:IPBlock:baseinfo' => 'Informations Générales',
	'Class:IPBlock:ipinfo' => 'Informations IP',
	'Class:IPBlock:DelegatedToChild' => '<font color=#ff0000>Délégué à : </font>%1$s',
	'Class:IPBlock:DelegatedFromParent' => '<font color=#ff0000>Délégué de : </font>%1$s',
	'Class:IPBlock/Attribute:name' => 'Nom',
	'Class:IPBlock/Attribute:name+' => '',
	'Class:IPBlock/Attribute:type' => 'Type',
	'Class:IPBlock/Attribute:type+' => 'Type du Bloc de Sous-réseaux',
	'Class:IPBlock/Attribute:parent_org_id' => 'Délégué de',
	'Class:IPBlock/Attribute:parent_org_id+' => 'Organisation d\'ou a été délégué le bloc de sous-réseaux',
	'Class:IPBlock/Attribute:parent_org_name' => 'Nom organisation délégante',
	'Class:IPBlock/Attribute:parent_org_name+' => 'Nom de l\'organisation ayant délégué le bloc de sous-réseaux',
	'Class:IPBlock/Attribute:occupancy' => 'Espace Utilisé',
	'Class:IPBlock/Attribute:occupancy+' => '',
	'Class:IPBlock/Attribute:children_occupancy' => 'Espace Utilisé par les enfants',
	'Class:IPBlock/Attribute:children_occupancy+' => '',
	'Class:IPBlock/Attribute:subnet_occupancy' => 'Espace Utilisé par les Sous-Réseaux',
	'Class:IPBlock/Attribute:subnet_occupancy+' => '',
	'Class:IPBlock/Attribute:location_list' => 'Lieux',
	'Class:IPBlock/Attribute:location_list+' => 'Lieux ou le bloc de Sous-réseaux s\'étend',
));

//
// Class extensions for IPBlock
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:IPBlock/Tab:globalparam' => 'Paramètres Globaux',
	'Class:IPBlock/Tab:childblock' => 'Blocs enfants (%1$s)',
	'Class:IPBlock/Tab:childblock+' => 'Blocs rattachés à ce bloc',
	'Class:IPBlock/Tab:childblock-count' => 'Blocs enfants : %1$s',
	'Class:IPBlock/Tab:childblock-count-percent' => ' espace utilisé par les Blocs enfants.',
	'Class:IPBlock/Tab:childblock-count-percent-remain' => 'Espace utilisé par les Blocs enfants dans l\'espace restant: %1$.1f %%',
	'Class:IPBlock/Tab:subnet' => 'Sous-réseaux (%1$s)',
	'Class:IPBlock/Tab:subnet+' => 'Sous-réseaux rattachés à ce bloc',
	'Class:IPBlock/Tab:subnet-count' => 'Sous-réseaux: %1$s',
	'Class:IPBlock/Tab:subnet-count-percent' => ' espace utilisé par les Sous-réseaux',
	'Class:IPBlock/Tab:subnet-count-percent-remain' => 'Espace utilisé par les Sous-réseaux dans l\'espace restant: %1$.1f %%',
));

//
// Class: lnkBlockToLocation
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:lnkIPBlockToLocation' => 'Lien Bloc de Sous-réseaux / Lieu',
	'Class:lnkIPBlockToLocation+' => '',
	'Class:lnkIPBlockToLocation/Attribute:block_id' => 'Bloc',
	'Class:lnkIPBlockToLocation/Attribute:block_id+' => '',
	'Class:lnkIPBlockToLocation/Attribute:block_name' => 'Nom Bloc',
	'Class:lnkIPBlockToLocation/Attribute:block_name+' => '',
	'Class:lnkIPBlockToLocation/Attribute:location_id' => 'Lieu',
	'Class:lnkIPBlockToLocation/Attribute:location_id+' => '',
	'Class:lnkIPBlockToLocation/Attribute:location_name' => 'Nom Lieu',
	'Class:lnkIPBlockToLocation/Attribute:location_name+' => '',
));

//
// Class: IPv4Block
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:IPv4Block' => 'Bloc de Sous-réseaux IPv4',
	'Class:IPv4Block+' => '',
	'Class:IPv4Block/Attribute:parent_id' => 'Parent',
	'Class:IPv4Block/Attribute:parent_id+' => '',
	'Class:IPv4Block/Attribute:parent_name' => 'Nom Parent',
	'Class:IPv4Block/Attribute:parent_name+' => '',
	'Class:IPv4Block/Attribute:firstip' => 'Première IP du Bloc',
	'Class:IPv4Block/Attribute:firstip+' => 'Première IP du Bloc de Sous-réseaux',
	'Class:IPv4Block/Attribute:lastip' => 'Dernière IP du Bloc',
	'Class:IPv4Block/Attribute:lastip+' => 'Dernière IP du Bloc de Sous-réseaux',
));

//
// Class: IPSubnet
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:IPSubnet' => 'Sous-réseau IP',
	'Class:IPSubnet+' => '',
	'Class:IPSubnet:baseinfo' => 'Informations Générales',
	'Class:IPSubnet:ipinfo' => 'Informations IP',
	'Class:IPSubnet/Attribute:name' => 'Nom',
	'Class:IPSubnet/Attribute:name+' => '',
	'Class:IPSubnet/Attribute:type' => 'Type',
	'Class:IPSubnet/Attribute:type+' => '',
	'Class:IPSubnet/Attribute:release_date' => 'Date de libération',
	'Class:IPSubnet/Attribute:release_date+' => 'Date à laquelle le sous-réseau a été libéré et n\'est plus utilisé.',
	'Class:IPSubnet/Attribute:ip_occupancy' => 'IPs enregistrées',
	'Class:IPSubnet/Attribute:ip_occupancy+' => '',
	'Class:IPSubnet/Attribute:range_occupancy' => 'Plages d\'IPs enregistrées',
	'Class:IPSubnet/Attribute:range_occupancy+' => '',                         
	'Class:IPSubnet/Attribute:alarm_water_mark' => 'Etat de l\'alarme de seuil',
	'Class:IPSubnet/Attribute:alarm_water_mark+' => '',                              
	'Class:IPSubnet/Attribute:alarm_water_mark/Value:no_alarm' => 'Aucune alarme n\'a été envoyée',
	'Class:IPSubnet/Attribute:alarm_water_mark/Value:low_sent' => 'Une alarme de Seuil Bas a été envoyée',
	'Class:IPSubnet/Attribute:alarm_water_mark/Value:high_sent' => 'Une alarme de Seuil Haut a été envoyée',
	'Class:IPSubnet/Attribute:vlans_list' => 'VLANs',
	'Class:IPSubnet/Attribute:vlans_list+' => '',
	'Class:IPSubnet/Attribute:location_list' => 'Lieu',
	'Class:IPSubnet/Attribute:location_list+' => 'Lieux ou le sous-réseau s\'étend',
));

//
// Class extensions for IPSubnet
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:IPSubnet/Tab:globalparam' => 'Paramètres Globaux',
	'Class:IPSubnet/Tab:ipregistered' => 'IPs enregistrées (%1$s)',
	'Class:IPSubnet/Tab:ipregistered+' => 'IPs enregistrées dans le Sous-Réseau',
	'Class:IPSubnet/Tab:ipregistered-count' => ' - %1$s Réservées et %2$s Allouées dans %3$s',
	'Class:IPSubnet/Tab:ipfree-explain' => 'Liste des %1$s premières IPs libres :',
	'Class:IPSubnet/Tab:ipfree-explainbis' => 'Liste de TOUTES les IPs libres :',
	'Class:IPSubnet/Tab:iprange' => 'Plages d\'IPs (%1$s)',
	'Class:IPSubnet/Tab:iprange+' => 'Plages d\'IPs appartenant à un sous-réseau',
	'Class:IPSubnet/Tab:iprange-count-percent' => ' Espace utilisé par les Plages d\'IPs',
	'Class:IPSubnet/Tab:notifications' => 'Notifications (%1$s)',
	'Class:IPSubnet/Tab:notifications+' => 'Notifications associées à ce sous-réseau',
	'Class:IPSubnet/Tab:requests' => 'Demandes IP (%1$s)',
	'Class:IPSubnet/Tab:requests+' => 'Demandes IP liés à ce sous-réseau',
	'Class:IPSubnet/Tab:changes' => 'Changements IP (%1$s)',
	'Class:IPSubnet/Tab:changes+' => 'Changements IP liés à ce sous-réseau',
));

//
// Class: lnkIPSubnetToVLAN
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:lnkIPSubnetToVLAN' => 'Lien Sous-réseau / VLAN',
	'Class:lnkIPSubnetToVLAN+' => '',
	'Class:lnkIPSubnetToVLAN/Attribute:ipsubnet_id_finalclass_recall' => 'Type de Sous-réseau',
	'Class:lnkIPSubnetToVLAN/Attribute:ipsubnet_id_finalclass_recall+' => '',
	'Class:lnkIPSubnetToVLAN/Attribute:ipsubnet_id' => 'Sous-réseau',
	'Class:lnkIPSubnetToVLAN/Attribute:ipsubnet_id+' => '',
	'Class:lnkIPSubnetToVLAN/Attribute:ipsubnet_name' => 'Nom Sous-réseau',
	'Class:lnkIPSubnetToVLAN/Attribute:ipsubnet_name+' => '',
	'Class:lnkIPSubnetToVLAN/Attribute:vlan_id' => 'VLAN',
	'Class:lnkIPSubnetToVLAN/Attribute:vlan_id+' => '',
	'Class:lnkIPSubnetToVLAN/Attribute:vlan_tag' => 'VLAN Tag',
	'Class:lnkIPSubnetToVLAN/Attribute:vlan_tag+' => '',
));

//
// Class: lnkIPSubnetToLocation
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:lnkIPSubnetToLocation' => 'Lien Sous-réseau / Lieu',
	'Class:lnkIPSubnetToLocation+' => '',
	'Class:lnkIPSubnetToLocation/Attribute:ipsubnet_id' => 'Sous-réseau',
	'Class:lnkIPSubnetToLocation/Attribute:ipsubnet_id+' => '',
	'Class:lnkIPSubnetToLocation/Attribute:ipsubnet_name' => 'Nom Sous-réseau',
	'Class:lnkIPSubnetToLocation/Attribute:ipsubnet_name+' => '',
	'Class:lnkIPSubnetToLocation/Attribute:location_id' => 'Lieu',
	'Class:lnkIPSubnetToLocation/Attribute:location_id+' => '',
	'Class:lnkIPSubnetToLocation/Attribute:location_name' => 'Nom Lieu',
	'Class:lnkIPSubnetToLocation/Attribute:location_name+' => '',
));

//
// Class: IPv4Subnet
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:IPv4Subnet' => 'Sous-réseau IPv4',
	'Class:IPv4Subnet+' => '',
	'Class:IPv4Subnet/Attribute:block_id' => 'Bloc de Sous-réseaux',
	'Class:IPv4Subnet/Attribute:block_id+' => '',
	'Class:IPv4Subnet/Attribute:block_name' => 'Nom Bloc',
	'Class:IPv4Subnet/Attribute:block_name+' => '',
	'Class:IPv4Subnet/Attribute:ip' => 'IP de Sous-réseau',
	'Class:IPv4Subnet/Attribute:ip+' => '',
	'Class:IPv4Subnet/Attribute:mask' => 'Masque',
	'Class:IPv4Subnet/Attribute:mask+' => '',
	'Class:IPv4Subnet/Attribute:mask/Value:255.255.0.0' => '255.255.0.0 - /16',
	'Class:IPv4Subnet/Attribute:mask/Value:255.255.128.0' => '255.255.128.0 - /17',
	'Class:IPv4Subnet/Attribute:mask/Value:255.255.192.0' => '255.255.192.0 - /18',
	'Class:IPv4Subnet/Attribute:mask/Value:255.255.224.0' => '255.255.224.0 - /19',
	'Class:IPv4Subnet/Attribute:mask/Value:255.255.240.0' => '255.255.240.0 - /20',
	'Class:IPv4Subnet/Attribute:mask/Value:255.255.248.0' => '255.255.248.0 - /21',
	'Class:IPv4Subnet/Attribute:mask/Value:255.255.252.0' => '255.255.252.0 - /22',
	'Class:IPv4Subnet/Attribute:mask/Value:255.255.254.0' => '255.255.254.0 - /23',
	'Class:IPv4Subnet/Attribute:mask/Value:255.255.255.0' => '255.255.255.0 - /24',
	'Class:IPv4Subnet/Attribute:mask/Value:255.255.255.128' => '255.255.255.128 - /25',
	'Class:IPv4Subnet/Attribute:mask/Value:255.255.255.192' => '255.255.255.192 - /26',
	'Class:IPv4Subnet/Attribute:mask/Value:255.255.255.224' => '255.255.255.224 - /27',
	'Class:IPv4Subnet/Attribute:mask/Value:255.255.255.240' => '255.255.255.240 - /28',
	'Class:IPv4Subnet/Attribute:mask/Value:255.255.255.248' => '255.255.255.248 - /29',
	'Class:IPv4Subnet/Attribute:mask/Value:255.255.255.252' => '255.255.255.252 - /30',
	'Class:IPv4Subnet/Attribute:mask/Value:255.255.255.254' => '255.255.255.254 - /31',
	'Class:IPv4Subnet/Attribute:mask/Value_cidr:255.255.0.0' => '/16',
	'Class:IPv4Subnet/Attribute:mask/Value_cidr:255.255.128.0' => '/17',
	'Class:IPv4Subnet/Attribute:mask/Value_cidr:255.255.192.0' => '/18',
	'Class:IPv4Subnet/Attribute:mask/Value_cidr:255.255.224.0' => '/19',
	'Class:IPv4Subnet/Attribute:mask/Value_cidr:255.255.240.0' => '/20',
	'Class:IPv4Subnet/Attribute:mask/Value_cidr:255.255.248.0' => '/21',
	'Class:IPv4Subnet/Attribute:mask/Value_cidr:255.255.252.0' => '/22',
	'Class:IPv4Subnet/Attribute:mask/Value_cidr:255.255.254.0' => '/23',
	'Class:IPv4Subnet/Attribute:mask/Value_cidr:255.255.255.0' => '/24',
	'Class:IPv4Subnet/Attribute:mask/Value_cidr:255.255.255.128' => '/25',
	'Class:IPv4Subnet/Attribute:mask/Value_cidr:255.255.255.192' => '/26',
	'Class:IPv4Subnet/Attribute:mask/Value_cidr:255.255.255.224' => '/27',
	'Class:IPv4Subnet/Attribute:mask/Value_cidr:255.255.255.240' => '/28',
	'Class:IPv4Subnet/Attribute:mask/Value_cidr:255.255.255.248' => '/29',
	'Class:IPv4Subnet/Attribute:mask/Value_cidr:255.255.255.252' => '/30',
	'Class:IPv4Subnet/Attribute:mask/Value_cidr:255.255.255.254' => '/31',
	'Class:IPv4Subnet/Attribute:gatewayip' => 'IP de la passerelle',
	'Class:IPv4Subnet/Attribute:gatewayip+' => '',
	'Class:IPv4Subnet/Attribute:broadcastip' => 'IP de boradcast',
	'Class:IPv4Subnet/Attribute:broadcastip+' => '',
));

//
// Class: IPRange
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:IPRange' => 'Plage d\'Adresses IP',
	'Class:IPRange+' => '',
	'Class:IPRange/Attribute:range' => 'Nom',
	'Class:IPRange/Attribute:range+' => '',
	'Class:IPRange/Attribute:usage_id' => 'Utilisation',
	'Class:IPRange/Attribute:usage_id+' => 'Utilisation faite de la Plage',
	'Class:IPRange/Attribute:usage_name' => 'Nom Utilisation',
	'Class:IPRange/Attribute:usage_name+' => '',
	'Class:IPRange/Attribute:dhcp' => 'Plage DHCP',
	'Class:IPRange/Attribute:dhcp+' => '',
	'Class:IPRange/Attribute:dhcp/Value:dhcp_no' => 'Non',
	'Class:IPRange/Attribute:dhcp/Value:dhcp_no+' => '',
	'Class:IPRange/Attribute:dhcp/Value:dhcp_yes' => 'Oui',
	'Class:IPRange/Attribute:dhcp/Value:dhcp_yes+' => '',
	'Class:IPv4Range/Attribute:occupancy' => 'IPs enregistrées',
	'Class:IPv4Range/Attribute:occupancy+' => '',
));

//
// Class extensions for IPRange
//                                                       

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:IPRange/Tab:ipregistered' => 'IPs enregistrées (%1$s)',
	'Class:IPRange/Tab:ipregistered+' => 'IPs enregistrées dans la Plage d\'IPs',
	'Class:IPRange/Tab:ipregistered-count' => ' - %1$s Réservées et %2$s Allouées dans %3$s',
	'Class:IPRange/Tab:ipfree-explain' => 'Liste des %1$s premières IPs libres :',
	'Class:IPRange/Tab:ipfree-explainbis' => 'Liste de TOUTES les IPs libres :',
	'Class:IPRange/Tab:notifications' => 'Notifications (%1$s)',
	'Class:IPRange/Tab:notifications+' => 'Notifications associées à cette plage d\'IPs',
));

//
// Class: IPv4Range
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:IPv4Range' => 'Plage d\'Adresses IPv4',
	'Class:IPv4Range+' => '',
	'Class:IPv4Range/Attribute:subnet_id' => 'Sous-réseau',
	'Class:IPv4Range/Attribute:subnet_id+' => '',
	'Class:IPv4Range/Attribute:subnet_ip' => 'IP du Sous-réseau',
	'Class:IPv4Range/Attribute:subnet_ip+' => '',
	'Class:IPv4Range/Attribute:firstip' => 'Première IP de la Plage',
	'Class:IPv4Range/Attribute:firstip+' => '',
	'Class:IPv4Range/Attribute:lastip' => 'Dernière IP de la plage',
	'Class:IPv4Range/Attribute:lastip+' => '',
));

//
// Class: IPAddress
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:IPAddress' => 'Adresse IP',
	'Class:IPAddress+' => '',
	'Class:IPAddress:baseinfo' => 'Informations Générales',
	'Class:IPAddress:ipinfo' => 'Informations IP',
	'Class:IPAddress/Attribute:short_name' => 'Nom Court',
	'Class:IPAddress/Attribute:short_name+' => 'Nom de gauche du FQDN',
	'Class:IPAddress/Attribute:domain_id' => 'Nom de Domaine',
	'Class:IPAddress/Attribute:domain_id+' => '',
	'Class:IPAddress/Attribute:domain_name' => 'Nom de Domaine',
	'Class:IPAddress/Attribute:domain_name+' => '',
	'Class:IPAddress/Attribute:fqdn' => 'FQDN',
	'Class:IPAddress/Attribute:fqdn+' => 'Fully Qualified Domain Name',
	'Class:IPAddress/Attribute:usage_id' => 'Utilisation',
	'Class:IPAddress/Attribute:usage_id+' => '',
	'Class:IPAddress/Attribute:usage_name' => 'Nom Utilisation',
	'Class:IPAddress/Attribute:usage_name+' => '',
	'Class:IPAddress/Attribute:ipinterface_id' => 'Interface IP',
	'Class:IPAddress/Attribute:ipinterface_id+' => '',
	'Class:IPAddress/Attribute:ipinterface_name' => 'Nom Interface IP',
	'Class:IPAddress/Attribute:ipinterface_name+' => '',
	'Class:IPAddress/Attribute:release_date' => 'Date de libération',
	'Class:IPAddress/Attribute:release_date+' => 'Date à laquelle l\'adresse a été libérée et n\'est plus utilisée.',
	'Class:IPAddress/Attribute:ip_list' => 'IPs NATées',
	'Class:IPAddress/Attribute:finalclass' => 'Classe',
	'Class:IPAddress/Attribute:finalclass+' => '',
));

//
// Class extensions for IPAddress
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:IPAddress/Tab:globalparam' => 'Paramètres Globaux',
	'Class:IPAddress/Tab:parents' => 'Parents',
	'Class:IPAddress/Tab:ip_list' => 'IPs NATées (%1$s)',
	'Class:IPAddress/Tab:ip_list+' => 'Liste des IPs NATées',
	'Class:IPAddress/Tab:ci_list' => 'CIs (%1$s)',
	'Class:IPAddress/Tab:ci_list+' => 'Liste des CIs utilisant cette IP',
	'Class:IPAddress/Tab:DatacenterDevice' => 'Matériel Datacenter (%1$s)',
	'Class:IPAddress/Tab:DatacenterDevice+' => 'Liste du Matériel Datacenter utilisant cette IP comme leur IP de management: %1$s',
	'Class:IPAddress/Tab:VirtualMachine' => 'Machines Virtuelles (%1$s)',
	'Class:IPAddress/Tab:VirtualMachine+' => 'Liste des Machines Virtuelles utilisant cette IP comme leur IP de management: %1$s',
	'Class:IPAddress/Tab:IPInterface' => 'Interfaces IP (%1$s)',
	'Class:IPAddress/Tab:IPInterface+' => 'Liste des Interfaces IP ou cette IP est configurée : %1$s',
	'Class:IPAddress/Tab:NoCi' => 'Aucun CI',
	'Class:IPAddress/Tab:NoCi+' => 'Aucun CI utilise cette IP',
	'Class:IPAddress/Tab:requests' => 'Demandes IP (%1$s)',
	'Class:IPAddress/Tab:requests+' => 'Demandes IP liés à cette adresse IP',
	'Class:IPAddress/Tab:changes' => 'Changements IP (%1$s)',
	'Class:IPAddress/Tab:changes+' => 'Changements IP liés à cette adresse IP',
));

//
// Class: lnkIPAdressToIPAddress
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:lnkIPAdressToIPv4Address' => 'IP / IPs NATées',
	'Class:lnkIPAdressToIPv4Address+' => '',
	'Class:lnkIPAdressToIPv4Address/Attribute:ip1_id' => 'Adresse IPv4',
	'Class:lnkIPAdressToIPv4Address/Attribute:ip1_id+' => '',
	'Class:lnkIPAdressToIPv4Address/Attribute:ip2_id' => 'IP NATée',
	'Class:lnkIPAdressToIPv4Address/Attribute:ip2_id+' => '',
	'Class:lnkIPAdressToIPv4Address/Attribute:ip1_short_name' => 'Nom court',
	'Class:lnkIPAdressToIPv4Address/Attribute:ip1_short_name+' => 'Nom de gauche du FQDN',
	'Class:lnkIPAdressToIPv4Address/Attribute:ip1_domain_name' => 'Nom de Domaine',
	'Class:lnkIPAdressToIPv4Address/Attribute:ip1_domain_name+' => 'Nom du Domaine DNS',
	'Class:lnkIPAdressToIPv4Address/Attribute:ip2_short_name' => 'Nom court',
	'Class:lnkIPAdressToIPv4Address/Attribute:ip2_short_name+' => 'Nom de gauche du FQDN',
	'Class:lnkIPAdressToIPv4Address/Attribute:ip2_domain_name' => 'Nom de Domaine',
	'Class:lnkIPAdressToIPv4Address/Attribute:ip2_domain_name+' => 'Nom du Domaine DNS',
));

//
// Class: lnkIPInterfaceToIPAddress
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:lnkIPInterfaceToIPAddress' => 'Lien interface IP / Adresse IP',
	'Class:lnkIPInterfaceToIPAddress+' => '',
	'Class:lnkIPInterfaceToIPAddress/Attribute:ipaddress_id_finalclass_recall' => 'Type d\'IP',
	'Class:lnkIPInterfaceToIPAddress/Attribute:ipaddress_id_finalclass_recall+' => '',
	'Class:lnkIPInterfaceToIPAddress/Attribute:ipinterface_id' => 'Interface IP',
	'Class:lnkIPInterfaceToIPAddress/Attribute:ipinterface_id+' => '',
	'Class:lnkIPInterfaceToIPAddress/Attribute:ipinterface_name' => 'Nom Interface IP',
	'Class:lnkIPInterfaceToIPAddress/Attribute:ipinterface_name+' => '',
	'Class:lnkIPInterfaceToIPAddress/Attribute:ipaddress_id' => 'Adresse IP',
	'Class:lnkIPInterfaceToIPAddress/Attribute:ipaddress_id+' => '',
));

//
// Class: IPv4Address
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:IPv4Address' => 'Adresse IPv4',
	'Class:IPv4Address+' => '',
	'Class:IPv4Address/Attribute:subnet_id' => 'Sous-réseau',
	'Class:IPv4Address/Attribute:subnet_id+' => 'Sous-réseau IPv4',
	'Class:IPv4Address/Attribute:range_id' => 'Plage d\'Adresses',
	'Class:IPv4Address/Attribute:range_id+' => 'Plage d\'Adresses IPv4',
	'Class:IPv4Address/Attribute:ip' => 'Addresse',
	'Class:IPv4Address/Attribute:ip+' => 'Addresse IPv4',
));

//
// Class: IPConfig
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:IPConfig' => 'Paramètres Globaux',
	'Class:IPConfig+' => '',
	'Class:IPConfig:baseinfo' => 'Informations Générales',
	'Class:IPConfig:blockinfo' => 'Paramètres par défaut des Blocs de Sous-réseaux',
	'Class:IPConfig:subnetinfo' => 'Paramètres par défaut des Sous-réseaux',
	'Class:IPConfig:iprangeinfo' => 'Paramètres par défaut des Plages d\'IPs',
	'Class:IPConfig:ipinfo' => 'Paramètres par défaut des IPs',
	'Class:IPConfig/Attribute:org_id' => 'Organisation',
	'Class:IPConfig/Attribute:org_id+' => '',
	'Class:IPConfig/Attribute:org_name' => 'Nom Organisation',
	'Class:IPConfig/Attribute:org_name+' => '',
	'Class:IPConfig/Attribute:name' => 'Nom',
	'Class:IPConfig/Attribute:name+' => '',
	'Class:IPConfig/Attribute:requestor_id' => 'Demandeur',
	'Class:IPConfig/Attribute:requestor_id+' => '',
	'Class:IPConfig/Attribute:requestor_name' => 'Nom Demandeur',
	'Class:IPConfig/Attribute:requestor_name+' => '',
	'Class:IPConfig/Attribute:ipv4_block_min_size' => 'Taille Minimum des Blocs de Sous-réseaux IPv4',
	'Class:IPConfig/Attribute:ipv4_block_min_size+' => '',
	'Class:IPConfig/Attribute:ipv4_block_cidr_aligned' => 'Alignement des Blocs de Sous-réseaux IPv4 sur les blocs CIDR',
	'Class:IPConfig/Attribute:ipv4_block_cidr_aligned+' => '',
	'Class:IPConfig/Attribute:ipv4_block_cidr_aligned/Value:bca_no' => 'Non',
	'Class:IPConfig/Attribute:ipv4_block_cidr_aligned/Value:bca_no+' => '',
	'Class:IPConfig/Attribute:ipv4_block_cidr_aligned/Value:bca_yes' => 'Oui',
	'Class:IPConfig/Attribute:ipv4_block_cidr_aligned/Value:bca_yes+' => '',
	'Class:IPConfig/Attribute:reserve_subnet_IPs' => 'Réserve les IPs de Sous-réseau, de passerelle et de Broadcast à la création',
	'Class:IPConfig/Attribute:reserve_subnet_IPs+' => '',
	'Class:IPConfig/Attribute:reserve_subnet_IPs/Value:reserve_no' => 'Non',
	'Class:IPConfig/Attribute:reserve_subnet_IPs/Value:reserve_no+' => '',
	'Class:IPConfig/Attribute:reserve_subnet_IPs/Value:reserve_yes' => 'Oui',
	'Class:IPConfig/Attribute:reserve_subnet_IPs/Value:reserve_yes+' => '',
	'Class:IPConfig/Attribute:ipv4_gateway_ip_format' => 'IP de la passerelle IPv4',
	'Class:IPConfig/Attribute:ipv4_gateway_ip_format+' => '',
	'Class:IPConfig/Attribute:ipv4_gateway_ip_format/Value:subnetip_plus_1' => 'IP de sous-réseau + 1',
	'Class:IPConfig/Attribute:ipv4_gateway_ip_format/Value:subnetip_plus_1+' => '',
	'Class:IPConfig/Attribute:ipv4_gateway_ip_format/Value:broadcastip_minus_1' => 'IP de Broadcast - 1',
	'Class:IPConfig/Attribute:ipv4_gateway_ip_format/Value:broadcastip_minus_1+' => '',
	'Class:IPConfig/Attribute:ipv4_gateway_ip_format/Value:free_setup' => 'Allocation libre',
	'Class:IPConfig/Attribute:ipv4_gateway_ip_format/Value:free_setup+' => '',
	'Class:IPConfig/Attribute:subnet_low_watermark' => 'Seuil Bas des Sous-réseaux (%)',
	'Class:IPConfig/Attribute:subnet_low_watermark+' => '',
	'Class:IPConfig/Attribute:subnet_high_watermark' => 'Seuil Haut des Sous-réseaux (%)',
	'Class:IPConfig/Attribute:subnet_high_watermark+' => '',
	'Class:IPConfig/Attribute:iprange_low_watermark' => 'Seuil Bas des Plages d\'IPs (%)',
	'Class:IPConfig/Attribute:iprange_low_watermark+' => '',
	'Class:IPConfig/Attribute:iprange_high_watermark' => 'Seuil Haut des Plages d\'IPs (%)',
	'Class:IPConfig/Attribute:iprange_high_watermark+' => '',
	'Class:IPConfig/Attribute:ip_allow_duplicate_name' => 'Autorise les noms dupliqués',
	'Class:IPConfig/Attribute:ip_allow_duplicate_name+' => '',
	'Class:IPConfig/Attribute:ip_allow_duplicate_name/Value:ipdup_no' => 'Non',
	'Class:IPConfig/Attribute:ip_allow_duplicate_name/Value:ipdup_no+' => '',
	'Class:IPConfig/Attribute:ip_allow_duplicate_name/Value:ipdup_yes' => 'Oui',
	'Class:IPConfig/Attribute:ip_allow_duplicate_name/Value:ipdup_yes+' => '',
	'Class:IPConfig/Attribute:mac_address_format' => 'Format des adresses MAC',
	'Class:IPConfig/Attribute:mac_address_format+' => '',
	'Class:IPConfig/Attribute:mac_address_format/Value:colons' => '01:23:45:67:89:ab',
	'Class:IPConfig/Attribute:mac_address_format/Value:colons+' => '',
	'Class:IPConfig/Attribute:mac_address_format/Value:hyphens' => '01-23-45-67-89-ab',
	'Class:IPConfig/Attribute:mac_address_format/Value:hyphens+' => '',
	'Class:IPConfig/Attribute:mac_address_format/Value:dots' => '0123.4567.89ab',
	'Class:IPConfig/Attribute:mac_address_format/Value:dots+' => '',
	'Class:IPConfig/Attribute:mac_address_format/Value:any' => 'Tous',
	'Class:IPConfig/Attribute:mac_address_format/Value:any+' => '',                                 
	'Class:IPConfig/Attribute:ping_before_assign' => 'Ping l\'IP avant de l\'assigner ?',
	'Class:IPConfig/Attribute:ping_before_assign+' => '',
	'Class:IPConfig/Attribute:ping_before_assign/Value:ping_no' => 'Non',
	'Class:IPConfig/Attribute:ping_before_assign/Value:ping_no+' => '',
	'Class:IPConfig/Attribute:ping_before_assign/Value:ping_yes' => 'Oui',
	'Class:IPConfig/Attribute:ping_before_assign/Value:ping_yes+' => '',
));

//
// Class: IPRangeUsage
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:IPRangeUsage' => 'Types d\'utilisation d\'une plage d\'adresses IP',
	'Class:IPRangeUsage+' => 'Ce à quoi une plage d\'adresses IP est utilisée',
	'Class:IPRangeUsage/Attribute:org_id' => 'Organisation',
	'Class:IPRangeUsage/Attribute:org_id+' => '',
	'Class:IPRangeUsage/Attribute:org_name' => 'Nom Organisation',
	'Class:IPRangeUsage/Attribute:org_name+' => '',
	'Class:IPRangeUsage/Attribute:name' => 'Nom',
	'Class:IPRangeUsage/Attribute:name+' => '',
	'Class:IPRangeUsage/Attribute:description' => 'Description',
	'Class:IPRangeUsage/Attribute:description+' => '',
));

//
// Class: IPUsage
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:IPUsage' => 'Types d\'utilisation d\'une adresse IP',
	'Class:IPUsage+' => 'Ce à quoi une adresse IP est utilisée',
	'Class:IPUsage/Attribute:org_id' => 'Organisation',
	'Class:IPUsage/Attribute:org_id+' => '',
	'Class:IPUsage/Attribute:org_name' => 'Nom Organisation',
	'Class:IPUsage/Attribute:org_name+' => '',
	'Class:IPUsage/Attribute:name' => 'Nom',
	'Class:IPUsage/Attribute:name+' => '',
	'Class:IPUsage/Attribute:description' => 'Description',
	'Class:IPUsage/Attribute:description+' => '',
));

//
// Class: IPTriggerOnWaterMark
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:IPTriggerOnWaterMark' => 'Déclencheur lorsqu\'un seuil d\'IPs est atteint',
	'Class:IPTriggerOnWaterMark+' => '',
	'Class:IPTriggerOnWaterMark/Attribute:org_id' => 'Organisation',
	'Class:IPTriggerOnWaterMark/Attribute:org_id+' => '',
	'Class:IPTriggerOnWaterMark/Attribute:org_name' => 'Nom Organisation',
	'Class:IPTriggerOnWaterMark/Attribute:org_name+' => '',
	'Class:IPTriggerOnWaterMark/Attribute:target_class' => 'Classe cible',
	'Class:IPTriggerOnWaterMark/Attribute:target_class+' => '',
	'Class:IPTriggerOnWaterMark/Attribute:event' => 'Evènement',
	'Class:IPTriggerOnWaterMark/Attribute:event+' => 'Evènement généré lorsque le déclencheur est activé',
	'Class:IPTriggerOnWaterMark/Attribute:event/Value:cross_low' => 'Le seuil bas est franchi',
	'Class:IPTriggerOnWaterMark/Attribute:event/Value:cross_low+' => '',
	'Class:IPTriggerOnWaterMark/Attribute:event/Value:cross_high' => 'Le seuil haut est franchi',
	'Class:IPTriggerOnWaterMark/Attribute:event/Value:cross_high+' => '',
));

//
// Class: IPObjTemplate
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:IPObjTemplate' => 'Formulaire IP',
	'Class:IPObjTemplate+' => '',
	'Class:IPObjTemplate/Attribute:servicesubcategory_id' => 'Elément de Service',
	'Class:IPObjTemplate/Attribute:servicesubcategory_id+' => '',
	'Class:IPObjTemplate/Attribute:request_type' => 'Type de requète',
	'Class:IPObjTemplate/Attribute:request_type+' => '',
	'Class:IPObjTemplate/Attribute:request_type/Value:ip_create' => 'Création d\'une IP',
	'Class:IPObjTemplate/Attribute:request_type/Value:ip_change' => 'Mise à jour d\'une IP',
	'Class:IPObjTemplate/Attribute:request_type/Value:ip_delete' => 'Libération d\'une IP',
	'Class:IPObjTemplate/Attribute:request_type/Value:subnet_create' => 'Creation d\'un Sous-réseau',
	'Class:IPObjTemplate/Attribute:request_type/Value:subnet_change' => 'Mise à jour d\'un Sous-réseau',
	'Class:IPObjTemplate/Attribute:request_type/Value:subnet_delete' => 'Libération d\'un Sous-réseau',
));

//
// Application Menu
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Menu:IPManagement' => 'Gestion du parc d\'IPs',
	'Menu:IPManagement+' => 'Gestion du parc d\'IPs',
	'Menu:IPManagement:Overview:Total' => 'Total: %1s',
	'Menu:IPSpace' => 'Espace IP',
	'Menu:IPSpace+' => 'Espace IP',
	'Menu:IPSpace:IPv4Objects' => 'Objets IPv4',
	'Menu:IPSpace:IPv4Objects+' => 'Objets IPv4',
	'Menu:IPSpace:Options' => 'Paramètres',
	'Menu:IPSpace:Options+' => 'Paramètres',  
	'Menu:NewIPObject' => 'Nouvel objet IP',
	'Menu:NewIPObject+' => 'Création d\'un nouvel objet IP',
	'Menu:SearchIPObject' => 'Recherche d\'un objet IP',
	'Menu:SearchIPObject+' => 'Recherche d\'un objet IP',
	'Menu:Ipv4ShortCut' => 'Raccourcis IPv4',
	'Menu:Ipv4ShortCut+' => 'Raccourcis IPv4',  
	'Menu:IPv4Block' => 'Blocs de Sous-réseaux',
	'Menu:IPv4Block+' => 'Blocs de Sous-réseaux IPv4',
	'Menu:IPv4Subnet' => 'Sous-réseaux',
	'Menu:IPv4Subnet+' => 'Sous-réseaux IPv4',
	'Menu:IPv4Subnet:Allocated' => 'Sous-réseaux alloués',
	'Menu:IPv4Subnet:Allocated+' => 'Liste des sous-réseaux IPv4 alloués',
	'Menu:IPv4Range' => 'Plages d\'Adresses IP',
	'Menu:IPv4Range+' => 'Plages d\'Adresses IPv4',
	'Menu:IPv4Address' => 'Adresses IP',
	'Menu:IPv4Address+' => 'Adresses IPv4',
	'Menu:Options' => 'Paramètres',
	'Menu:Options+' => 'Paramètres',  
	'Menu:IPConfig' => 'Paramètres Globaux IP',
	'Menu:IPConfig+' => 'Paramètres Globaux pour les objets IP',
	'Menu:IPRangeUsage' => 'Types de plages d\'IPs',
	'Menu:IPRangeUsage+' => 'Types d\'utilisation des plages d\'adresses IP',
	'Menu:IPUsage' => 'Types d\'IPs',
	'Menu:IPUsage+' => 'Types d\'utilisation des adresses',
	'Menu:Domain' => 'Domaines',
	'Menu:Domain+' => 'Noms de Domaines',
	'Menu:IPTemplate' => 'Templates IP',
	'Menu:IPTemplate+' => '',
	
	'UI:IPMgmtWelcomeOverview:Title' => 'Mon tableau de bord',
	
	// Menu separator in Action menus
	'UI:IPManagement:Action:MenuSeparator' => '<hr class="menu-separator"/>',	
	'UI:IPManagement:Action:Error::WrongActionForClass' => 'Cette action ne peut être appliquèe à cette classe d\'objet !',
//
// Management of IP global settings
//
	'UI:IPManagement:Action:New:IPConfig:AlreadyExists' => 'Un seul ensemble de Paramètres Globaux peut exister par organisation !',	
	'UI:IPManagement:Action:Modify:IPConfig:IPv4BlockMinSizeTooSmall' => 'La taille minimum d\'un Bloc de Sous-réseaux IPv4 ne peut être inférieure à %1$s !',
	'UI:IPManagement:Action:Modify:IPConfig:IPv6BlockMinSizeTooSmall' => 'La taille minimum d\'un Bloc de Sous-réseaux IPv6 ne peut être inférieure à %1$s !',
	'UI:IPManagement:Action:Modify:IPConfig:WaterMarksPercent' => 'Les Seuils sont des pourcentages. Merci d\'utiliser des nombres entre 0 et 100 !',
	'UI:IPManagement:Action:Modify:IPConfig:WaterMarksOrder' => 'Le Seuil Bas doit être inférieur au Seuil Haut !',
	'UI:IPManagement:Action:Modify:GlobalConfig' => 'Ces paramètres IP globaux peuvent être redéfinis pour cette action.',	

//
// Management of IPBlocks
//
	// Creation Management	
	'UI:IPManagement:Action:New:IPBlock:Reverted' => 'La première IP du Bloc est plus grande que la dernière !',
	'UI:IPManagement:Action:New:IPBlock:SmallerThanMinSize' => 'La taile d\'un Bloc ne peut être inférieure à %1$s !',	
	'UI:IPManagement:Action:New:IPBlock:NotCIDRAligned' => 'Le Bloc n\'est pas aligné CIDR !',	
	'UI:IPManagement:Action:New:IPBlock:NotInParent' => 'Le Bloc de Sous-réseaux n\'est pas strictement contenu dans le bloc parent sélectionné !',	
	'UI:IPManagement:Action:New:IPBlock:NameExist' => 'Le nom du Bloc de Sous-réseaux existe déjà !',	
	'UI:IPManagement:Action:New:IPBlock:Collision0' => 'Le Bloc de Sous-réseaux existe déjà !',	
	'UI:IPManagement:Action:New:IPBlock:Collision1' => 'Collision : la première IP appartient à un bloc déjà existant !',	
	'UI:IPManagement:Action:New:IPBlock:Collision2' => 'Collision : la dernière IP appartient à un bloc déjà existant !',	
	'UI:IPManagement:Action:Modify:IPBlock:ParentIdNull' => 'Les Sous-réseaux du Bloc %1$s ne peuvent être attachés à un parent non existant !',	
	
	// Shrink action on subnet blocks
	'UI:IPManagement:Action:Shrink:IPBlock:Reverted' =>  'La nouvelle première IP du Bloc est plus grande que la nouvelle dernière !',
	'UI:IPManagement:Action:Shrink:IPBlock:IPOutOfBlock' => 'Les nouvelles IPs ne sont pas toutes dans le Bloc !',
	'UI:IPManagement:Action:Shrink:IPBlock:NoChange' => 'Aucun changement n\'a été demandé !',
	'UI:IPManagement:Action:Shrink:IPBlock:NotCIDRAligned' => 'Le Bloc n\'est pas aligné CIDR !',
	'UI:IPManagement:Action:Shrink:IPBlock:BlockAccrossBorder' => 'Un bloc fils est à cheval sur les nouvelles limites !',
	'UI:IPManagement:Action:Shrink:IPBlock:SubnetAccrossBorder' => 'Un sous-réseau attaché au bloc est à cheval sur les nouvelles limites !',
	'UI:IPManagement:Action:Shrink:IPBlock:SubnetBecomesOrhpean' => 'Des Sous-réseaux fils n\'auront plus de parent après la réduction !',	
	'UI:IPManagement:Action:Shrink:IPBlock:Done' => '%1$s <span class="hilite">%2$s</span> a été réduit.',
	
	// Split action on subnet blocks
	'UI:IPManagement:Action:Split:IPBlock:IPOutOfBlock' => 'L\'IP de coupure est en dehors du bloc !',
	'UI:IPManagement:Action:Split:IPBlock:SmallerThanMinSize' => 'La taille du bloc ne peut être inférieure à %1$s!',
	'UI:IPManagement:Action:Split:IPBlock:NotCIDRAligned' => 'Les blocs ne sont pas alignés sur des blocs CIDR !',	
	'UI:IPManagement:Action:Split:IPBlock:BlockAccrossBorder' => 'Un bloc de sous-réseaux fils est à cheval sur la nouvelle frontière !',
	'UI:IPManagement:Action:Split:IPBlock:SubnetAccrossBorder' => 'Un sous-réseau appartenant au bloc est à cheval sur la nouvelle frontière !',
	'UI:IPManagement:Action:Split:IPBlock:EmptyNewName' => 'Le nom du nouveau Bloc de Sous-réseaux est vide !',
	'UI:IPManagement:Action:Split:IPBlock:NameExist' => 'Le nom du nouveau Bloc de Sous-réseaux existe déjà !',
	'UI:IPManagement:Action:Split:IPBlock:Done' => '%1$s: <span class="hilite">%2$s</span> a été coupé.',	
	
	// Expand action on subnet blocks
	'UI:IPManagement:Action:Expand:IPBlock:Reverted' =>  'La nouvelle première IP du Bloc est plus grande que la nouvelle dernière !',
	'UI:IPManagement:Action:Expand:IPBlock:IPOutOfBlock' => 'Les nouvelles IPs ne sont pas toutes en dehors du Bloc !',
	'UI:IPManagement:Action:Expand:IPBlock:NoChange' => 'Aucun changement n\'a été demandé !',
	'UI:IPManagement:Action:Expand:IPBlock:NotCIDRAligned' => 'Le Bloc n\'est pas aligné CIDR !',
	'UI:IPManagement:Action:Expand:IPBlock:BlockBiggerThanParent' => 'Le Bloc ne peut être plus grand que son parent !',
	'UI:IPManagement:Action:Expand:IPBlock:DelegatedBlockAccrossBorder' => 'le bloc ne peut englober un bloc délégué !',
	'UI:IPManagement:Action:Expand:IPBlock:BlockAccrossBorder' => 'Un bloc frère est à cheval sur les nouvelles limites !',
	'UI:IPManagement:Action:Expand:IPBlock:SubnetAccrossBorder' => 'Un sous-réseau attaché au bloc parent est à cheval les nouvelles limites !',
	'UI:IPManagement:Action:Expand:IPBlock:Done' => '%1$s <span class="hilite">%2$s</span> a été étendu.',

	// Delegate action on subnet blocks
	'UI:IPManagement:Action:Delegate:IPBlock:NoChildOrg' => 'L\'organisation à laquelle le bloc appartient n\'a pas d\'enfant !',
	'UI:IPManagement:Action:Delegate:IPBlock:WrongLevelOfOrganization' => 'Un changement de délegation doit être effectué à une organisation soeur !',
	'UI:IPManagement:Action:Delegate:IPBlock:NoChangeOfOrganization' => 'Aucun changement n\'a été demandé !',
	'UI:IPManagement:Action:Delegate:IPBlock:HasChildBlocks' => 'Le bloc a des blocs fils !',
	'UI:IPManagement:Action:Delegate:IPBlock:HasChildSubnets' => 'Le bloc a des subnets fils !',
	'UI:IPManagement:Action:Delegate:IPBlock:ConflictWithBlocksOfTargetOrg' => 'Le bloc est en conflict avec un bloc de l\'organisation cible !',
	'UI:IPManagement:Action:Delegate:IPBlock:ConflictWithBlocksOfParentOrg' => 'Le bloc est en conflict avec un bloc de l\'organisation parente !',
	'UI:IPManagement:Action:Delegate:IPBlock:HasChildBlocksInParent' => 'Le bloc a des blocs fils dans l\'organisation parent !',
	'UI:IPManagement:Action:Delegate:IPBlock:HasChildSubnetsInParent' => 'Le bloc a des subnets fils dans l\'organisation parent !',
	
//
// Management of IPv4Blocks
//
	// Display details of subnet blocks
	'UI:IPManagement:Action:Details:IPv4Block' => 'Détails',
	'UI:IPManagement:Action:Details:IPv4Block+' => '',
	
	// Display list of subnet blocks
	'UI:IPManagement:Action:DisplayList:IPv4Block' => 'Afficher la Liste',
	'UI:IPManagement:Action:DisplayList:IPv4Block+' => '',
	'UI:IPManagement:Action:DisplayList:IPv4Block:PageTitle_Class' => 'Blocs de sous-réseaux IPv4',
	'UI:IPManagement:Action:DisplayList:IPv4Block:Title_Class' => 'Blocs de sous-réseaux IPv4',
	
	// Display tree of subnet blocks
	'UI:IPManagement:Action:DisplayTree:IPv4Block' => 'Afficher l\'Arbre',
	'UI:IPManagement:Action:DisplayTree:IPv4Block+' => '',
	'UI:IPManagement:Action:DisplayTree:IPv4Block:PageTitle_Class' => 'Blocs de sous-réseaux IPv4',
	'UI:IPManagement:Action:DisplayTree:IPv4Block:Title_Class' => 'Blocs de sous-réseaux IPv4',
	'UI:IPManagement:Action:DisplayTree:IPv4Block:OrgName' => 'Organisation %1$s',
	
	// Shrink action on subnet blocks
	'UI:IPManagement:Action:Shrink:IPv4Block' => 'Réduire',
	'UI:IPManagement:Action:Shrink:IPv4Block+' => '',
	'UI:IPManagement:Action:Shrink:IPv4Block:Summary' => 'Résumé',
	'UI:IPManagement:Action:Shrink:IPv4Block:Summary+' => '',
	'UI:IPManagement:Action:Shrink:IPv4Block:PageTitle_Object_Class' => 'TeemIp - Réduire %1$s - %2$s',
	'UI:IPManagement:Action:Shrink:IPv4Block:Title_Class_Object' => 'Réduire %1$s: <span class="hilite">%2$s</span>',
	'UI:IPManagement:Action:Shrink:IPv4Block:NewFirstIP' => 'Nouvelle première IP du Bloc :',
	'UI:IPManagement:Action:Shrink:IPv4Block:NewLastIP' => 'Nouvelle dernière IP du Bloc :',            
	'UI:IPManagement:Action:Shrink:IPv4Block:IsDelegated' => 'Ce bloc est délégué et ne peut donc être réduit !',
	'UI:IPManagement:Action:Shrink:IPv4Block:CannotBeShrunk' =>  'Le bloc ne peut être réduit: %1$s',
	'UI:IPManagement:Action:Shrink:IPv4Block:SmallerThanMinSize' => 'La taille du Bloc ne peut être plus petite que %1$s !',
	'UI:IPManagement:Action:Shrink:IPv4Block:Done' => '%1$s <span class="hilite">%2$s</span> a été réduit.',
	
	// Split action on subnet blocks
	'UI:IPManagement:Action:Split:IPv4Block' => 'Couper',
	'UI:IPManagement:Action:Split:IPv4Block+' => '',
	'UI:IPManagement:Action:Split:IPv4Block:Summary' => 'Résumé',
	'UI:IPManagement:Action:Split:IPv4Block:Summary+' => '',
	'UI:IPManagement:Action:Split:IPv4Block:PageTitle_Object_Class' => 'TeemIp - Couper %1$s - %2$s',
	'UI:IPManagement:Action:Split:IPv4Block:Title_Class_Object' => 'Couper %1$s: <span class="hilite">%2$s</span>',
	'UI:IPManagement:Action:Split:IPv4Block:At' => 'Première IP du nouveau Bloc de Sous-réseaux :',
	'UI:IPManagement:Action:Split:IPv4Block:NameNewBlock' => 'Nom du nouveau Bloc de Sous-réseaux :',
	'UI:IPManagement:Action:Split:IPv4Block:IsDelegated' => 'Ce bloc est délégué et ne peut donc être coupé !',
	'UI:IPManagement:Action:Split:IPv4Block:CannotBeSplit' =>  'Le Bloc ne peut être coupé: %1$s',
	'UI:IPManagement:Action:Split:IPv4Block:SmallerThanMinSize' => 'La taille du bloc ne peut être inférieure à %1$s !',
	'UI:IPManagement:Action:Split:IPv4Block:Done' => '%1$s: <span class="hilite">%2$s</span> a été coupé.',	
	
	// Expand action on subnet blocks
	'UI:IPManagement:Action:Expand:IPv4Block' => 'Etendre',
	'UI:IPManagement:Action:Expand:IPv4Block+' => '',
	'UI:IPManagement:Action:Expand:IPv4Block:Summary' => 'Résumé',
	'UI:IPManagement:Action:Expand:IPv4Block:Summary+' => '',
	'UI:IPManagement:Action:Expand:IPv4Block:PageTitle_Object_Class' => 'TeemIp - Etendre %1$s - %2$s',
	'UI:IPManagement:Action:Expand:IPv4Block:Title_Class_Object' => 'Etendre %1$s: <span class="hilite">%2$s</span>',
	'UI:IPManagement:Action:Expand:IPv4Block:NewFirstIP' => 'Nouvelle première IP du Bloc :',
	'UI:IPManagement:Action:Expand:IPv4Block:NewLastIP' => 'Nouvelle dernière IP du Bloc :',
	'UI:IPManagement:Action:Expand:IPv4Block:IsDelegated' => 'Ce bloc est délégué et ne peut donc être étendu !',
	'UI:IPManagement:Action:Expand:IPv4Block:CannotBeExpanded' => 'Le bloc ne peut être étendu: %1$s',
	'UI:IPManagement:Action:Expand:IPv4Block:SmallerThanMinSize' => 'La taille du Bloc ne peut être plus petite que %1$s !',
	'UI:IPManagement:Action:Expand:IPv4Block:Done' => '%1$s <span class="hilite">%2$s</span> a été étendu.',

	// List space action on subnet blocks 
	'UI:IPManagement:Action:ListSpace:IPv4Block' => 'Lister l\'espace',                                               
	'UI:IPManagement:Action:ListSpace:IPv4Block:PageTitle_Object_Class' => 'TeemIp - %1$s - Espace',
	'UI:IPManagement:Action:ListSpace:IPv4Block:Title_Class_Object' => 'Espace dans %1$s: <span class="hilite">%2$s</span>',
	'UI:IPManagement:Action:ListSpace:IPv4Block:FreeSpace' => 'Libre [%1$s - %2$s] - %3$s IPs - %4$.2f %%',
	
	// Find Space action on subnet blocks
	'UI:IPManagement:Action:FindSpace:IPv4Block' => 'Rechercher de l\'espace',
	'UI:IPManagement:Action:FindSpace:IPv4Block:PageTitle_Object_Class' => 'TeemIp - %1$s - Recherche d\'espace',
	'UI:IPManagement:Action:FindSpace:IPv4Block:Title_Class_Object' => 'Recherche d\'espace IP dans %1$s : <span class="hilite">%2$s</span>',
	'UI:IPManagement:Action:FindSpace:IPv4Block:SizeOfSpace' => 'Taille de l\'espace à rechercher :',
	'UI:IPManagement:Action:FindSpace:IPv4Block:MaxNumberOfOffers' => 'Nombre maximum d\'offres :',
	
	// Do find Space action on subnet blocks
	'UI:IPManagement:Action:DoFindSpace:IPv4Block:PageTitle_Object_Class' => 'TeemIp - %1$s - Rechercher de l\'espace',
	'UI:IPManagement:Action:DoFindSpace:IPv4Block:Title_Class_Object' => 'Espace dans %1$s: <span class="hilite">%2$s</span>',
	'UI:IPManagement:Action:DoFindSpace:IPv4Block:Summary' => '%1$s premiers /%2$s dans le bloc',
	'UI:IPManagement:Action:DoFindSpace:IPv4Block:CreateAsBlock' => 'Créer en tant que bloc fils',
	'UI:IPManagement:Action:DoFindSpace:IPv4Block:CreateAsSubnet' => 'Créer en tant que sous-réseau',

	// Delegate action on subnet blocks
	'UI:IPManagement:Action:Delegate:IPv4Block' => 'Déléguer',
	'UI:IPManagement:Action:Delegate:IPv4Block:PageTitle_Object_Class' => 'TeemIp - %1$s - Déléguer',
	'UI:IPManagement:Action:Delegate:IPv4Block:Title_Class_Object' => 'Délègue %1$s <span class="hilite">%2$s</span> à l\' organisation fille',
	'UI:IPManagement:Action:Delegate:IPv4Block:ChildBlock' => 'Organisation fille à qui déléguer le bloc :',
	'UI:IPManagement:Action:Delegate:IPv4Block:NoChildOrg' => 'L\'organization dont dépend le bloc n\'a pas de fille. Le bloc ne peut donc être délégué !',
	'UI:IPManagement:Action:Delegate:IPv4Block:CannotBeDelegated' => 'Le bloc ne peut être délégué : %1$s',
	'UI:IPManagement:Action:Delegate:IPv4Block:Done' => '%1$s <span class="hilite">%2$s</span> a été délégué.',

//
// Management of Subnets
//
	// Creation Management	
	'UI:IPManagement:Action:New:IPSubnet:IpCannotChange' => 'L\'IP du Sous-réseau ne peut être modifiée !',	
	'UI:IPManagement:Action:New:IPSubnet:MaskCannotChange' => 'Le masque de Sous-réseau ne peut être modifié !',	
	'UI:IPManagement:Action:New:IPSubnet:IpIncorrect' => 'L\'IP du Sous-réseau n\'est pas cohérente avec le masque !',	
	'UI:IPManagement:Action:New:IPSubnet:NotInBlock' => 'Le Sous-réseau n\'est pas contenu dans le Bloc de Sous-réseaux !',	
	'UI:IPManagement:Action:New:IPSubnet:Collision0' => 'Le Sous-réseau existe déjà !',	
	'UI:IPManagement:Action:New:IPSubnet:Collision1' => 'Collision : l\'IP du Sous-réseau appartient à un Sous-réseau existant !',	
	'UI:IPManagement:Action:New:IPSubnet:Collision2' => 'Collision : l\'IP de Broadcast appartient à un Sous-réseau existant !',	
	'UI:IPManagement:Action:New:IPSubnet:Collision3' => 'Collision : le nouveau Sous-réseau contient un Sous-réseau existant !!',	
	'UI:IPManagement:Action:New:IPSubnet:GatewayOutOfSubnet' => 'L\'IP de la passerelle n\'est pas dans les limites du Sous-réseau !',

//
// Management of IPv4 Subnets
//
	// Display details of subnet
	'UI:IPManagement:Action:Details:IPv4Subnet' => 'Détails',
	'UI:IPManagement:Action:Details:IPv4Subnet+' => '',

	// Display list of subnets
	'UI:IPManagement:Action:DisplayList:IPv4Subnet' => 'Afficher la Liste',
	'UI:IPManagement:Action:DisplayList:IPv4Subnet+' => '',
	'UI:IPManagement:Action:DisplayList:IPv4Subnet:PageTitle_Class' => 'Sous-Réseaux IPv4',
	'UI:IPManagement:Action:DisplayList:IPv4Subnet:Title_Class' => 'Sous-Réseaux IPv4',
	
	// Display tree of subnets
	'UI:IPManagement:Action:DisplayTree:IPv4Subnet' => 'Afficher l\'Arbre',
	'UI:IPManagement:Action:DisplayTree:IPv4Subnet+' => '',
	'UI:IPManagement:Action:DisplayTree:IPv4Subnet:PageTitle_Class' => 'Sous-Réseaux IPv4',
	'UI:IPManagement:Action:DisplayTree:IPv4Subnet:Title_Class' => 'Sous-Réseaux IPv4',
	'UI:IPManagement:Action:DisplayTree:IPv4Subnet:OrgName' => 'Organisation %1$s',
	
	// Find space action on subnets 
	'UI:IPManagement:Action:FindSpace:IPv4Subnet' => 'Recherche d\'Espace',
	'UI:IPManagement:Action:FindSpace:IPv4Subnet:PageTitle_Object_Class' => 'TeemIp - %1$s - Recherche d\'espace',
	'UI:IPManagement:Action:FindSpace:IPv4Subnet:Title_Class_Object' => 'Recherche d\'espace IP dans %1$s: <span class="hilite">%2$s</span>',
	'UI:IPManagement:Action:FindSpace:IPv4Subnet:SizeTooSmall' => 'Le Sous-Réseau est trop petit pour y rechercher un espace !',
	'UI:IPManagement:Action:FindSpace:IPv4Subnet:SizeOfRange' => 'Taille de l\'espace à rechercher :',
	'UI:IPManagement:Action:FindSpace:IPv4Subnet:MaxNumberOfOffers' => 'Nombre maximum d\'offres :',
	
	// Do find Space action on subnet
	'UI:IPManagement:Action:DoFindSpace:IPv4Subnet:PageTitle_Object_Class' => 'TeemIp - %1$s - Recherche d\'espace',
	'UI:IPManagement:Action:DoFindSpace:IPv4Subnet:Title_Class_Object' => 'Espace dans %1$s: <span class="hilite">%2$s</span>',
	'UI:IPManagement:Action:DoFindSpace:IPv4Subnet:Summary' => '%1$s premières %2$s Plages d\'IPs libres dans le sous-réseau',
	'UI:IPManagement:Action:DoFindSpace:IPv4Subnet:RangeTooBig' => 'L\'espace demandé ne tient pas dans le sous-réseau. Veuillez choisir une taille plus petite.',
	'UI:IPManagement:Action:DoFindSpace:IPv4Subnet:CreateAsRange' => 'Créer en tant que Plage d\'IPs',

	// List IPs action on subnets 
	'UI:IPManagement:Action:ListIps:IPv4Subnet' => 'Lister et allouer IPs',                                               
	'UI:IPManagement:Action:ListIps:IPv4Subnet:PageTitle_Object_Class' => 'TeemIp - %1$s - IPs',
	'UI:IPManagement:Action:ListIps:IPv4Subnet:Title_Class_Object' => 'IPs contenues dans le %1$s: <span class="hilite">%2$s</span>',
	'UI:IPManagement:Action:ListIps:IPv4Subnet:Subtitle_ListRange' => 'Le Sous-réseau est trop grand pour lister toutes les IPs en une seule page. Merci de sélectionner une plage à afficher:',                                               
	'UI:IPManagement:Action:ListIps:IPv4Subnet:FirstIP' => 'Première IP de la plage',                                               
	'UI:IPManagement:Action:ListIps:IPv4Subnet:LastIP' => 'Dernière IP de la plage',                                               
	
	// Do list IPs action on subnet
	'UI:IPManagement:Action:DoListIps:IPv4Subnet' => 'Lister et allouer IPs',                                               
	'UI:IPManagement:Action:DoListIps:IPv4Subnet:PageTitle_Object_Class' => 'TeemIp - %1$s - IPs',
	'UI:IPManagement:Action:DoListIps:IPv4Subnet:Title_Class_Object' => 'Liste partielle des IPs contenues dans le %1$s: <span class="hilite">%2$s</span>',
 	'UI:IPManagement:Action:DoListIps:IPv4Subnet:CannotBeListed' => 'Les IPs ne peuvent être listées: %1$s',
	'UI:IPManagement:Action:DoListIps:IPv4Subnet:FirstIPOutOfSubnet' => 'La première IP est hors du sous-réseau !',
	'UI:IPManagement:Action:DoListIps:IPv4Subnet:LastIPOutOfSubnet' => 'La dernière IP est hors du sous-réseau !',
	'UI:IPManagement:Action:DoListIps:IPv4Subnet:FirstIpBiggerThanLastIp' => 'La première IP de la plage est plus grande que la dernière !',

	// Shrink action on subnets
	'UI:IPManagement:Action:Shrink:IPv4Subnet' => 'Réduire',
	'UI:IPManagement:Action:Shrink:IPv4Subnet+' => '',
	'UI:IPManagement:Action:Shrink:IPv4Subnet:Summary' => 'Résumé',
	'UI:IPManagement:Action:Shrink:IPv4Subnet:Summary+' => '',
	'UI:IPManagement:Action:Shrink:IPv4Subnet:PageTitle_Object_Class' => 'TeemIp - Réduire %1$s - %2$s',
	'UI:IPManagement:Action:Shrink:IPv4Subnet:Title_Class_Object' => 'Réduire %1$s: <span class="hilite">%2$s</span>',
	'UI:IPManagement:Action:Shrink:IPv4Subnet:CannotBeShrunk' =>  'Le Sous-réseau ne peut pas être réduit: %1$s',
	'UI:IPManagement:Action:Shrink:IPv4Subnet:SizeTooSmall' => 'Le Sous-réseau est trop petit pour être réduit !',
	'UI:IPManagement:Action:Shrink:IPv4Subnet:SizeTooSmallBy' => 'Le Sous-réseau est trop petit pour être réduit par %1$s !',
	'UI:IPManagement:Action:Shrink:IPv4Subnet:IPRangeInTheMiddle' => 'La Plage d\'Ips : <b>%1$s [%2$s - %3$s]</b> est à cheval sur la frontière du nouveau Sous-réseau. La réduction ne peut avoir lieu !',	
	'UI:IPManagement:Action:Shrink:IPv4Subnet:IPRangeDropped' => 'Erreur: la Plage d\'Ips: <b>%1$s [%2$s - %3$s]</b> sort du Sous-réseau. La réduction ne peut avoir lieu !',	
	'UI:IPManagement:Action:Shrink:IPv4Subnet:Done' => '%1$s: <span class="hilite">%2$s</span> a été réduit par %3$s.',
	'UI:IPManagement:Action:Shrink:IPv4Subnet:By' => 'Réduire par :',
	
	// Split action on subnets
	'UI:IPManagement:Action:Split:IPv4Subnet' => 'Couper',
	'UI:IPManagement:Action:Split:IPv4Subnet+' => '',
	'UI:IPManagement:Action:Split:IPv4Subnet:Summary' => 'Résumé',
	'UI:IPManagement:Action:Split:IPv4Subnet:Summary+' => '',
	'UI:IPManagement:Action:Split:IPv4Subnet:PageTitle_Object_Class' => 'TeemIp - Couper %1$s - %2$s',
	'UI:IPManagement:Action:Split:IPv4Subnet:Title_Class_Object' => 'Couper %1$s: <span class="hilite">%2$s</span>',
	'UI:IPManagement:Action:Split:IPv4Subnet:CannotBeSplit' =>  'Le Sous-réseau ne peut pas être coupé: %1$s',
	'UI:IPManagement:Action:Split:IPv4Subnet:SizeTooSmall' => 'Le Sous-réseau est trop petit pour être coupé !',
	'UI:IPManagement:Action:Split:IPv4Subnet:SizeTooSmallBy' => 'Le Sous-réseau est trop petit pour être coupé en %1$s !',
	'UI:IPManagement:Action:Split:IPv4Subnet:IPRangeInTheMiddle' => 'La Plage d\'Ips : <b>%1$s [%2$s - %3$s]</b> est à cheval sur la frontière des nouveaux Sous-réseaux. La coupure ne peut avoir lieu !',	
	'UI:IPManagement:Action:Split:IPv4Subnet:Done' => '%1$s: <span class="hilite">%2$s</span> a été coupé en %3$s.',
	'UI:IPManagement:Action:Split:IPv4Subnet:In' => 'Couper en :',
	
	// Expand action on subnets
	'UI:IPManagement:Action:Expand:IPv4Subnet' => 'Etendre',
	'UI:IPManagement:Action:Expand:IPv4Subnet+' => '',
	'UI:IPManagement:Action:Expand:IPv4Subnet:Summary' => 'Résumé',
	'UI:IPManagement:Action:Expand:IPv4Subnet:Summary+' => '',
	'UI:IPManagement:Action:Expand:IPv4Subnet:PageTitle_Object_Class' => 'TeemIp - Etendre %1$s - %2$s',
	'UI:IPManagement:Action:Expand:IPv4Subnet:Title_Class_Object' => 'Etendre %1$s: <span class="hilite">%2$s</span>',
	'UI:IPManagement:Action:Expand:IPv4Subnet:CannotBeExpanded' =>  'Le Sous-réseau ne peut pas être étendu: %1$s',
	'UI:IPManagement:Action:Expand:IPv4Subnet:SizeTooBig' => 'Le Sous-réseau est trop grand pour être étendu !',
	'UI:IPManagement:Action:Expand:IPv4Subnet:SizeTooBigBy' => 'Le Sous-réseau est trop grand pour être étendu par %1$s !',
	'UI:IPManagement:Action:Expand:IPv4Subnet:NotInIPBlock' => 'Le bloc contenant le sous-réseau est trop petit pour contenir le nouveau sous-réseau étendu !',
	'UI:IPManagement:Action:Expand:IPv4Subnet:Done' => '%1$s: <span class="hilite">%2$s</span> a été étendu par %3$s',
	'UI:IPManagement:Action:Expand:IPv4Subnet:By' => 'Etendre par :',

	// CSV Export action on subnets
	'UI:IPManagement:Action:CsvExportIps:IPv4Subnet' => 'Export CSV des IPs',
	'UI:IPManagement:Action:CsvExportIps:IPv4Subnet:PageTitle_Object_Class' => 'TeemIp - %1$s - %2$s Export CSV des IPs',
	'UI:IPManagement:Action:CsvExportIps:IPv4Subnet:Title_Class_Object' => 'Export CSV des IPs pour %1$s: <span class="hilite">%2$s</span>',
	'UI:IPManagement:Action:CsvExportIps:IPv4Subnet:Subtitle_ListRange' => 'Le Sous-réseau est trop grand pour exporter toutes les IPs en une seule page. Merci de sélectionner une plage à exporter:',                                               
	'UI:IPManagement:Action:CsvExportIps:IPv4Subnet:FirstIP' => 'Première IP de la plage',                                               
	'UI:IPManagement:Action:CsvExportIps:IPv4Subnet:LastIP' => 'Dernière IP de la plage',                                               
	
	// Do CSV export IPs action on subnet
	'UI:IPManagement:Action:DoCsvExportIps:IPv4Subnet' => 'Export CSV des IPs',                                               
	'UI:IPManagement:Action:DoCsvExportIps:IPv4Subnet:PageTitle_Object_Class' => 'TeemIp - %1$s - %2$s Export CSV des IPs',
	'UI:IPManagement:Action:DoCsvExportIps:IPv4Subnet:Title_Class_Object' => 'Export CSV partiel des IPs pour %1$s: <span class="hilite">%2$s</span>',
 	'UI:IPManagement:Action:DoCsvExportIps:IPv4Subnet:CannotBeListed' => 'Les IPs ne peuvent être listées: %1$s',
	'UI:IPManagement:Action:DoCsvExportIps:IPv4Subnet:FirstIPOutOfSubnet' => 'La première IP est hors du sous-réseau !',
	'UI:IPManagement:Action:DoCsvExportIps:IPv4Subnet:LastIPOutOfSubnet' => 'La dernière IP est hors du sous-réseau !',
	'UI:IPManagement:Action:DoCsvExportIps:IPv4Subnet:FirstIpBiggerThanLastIp' => 'La première IP de la plage est plus grande que la dernière !',

	// Subnet calculator
	'UI:IPManagement:Action:Calculator:IPv4Subnet' => 'Calculateur de Sous-réseaux',
	'UI:IPManagement:Action:Calculator:IPv4Subnet:PageTitle_Object_Class' => 'TeemIp - %2$s Calculateur',
	'UI:IPManagement:Action:Calculator:IPv4Subnet:Title_Class_Object' => 'Calculateur pour %1$s',
	'UI:IPManagement:Action:Calculator:IPv4Subnet:IP' => 'Adresse IP',
	'UI:IPManagement:Action:Calculator:IPv4Subnet:Mask' => 'Masque',
	'UI:IPManagement:Action:Calculator:IPv4Subnet:CIDR' => 'CIDR',

	// Do Subnet calculator
	'UI:IPManagement:Action:DoCalculator:IPv4Subnet' => 'Calculateur de Sous-réseaux',
	'UI:IPManagement:Action:DoCalculator:IPv4Subnet:PageTitle_Object_Class' => 'TeemIp - %2$s Calculateur',
	'UI:IPManagement:Action:DoCalculator:IPv4Subnet:Title_Class_Object' => '%1$s - Résultat du calculateur',
	'UI:IPManagement:Action:DoCalculator:IPv4Subnet:IP' => 'Adresse IP',
	'UI:IPManagement:Action:DoCalculator:IPv4Subnet:Mask' => 'Masque',
	'UI:IPManagement:Action:DoCalculator:IPv4Subnet:CIDR' => 'CIDR',
	'UI:IPManagement:Action:DoCalculator:IPv4Subnet:SubnetIP' => 'IP du Sous-réseau',
	'UI:IPManagement:Action:DoCalculator:IPv4Subnet:Wildcard' => 'Masque Wildcard',
	'UI:IPManagement:Action:DoCalculator:IPv4Subnet:BroadcastIP' => 'IP de Broadcast',
	'UI:IPManagement:Action:DoCalculator:IPv4Subnet:IPNumber' => 'Nombre d\'IPs',
	'UI:IPManagement:Action:DoCalculator:IPv4Subnet:UsableHosts' => 'Nombre de Hosts utilisables',
	'UI:IPManagement:Action:DoCalculator:IPv4Subnet:CannotRun' => 'Le calculateur de Sous-réseau ne peut tourner: %1$s',
	'UI:IPManagement:Action:DoCalculator:IPv4Subnet:EnterMaskOrCIDR' => 'Entrer un masque ou un CIDR!',
	'UI:IPManagement:Action:DoCalculator:IPv4Subnet:WrongMask' => 'Le masque est invalide !',
	'UI:IPManagement:Action:DoCalculator:IPv4Subnet:WrongCIDR' => 'Le CIDR est invalide !',

//
// Management of IP ranges
//
	// Creation Management	
	'UI:IPManagement:Action:New:IPRange:NameExist' => 'Le nom de la Plage existe déjà dans le Sous-réseau !',	
	'UI:IPManagement:Action:New:IPRange:Reverted' => 'La première IP de la Plage est plus grande que la dernière !',	
	'UI:IPManagement:Action:New:IPRange:NotInSubnet' => 'La Plage d\'IPs n\'est pas contenue dans le Sous-réseau sélectionné !',	
	'UI:IPManagement:Action:New:IPRange:Collision0' => 'La Plage d\'IPs existe déjà !',	
	'UI:IPManagement:Action:New:IPRange:Collision1' => 'Collision : la première IP appartient à une plage existante !',	
	'UI:IPManagement:Action:New:IPRange:Collision2' => 'Collision : la dernière IP appartient à une plage existante !',	
	'UI:IPManagement:Action:New:IPRange:Collision3' => 'Collision : la nouvelle plage inclut une plage existante !',	

//
// Management of IPv4 ranges
//
	// Display details of IP Range
	'UI:IPManagement:Action:Details:IPv4Range' => 'Détails',
	'UI:IPManagement:Action:Details:IPv4Range+' => '',

	// List IPs action on IP Ranges 
	'UI:IPManagement:Action:ListIps:IPv4Range' => 'Lister et allouer IPs',                                               
	'UI:IPManagement:Action:ListIps:IPv4Range:PageTitle_Object_Class' => 'TeemIp - %1$s - IPs',
	'UI:IPManagement:Action:ListIps:IPv4Range:Title_Class_Object' => 'IPs contenues dans %1$s: <span class="hilite">%2$s</span>',
	'UI:IPManagement:Action:ListIps:IPv4Range:Subtitle_ListRange' => 'La plage d\'IPs est trop grande pour lister toutes les IPs en une seule page. Merci de sélectionner une sous plage à afficher:',                                               
	'UI:IPManagement:Action:ListIps:IPv4Range:FirstIP' => 'Première IP de la plage',                                               
	'UI:IPManagement:Action:ListIps:IPv4Range:LastIP' => 'Dernière IP de la plage',                                               
		
	// Do list IPs action on IP Ranges 
	'UI:IPManagement:Action:DoListIps:IPv4Range' => 'Lister et allouer IPs',                                               
	'UI:IPManagement:Action:DoListIps:IPv4Range:PageTitle_Object_Class' => 'TeemIp - %1$s - IPs',
	'UI:IPManagement:Action:DoListIps:IPv4Range:Title_Class_Object' => 'Liste partielle des IPs contenues dans la %1$s: <span class="hilite">%2$s</span>',
	'UI:IPManagement:Action:DoListIps:IPv4Range:CannotBeListed' => 'La plage d\'IPs ne peut être listée: %1$s',
	'UI:IPManagement:Action:DoListIps:IPv4Range:FirstIPOutOfRange' => 'La première IP est hors de la plage !',
	'UI:IPManagement:Action:DoListIps:IPv4Range:LastIPOutOfRange' => 'La dernière IP est hors de la plage !',
	'UI:IPManagement:Action:DoListIps:IPv4Range:FirstIpBiggerThanLastIp' => 'La première IP de la plage est plus grande que la dernière !',

	// CSV Export action on IP Ranges
	'UI:IPManagement:Action:CsvExportIps:IPv4Range' => 'Export CSV des IPs',
	'UI:IPManagement:Action:CsvExportIps:IPv4Range:PageTitle_Object_Class' => 'TeemIp - %1$s - %2$s export CSV des IPs',
	'UI:IPManagement:Action:CsvExportIps:IPv4Range:Title_Class_Object' => 'Export CSV des IPs pour %1$s: <span class="hilite">%2$s</span>',
	'UI:IPManagement:Action:CsvExportIps:IPv4Range:Subtitle_ListRange' => 'La plage d\'IPs est trop grande pour exporter toutes les IPs en une seule fois. Merci de sélectionner une sous plage à exporter:',                                               
	'UI:IPManagement:Action:CsvExportIps:IPv4Range:FirstIP' => 'Première IP de la plage',                                               
	'UI:IPManagement:Action:CsvExportIps:IPv4Range:LastIP' => 'Dernière IP de la plage',                                               
	
	// Do CSV Export IPs action on IP Ranges
	'UI:IPManagement:Action:DoCsvExportIps:IPv4Range' => 'Export CSV des IPs',                                               
	'UI:IPManagement:Action:DoCsvExportIps:IPv4Range:PageTitle_Object_Class' => 'TeemIp - %1$s - %2$s export CSV des IPs',
	'UI:IPManagement:Action:DoCsvExportIps:IPv4Range:Title_Class_Object' => 'Export CSV partiel des IPs pour %1$s: <span class="hilite">%2$s</span>',
	'UI:IPManagement:Action:DoCsvExportIps:IPv4Range:CannotBeListed' => 'La plage ne peut être exportée: %1$s',
	'UI:IPManagement:Action:DoCsvExportIps:IPv4Range:FirstIPOutOfRange' => 'La première IP est hors de la plage !',
	'UI:IPManagement:Action:DoCsvExportIps:IPv4Range:LastIPOutOfRange' => 'La dernière IP est hors de la plage !',
	'UI:IPManagement:Action:DoCsvExportIps:IPv4Range:FirstIpBiggerThanLastIp' => 'La première IP de la plage est plus grande que la dernière !',

//
// Management of IPs
//
	// Creation Management	
	'UI:IPManagement:Action:New:IPAddress:IPNameCollision' => 'le nom court existe déjà dans le domaine !',	

	'UI:IPManagement:Action:New:IPAddress:IPCollision' => 'L\'adresse IP existe déjà !',	
	'UI:IPManagement:Action:New:IPAddress:NotInRange' => 'L\'adresse IP n\'appartient pas à la plage d\'IPs !',	
	'UI:IPManagement:Action:New:IPAddress:NotInSubnet' => 'L\'adresse IP n\'appartient pas au sous-réseau !',	
	'UI:IPManagement:Action:New:IPAddress:IPPings' => 'L\'IP répond au ping !',	
	'UI:IPManagement:Action:New:IPAddress:NatIPsAretheSame' => 'L\'IP ne peut être NATée avec elle même !',
	
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
