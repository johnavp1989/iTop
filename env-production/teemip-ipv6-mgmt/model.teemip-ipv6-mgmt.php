<?php
//
// File generated by ... on the 2014-07-21T21:27:53+0200
// Please do not edit manually
//

/**
 * Classes and menus for teemip-ipv6-mgmt (version 2.0.0)
 *
 * @author      iTop compiler
 * @license     http://opensource.org/licenses/AGPL-3.0
 */


/**
 * Persistent classes for IPv6 Mgmt 
 *
 * @copyright   Copyright (C) 2010-2012 Combodo SARL
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

require_once('_ipv6block.class.inc.php'); // Implementation of the class _IPv6Block
class IPv6Block extends _IPv6Block
{
	public static function Init()
	{
		$aParams = array
		(
			'category' => 'bizmodel,searchable,ipmgmt',
			'key_type' => 'autoincrement',
			'name_attcode' => 'name',
			'state_attcode' => '',
			'reconc_keys' => array('name', 'org_id', 'org_name'),
			'db_table' => 'ipblockv6',
			'db_key_field' => 'id',
			'db_finalclass_field' => '',
			'icon' => utils::GetAbsoluteUrlModulesRoot().'teemip-ipv6-mgmt/images/ipv6block.png',
			'order_by_default' => array('firstip' => true),
		);
		MetaModel::Init_Params($aParams);
		MetaModel::Init_InheritAttributes();
		MetaModel::Init_AddAttribute(new AttributeHierarchicalKey("parent_id", array("allowed_values"=>new ValueSetObjects("SELECT IPv6Block AS b WHERE (b.org_id = :this->org_id AND :this->parent_org_id = 0) OR (b.org_id = :this->parent_org_id)"), "sql"=>'parent_id', "is_null_allowed"=>true, "on_target_delete"=>DEL_MOVEUP, "depends_on"=>array('org_id', 'parent_org_id'), "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeExternalField("parent_name", array("allowed_values"=>null, "extkey_attcode"=>'parent_id', "target_attcode"=>'name', "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeIPv6Address("firstip", array("allowed_values"=>null, "sql"=>'firstip', "default_value"=>'', "is_null_allowed"=>false, "depends_on"=>array(), "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeIPv6Address("lastip", array("allowed_values"=>null, "sql"=>'lastip', "default_value"=>'', "is_null_allowed"=>false, "depends_on"=>array(), "always_load_in_tables"=>false)));


		MetaModel::Init_SetZListItems('details', array (
  0 => 'location_list',
  1 => 'contact_list',
  2 => 'document_list',
  'col:col1' => 
  array (
    'fieldset:Class:IPBlock:baseinfo' => 
    array (
      0 => 'org_id',
      1 => 'parent_org_id',
      2 => 'parent_id',
      3 => 'name',
      4 => 'type',
      5 => 'comment',
      6 => 'requestor_id',
    ),
  ),
  'col:col2' => 
  array (
    'fieldset:Class:IPBlock:ipinfo' => 
    array (
      0 => 'firstip',
      1 => 'lastip',
    ),
  ),
));
		MetaModel::Init_SetZListItems('standard_search', array (
  0 => 'parent_id',
  1 => 'name',
  2 => 'firstip',
  3 => 'lastip',
  4 => 'type',
  5 => 'org_id',
  6 => 'parent_org_id',
  7 => 'requestor_id',
));
		MetaModel::Init_SetZListItems('list', array (
  0 => 'parent_id',
  1 => 'firstip',
  2 => 'lastip',
  3 => 'type',
  4 => 'occupancy',
  5 => 'org_id',
  6 => 'parent_org_id',
));

	}


}



require_once('_ipv6subnet.class.inc.php'); // Implementation of the class _IPv6Subnet
class IPv6Subnet extends _IPv6Subnet
{
	public static function Init()
	{
		$aParams = array
		(
			'category' => 'bizmodel,searchable,ipmgmt',
			'key_type' => 'autoincrement',
			'name_attcode' => 'ip',
			'state_attcode' => '',
			'reconc_keys' => array('ip', 'name', 'org_id', 'org_name'),
			'db_table' => 'ipsubnetv6',
			'db_key_field' => 'id',
			'db_finalclass_field' => '',
			'icon' => utils::GetAbsoluteUrlModulesRoot().'teemip-ipv6-mgmt/images/ipv6subnet.png',
			'order_by_default' => array('ip' => true),
		);
		MetaModel::Init_Params($aParams);
		MetaModel::Init_InheritAttributes();
		MetaModel::Init_AddAttribute(new AttributeExternalKey("block_id", array("targetclass"=>'IPv6Block', "allowed_values"=>new ValueSetObjects("SELECT IPv6Block AS b WHERE b.org_id = :this->org_id"), "sql"=>'block_id', "is_null_allowed"=>false, "on_target_delete"=>DEL_MANUAL, "depends_on"=>array('org_id'), "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeExternalField("block_name", array("allowed_values"=>null, "extkey_attcode"=>'block_id', "target_attcode"=>'name', "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeIPv6Address("ip", array("allowed_values"=>null, "sql"=>'ip', "default_value"=>'', "is_null_allowed"=>false, "depends_on"=>array(), "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeEnum("mask", array("allowed_values"=>new ValueSetEnum("64"), "display_style"=>'list', "sql"=>'mask', "default_value"=>'', "is_null_allowed"=>false, "depends_on"=>array(), "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeIPv6Address("gatewayip", array("allowed_values"=>null, "sql"=>'gatewayip', "default_value"=>'', "is_null_allowed"=>true, "depends_on"=>array('ip', 'mask'), "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeIPv6Address("lastip", array("allowed_values"=>null, "sql"=>'lastip', "default_value"=>'', "is_null_allowed"=>true, "depends_on"=>array('ip', 'mask'), "always_load_in_tables"=>false)));


		MetaModel::Init_SetZListItems('details', array (
  0 => 'location_list',
  1 => 'contact_list',
  2 => 'document_list',
  3 => 'vlans_list',
  'col:col1' => 
  array (
    'fieldset:Class:IPSubnet:baseinfo' => 
    array (
      0 => 'org_id',
      1 => 'name',
      2 => 'status',
      3 => 'type',
      4 => 'comment',
      5 => 'requestor_id',
      6 => 'release_date',
    ),
  ),
  'col:col2' => 
  array (
    'fieldset:Class:IPSubnet:ipinfo' => 
    array (
      0 => 'block_id',
      1 => 'ip',
      2 => 'mask',
      3 => 'gatewayip',
    ),
  ),
));
		MetaModel::Init_SetZListItems('standard_search', array (
  0 => 'name',
  1 => 'block_id',
  2 => 'ip',
  3 => 'mask',
  4 => 'status',
  5 => 'type',
  6 => 'org_id',
  7 => 'requestor_id',
  8 => 'release_date',
));
		MetaModel::Init_SetZListItems('list', array (
  0 => 'mask',
  1 => 'name',
  2 => 'status',
  3 => 'type',
  4 => 'org_id',
  5 => 'release_date',
));

	}


}



require_once('_ipv6range.class.inc.php'); // Implementation of the class _IPv6Range
class IPv6Range extends _IPv6Range
{
	public static function Init()
	{
		$aParams = array
		(
			'category' => 'bizmodel,searchable,ipmgmt',
			'key_type' => 'autoincrement',
			'name_attcode' => 'range',
			'state_attcode' => '',
			'reconc_keys' => array('subnet_ip', 'range', 'org_id', 'org_name'),
			'db_table' => 'iprangev6',
			'db_key_field' => 'id',
			'db_finalclass_field' => '',
			'icon' => utils::GetAbsoluteUrlModulesRoot().'teemip-ipv6-mgmt/images/ipv6range.png',
			'order_by_default' => array('firstip' => true),
		);
		MetaModel::Init_Params($aParams);
		MetaModel::Init_InheritAttributes();
		MetaModel::Init_AddAttribute(new AttributeExternalKey("subnet_id", array("targetclass"=>'IPv6Subnet', "allowed_values"=>new ValueSetObjects("SELECT IPv6Subnet AS s WHERE s.org_id = :this->org_id"), "sql"=>'subnet_id', "is_null_allowed"=>false, "on_target_delete"=>DEL_MANUAL, "depends_on"=>array('org_id'), "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeExternalField("subnet_ip", array("allowed_values"=>null, "extkey_attcode"=>'subnet_id', "target_attcode"=>'ip', "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeIPv6Address("firstip", array("allowed_values"=>null, "sql"=>'firstip', "default_value"=>'', "is_null_allowed"=>false, "depends_on"=>array(), "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeIPv6Address("lastip", array("allowed_values"=>null, "sql"=>'lastip', "default_value"=>'', "is_null_allowed"=>false, "depends_on"=>array(), "always_load_in_tables"=>false)));


		MetaModel::Init_SetZListItems('details', array (
  0 => 'org_id',
  1 => 'subnet_id',
  2 => 'range',
  3 => 'firstip',
  4 => 'lastip',
  5 => 'usage_id',
  6 => 'dhcp',
  7 => 'comment',
  8 => 'requestor_id',
  9 => 'contact_list',
  10 => 'document_list',
));
		MetaModel::Init_SetZListItems('standard_search', array (
  0 => 'range',
  1 => 'subnet_id',
  2 => 'firstip',
  3 => 'lastip',
  4 => 'usage_id',
  5 => 'dhcp',
  6 => 'org_id',
  7 => 'requestor_id',
));
		MetaModel::Init_SetZListItems('list', array (
  0 => 'subnet_id',
  1 => 'firstip',
  2 => 'lastip',
  3 => 'usage_id',
  4 => 'dhcp',
  5 => 'occupancy',
  6 => 'org_id',
));

	}


}



require_once('_ipv6address.class.inc.php'); // Implementation of the class _IPv6Address
class IPv6Address extends _IPv6Address
{
	public static function Init()
	{
		$aParams = array
		(
			'category' => 'bizmodel,searchable,ipmgmt',
			'key_type' => 'autoincrement',
			'name_attcode' => 'ip',
			'state_attcode' => '',
			'reconc_keys' => array('ip', 'org_id', 'org_name'),
			'db_table' => 'ipaddressv6',
			'db_key_field' => 'id',
			'db_finalclass_field' => '',
			'icon' => utils::GetAbsoluteUrlModulesRoot().'teemip-ipv6-mgmt/images/ipv6address.png',
			'order_by_default' => array('ip' => true),
		);
		MetaModel::Init_Params($aParams);
		MetaModel::Init_InheritAttributes();
		MetaModel::Init_AddAttribute(new AttributeExternalKey("subnet_id", array("targetclass"=>'IPv6Subnet', "allowed_values"=>new ValueSetObjects("SELECT IPv6Subnet AS s WHERE s.org_id = :this->org_id"), "sql"=>'subnet_id', "is_null_allowed"=>true, "on_target_delete"=>DEL_MANUAL, "depends_on"=>array('org_id'), "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeExternalField("subnet_ip", array("allowed_values"=>null, "extkey_attcode"=>'subnet_id', "target_attcode"=>'ip', "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeExternalKey("range_id", array("targetclass"=>'IPv6Range', "allowed_values"=>new ValueSetObjects("SELECT IPv6Range AS r WHERE r.subnet_id = :this->subnet_id AND r.org_id = :this->org_id"), "sql"=>'range_id', "is_null_allowed"=>true, "on_target_delete"=>DEL_MANUAL, "depends_on"=>array('subnet_id'), "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeExternalField("range_name", array("allowed_values"=>null, "extkey_attcode"=>'range_id', "target_attcode"=>'range', "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeIPv6Address("ip", array("allowed_values"=>null, "sql"=>'ip', "default_value"=>'', "is_null_allowed"=>false, "depends_on"=>array(), "always_load_in_tables"=>false)));


		MetaModel::Init_SetZListItems('details', array (
  0 => 'ip_list',
  'col:col1' => 
  array (
    'fieldset:Class:IPAddress:baseinfo' => 
    array (
      0 => 'org_id',
      1 => 'status',
      2 => 'short_name',
      3 => 'domain_id',
      4 => 'usage_id',
      5 => 'comment',
      6 => 'requestor_id',
      7 => 'release_date',
    ),
  ),
  'col:col2' => 
  array (
    'fieldset:Class:IPAddress:ipinfo' => 
    array (
      0 => 'subnet_id',
      1 => 'range_id',
      2 => 'ip',
      3 => 'fqdn',
    ),
  ),
));
		MetaModel::Init_SetZListItems('standard_search', array (
  0 => 'ip',
  1 => 'status',
  2 => 'fqdn',
  3 => 'usage_id',
  4 => 'subnet_id',
  5 => 'org_id',
  6 => 'requestor_id',
  7 => 'release_date',
));
		MetaModel::Init_SetZListItems('list', array (
  0 => 'status',
  1 => 'short_name',
  2 => 'fqdn',
  3 => 'usage_id',
  4 => 'subnet_id',
  5 => 'org_id',
  6 => 'release_date',
));

	}


}
//
// Menus
//

global $__comp_menus__; // ensure that the global variable is indeed global !
$__comp_menus__['IPManagement'] = new MenuGroup('IPManagement', 25);
$__comp_menus__['Ipv6ShortCut'] = new TemplateMenuNode('Ipv6ShortCut', '', $__comp_menus__['IPManagement']->GetIndex(), 50);
$__comp_menus__['IPv6Block'] = new OQLMenuNode('IPv6Block', "SELECT IPv6Block", $__comp_menus__['Ipv6ShortCut']->GetIndex(), 10, false);
$__comp_menus__['IPv6Subnet'] = new OQLMenuNode('IPv6Subnet', "SELECT IPv6Subnet", $__comp_menus__['Ipv6ShortCut']->GetIndex(), 20, false);
$__comp_menus__['IPv6Range'] = new OQLMenuNode('IPv6Range', "SELECT IPv6Range", $__comp_menus__['Ipv6ShortCut']->GetIndex(), 30, false);
$__comp_menus__['IPv6Address'] = new OQLMenuNode('IPv6Address', "SELECT IPv6Address", $__comp_menus__['Ipv6ShortCut']->GetIndex(), 40, false);
