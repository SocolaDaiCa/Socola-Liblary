<?php

/**
 * @Author: Socola
 * @Email: TokenTien@gmail.com
 * @Date:   2018-02-19 21:25:45
 * @Last Modified by:   Socola
 * @Last Modified time: 2018-04-15 07:38:42
 */
namespace Socola\Google;

use Socola\Google\Drive\File;
use Socola\Google\Drive\Folder;
use Socola\Google\Drive\Video;

class Drive
{
	public static function video($url)
	{
		return new Video($url);
	}

	public static function folder($url)
	{
		return new Folder($url);
	}

	public static function file($url)
	{
		return new File($url);
	}
}