<?php
	session_start();
?>
<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8">
			<title>查詢密碼</title>
			<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist\css\bootstrap.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>     
			<script src="
			bootstrap-3.3.7-dist\js/bootstrap.min.js"></script>
			<style type="text/css">
				body{
					background-color: #eaf3da; 
				}
			.inputcss {
				border-width: 1px;
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
	    nav_noin();
    ?>
		<h3>密碼查詢</h3>
		<form action="checkuser.php" method="post" class="fromcss">
				<a>學號 <input class="inputcss" type="text" name="Account""></a>
				<br>
				<a>Email <input class="inputcss" type="text" name="Email">
				</a>
				<br>
				<input type="submit" name="value">
		</form>
	</body>
	</html>