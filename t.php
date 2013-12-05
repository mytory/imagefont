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

$text = 'Pleas enter text. 텍스트를 넣어 주세요. ';
if( isset($_GET['t']) AND ! empty($_GET['t']) ){
	$text = $_GET['t'] . ' ';
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

/* Create some objects */
$image = new Imagick();
$draw = new ImagickDraw();
$background = new ImagickPixel('transparent');

/* text color */
$draw->setFillColor('#' . $color_code);

/* Font properties */
$draw->setFont($font_file);
$draw->setFontSize($font_size * 96/72);
$draw->setStrokeAntialias(true);
$draw->setTextAntialias(true);

// Get font metrics (글자 들어갈 박스 크기 계산)
$metrics = $image->queryFontMetrics($draw, $text);

/* Create text */
$draw->annotation(0, $metrics['ascender'], $text);

/* Create image */
$image->newImage($metrics['textWidth'], $metrics['textHeight'], $background);
$image->setImageFormat('png');
$image->drawImage($draw);

/* Output the image with headers */
header('Content-type: image/png');
echo $image;
exit;
