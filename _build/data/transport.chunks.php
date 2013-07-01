<?php
/**
 * Package Chunks
 * @package modx
 * @subpackage build
 */

// Initialize
$i = 1;
$chunks = array();


$chunks[$i] = $modx -> newObject('modChunk');
$chunks[$i] -> fromArray(array(
    'id' => $i,
    'name' => 'exampleChunk',
    'description' => '',
    'snippet' => file_get_contents($sources['chunks'].'chunk.exampleChunk.tpl'),
    'properties' => '',
), '', false, true, false); $i++;


return $chunks;