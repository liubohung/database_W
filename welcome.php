<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>登陸成功</title>
</head>
<body>
	<?php
		require_once("conect.php");
		session_start();
		$account = $_SESSION['account'] ;
		$Hold = "SELECT Code FROM class WHERE Person_id = '$account';" ;
		$db = new PDO('mysql:host=localhost;dbname=class_database',$connect_un,$connect_pw);
		$cdata = $db->query($Hold);
		$result = $cdata->fetchAll(PDO::FETCH_BOTH);
		$db = null;
		print "<a> 已選課表 </a><br> ";
		print " <table width=\"300\" border=\"0\"> ";
		foreach ($result as $datainfo)
   		{
   			print "<tr><td> $datainfo[0] </td></tr> ";
    	}
		print "</table>";
	?>
	<form action="addclass.php" method="post" class="fromcss" >
		<a>選課代號 <input class ="inputcss" type="text" name="choose"></a>
		<br>
		<input type="submit" name="value">
	</form>
</body>
</html>