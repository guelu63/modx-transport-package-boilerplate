<?php
/**
 * Package Snippets
 * @package modx
 * @subpackage build
 */

// Initialize
$i = 1;
$snippets = array();


$snippets[$i] = $modx -> newObject('modSnippet');
$snippets[$i] -> fromArray(array(
    'id' => $i,
    'name' => 'exampleSnippet',
    'description' => 'Description for exampleSnippet',
    'snippet' => getSnippetContent($sources['source_core'].'/elements/snippets/snippet.exampleSnippet.php'),
), '', true, true, false); $i++;


return $snippets;