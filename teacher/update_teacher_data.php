<?php
	require_once("conect.php");
	$db = new PDO('mysql:host=localhost;dbname=class_database',$connect_un,$connect_pw);

	if(isset($_POST['Teacher_id']) && isset($_POST['Email']) && isset($_POST['Password']))
	{
		$Teacher_id = $_POST['Teacher_id'];
		$Email = $_POST['Email'];
		$Password = $_POST['Password'];
		$q= "UPDATE  teacher SET Email='$Email',Password='$Password' WHERE Teacher_id='$Teacher_id'";
		echo "<script>alert($q);</script>";
		$result = $db->exec($q);
		echo "<script>alert('填寫成功!');</script>";
		echo "<meta http-equiv='refresh' content='0;url=teacher_course.php' />";
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