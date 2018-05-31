/*
 * @Author: Socola
 * @Date:   2018-02-20 13:35:04
 * @Last Modified by:   Socola
 * @Last Modified time: 2018-03-21 06:57:53
 */
'use strict';
(function($) {
	$(function() {
		var tests;
		/* coutn */
		tests = [
			'a:not([href])',
			'a[href="#"]',
			'a[href=""]',
			'a[href*="javascript:void(0)"]',
			'img:not([alt])',
			'img[alt=""]',
		];
		tests.forEach((test) => {
			var count = $(test).length;
			count && console.log(`${test}: ${count}`);
		});
		/* Lỗi thừa thiếu */
		console.log('Lỗi:');
		tests = [
			'meta[charset]:not([charset="UTF-8"])',
			'meta[charset="UTF-8"]:not(:first-child)',
			'*[style]',
			'html:not([lang])',
			'html[lang=""]',
		];
		tests.forEach((test) => {
			var check = $(test).length;
			check && console.log(test);
		});
	});
})($);