<?php

/**
 * @Author: Socola
 * @Email: TokenTien@gmail.com
 * @Date:   2018-02-19 21:25:45
 * @Last Modified by:   Socola
 * @Last Modified time: 2018-04-15 07:38:42
 */
namespace Socola\Google;

use Socola\Curl;

class Drive
{
	public static function getFileInFolder($urlFolder)
	{
		$urlFolder = str_replace('.com/open?id=', '.com/drive/folders/', $urlFolder);
		$urlFolder = explode('?', $urlFolder)[0];
		$html = '';
		$id = explode("/",$urlFolder);
		$id = array_pop($id);
		$endPoint = "https://www.googleapis.com/drive/v2/files?q=%27{$id}%27%20in%20parents&maxResults=9999&key=AIzaSyCISllkltIqYjJs35a3mLkJ5iT-awGrNpA";
		$jsonString = Curl::get($endPoint);
		$json = json_decode($jsonString);

		return $json->items;
	}
	public function getLink($urlFile)
	{
		
	}
}