<!DOCTYPE html>
<html>
<head>
	<title>新增學生資料</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
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
	<h1>新增學生名單</h1>
	<h4>一鍵匯入名單</h4>
	<form action="upload.php" method="post" enctype="multipart/form-data">檔案名稱:
		<input type="file" name="file" id="file"><br />
		<input type="submit" name="submit" value="上傳檔案">
	</form>
	<form name="myForm" action="add_student_data.php" method="post" >
		  <p>
		    <th>請輸入學號</th>
		    <th><input type="text" name="Student_id" ></th>
		  </p>
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
		  	<td>請輸入年級</td>
		  	<td><input type="text"name="Class"></td>
		  </p>
		  <p>
		  	<td>請輸入班級</td>
		  	<td><input type="text"name="Grade"></td>
		  </p>
		  <p>
		  	<td>請輸入姓名</td>
		  	<td><input type="text"name="Name"></td>
		  </p>
		  <p>
		  	<td>請輸入信箱</td>
		  	<td><input type="text" name="Email" ></td>
		  </p>
		  <p>
		  	<td>請輸入密碼</td>
		  	<td><input type="text"name="Password"></td>
		  </p>
		  <p>
		  	<td>請輸入性別</td>
		  	<td><input type="text"name="gender"></td>
		  </p>
		<input type="submit" name="value" value="提交" />
		<input type="reset" name="value" value="清除" />
	</form>
</body>
</html>