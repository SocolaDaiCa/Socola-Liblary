<?php

/**
 * @Author: Socola
 * @Email: TokenTien@gmail.com
 * @Date:   2018-02-18 09:54:38
 * @Last Modified by:   Socola
 * @Last Modified time: 2018-02-19 21:33:49
 */
namespace Socola;

class ShutterStock
{
	public static $accessToken;
	public static function setAccessToken($accessToken)
	{
		self::$accessToken = $accessToken;
	}
	public static function getLink($url)
	{
		$origin = $url;
		$pattern ='/https?:\/\/(www\.)?shutterstock\.com\/([a-z]{2}\/)?image-(photo|vector|illustration)\/[a-zA-Z0-9-]+-([0-9]+)/';
		$regex = preg_match($pattern, $origin, $matches);
		$token = self::$accessToken;
		// return $token; /v2.8
		$url = "https://graph.facebook.com/ssimg_".$matches[4]."?fields=preview_url&access_token=".$token;
		// return $url;
		$json = file_get_contents($url);
		return $json;
		// $json = json_decode ($json,true);
		// $url = $json['preview_url'];
		// $urlArr = explode('&url=', $url);
		// $url = $urlArr[1];
		// $url = urldecode($url);
		// return $url;
	}
}

/*
$origin = 'link shutter stock';
	$token = 'bỏ token vào đây';
	$pattern ='/https?:\/\/(www\.)?shutterstock\.com\/([a-z]{2}\/)?image-(photo|vector|illustration)\/[a-zA-Z0-9-]+-([0-9]+)/';
	$regex = preg_match($pattern, $origin, $matches);
	$url = "https://graph.facebook.com/v2.8/ssimg_".$matches[4]."?fields=preview_url&access_token=".$token;
	$json = file_get_contents($url);
	$json = json_decode ($json,true);
	$url = $json['preview_url'];
	$urlArr = explode('&url=', $url);
	$url = $urlArr[1];
 */