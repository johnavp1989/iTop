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
// Classes in 'Teemip-ip-Mgmt Module'
//////////////////////////////////////////////////////////////////////
//

//
// Class: IPObject
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:IPObject' => 'IP Objekt',
	'Class:IPObject+' => '',
	'Class:IPObject/Attribute:org_id' => 'Organisation',
	'Class:IPObject/Attribute:org_id+' => '',
	'Class:IPObject/Attribute:org_name' => 'Organisationsname',
	'Class:IPObject/Attribute:org_name+' => '',
	'Class:IPObject/Attribute:status' => 'Status',
	'Class:IPObject/Attribute:status+' => '',
	'Class:IPObject/Attribute:status/Value:reserved' => 'Reserviert',
	'Class:IPObject/Attribute:status/Value:reserved+' => '',
	'Class:IPObject/Attribute:status/Value:allocated' => 'Allokiert',
	'Class:IPObject/Attribute:status/Value:allocated+' => '',
	'Class:IPObject/Attribute:status/Value:released' => 'Freigegeben',
	'Class:IPObject/Attribute:status/Value:released+' => '',
	'Class:IPObject/Attribute:status/Value:unassigned' => 'Nicht zugeordnet',
	'Class:IPObject/Attribute:status/Value:unassigned+' => '',
	'Class:IPObject/Attribute:comment' => 'Kommentar',
	'Class:IPObject/Attribute:comment+' => '',
	'Class:IPObject/Attribute:requestor_id' => 'Anforderung durch',
	'Class:IPObject/Attribute:requestor_id+' => '',
	'Class:IPObject/Attribute:requestor_name' => 'Name des Anfordernden',
	'Class:IPObject/Attribute:requestor_name+' => '',
	'Class:IPObject/Attribute:contact_list' => 'Kontakte',
	'Class:IPObject/Attribute:contact_list+' => 'Kontakte, die mit dem IP Objekt verknüpft sind.',
	'Class:IPObject/Attribute:document_list' => 'Dokumente',
	'Class:IPObject/Attribute:document_list+' => 'Dokumente, die mit dem IP Objekt verknüpft sind.',
));

//
// Class: lnkContactToIPObject
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:lnkContactToIPObject' => 'Verknüpfung Kontakt/IP Objekt',
	'Class:lnkContactToIPObject+' => '',
	'Class:lnkContactToIPObject/Attribute:ipobject_id' => 'IP Objekt',
	'Class:lnkContactToIPObject/Attribute:ipobject_id+' => '',
	'Class:lnkContactToIPObject/Attribute:contact_id' => 'Kontakt',
	'Class:lnkContactToIPObject/Attribute:contact_id+' => '',
	'Class:lnkContactToIPObject/Attribute:contact_name' => 'Kontakt Name',
	'Class:lnkContactToIPObject/Attribute:contact_name+' => '',
));

//
// Class: lnkDocToIPObject
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:lnkDocToIPObject' => 'Verknüpfung Document/IP Objekt',
	'Class:lnkDocToIPObject+' => '',
	'Class:lnkDocToIPObject/Attribute:ipobject_id' => 'IP Objekt',
	'Class:lnkDocToIPObject/Attribute:ipobject_id+' => '',
	'Class:lnkDocToIPObject/Attribute:document_id' => 'Dokument',
	'Class:lnkDocToIPObject/Attribute:document_id+' => '',
	'Class:lnkDocToIPObject/Attribute:document_name' => 'Dokumentname',
	'Class:lnkDocToIPObject/Attribute:document_name+' => '',
));

//
// Class: IPBlock
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:IPBlock' => 'Subnetz Block',
	'Class:IPBlock+' => '',
	'Class:IPBlock:baseinfo' => 'Allgemeine Information',
	'Class:IPBlock:ipinfo' => 'IP Information',
	'Class:IPBlock:DelegatedToChild' => '<font color=#ff0000>Delegated to child organization : </font>%1$s',
	'Class:IPBlock:DelegatedFromParent' => '<font color=#ff0000>Delegated from parent organization : </font>%1$s',
	'Class:IPBlock/Attribute:name' => 'Name',
	'Class:IPBlock/Attribute:name+' => '',
	'Class:IPBlock/Attribute:type' => 'Typ',
	'Class:IPBlock/Attribute:type+' => 'Typ des Subnetz Blocks',
	'Class:IPBlock/Attribute:parent_org_id' => 'Delegiert von',
	'Class:IPBlock/Attribute:parent_org_id+' => 'Organisation, von der der Subnetzblock delegiert wurde',
	'Class:IPBlock/Attribute:parent_org_name' => 'Name der delegierenden Organisation',
	'Class:IPBlock/Attribute:parent_org_name+' => 'Name der Organisation, von der der Subnetzblock delegiert wurde',
	'Class:IPBlock/Attribute:occupancy' => 'belegter Bereich',
	'Class:IPBlock/Attribute:occupancy+' => '',
	'Class:IPBlock/Attribute:children_occupancy' => 'Durch Children belegter Bereich',
	'Class:IPBlock/Attribute:children_occupancy+' => '',
	'Class:IPBlock/Attribute:subnet_occupancy' => 'Durch Subnetze belegter Bereich',
	'Class:IPBlock/Attribute:subnet_occupancy+' => '',
	'Class:IPBlock/Attribute:location_list' => 'Standorte',
	'Class:IPBlock/Attribute:location_list+' => 'Standorte, in die der Subnetz Block reicht',
));

//
// Class extensions for IPBlock
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:IPBlock/Tab:globalparam' => 'Globale Einstellungen',
	'Class:IPBlock/Tab:childblock' => 'Child Blöcke (%1$s)',
	'Class:IPBlock/Tab:childblock+' => 'Blöcke, die an diesen Block attached sind',
	'Class:IPBlock/Tab:childblock-count' => 'Child Blöcke : %1$s',
	'Class:IPBlock/Tab:childblock-count-percent' => ' durch Children Blöcke belegt',
	'Class:IPBlock/Tab:childblock-count-percent-remain' => ' neu frei in Children-Blöcken: %1$.1f %%',
	'Class:IPBlock/Tab:subnet' => 'Subnetz (%1$s)',
	'Class:IPBlock/Tab:subnet+' => 'Subnetze attached an diesen Block',
	'Class:IPBlock/Tab:subnet-count' => 'Subnetze : %1$s',
	'Class:IPBlock/Tab:subnet-count-percent' => ' durch Subnetze belegt',
	'Class:IPBlock/Tab:subnet-count-percent-remain' => 'Space used by Subnets in remaining space : %1$.1f %%',
));

//
// Class: lnkBlockToLocation
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:lnkIPBlockToLocation' => 'Link Block / Standort',
	'Class:lnkIPBlockToLocation+' => '',
	'Class:lnkIPBlockToLocation/Attribute:block_id' => 'Block',
	'Class:lnkIPBlockToLocation/Attribute:block_id+' => '',
	'Class:lnkIPBlockToLocation/Attribute:block_name' => 'Block name',
	'Class:lnkIPBlockToLocation/Attribute:block_name+' => '',
	'Class:lnkIPBlockToLocation/Attribute:location_id' => 'Standort',
	'Class:lnkIPBlockToLocation/Attribute:location_id+' => '',
	'Class:lnkIPBlockToLocation/Attribute:location_name' => 'Standort Name',
	'Class:lnkIPBlockToLocation/Attribute:location_name+' => '',
));

//
// Class: IPv4Block
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:IPv4Block' => 'IPv4 Subnetz Block',
	'Class:IPv4Block+' => '',
	'Class:IPv4Block/Attribute:parent_id' => 'Parent',
	'Class:IPv4Block/Attribute:parent_id+' => '',
	'Class:IPv4Block/Attribute:parent_name' => 'Parent Name',
	'Class:IPv4Block/Attribute:parent_name+' => '',
	'Class:IPv4Block/Attribute:firstip' => 'Erste IP',
	'Class:IPv4Block/Attribute:firstip+' => 'Erste IP Adresse des Subnetz Blocks',
	'Class:IPv4Block/Attribute:lastip' => 'Letzte IP',
	'Class:IPv4Block/Attribute:lastip+' => 'letzte IP Adresse des Subnetz Blocks',
));

//
// Class: IPSubnet
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:IPSubnet' => 'Subnetz',
	'Class:IPSubnet+' => '',
	'Class:IPSubnet:baseinfo' => 'Allgemeine Informationen',
	'Class:IPSubnet:ipinfo' => 'IP Informationen',
	'Class:IPSubnet/Attribute:name' => 'Name',
	'Class:IPSubnet/Attribute:name+' => '',
	'Class:IPSubnet/Attribute:type' => 'Type',
	'Class:IPSubnet/Attribute:type+' => '',
	'Class:IPSubnet/Attribute:release_date' => 'Datum der Wiederfreigabe',
	'Class:IPSubnet/Attribute:release_date+' => 'Datum, an dem das Subnetz freigegeben und nicht mehr benutzt wurde.',
	'Class:IPSubnet/Attribute:ip_occupancy' => 'Registrierte IPs',
	'Class:IPSubnet/Attribute:ip_occupancy+' => '',
	'Class:IPSubnet/Attribute:range_occupancy' => 'Registrierte Bereiche',
	'Class:IPSubnet/Attribute:range_occupancy+' => '',                         
	'Class:IPSubnet/Attribute:alarm_water_mark' => 'Status des Alarm Schwellenwerts',
	'Class:IPSubnet/Attribute:alarm_water_mark+' => '',                              
	'Class:IPSubnet/Attribute:alarm_water_mark/Value:no_alarm' => 'Es wurde noch kein Alarm gesendent',
	'Class:IPSubnet/Attribute:alarm_water_mark/Value:low_sent' => 'Niedrig Alarm gesendet',
	'Class:IPSubnet/Attribute:alarm_water_mark/Value:high_sent' => 'Hoch Alarm gesendet ',
	'Class:IPSubnet/Attribute:vlans_list' => 'VLANs',
	'Class:IPSubnet/Attribute:vlans_list+' => '',
	'Class:IPSubnet/Attribute:location_list' => 'Standorte',
	'Class:IPSubnet/Attribute:location_list+' => 'Standorte, in die das Subnetz sich erstreckt',
));

