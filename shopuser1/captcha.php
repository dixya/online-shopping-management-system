<?php
session_start();
$code=rand(1000,9999);
$_SESSION["code"]=$code;
$im = imagecreatetruecolor(50, 24);
$bg = imagecolorallocate($im, 22, 86, 165);
$fg = imagecolorallocate($im, 255, 255, 255);
imagefill($im, 0, 0, $bg);
imagestring($im, 5, 5, 5,  $code, $fg);
header("Cache-Control: no-cache, must-revalidate");
header('Content-type: image/png');
imagepng($im);
imagedestroy($im);
?>