<!DOCTYPE html>
<html>
<head>
	<title>New teacher</title>
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
	<script>
		department=new Array();
		department[1]=["資訊系","自控系","通訊系","電機系","電子系","資電不分系"];	// 資電學院
		department[2]=["國貿系", "會計系", "國貿系全英班", "商學院", "財稅系","合經系","統計系","經濟系","企管系","行銷系","商學學士學位學程"];	// 商學院
		department[3]=["通識中心"];			//通識中心
		function renew(index)
		{
			for(var i=0;i<department[index].length;i++)
			document.myForm.Department.options[i]=new Option(department[index][i], department[index][i]);	// 設定新選項
			document.myForm.Department.length=department[index].length;	// 刪除多餘的選項
		}
	</script>
	<p><h1>新增教師名單</h1></p>
	<p><h4>一鍵匯入名單</h4></p>
	<form  action="upload.php" method="post" enctype="multipart/form-data">檔案名稱:
		<input type="file" name="file" id="file" /><br />
		<input type="submit" name="submit" value="上傳檔案" />
	</form>
		<form name="myForm" action="add_teacher_data.php" method="post" >
		<p>
		  <tr>
		    <th>請輸入教師</th>
		    <th><input type="text" name="Teacher_id"></th>
		  </tr>
		</p>
		<p>
		  <tr>
		    <td>請輸入學院</td>
		  </tr>
		  <select name="College"  onChange="renew(this.selectedIndex);">
		  	<option value="">請選擇</option>
　			<option value="資電學院">資電學院</option>
　			<option value="商學院">商學院</option>
　			<option value="通識中心">通識中心</option>
		  </select>
		</p>
		<p>
		 <tr>
		  	<td>請輸入系級</td>
		 </tr>
			<select name="Department" >
				<option value="">
			</select>
		</p>
		<p>
		  <tr>
		  	<td>請輸入班級</td>
		  	<td><input type="text"name="Class"></td>
		  </tr>
		</p>
		<p>
		  <tr>
		  	<td>請輸入姓名</td>
		  	<td><input type="text"name="Name"></td>
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
		<p>
		  <tr>
		  	<td>請輸入職稱</td>
		  </tr>
		  <select name="Level">
　			<option value="教授">教授</option>
　			<option value="副教授">副教授</option>
　			<option value="助理教授">助理教授</option>
　			<option value="職員">職員</option>
		  </select>
		</p>
		<input type="submit" name="value" value="提交" />
		<input type="reset" name="value" />
	</form>
</body>
</html>