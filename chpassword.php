<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>更改密碼</title>
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
	<script type="text/javascript">
		$(document).ready(function(){
   			$("#button").click(function(){
   				if (confirm("是否確定更改密碼") ) {
	    			document.CPW.submit();
				} else {
					setTimeout(function(){window.location.href='welcome2.php';},1000);
				}
    	})
	})	
	</script>
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
    					    <li><a href="chpassword.html">更改密碼</a></li> 
    					</ul>
    				</li>  
   			   </ul>   
  			</div>  
		</div> 
	</nav>
	<form name="CPW" action="CPW.php" method="post" class="fromcss" onclick="return false">
			<p>更改密碼<br><input class ="inputcss" type="text" name="change"></p>
			<p>確認密碼<br><input class ="inputcss" type="text" name="check"></p>
			<input type="submit" name="button" id="button" value="送出" />
	</form>
</body>	

