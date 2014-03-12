<!doctype html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<title>image font test</title>
	<style>
	body {background: #ddd}
	img {border: 1px solid red;}
	</style>
</head>
<body>
	<img src="t.php?t=오늘은 맑습니다. Today is MARX bright. 1818~1883.&s=30&ff=NanumBarunGothic&c=666" alt="box">
	<br>
	<img src="t.php?t=오늘은 맑습니다. Today is MARX bright. 1818~1883.&s=30&ff=NanumPen&c=666" alt="box">
	<br>
	<img src="t.php?t=오늘은 맑습니다. Today is MARX bright. 1818~1883.&s=30&ff=NanumBrush&c=666" alt="box">
	<br>
	<img src="t.php?t=오늘은 맑습니다. Today is MARX bright. 1818~1883.&s=30&ff=HANBatang&c=666" alt="box">
	<br>
	<img src="t.php?t=오늘은 맑습니다. Today is MARX bright. 1818~1883.&s=30&ff=NanumMyeongjo&c=666" alt="box">
	<br>
	<img src="t.php" alt="box">
	<br>
	<img src="t.php?t=10" alt="box">
	<br>
	<img src="t.php?t=10&s=100" alt="box">

<h2>Fonts</h2>
<?php
$fonts = array();
$dir = "fonts";

// Open a directory, and read its contents
if (is_dir($dir)){
  if ($dh = opendir($dir)){
    while (($file = readdir($dh)) !== false){
    	if(strstr($file, '.ttf')){
    		$fonts[] = str_replace('.ttf', '', $file);
    	}
    }
    closedir($dh);
  }
}
sort($fonts);
echo implode('<br>', $fonts);
?>
</body>
</html>