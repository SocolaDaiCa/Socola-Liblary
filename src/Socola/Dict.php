<?php

/**
 * @Author: Socola
 * @Email: TokenTien@gmail.com
 * @Date:   2018-02-16 07:37:40
 * @Last Modified by:   Socola
 * @Last Modified time: 2018-02-16 11:40:31
 */
namespace Socola;

use Socola\Curl;

class Dict
{
	public static $from = '1997';
	public static $to   = '';
	public static $langs = [
        'af' => 'Afrikaans',
        'ga' => 'Ireland',
        'sq' => 'Albania',
        'it' => 'Italia',
        'ar' => 'Ả Rập',
        'ja' => 'Nhật',
        'az' => 'Azerbaijan',
        'kn' => 'Kannada',
        'eu' => 'Basque',
        'ko' => 'Hàn',
        'bn' => 'Bengal',
        'la' => 'Latinh',
        'be' => 'Belarus',
        'lv' => 'Latvia',
        'bg' => 'Bulgaria',
        'lt' => 'Litva',
        'ca' => 'Catalan',
        'mk' => 'Macedonia',
        'zh-CN' => 'Hán giản thể',
        'ms' => 'Malaysia',
        'zh-TW' => 'Hán phồn thể',
        'mt' => 'Maltese',
        'hr' => 'Croatia',
        'no' => 'Norwegian',
        'cs' => 'Séc',
        'fa' => 'Iran',
        'da' => 'Đan Mạch',
        'pl' => 'Ba Lan',
        'nl' => 'Hà Lan',
        'pt' => 'Portuguese',
        'en' => 'Anh',
        'ro' => 'Romani',
        'eo' => 'Esperanto',
        'ru' => 'Nga',
        'et' => 'Estonia',
        'sr' => 'Serbian',
        'tl' => 'Filipino',
        'sk' => 'Slovakia',
        'fi' => 'Phần Lan',
        'sl' => 'Slovenia',
        'fr' => 'Pháp',
        'es' => 'Tây Ban Nha',
        'gl' => 'Galicia',
        'sw' => 'Swahili',
        'ka' => 'Georgian',
        'sv' => 'Thụy Điển',
        'de' => 'Đức',
        'ta' => 'Tamil',
        'el' => 'Hy Lạp',
        'te' => 'Telugu',
        'gu' => 'Gujarati',
        'th' => 'Thái',
        'ht' => 'Haitian Creole',
        'tr' => 'Thổ Nhĩ Kỳ',
        'iw' => 'Hebrew',
        'uk' => 'Ukraina',
        'hi' => 'Hindi',
        'ur' => 'Urdu',
        'hu' => 'Hungary',
        'vi' => 'Việt',
        'is' => 'Iceland',
        'cy' => 'Welsh',
        'id' => 'Indonesia',
        'yi' => 'Yiddish',
	];
	function __construct()
	{

	}
	public static function setConfigs($from, $to)
	{
		self::$from = $from ?? self::$from;
		self::$to   = $to ?? self::$to;
	}
	public static function translate($text = null, $from = null, $to = null)
	{
		if(empty($text)){
			return 'Dict Error: Empty Text.';
		}

		self::setConfigs($from, $to);
		$text = urlencode($text);
		$from = self::$from;
		$to = self::$to;

		if(!array_key_exists($from, self::$langs)){
			return "Invalid Language: {$from}";
		}
		if(!array_key_exists($to, self::$langs)){
			return "Invalid Language: {$to}";
		}

		$endPoint = "https://translate.googleapis.com/translate_a/single?client=gtx&sl={$from}&tl={$to}&dt=t&q={$text}";
		$json = Curl::getJSON($endPoint);
		$res = "";
		foreach ($json[0] as $key => $value) {
			$res .= $value[0];
		}
		return $res;
	}
}