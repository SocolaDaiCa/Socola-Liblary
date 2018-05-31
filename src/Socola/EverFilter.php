<?php

/**
 * @Author: Socola
 * @Email: TokenTien@gmail.com
 * @Date:   2018-02-17 13:05:55
 * @Last Modified by:   Socola
 * @Last Modified time: 2018-02-18 09:53:06
 */
namespace Socola;

class EverFilter
{	
	function __construct()
	{
		
	}
	public static function createImage($imageURL)
	{
		$endPoint = 'http://api.everfilter.me/filters/shinkai?nightscape=0';
		$nameImageSaved = explode('?', $imageURL)[0];
		$nameImageSaved = explode('/', $nameImageSaved);
		$nameImageSaved = array_pop($nameImageSaved);

		$pathImageSaved = "{$nameImageSaved}";
		file_put_contents($pathImageSaved, file_get_contents($imageURL));
		$realpath = realpath($pathImageSaved);
		$fileImage = new \CURLFile($realpath);

		$post = ['media' => $fileImage];
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $endPoint);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible;)");   
		curl_setopt($ch, CURLOPT_HTTPHEADER,array('Content-Type: multipart/form-data'));
		curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);   
		curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);  
		curl_setopt($ch, CURLOPT_TIMEOUT, 100);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		$result = curl_exec ($ch);
		curl_close ($ch);
		if ($result === FALSE) {
			// die("Error sending" . $fname . " " . curl_error($ch));
			return null;
		}
		return $result;
	}
	public static function getNameFromURL($url)
	{
		$name = explode('/', $url);
		$name = array_pop($name);

		$name = explode('?', $name);
		$name = array_shift($name);

		return $name;
	}
	public static function saveImage($image, $imagePath)
	{
		file_put_contents($imagePath, $image);
	}
}