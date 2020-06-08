<?php
	require_once("conect.php");
	$db = new PDO('mysql:host=localhost;dbname=class_database',$connect_un,$connect_pw);

	if(isset($_POST['Student_id']) && isset($_POST['College'])  && isset($_POST['Department'])  && isset($_POST['Class']) && isset($_POST['Grade']) && isset($_POST['Name']) && isset($_POST['Email']) && isset($_POST['Password']) && isset($_POST['gender']))
	{
		$Student_id = $_POST['Student_id'];
		$College = $_POST['College'];
		$Department = $_POST['Department'];
		$Class = $_POST['Class'];
		$Grade = $_POST['Grade'];
		$Name = $_POST['Name'];
		$Email = $_POST['Email'];
		$Password = $_POST['Password'];
		$gender = $_POST['gender'];
		$q= "UPDATE  student SET College='$College',Department='$Department',Class='$Class',Grade='$Grade',Name='$Name',Email='$Email',Password='$Password',gender='$gender' WHERE Student_id='$Student_id'";
		echo "<script>alert($q);</script>";
		$result = $db->exec($q);
		echo "<script>alert('填寫成功!');</script>";
		echo "<meta http-equiv='refresh' content='0;url=delete_student.php' />";
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
