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
			line-height: 24px;　　　          　/* 設定文字行距 */
    		letter-spacing: 3px;
			line-height: 1.5em;
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
						<?php print "$account" ?>
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
		$HELD = "SELECT class.Code,Day,Time,class_detail.Name FROM time JOIN class ON class.Code = time.Code JOIN class_detail ON class.Code = class_detail.Code WHERE Person_id = '$account' ORDER BY Time;";
		$db = new PDO('mysql:host=localhost;dbname=class_database',$connect_un,$connect_pw);
		$cdata = $db->query($HELD);
		$rows = $cdata->fetchAll(PDO::FETCH_ASSOC);
		$tdlong = "\"80\"";
		$list = array(
			0=>array('零'=>"<td width= $tdlong>  </td>" ,'一'=>"<td> 星期一 </td> ",'二'=>" <td> 星期二 </td> ",'三'=>"<td> 星期三 </td>",'四' =>"<td> 星期四 </td>",'五' =>"<td> 星期五 </td>",'六' =>"<td> 星期六 </td>",'七' =>"<td> 星期天 </td>" ),
			1=>array('零' => "<td width= $tdlong>8:00 - 9:00</td>",'一'=>"<td width=$tdlong >  </td>",'二'=>"<td width=$tdlong >  </td>",'三'=>"<td width=$tdlong >  </td>",'四' =>"<td width=$tdlong >  </td>",'五' =>"<td width=$tdlong>  </td>",'六' =>"<td width=$tdlong >  </td>",'七' => "<td width=$tdlong >  </td>"),
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
			$list[$row['Time']][$row['Day']] = "<td width=$tdlong >" . $row['Name'] ."<br>".$row['Code']. " </td> ";
		}
		print "<div style=\"text-align:center;\"><H3> 已選課表 </H3></div><br> ";
		print " <table style=\"line-height:25px;\" border=\"1\" align=\"center\">";
		foreach ($list as $row) {
			print "<tr>";
			foreach ($row as $key => $value){
				print $value;
			}
			print "</tr>";
		}
		print "</table><br>";
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
					setTimeout(function(){window.location.href='welcome2.php';},1000);
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
		<form action="welcome.php" method="post" class="fromcss" >
			<p>所有課表<br></p>
			<input type="submit" name="gogo">
		</form>
	</div>
</body>
</html>
