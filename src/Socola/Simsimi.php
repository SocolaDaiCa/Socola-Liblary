<?php

/**
 * @Author: Socola
 * @Email: TokenTien@gmail.com
 * @Date:   2018-03-23 07:58:25
 * @Last Modified by:   Socola
 * @Last Modified time: 2018-03-23 08:03:27
 */

namespace Socola;

class Simsimi
{
	protected static $languageCode = "vi";
	protected static $key = "61251b4b-91da-42d5-b934-6e57d0e57c27";
	protected static $ft = 1;

	public static function send($text)
	{
		$endPoint = 'http://sandbox.api.simsimi.com/request.p';
		$param = [
			"key"  => self::$key,
			"text" => $text,
			"lc"   => self::$languageCode,
			"ft"   => self::$ft,
		];
		$res = Curl::getJSON($url, $param);
		return $res->response ?? 'error';
	}
}