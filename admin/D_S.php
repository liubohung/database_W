<?php
	unset($Student_id,$College,$Department);
	//  = Null;
	//  = Null;
	//  = Null;
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
    else if((isset($_POST['button1']))&&($_POST['查詢項目']=="name"))
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