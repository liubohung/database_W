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
			line-height: 24px;
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
	<?php
		include "func.php";
		require_once("conect.php");
		session_start();
		nav_in();
		$account = $_SESSION['account'];
		$HELD = "SELECT class.Code,Day,Time,class_detail.Name FROM time JOIN class ON class.Code = time.Code JOIN class_detail ON class.Code = class_detail.Code WHERE Person_id = '$account' ORDER BY Time;";
		$db = new PDO('mysql:host=localhost;dbname=class_database',$connect_un,$connect_pw);
		$cdata = $db->query($HELD);
		$rows = $cdata->fetchAll(PDO::FETCH_ASSOC);
		$tdlong = "\"10%\"";
		$N_C_E = "<td style=\"height:70px\"> </td>";
		$S_TDL_E = "<td width=$tdlong>  </td>";
		$list = array(
			0=>array('零'=>"<td width= $tdlong>  </td>" ,'一'=>"<td><div style=\"text-align:center;\"> 星期一 </div></td> ",'二'=>" <td><div style=\"text-align:center;\"> 星期二 </div></td> ",'三'=>"<td><div style=\"text-align:center;\"> 星期三 </div></td>",'四' =>"<td><div style=\"text-align:center;\"> 星期四 </div></td>",'五' =>"<td><div style=\"text-align:center;\"> 星期五 </div></td>",'六' =>"<td><div style=\"text-align:center;\"> 星期六 </div></td>",'七' =>"<td><div style=\"text-align:center;\"> 星期天 </div></td>" ),
			1=>array('零' => "<td><div style=\"text-align:center;\">8:00 - 9:00</div></td>",'一'=>"<td width=$tdlong >  </td>",'二'=>"<td width=$tdlong >  </td>",'三'=>"<td width=$tdlong >  </td>",'四' =>"<td width=$tdlong >  </td>",'五' =>"<td width=$tdlong>  </td>",'六' =>"<td width=$tdlong >  </td>",'七' => "<td width=$tdlong >  </td>"),
			2=>array('零' => "<td><div style=\"text-align:center;\">9:00 - 10:00</div></td>",'一' => $N_C_E,'二'=>$N_C_E,'三'=>$N_C_E,'四' =>$N_C_E,'五' =>$N_C_E,'六' =>$N_C_E,'七' => $N_C_E),
			3=>array('零' => "<td><div style=\"text-align:center;\">10:00 - 11:00</div></td>",'一'=>$N_C_E,'二'=>$N_C_E,'三'=>$N_C_E,'四' =>$N_C_E,'五' =>$N_C_E,'六' =>$N_C_E,'七' => $N_C_E),
			4=>array('零' => "<td><div style=\"text-align:center;\">11:00 - 12:00</div></td>",'一'=>$N_C_E,'二'=>$N_C_E,'三'=>$N_C_E,'四' =>$N_C_E,'五' =>$N_C_E,'六' =>$N_C_E,'七' => $N_C_E),
			5=>array('零' => "<td><div style=\"text-align:center;\">12:00 - 13:00</div></td>",'一'=>$N_C_E,'二'=>$N_C_E,'三'=>$N_C_E,'四' =>$N_C_E,'五' =>$N_C_E,'六' =>$N_C_E,'七' => $N_C_E),
			6=>array('零' => "<td><div style=\"text-align:center;\">13:00 - 14:00</div></td>",'一'=>$N_C_E,'二'=>$N_C_E,'三'=>$N_C_E,'四' =>$N_C_E,'五' =>$N_C_E,'六' =>$N_C_E,'七' => $N_C_E),
			7=>array('零' => "<td><div style=\"text-align:center;\">14:00 - 15:00</div></td>",'一'=>$N_C_E,'二'=>$N_C_E,'三'=>$N_C_E,'四' =>$N_C_E,'五' =>$N_C_E,'六' =>$N_C_E,'七' => $N_C_E),
			8=>array('零' => "<td><div style=\"text-align:center;\">15:00 - 16:00</div></td>",'一'=>$N_C_E,'二'=>$N_C_E,'三'=>$N_C_E,'四' =>$N_C_E,'五' =>$N_C_E,'六' =>$N_C_E,'七' => $N_C_E),
			9=>array('零' => "<td><div style=\"text-align:center;\">16:00 - 17:00</div></td>",'一'=>$N_C_E,'二'=>$N_C_E,'三'=>$N_C_E,'四' =>$N_C_E,'五' =>$N_C_E,'六' =>$N_C_E,'七' => $N_C_E),
			10=>array('零' => "<td><div style=\"text-align:center;\">17:00 - 18:00</div></td>",'一'=>$N_C_E,'二'=>$N_C_E,'三'=>$N_C_E,'四' =>$N_C_E,'五' =>$N_C_E,'六' =>$N_C_E,'七' => $N_C_E),
			11=>array('零' => "<td><div style=\"text-align:center;\">18:00 - 19:00</div></td>",'一'=>$N_C_E,'二'=>$N_C_E,'三'=>$N_C_E,'四' =>$N_C_E,'五' =>$N_C_E,'六' =>$N_C_E,'七' => $N_C_E),
			12=>array('零' => "<td><div style=\"text-align:center;\">19:00 - 20:00</div></td>",'一'=>$N_C_E,'二'=>$N_C_E,'三'=>$N_C_E,'四' =>$N_C_E,'五' =>$N_C_E,'六' =>$N_C_E,'七' => $N_C_E),
			13=>array('零' => "<td><div style=\"text-align:center;\">20:00 - 21:00</div></td>",'一'=>$N_C_E,'二'=>$N_C_E,'三'=>$N_C_E,'四' =>$N_C_E,'五' =>$N_C_E,'六' =>$N_C_E,'七' => $N_C_E),
			14=>array('零' => "<td><div style=\"text-align:center;\">21:00 - 22:00</div></td>",'一'=>$N_C_E,'二'=>$N_C_E,'三'=>$N_C_E,'四' =>$N_C_E,'五' =>$N_C_E,'六' =>$N_C_E,'七' => $N_C_E)
		);
		foreach($rows as $row){
			$list[$row['Time']][$row['Day']] = "<td width=\"10%\"><div style=\"text-align:center;\">" . $row['Name'] ."</div><div style=\"text-align:center;\">".$row['Code']. "</div></td> ";
		}
		print "<div style=\"text-align:center;\"><H3> 已選課表 </H3></div><br> ";
		print " <table style=\"width:80%;\" border=\"1\" align=\"center\">";
		foreach ($list as $row) {
			print "<tr style=\"height:70px\">";
			foreach ($row as $key => $value){
				print $value ;
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
	</div>
</body>
</html>
