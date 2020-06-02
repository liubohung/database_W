<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8">
			<title>登入帳戶</title>
			<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist\css\bootstrap.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>     
			<script src="
			bootstrap-3.3.7-dist\js/bootstrap.min.js"></script>
			<style type="text/css">
				body{
					background-color: #eaf3da; 
				}
			.inputcss {
				text-transform:uppercase;
				border: 0px;
				line-height:2;
			}
			.fromcss {
				line-height: 1.2em;
				border-radius:10px
				font-style: italic;
				font-size:150%; 
			}

			</style>
		</head>
	<body>
		<?php
		session_start();
		include "func.php";
		nav_noin();
		?>
		<div style="text-align:center;">
			<form action="logintest.php" method="post" class="fromcss" >
				<p> account <br><input class ="inputcss" type="text" name="account"></p>
				<p> passward <br><input class ="inputcss" type="password" name="password"></p>
				<input type="submit" name="value">
			</form>
		</div>	
	</body>
</html>



