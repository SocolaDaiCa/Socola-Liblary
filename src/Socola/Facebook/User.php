<?php

namespace Socola\Facebook;

use Socola\Facebook\Graph;

class User extends Graph
{
	function __construct($userId, $access_token, $endPoint = null, $params = [])
	{
		parent::__construct($access_token, $endPoint, $params);
		$this->endPoint .= "{$userId}/";
	}

	public function friends()
	{
		return $this->appendToEndPoint('friends');
	}
}