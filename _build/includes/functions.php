<?php
/**
 * Functions For Building
 * @package modx
 * @subpackage build
 */

function getSnippetContent($filename) {
    $output = file_get_contents($filename);
    $output = str_replace(array('<?php','?>'),'',$output);
    $output = trim($output);
    return $output;
}