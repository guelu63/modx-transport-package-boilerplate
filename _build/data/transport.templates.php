<?php
/**
 * Package Templates
 * @package modx
 * @subpackage build
 */

// Initialize
$i = 1;
$templates = array();


$templates[$i] = $modx -> newObject('modTemplate');
$templates[$i] -> fromArray(array(
    'id' => 1,
    'templatename' => 'exampleTemplate',
    'description' => 'Description for exampleTemplate',
    'content' => file_get_contents($sources['templates'].'template.exampleTemplate.tpl'),
), '', true, true, false); $i++;


return $templates;