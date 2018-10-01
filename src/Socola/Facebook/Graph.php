<?php

namespace Socola\Facebook;

use Socola\Curl;

class Graph
{
	protected $access_token;

	protected $params = [];

	protected $endPoint = 'https://graph.facebook.com/';

	function __construct($access_token, $endPoint = null, $params = [])
	{
		$this->params = array_merge($this->params, $params);
		$this->setAccessToken($access_token);
		$this->access_token = $endPoint ?: $this->endPoint;
	}

	protected function appendToEndPoint($s)
    {
        $clone = clone $this;
        $clone->preAppend = trim($s, '/');
        $clone->endPoint .= $clone->preAppend . "/";
        return $clone;
    }

    protected function appendToParams($params)
    {
        $clone = clone $this;
        $clone->params = array_merge($clone->params, $params);
        return $clone;
    }

	public function setAccessToken($access_token)
	{
		$this->access_token = $access_token;
	}

	public function api($endPoint, $params)
	{
		if(empty($params)){
			return Curl::to($endPoint)->get();
		}
		return Curl::to($endPoint)->withData($params);
	}

	public function delele() {
		return $this->appendToParams(['method' => 'delete'])
        	->api($this->endPoint, $this->params);
    }

    public function get($value='')
    {
    	return $this->appendToParams(['method' => 'get'])
        	->api($this->endPoint, $this->params);
    }

    public function post()
    {
    	return $this->appendToParams(['method' => 'post'])
        	->api($this->endPoint, $this->params);
    }
}