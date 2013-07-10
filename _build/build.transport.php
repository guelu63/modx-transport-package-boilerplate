<?php
/**
 * Transport Package Build Script
 * @package modx
 * @subpackage build
 */

/* set the timezone */
date_default_timezone_set('Africa/Nairobi');
 
/* start the timer */
$mtime = microtime();
$mtime = explode(' ', $mtime);
$mtime = $mtime[1] + $mtime[0];
$tstart = $mtime;
set_time_limit(0);

/* get root folder */
$root = dirname(dirname(__FILE__)).'/';

/* override with your own defines here (see build.config.sample.php) */
require_once $root . 'config.core.php';
require_once MODX_CORE_PATH . 'model/modx/modx.class.php';
require_once dirname(__FILE__). '/includes/functions.php';

/* set up some source defines */
$sources= array (
    'root' => $root,
    'build' => $root .'_build/',
    'resolvers' => $root . '_build/resolvers/',
    'data' => $root . '_build/data/',
    'events' => $root . '_build/data/events/',
    'properties' => $root . '_build/properties/',
    'events' => $root . '_build/data/events/',
    'source_core' => $root.'core/components/'.PKG_NAME_LOWER,
    'source_assets' => $root.'assets/components/'.PKG_NAME_LOWER,
    'plugins' => $root.'core/components/'.PKG_NAME_LOWER.'/elements/plugins/',
    'snippets' => $root.'core/components/'.PKG_NAME_LOWER.'/elements/snippets/',
    'chunks' => $root.'core/components/'.PKG_NAME_LOWER.'/elements/chunks/',
    'templates' => $root.'core/components/'.PKG_NAME_LOWER.'/elements/templates/',
    'mediasources' => $root.'core/components/'.PKG_NAME_LOWER.'/elements/mediasources/',
    'resources' => $root.'core/components/'.PKG_NAME_LOWER.'/elements/resources/',
    'lexicon' => $root.'core/components/'.PKG_NAME_LOWER.'/lexicon/',
    'docs' => $root.'core/components/'.PKG_NAME_LOWER.'/docs/',
    'model' => $root.'core/components/'.PKG_NAME_LOWER.'/model/',
);
unset($root);

/* open <pre> tag for formatting output */
echo '<pre style="font-size: 0.8em;">';

/* load up the modX object & be a little more verbose in it's error reporting */
$modx = new modX();
$modx -> initialize('mgr');
$modx -> setLogLevel(modX::LOG_LEVEL_INFO);
$modx -> setLogTarget('ECHO');

/* load the modPackageBuilder class & instantiate an instance of it, and create a package */
$modx -> loadClass('transport.modPackageBuilder','',false, true);
$builder = new modPackageBuilder($modx);
$modx -> log(modX::LOG_LEVEL_INFO, '+++ MODX TRANSPORT PACKAGE EXAMPLE +++');
$builder -> createPackage(PKG_NAME,PKG_VERSION,PKG_RELEASE);
$builder -> registerNamespace(PKG_NAME_LOWER,false,true,'{core_path}components/'.PKG_NAME_LOWER.'/');

/* create category */
$category = $modx -> newObject('modCategory');
$category -> set('id', 1);
$category -> set('category', ucwords(PKG_NAME_LOWER));
$modx -> log(modX::LOG_LEVEL_INFO,'Packaged in category.');
flush();

/* add snippets */
$modx -> log(modX::LOG_LEVEL_INFO,'Packaging in snippets...');
$snippets = include_once $sources['data'].'transport.snippets.php';
if (empty($snippets)) { $modx -> log(modX::LOG_LEVEL_ERROR,'... no snippets to add to package.');} 
if (is_array($snippets)) {
    $category -> addMany($snippets,'Snippets');
}
else { $modx -> log(modX::LOG_LEVEL_FATAL,'... adding snippets failed.'); }
$modx -> log(modX::LOG_LEVEL_INFO,'... packaged in '.count($snippets).' snippet(s).');
flush();

