<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>更改密碼</title>
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist\css\bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>     
	<script src="bootstrap-3.3.7-dist\js/bootstrap.min.js"></script>
	<style type="text/css">
		body{
			background-color: #eaf3db; 
		}
		.fromcss {
			line-height: 1.2em;
			font-size:150%; 
		}
		.button {
  			border: none;
  			color: white;
  			padding: 4px 3px;
  			text-align: center;
  			text-decoration: none;
  			display: inline-block;
  			font-size: 16px;
  			margin: 4px 2px;
  			cursor: pointer;
		}
	</style>
</head>
<body>
	<script type="text/javascript">
		$(document).ready(function(){
   			$("#button").click(function(){
   				if (confirm("是否確定更改密碼") ) {
	    			document.CPW.submit();
				} else {
					setTimeout(function(){window.location.href='welcome2.php';},1000);
				}
    	})
	})	
	</script>
	<?php 
	include "func.php";
	session_start();
	nav_in();
	?>
	<div style="text-align:center";>
		<form name="CPW" action="CPW.php" method="post" class="fromcss" onclick="return false">
				<p>原始密碼<br><input class ="inputcss"  type="password" name="change"></p>
				<p>更改密碼<br><input class ="inputcss" type="password" name="check"></p>
				<input type="submit" name="button" id="button" value="送出" />
		</form>
	</div>
</body>	

