<?php

/**
 * @Author: Socola
 * @Email: TokenTien@gmail.com
 * @Date:   2018-02-13 20:08:41
 * @Last Modified by:   Socola
 * @Last Modified time: 2018-05-14 18:03:48
 */
namespace Socola\Facebook;

use Socola\Curl;
use Socola\Facebook\Tool;
trait Graph
{
	/**
	 * []
	 * @param  [String] $clientID [description]
	 * @return [type]           [description]
	 */
	public function getAccessTokenInfo($clientID)
	{
		$endpoint = "https://graph.facebook.com/oauth/access_token_info?client_id={$clientID}&access_token={$this->accessToken}";
	}
	/**
	 * [getPermissions description]
	 * @return [type] [description]
	 */
	public function getPermissions()
	{
		$endpoint = "https://graph.facebook.com/me/permissions?access_token={$this->accessToken}";
		return Curl::getJSON($endpoint);
	}
	/**
	 * [getAvatar description]
	 * @param  [type] $userID [description]
	 * @return [type]         [description]
	 */
	
	/**
	 * [ripAccessToken description]
	 * @param  [type] $accessToken [description]
	 * @return [type]              [description]
	 */
	
	
	/**
	 * [sendMessage description]
	 * @param  [type] $userID  [description]
	 * @param  [type] $message [description]
	 * @return [type]          [description]
	 */
	
	/* Post */
	
	
	
	
	
	
	/* Group */
	
	
	/* page */
	
	

}
// public function isDefaultAvatar($userID)
	// {
	// 	$endpoint = "Check avatar defalt https://graph.facebook.com/<USER_ID>/picture?redirect=false s_silhouette == TRUE thì đó là avatar mặc định Kiểm tra";
	// 	return Curl::getJSON($endpoint);
	// }
?>