/* add chunks */
$modx -> log(modX::LOG_LEVEL_INFO,'Packaging in chunks...');
$chunks = include $sources['data'].'transport.chunks.php';
if (empty($chunks)) { $modx -> log(modX::LOG_LEVEL_ERROR,'... no chunks to add to package.'); } 
if (is_array($chunks)) {
    $category -> addMany($chunks, 'Chunks');
}
else { $modx -> log(modX::LOG_LEVEL_FATAL,'... adding chunks failed.');}
$modx -> log(modX::LOG_LEVEL_INFO,'... packaged in '.count($chunks).' chunk(s).');
flush();

/* add templates */
$modx -> log(modX::LOG_LEVEL_INFO,'Packaging in templates...');
$templates = include $sources['data'].'transport.templates.php';
if (empty($templates)) { $modx -> log(modX::LOG_LEVEL_ERROR,'... no templates to add to package.'); } 
if (is_array($templates)) {
    $category -> addMany($templates, 'Templates');
}
else { $modx -> log(modX::LOG_LEVEL_FATAL,'... adding templates failed.');}
$modx -> log(modX::LOG_LEVEL_INFO,'... packaged in '.count($templates).' template(s).');
flush();

/* add TVs */
$modx -> log(modX::LOG_LEVEL_INFO,'Packaging in template variables...');
$tvs = include $sources['data'].'transport.tvs.php';
if (empty($tvs)) { $modx -> log(modX::LOG_LEVEL_ERROR,'... no TVs to add to package.'); } 
if (is_array($tvs)) {
    $category -> addMany($tvs, 'TemplateVars');
}
else { $modx -> log(modX::LOG_LEVEL_FATAL,'... adding TVs failed.');}
$modx->log(modX::LOG_LEVEL_INFO,'... packaged in '.count($tvs).' tv(s).');
flush();

/* add system settings */
$modx -> log(modX::LOG_LEVEL_INFO,'Packaging in system settings...');
$settings = include_once $sources['data'].'transport.settings.php';
if (empty($settings)) { $modx -> log(modX::LOG_LEVEL_ERROR,'... no settings to add to package.');}
if (is_array($settings)) {
    $attributes = array(
        xPDOTransport::UNIQUE_KEY => 'key',
        xPDOTransport::PRESERVE_KEYS => true,
        xPDOTransport::UPDATE_OBJECT => true,
    );
    foreach ($settings as $setting) {
        $vehicle = $builder -> createVehicle($setting,$attributes);
        $builder -> putVehicle($vehicle);
    }
    $modx -> log(modX::LOG_LEVEL_INFO,'... packaged in '.count($settings).' setting(s).');
}
unset($settings, $setting, $vehicle, $attributes);
flush();

/* add resources */
$modx -> log(modX::LOG_LEVEL_INFO,'Packaging in resources...');
$resources = include_once $sources['data'].'transport.resources.php';
if (empty($resources)) { $modx -> log(modX::LOG_LEVEL_ERROR,'... no resources to add to package.');}
if (is_array($resources)) {
    $attributes = array(
        xPDOTransport::UNIQUE_KEY => 'id',
        xPDOTransport::PRESERVE_KEYS => true,
        xPDOTransport::UPDATE_OBJECT => true,
    );
    foreach ($resources as $resource) {
        $vehicle = $builder -> createVehicle($resource,$attributes);
        $builder -> putVehicle($vehicle);
    }
    $modx -> log(modX::LOG_LEVEL_INFO,'... packaged in '.count($resources).' resource(s).');
}
unset($resources, $resource, $vehicle, $attributes);
flush();

