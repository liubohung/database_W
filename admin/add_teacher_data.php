<?php
	require_once("conect.php");
	$db = new PDO('mysql:host=localhost;dbname=class_database',$connect_un,$connect_pw);

	if(isset($_POST['Teacher_id']) && isset($_POST['College'])  && isset($_POST['Department'])  && isset($_POST['Class']) && isset($_POST['Name']) && isset($_POST['Email']) && isset($_POST['Password']) && isset($_POST['Level']))
	{
		$Teacher_id = $_POST['Teacher_id'];
		$College = $_POST['College'];
		$Department = $_POST['Department'];
		$Class = $_POST['Class'];
		$Name = $_POST['Name'];
		$Email = $_POST['Email'];
		$Password = $_POST['Password'];
		$Level = $_POST['Level'];
		$q= "INSERT INTO teacher (Teacher_id,College,Department,Class,Name,Email,Password,Level) VALUES ('$Teacher_id','$College','$Department','$Class','$Name','$Email','$Password','$Level');";
		$result = $db->exec($q);
		echo "<script>alert('填寫成功!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
	}
	else
	{
		print<<<_END
			<script>
				alert("填寫錯誤");
			</script>
		_END;
		echo "<script>history.go(-1)</script>";
	}
?>