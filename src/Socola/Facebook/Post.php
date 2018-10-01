<?php

namespace Socola\Facebook;

use Socola\Facebook\Graph;

class Post extends Graph
{
	function __construct($postId, $access_token, $endPoint = null, $params = [])
	{
		parent::__construct($access_token, $endPoint, $params);
		$this->endPoint .= '{$postId}/';
	}
	/* comments */
	public function comments()
	{
		return $this->appendToEndPoint('comments');
	}
	/* reactions */
	public function reactions()
	{
		return $this->appendToEndPoint('reactions');
	}

	public function share($message = '')
	{
		return $this->appendToParams([
			'message' => $message,
		])->appendToEndPoint([
			'sharedposts'
		]);
	}
}