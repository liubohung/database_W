<!DOCTYPE html>
<html>
<head>
	<title>show detail</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist\css\bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>     
    <script src="bootstrap-3.3.7-dist\js/bootstrap.min.js"></script>
</head>


<body>
	<h1>教師資料</H1>
	<script>
	function post_sub(PARAMS) {        
    			var temp = document.createElement("form");        
    			temp.action = "DTD.php";        
    			temp.method = "post";        
    			temp.style.display = "none";
    			var opt = document.createElement("input");        
        		opt.name = 'T_id';        
        		opt.value = PARAMS;
        		temp.appendChild(opt);        
    			document.body.appendChild(temp);        
    			temp.submit();        
    			return temp;        
	}
	$(document).ready(function(){
		$("#button_del").click(function(){
		if (confirm("是否確定刪除") ) {
			post_sub();
		} else {

		}
		});
	});
	</script>
<?php
	require_once("conect.php");
    try{
        $db = new PDO('mysql:host=localhost;dbname=class_database',$connect_un,$connect_pw);
            if (($_POST['search_item'] == "id") && isset($_POST['Teacher_id'])) {
                $T_id = $_POST['Teacher_id'];
                $sql_q= "SELECT * FROM teacher WHERE Teacher_id = '$T_id'; ";
                $query = $db->query($sql_q);
                $datalist = $query->fetch();
            }else if(($_POST['search_item'] == "name") && isset($_POST['Teacher_id'])){
                $Name = $_POST['Teacher_id'];
                $sql_q= "SELECT * FROM teacher WHERE Name= '$Name';";
                $query = $db->query($sql_q);
                $datalist = $query->fetch();
            }
			print "<table><tbody>";
			print "<tr><td>教師id</td><td>";
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
			print "<input id=\"button_del\"  type=\"submit\" value=\"刪除\" onclick =\"post_sub(";
			print $datalist['Teacher_id'];
			print ")\">";
                 
    }catch(PDOException $execption){
        echo "SQL Connection failed";
    }
?>
<h1>修改資料</h1>
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