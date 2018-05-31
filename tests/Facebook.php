<?php

use Socola\Facebook\Tool;

/**
 * @Author: Socola
 * @Email: TokenTien@gmail.com
 * @Date:   2018-03-03 20:13:48
 * @Last Modified by:   Socola
 * @Last Modified time: 2018-03-25 15:59:16
 */
	require_once '../vendor/autoload.php';
	use Socola\Facebook;
	use Socola\Facebook\Graph;
	// $fb = new Facebook('EAACW5Fg5N2IBAFXs5ZCk2hZCvIXHt7TRZA1gZBot0C6qom2asrP7mGN2k4wHaTA0ZABqkKV8tX3xRhbocVsuTi5pHWtwOhUZBCyLXAukP7RGfTr0CTdJTrBhZBs9BV9qn858Qhu1XB1ASzj1e68LF83ZBZCda2z6vJedDbihJKpRuS75r9Y10vRLLjcDV0BFnKZA8ZD');
	$infos = [
		'xghenwl_fergieescu_1521967280@tfbnw.net|usos2xe1egg',
	];
	// foreach ($infos as $key => $info) {
	// 	[$email, $password] = explode('|', $info);
	// 	$accessToken = Facebook::getToken($email, $password, 'android')->access_token;
	// 	print_r($accessToken);
	// 	echo('<br>');
	// }
	$fb = new Facebook('EAAAAUaZA8jlABANnxrUrBAciaJPpg9ZCTiyyLoUw3ZCB0XLm6MBZB7kgWEzGFEH46AD5WEYMZAe6TeCyldNskcQdROBZAOrg5o7x2vkBUriZAt2USDhVbSfJZBZCfnVhaEXU6Nym3ArYAd76PorJNQg1hcze2kjOi80N3QUKVffii3IkOIfn2NcYQzvXM62DDAsAZD');
	$res = $fb->reaction('100004399725901_968352189988096', 'LIKE');
	echo '<pre>';
	print_r($res);
	// $res = $fb->graph('364997627165697', [
	// 	'fields' => 'members.limits(1000)'
	// ]);
	// print_r($res);