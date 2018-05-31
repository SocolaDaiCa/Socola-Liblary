<?php

/**
 * @Author: Socola
 * @Email: TokenTien@gmail.com
 * @Date:   2018-03-05 11:04:03
 * @Last Modified by:   Socola
 * @Last Modified time: 2018-03-05 11:08:57
 */
	namespace Socola\Google;

	class Dict
	{
		public static function textToSpeech($text, $lang = 'vi')
		{
			$text = urlencode($text);
			return "http://translate.google.com/translate_tts?ie=UTF-8&total=1&idx=0&textlen=text.length&tl={$lang}&client=tw-ob&q={$text}";
		}
	}