<!DOCTYPE html>
<html>
<head>
	<title>教師資料修改</title>
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
	<h1>教師資料修改</h1>

<?php
	session_start();
	require_once("conect.php");
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=class_database',$connect_un,$connect_pw);
            if ((isset($_SESSION['T_account'])))
             {
                $T_id = $_SESSION['T_account'];
                $sql_q= "SELECT * FROM teacher WHERE Teacher_id = '$T_id'; ";
                $query = $db->query($sql_q);
                $datalist = $query->fetch();
                if(!(isset($datalist['Teacher_id']))||($datalist['Teacher_id'])==Null)
                {
                	print<<<_END
						<script>
							alert("沒有資料");
							history.go(-1);
						</script>
					_END;
                }
            }
			print "<table><tbody>";
			print "<tr><td>證號</td><td>";
			print $datalist['Teacher_id'];
			print "</td></tr>";
			print "	<tr><td>名字</td><td>" ;
			print $datalist['Name'] ;
			print "</td></tr>";
			print "	<tr><td>學院</td><td>";
			print $datalist['College'];
			print "</td></tr>";
			print "	<tr><td>系級</td><td>";
			print $datalist['Department'] ;
			print "</td></tr>";
			print "	<tr><td>班級</td><td>";
			print $datalist['Class'];
			print "</td></tr>";
			print "	<tr><td>信箱</td><td>";
			print $datalist['Email'];
			print "</td></tr>";
			print "	<tr><td>職別</td><td>";
			print $datalist['Level'];
			print "</td></tr>";
            print "</tbody></table>";

    }
    catch(PDOException $execption)
    {
        echo "SQL Connection failed";
    }
?>

<h1>修改資料</h1>
    <form name="myForm" action="update_teacher_data.php" method="post" >
		<p>
		  <tr>
		    <th>
		    <h6>證號 <?php echo $datalist['Teacher_id'];?></h6></th>
		    <td><input type="hidden"name="Teacher_id" value="<?php echo $datalist['Teacher_id'];?>"></td>
		  </tr>
		</p>
		<p>
		  <tr>
		  	<td>請輸入信箱</td>
		  	<td><input type="text"name="Email"></td>
		  </tr>
		</p>
		<p>
		  <tr>
		  	<td>請輸入密碼</td>
		  	<td><input type="text"name="Password"></td>
		  </tr>
		</p>
		<input type="submit" name="value" value="提交" />
		<input type="reset" name="value" />
		<input type ="button" onclick="history.back()" value="回到上一頁">
	</form>
</body>