//
// Class extensions for IPSubnet
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:IPSubnet/Tab:globalparam' => 'Globale Einstellungen',
	'Class:IPSubnet/Tab:ipregistered' => 'Registrierte IPs (%1$s)',
	'Class:IPSubnet/Tab:ipregistered+' => 'IPs, die im Subnetz registriert sind',
	'Class:IPSubnet/Tab:ipregistered-count' => ' - %1$s reserviert und %2$s allokiert von insgesamt %3$s',
	'Class:IPSubnet/Tab:ipfree-explain' => 'Liste der ersten %1$s freien IP Adressen:',
	'Class:IPSubnet/Tab:ipfree-explainbis' => 'Liste ALLER freien IP Adressen:',
	'Class:IPSubnet/Tab:iprange' => 'IP Bereiche (%1$s)',
	'Class:IPSubnet/Tab:iprange+' => 'IP Bereiche, die Teil des Subnetzes sind',
	'Class:IPSubnet/Tab:iprange-count-percent' => 'durch die IP Bereiche verbrauchter Platz.',
	'Class:IPSubnet/Tab:notifications' => 'Benachrichtigungen (%1$s)',
	'Class:IPSubnet/Tab:notifications+' => 'Benachrichtigungen in Verbindung mit diesem Subnetz',
	'Class:IPSubnet/Tab:requests' => 'IP Anforderungen (%1$s)',
	'Class:IPSubnet/Tab:requests+' => 'IP Anforderung in Verbindung mit diesem Subnetz',
	'Class:IPSubnet/Tab:changes' => 'IP Änderungen (%1$s)',
	'Class:IPSubnet/Tab:changes+' => 'IP Änderungen in Verbindung mit diesem Subnetz',
));

//
// Class: lnkIPSubnetToVLAN
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:lnkIPSubnetToVLAN' => 'Verknüpfung Subnetz / VLAN',
	'Class:lnkIPSubnetToVLAN+' => '',
	'Class:lnkIPSubnetToVLAN/Attribute:ipsubnet_id_finalclass_recall' => 'Subnetz Type',
	'Class:lnkIPSubnetToVLAN/Attribute:ipsubnet_id_finalclass_recall+' => '',
	'Class:lnkIPSubnetToVLAN/Attribute:ipsubnet_id' => 'Subnetz',
	'Class:lnkIPSubnetToVLAN/Attribute:ipsubnet_id+' => '',
	'Class:lnkIPSubnetToVLAN/Attribute:ipsubnet_name' => 'Subnetz Name',
	'Class:lnkIPSubnetToVLAN/Attribute:ipsubnet_name+' => '',
	'Class:lnkIPSubnetToVLAN/Attribute:vlan_id' => 'VLAN',
	'Class:lnkIPSubnetToVLAN/Attribute:vlan_id+' => '',
	'Class:lnkIPSubnetToVLAN/Attribute:vlan_tag' => 'VLAN Tag',
	'Class:lnkIPSubnetToVLAN/Attribute:vlan_tag+' => '',
));

//
// Class: lnkIPSubnetToLocation
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:lnkIPSubnetToLocation' => 'Verknüpfung Subnetz / Standort',
	'Class:lnkIPSubnetToLocation+' => '',
	'Class:lnkIPSubnetToLocation/Attribute:ipsubnet_id' => 'Subnetz',
	'Class:lnkIPSubnetToLocation/Attribute:ipsubnet_id+' => '',
	'Class:lnkIPSubnetToLocation/Attribute:ipsubnet_name' => 'Subnetz Name',
	'Class:lnkIPSubnetToLocation/Attribute:ipsubnet_name+' => '',
	'Class:lnkIPSubnetToLocation/Attribute:location_id' => 'Standort',
	'Class:lnkIPSubnetToLocation/Attribute:location_id+' => '',
	'Class:lnkIPSubnetToLocation/Attribute:location_name' => 'Standort Name',
	'Class:lnkIPSubnetToLocation/Attribute:location_name+' => '',
));

//
// Class: IPv4Subnet
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:IPv4Subnet' => 'IPv4 Subnetz',
	'Class:IPv4Subnet+' => '',
	'Class:IPv4Subnet/Attribute:block_id' => 'Subnetz Block',
	'Class:IPv4Subnet/Attribute:block_id+' => '',
	'Class:IPv4Subnet/Attribute:block_name' => 'Block Name',
	'Class:IPv4Subnet/Attribute:block_name+' => '',
	'Class:IPv4Subnet/Attribute:ip' => 'Subnetz IP',
	'Class:IPv4Subnet/Attribute:ip+' => '',
	'Class:IPv4Subnet/Attribute:mask' => 'Maske',
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
	'Class:IPv4Subnet/Attribute:gatewayip' => 'Gateway IP',
	'Class:IPv4Subnet/Attribute:gatewayip+' => '',
	'Class:IPv4Subnet/Attribute:broadcastip' => 'Broadcast IP',
	'Class:IPv4Subnet/Attribute:broadcastip+' => '',
));

//
// Class: IPRange
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:IPRange' => 'IP Bereich',
	'Class:IPRange+' => '',
	'Class:IPRange/Attribute:range' => 'Name',
	'Class:IPRange/Attribute:range+' => '',
	'Class:IPRange/Attribute:usage_id' => 'Verwendungszweck',    //usage
	'Class:IPRange/Attribute:usage_id+' => 'Verwendungszweck des Bereichs',
	'Class:IPRange/Attribute:usage_name' => 'Verwendungszweck Name',
	'Class:IPRange/Attribute:usage_name+' => '',
	'Class:IPRange/Attribute:dhcp' => 'DHCP Bereich',
	'Class:IPRange/Attribute:dhcp+' => '',
	'Class:IPRange/Attribute:dhcp/Value:dhcp_no' => 'Nein',
	'Class:IPRange/Attribute:dhcp/Value:dhcp_no+' => '',
	'Class:IPRange/Attribute:dhcp/Value:dhcp_yes' => 'Ja',
	'Class:IPRange/Attribute:dhcp/Value:dhcp_yes+' => '',
	'Class:IPv4Range/Attribute:occupancy' => 'Registrierte IPs',
	'Class:IPv4Range/Attribute:occupancy+' => '',
));

//
// Class extensions for IPRange
//                                                       

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:IPRange/Tab:ipregistered' => 'Registrierte IPs (%1$s)',
	'Class:IPRange/Tab:ipregistered+' => 'IPs, die in diesem IP Bereich registriert sind',
	'Class:IPRange/Tab:ipregistered-count' => ' - %1$s reserviert und %2$s allokiert von insgesamt %3$s',
	'Class:IPRange/Tab:ipfree-explain' => 'Liste der ersten %1$s freien IP Adressen:',
	'Class:IPRange/Tab:ipfree-explainbis' => 'Liste ALLER freien IP Adressen:',
	'Class:IPRange/Tab:notifications' => 'Benachrichtigungen (%1$s)',
	'Class:IPRange/Tab:notifications+' => 'Benachrichtigungen in Verbindung mit diesem IP Bereich',
));

//
// Class: IPv4Range
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:IPv4Range' => 'IPv4 Bereich',
	'Class:IPv4Range+' => '',
	'Class:IPv4Range/Attribute:subnet_id' => 'Subnetz',
	'Class:IPv4Range/Attribute:subnet_id+' => '',
	'Class:IPv4Range/Attribute:subnet_ip' => 'Subnetz IP',
	'Class:IPv4Range/Attribute:subnet_ip+' => '',
	'Class:IPv4Range/Attribute:firstip' => 'Erste IP des Bereichs',
	'Class:IPv4Range/Attribute:firstip+' => '',
	'Class:IPv4Range/Attribute:lastip' => 'Letzte IP des Bereichs',
	'Class:IPv4Range/Attribute:lastip+' => '',
));

//
// Class: IPAddress
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:IPAddress' => 'IP Adresse',
	'Class:IPAddress+' => '',
	'Class:IPAddress:baseinfo' => 'Allgemeine Informationen',
	'Class:IPAddress:ipinfo' => 'IP Informationen',
	'Class:IPAddress/Attribute:short_name' => 'Hostname',
	'Class:IPAddress/Attribute:short_name+' => 'Hostnameteil der FQDN, zb. "host" bei host.example.com',
	'Class:IPAddress/Attribute:domain_id' => 'DNS Domain',
	'Class:IPAddress/Attribute:domain_id+' => '',
	'Class:IPAddress/Attribute:domain_name' => 'Domain Name',
	'Class:IPAddress/Attribute:domain_name+' => 'Name of the DNS domain',
	'Class:IPAddress/Attribute:fqdn' => 'FQDN',
	'Class:IPAddress/Attribute:fqdn+' => 'Fully Qualified Domain Name',
	'Class:IPAddress/Attribute:usage_id' => 'Verwendungszweck',
	'Class:IPAddress/Attribute:usage_id+' => '',
	'Class:IPAddress/Attribute:usage_name' => 'Verwendungszweck',
	'Class:IPAddress/Attribute:usage_name+' => '',
	'Class:IPAddress/Attribute:ipinterface_id' => 'IP Interface',
	'Class:IPAddress/Attribute:ipinterface_id+' => '',
	'Class:IPAddress/Attribute:ipinterface_name' => 'IP Interface name',
	'Class:IPAddress/Attribute:ipinterface_name+' => '',
	'Class:IPAddress/Attribute:release_date' => 'Datum der Wiederfreigabe',
	'Class:IPAddress/Attribute:release_date+' => 'Datum, an dem die IP Adresse wieder freigegeben und nicht mehr benutzt wurde.',
	'Class:IPAddress/Attribute:ip_list' => 'NAT IPs',
	'Class:IPAddress/Attribute:finalclass' => 'CI Klasse',
	'Class:IPAddress/Attribute:finalclass+' => '',
));

