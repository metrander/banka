<?php
class SimpleImage {

 
   function img_resize($src, $dest, $width, $height,  $quality=100, $rgb=0xFFFFFF, $fon=0)
{
	if (!file_exists($src)) return false;

	$size = getimagesize($src);

	if ($size === false) return false;
	$quality=(int)$quality; // приводим качество к инту, чтобы не было проблем
	$width=(int)$width;     // тоже и с размерами
	$height=(int)$height;

	// если качество меньше 1 или больше 99, тогда ставим его 100
	if($quality<1 OR $quality>99)
	{
		$quality=100;
	}


	// если вдруг не пришла высота или ширина, тогда размеры будем оставлять как размеры самой картинки, без уменьшения
	if(!$width OR !$height)
	{
		$width=$size[0];
		$height=$size[1];
	}

	// если реальная ширина и высота рисунка меньше, чем размеры до которых надо уменьшить,
	// тогда уменьшаемые размеры станут равны реальным размерам, чтобы не произошло увеличение
	if($size[0]<$width AND $size[1]<$height)
	{
		$width=$size[0];
		$height=$size[1];
	}



	// Определяем исходный формат по MIME-информации, предоставленной
	// функцией getimagesize, и выбираем соответствующую формату
	// imagecreatefrom-функцию.
	$format = strtolower(substr($size['mime'], strpos($size['mime'], '/')+1));

	$icfunc = "imagecreatefrom" . $format;

	if (!function_exists($icfunc)) return false;

	$x_ratio = $width / $size[0];
	$y_ratio = $height / $size[1];

	$ratio       = min($x_ratio, $y_ratio);
	$use_x_ratio = ($x_ratio == $ratio);

	$new_width   = $use_x_ratio  ? $width  : floor($size[0] * $ratio);
	$new_height  = !$use_x_ratio ? $height : floor($size[1] * $ratio);
	$new_left    = $use_x_ratio  ? 0 : floor(($width - $new_width) / 2);
	$new_top     = !$use_x_ratio ? 0 : floor(($height - $new_height) / 2);


	$isrc = $icfunc($src);

	if($fon)
	{
		$idest = imagecreatetruecolor($width, $height); // так создается картинка узаканного размера, а все где картинки нет, заполнится фоном. чтобы так создавать картинку, нижнюю строку надо удалить, а с этой снять комментарии
	}
	else
	{
		$new_left    = 0; 
	    $new_top     = 0; 
		$idest = imagecreatetruecolor($new_width, $new_height);
	}

	imagefill($idest, 0, 0, $rgb);
	imagecopyresampled($idest, $isrc, $new_left, $new_top, 0, 0, $new_width, $new_height, $size[0], $size[1]);

	imagejpeg($idest, $dest, $quality);

	imagedestroy($isrc);
	imagedestroy($idest);

	return true;

}
}
?>
