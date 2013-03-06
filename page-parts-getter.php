<?php
/**
 * Trying to grab the parts quantity and the type, but they are missing.
 * Check this page: http://makeprojects.com/api/0.1/guide/56 and note the parts array.
*/
header('Content-Type: text/html; charset=utf-8');

$url = 'http://makeprojects.com/api/0.1/guide/56';
$contents = file_get_contents( $url );
//echo $contents;
$json = json_decode($contents);
//print_r($json);
$parts = $json->guide->parts;
print_r($parts);