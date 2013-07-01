<?php
/**
 * Package Resource Group Permissions for User Groups
 * @package modx
 * @subpackage build
 */

$resourcegrouppermissions = array();


// add 'Example User Group' resource group (2) access to the 'Anonymous' user
// group (0) with a 'Resource' Policy (1) & minimum role of 9999 on 'web'
// context

// $resourcegrouppermissions[$i] = $modx -> newObject('modAccessResourceGroup');
// $resourcegrouppermissions[$i] -> fromArray(array(
//     'id' => $i,
//     'target' => 2,
//     'principal_class' => 'modUserGroup',
//     'principal' => 0,
//     'authority' => 9999,
//     'policy' => 1,
//     'context_key' => 'web',
// ), '', true, true, false); $i++;


return $resourcegrouppermissions;