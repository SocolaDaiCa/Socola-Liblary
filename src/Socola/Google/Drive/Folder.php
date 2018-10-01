<?php

namespace Socola\Google\Drive;

use Socola\Curl;

/**
 * 	
 */
class Folder
{
	protected $url;
	function __construct($url)
	{
		$this->url = $url;
	}

	public function files()
	{
		$url = str_replace('.com/open?id=', '.com/drive/folders/', $this->url);
		$url = explode('?', $url)[0];
		$html = '';
		$id = explode("/",$url);
		$id = array_pop($id);
		$endPoint = "https://www.googleapis.com/drive/v2/files?q=%27{$id}%27%20in%20parents&maxResults=9999&key=AIzaSyCISllkltIqYjJs35a3mLkJ5iT-awGrNpA";
		$jsonString = Curl::to($endPoint)->get();
		$json = json_decode($jsonString);

		return $json->items;
	}
}