<?php
/**
 * Package User Groups
 * @package modx
 * @subpackage build
 */

//The 'Administrator' user group comes as a default with MODx with an ID =1 and
//should never be overridden by the package EVER. So the assignement below start
//from ID = 2

$usergroups = array();


// $usergroups[$i] = $modx -> newObject('modUserGroup');
// $usergroups[$i] -> fromArray(array(
//     'id' => 2,
//     'name' => 'Example User Group',
//     'description' => 'Description for Example User Group',
//     'parent' => 0,
//     'rank' => 0,
//     'dashboard' => 1,
// ), '', true, true, false); $i++;


return $usergroups;