<?php

namespace Socola;

use Socola\Facebook\Graph;

class Facebook extends Graph
{
	/* user */
	public function me()
	{
		return $this->user('me');
	}

	public function user($userId)
	{
		return new User($userId, $this->access_token);
	}
	/* group */
	public function group($groupId)
	{
		return new Group($groupId, $access_token);
	}
	/* post */
	/* comment */
}