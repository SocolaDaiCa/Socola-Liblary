<?php

/**
 * @Author: Socola
 * @Email: TokenTien@gmail.com
 * @Date:   2018-02-18 09:58:09
 * @Last Modified by:   Socola
 * @Last Modified time: 2018-02-18 17:59:28
 */
	require_once 'include.php';
	use Socola\ShutterStock;
	// EAAAAUaZA8jlABAI5ET56lQtA2VXm8zbQqHFUY53Wk4zu5lY83fL9jTLm7TL0yCAXYu5D2YuRuJ5dI1nXguHy06dQZAjc4SIENcBOL9rR1xJ3EGY39nMNb5TcLvLYBznhyrnWx5CvZC6BBm3OSqiejVZB1TRTErJazCuqseJA9bDrSJnDbSNs
	$accessToken = 'EAABsbCS1iHgBAEPQaSGE7erBak3cZCIzv8VbrOuSOSGvMKlMY6QspynrsvMPm6hx9Rkqcaa8VfL1BqwTTyq76efBaHC6SpFmg58CxQiLgGnbznSaHy3kT5M6ZBcpqDIGVwTvPXD51jtOhuT3rZAa3f9JfFFsMncpAeUR5HhOBfZBDZCcR8z1nZAZC5dVEipt0V3yLwgmjjFeIGt2zLianMX';
	ShutterStock::setAccessToken($accessToken);

	$url = 'https://www.shutterstock.com/image-vector/year-dog-2018-new-celebration-happy-695884264';
	echo ShutterStock::getLink($url);