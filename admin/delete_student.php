
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