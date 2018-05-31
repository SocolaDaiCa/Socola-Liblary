/*
 * @Author: Socola
 * @Date:   2018-02-20 13:31:28
 * @Last Modified by:   Socola
 * @Last Modified time: 2018-02-20 13:33:46
 */
'use strict';
(function($) {
	$(function() {
		$('*[include]').each(function() {
			let url = $(this).attr('include');
			$.get(url, (res) => $(this).replaceWith(res));
		});
	});
})($);