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
		$HELD = "SELECT class.Code,Day,Time FROM time JOIN class ON class.Code = time.Code WHERE Person_id = '$account'ORDER BY Time; ";
		$db = new PDO('mysql:host=localhost;dbname=class_database',$connect_un,$connect_pw);
		$cdata = $db->query($HELD);
		$rows = $cdata->fetchAll(PDO::FETCH_ASSOC);
		$db = null;
		$list = array(
			0=>array('零'=>"<td>  </td>" ,'一'=>"<td> 星期一 </td> ",'二'=>" <td> 星期二 </td> ",'三'=>"<td> 星期三 </td>",'四' =>"<td> 星期四 </td>",'五' =>"<td> 星期五 </td>",'六' =>"<td> 星期六 </td>",'七' =>"<td> 星期天 </td>" ),
			1=>array('零' => "<td>8:00 - 9:00</td>",'一'=>"<td>  </td>",'二'=>"<td>  </td>",'三'=>"<td>  </td>",'四' =>"<td>  </td>",'五' =>"<td>  </td>",'六' =>"<td>  </td>",'七' => "<td>  </td>"),
			2=>array('零' => "<td>9:00 - 10:00</td>",'一'=>"<td> </td>",'二'=>"<td> </td>",'三'=>"<td> </td>",'四' =>"<td> </td>",'五' =>"<td> </td>",'六' =>"<td> </td>",'七' => "<td> </td>"),
			3=>array('零' => "<td>10:00 - 11:00</td>",'一'=>"<td> </td>",'二'=>"<td> </td>",'三'=>"<td> </td>",'四' =>"<td> </td>",'五' =>"<td> </td>",'六' =>"<td> </td>",'七' => "<td> </td>"),
			4=>array('零' => "<td>11:00 - 12:00</td>",'一'=>"<td> </td>",'二'=>"<td> </td>",'三'=>"<td> </td>",'四' =>"<td> </td>",'五' =>"<td> </td>",'六' =>"<td> </td>",'七' => "<td> </td>"),
			5=>array('零' => "<td>12:00 - 13:00</td>",'一'=>"<td> </td>",'二'=>"<td> </td>",'三'=>"<td> </td>",'四' =>"<td> </td>",'五' =>"<td> </td>",'六' =>"<td> </td>",'七' => "<td> </td>"),
			6=>array('零' => "<td>13:00 - 14:00</td>",'一'=>"<td> </td>",'二'=>"<td> </td>",'三'=>"<td> </td>",'四' =>"<td> </td>",'五' =>"<td> </td>",'六' =>"<td> </td>",'七' => "<td> </td>"),
			7=>array('零' => "<td>14:00 - 15:00</td>",'一'=>"<td> </td>",'二'=>"<td> </td>",'三'=>"<td> </td>",'四' =>"<td> </td>",'五' =>"<td> </td>",'六' =>"<td> </td>",'七' => "<td> </td>"),
			8=>array('零' => "<td>15:00 - 16:00</td>",'一'=>"<td> </td>",'二'=>"<td> </td>",'三'=>"<td> </td>",'四' =>"<td> </td>",'五' =>"<td> </td>",'六' =>"<td> </td>",'七' => "<td> </td>"),
			9=>array('零' => "<td>16:00 - 17:00</td>",'一'=>"<td> </td>",'二'=>"<td> </td>",'三'=>"<td> </td>",'四' =>"<td> </td>",'五' =>"<td> </td>",'六' =>"<td> </td>",'七' => "<td> </td>"),
			10=>array('零' => "<td>17:00 - 18:00</td>",'一'=>"<td> </td>",'二'=>"<td> </td>",'三'=>"<td> </td>",'四' =>"<td> </td>",'五' =>"<td> </td>",'六' =>"<td> </td>",'七' => "<td> </td>"),
			11=>array('零' => "<td>18:00 - 19:00</td>",'一'=>"<td> </td>",'二'=>"<td> </td>",'三'=>"<td> </td>",'四' =>"<td> </td>",'五' =>"<td> </td>",'六' =>"<td> </td>",'七' => "<td> </td>"),
			12=>array('零' => "<td>19:00 - 20:00</td>",'一'=>"<td> </td>",'二'=>"<td> </td>",'三'=>"<td> </td>",'四' =>"<td> </td>",'五' =>"<td> </td>",'六' =>"<td> </td>",'七' => "<td> </td>"),
			13=>array('零' => "<td>20:00 - 21:00</td>",'一'=>"<td> </td>",'二'=>"<td> </td>",'三'=>"<td> </td>",'四' =>"<td> </td>",'五' =>"<td> </td>",'六' =>"<td> </td>",'七' => "<td> </td>"),
			14=>array('零' => "<td>21:00 - 22:00</td>",'一'=>"<td> </td>",'二'=>"<td> </td>",'三'=>"<td> </td>",'四' =>"<td> </td>",'五' =>"<td> </td>",'六' =>"<td> </td>",'七' => "<td> </td>")
		);
		foreach($rows as $row){
			$list[$row['Time']][$row['Day']] = "<td>" . $row['Code']. " </td> ";

		}
		print "<a> 已選課表 </a><br> ";
		print " <table width=\"700\" style=\"line-height:25px;\" border=\"1\">";
		print "";
		foreach ($list as $row) {
			print "<tr>";
			foreach ($row as $key => $value){
				print "<td>$key</td>";
				print $value;
			}
			print "</tr>";
		}
			// print "<tr><td> $row[Time] </td></tr>";
			// print "<tr>";
			// foreach($row as $key => $value){
			// 	if(!empty($row) ){
			// 		print "<td> $row </td>";
			// 	}else{
			// 		print "<td>  </td>";
			// 	}
			// }
			// print " </tr>";
		print "</table><br>";
		// print "<h3> 目前學分 $Tcredit </h3>"
	?>
	<br>
	<form action="addclass.php" method="post" class="fromcss" >
		<a>選課代號 <input class ="inputcss" type="text" name="addchoose"></a>
		<br>
		<input type="submit" name="value">
	</form>
	<form action="subclass.php" method="post" class="fromcss" >
		<a>退選代號 <input class ="inputcss" type="text" name="subchoose"></a>
		<br>
		<input type="submit" name="value">
	</form>
</body>
</html>