//
// Class extensions for IPAddress
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:IPAddress/Tab:globalparam' => 'Globale Einstellungen',
	'Class:IPAddress/Tab:parents' => 'Parents',
	'Class:IPAddress/Tab:ip_list' => 'NAT IPs (%1$s)',
	'Class:IPAddress/Tab:ip_list+' => 'Liste der NAT IPs',
	'Class:IPAddress/Tab:ci_list' => 'CIs (%1$s)',
    'Class:IPAddress/Tab:ci_list+' => 'Liste der CIs, die auf diese IP zeigen',
	'Class:IPAddress/Tab:DatacenterDevice' => 'Datacenter Geräte (%1$s)',
	'Class:IPAddress/Tab:DatacenterDevice+' => 'Datacenter Geräte, die diese IP als ihre Management IP verwenden: %1$s',
	'Class:IPAddress/Tab:VirtualMachine' => 'Virtuelle Maschine (%1$s)',
	'Class:IPAddress/Tab:VirtualMachine+' => 'Virtuelle Maschinen, die diese IP als ihre Management IP verwenden: %1$s',
	'Class:IPAddress/Tab:IPInterface' => 'IP Interfaces (%1$s)',
	'Class:IPAddress/Tab:IPInterface+' => 'IP Interfaces mit dieser IP: %1$s',
	'Class:IPAddress/Tab:NoCi' => 'No CI',
	'Class:IPAddress/Tab:NoCi+' => 'No Configuration Item is using this IP',
    'Class:IPAddress/Tab:requests' => 'IP Anfordungen (%1$s)',
	'Class:IPAddress/Tab:requests+' => 'IP Anfordungen, die mit IP Adresse verknüpft sind',
	'Class:IPAddress/Tab:changes' => 'IP Änderungen(%1$s)',
	'Class:IPAddress/Tab:changes+' => 'IP Änderungen, die mit IP Adresse verknüpft sind',
));

//
// Class: lnkIPAdressToIPAddress
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:lnkIPAdressToIPAddress' => 'Verknüpfung IP / NAT IPs',
	'Class:lnkIPAdressToIPAddress+' => '',
	'Class:lnkIPAdressToIPAddress/Attribute:ip1_id' => 'IP Adresse',
	'Class:lnkIPAdressToIPAddress/Attribute:ip1_id+' => '',
	'Class:lnkIPAdressToIPAddress/Attribute:ip2_id' => 'NAT IP',
	'Class:lnkIPAdressToIPAddress/Attribute:ip2_id+' => '',
	'Class:lnkIPAdressToIPAddress/Attribute:ip1_short_name' => 'Hostname',
	'Class:lnkIPAdressToIPAddress/Attribute:ip1_short_name+' => 'Hostnameteil der FQDN, zb. "host" bei host.example.com',
	'Class:lnkIPAdressToIPAddress/Attribute:ip1_domain_name' => 'Domain Name',
	'Class:lnkIPAdressToIPAddress/Attribute:ip1_domain_name+' => 'Name der DNS Domain',
	'Class:lnkIPAdressToIPAddress/Attribute:ip2_short_name' => 'Hostname',
	'Class:lnkIPAdressToIPAddress/Attribute:ip2_short_name+' => 'Hostnameteil der FQDN, zb. "host" bei host.example.com',
	'Class:lnkIPAdressToIPAddress/Attribute:ip2_domain_name' => 'Domain Name',
	'Class:lnkIPAdressToIPAddress/Attribute:ip2_domain_name+' => 'Name der DNS Domain',
));

//
// Class: lnkIPInterfaceToIPAddress
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:lnkIPInterfaceToIPAddress' => 'Link IP interface/ IP Address',
	'Class:lnkIPInterfaceToIPAddress+' => '',
	'Class:lnkIPInterfaceToIPAddress/Attribute:ipaddress_id_finalclass_recall' => 'IP Type',
	'Class:lnkIPInterfaceToIPAddress/Attribute:ipaddress_id_finalclass_recall+' => '',
	'Class:lnkIPInterfaceToIPAddress/Attribute:ipinterface_id' => 'IP Interface',
	'Class:lnkIPInterfaceToIPAddress/Attribute:ipinterface_id+' => '',
	'Class:lnkIPInterfaceToIPAddress/Attribute:ipinterface_name' => 'IP Interface Name',
	'Class:lnkIPInterfaceToIPAddress/Attribute:ipinterface_name+' => '',
	'Class:lnkIPInterfaceToIPAddress/Attribute:ipaddress_id' => 'IP Address',
	'Class:lnkIPInterfaceToIPAddress/Attribute:ipaddress_id+' => '',
));

//
// Class: IPv4Address
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:IPv4Address' => 'IPv4 Adresse',
	'Class:IPv4Address+' => '',
	'Class:IPv4Address/Attribute:subnet_id' => 'Subnetz',
	'Class:IPv4Address/Attribute:subnet_id+' => 'IPv4 Subnetz',
	'Class:IPv4Address/Attribute:range_id' => 'Adressbereich',
	'Class:IPv4Address/Attribute:range_id+' => 'IPv4 Adressbereich',
	'Class:IPv4Address/Attribute:ip' => 'Adresse',
	'Class:IPv4Address/Attribute:ip+' => 'IPv4 Adresse',
));

//
// Class: IPConfig
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:IPConfig' => 'Globale IP Einstellungen',
	'Class:IPConfig+' => '',
	'Class:IPConfig:baseinfo' => 'Allgemeine Informationen',
	'Class:IPConfig:blockinfo' => 'Voreinstellungen der Subnetz Blocks',
	'Class:IPConfig:subnetinfo' => 'Voreinstellungen der Subnetze',
	'Class:IPConfig:iprangeinfo' => 'Voreinstellungen der IP Bereiche',
	'Class:IPConfig:ipinfo' => 'Voreinstellungen der IPs',
	'Class:IPConfig/Attribute:org_id' => 'Organisation',
	'Class:IPConfig/Attribute:org_id+' => '',
	'Class:IPConfig/Attribute:org_name' => 'Organisationsname',
	'Class:IPConfig/Attribute:org_name+' => '',
	'Class:IPConfig/Attribute:name' => 'Name',
	'Class:IPConfig/Attribute:name+' => '',
	'Class:IPConfig/Attribute:requestor_id' => 'Anforderung durch',
	'Class:IPConfig/Attribute:requestor_id+' => '',
	'Class:IPConfig/Attribute:requestor_name' => 'Name des Anfordernden',
	'Class:IPConfig/Attribute:requestor_name+' => '',
	'Class:IPConfig/Attribute:ipv4_block_min_size' => 'Minimale Größe von IPv4 Subnetz Blöcken',
	'Class:IPConfig/Attribute:ipv4_block_min_size+' => '',
	'Class:IPConfig/Attribute:ipv4_block_cidr_aligned' => 'Ausrichten der IPv4 Subnetz Blöcke an der CIDR',
	'Class:IPConfig/Attribute:ipv4_block_cidr_aligned+' => '',
	'Class:IPConfig/Attribute:ipv4_block_cidr_aligned/Value:bca_no' => 'No',
	'Class:IPConfig/Attribute:ipv4_block_cidr_aligned/Value:bca_no+' => '',
	'Class:IPConfig/Attribute:ipv4_block_cidr_aligned/Value:bca_yes' => 'Ja',
	'Class:IPConfig/Attribute:ipv4_block_cidr_aligned/Value:bca_yes+' => '',
	'Class:IPConfig/Attribute:reserve_subnet_IPs' => 'Reservieren von Subnet, Gateway und Broadcast IPs bei Subnetz Erzeugung',
	'Class:IPConfig/Attribute:reserve_subnet_IPs+' => '',
	'Class:IPConfig/Attribute:reserve_subnet_IPs/Value:reserve_no' => 'Nein',
	'Class:IPConfig/Attribute:reserve_subnet_IPs/Value:reserve_no+' => '',
	'Class:IPConfig/Attribute:reserve_subnet_IPs/Value:reserve_yes' => 'Ja',
	'Class:IPConfig/Attribute:reserve_subnet_IPs/Value:reserve_yes+' => '',
	'Class:IPConfig/Attribute:ipv4_gateway_ip_format' => 'IPv4 Gateway IP',
	'Class:IPConfig/Attribute:ipv4_gateway_ip_format+' => '',
	'Class:IPConfig/Attribute:ipv4_gateway_ip_format/Value:subnetip_plus_1' => 'Subnetz IP + 1',
	'Class:IPConfig/Attribute:ipv4_gateway_ip_format/Value:subnetip_plus_1+' => '',
	'Class:IPConfig/Attribute:ipv4_gateway_ip_format/Value:broadcastip_minus_1' => 'Broadcast IP - 1',
	'Class:IPConfig/Attribute:ipv4_gateway_ip_format/Value:broadcastip_minus_1+' => '',
	'Class:IPConfig/Attribute:ipv4_gateway_ip_format/Value:free_setup' => 'Freie Allokierung',
	'Class:IPConfig/Attribute:ipv4_gateway_ip_format/Value:free_setup+' => '',
	'Class:IPConfig/Attribute:subnet_low_watermark' => 'Subnetz unterer Schwellenwert (%)',
	'Class:IPConfig/Attribute:subnet_low_watermark+' => '',
	'Class:IPConfig/Attribute:subnet_high_watermark' => 'Subnetz oberer Schwellenwert (%)',
	'Class:IPConfig/Attribute:subnet_high_watermark+' => '',
	'Class:IPConfig/Attribute:iprange_low_watermark' => 'IP Range unterer Schwellenwert (%)',
	'Class:IPConfig/Attribute:iprange_low_watermark+' => '',
	'Class:IPConfig/Attribute:iprange_high_watermark' => 'IP Range oberer Schwellenwert (%)',
	'Class:IPConfig/Attribute:iprange_high_watermark+' => '',
	'Class:IPConfig/Attribute:ip_allow_duplicate_name' => 'Duplizierte Namen erlauben',
	'Class:IPConfig/Attribute:ip_allow_duplicate_name+' => '',
	'Class:IPConfig/Attribute:ip_allow_duplicate_name/Value:ipdup_no' => 'Nein',
	'Class:IPConfig/Attribute:ip_allow_duplicate_name/Value:ipdup_no+' => '',
	'Class:IPConfig/Attribute:ip_allow_duplicate_name/Value:ipdup_yes' => 'Ja',
	'Class:IPConfig/Attribute:ip_allow_duplicate_name/Value:ipdup_yes+' => '',
	'Class:IPConfig/Attribute:mac_address_format' => 'MAC Adressen Format',
	'Class:IPConfig/Attribute:mac_address_format+' => '',
	'Class:IPConfig/Attribute:mac_address_format/Value:colons' => '01:23:45:67:89:ab',
	'Class:IPConfig/Attribute:mac_address_format/Value:colons+' => '',
	'Class:IPConfig/Attribute:mac_address_format/Value:hyphens' => '01-23-45-67-89-ab',
	'Class:IPConfig/Attribute:mac_address_format/Value:hyphens+' => '',
	'Class:IPConfig/Attribute:mac_address_format/Value:dots' => '0123.4567.89ab',
	'Class:IPConfig/Attribute:mac_address_format/Value:dots+' => '',
	'Class:IPConfig/Attribute:mac_address_format/Value:any' => 'beliebig',
	'Class:IPConfig/Attribute:mac_address_format/Value:any+' => '',                                 
	'Class:IPConfig/Attribute:ping_before_assign' => 'Ping auf IP vor der Zuweisung ?',
	'Class:IPConfig/Attribute:ping_before_assign+' => '',
	'Class:IPConfig/Attribute:ping_before_assign/Value:ping_no' => 'Ja',
	'Class:IPConfig/Attribute:ping_before_assign/Value:ping_no+' => '',
	'Class:IPConfig/Attribute:ping_before_assign/Value:ping_yes' => 'Nein',
	'Class:IPConfig/Attribute:ping_before_assign/Value:ping_yes+' => '',
));

