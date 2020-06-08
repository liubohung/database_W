<?php
	require_once("conect.php");
	$db = new PDO('mysql:host=localhost;dbname=class_database',$connect_un,$connect_pw);
	if((($_POST['Student_id']) && ($_POST['College']) && ($_POST['Department']) && ($_POST['Class']) && ($_POST['Grade']) && ($_POST['Name']) && ($_POST['Email']) && ($_POST['Password']) && ($_POST['gender'])) == '')
	{
		print"<script>alert(\"填寫錯誤\");</script>";
		echo "<script>history.go(-1)</script>";
	}
	else
	{
		if(isset($_POST['Student_id']) && isset($_POST['College']) && isset($_POST['Department']) && isset($_POST['Class']) && isset($_POST['Grade']) && isset($_POST['Name']) && isset($_POST['Email']) && isset($_POST['Password']) && isset($_POST['gender'])){
			$Student_id = $_POST['Student_id'];
			$College = $_POST['College'];
			$Department = $_POST['Department'];
			$Class = $_POST['Class'];
			$Grade = $_POST['Grade'];
			$Name = $_POST['Name'];
			$Email = $_POST['Email'];
			$Password = $_POST['Password'];
			$gender = $_POST['gender'];
			$q = "INSERT INTO student (Student_id,College,Department,Class,Grade,Name,Email,Password,gender) VALUES ('$Student_id','$College','$Department','$Grade','$Class','$Name','$Email','$Password','$gender');";
			$result = $db->query($q);
			$sql = "SELECT Code,Credit FROM class_detail WHERE Class ='$Class' AND Haveto = 'M' ;";
			$add = $db->query($sql);
			$row = $add->fetchAll(PDO::FETCH_ASSOC);
			foreach($row as $key){
				$sql_add_class ="
				BEGIN;
				INSERT INTO class(Code,Person_id) VALUES (('$key[Code]','$Student_id');
				UPDATE class_detail SET Nownum = Nownum + 1 WHERE Code = '$key[Code]' ;
				UPDATE student SET Credit = Credit + $key[Credit] WHERE Student_id = '$Student_id';
				COMMIT;" ;
				$add = $db->query($sql_add_class);
			}
			echo "<script>alert('填寫成功!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
		} else{
			print"<script>alert(\"填寫錯誤\");</script>";
			echo "<script>history.go(-1)</script>";
		}
	}
?>