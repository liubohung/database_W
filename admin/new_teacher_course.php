<!DOCTYPE html>
<html>
<head>
	<title>新增課程</title>
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
	<?php
		include "admin_nav.php";
	    nav_in();
	?>
	<h1>新增課程</h1>
	<h4>一鍵匯入名單</h4>
	<form action="upload.php" method="post" enctype="multipart/form-data">檔案名稱:
		<input type="file" name="file" id="file"><br />
		<input type="submit" name="submit" value="上傳檔案">
	</form>
	<form name="myForm" action="add_teacher_course.php" method="post" >
		  <p>
		    <th>請輸入班級</th>
		    <th><input type="text" name="Class" ></th>
		  </p>
		  <p>
		  	<td>請輸入課程名稱</td>
		  	<td><input type="text"name="Name"></td>
		  </p>
		  <p>
		  	<td>請輸入課程代碼</td>
		  	<td><input type="text"name="Code"></td>
		  </p>
		  <p>
		  	<td>請輸入學分</td>
		  	<td><input type="text"name="Credit"></td>
		  </p>
		  <p>
		  	<td>請選擇是否必選</td>
		  		<select name="Haveto">
				  	<option value="">請選擇</option>
		　			<option value="M">M</option>
		　			<option value="O">O</option>
		  		</select>
		  </p>
		  <p>
		  	<td>請輸入學系</td>
		  	<td><input type="text"name="College"></td>
		  </p>
		  <p>
		  	<td>請輸入最多選課人數</td>
		  	<td><input type="text"name="Totalnum"></td>
		  </p>
		  <p>
		  	<td>請輸入教師姓名</td>
		  	<td><input type="text"name="Teacher_Name"></td>
		  </p>
		<input type="submit" name="value" value="提交" />
		<input type="reset" name="value" value="清除" />
	</form>
</body>
</html>