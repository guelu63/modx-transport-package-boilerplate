<?php
/**
 * Schema build script
 * @package modx
 * @subpackage build
 */

/* set the timezone */
date_default_timezone_set('Africa/Nairobi');
 
/* start the timer */
$mtime = microtime();
$mtime = explode(" ", $mtime);
$mtime = $mtime[1] + $mtime[0];
$tstart = $mtime;
set_time_limit(0);

/* set package defines */
define('PKG_NAME','MODx Transport Package Boilerplate');
define('PKG_NAME_LOWER','modx-transport-package-boilerplate');

require_once dirname(__FILE__).'/build.config.php';
include_once MODX_CORE_PATH . 'model/modx/modx.class.php';

/* open <pre> tag for formatting output */
echo '<pre style="font-size: 0.8em;">';

/* load up the modX object & be a little more verbose in it's error reporting */
$modx = new modX();
$modx -> initialize('mgr');
$modx -> loadClass('transport.modPackageBuilder','',false, true);
$modx -> setLogLevel(modX::LOG_LEVEL_INFO);
$modx -> setLogTarget('ECHO');

/* set up some source defines */
$root = dirname(dirname(__FILE__)).'/';
$sources = array(
    'model' => $root.'core/components/'.PKG_NAME_LOWER.'/model/',
    'schema_file' => $root.'core/components/'.PKG_NAME_LOWER.'/model/schema/'.PKG_NAME_LOWER.'.mysql.schema.xml',
);
unset($root);

/* Gets the manager class for this xPDO connection. The manager class can
 * perform operations such as creating or altering table structures, creating
 * data containers, generating custom persistence classes, and other advanced
 * operations that do not need to be loaded frequently. To use our newly created
 * XML schema, we'll need to parse the XML schema into the xPDO PHP classes and
 * maps */
$generator = $modx -> getManager() -> getGenerator();

/* check if model folder exists */
if (!is_dir($sources['model'])) {
    $modx -> log(modX::LOG_LEVEL_ERROR,'Model directory not found!');
    die();
}
else {
    $modx -> log(modX::LOG_LEVEL_ERROR,'Model directory found.');
    $modx -> log(modX::LOG_LEVEL_INFO,'... as \''.$sources['model'].'\'');
}

/* check if schema file exists */
if (!file_exists($sources['schema_file'])) {
    $modx -> log(modX::LOG_LEVEL_ERROR,'Schema file not found!');
    die();
}
else {
    $modx -> log(modX::LOG_LEVEL_ERROR,'Schema file found.');
    $modx -> log(modX::LOG_LEVEL_INFO,'... as \''.$sources['schema_file'].'\'');
}

/* parse xPDO schema file & generate classes and map files from it */
$result = $generator -> parseSchema($sources['schema_file'], $sources['model']);
if ($result) {
    $modx -> log(modX::LOG_LEVEL_INFO,'... XML parsed, xPDO classes and maps generated successfully.');
}
 
/*  give the time it took to build the package */
$mtime = microtime();
$mtime = explode(' ', $mtime);
$mtime = $mtime[1] + $mtime[0];
$tend = $mtime;
$totalTime = ($tend - $tstart);
$totalTime = sprintf('%2.4f seconds', $totalTime);
$modx -> log(modX::LOG_LEVEL_INFO,'And we\'re <b>DONE!</b> :-) in '.$totalTime);

/* open <pre> tag for formatting output */
echo '</pre>';

/*  EXIT script */
exit ();