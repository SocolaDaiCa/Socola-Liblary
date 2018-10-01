<?php
require '../vendor/autoload.php';
use Socola\Google\Drive;

$urlFolder = 'https://drive.google.com/drive/folders/0B2GHv1RH8CcUVUJvNEVxTHRPR0E';
$files = Drive::folder($urlFolder)->files();
$links = [];

foreach ($files as $key => $file) {
	$id = $file->id;
	$links[] = "https://drive.google.com/file/d/{$id}/view";;
}

file_put_contents('temp/files.json', json_encode($links, JSON_PRETTY_PRINT));
// $json = file_get_contents('temp/files.json');