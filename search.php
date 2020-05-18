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
	session_start();
	if(isset( $_SESSION['account'] ) and isset( $_SESSION['pwd'] ) ){
		$account = $_SESSION['account'];
		print<<<_END
			<nav class="navbar navbar-light navbar-static-top"> 
				<div class="container">   
				<div class="navbar-header">    
					<a class="navbar-brand" href="Home.html">首頁</a>   
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li> 
							<a href="search.php" aria-haspopup="true" role="button">課程查詢</a>
						</li>
						<li> 
							<a href="#" aria-haspopup="true" role="button">選課情況</a>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true">
								$account
								<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="logout.php">用戶登出</a></li>
								<li><a href="chpassword.html">更改密碼</a></li> 
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		_END;
	}else{
		print<<<_END
			<nav class="navbar navbar-light navbar-static-top"> 
				<div class="container">   
				<div class="navbar-header">    
					<a class="navbar-brand" href="Home.html">首頁</a>   
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li> 
							<a href="search.php" aria-haspopup="true" role="button">課程查詢</a>
						</li>
						<li> 
						    <a href="#" aria-haspopup="true" role="button">選課情況</a>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true">
								$account
								<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="login.html">用戶登入</a></li>
								<li><a href="checkuser.html">查詢密碼</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		_END;
	}
?>
		<h3>歡迎查詢</h3>
		<div style="text-align:center";>
			<form action="searchresult.php" method="post" class="fromcss">
					<p>課程查詢<br> <input class="inputcss" type="text" name="search_class"></p>
					<br>
					<input type="submit" name="value">
			</form>
		</div>
</body>
</html>
