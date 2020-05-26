<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>search</title>
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
	</style>
</head>
<body> 
<?php
	include "func.php";
	session_start();
	nav_judge() ;
?>
		<h3>歡迎查詢</h3>
		<div style="text-align:center" >
			<form action="searchresult.php" method="post" class="fromcss">
					<p>課程查詢<br> <input class="inputcss" type="text" name="search_class"></p>
					<br>
					<input type="submit" name="value">
			</form>
		</div>
</body>
</html>
