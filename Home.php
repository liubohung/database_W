<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist\css\bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>     
	<script src="bootstrap-3.3.7-dist\js/bootstrap.min.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<style type="text/css">
		body{
			background-color: #eaf3db;
		}
		.fromcss {
			line-height: 1.2em;
			font-style: italic;
			font-size:150%;
		}
		#accordion{

		}
	</style>
</head>
<body>
	<header>
		<h1>選課系統</H1>
		<br>
	</header>

<?php
session_start();
include "func.php";
nav_judge();
?>

<div align="center" style="width: 90%;margin:5%;">	
<div align="center" id="accordion">
	<H1>選課公告</H1>
	<div>
		內容
	</div>
	<H1>[查詢項目說明]</H1>
	<div>
		<p style="word-wrap:break-word;">1、辦理選課前，請同學務必事先閱讀並依逢甲大學學生選課施行準則、各統籌教學單位(如通識教育中心、體育教學中心等)及各學系、所、學位學程等選課規定辦理。各單位規定請至逢甲大學首頁（http://www.fcu.edu.tw/wSite/mp?mp=1），點選認識逢甲、教學單位之各單位公告內容查詢。</p>
		<p style="word-wrap:break-word;">2、如要查詢各學系、所、學位學程之新生必選修科目表及輔系、雙主修、學分學程之修習科目，可至註冊課務組網頁之課程資訊（https://goo.gl/Z9A3FR）公告。</p>
		<p style="word-wrap:break-word;">3、查詢開課資料，建議使用課程檢索系統（https://goo.gl/l1yl5h）進行動態查詢。</p>
		<p style="word-wrap:break-word;">4、如要快速查詢相關選課資訊，可多利用註冊課務組之選課資訊（https://goo.gl/BmzkfV）。</p>
		<p style="word-wrap:break-word;">5、若NID帳號使用有任何問題，請洽詢資訊處（04-24517250#2712，人言大樓3F。</p>
	</div>
	<H1>選課須知</H1>
	<div>cccc</div>
	<H1>課程地圖</H1>
	<div>aaa</div>
</div>
<div>
<script>
	$("#accordion").accordion();
	// $("#dialog").dialog({
    //   		autoOpen:true ,
    //   	show: {
    //     	effect: "puff",
    //     	duration: 1000
    // 	},
    //   	hide: {
    //     	effect: "slide",
    //     	duration: 100
    //   	}
    // });
	</script>
</body>
</html>
