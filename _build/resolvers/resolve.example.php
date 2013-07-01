<?php
/**
 * Tables Resolver
 * @package modx
 * @subpackage build
 */

if ($object -> xpdo) {
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
            break;
        
        case xPDOTransport::ACTION_UPGRADE:
            break;
    }
}

// Return true so that MODx knows everything went smoothly
return true;