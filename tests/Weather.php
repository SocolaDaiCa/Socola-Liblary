<?php

/**
 * @Author: Socola
 * @Email: TokenTien@gmail.com
 * @Date:   2018-03-03 07:21:27
 * @Last Modified by:   Socola
 * @Last Modified time: 2018-03-03 07:39:33
 */
	require_once '../vendor/autoload.php';
	use Socola\Weather;
	use Socola\Curl;

	$res = Weather::get('Hà Nội');
	// echo '<pre>';
	// print_r($res);
	echo json_encode($res);
	// $res = Curl::get(Weather::$endPoint);
	// print_r($res);
	// echo('xong <br>');
	// echo Weather::$endPoint;