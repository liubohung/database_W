<?php
	$Student_id = Null;
	$College = Null;
	$Department = Null;
	$Class = Null;
	$Grade = Null;
	$Name =Null;
	$Email = Null;
	$gender = Null;
    if((isset($_POST['button1']))&&($_POST['查詢項目']=="id"))
    {
    	$Student_id = $_POST['Student_id'];
    	require_once("conect.php");
    	try
    	{
    		$db = new PDO('mysql:host=localhost;dbname=class_database',$connect_un,$connect_pw);
    	}
    	catch(PDOException $execption)
    	{
    		echo "Connection failed" . $execption->getMessage();
    	}
		$q= "SELECT * FROM student WHERE Student_id= '$Student_id';";
		$query = $db->query($q);
		$datalist = $query->fetchAll();
		if(empty($datalist))
		{
			print<<<_END
				<script>
					alert("無此資料");
				</script>
			_END;
		}
		else
		{
			foreach ($datalist as $datainfo)
	    	{
		       $Student_id = $datainfo['Student_id'];
		       $College = $datainfo['College'];
		       $Department = $datainfo['Department'];
		       $Class = $datainfo['Class'];
		       $Grade = $datainfo['Grade'];
		       $Name = $datainfo['Name'];
		       $Email = $datainfo['Email'];
		       $gender = $datainfo['gender'];
		       session_start();
		       $_SESSION['Student_id'] = $Student_id;
	    	}
		}
    }
    elseif((isset($_POST['button1']))&&($_POST['查詢項目']=="name"))
    {
    	$Name = $_POST['Student_id'];
    	require_once("conect.php");
		$db = new PDO('mysql:host=localhost;dbname=class_database',$connect_un,$connect_pw);
		$q= "SELECT * FROM student WHERE Name= '$Name';";
		$query = $db->query($q);
		$datalist = $query->fetchAll();
		if(empty($datalist))
		{
			print<<<_END
				<script>
					alert("無此資料");
				</script>
			_END;
		}
		else
		{
			foreach ($datalist as $datainfo)
		    {
		       $Student_id = $datainfo['Student_id'];
		       $College = $datainfo['College'];
		       $Department = $datainfo['Department'];
		       $Class = $datainfo['Class'];
		       $Grade = $datainfo['Grade'];
		       $Name = $datainfo['Name'];
		       $Email = $datainfo['Email'];
		       $gender = $datainfo['gender'];
		       session_start();
		       $_SESSION['Student_id'] = $Student_id;
		    }
		}
    }

    if(isset($_POST['button2']))
    {
    	session_start();
    	//echo 's'. $_SESSION['Student_id'] ;
    	$Student_id = $_SESSION['Student_id'];
    	require_once("conect.php");
    	try
    	{
    		$db = new PDO('mysql:host=localhost;dbname=class_database',$connect_un,$connect_pw);
    	}
    	catch(PDOException $execption)
    	{
    		echo "Connection failed" . $execption->getMessage();
    	}
    	$q = "DELETE FROM teacher WHERE Student_id = '$Student_id';";
    	if($db->exec($q))
    	{
    		print<<<_END
				<script>
					alert("刪除成功");
				</script>
			_END;
			$Student_id = Null;
	    	$College = Null;
	    	$Department = Null;
	    	$Class = Null;
	    	$Grade = Null;
	    	$Name =Null;
	    	$Email = Null;
	    	$gender = Null;
    	}
    	else
    	{
    		print<<<_END
				<script>
					alert("刪除失敗");
				</script>
			_END;
    		$Student_id = Null;
	    	$College = Null;
	    	$Department = Null;
	    	$Class = Null;
	    	$Grade = Null;
	    	$Name =Null;
	    	$Email = Null;
	    	$gender = Null;
    	}
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Delete Student data</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
	<h1>刪除學生資料</h1>
	<form action="delete_student.php" method="post" >
		<select name="查詢項目">
		　<option value="id">學生id</option>
		　<option value="name">姓名</option>
		</select>
		<input type="text" name="Student_id">
		<input type="submit" name="button1" value="查詢"/>


	<table width="300" border="1">
		<tr>
			<td>學生id</td>
			<td><?php echo $Student_id;?></td>
		</tr>
		<tr>
			<td>姓名</td>
			<td><?php echo $Name;?></td>
		</tr>
		<tr>
			<td>學院</td>
			<td><?php echo $College;?></td>
		</tr>
		<tr>
			<td>系級</td>
			<td><?php echo $Department;?></td>
		</tr>
		<tr>
			<td>班級</td>
			<td><?php echo $Class;?></td>
		</tr>
		<tr>
			<td>年級</td>
			<td><?php echo $Grade;?></td>
		</tr>
		<tr>
			<td>信箱</td>
			<td><?php echo $Email;?></td>
		</tr>
		<tr>
			<td>性別</td>
			<td><?php echo $gender;?></td>
		</tr>
	</table>
		<input type="submit" name="button2" value="刪除"/>
	</form>
</body>
</html>