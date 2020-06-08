<!DOCTYPE html>
<html>
<head>
	<title>教師授課選課情況</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist\css\bootstrap.min.css">
	<script src="bootstrap-3.3.7-dist\js/bootstrap.min.js"></script>
</head>


<body>
	<h1>教師授課選課情況</h1>

<?php
	session_start();
	require_once("conect.php");
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=class_database',$connect_un,$connect_pw);
        $T_id = $_SESSION['T_account'];
        $sql_q= "SELECT * FROM teacher WHERE Teacher_id = '$T_id'; ";
        $query = $db->query($sql_q);
        $datalist = $query->fetch();
        if(!(isset($datalist['Teacher_id']))||($datalist['Teacher_id'])==Null)
        {
	        	print<<<_END
					<script>
						alert("沒有授課資料");
						history.go(-1);
					</script>
				_END;
		}
        else
        {
        	$db = new PDO('mysql:host=localhost;dbname=class_database',$connect_un,$connect_pw);
        	$sql_q = "SELECT class_detail.Class,class_detail.Name,class_detail.Code,class_detail.College,class_detail.Totalnum,class_detail.Nownum , teacher.Teacher_id ,teacher.Name FROM class_detail INNER JOIN teacher ON teacher.Name = class_detail.Teacher_Name and teacher.Teacher_id = '$T_id'";
        	//$sql_q = "SELECT class_detail.Class,class_detail.Name,class_detail.Code,class_detail.College,class_detail.Totalnum,class_detail.Nownum , teacher.Teacher_id ,teacher.Name FROM class_detail INNER JOIN teacher ON teacher.Name = class_detail.Teacher_Name and teacher.Teacher_id = 'T01'";
        	$query = $db->query($sql_q);
            $datalist = $query->fetchALL();
            foreach ($datalist as $datalist)
            {
            	$Class = $datalist[0];
            	$Name = $datalist[1];
            	$Code = $datalist[2];
            	$Totalnum = $datalist[3];
            	$Nownum = $datalist[4];
            	$TName = $datalist[5];
            	echo $Class . " " . $Name . " " .$Code . " " .$Totalnum . " " .$Nownum . " " .$TName . "<br>";
            }


        }

    }
    catch(PDOException $execption)
    {
        echo "SQL Connection failed";
    }
?>


</body>