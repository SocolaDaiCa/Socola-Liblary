<?php

/**
 * @Author: Socola
 * @Email: TokenTien@gmail.com
 * @Date:   2018-03-17 20:38:59
 * @Last Modified by:   Socola
 * @Last Modified time: 2018-03-17 20:39:35
 */
class BMI
{
	public static function calculate($weight, $height)
	{
		$result = $weight / ( pow($height / 100, 2) );
		$result = round($result, 2); /*làm tròn 2 số*/

		if($result < 18.5){
			$msg = 'bạn hơi ốm.';
		} elseif ($result < 23) {
			$msg = 'bạn có thân hình thật cân đối.';
		} elseif ($result < 25) {
			$msg = 'bạn sắp béo phì.';
		} elseif ($result < 30) {
			$msg = 'bạn đang bị béo phì.';
		} else {
			$msg = 'bạn quá béo mất rồi.';
		}
		$text = "BMI = {$result}, $msg";	

		return $text;
	}
}