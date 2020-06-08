<?php
	session_start();
	require_once("conect.php");
	if(isset( $_SESSION['account'])){
		$ac = $_SESSION['account'];
		$db = new PDO('mysql:host=localhost;dbname=class_database',$connect_un,$connect_pw);
		$cpwd=$db->query("SELECT Password FROM student WHERE Student_id = '$ac';");
		$row2=$cpwd->fetch(PDO::FETCH_BOTH);
		$pwd1 = $_POST['change'];
		if(!password_verify( $pwd1 ,$row2[0])){
			alert("密碼錯誤");
		}else{
			$pwd2 = $_POST['check'];
			$pwd_h = password_hash($pwd2, PASSWORD_DEFAULT);
			$change_spw_sql = "UPDATE student SET Password = '$pwd_h' WHERE Student_id = '$ac';";
			$db = new PDO('mysql:host=localhost;dbname=class_database',$connect_un,$connect_pw);
			$cc = $db->query($change_spw_sql);
			alert("修改成功請重新登入");
			setcookie(session_name(),'',time() - 2592000,'/');
			session_destroy();
		}
	}
	header("refresh:0;url=Home.php");
?>