//
// Class: IPRangeUsage
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:IPRangeUsage' => 'IP-Adress Bereich Nutzung',
	'Class:IPRangeUsage+' => 'Wofür ein IP-Adress Bereich genutzt wird',
	'Class:IPRangeUsage/Attribute:org_id' => 'Organisation',
	'Class:IPRangeUsage/Attribute:org_id+' => '',
	'Class:IPRangeUsage/Attribute:org_name' => 'Organisations Name',
	'Class:IPRangeUsage/Attribute:org_name+' => '',
	'Class:IPRangeUsage/Attribute:name' => 'Name',
	'Class:IPRangeUsage/Attribute:name+' => '',
	'Class:IPRangeUsage/Attribute:description' => 'Beschreibung',
	'Class:IPRangeUsage/Attribute:description+' => '',
));

//
// Class: IPUsage
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:IPUsage' => 'IP Adresse Nutzung',
	'Class:IPUsage+' => 'Wofür eine IP Adresse genutzt wird',
	'Class:IPUsage/Attribute:org_id' => 'Organisation',
	'Class:IPUsage/Attribute:org_id+' => '',
	'Class:IPUsage/Attribute:org_name' => 'Organisations Name',
	'Class:IPUsage/Attribute:org_name+' => '',
	'Class:IPUsage/Attribute:name' => 'Name',
	'Class:IPUsage/Attribute:name+' => '',
	'Class:IPUsage/Attribute:description' => 'Beschreibung',
	'Class:IPUsage/Attribute:description+' => '',
));

//
// Class: IPTriggerOnWaterMark
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:IPTriggerOnWaterMark' => 'Trigger (wenn ein IP bezogen Schwellenwert erreicht wird)',
	'Class:IPTriggerOnWaterMark+' => '',
	'Class:IPTriggerOnWaterMark/Attribute:org_id' => 'Organsation',
	'Class:IPTriggerOnWaterMark/Attribute:org_id+' => '',
	'Class:IPTriggerOnWaterMark/Attribute:org_name' => 'Organisation name',
	'Class:IPTriggerOnWaterMark/Attribute:org_name+' => '',
	'Class:IPTriggerOnWaterMark/Attribute:target_class' => 'Zielklasse',
	'Class:IPTriggerOnWaterMark/Attribute:target_class+' => '',
	'Class:IPTriggerOnWaterMark/Attribute:event' => 'Event',
	'Class:IPTriggerOnWaterMark/Attribute:event+' => 'Event, der generiert wird, wenn der Trigger aktiviert wird',
	'Class:IPTriggerOnWaterMark/Attribute:event/Value:cross_low' => 'Unterer Schwellenwert wird erreicht',
	'Class:IPTriggerOnWaterMark/Attribute:event/Value:cross_low+' => '',
	'Class:IPTriggerOnWaterMark/Attribute:event/Value:cross_high' => 'Oberer Schwellenwert wird erreicht',
	'Class:IPTriggerOnWaterMark/Attribute:event/Value:cross_high+' => '',
));

//
// Class: IPObjTemplate
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:IPObjTemplate' => 'IP Template',
	'Class:IPObjTemplate+' => '',
	'Class:IPObjTemplate/Attribute:servicesubcategory_id' => 'Service Unterkategorie',
	'Class:IPObjTemplate/Attribute:servicesubcategory_id+' => '',
	'Class:IPObjTemplate/Attribute:request_type' => 'Anfrage Type',
	'Class:IPObjTemplate/Attribute:request_type+' => '',
	'Class:IPObjTemplate/Attribute:request_type/Value:ip_create' => 'Neue IP',
	'Class:IPObjTemplate/Attribute:request_type/Value:ip_change' => 'IP Änderung',
	'Class:IPObjTemplate/Attribute:request_type/Value:ip_delete' => 'IP Löschung',
	'Class:IPObjTemplate/Attribute:request_type/Value:subnet_create' => 'Neues Subnetz',
	'Class:IPObjTemplate/Attribute:request_type/Value:subnet_change' => 'Subnetz Änderung',
	'Class:IPObjTemplate/Attribute:request_type/Value:subnet_delete' => 'Subnetz Löschung',
));

//
// Application Menu
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Menu:IPManagement' => 'IP Management',
	'Menu:IPManagement+' => 'IP Management',
	'Menu:IPManagement:Overview:Total' => 'Überblick, insgesamt: %1s',
	'Menu:IPSpace' => 'IP Raum',
	'Menu:IPSpace+' => 'IP Raum',
	'Menu:IPSpace:IPv4Objects' => 'IPv4 Objekte',
	'Menu:IPSpace:IPv4Objects+' => 'IPv4 Objekte',
	'Menu:IPSpace:Options' => 'Parameter',
	'Menu:IPSpace:Options+' => 'Parameter',  
	'Menu:NewIPObject' => 'Neues IP Objekt',
	'Menu:NewIPObject+' => 'Erzeugen eines neuen IP Objekts',
	'Menu:SearchIPObject' => 'Suche nach einem IP Objekt',
	'Menu:SearchIPObject+' => 'Suche nach einem IP Objekt',
	'Menu:Ipv4ShortCut' => 'IPv4 Shortcuts',
	'Menu:Ipv4ShortCut+' => 'IPv4 Shortcuts',  
	'Menu:IPv4Block' => 'Subnetz Blöcke',
	'Menu:IPv4Block+' => 'IPv4 Subnetz Blöcke',
	'Menu:IPv4Subnet' => 'Subnetze',
	'Menu:IPv4Subnet+' => 'IPv4 Subnetze',
	'Menu:IPv4Subnet:Allocated' => 'Allokierte Subnetze',
	'Menu:IPv4Subnet:Allocated+' => 'Liste aller allokierten IPv4 Subnetze',
	'Menu:IPv4Range' => 'IP Bereiche',
	'Menu:IPv4Range+' => 'IPv4 Bereiche',
	'Menu:IPv4Address' => 'IP Adressen',
	'Menu:IPv4Address+' => 'IPv4 Adressen',
	'Menu:Options' => 'Parameter',
	'Menu:Options+' => 'Parameter',  
	'Menu:IPConfig' => 'Globale IP Einstellungen',
	'Menu:IPConfig+' => 'Globale Parameter für IP Mmgmt bezogene Objekte',
	'Menu:IPRangeUsage' => 'IP Bereichs Typen',
	'Menu:IPRangeUsage+' => 'IP Bereichs Verwendungszwecke',
	'Menu:IPUsage' => 'IP Typen',
	'Menu:IPUsage+' => 'IP Typ Verwendungszwecke',
	'Menu:Domain' => 'Domains',
	'Menu:Domain+' => 'Domain Namen',
	'Menu:IPTemplate' => 'IP Templates',
	'Menu:IPTemplate+' => 'IP Templates',
	
	'UI:IPMgmtWelcomeOverview:Title' => 'My Dashboard',
	
	// Menu separator in Action menus
	'UI:IPManagement:Action:MenuSeparator' => '<hr class="menu-separator"/>',	
	'UI:IPManagement:Action:Error::WrongActionForClass' => 'Diese Aktion kann auf ein Objekt dieser Klasse nicht angewendet werden!',
//
// Management of IP global settings
//
	'UI:IPManagement:Action:New:IPConfig:AlreadyExists' => 'Es darf innerhalb einer Organisation nur ein Objekt für die Globalen Einstellungen geben.',	
	'UI:IPManagement:Action:Modify:IPConfig:IPv4BlockMinSizeTooSmall' => 'Die Minimalgröße von IPv4 Subnetz Blöcken darf nicht kleiner sein als %1$s!',
	'UI:IPManagement:Action:Modify:IPConfig:IPv6BlockMinSizeTooSmall' => 'Die Minimalgröße von IPv6 Subnetz Blöcken darf nicht kleiner sein als %1$s!',
	'UI:IPManagement:Action:Modify:IPConfig:WaterMarksPercent' => 'Schwellwerte sind Prozentwerte, bitte nur Zahlen zwischen 0 und 100 verwenden!',
	'UI:IPManagement:Action:Modify:IPConfig:WaterMarksOrder' => 'Untere Schwellwerte müssen kleiner sein als obere Schwellwerte!',	
	'UI:IPManagement:Action:Modify:GlobalConfig' => 'Diese Globalen Einstellungen können durch diese Aktion überschrieben werden.',	

