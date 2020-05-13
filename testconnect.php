<?php
	require_once("conect.php");
	try{
		$db = new PDO('mysql:host=localhost;dbname=class_database',$connect_un,$connect_pw);
		$q = "
CREATE TABLE Tecaher(
	Teacher_id VARCHAR(8), 
	Name VARCHAR(5),
	Password VARCHAR(20),
	College VARCHAR(8),
	Department VARCHAR(8),
	Class VARCHAR(8),
	Status VARCHAR(4),
	PRIMARY KEY(Teacher_id)
)";
		$c = $db->query($q);
		print $c;
		print "good work";
	} catch(PDOException $e){
		print " Could't create table" . $e->getMessage();
	}
?>