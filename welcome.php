<?php
	session_start();
?>
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
			margin:10%;
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
	<?php
		include "func.php";
		require_once("conect.php");
		nav_in();
		$account = $_SESSION['account'];
		$ALLHELD = "SELECT Class,Name,class.Code,Credit,Haveto,College,Totalnum,Nownum,Teacher_Name FROM class_detail JOIN class ON class.Code = class_detail.Code WHERE Person_id = '$account';";
		$db = new PDO('mysql:host=localhost;dbname=class_database',$connect_un,$connect_pw);
		$cdata = $db->query($ALLHELD);
		$rows = $cdata->fetchAll(PDO::FETCH_ASSOC);
		$credit_T = "SELECT Credit FROM student WHERE Student_id = '$account' ;";
		$data_t = $db->query($credit_T);
		$C_T_data = $data_t->fetch(PDO::FETCH_BOTH);
		if(!empty($rows)){
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
		}else{
			print "<div align='center'><H1>尚無資料，趕快加選<H1></div>";
		}
		
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
		<form action="addclass.php" method="post" class="fromcss"  style="float: left;" >
			<p>選課代號<br><input class ="inputcss" type="text" name="addchoose"></p>
			<input type="submit" name="value">
		</form>
		<form name="subclass" action="subclass.php" method="post" class="fromcss"  style="float:right;" onclick="return false">
			<p>退選代號<br><input class ="inputcss" type="text" name="subchoose"></p>
			<input type="submit" name="button" id="button" value="送出" />
		</form>
		<br>
	</div>
</body>
</html>