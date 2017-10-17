<?php

/*

Captcha generator

This file generates a captcha image.
Credits to http://php.webmaster-kit.com/ for the original code.

*/

require_once("../../config.php");

//error_reporting(E_STRICT);

if(extension_loaded('gd') AND function_exists('imageCreateFromJpeg') AND isset($_SESSION['captcha'])) {

	$image = imagecreate(120, 30);

	$white = imagecolorallocatealpha($image, 0xFF, 0xFF, 0xFF, 100);
	$gray = imagecolorallocate($image, 0xC0, 0xC0, 0xC0);
	$darkgray = imagecolorallocate($image, 0x50, 0x50, 0x50);

	srand((double)microtime()*1000000);

	for($i = 0; $i < 30; $i++) {
		$x1 = rand(0,120);
		$y1 = rand(0,30);
		$x2 = rand(0,120);
		$y2 = rand(0,30);
		imageline($image, $x1, $y1, $x2, $y2 , $gray);
	}

	$x = 0;
	for($i = 0; $i < 5; $i++) {
		$fnt = rand(3,5);
		$x = $x + rand(12 , 20);
		$y = rand(7 , 12);
		imagestring($image, $fnt, $x, $y, substr($_SESSION['captcha'], $i, 1), $darkgray);
	}

	// start buffering for size determination
	ob_start();
	// add no cache headers
	header("Expires: Mon, 1 Jan 1990 05:00:00 GMT");
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
	header("Cache-Control: no-store, no-cache, must-revalidate");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
	header("Content-type: image/png");
	// Make image
	imagepng($image);
	// Fetch length
	header("Content-Length: " . ob_get_length());
	// send image and turn off buffering
	ob_end_flush();
	// clear memory
	imagedestroy($image);

}

?>