<?php
	require_once("conect.php");
	$db = new PDO('mysql:host=localhost;dbname=class_database',$connect_un,$connect_pw);
	$q= "INSERT INTO student (Student_id,College,Department,Class,Grade,Name,Email,Password,gender) VALUES ('D0752912','資電不分系','資電','資電一乙','1','劉伯洪','d0752912@gmail.com','12345678','男');";
	$result = $db->exec($q);
	print $result;
?>