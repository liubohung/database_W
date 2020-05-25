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
		#Box5{
			width:104px;
			height:104px;
			padding:2px;
    		border:1px #ccc dashed;
    		float:left;
    		margin-right:10px;
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
			display: inline-block;
			width:10%;
			height:auto;
			background-color:#CCCCFF;
			/*border:1px solid #0099FF;*/
			padding:10px;
			border:2px blue solid;
			overflow: hidden;
			float:left;
			margin-right: 10px
		}
		.dragging {
			opacity: .25;
		}
		.hover {
			background-color: rgba(0,191,165,.04);
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
			alert("no");
			history.go(0); 			
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
	session_start();
	if(isset( $_SESSION['account'] ) and isset( $_SESSION['pwd'] ) ){
		$account = $_SESSION['account'];
		print<<<_END
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
						<li> 
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true">
								選課模式
								<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="trypull.php">一般選課</a></li>
								<li><a href="welcome.php">快速選課</a></li>
								<li><a href="welcome2.php">課表選課</a></li>  
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true">
								$account
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
		_END;
	}
?>
<div ondrop="sbDrop(event)" ondragover="AllowDrop(event)" style="border:2px #cccccc dashed;width:20%;height:180px;float:left;">
		<!-- <div align="center"><H1>退選</H1></div> -->
	</div>
	<div ondrop="addDrop(event)" ondragover="AllowDrop(event)">
	<table border="1" align="center" style="float:left;width:80%">
		<tbody>
			<tr style="height:80px">
				<td width="80"></td>
				<td> 星期一 </td>
				<td> 星期二 </td>
				<td> 星期三 </td>
				<td> 星期四 </td>
				<td> 星期五 </td>
				<td> 星期六 </td>
				<td> 星期天 </td>
			</tr>
			<tr style="height:80px">
				<td width="10%">8:00 - 9:00</td>
				<td width="10%">  </td>
				<td width="10%">  </td>
				<td  width="10%" style="padding:2px;">
					<div id="xxx-1" draggable="true" class="div1" ondragstart="Drag(event)" ondragend=""><p class="name">全民國防教育軍事訓練<br>3779</p></div>
				</td>
				<td width="10%">  </td>
				<td width="10%">  </td>
				<td width="10%">  </td>
				<td width="10%">  </td>
			</tr>
			<tr style="height:80px">
				<td width=10% >9:00 - 10:00</td>
				<td width=10% style="padding:2px;">
					<div id="ccc-1" draggable="true" class="div1" ondragstart="Drag(event)"><p class="name">統計學(二)<br>2152</p></div></td> 
				<td width="10%">  </td>
				<td width="10%" style="padding:2px;">
					<div id="xxx-2" draggable="true" class="div1" ondragstart="Drag(event)"><p class="name">全民國防教育軍事訓練<br>3779</p></div>
				</td>
				<td width="10%">  </td>
				<td width="10%">  </td>
				<td width="10%">  </td>
				<td width="10%">  </td>
			</tr>
		</tbody>
	</table>
	</div>
	<div id="footer" style="width:100%;height:110px;border:2px black solid;position:absolute;bottom:10px; padding: 1%">
		<div id="aaa-1" draggable="true" class="div2" ondragstart="Drag(event)" ondragexit ="EDrop(event)">
			<p class="name">系統程式<br>3779</p>
		</div>
		<div id="aaa-1" draggable="true" class="div2" ondragstart="Drag(event)">
			<p class="name">系統程式<br>3779</p>
		</div>
	</div>
</body>
</html>