<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>searchtry</title>
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist\css\bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>     
	<script src="bootstrap-3.3.7-dist\js/bootstrap.min.js"></script>
	<style type="text/css">
		body{
			background-color: #eaf3db; 
		}
		.fromcss {
			line-height: 1.2em;
			font-style: italic;
			font-size:150%; 
		}
	</style>
</head>
<body>
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
							<a href="welcome.php" aria-haspopup="true" role="button">回到選課</a>
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
		<script>
        department = new Array();
        department[0] = [ 0:"企管一甲", 1:"企管一乙", "企管二甲", "企管二乙", "企管三甲", "企管三乙", "企管四甲", "企管四乙", "企管碩一", "企管碩二"]; //企管系
        department[1] = ["通識－社會整合(SB)", "通識－社會", "通識－社會(夜)", "通識－人文", "通識－人文(夜)", "通識－自然", "通識－自然(夜)", "通識－統合", "通識－統合(夜)"];	//通識課
        department[2] = ["資訊一甲", "資訊一乙", "資訊一丙", "資訊二甲", "資訊二乙", "資訊二丙", "資訊二丁", "資訊三甲", "資訊三乙", "資訊三丙", "資訊三丁", "資訊碩一", "資訊博一", "資訊博二", "電腦系統學程資訊三", "軟體工程學程資訊三", "網路與資安學程資訊三", "資訊跨域學程資訊三"];	//資訊系
        function renew(index) {
            for (var i = 0; i < department[index].length; i++)
                document.myForm.member.options[i] = new Option(department[index][i], department[index][i]);	// 設定新選項
            document.myForm.member.length = department[index].length;	// 刪除多餘的選項
        }
    </script>
	<div style="text-align:center">	
		<form name="myForm" action=".php" method="post">
        系別：
        <select name="department" onclick="renew(this.selectedIndex);">
            <option value=0>企業管理系
            <option value=1>通識
            <option value=2>資訊工程系
        </select>

        班級：
        <select name="member">
            <option value="">請由左方選取系別
        </select>
        <input type="submit" value="Search">
    </form>
	<form>
		<select name="travel-form">
			<option value="Japan ">日本</option>
			<option value="Korea">韓國</option>
			<option value="Europe ">歐洲</option>
			<option value="China ">大陸</option>
		</select>
	</form>
</div>
</body>
</html>