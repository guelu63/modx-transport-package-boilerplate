<?php
/**
 * Package Context Permissions for User Groups
 * @package modx
 * @subpackage build
 */

$contextpermissions = array();


// add 'web' access to the 'Anonymous' user group (0) with a 'Load, List & View'
// Policy (4) & minimum role highest value of 9999 for this user group
$contextpermissions[$i] = $modx -> newObject('modAccessContext');
$contextpermissions[$i] -> fromArray(array(
    'id' => $i,
    'target' => 'web',
    'principal_class' => 'modUserGroup',
    'principal' => 0,
    'authority' => 9999,
    'policy' => 4,
), '', true, true, false); $i++;


return $contextpermissions;