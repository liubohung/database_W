<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>登陸成功</title>
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
	</style>
</head>
<body>
	<header>
		<?php
			session_start();
			$account = $_SESSION['account'] ;
			print "<h1> 歡迎$account </h1><br>";
		?>
	</header>
	<nav class="navbar navbar-light navbar-static-top"> 
 		<div class="container">   
 			<div class="navbar-header">    
    			<a class="navbar-brand" href="Home.html">首頁</a>   
 			</div>   
  			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
   				<ul class="nav navbar-nav navbar-right">
   					<li> 
   						<a href="search.html" aria-haspopup="true" role="button">課程查詢</a>
   					</li>
                    <li> 
                        <a href="#" aria-haspopup="true" role="button">選課情況</a>
                    </li>   
   			   </ul>   
  			</div>  
		</div> 
	</nav>
	<?php
		require_once("conect.php");
		$Hold = "SELECT Code FROM class WHERE Person_id = '$account';" ;
		$db = new PDO('mysql:host=localhost;dbname=class_database',$connect_un,$connect_pw);
		$cdata = $db->query($Hold);
		$result = $cdata->fetchAll(PDO::FETCH_BOTH);
		$db = null;
		print "<a> 已選課表 </a><br> ";
		print " <table width=\"300\" border=\"0\"> ";
		foreach ($result as $datainfo)
   		{
   			print "<tr><td> $datainfo[0] </td></tr> ";
    	}
		print "</table>";
	?>
	<form action="addclass.php" method="post" class="fromcss" >
		<a>選課代號 <input class ="inputcss" type="text" name="choose"></a>
		<br>
		<input type="submit" name="value">
	</form>
</body>
</html>
