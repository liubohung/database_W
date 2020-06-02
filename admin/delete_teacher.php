<?php
    $Teacher_id = Null;
	$College = Null;
	$Department = Null;
	$Class = Null;
	$Name =Null;
	$Email =Null;
	$Level = Null;
    if((isset($_POST['button1']))&&($_POST['查詢項目']=="id"))
    {
    	$Teacher_id = $_POST['Teacher_id'];
    	require_once("conect.php");
		$db = new PDO('mysql:host=localhost;dbname=class_database',$connect_un,$connect_pw);
		$q= "SELECT * FROM teacher WHERE Teacher_id= '$Teacher_id';";
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
		       $Teacher_id = $datainfo['Teacher_id'];
		       $College = $datainfo['College'];
		       $Department = $datainfo['Department'];
		       $Class = $datainfo['Class'];
		       $Name = $datainfo['Name'];
		       $Email = $datainfo['Email'];
		       $Level = $datainfo['Level'];
		       session_start();
		       $_SESSION['Teacher_id'] = $Teacher_id;
		    }
		}
    }
    elseif((isset($_POST['button1']))&&($_POST['查詢項目']=="name"))
    {
    	$Name = $_POST['Teacher_id'];
    	require_once("conect.php");
		$db = new PDO('mysql:host=localhost;dbname=class_database',$connect_un,$connect_pw);
		$q= "SELECT * FROM teacher WHERE Name= '$Name';";
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
		       $Teacher_id = $datainfo['Teacher_id'];
		       $College = $datainfo['College'];
		       $Department = $datainfo['Department'];
		       $Class = $datainfo['Class'];
		       $Name = $datainfo['Name'];
		       $Email = $datainfo['Email'];
		       $Level = $datainfo['Level'];
		       session_start();
		       $_SESSION['Teacher_id'] = $Teacher_id;
		    }
		}
    }
    if(isset($_POST['button2']))
    {
    	session_start();
    	//echo 's'. $_SESSION['Teacher_id'] ;
    	$Teacher_id = $_SESSION['Teacher_id'];
    	require_once("conect.php");
    	try
    	{
    		$db = new PDO('mysql:host=localhost;dbname=class_database',$connect_un,$connect_pw);
    	}
    	catch(PDOException $execption)
    	{
    		echo "Connection failed" . $execption->getMessage();
    	}
    	$q = "DELETE FROM teacher WHERE Teacher_id = '$Teacher_id';";
    	if($db->exec($q))
    	{
    		print<<<_END
				<script>
					alert("刪除成功");
				</script>
			_END;
			$Teacher_id = Null;
	    	$College = Null;
	    	$Department = Null;
	    	$Class = Null;
	    	$Name =Null;
	    	$Email = Null;
	    	$Level = Null;
    	}
    	else
    	{
    		print<<<_END
				<script>
					alert("刪除失敗");
				</script>
			_END;
    		$Teacher_id = Null;
	    	$College = Null;
	    	$Department = Null;
	    	$Class = Null;
	    	$Name =Null;
	    	$Email = Null;
	    	$Level = Null;
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
	<h1>刪除教師資料</h1>
	<form action="delete_teacher.php" method="post" >
		<select name="查詢項目">
		　<option value="id">教師id</option>
		　<option value="name">姓名</option>
		</select>
		<input type="text" name="Teacher_id">
		<input type="submit" name="button1" value="查詢"/>


	<table width="300" border="1">
		<tr>
			<td>教師id</td>
			<td><?php echo $Teacher_id;?></td>
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
			<td>信箱</td>
			<td><?php echo $Email;?></td>
		</tr>
		<tr>
			<td>職別</td>
			<td><?php echo $Level;?></td>
		</tr>
	</table>
		<input type="submit" name="button2" value="刪除"/>
	</form>
</body>
</html>