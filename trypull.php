<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>pulltry</title>
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist\css\bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>     
	<script src="bootstrap-3.3.7-dist\js/bootstrap.min.js"></script>
	<style type="text/css">
		body{
			background-color: #eaf3db; 
		}
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
			flex-wrap: wrap; 
			overflow-y: scroll;
		}
		.div1{
			border-style: outset;
			width:100%;
			height:80px;
			/*border:1px solid #0099FF;*/
			
			background-color:antiquewhite;
			border:2px orange solid;

			padding:10px;
			overflow: hidden;
		}
		.div2{
			width:15%;
			height:80px;

			background-color:#CCCCFF;
			border:2px blue solid;

			display: flex;
			align-items: center;
			/*border:1px solid #0099FF;*/
			padding:10px;
			
			overflow: hidden;
			float:left;
			margin-right: 1%;
			margin-bottom:1%;
		}
		select{
			height:20%;
			line-height:32px;
			font-size:14px;
			width:70%;
			border-bottom-style:solid;
			text-align: center;
			text-align-last: center;
			margin:20px auto;
			appearance:none;
			-webkit-appearance:none;
			-moz-appearance:none;
			-ms-appearance:none;
			-o-appearance:none;
			-khtml-appearance:none;
		}
		#button_s{
			text-align: center;
			width:50%;
			height:20%;
			margin:20px auto;
			float:left;
		}
	</style>
</head>
<?php
	include "func.php";
	nav_in();
	$account = $_SESSION['account'];
?>
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
    	var data=event.dataTransfer.getData("text");
    	// event.currentTarget.appendChild(document.getElementById(data));
    	var str = 'div#' + data + ' .name';
    		var addC = ($(str).text().replace(/[^0-9]/ig,""));
    		console.log(str);
    		console.log(addC);
			$.ajax({
					type: "POST",
					url: "addclass.php",
					dataType: "json",
					data: {
						addchoose: addC
					},
					error: function(xhr) {
						alert('Ajax request 發生錯誤');            
					},
					success: function(msg){
						alert(msg.errorMsg);
						history.go(0);
					}
			});	
   			function post_add(URL, PARAMS) {        
    			var temp = document.createElement("form");        
    			temp.action = URL;        
    			temp.method = "post";        
    			temp.style.display = "none";
    			var opt = document.createElement("input");        
        		opt.name = 'addchoose';        
        		opt.value = PARAMS;
        		temp.appendChild(opt);        
    			document.body.appendChild(temp);        
    			temp.submit();        
    			return temp;        
			}
	}
</script>

<div class="HT">
	<div class="CT">
		<div ondrop="sbDrop(event)" ondragover="AllowDrop(event)" class ="Box"><!-- <div align="center"><H1>退選</H1></div> --></div>
		<br>
		<div class ="Class"> 
			<script>
				department = new Array();
				department[0] = ["企管一甲", "企管一乙", "企管二甲", "企管二乙", "企管三甲", "企管三乙", "企管四甲", "企管四乙", "企管碩一", "企管碩二"]; //企管系
				department[1] = ["通識－社會整合(SB)", "通識－社會(S)", "通識－社會(夜)(S)", "通識－人文(H)", "通識－人文(夜)(H)", "通識－自然(N)", "通識－自然(夜)(N)", "通識－統合(M)", "通識－統合(夜)(M)"];    //通識課
				department[2] = ["資訊一甲", "資訊一乙", "資訊一丙", "資訊二甲", "資訊二乙", "資訊二丙", "資訊二丁", "資訊三甲", "資訊三乙", "資訊三丙", "資訊三丁", "資訊碩一", "資訊博一", "資訊博二", "電腦系統學程資訊三", "軟體工程學程資訊三", "網路與資安學程資訊三", "資訊跨域學程資訊三"];  //資訊系
				function renew(index) {
					for (var i = 0; i < department[index].length; i++)
						document.myForm.member.options[i] = new Option(department[index][i], department[index][i]); // 設定新選項
					document.myForm.member.length = department[index].length;   // 刪除多餘的選項
				}
			</script>
			<form name="myForm">
				<fieldset>
					<div>
						<p>學院</p>
					</div>
				</fieldset>
				<br>
				<div border="1px" style="display: flex;width: 80%;">
					<p>系別</p>
					<select id="department" onchange="renew(this.selectedIndex);">
						<option value="企業管理學系">企業管理系</option>
						<option value="通識核心課程">通識</option>
						<option value="資訊工程學系">資訊工程系</option>
					</select>
				</div>
				<div border="1px" style="display:flex;width:80%;">
					<p>班級</p>
					<select id="member">
						<option value="">請由左方選取系別</option>
					</select>
				</div>	
				<input type="button" id="button_s" value="Search" >
			</form>
			<script>
				$("#button_s").click(function(){
					$("#Footer").empty();
					$.ajax({
						type: "POST",
						url: "getclass.php",
						dataType: "html",
						data: {
							Class: $("#member").val(),
							Collage: $("#department").val(),
						},
						error: function(xhr) {
							alert('Ajax request 發生錯誤');            
						},
						success: function(msg){
							var array_return =  $.parseJSON ( msg );
							// console.log(array_return[0].Name);
							for(var i=0 ;i<msg.length;i++){
								console.log(array_return[i].Name.toString());
								var dii = "<div id=" + array_return[i].Name + array_return[i].Code + " draggable=\"true\" class=\"div2\" ondragstart=\"Drag(event)\" ondragexit=\"EDrop(event)\"><p class=\"name\">";
								var eddi = "</p></div>";
								var str = dii +  array_return[i].Name +  array_return[i].Code + eddi;
								$("#Footer").append(str);
							}
						}
					});
				});
			</script>
		</div>
	</div>
	<div class="AT">
		<div ondrop="addDrop(event)" ondragover="AllowDrop(event)" class="addable"> 
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
		
		print "<table border=\"1\" align=\"center\" style=\"width: 100%;\"><tbody>";
		foreach ($list as $row) {
			print "<tr style=\"height:80px\">";
			foreach ($row as $key => $value){
				print $value ;
			}
			print "</tr>";
		}
		print "</tbody></table></div>";
		$db = null;
	?>
		<br>
		<div id="Footer">
			<div id="aaa-1" draggable="true" class="div2" ondragstart="Drag(event)" ondragexit ="EDrop(event)">
				<p class="name">系統程式<br>3779</p>
			</div>
			<div id="aaa-1" draggable="true" class="div2" ondragstart="Drag(event)">
				<p class="name">系統程式<br>3779</p>
			</div>
		</div>
		
	</div>
</div>
</body>
</html>