/* add user groups */
$modx -> log(modX::LOG_LEVEL_INFO,'Packaging in user groups...');
$usergroups = include_once $sources['data'].'transport.usergroups.php';
if (empty($usergroups)) { $modx -> log(modX::LOG_LEVEL_ERROR,'... no user groups to add to package.');}
if (is_array($usergroups)) {
    $attributes = array(
        xPDOTransport::UNIQUE_KEY => 'id',
        xPDOTransport::PRESERVE_KEYS => true,
        xPDOTransport::UPDATE_OBJECT => true,
    );
    foreach ($usergroups as $usergroup) {
        $vehicle = $builder -> createVehicle($usergroup,$attributes);
        $builder -> putVehicle($vehicle);
    }
    $modx -> log(modX::LOG_LEVEL_INFO,'... packaged in '.count($usergroups).' user group(s).');
}
unset($usergroups, $usergroup, $vehicle, $attributes);
flush();

/* add user roles */
$modx -> log(modX::LOG_LEVEL_INFO,'Packaging in user roles...');
$userroles = include_once $sources['data'].'transport.userroles.php';
if (empty($userroles)) { $modx -> log(modX::LOG_LEVEL_ERROR,'... no user roles to add to package.');}
if (is_array($userroles)) {
    $attributes = array(
        xPDOTransport::UNIQUE_KEY => 'id',
        xPDOTransport::PRESERVE_KEYS => true,
        xPDOTransport::UPDATE_OBJECT => true,
    );
    foreach ($userroles as $userrole) {
        $vehicle = $builder -> createVehicle($userrole,$attributes);
        $builder -> putVehicle($vehicle);
    }
    $modx -> log(modX::LOG_LEVEL_INFO,'... packaged in '.count($userroles).' user roles(s).');
}
unset($userroles, $userrole, $vehicle, $attributes);
flush();

/* add resource groups */
$modx -> log(modX::LOG_LEVEL_INFO,'Packaging in resource groups...');
$resourcegroups = include_once $sources['data'].'transport.resourcegroups.php';
if (empty($resourcegroups)) { $modx -> log(modX::LOG_LEVEL_ERROR,'... no resource groups to add to package.');}
if (is_array($resourcegroups)) {
    $attributes = array(
        xPDOTransport::UNIQUE_KEY => 'id',
        xPDOTransport::PRESERVE_KEYS => true,
        xPDOTransport::UPDATE_OBJECT => true,
    );
    foreach ($resourcegroups as $resourcegroup) {
        $vehicle = $builder -> createVehicle($resourcegroup,$attributes);
        $builder -> putVehicle($vehicle);
    }
    $modx -> log(modX::LOG_LEVEL_INFO,'... packaged in '.count($resourcegroups).' resource group(s).');
}
unset($resourcegroups, $resourcegroup, $vehicle, $attributes);
flush();

/* add context permissions for the user groups */
$modx -> log(modX::LOG_LEVEL_INFO,'Packaging in context permissions for the user groups...');
$contextpermissions = include_once $sources['data'].'transport.permissions.context.php';
if (empty($contextpermissions)) { $modx -> log(modX::LOG_LEVEL_ERROR,'... no user group context permissions to add to package.');}
if (is_array($contextpermissions)) {
    $attributes = array(
        xPDOTransport::UNIQUE_KEY => 'id',
        xPDOTransport::PRESERVE_KEYS => true,
        xPDOTransport::UPDATE_OBJECT => true,
    );
    foreach ($contextpermissions as $contextpermission) {
        $vehicle = $builder -> createVehicle($contextpermission,$attributes);
        $builder -> putVehicle($vehicle);
    }
    $modx -> log(modX::LOG_LEVEL_INFO,'... packaged in '.count($contextpermissions).' context permissions for the user group(s).');
}
unset($contextpermissions, $contextpermission, $vehicle, $attributes);
flush();

