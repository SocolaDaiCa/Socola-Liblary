<?php

/**
 * @Author: Socola
 * @Email: TokenTien@gmail.com
 * @Date:   2018-03-03 20:22:18
 * @Last Modified by:   Socola
 * @Last Modified time: 2018-03-05 10:16:30
 */
	namespace Socola\Facebook;

	trait Tool
	{
		public function getTag($useID, $userName)
		{
			return "@[{$useID}:{$userName}]";
		}
		// public function getPostsSince($since)
		// {
		// 	return 
		// }
	}