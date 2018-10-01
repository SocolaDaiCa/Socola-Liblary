<?php

namespace Socola\Google\Drive;

/**
 * 
 */
class File
{
	protected $url;
	function __construct($url)
	{
		$this->url = $url;
	}
}