/* add resource group permissions for the user groups */
$modx -> log(modX::LOG_LEVEL_INFO,'Packaging in resource group permissions for the user groups...');
$resourcegrouppermissions = include_once $sources['data'].'transport.permissions.resourcegroup.php';
if (empty($resourcegrouppermissions)) { $modx -> log(modX::LOG_LEVEL_ERROR,'... no user group resource group permissions to add to package.');}
if (is_array($resourcegrouppermissions)) {
    $attributes = array(
        xPDOTransport::UNIQUE_KEY => 'id',
        xPDOTransport::PRESERVE_KEYS => true,
        xPDOTransport::UPDATE_OBJECT => true,
    );
    foreach ($resourcegrouppermissions as $resourcegrouppermission) {
        $vehicle = $builder -> createVehicle($resourcegrouppermission,$attributes);
        $builder -> putVehicle($vehicle);
    }
    $modx -> log(modX::LOG_LEVEL_INFO,'... packaged in '.count($resourcegrouppermissions).' resource group permissions for the user group(s).');
}
unset($resourcegrouppermissions, $resourcegrouppermission, $vehicle, $attributes);
flush();

/* add assignment of resources to resource groups */
$modx -> log(modX::LOG_LEVEL_INFO,'Packaging in assignment of resources to resource groups...');
$resourceassignments = include_once $sources['data'].'transport.permissions.resourcetoresourcegroup.php';
if (empty($resourceassignments)) { $modx -> log(modX::LOG_LEVEL_ERROR,'... no resource group assignments to add to package.');}
if (is_array($resourceassignments)) {
    $attributes = array(
        xPDOTransport::UNIQUE_KEY => 'id',
        xPDOTransport::PRESERVE_KEYS => true,
        xPDOTransport::UPDATE_OBJECT => true,
    );
    foreach ($resourceassignments as $resourceassignment) {
        $vehicle = $builder -> createVehicle($resourceassignment,$attributes);
        $builder -> putVehicle($vehicle);
    }
    $modx -> log(modX::LOG_LEVEL_INFO,'... packaged in '.count($resourceassignments).' resources assigned to the resource group(s).');
}
unset($resourceassignments, $resourceassignment, $vehicle, $attributes);

/* add plugins */
$modx -> log(modX::LOG_LEVEL_INFO,'Packaging in plugins...');
$plugins = include $sources['data'].'transport.plugins.php';
if (empty($plugins)) { $modx -> log(modX::LOG_LEVEL_ERROR,'... no plugins to add to package.');} 
$attributes= array(
    xPDOTransport::UNIQUE_KEY => 'name',
    xPDOTransport::PRESERVE_KEYS => false,
    xPDOTransport::UPDATE_OBJECT => true,
    xPDOTransport::RELATED_OBJECTS => true,
    xPDOTransport::RELATED_OBJECT_ATTRIBUTES => array (
        'PluginEvents' => array(
            xPDOTransport::PRESERVE_KEYS => true,
            xPDOTransport::UPDATE_OBJECT => false,
            xPDOTransport::UNIQUE_KEY => array('pluginid','event'),
        ),
    ),
);
foreach ($plugins as $plugin) {
    $vehicle = $builder->createVehicle($plugin, $attributes);
    $builder->putVehicle($vehicle);
}
$modx -> log(modX::LOG_LEVEL_INFO,'... packaged in '.count($plugins).' plugins.');
unset($plugins,$plugin,$attributes);
flush();

