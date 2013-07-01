<?php
/**
 * Define the MODX path constants necessary for core (for the modx installation)
 *
 * @package modx
 * @subpackage build
 */

if (!defined('MODX_CORE_PATH')) {
    $modx_core_path= 'C:/My WAMP/wamp/www/modx/core/';
    define('MODX_CORE_PATH', $modx_core_path);
}
if (!defined('MODX_PROCESSORS_PATH')) {
    $modx_processors_path= 'C:/My WAMP/wamp/www/modx/core/model/modx/processors/';
    define('MODX_PROCESSORS_PATH', $modx_processors_path);
}
if (!defined('MODX_CONNECTORS_PATH')) {
    $modx_connectors_path= 'C:/My WAMP/wamp/www/modx/connectors/';
    $modx_connectors_url= '/modx/connectors/';
    define('MODX_CONNECTORS_PATH', $modx_connectors_path);
    define('MODX_CONNECTORS_URL', $modx_connectors_url);
}
if (!defined('MODX_MANAGER_PATH')) {
    $modx_manager_path= 'C:/My WAMP/wamp/www/modx/manager/';
    $modx_manager_url= '/modx/manager/';
    define('MODX_MANAGER_PATH', $modx_manager_path);
    define('MODX_MANAGER_URL', $modx_manager_url);
}
if (!defined('MODX_BASE_PATH')) {
    $modx_base_path= 'C:/My WAMP/wamp/www/modx/';
    $modx_base_url= '/modx/';
    define('MODX_BASE_PATH', $modx_base_path);
    define('MODX_BASE_URL', $modx_base_url);
}
if (!defined('MODX_ASSETS_PATH')) {
    $modx_assets_path= 'C:/My WAMP/wamp/www/modx/assets/';
    $modx_assets_url= '/modx/assets/';
    define('MODX_ASSETS_PATH', $modx_assets_path);
    define('MODX_ASSETS_URL', $modx_assets_url);
}