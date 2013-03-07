<?php
/**
 * Trying to grab the parts quantity and the type, but they are missing.
 * Check this page: http://makeprojects.com/api/0.1/guide/56 and note the parts array.
*/
header('Content-Type: text/html; charset=utf-8');
error_reporting('E_All');
$url = 'http://makeprojects.com/api/1.0/guide/243?type=xml';
$contents = file_get_contents( $url );
//echo $contents;
$xml = simplexml_load_file($url) or die("feed not loading");
$attrs = $xml->elem->attributes();
//print_r($xml->parts);
foreach ($xml->parts->part as $part) {
	echo $part . "\n";
	echo (string)($part->attributes()->url) . "\n";
	echo (string)($part->attributes()->type) . "\n";
	echo (string)($part->attributes()->thumbnail) . "\n";
}