/* create category vehicle (includes attached snippets) */
$attributes = array(
    xPDOTransport::UNIQUE_KEY => 'category',
    xPDOTransport::PRESERVE_KEYS => false,
    xPDOTransport::UPDATE_OBJECT => true,
    xPDOTransport::RELATED_OBJECTS => true,
    xPDOTransport::RELATED_OBJECT_ATTRIBUTES => array (
        'Chunks' => array(

            // chunks are identified uniquely by name
            xPDOTransport::UNIQUE_KEY => array('name'),
            xPDOTransport::PRESERVE_KEYS => true,
            xPDOTransport::UPDATE_OBJECT => true,
        ),
        'Snippets' => array(

            // snippets are identified uniquely by name 
            xPDOTransport::UNIQUE_KEY => 'name',
            xPDOTransport::PRESERVE_KEYS => false,
            xPDOTransport::UPDATE_OBJECT => true,
        ),
        'Templates' => array(

            // templates are identified uniquely by name & linked to resources via id
            xPDOTransport::UNIQUE_KEY => array('id','templatename'),
            xPDOTransport::PRESERVE_KEYS => true,
            xPDOTransport::UPDATE_OBJECT => true,
        ),
        'TemplateVars' => array(

            // template variables are identified uniquely by id & name 
            xPDOTransport::UNIQUE_KEY => array('id','name'),
            xPDOTransport::PRESERVE_KEYS => true,
            xPDOTransport::UPDATE_OBJECT => true,
        ),
    ),
);
$vehicle = $builder -> createVehicle($category, $attributes);

$modx -> log(modX::LOG_LEVEL_INFO, '');$modx -> log(modX::LOG_LEVEL_INFO, '+++ RESOLVERS +++');

/* ride on the vehicle for category to pass these resolvers which copy over
 * source core files into the respectice target locations */
$modx -> log(modX::LOG_LEVEL_INFO,'Working out the source core resolver...');
$vehicle -> resolve('file',array(
    'source' => $sources['source_core'],
    'target' => "return MODX_CORE_PATH . 'components/';",
));
$modx -> log(modX::LOG_LEVEL_INFO,'... source core resolved.');
flush();

/* resolver to copy over assets into the respectice target location */
$modx -> log(modX::LOG_LEVEL_INFO,'Working out the asset files resolver...');
$vehicle -> resolve('file',array(
    'source' => $sources['source_assets'],
    'target' => "return MODX_ASSETS_PATH . 'components/';",
));
$modx -> log(modX::LOG_LEVEL_INFO,'... source assets resolved.');
flush();

/* ... and now a php resolver association */
$modx -> log(modX::LOG_LEVEL_INFO,'Working out the tv and template association resolver...');
$vehicle -> resolve('php',array(
    'source' => $sources['resolvers'] . 'resolve.example.php',
));
$modx -> log(modX::LOG_LEVEL_INFO,'... tv templates resolved.');
flush();

$modx -> log(modX::LOG_LEVEL_INFO, '');$modx -> log(modX::LOG_LEVEL_INFO, '+++ FINALIZING +++');

/* pack in the license file, readme and setup options */
$modx -> log(modX::LOG_LEVEL_INFO,'Now adding package attributes and setup options.');
$builder -> setPackageAttributes(array(
    'license' => file_get_contents($sources['docs'] . 'LICENSE.md'),
    'readme' => file_get_contents($sources['docs'] . 'README.md'),
    'changelog' => file_get_contents($sources['docs'] . 'CHANGELOG.md'),
    'setup-options' => array(
        'source' => $sources['build'].'setup.options.php',
    ),
));
$modx -> log(modX::LOG_LEVEL_INFO,'... LICENSE, README & CHANGELOG added.');
flush();

/* pack the package into a zip file */
$modx -> log(modX::LOG_LEVEL_INFO,'Packing up transport package zip...');
$builder -> pack();

/*  give the time it took to build the package */
$mtime = microtime();
$mtime = explode(' ', $mtime);
$mtime = $mtime[1] + $mtime[0];
$tend = $mtime;
$totalTime = ($tend - $tstart);
$totalTime = sprintf('%2.4f seconds', $totalTime);
$modx -> log(modX::LOG_LEVEL_INFO,'... package built in '.$totalTime);
$modx -> log(modX::LOG_LEVEL_INFO,'And we\'re <b>DONE!</b> :-)');

/* open <pre> tag for formatting output */
echo '</pre>';
flush();

/*  EXIT script */
exit ();