//
// Management of IPBlocks
//
	// Creation Management	
	'UI:IPManagement:Action:New:IPBlock:Reverted' => 'Die erste IP des Subnetz Blocks ist höher als die letzte IP!',
	'UI:IPManagement:Action:New:IPBlock:SmallerThanMinSize' => 'Die Blockgröße darf nicht kleiner sein als %1$s!',	
	'UI:IPManagement:Action:New:IPBlock:NotCIDRAligned' => 'Der Block ist nicht an der CIDR ausgerichtet!',	
	'UI:IPManagement:Action:New:IPBlock:NotInParent' => 'Der Subnetz Block ist nicht strikt im ausgewählten Parent Block enthalten.',	
	'UI:IPManagement:Action:New:IPBlock:NameExist' => 'Der Name des Subnetz Blocks existiert bereits!',	
	'UI:IPManagement:Action:New:IPBlock:Collision0' => 'Subnetz Block existiert bereits!',	
	'UI:IPManagement:Action:New:IPBlock:Collision1' => 'Subnetz Block Kollision: die erste IP gehört zu einem existierenden Block!',	
	'UI:IPManagement:Action:New:IPBlock:Collision2' => 'Subnet Block collision : die letzte IP gehört zu einem existierenden Block!',	
	'UI:IPManagement:Action:Modify:IPBlock:ParentIdNull' => 'Children Subnetze von Block %1$s können nur an existierende Parent Blöcke gehängt werden.',	
	
	// Shrink action on subnet blocks
	'UI:IPManagement:Action:Shrink:IPBlock:Reverted' =>  'Die erste neue IP eines Subnetz Blocks ist höher als die letzte neue IP!',
	'UI:IPManagement:Action:Shrink:IPBlock:IPOutOfBlock' => 'Die neuen IPs sind nicht alle ausserhalb eines Blocks!',
	'UI:IPManagement:Action:Shrink:IPBlock:NoChange' => 'Keine Änderung angefordert.',
	'UI:IPManagement:Action:Shrink:IPBlock:NotCIDRAligned' => 'Keine Änderung angefordert.',
	'UI:IPManagement:Action:Shrink:IPBlock:BlockAccrossBorder' => 'Ein Child Subnetz sitzt zwischen den neuen Grenzen!',
	'UI:IPManagement:Action:Shrink:IPBlock:SubnetAccrossBorder' => 'Ein Subnetz, das an den Block angehängt ist, sitzt zwischen den neuen Grenzen!',
	'UI:IPManagement:Action:Shrink:IPBlock:SubnetBecomesOrhpean' => 'Nach dem Verkleinern hätte das Child Subnetz keinen Parent Block mehr!',	
	'UI:IPManagement:Action:Shrink:IPBlock:Done' => '%1$s <span class="hilite">%2$s</span> wurde verkleinert.',
	
	// Split action on subnet blocks
	'UI:IPManagement:Action:Split:IPBlock:IPOutOfBlock' => 'Geplittete IPs sind ausserhalb des Blocks!',
	'UI:IPManagement:Action:Split:IPBlock:SmallerThanMinSize' => 'Die Blockgröße darf nicht kleiner sein als %1$s!',
	'UI:IPManagement:Action:Split:IPBlock:NotCIDRAligned' => 'Die Blöcke sind nicht an der CIDR ausgerichtet!',	
	'UI:IPManagement:Action:Split:IPBlock:BlockAccrossBorder' => 'Ein Child Subnetz sitzt zwischen den neuen Grenzen!',
	'UI:IPManagement:Action:Split:IPBlock:SubnetAccrossBorder' => 'Ein Subnetz, das an den Block angehängt ist, sitzt zwischen den neuen Grenzen!',
	'UI:IPManagement:Action:Split:IPBlock:EmptyNewName' => 'Name des neuen Subnetz Blocks ist leer!',
	'UI:IPManagement:Action:Split:IPBlock:NameExist' => 'Name des neuen Subnet Block existiert bereits!',
	'UI:IPManagement:Action:Split:IPBlock:Done' => '%1$s <span class="hilite">%2$s</span> wurde geteilt.',
	
	// Expand action on subnet blocks
	'UI:IPManagement:Action:Expand:IPBlock:Reverted' =>  'Die erste neue IP eines Subnetz Blocks ist höher als die letzte neue IP!',
	'UI:IPManagement:Action:Expand:IPBlock:IPOutOfBlock' => 'Die neuen IPs sind nicht alle ausserhalb eines Blocks!',
	'UI:IPManagement:Action:Expand:IPBlock:NoChange' => 'Keine Änderung angefordert.',
	'UI:IPManagement:Action:Expand:IPBlock:NotCIDRAligned' => 'Keine Änderung angefordert.',
	'UI:IPManagement:Action:Expand:IPBlock:BlockBigerThanParent' => 'Der Block darf nicht größer sein als sein Parent!',
	'UI:IPManagement:Action:Expand:IPBlock:BlockAccrossBorder' => 'Ein Geschwister-Subnetz sitzt zwischen den neuen Grenzen!',
	'UI:IPManagement:Action:Expand:IPBlock:SubnetAccrossBorder' => 'Ein Subnetz, das an den Parent Block angehängt ist, sitzt zwischen den neuen Grenzen!',
	'UI:IPManagement:Action:Expand:IPBlock:Done' => '%1$s <span class="hilite">%2$s</span> wurde vergrößert.',

	// Delegate action on subnet blocks
	'UI:IPManagement:Action:Delegate:IPBlock:NoChildOrg' => 'Die Organisation des Blocks hat keine Children!',
	'UI:IPManagement:Action:Delegate:IPBlock:WrongLevelOfOrganization' => 'Der Delegation Change muss für eine Schwester Organisation gemacht werden!',
	'UI:IPManagement:Action:Delegate:IPBlock:NoChangeOfOrganization' => 'Keine Änderung notwendig!',
	'UI:IPManagement:Action:Delegate:IPBlock:HasChildBlocks' => 'Der Block hat Children Blöcke!',
	'UI:IPManagement:Action:Delegate:IPBlock:HasChildSubnets' => 'Der Block hat Children Subnetze!',
	'UI:IPManagement:Action:Delegate:IPBlock:ConflictWithBlocksOfTargetOrg' => 'Block in Konflikt mit einem Block der Zielorganisation!',
	'UI:IPManagement:Action:Delegate:IPBlock:ConflictWithBlocksOfParentOrg' => 'Block in Konflikt mit einem Block der Parent-Organisation!',
	'UI:IPManagement:Action:Delegate:IPBlock:HasChildBlocksInParent' => 'Der Block hat Children in der Parent-Organisation!',
	'UI:IPManagement:Action:Delegate:IPBlock:HasChildSubnetsInParent' => 'Der Block hat Children-Subnetze in der Parent-Organisation!',
	
