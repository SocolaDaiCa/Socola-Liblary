<?php

/**
 * @Author: Socola
 * @Email: TokenTien@gmail.com
 * @Date:   2018-03-02 20:48:03
 * @Last Modified by:   Socola
 * @Last Modified time: 2018-03-07 06:57:09
 */
	if(file_exists('../vendor/autoload.php')){
		require_once '../vendor/autoload.php';
	}
	function curl($url) {
		$ch = @curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		$head[] = "Connection: keep-alive";
		$head[] = "Keep-Alive: 300";
		$head[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
		$head[] = "Accept-Language: en-us,en;q=0.5";
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.124 Safari/537.36');
		curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_TIMEOUT, 60);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
		$page = curl_exec($ch);
		curl_close($ch);
		return $page;
	}
	function getPhotoGoogle($link){
	    $get = curl($link);
	    $data = explode('url\u003d', $get);
	    $url = explode('%3Dm', $data[1]);
	    $decode = urldecode($url[0]);
	    $count = count($data);
	    $linkDownload = array();
	    if($count > 4) {
	        $v1080p = $decode.'=m37';
	        $v720p = $decode.'=m22';
	        $v360p = $decode.'=m18';
	        $linkDownload['1080p'] = $v1080p;
	        $linkDownload['720p'] = $v720p;
	        $linkDownload['360p'] = $v360p;
	    }
	    if($count > 3) {
	        $v720p = $decode.'=m22';
	        $v360p = $decode.'=m18';
	        $linkDownload['720p'] = $v720p;
	        $linkDownload['360p'] = $v360p;
	    }
	    if($count > 2) {
	        $v360p = $decode.'=m18';
	        $linkDownload['360p'] = $v360p;
	    }
	    return $linkDownload;
	}
	$link = 'https://photos.google.com/share/AF1QipPrBw3xU4VIQ4n9QXquOgDSsguBLunk0qyHtJlVzHv23tNxjc5k4UaSOQE9jUm4sg/photo/AF1QipPc63aphQG9F8c0e9Xf74uo-jjukQamJJQtgiaX?key=NUlTLUpIXzZIdnJpcXE2SEZ1Q3c5cmJ4V3dUVVJB';
	// $link = 'https://photos.google.com/share/AF1QipNyYyBWbThLYpt6Pjqw5Y84UvDJL8QTSO9aCPW3nEOS7cXJEFJHpXELOZpb8VpdtA/photo/AF1QipNbBQXg9A60xLs1cLoivK1LIoQbtwJvzoRuI6Ar?key=Rmg0aE1BNkFsb0Z1VG9pUDVOYlRHT3JOb0xRejlR';
	// $link = 'https://drive.google.com/file/d/1d5hSU3wpkkNysTYUbbHtpT1qBXTio0z5/preview';
	$test = getPhotoGoogle($link);
	echo json_encode($test);












	// $fb = new Facebook;
	// $accessToken = 'EAACW5Fg5N2IBACRJYtiq0grVBYS5pEzSb1SNeGEgWXBffmYxedspm8xcMCfLfgTU1amwnJtdAHfZB048R9uNZAwI6mZBQImjcyYwZBw0vwe3Gdq7Y0oZCSBxhf0nIcZC0Y7be82uVXZAnpvITeYccB8xxeg6KZCA6N9B8AcrM3gmTj6BZBCBZCCaGztqrNHSRIZBcAZD';
	// $fb->setAccessToken($accessToken);
	// $postID = '343451319385093_490763481320542';
	// $postID = '588230074568220_1676773289047221';
	// $postID = '364997627165697_531822793816512';
	// $res = $fb->graph($postID, ['fields' => 'comments.limits(1000){from{email}}']);
	// echo "có ".sizeof($res)." cmt <br>";
	// foreach ($res as $key => $value) {
	// 	if(!empty($value->from->email)){
	// 		echo $value->from->email . '<br>';
	// 	}
	// }
	// // echo json_encode($res);

	
	// // $url = 'EAACW5Fg5N2IBACRJYtiq0grVBYS5pEzSb1SNeGEgWXBffmYxedspm8xcMCfLfgTU1amwnJtdAHfZB048R9uNZAwI6mZBQImjcyYwZBw0vwe3Gdq7Y0oZCSBxhf0nIcZC0Y7be82uVXZAnpvITeYccB8xxeg6KZCA6N9B8AcrM3gmTj6BZBCBZCCaGztqrNHSRIZBcAZD';

	// // // $res = Curl::getJSON($url);
	// // $fb = new Facebook();
	// // $fb->setAccessToken($accessToken);
	// // $res = $fb->graph($postID, ['fields' => 'comment']);
	// // echo(json_encode($res));



