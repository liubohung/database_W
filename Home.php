<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist\css\bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="bootstrap-3.3.7-dist\js/bootstrap.min.js"></script>
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
<body>
<?php
session_start();
include "func.php";
nav_judge();
?>
<div id="accordion">
	<H1>選課時間</H1>
	<div>內容</div>
	<H1>選課須知</H1>
	<div>...</div>
	<H1></H1>
</div>
<script>
	$("#accordion").accordion();
</script>
</body>
</html>