//
// Management of IPv4Blocks
//
	// Display details of subnet blocks
	'UI:IPManagement:Action:Details:IPv4Block' => 'Details',
	'UI:IPManagement:Action:Details:IPv4Block+' => '',
	
	// Display list of subnet blocks
	'UI:IPManagement:Action:DisplayList:IPv4Block' => 'Liste anzeigen',
	'UI:IPManagement:Action:DisplayList:IPv4Block+' => '',
	'UI:IPManagement:Action:DisplayList:IPv4Block:PageTitle_Class' => 'IPv4 Subnetz Blöcke',
	'UI:IPManagement:Action:DisplayList:IPv4Block:Title_Class' => 'IPv4 Subnetz Blöcke',
	
	// Display tree of subnet blocks
	'UI:IPManagement:Action:DisplayTree:IPv4Block' => 'Baumstruktur anzeigen',
	'UI:IPManagement:Action:DisplayTree:IPv4Block+' => '',
	'UI:IPManagement:Action:DisplayTree:IPv4Block:PageTitle_Class' => 'IPv4 Subnetz Blöcke',
	'UI:IPManagement:Action:DisplayTree:IPv4Block:Title_Class' => 'IPv4 Subnetz Blöcke',
	'UI:IPManagement:Action:DisplayTree:IPv4Block:OrgName' => 'Organisation %1$s',
	
	// Shrink action on subnet blocks
	'UI:IPManagement:Action:Shrink:IPv4Block' => 'Verkleinern',
	'UI:IPManagement:Action:Shrink:IPv4Block+' => '',
	'UI:IPManagement:Action:Shrink:IPv4Block:Summary' => 'Zusammenfassung',
	'UI:IPManagement:Action:Shrink:IPv4Block:Summary+' => '',
	'UI:IPManagement:Action:Shrink:IPv4Block:PageTitle_Object_Class' => 'TeemIp - %1$s - %2$s verkleinern',
	'UI:IPManagement:Action:Shrink:IPv4Block:Title_Class_Object' => 'Shrink %1$s: <span class="hilite">%2$s</span>',
	'UI:IPManagement:Action:Shrink:IPv4Block:NewFirstIP' => 'Neue erste IP des Blocks:',
	'UI:IPManagement:Action:Shrink:IPv4Block:NewLastIP' => 'Neue Letzte IP des Blocks:',            
	'UI:IPManagement:Action:Shrink:IPv4Block:IsDelegated' => 'Dieser Block wurde delegiert und kann daher nicht verkleinert werden!',
    'UI:IPManagement:Action:Shrink:IPv4Block:CannotBeShrunk' =>  'Block kann nicht verkleinert werden: %1$s',
	'UI:IPManagement:Action:Shrink:IPv4Block:SmallerThanMinSize' => 'Die Blockgröße kann nicht kleiner sein als %1$s!',
	'UI:IPManagement:Action:Shrink:IPv4Block:Done' => '%1$s <span class="hilite">%2$s</span> has been shrunk.',
	
	// Split action on subnet blocks
	'UI:IPManagement:Action:Split:IPv4Block' => 'Teilen',
	'UI:IPManagement:Action:Split:IPv4Block+' => '',
	'UI:IPManagement:Action:Split:IPv4Block:Summary' => 'Zusammenfassung',
	'UI:IPManagement:Action:Split:IPv4Block:Summary+' => '',
	'UI:IPManagement:Action:Split:IPv4Block:PageTitle_Object_Class' => 'TeemIp - %1$s - %2$s Teilen',
	'UI:IPManagement:Action:Split:IPv4Block:Title_Class_Object' => 'Teilen %1$s: <span class="hilite">%2$s</span>',
	'UI:IPManagement:Action:Split:IPv4Block:At' => 'Erste IP des neuen Subnetz Blocks:',
	'UI:IPManagement:Action:Split:IPv4Block:NameNewBlock' => 'Name des neuen Subnetz Blocks:',
	'UI:IPManagement:Action:Split:IPv4Block:IsDelegated' => 'Dieser Block wurde delegiert und kann daher nicht aufgeteilt werden!',
	'UI:IPManagement:Action:Split:IPv4Block:CannotBeSplit' =>  'Block cannot be split: %1$s',
	'UI:IPManagement:Action:Split:IPv4Block:SmallerThanMinSize' => 'Block Größe kann nicht kleiner als  %1$s sein!',
	'UI:IPManagement:Action:Split:IPv4Block:Done' => '%1$s <span class="hilite">%2$s</span> wurde geteilt.',
	
	// Expand action on subnet blocks
	'UI:IPManagement:Action:Expand:IPv4Block' => 'Vergrößern',
	'UI:IPManagement:Action:Expand:IPv4Block+' => '',
	'UI:IPManagement:Action:Expand:IPv4Block:Summary' => 'Zusammenfassung',
	'UI:IPManagement:Action:Expand:IPv4Block:Summary+' => '',
	'UI:IPManagement:Action:Expand:IPv4Block:PageTitle_Object_Class' => 'TeemIp - %1$s - %2$s expand',
	'UI:IPManagement:Action:Expand:IPv4Block:Title_Class_Object' => 'Expand %1$s: <span class="hilite">%2$s</span>',
	'UI:IPManagement:Action:Expand:IPv4Block:NewFirstIP' => 'New First IP of Block :',
	'UI:IPManagement:Action:Expand:IPv4Block:NewLastIP' => 'New Last IP of Block :',
	'UI:IPManagement:Action:Expand:IPv4Block:IsDelegated' => 'Dieser Block wurde delegiert und kann daher nicht vergrößert werden!',
	'UI:IPManagement:Action:Expand:IPv4Block:CannotBeExpanded' =>  'Block kann nicht vergrößert werden: %1$s',
	'UI:IPManagement:Action:Expand:IPv4Block:SmallerThanMinSize' => 'Block Größe kann nicht kleiner als %1$s sein!',
	'UI:IPManagement:Action:Expand:IPv4Block:Done' => '%1$s <span class="hilite">%2$s</span> wurde vergrößert.',

	// List space action on subnet blocks 
	'UI:IPManagement:Action:ListSpace:IPv4Block' => 'IP Raum auflisten',                                               
	'UI:IPManagement:Action:ListSpace:IPv4Block:PageTitle_Object_Class' => 'TeemIp - %1$s - IP Raum',
	'UI:IPManagement:Action:ListSpace:IPv4Block:Title_Class_Object' => 'IP Raum in %1$s: <span class="hilite">%2$s</span>',
	'UI:IPManagement:Action:ListSpace:IPv4Block:FreeSpace' => 'Frei [%1$s - %2$s] - %3$s IPs - %4$.2f %%',
	
	// Find Space action on subnet blocks
	'UI:IPManagement:Action:FindSpace:IPv4Block' => 'IP Raum finden',
	'UI:IPManagement:Action:FindSpace:IPv4Block:PageTitle_Object_Class' => 'TeemIp - %1$s - IP Raum finden',
	'UI:IPManagement:Action:FindSpace:IPv4Block:Title_Class_Object' => 'IP Raum suchen in %1$s: <span class="hilite">%2$s</span>',
	'UI:IPManagement:Action:FindSpace:IPv4Block:SizeOfSpace' => 'Größe des benötigten IP Raums:',
	'UI:IPManagement:Action:FindSpace:IPv4Block:MaxNumberOfOffers' => 'Maximal mögliche Anzahl :',
	
	// Do find Space action on subnet blocks
	'UI:IPManagement:Action:DoFindSpace:IPv4Block:PageTitle_Object_Class' => 'TeemIp - %1$s - IP Raum finden',
	'UI:IPManagement:Action:DoFindSpace:IPv4Block:Title_Class_Object' => 'IP Raum in den %1$s: <span class="hilite">%2$s</span>',
	'UI:IPManagement:Action:DoFindSpace:IPv4Block:Summary' => '%1$s ersten /%2$s im Block',
	'UI:IPManagement:Action:DoFindSpace:IPv4Block:CreateAsBlock' => 'Als Child Block erzeugen',
	'UI:IPManagement:Action:DoFindSpace:IPv4Block:CreateAsSubnet' => 'Als Subnetz erzeugen',

	// Delegate action on subnet blocks
	'UI:IPManagement:Action:Delegate:IPv4Block' => 'Delegieren',
	'UI:IPManagement:Action:Delegate:IPv4Block:PageTitle_Object_Class' => 'TeemIp - %1$s - Delegieren',
	'UI:IPManagement:Action:Delegate:IPv4Block:Title_Class_Object' => '%1$s <span class="hilite">%2$s</span> an Child Organisation delegieren',
	'UI:IPManagement:Action:Delegate:IPv4Block:ChildBlock' => 'Child Organisation, an die der Block delegiert werden soll:',
	'UI:IPManagement:Action:Delegate:IPv4Block:NoChildOrg' => 'Block\'s organization doesn\'t have any children and therefore, block cannot be delegated!',
	'UI:IPManagement:Action:Delegate:IPv4Block:CannotBeDelegated' => 'Block cannot be delegated: %1$s',
	'UI:IPManagement:Action:Delegate:IPv4Block:Done' => '%1$s <span class="hilite">%2$s</span> has been delegated.',

//
// Management of Subnets
//
	// Creation Management	
	'UI:IPManagement:Action:New:IPSubnet:IpCannotChange' => 'Subnetz IP kann nicht modifiziert werden! ',	
	'UI:IPManagement:Action:New:IPSubnet:MaskCannotChange' => 'Subnetz Maske kann nicht modifiziert werden! ',		
	'UI:IPManagement:Action:New:IPSubnet:IpIncorrect' => 'Subnetz IP ist nicht mit der Maske konsistent!',	
	'UI:IPManagement:Action:New:IPSubnet:NotInBlock' => 'Subnetz ist nicht Teil des selektierten Blocks!',	
	'UI:IPManagement:Action:New:IPSubnet:Collision0' => 'Subnetz existiert bereits!',	
	'UI:IPManagement:Action:New:IPSubnet:Collision1' => 'Subnetz Kollision: Subnetz IP gehört zu einem existierenden Subnetz!',	
	'UI:IPManagement:Action:New:IPSubnet:Collision2' => 'Subnetz Kollision: Broadcast IP gehört zu einem existierenden Subnetz!',	
	'UI:IPManagement:Action:New:IPSubnet:Collision3' => 'Subnetz Kollision: neues Subnetz schliesst ein existierendes ein!',	
	'UI:IPManagement:Action:New:IPSubnet:GatewayOutOfSubnet' => 'Gateway IP ist nicht in den Subnetz Grenzen.!',

