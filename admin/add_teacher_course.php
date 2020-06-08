<?php
	require_once("conect.php");
	$db = new PDO('mysql:host=localhost;dbname=class_database',$connect_un,$connect_pw);
	if((($_POST['Class']) && ($_POST['Name']) && ($_POST['Code']) && ($_POST['Credit']) && ($_POST['Haveto']) && ($_POST['College']) && ($_POST['Totalnum']) && ($_POST['Teacher_Name'])) == '')
	{
		print<<<_END
			<script>
				alert("填寫錯誤");
			</script>
		_END;
		echo "<script>history.go(-1)</script>";
	}
	else
	{
		if(isset($_POST['Class']) && isset($_POST['Name']) && isset($_POST['Code']) && isset($_POST['Credit']) && isset($_POST['Haveto']) && isset($_POST['College']) && isset($_POST['Totalnum']) && isset($_POST['Teacher_Name'])){
			$Class = $_POST['Class'];
			$Name = $_POST['Name'];
			$Code = $_POST['Code'];
			$Credit = $_POST['Credit'];
			$Haveto = $_POST['Haveto'];
			$College = $_POST['College'];
			$Totalnum = $_POST['Totalnum'];
			$Teacher_Name = $_POST['Teacher_Name'];
			$Nownum = 0;
			$q= "INSERT INTO class_detail (Class,Name,Code,Credit,Haveto,College,Totalnum,Nownum,Teacher_Name) VALUES ('$Class','$Name','$Code','$Credit','$Haveto','$College','$Totalnum','$Nownum','$Teacher_Name');";
			$result = $db->exec($q);
			//echo $q;
			echo "<script>alert('填寫成功!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
		} else{
			print<<<_END
			<script>
				alert("填寫錯誤");
				history.go(-1);
			</script>
			_END;
		}
	}
?>