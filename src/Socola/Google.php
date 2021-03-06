<?php

/**
 * @Author: Socola
 * @Email: TokenTien@gmail.com
 * @Date:   2018-02-17 09:57:56
 * @Last Modified by:   Socola
 * @Last Modified time: 2018-02-19 21:26:15
 */
namespace Socola;

use Socola\Curl;

class Google
{
	function __construct()
	{
		
	}
	public static function shortLink($url)
	{
		if(!filter_var($url, FILTER_VALIDATE_URL)){
			return 'Invalid url ' . $url;
		}
		$apiKey  = 'AIzaSyCgz2SsFFb3vqxZ2VyuXIDk_qnIH00hBUc';
		 
		$postData = array('longUrl' => $url);
		$jsonData = json_encode($postData);
			 
		$curlObj = curl_init();
			 
		curl_setopt($curlObj, CURLOPT_URL, 'https://www.googleapis.com/urlshortener/v1/url?key='.$apiKey);
		curl_setopt($curlObj, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curlObj, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curlObj, CURLOPT_HEADER, 0);
		curl_setopt($curlObj, CURLOPT_HTTPHEADER, array('Content-type:application/json'));
		curl_setopt($curlObj, CURLOPT_POST, 1);
		curl_setopt($curlObj, CURLOPT_POSTFIELDS, $jsonData);
			 
		$reply = curl_exec($curlObj);
			 
		$json = json_decode($reply);
			 
		curl_close($curlObj);
		
		return json_encode($json);

		if(isset($json->error)){
			return $json->error->message;
		}

		$shortURL = $json->id;
		return $shortURL;
	}
}