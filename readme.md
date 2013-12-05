PHP image font
===============

This script create image font using php Imagick lib.

Usage
-----

Usage is very simple.

	<img src="http://yourdomain.com/imagefont/t.php?t=오늘은 맑습니다. Today is MARX bright. 1818~1883.&s=30&ff=nanumbarungothic&c=666" alt="box">

Enter `t`(text), `s`(size), `ff`(font file), `c`(color) value to url. So you can get image text.

font file value
----------------

Enter font file name exclude `.ttf`. If you are using linux server, `ttf` extension of file must be lowercase.

사용법 
-----

사용법은 아주 쉽다.

	<img src="http://yourdomain.com/imagefont/t.php?t=오늘은 맑습니다. Today is MARX bright. 1818~1883.&s=30&ff=nanumbarungothic&c=666" alt="box">

URL에 `t`(text), `s`(size), `ff`(font file), `c`(color) 값을 넣는다. 그러면 이미지 텍스트가 나온다.

폰트 파일 경로 
-------------

폰트 파일 경로는 `.ttf` 부분을 제외하고 넣어야 한다. 리눅스 서버를 사용하고 있다면, 파일의 확장자 `ttf`는 반드시 소문자여야 한다.