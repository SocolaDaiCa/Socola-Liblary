<?php
require '../vendor/autoload.php';
use Socola\Google\Drive;


// $linkDownload = Drive::video($urlFile)->linkDownload();

// echo $linkDownload;
// 
function get_curl($obj){
	$link = isset($obj['url'])?$obj['url']:NULL;
	$useheader = isset($obj['showHeader'])?$obj['showHeader']:NULL;
	$useragent = isset($obj['agent'])?$obj['agent']:NULL;
	$referer = isset($obj['referer'])?$obj['referer']:NULL;
	$custheader = isset($obj['requestHeaders'])?$obj['requestHeaders']:NULL;
	$ucookie = isset($obj['cookie'])?$obj['cookie']:NULL;
	$encoding = isset($obj['encoding'])?$obj['encoding']:NULL;
	$mpostfield = isset($obj['data'])?$obj['data']:NULL;
	$sslverify = isset($obj['sslverify'])?$obj['sslverify']:NULL;
	$nobody = isset($obj['nobody'])?$obj['nobody']:NULL;
	//$ipv6 = isset($obj['ipv6'])?$obj['ipv6']:NULL;
	$method = isset($obj['method'])?$obj['method']:NULL;
	$usehttpheader = true;
	$mpost = false;
	if($method=="POST"){
		$mpost = true;
	}
	if(!$useragent || $useragent==""){
		$useragent = $_SERVER['HTTP_USER_AGENT'];
	}
	if($mpostfield){
		$arrd = array();
		foreach($mpostfield as $key => $value){
			$arrd[] = $key."=".$value;
		}
		$mpostfield = implode("&",$arrd);
	}
		
	$curl = curl_init();
	$header[0] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8";
	$header[] = "Accept-Language: en-us,en;q=0.5";
	$header[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
	$header[] = "Keep-Alive: 115";
	$header[] = "Connection: keep-alive";
	if($custheader){
		foreach($custheader as $key => $value){
			$header[] = $key.": ".$value;
		}
	}
		
	curl_setopt($curl, CURLOPT_URL, $link);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	if($useheader){curl_setopt($curl, CURLOPT_HEADER, 1);}
	if($useragent!=""){curl_setopt($curl, CURLOPT_USERAGENT, $useragent);}
	if($usehttpheader){curl_setopt($curl, CURLOPT_HTTPHEADER, $header);}
	if($ucookie!=""){curl_setopt($curl, CURLOPT_COOKIE, str_replace('\\"','"',$ucookie));}
	if($referer!=""){curl_setopt($curl, CURLOPT_REFERER, $referer);}
	if($encoding!=""){curl_setopt($curl, CURLOPT_ENCODING, $encoding);}
	if($mpost){curl_setopt($curl, CURLOPT_POST, 1);}
	if($mpostfield!=""){curl_setopt($curl, CURLOPT_POSTFIELDS, $mpostfield);}
	if($nobody){curl_setopt($curl, CURLOPT_NOBODY, 1);}
	//if($ipv6){curl_setopt($curl, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V6);}
	if($sslverify){
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); 
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
	}
	$result = curl_exec($curl);
	curl_close($curl);
	return $result;
}
function get_drive_download($link){
	$idd = explode("/file/d/",$link)[1];
	$idd = explode("/",$idd)[0];
	$linkG = "https://docs.google.com/uc?export=download&confirm=no_antivirus&id=".$idd;
	$dta = get_curl([
		'url'        => $linkG,
		'sslverify'  => true,
		'showHeader' => true
	]);
	$ck = NULL;
	$confirm = NULL;
	
	$ckc = explode("download_warning_",$dta)[1];
	if(!isset($ckc)){
		throw new Exception();
	}
	$ckc = explode(";",$ckc)[0];
	$ck = "download_warning_".$ckc;
	$confirm = explode("=",$ck);
	$confirm = $confirm[1];
	$fileExt = explode('class="uc-name-size"',$dta)[1];
	$fileExt = explode('href="',$fileExt)[1];
	$fileExt = explode('>',$fileExt)[1];
	$fileExt = explode('<',$fileExt)[0];

	$linkG = str_replace("&confirm=no_antivirus&","&confirm=".$confirm."&",$linkG);
	$dta = get_curl(array("url"=>$linkG,"sslverify"=>true,"showHeader"=>true,"cookie"=>$ck));
	if(strpos($dta,'ocation:')!==false){
		$linkD = explode("Location: ",$dta);
		$linkD = explode("e=download",$linkD[1]);
		$linkD = $linkD[0].'e=download';
	}else{
		$linkD = 'Không tìm thấy link, có thể link đã bị limit hoặc del.';
	}
	return $linkD;
}
$id = '0BzmV1lSE7kQdY2lQYXNqZGMxNlU';
$urlFile = "https://drive.google.com/file/d/{$id}/view";
$linkDownload = get_drive_download($urlFile);
echo $linkDownload;