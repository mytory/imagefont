<?php
// font file path (폰트 파일 경로)
$font_file = 'fonts/nanumbarungothic.ttf';
if( isset($_GET['ff']) AND ! empty($_GET['ff']) AND is_file('fonts/' . $_GET['ff'] . '.ttf')){
	$font_file = 'fonts/' . $_GET['ff'] . '.ttf';
}

$font_size = 10;
if( isset($_GET['s']) AND ! empty($_GET['s']) ){
	$font_size = $_GET['s'];
}

$text = 'Pleas enter text. 텍스트를 넣어 주세요.';
if( isset($_GET['t']) AND ! empty($_GET['t']) ){
	$text = $_GET['t'];
}

$color_code = '000000';
if( isset($_GET['c']) AND ! empty($_GET['c']) ){
	if(strlen($_GET['c']) === 6){
		$color_code = $_GET['c'];
	}
	if(strlen($_GET['c']) === 3){
		$color_code = substr($_GET['c'], 0, 1).substr($_GET['c'], 0, 1) .
			substr($_GET['c'], 1, 1).substr($_GET['c'], 1, 1) .
			substr($_GET['c'], 2, 1).substr($_GET['c'], 2, 1);
	}
}

$image_angle = 0;

// create bounding box for text (글자 들어갈 박스 크기 계산)
$bbox = imagettfbbox($font_size, $image_angle, $font_file, $text);

$upper_left_x = $bbox[0]; // -1
$upper_left_y = $bbox[1]; // -1
$upper_right_x = $bbox[2]; // 31
$upper_right_y = $bbox[3]; // -1
$lower_right_x = $bbox[4]; // 31
$lower_right_y = $bbox[5]; // -16
$lower_left_x = $bbox[6]; // -1
$lower_left_y = $bbox[7]; // -16

// width and height correction (너비/높이 보정)
$width_calc = $lower_right_x - $lower_left_x;
$height_calc = $upper_left_y - $lower_left_y;

$width_addition = $width_calc * 1/50;
$height_addition = $height_calc * 1/3;

$width = $width_calc + $width_addition;
$height = $height_calc + $height_addition;

// This is our cordinates for X and Y (좌표설정)
$x = 0;
$y = $height_calc;


/* Create some objects */
$image = new Imagick();
$draw = new ImagickDraw();
$pixel = new ImagickPixel('transparent');

/* New image */
$image->newImage($width, $height, $pixel);

/* Black text */
$draw->setFillColor('#' . $color_code);

/* Font properties */
$draw->setFont($font_file);
$draw->setFontSize($font_size * 96/72);

/* Create text */
$image->annotateImage($draw, $x, $y, $image_angle, $text);

/* Give image a format */
$image->setImageFormat('png');

/* Output the image with headers */
header('Content-type: image/png');
echo $image;
exit;
