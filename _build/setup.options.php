<?php
/**
 * Package Setup Options
 * @package modx
 * @subpackage build
 */

$output = '';

switch ($options[xPDOTransport::PACKAGE_ACTION]) {

    case xPDOTransport::ACTION_INSTALL:

    case xPDOTransport::ACTION_UPGRADE:

    case xPDOTransport::ACTION_UNINSTALL:
    
        break;
}

return $output;