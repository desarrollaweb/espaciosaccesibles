<?php
extract($_REQUEST);
$ext=substr(strtolower($imagen),-3);
switch ($ext){
	default:
		$im= imagecreatefromjpeg($imagen);	
	break;
	case "gif":
		$im= imagecreatefromgif($imagen);	
	break;
	case "bmp":
		$im= imagecreatefromwbmp($imagen);	
	break;
	case "png":
		$im= imagecreatefrompng($imagen);	
	break;
}
$width = imagesx($im);
$height = imagesy($im);
if (!$imgw){
	//$imgw = 270;
	if ($width>485){
		$imgw=485;
	}
	else {
		$imgw=$width;
	}
}
$imgh = $height / $width * $imgw;
$thumb=imagecreatetruecolor($imgw,$imgh);
$back = imagecolorallocate($thumb, 255, 255, 255);
imagefill ( $thumb, 0, 0, $back );
imagecopyresampled($thumb,$im,0,0,0,0,$imgw,$imgh,imagesx($im),imagesy($im));
$out = imagejpeg($thumb,NULL,90);
imagedestroy ($im);
imagedestroy ($thumb);
?>