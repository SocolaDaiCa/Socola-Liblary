<?php
/**
 * @Author: Socola
 * @Email: TokenTien@gmail.com
 * @Date:   2018-02-17 13:06:47
 * @Last Modified by:   Socola
 * @Last Modified time: 2018-02-18 09:53:20
 */
	require_once 'include.php';
	use Socola\EverFilter;
	$imageURL = 'https://scontent.fhan5-4.fna.fbcdn.net/v/t1.0-9/28056200_1903964522978605_958109210556836209_n.jpg?oh=800980ff59d358e8b436df79fef0744c&oe=5B1D6F95';

	$image = EverFilter::createImage($imageURL);
	$imageName = EverFilter::getNameFromURL($imageURL);
	EverFilter::saveImage($image, $imageName);
	echo "<img src=\"{$imageName}\">";
?>