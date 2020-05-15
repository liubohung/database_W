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
  			padding: 16px 32px;
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
                    <li class="dropdown">
    				    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" >
						<?php print "$account"; ?>
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
	<?php
		require_once("conect.php");
		$ALLHELD = "SELECT Class,Name,class.Code,Credit,Haveto,College,Totalnum,Nownum,Teacher_Name FROM class_detail JOIN class ON class.Code = class_detail.Code WHERE Person_id = '$account';";
		$db = new PDO('mysql:host=localhost;dbname=class_database',$connect_un,$connect_pw);
		$cdata = $db->query($ALLHELD);
		$rows = $cdata->fetchAll(PDO::FETCH_ASSOC);
		$db = null;
		print "<div style=\"text-align:center;\"><H3> 已選課表 </H3></div><br> ";
		print " <table width=\"700\" border=\"1\" align=\"center\"> ";
		print "<tr> <td> 開課班級 </td> <td> 課程名稱 </td> <td> 選課代號 </td> <td> 學分數 </td> <td> 必選修 </td> <td> 開課單位 </td> <td>已收授人數 </td> <td> 開課人數  </td> <td> 授課教師 </td> </tr>" ;
		$Tcredit = 0;
		foreach($rows as $row){
			print "<tr> ";
			foreach($row as $key => $value){
				print "<td>  $value  </td>";
				if($key == 'Credit'){
					$Tcredit +=  $value;
				}
			}
			print " </tr>";
		}
		print "</table><br>";
		print "<h3> 目前學分 $Tcredit </h3>"
	?>
	<br>
	<script type="text/javascript">
		function CheckText()
	    {
	    	if (confirm("是否確定退選") ) {
	    		document.subclass.submit();
			} else {
				setTimeout(function(){window.location.href='welcome2.php';},1000);
			}
	    }
	</script>
	<form action="addclass.php" method="post" class="fromcss" >
		<a> 選課代號 <input class ="inputcss" type="text" name="addchoose"></a>
		<br>
		<input type="submit" name="value">
	</form>
	<form name="subclass" action="subclass.php" method="post" class="fromcss">
		<a> 退選代號 <input class ="inputcss" type="text" name="subchoose"></a>
		<br>
		<button id="submitBtn" class="button" onclick="CheckText()"> 提交</button>
	</form>
	<form action="welcome2.php" method="post" class="fromcss" >
		<a>課表預覽 </a>
		<br>
		<input type="submit" name="gogo">
	</form>
</body>
</html>