//
// Management of IPv4 Subnets
//
	// Display details of subnet
	'UI:IPManagement:Action:Details:IPv4Subnet' => 'Details',
	'UI:IPManagement:Action:Details:IPv4Subnet+' => '',

	// Display list of subnets
	'UI:IPManagement:Action:DisplayList:IPv4Subnet' => 'Liste anzeigen',
	'UI:IPManagement:Action:DisplayList:IPv4Subnet+' => '',
	'UI:IPManagement:Action:DisplayList:IPv4Subnet:PageTitle_Class' => 'IPv4 Subnetze',
	'UI:IPManagement:Action:DisplayList:IPv4Subnet:Title_Class' => 'IPv4 Subnetze',
	
	// Display tree of subnets
	'UI:IPManagement:Action:DisplayTree:IPv4Subnet' => 'Baumstruktur anzeigen',
	'UI:IPManagement:Action:DisplayTree:IPv4Subnet+' => '',
	'UI:IPManagement:Action:DisplayTree:IPv4Subnet:PageTitle_Class' => 'IPv4 Subnetze',
	'UI:IPManagement:Action:DisplayTree:IPv4Subnet:Title_Class' => 'IPv4 Subnetze',
	'UI:IPManagement:Action:DisplayTree:IPv4Subnet:OrgName' => 'Organisation %1$s',
	
	// Find space action on subnets 
	'UI:IPManagement:Action:FindSpace:IPv4Subnet' => 'IP Raum finden',
	'UI:IPManagement:Action:FindSpace:IPv4Subnet:PageTitle_Object_Class' => 'TeemIp - %1$s - IP Raum finden',
	'UI:IPManagement:Action:FindSpace:IPv4Subnet:Title_Class_Object' => 'Nach IP Raum suchen in : <span class="hilite">%2$s</span>',
	'UI:IPManagement:Action:FindSpace:IPv4Subnet:SizeTooSmall' => 'Subnetz ist zu klein für Raum Suche. Bitte abbrechen.',
	'UI:IPManagement:Action:FindSpace:IPv4Subnet:SizeOfRange' => 'Größe des gesuchten IP Raums :',
	'UI:IPManagement:Action:FindSpace:IPv4Subnet:MaxNumberOfOffers' => 'Maximal mögliche Anzahl :',
	
	// Do find Space action on subnet
	'UI:IPManagement:Action:DoFindSpace:IPv4Subnet:PageTitle_Object_Class' => 'TeemIp - %1$s - IP Raum finden',
	'UI:IPManagement:Action:DoFindSpace:IPv4Subnet:Title_Class_Object' => 'nach IP Raum suchen in %1$s: <span class="hilite">%2$s</span>',
	'UI:IPManagement:Action:DoFindSpace:IPv4Subnet:Summary' => '%1$s die ersten freien %2$s IPs Räume im Subnetz',
	'UI:IPManagement:Action:DoFindSpace:IPv4Subnet:RangeTooBig' => 'Die angeforderte Raumgröße passt nicht in das Subnetz. Bitte erneut mit einem kleineren Wert versuchen.',
	'UI:IPManagement:Action:DoFindSpace:IPv4Subnet:CreateAsRange' => 'Create as an IP range',

	// List IPs action on subnets 
	'UI:IPManagement:Action:ListIps:IPv4Subnet' => 'IPs auflisten und auswählen',                                               
	'UI:IPManagement:Action:ListIps:IPv4Subnet:PageTitle_Object_Class' => 'TeemIp - %1$s - IPs',
	'UI:IPManagement:Action:ListIps:IPv4Subnet:Title_Class_Object' => 'Liste von IPs in %1$s: <span class="hilite">%2$s</span>',
	'UI:IPManagement:Action:ListIps:IPv4Subnet:Subtitle_ListRange' => 'Subnetz ist zu groß, um alle IPs aufzulisten. Bitte ein anzuzeigendes Intervall auswählen:',                                               
	'UI:IPManagement:Action:ListIps:IPv4Subnet:FirstIP' => 'Erste IP in der Liste',                                               
	'UI:IPManagement:Action:ListIps:IPv4Subnet:LastIP' => 'Letzte IP in der Liste',                                              
	
	// Do list IPs action on subnet
	'UI:IPManagement:Action:DoListIps:IPv4Subnet' => 'IPs auflisten und auswählen',                                               
	'UI:IPManagement:Action:DoListIps:IPv4Subnet:PageTitle_Object_Class' => 'TeemIp - %1$s - IPs',
	'UI:IPManagement:Action:DoListIps:IPv4Subnet:Title_Class_Object' => 'Teilliste von IPs in %1$s: <span class="hilite">%2$s</span>',
 	'UI:IPManagement:Action:DoListIps:IPv4Subnet:CannotBeListed' => 'IPs können nicht angezeigt werden in der Liste: %1$s',
	'UI:IPManagement:Action:DoListIps:IPv4Subnet:FirstIPOutOfSubnet' => 'Erste IP ist außerhalb vom Subnetz!',
	'UI:IPManagement:Action:DoListIps:IPv4Subnet:LastIPOutOfSubnet' => 'Letzte IP ist außerhalb vom Subnetz!',
	'UI:IPManagement:Action:DoListIps:IPv4Subnet:FirstIpBiggerThanLastIp' => 'Die erste IP ist höher als die letzte IP!',

	// Shrink action on subnets
	'UI:IPManagement:Action:Shrink:IPv4Subnet' => 'Verkleinern',
	'UI:IPManagement:Action:Shrink:IPv4Subnet+' => '',
	'UI:IPManagement:Action:Shrink:IPv4Subnet:Summary' => 'Zusammenfassung',
	'UI:IPManagement:Action:Shrink:IPv4Subnet:Summary+' => '',
	'UI:IPManagement:Action:Shrink:IPv4Subnet:PageTitle_Object_Class' => 'TeemIp - %1$s - %2$s verkleinern',
	'UI:IPManagement:Action:Shrink:IPv4Subnet:Title_Class_Object' => 'Verkleinern %1$s: <span class="hilite">%2$s</span>',
	'UI:IPManagement:Action:Shrink:IPv4Subnet:CannotBeShrunk' =>  'Subnetz kann nicht verkleinert werden: %1$s',
	'UI:IPManagement:Action:Shrink:IPv4Subnet:SizeTooSmall' => 'Subnetz ist zu klein zum Verkleinern!',
	'UI:IPManagement:Action:Shrink:IPv4Subnet:SizeTooSmallBy' => 'Subnetz ist zu klein zum Verkleinern um %1$s!',
	'UI:IPManagement:Action:Shrink:IPv4Subnet:IPRangeInTheMiddle' => 'Der Bereich: <b>%1$s [%2$s - %3$s]</b> ragt über neue Subnetz Grenzen hinaus. Verkleinern kann nicht durchgeführt werden!',	
	'UI:IPManagement:Action:Shrink:IPv4Subnet:IPRangeDropped' => 'Der Bereich: <b>%1$s [%2$s - %3$s]</b> wird aus dem Subnetz gelöscht. Verkleinern kann nicht durchgeführt werden!',		
	'UI:IPManagement:Action:Shrink:IPv4Subnet:Done' => '%1$s <span class="hilite">%2$s</span> wurde um %3$s verkleinert.',
	'UI:IPManagement:Action:Shrink:IPv4Subnet:By' => 'Verkleinern um :',
	
	// Split action on subnets
	'UI:IPManagement:Action:Split:IPv4Subnet' => 'Teilen',
	'UI:IPManagement:Action:Split:IPv4Subnet+' => '',
	'UI:IPManagement:Action:Split:IPv4Subnet:Summary' => 'Zusammenfassung',
	'UI:IPManagement:Action:Split:IPv4Subnet:Summary+' => '',
	'UI:IPManagement:Action:Split:IPv4Subnet:PageTitle_Object_Class' => 'TeemIp - %1$s - %2$s Teilen',
	'UI:IPManagement:Action:Split:IPv4Subnet:Title_Class_Object' => 'Teilen %1$s: <span class="hilite">%2$s</span>',
	'UI:IPManagement:Action:Split:IPv4Subnet:CannotBeSplit' =>  'Subnetz kann nicht geteilt werden: %1$s',
	'UI:IPManagement:Action:Split:IPv4Subnet:SizeTooSmall' => 'Subnetz ist zu klein zum Teilen!',
	'UI:IPManagement:Action:Split:IPv4Subnet:SizeTooSmallBy' => 'Subnet ist zu klein zum Teilen um %1$s!',
	'UI:IPManagement:Action:Split:IPv4Subnet:IPRangeInTheMiddle' => 'Der Bereich: <b>%1$s [%2$s - %3$s]</b> ragt über neue Subnetz Grenzen hinaus. Teilen kann nicht durchgeführt werden!',	
	'UI:IPManagement:Action:Split:IPv4Subnet:Done' => '%1$s <span class="hilite">%2$s</span> wurde in %3$s geteilt .',
	'UI:IPManagement:Action:Split:IPv4Subnet:In' => 'Teilen in :',
	
	// Expand action on subnets
	'UI:IPManagement:Action:Expand:IPv4Subnet' => 'Vergrößern',
	'UI:IPManagement:Action:Expand:IPv4Subnet+' => '',
	'UI:IPManagement:Action:Expand:IPv4Subnet:Summary' => 'Zusammenfassung',
	'UI:IPManagement:Action:Expand:IPv4Subnet:Summary+' => '',
	'UI:IPManagement:Action:Expand:IPv4Subnet:PageTitle_Object_Class' => 'TeemIp - %1$s - %2$s Vergrößern',
	'UI:IPManagement:Action:Expand:IPv4Subnet:Title_Class_Object' => 'Vergrößern %1$s: <span class="hilite">%2$s</span>',
	'UI:IPManagement:Action:Expand:IPv4Subnet:CannotBeExpanded' =>  'Subnetz kann nicht vergrößert werden: %1$s',
	'UI:IPManagement:Action:Expand:IPv4Subnet:SizeTooBig' => 'Subnetz ist zu groß zum Vergrößern!',
	'UI:IPManagement:Action:Expand:IPv4Subnet:SizeTooBigBy' => 'Subnet ist zu groß, um es um %1$s zu vergrößern!',
	'UI:IPManagement:Action:Expand:IPv4Subnet:NotInIPBlock' => 'Der Block, in dem das Subnetz enthalten ist, ist zu klein, um das neue, vergrößerte Subnetz enthalten zu können!',
	'UI:IPManagement:Action:Expand:IPv4Subnet:Done' => '%1$s <span class="hilite">%2$s</span> wurde vergrößert um %3$s',
	'UI:IPManagement:Action:Expand:IPv4Subnet:By' => 'Vergrößern um:',

	// CSV Export action on subnets
	'UI:IPManagement:Action:CsvExportIps:IPv4Subnet' => 'CSV Export IPs',
	'UI:IPManagement:Action:CsvExportIps:IPv4Subnet:PageTitle_Object_Class' => 'TeemIp - %1$s - %2$s CSV Export von IPs',
	'UI:IPManagement:Action:CsvExportIps:IPv4Subnet:Title_Class_Object' => 'CSV Export IPs von %1$s: <span class="hilite">%2$s</span>',
	'UI:IPManagement:Action:CsvExportIps:IPv4Subnet:Subtitle_ListRange' => 'Subnetz ist zu groß, um alle IPs auf einmal zu exportieren. Bitte einen Unterbereich auswählen:',                                               
	'UI:IPManagement:Action:CsvExportIps:IPv4Subnet:FirstIP' => 'Erste IP der Liste',                                               
	'UI:IPManagement:Action:CsvExportIps:IPv4Subnet:LastIP' => 'Letzte IP der Liste',                                               
	
	// Do CSV export IPs action on subnet
	'UI:IPManagement:Action:DoCsvExportIps:IPv4Subnet' => 'CSV Export IPs',                                               
	'UI:IPManagement:Action:DoCsvExportIps:IPv4Subnet:PageTitle_Object_Class' => 'TeemIp - %1$s - %2$s CSV Export von IPs',
	'UI:IPManagement:Action:DoCsvExportIps:IPv4Subnet:Title_Class_Object' => 'Partieller CSV Export von IPs in %1$s: <span class="hilite">%2$s</span>',
 	'UI:IPManagement:Action:DoCsvExportIps:IPv4Subnet:CannotBeListed' => 'IPs können nicht gelistet werden: %1$s',
	'UI:IPManagement:Action:DoCsvExportIps:IPv4Subnet:FirstIPOutOfSubnet' => 'Die erste IP ist ausserhalb des Subnetzes!',
	'UI:IPManagement:Action:DoCsvExportIps:IPv4Subnet:LastIPOutOfSubnet' => 'Die letzte IP ist ausserhalb des Subnetzes!',
	'UI:IPManagement:Action:DoCsvExportIps:IPv4Subnet:FirstIpBiggerThanLastIp' => 'Die erste IP des Bereichs ist größer als die letzte IP!',

	// Subnet calculator
	'UI:IPManagement:Action:Calculator:IPv4Subnet' => 'Subnetz Rechner',
	'UI:IPManagement:Action:Calculator:IPv4Subnet:PageTitle_Object_Class' => 'TeemIp - %2$s Rechner',
	'UI:IPManagement:Action:Calculator:IPv4Subnet:Title_Class_Object' => 'Rechner für %1$s',
	'UI:IPManagement:Action:Calculator:IPv4Subnet:IP' => 'IP Adresse',
	'UI:IPManagement:Action:Calculator:IPv4Subnet:Mask' => 'Maske',
	'UI:IPManagement:Action:Calculator:IPv4Subnet:CIDR' => 'CIDR',

	// Do Subnet calculator
	'UI:IPManagement:Action:DoCalculator:IPv4Subnet' => 'Subnetz Rechner',
	'UI:IPManagement:Action:DoCalculator:IPv4Subnet:PageTitle_Object_Class' => 'TeemIp - %2$s Rechner',
	'UI:IPManagement:Action:DoCalculator:IPv4Subnet:Title_Class_Object' => '%1$s - Ergebnis des Rechners',
	'UI:IPManagement:Action:DoCalculator:IPv4Subnet:IP' => 'IP Adresse',
	'UI:IPManagement:Action:DoCalculator:IPv4Subnet:Mask' => 'Maske',
	'UI:IPManagement:Action:DoCalculator:IPv4Subnet:CIDR' => 'CIDR',
	'UI:IPManagement:Action:DoCalculator:IPv4Subnet:SubnetIP' => 'Subnetz IP',
	'UI:IPManagement:Action:DoCalculator:IPv4Subnet:Wildcard' => 'Wildcard Maske',
	'UI:IPManagement:Action:DoCalculator:IPv4Subnet:BroadcastIP' => 'Broadcast IP',
	'UI:IPManagement:Action:DoCalculator:IPv4Subnet:IPNumber' => 'Anzahl von IPs',
	'UI:IPManagement:Action:DoCalculator:IPv4Subnet:UsableHosts' => 'Anzahl benutzbarer Hosts',
	'UI:IPManagement:Action:DoCalculator:IPv4Subnet:CannotRun' => 'Subnetz Rechner kann nicht rechnen: %1$s',
	'UI:IPManagement:Action:DoCalculator:IPv4Subnet:EnterMaskOrCIDR' => 'Eine Maske oder einen CIDR eingeben!',
	'UI:IPManagement:Action:DoCalculator:IPv4Subnet:WrongMask' => 'Mask ist ungültig!',
	'UI:IPManagement:Action:DoCalculator:IPv4Subnet:WrongCIDR' => 'CIDR ist ungültig!',

