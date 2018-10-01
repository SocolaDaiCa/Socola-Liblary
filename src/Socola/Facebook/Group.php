<?php

namespace Socola\Facebook;

use Socola\Facebook\Grahp;

class Group extends Graph
{
	function __construct($groupId, $access_token, $endPoint = null, $params = [])
	{
		parent::__construct($access_token, $endPoint, $params);
		$this->endPoint .= "${groupId}/";
	}

	public function members()
	{
		return $this->appendToEndPoint('members');
	}
}