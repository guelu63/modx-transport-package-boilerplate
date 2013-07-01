<?php
/**
 * Package Plugins
 * @package modx
 * @subpackage build
 */

$plugins = array();


// $plugins[0] = $modx -> newObject('modPlugin');
// $plugins[0] -> set('id',1);
// $plugins[0] -> set('name','xxxPlugin');
// $plugins[0] -> set('description','XXX');
// $plugins[0] -> set('plugincode', getSnippetContent($sources['plugins'] . 'plugin.xxx.php'));
// $plugins[0] -> set('category', 0);
//
// $events = include $sources['events'].'events.articles.php';
// if (is_array($events) && !empty($events)) {
//    $plugins[0] -> addMany($events);
//    $modx -> log(xPDO::LOG_LEVEL_INFO,'Packaged in '.count($events).' Plugin Events for xxxPlugin.');
// } else {
//    $modx->log(xPDO::LOG_LEVEL_ERROR,'Could not find plugin events for xxxPlugin!');
// }
// unset($events);


return $plugins;