//
// Management of IP ranges
//
	// Creation Management	
	'UI:IPManagement:Action:New:IPRange:NameExist' => 'Der Name des Bereichs existiert bereits innerhalb des Subnetzes!',	
	'UI:IPManagement:Action:New:IPRange:Reverted' => 'Die erste IP des Bereichs ist höher als die letzte IP!',	
	'UI:IPManagement:Action:New:IPRange:NotInSubnet' => 'Der IP bereich gehört nicht zum ausgewählten Subnetz!',	
	'UI:IPManagement:Action:New:IPRange:Collision0' => 'IP Bereich existiert bereits!',	
	'UI:IPManagement:Action:New:IPRange:Collision1' => 'Bereichs Kollision : die erste IP gehört zu einem schon existierenden Bereich!',	
	'UI:IPManagement:Action:New:IPRange:Collision2' => 'Range collision : die letzte IP gehört zu einem schon existierenden Bereich!',	
	'UI:IPManagement:Action:New:IPRange:Collision3' => 'Range collision : der Bereich umfasst einen schon bestehenden!',	

//
// Management of IPv4 ranges
//
	// Display details of IP Range
	'UI:IPManagement:Action:Details:IPv4Range' => 'Details',
	'UI:IPManagement:Action:Details:IPv4Range+' => '',

	// List IPs action on IP Ranges 
	'UI:IPManagement:Action:ListIps:IPv4Range' => 'IPs auflisten und auswählen',                                               
	'UI:IPManagement:Action:ListIps:IPv4Range:PageTitle_Object_Class' => 'TeemIp - %1$s - IPs',
	'UI:IPManagement:Action:ListIps:IPv4Range:Title_Class_Object' => 'Liste von IPs in %1$s: <span class="hilite">%2$s</span>',
	'UI:IPManagement:Action:ListIps:IPv4Range:Subtitle_ListRange' => 'Bereich ist zu groß, um alle IPs aufzulisten. Bitte kleineren Bereich auswählen:',                                               
	'UI:IPManagement:Action:ListIps:IPv4Range:FirstIP' => 'Erste IP der Liste',                                               
	'UI:IPManagement:Action:ListIps:IPv4Range:LastIP' => 'Letzte IP der Liste',                                              
		
	// Do list IPs action on IP Ranges 
	'UI:IPManagement:Action:DoListIps:IPv4Range' => 'IPs auflisten und auswählen',                                              
	'UI:IPManagement:Action:DoListIps:IPv4Range:PageTitle_Object_Class' => 'TeemIp - %1$s - IPs',
	'UI:IPManagement:Action:DoListIps:IPv4Range:Title_Class_Object' => 'Partielle Liste der IPs in %1$s: <span class="hilite">%2$s</span>',
	'UI:IPManagement:Action:DoListIps:IPv4Range:CannotBeListed' => 'Bereich kann nicht aufgelistet werden: %1$s',
	'UI:IPManagement:Action:DoListIps:IPv4Range:FirstIPOutOfRange' => 'Erste IP ausserhalb des Bereichs!',
	'UI:IPManagement:Action:DoListIps:IPv4Range:LastIPOutOfRange' => 'Letzte IP ausserhalb des Bereichs!',
	'UI:IPManagement:Action:DoListIps:IPv4Range:FirstIpBiggerThanLastIp' => 'erste IP des Bereichs ist größer als die letzte IP!',

	// CSV Export action on IP Ranges
	'UI:IPManagement:Action:CsvExportIps:IPv4Range' => 'CSV Export von IPs',
	'UI:IPManagement:Action:CsvExportIps:IPv4Range:PageTitle_Object_Class' => 'TeemIp - %1$s - %2$s CSV Export von IPs',
	'UI:IPManagement:Action:CsvExportIps:IPv4Range:Title_Class_Object' => 'CSV Export der IPs von %1$s: <span class="hilite">%2$s</span>',
	'UI:IPManagement:Action:CsvExportIps:IPv4Range:Subtitle_ListRange' => 'Bereich ist zum groß, um alle IPs gleichzeitig zu exportieren. Btte einen Unterbereich auswählen:',                                               
	'UI:IPManagement:Action:CsvExportIps:IPv4Range:FirstIP' => 'Erste IP der Liste',                                               
	'UI:IPManagement:Action:CsvExportIps:IPv4Range:LastIP' => 'Letzte IP der Liste',                                               
	
	// Do CSV Export IPs action on IP Ranges
	'UI:IPManagement:Action:DoCsvExportIps:IPv4Range' => 'CSV Export von IPs',                                               
	'UI:IPManagement:Action:DoCsvExportIps:IPv4Range:PageTitle_Object_Class' => 'TeemIp - %1$s - %2$s CSV Export von IPs',
	'UI:IPManagement:Action:DoCsvExportIps:IPv4Range:Title_Class_Object' => 'Partieller CSV Export der IPs von %1$s: <span class="hilite">%2$s</span>',
	'UI:IPManagement:Action:DoCsvExportIps:IPv4Range:CannotBeListed' => 'Bereich kann nicht exportiert werden: %1$s',
	'UI:IPManagement:Action:DoCsvExportIps:IPv4Range:FirstIPOutOfRange' => 'Erste IP ausserhalb des Bereichs!',
	'UI:IPManagement:Action:DoCsvExportIps:IPv4Range:LastIPOutOfRange' => 'Letzte IP ausserhalb des Bereichs!',
	'UI:IPManagement:Action:DoCsvExportIps:IPv4Range:FirstIpBiggerThanLastIp' => 'erste IP des Bereichs ist größer als die letzte IP!',

//
// Management of IPs
//
	// Creation Management	
	'UI:IPManagement:Action:New:IPAddress:IPNameCollision' => 'Hostname (short name) existiert bereits in der Domain!',	

	'UI:IPManagement:Action:New:IPAddress:IPCollision' => 'Die IP existiert bereits!',	
	'UI:IPManagement:Action:New:IPAddress:NotInRange' => 'Die IP gehört nicht zum IP Bereich!',	
	'UI:IPManagement:Action:New:IPAddress:NotInSubnet' => 'Die IP gehört nicht zum Subnetz!',	
	'UI:IPManagement:Action:New:IPAddress:IPPings' => 'IP pings! ',	
	'UI:IPManagement:Action:New:IPAddress:NatIPsAretheSame' => 'IP kann nicht auf sich selber ge-NAT-tet werden!',
	
//
// Management of Domains
//
	// Creation Management	
	'UI:IPManagement:Action:New:Domain:NameCollision' => 'Domain Name existiert bereits!',
		
	// Display list of domains
	'UI:IPManagement:Action:DisplayList:Domain' => 'Liste anzeigen',
	'UI:IPManagement:Action:DisplayList:Domain+' => '',
	'UI:IPManagement:Action:DisplayList:Domain:PageTitle_Class' => 'DNS Domains',
	'UI:IPManagement:Action:DisplayList:Domain:Title_Class' => 'DNS Domains',
	
	// Display tree of domains
	'UI:IPManagement:Action:DisplayTree:Domain' => 'Baumstruktur anzeigen',
	'UI:IPManagement:Action:DisplayTree:Domain+' => '',
	'UI:IPManagement:Action:DisplayTree:Domain:PageTitle_Class' => 'DNS Domains',
	'UI:IPManagement:Action:DisplayTree:Domain:Title_Class' => 'DNS Domains',
	'UI:IPManagement:Action:DisplayTree:Domain:OrgName' => 'Organisation %1$s',
	
));
	