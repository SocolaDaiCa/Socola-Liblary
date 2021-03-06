<?php

/**
 * @Author: Socola
 * @Email: TokenTien@gmail.com
 * @Date:   2018-01-08 08:55:41
 * @Last Modified by:   Socola
 * @Last Modified time: 2018-03-13 09:47:20
 */
namespace Socola;

use Socola\Curl;
use Socola\Str;

class Weather
{
	public static $dict = [
		'Mon' => 'Thứ hai',
		'Tue' => 'Thứ ba',
		'Wed' => 'Thứ tư',
		'Thu' => 'Thứ năm',
		'Fri' => 'Thứ sáu',
		'Sat' => 'Thứ bảy',
		'Sun' => 'Chủ nhật',
	];
	/**
	 * [setTimeZone description]
	 * @param [type] $timezone [description]
	 */
	public static function setTimeZone($timezone = null)
	{
		date_default_timezone_set($timezone ?? 'Asia/Ho_Chi_Minh');
	}
	/**
	 * [Lấy dự báo thời tiết của thành phố bạn muốn trong 7 ngày]
	 * @param  [type] $city [Thành phố cần lấy dự báo thờ tiết]
	 * @return [json]       [Dự báo trong 7 ngày]
	 */
	public static function get($city)
	{
		error_reporting(1);
		$city = Str::UnicodeToAscii($city);
		$endPoint = "http://query.yahooapis.com/v1/public/yql";
		$query = "select * from weather.forecast where woeid in (select woeid from geo.places(1) where text='{$city}') and u='c'";
		$endPoint .= '?' . http_build_query([
			'q'      => $query,
			'format' => 'json'
		]);
		$res = Curl::getJSON($endPoint);
		$res->query->results->channel->item->description = "";

		return $res;
	}
}


// $tinh = "Hà Nội";
// Wearther::get($tinh);
// class weatherfc{
// 	public $result;
// 	function weather($city){
// 		$yql_query_url = $BASE_URL . "?=" . urlencode($yql_query) . "&";
// 		$session = curl_init($yql_query_url);
// 		curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
// 		$json = curl_exec($session);
// 		$phpObj =  json_decode($json);
// 		//var_dump($phpObj);
// 		$weatherd='{ "text": "Thời tiết tại  '.$city.'"},';
// 		$fcast=$phpObj->query->results->channel->item->forecast;
// 		$t = count($fcast);
// 		for($i=0; $i <5 ; $i++)
// 		{
// 			$fdate = strtotime($fcast[$i]->date);
// 			$weekday = $fcast[$i]->day;
// 			switch($weekday) {
// 				case 'Mon':
// 					$weekday = 'Thứ hai';
// 					break;
// 				case 'Tue':
// 					$weekday = 'Thứ ba';
// 					break;
// 				case 'Wed':
// 					$weekday = 'Thứ tư';
// 					break;
// 				case 'Thu':
// 					$weekday = 'Thứ năm';
// 					break;
// 				case 'Fri':
// 					$weekday = 'Thứ sáu';
// 					break;
// 				case 'Sat':
// 					$weekday = 'Thứ bảy';
// 					break;
// 				default:
// 					$weekday = 'Chủ nhật';
// 					break;
// 			}
// 			$weatherd.= '{"text":"'.$weekday.' '.date('d/m/Y',$fdate).'\n'.$fcast[$i]->text.'\n';
// 			$weatherd.= ' Nhiệt độ: '.$fcast[$i]->low.' - '.$fcast[$i]->high.' độ C "},';
			
// 		}
// 		$this->result=$weatherd;
// 	}
// 	function get_ascii($str) {
// 		$chars = array(
// 			'a'	=>	array('ấ','ầ','ẩ','ẫ','ậ','Ấ','Ầ','Ẩ','Ẫ','Ậ','ắ','ằ','ẳ','ẵ','ặ','Ắ','Ằ','Ẳ','Ẵ','Ặ','á','à','ả','ã','ạ','â','ă','Á','À','Ả','Ã','Ạ','Â','Ă'),
// 			'e' =>	array('ế','ề','ể','ễ','ệ','Ế','Ề','Ể','Ễ','Ệ','é','è','ẻ','ẽ','ẹ','ê','É','È','Ẻ','Ẽ','Ẹ','Ê'),
// 			'i'	=>	array('í','ì','ỉ','ĩ','ị','Í','Ì','Ỉ','Ĩ','Ị'),
// 			'o'	=>	array('ố','ồ','ổ','ỗ','ộ','Ố','Ồ','Ổ','Ô','Ộ','ớ','ờ','ở','ỡ','ợ','Ớ','Ờ','Ở','Ỡ','Ợ','ó','ò','ỏ','õ','ọ','ô','ơ','Ó','Ò','Ỏ','Õ','Ọ','Ô','Ơ'),
// 			'u'	=>	array('ứ','ừ','ử','ữ','ự','Ứ','Ừ','Ử','Ữ','Ự','ú','ù','ủ','ũ','ụ','ư','Ú','Ù','Ủ','Ũ','Ụ','Ư'),
// 			'y'	=>	array('ý','ỳ','ỷ','ỹ','ỵ','Ý','Ỳ','Ỷ','Ỹ','Ỵ'),
// 			'd'	=>	array('đ','Đ'),
// 			'b'	=>	array('B'),	
// 			'u'	=>	array('U'),
// 			'n'	=>	array('N'),	
// 		);
// 		foreach ($chars as $key => $arr) 
// 			foreach ($arr as $val)
// 				$str = str_replace($val,$key,$str);
// 		return $str;
// 	}

// }
// if(isset($tinh))
// {

// 	$h= new weatherfc;
// 	$h->weather($tinh);
// 	$d =  '{"messages": ['.$h->result.']}';
// 	$d = str_replace(",]}","]}",$d);
// 	$d = str_replace("Partly Cloudy","Trời có mây nhẹ",$d);
// 	$d = str_replace("Mostly Cloudy","Trời nhiều mây",$d);
// 	$d = str_replace("Cloudy","Mây rải rác vài nơi",$d);
// 	$d = str_replace("Scattered Thunderstorms","Mưa giông rải rác vài nơi",$d);
// 	$d = str_replace("Scattered Showers","Mưa rào nhẹ rải rác",$d);
// 	$d = str_replace("Showers","Mây rải rác vài nơi",$d);
// 	$d = str_replace("Rain","Mưa rào",$d);
// 	$d = str_replace("Mostly sunny","Trời nắng",$d);
// 	$d = str_replace("Sunny","Trời nắng to",$d);
// 	$d = str_replace("Breezy","Gió nhẹ",$d);
// 	$d = str_replace("Thunderstorms","Mưa giông",$d);
// 	//$d = str_replace("Cloudy","Mây rải rác vài nơi",$d);
// 	echo $d;
// }
	

?>


