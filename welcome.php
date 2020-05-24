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
	<header>
		<?php
			session_start();
			if(isset( $_SESSION['account'])){
				$account = $_SESSION['account'];
			}else{
				header("refresh:0;url=Home.php");
			}
			print "<h1> 歡迎$account </h1><br>";
		?>
	</header>
	<nav class="navbar navbar-light navbar-static-top"> 
 		<div class="container">   
 			<div class="navbar-header">    
    			<a class="navbar-brand" href="Home.php">首頁</a>   
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
    				    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" >
						<?php print "$account"; ?>
    				    	<span class="caret"></span></a>
    					<ul class="dropdown-menu">
    						<li><a href="logout.php">用戶登出</a></li>
    					    <li><a href="chpwd.php">更改密碼</a></li> 
    					</ul>
    				</li>  
   			   </ul>   
  			</div>  
		</div> 
	</nav>
	<?php
		require_once("conect.php");
		$ALLHELD = "SELECT Class,Name,class.Code,Credit,Haveto,College,Totalnum,Nownum,Teacher_Name FROM class_detail JOIN class ON class.Code = class_detail.Code WHERE Person_id = '$account';";
		$db = new PDO('mysql:host=localhost;dbname=class_database',$connect_un,$connect_pw);
		$cdata = $db->query($ALLHELD);
		$rows = $cdata->fetchAll(PDO::FETCH_ASSOC);
		print "<div style=\"text-align:center;\"><H3> 已選課表 </H3></div><br> ";
		print " <table style=\"width:80%;\" border=\"1\" align=\"center\">";
		print "<thead><tr style=\"height:40px\"> <th><div style=\"text-align:center;\">開課班級</div></th> <th><div style=\"text-align:center;\">課程名稱</div></th> <th><div style=\"text-align:center;\">選課代號</div></th><th><div style=\"text-align:center;\">學分數</div></th> <th><div style=\"text-align:center;\">必選修</div></th><th><div style=\"text-align:center;\">開課單位</div></th> <th><div style=\"text-align:center;\">收授人數</div></th> <th><div style=\"text-align:center;\">開課人數</div></th> <th><div style=\"text-align:center;\">授課教師</div></th> </tr></thead><tbody>" ;
		foreach($rows as $row){
			print "<tr style=\"height:40px\">";
			foreach($row as $key => $value){
				print "<td><div style=\"text-align:center;\"> $value </div></td>";
			}
			print " </tr>";
		}
		print "</tbody></table><br>";

		$credit_T = "SELECT Credit FROM student WHERE Student_id = '$account' ;";
		$data_t = $db->query($credit_T);
		$C_T_data = $data_t->fetch(PDO::FETCH_BOTH);
		print "<h3> 目前學分 $C_T_data[Credit] </h3>";
		$db = null;
	?>
	<br>

	<script type="text/javascript">
		$(document).ready(function(){
   			$("#button").click(function(){
   				if (confirm("是否確定退選") ) {
	    			document.subclass.submit();
				} else {
					setTimeout(function(){window.location.href='welcome.php';},1000);
				}
    	})
	})	
	</script>
	<div style="text-align:center;">
		<form action="addclass.php" method="post" class="fromcss" >
			<p>選課代號<br><input class ="inputcss" type="text" name="addchoose"></p>
			<input type="submit" name="value">
		</form>
		<br>
		<form name="subclass" action="subclass.php" method="post" class="fromcss" onclick="return false">
			<p>退選代號<br><input class ="inputcss" type="text" name="subchoose"></p>
			<input type="submit" name="button" id="button" value="送出" />
		</form>
		<br>
		<form action="welcome2.php" method="post" class="fromcss" >
			<p>課表預覽 </p>
			<input type="submit" name="gogo">
		</form>
	</div>
</body>
</html>
