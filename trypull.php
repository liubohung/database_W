<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>pulltry</title>
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist\css\bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>     
	<script src="bootstrap-3.3.7-dist\js/bootstrap.min.js"></script>
	<style type="text/css">
		[draggable="true"] {
			user-select: none;
			-moz-user-select: none;
			-webkit-user-select: none;
			-ms-user-select: none;
		}
		.HT{
			display:flex;
			flex-direction: row;
			align-items: flex-start;
			border:2px  black solid;
		}	
		.CT{
			display:flex;
			flex-direction: column;
			justify-content: space-around;
			margin: 2%;
			width: 16%;
			height:100%;
			float:right;
			border:2px black solid;
		}
		.Box{ 
			display:flex;
			width:98%;
			margin:1%;
			height:900px;
			float:left;
			border:2px #cccccc dashed;
			margin: 1%;
		}
		.Class{
			display:flex;
			border:2px black solid;
			justify-content: center;
			align-items: center;
		}
		.AT{
			display:flex;
			flex-direction: column;
			justify-content: space-around;
			margin: 2%;
			width: 76%;
			height:100%;
			float:right;
			border:2px black solid;
		}
		.addable{
			display: flex;
			/* align-items: center;		 */
			width:100%;
			/* float:right; */
			/* top: 0px; */
			/* border:2px black solid; */
		}
		#Footer{
			display: flex;
			/* justify-content: center; */
			align-items: center;
			/* position: absolute;*/
			height: 10%;
			margin: 2%; 
			border:2px black solid;
			padding:5px;
		}
		.div1{
			width:100%;
			height:80px;
			/*border:1px solid #0099FF;*/
			padding:10px;
			border:2px orange solid;
			overflow: hidden;
			background-color:antiquewhite;
		}
		.div2{
			width:10%;
			height:90%;
			background-color:#CCCCFF;
			display: flex;
			align-items: center;
			/*border:1px solid #0099FF;*/
			padding:10px;
			border:2px blue solid;
			overflow: hidden;
			float:left;
			margin-right: 1%;
		}
	</style>
</head>
<body>
<script type="text/javascript">
	function AllowDrop(event){
 	   event.preventDefault();
	}
	function Drag(event){
		// this.classList.add('dragging');
    	event.dataTransfer.setData("text",event.currentTarget.id);
    	// event.currentTarget.style.opacity = ".25";
	}
	function EDrop(event){
		event.currentTarget.style.opacity = "";
	}	
	function sbDrop(event){
   		event.preventDefault();
    	// if()
    	console.log(event.target.class);
    	var data=event.dataTransfer.getData("text");
    	event.currentTarget.appendChild(document.getElementById(data));
    	if (confirm("是否確定退選") ) {
	 	   console.log(data);
    		var str = 'div#'+ data+' .name';
    		var subC = ($(str).text().replace(/[^0-9]/ig,""));
    		console.log(str);
    		console.log(($(str).text().replace(/[^0-9]/ig,"")));
   			function post(URL, PARAMS) {        
    			var temp = document.createElement("form");        
    			temp.action = URL;        
    			temp.method = "post";        
    			temp.style.display = "none";
    			var opt = document.createElement("input");        
        		opt.name = 'subchoose';        
        		opt.value = PARAMS;
        		temp.appendChild(opt);        
    			document.body.appendChild(temp);        
    			temp.submit();        
    			return temp;        
			}
			post("subclass.php",subC);		
		} else {
			history.go(0); 
		}
	}
	function addDrop(event){
		event.preventDefault();
    	// var data=event.dataTransfer.getData("text");
    	// event.currentTarget.appendChild(document.getElementById(data));
    	alert("add");
	}
</script>
<?php
	include "func.php";
	require_once("conect.php");
	session_start();
	nav_in();
	$account = $_SESSION['account'];
?>
	<div ondrop="sbDrop(event)" ondragover="AllowDrop(event)" class ="Box">
		<!-- <div align="center"><H1>退選</H1></div> -->
	</div>
	<div style="width : 100%;float:right;">
		<div ondrop="addDrop(event)" ondragover="AllowDrop(event)" class="table"> 
	<?php
		require_once("conect.php");
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
			$list[$row['Time']][$row['Day']] = "<td width=\"10%\" style=\"padding:2px;\"><div id=" . $row['Time'] . $row['Day'] . " draggable=\"true\" class=\"div1\" ondragstart=\"Drag(event)\"><p class=\"name\">" . $row['Name'] ."<br>".$row['Code']. "<p></div></td> ";
		}
		print "<div><H3> 已選課表 </H3></div><br> ";
		print " <table style=\"float:right;width:80%heigh:100%;\" border=\"1\" align=\"center\"><tbody>";
		foreach ($list as $row) {
			print "<tr style=\"height:80px\">";
			foreach ($row as $key => $value){
				print $value ;
			}
			print "</tr>";
		}
		print "</tbody></table><br>";
		$credit_T = "SELECT Credit FROM student WHERE Student_id = '$account' ;";
		$data_t = $db->query($credit_T);
		$C_T_data = $data_t->fetch(PDO::FETCH_BOTH);
		print "<h3> 目前學分 $C_T_data[Credit] </h3>";
		$db = null;
	?>
	</div>
	<div id="Footer">
		<div id="aaa-1" draggable="true" class="div2" ondragstart="Drag(event)" ondragexit ="EDrop(event)">
			<p class="name">系統程式<br>3779</p>
		</div>
		<div id="aaa-1" draggable="true" class="div2" ondragstart="Drag(event)">
			<p class="name">系統程式<br>3779</p>
		</div>
	</div>
</div>
</body>
</html>