<?php
/**
 * Define the MODX path constants necessary for core (for the modx installation)
 *
 * @package modx
 */

// +++ SET VARIABLES +++

$package_name               = 'MODx Transport Package Boilerplate';
$package_name_lower         = 'modx-transport-package-boilerplate';
$package_version            = '1.0';
$package_release            = 'rc2';

$modx_core_path             = '/var/www/modx/core/';
$modx_processors_path       = '/var/www/modx/core/model/modx/processors/';
$modx_connectors_path       = '/var/www/modx/connectors/';
$modx_connectors_url        = '/connectors/';
$modx_manager_path          = '/var/www/modx/manager/';
$modx_manager_url           = '/manager/';
$modx_base_path             = '/var/www/modx/waabeh.com/';
$modx_base_url              = '/';
$modx_assets_path           = '/var/www/modx/assets/';
$modx_assets_url            = '/assets/';


// +++ PACKAGE INFO +++

if (!defined('PKG_NAME')) {
    define('PKG_NAME', $package_name);
}
if (!defined('PKG_NAME_LOWER')) {
    define('PKG_NAME_LOWER', $package_name_lower );
}
if (!defined('PKG_VERSION')) {
    define('PKG_VERSION', $package_version);
}
if (!defined('PKG_RELEASE')) {
    define('PKG_RELEASE', $package_release);
}

// +++ PATHS +++

if (!defined('MODX_CORE_PATH')) {
    define('MODX_CORE_PATH', $modx_core_path);
}
if (!defined('MODX_PROCESSORS_PATH')) {
    define('MODX_PROCESSORS_PATH', $modx_processors_path);
}
if (!defined('MODX_CONNECTORS_PATH')) {
    define('MODX_CONNECTORS_PATH', $modx_connectors_path);
    define('MODX_CONNECTORS_URL', $modx_connectors_url);
}
if (!defined('MODX_MANAGER_PATH')) {
    define('MODX_MANAGER_PATH', $modx_manager_path);
    define('MODX_MANAGER_URL', $modx_manager_url);
}
if (!defined('MODX_BASE_PATH')) {
    define('MODX_BASE_PATH', $modx_base_path);
    define('MODX_BASE_URL', $modx_base_url);
}
if (!defined('MODX_ASSETS_PATH')) {
    define('MODX_ASSETS_PATH', $modx_assets_path);
    define('MODX_ASSETS_URL', $modx_assets_url);
}