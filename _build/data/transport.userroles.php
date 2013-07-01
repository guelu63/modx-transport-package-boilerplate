<?php
/**
 * Package User Roles
 * @package modx
 * @subpackage build
 */

// The 'Member' & 'Super User' roles come as defaults with MODx with an ID =1 and
// ID=2 and should never be overridden by the package EVER. So the assignement
// below start from ID = 3

$userroles = array();


$userroles[$i] = $modx -> newObject('modUserGroupRole');
$userroles[$i] -> fromArray(array(
    'id' => 3,
    'name' => 'Example User Role',
    'description' => 'Description for Example User Role',
    'authority' => 1000,
), '', true, true, false); $i++;


return $userroles;