<?php
	require_once("conect.php");
	$db = new PDO('mysql:host=localhost;dbname=class_database',$connect_un,$connect_pw);
	$q= "SELECT * FROM `student` WHERE Student_id=$Student_id";
	$result = $db->exec($q);
	echo $result;
?>