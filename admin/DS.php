<!DOCTYPE html>
<html>
<head>
	<title>show detail</title>
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
	<h1>學生資料</H1>
	<script>
	function post_sub(PARAMS) {
    			var temp = document.createElement("form");
    			temp.action = "DSD.php";
    			temp.method = "post";
    			temp.style.display = "none";
    			var opt = document.createElement("input");
        		opt.name = 'S_id';
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
	if(!(isset($_POST['Student_id']))||($_POST['Student_id'])==Null){
        print<<<_END
		<script>
			alert("沒有填寫");
			history.go(-1);
		</script>
		_END;
    }
	require_once("conect.php");
    try{
        $db = new PDO('mysql:host=localhost;dbname=class_database',$connect_un,$connect_pw);
            if (($_POST['search_item'] == "id") && isset($_POST['Student_id'])) {
                $S_id = $_POST['Student_id'];
                $sql_q= "SELECT * FROM student WHERE Student_id = '$S_id'; ";
                $query = $db->query($sql_q);
                $datalist = $query->fetch();
                if(!(isset($datalist['Student_id']))||($datalist['Student_id'])==Null){
                	print<<<_END
						<script>
							alert("沒有資料");
							history.go(-1);
						</script>
					_END;
                }
            }else if(($_POST['search_item'] == "name") && isset($_POST['Student_id'])){
                $Name = $_POST['Student_id'];
                $sql_q= "SELECT * FROM student WHERE Name= '$Name';";
                $query = $db->query($sql_q);
                $datalist = $query->fetch();
                if(!(isset($datalist['Teacher_id']))||($datalist['Teacher_id'])==Null){
                	print<<<_END
						<script>
							alert("沒有資料");
							history.go(-1);
						</script>
					_END;
                }
            }
			print "<table><tbody>";
			print "<tr><td>學號</td><td>";
			print $datalist['Student_id'];
			print "</td></tr>";
			print "	<tr><td>名字 </td><td>" ;
			print $datalist['Name'] ;
			print "</td></tr>";
			print "	<tr><td>學院 </td><td>";
			print $datalist['College'];
			print "</td></tr>";
			print "	<tr><td>系級 </td><td>";
			print $datalist['Department'] ;
			print "</td></tr>";
			print "	<tr><td>年級 </td><td>";
			print $datalist['Grade'] ;
			print "</td></tr>";
			print "	<tr><td>班級 </td><td>";
			print $datalist['Class'];
			print "</td></tr>";
			print "	<tr><td>信箱 </td><td>";
			print $datalist['Email'];
			print "</td></tr>";
			print "	<tr><td>性別 </td><td>";
			print $datalist['gender'];
			print "</td></tr>";
            print "</tbody></table>";
			print "<input id=\"button_del\"  type=\"submit\" value=\"刪除\" onclick =\"post_sub(";
			print "'".$datalist['Student_id']."'";
			print ")\">";
    }catch(PDOException $execption){
        echo "SQL Connection failed";
    }
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
<h1>修改資料</h1>
    <form name="myForm" action="update_student_data.php" method="post" >
		<p>
		  <tr>
		    <h6>證號 <?php echo $datalist['Student_id'];?></h6></th>
		    <td><input type="hidden"name="Student_id" value="<?php echo $datalist['Student_id'];?>"></td>
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
		  	<td>請輸入年級</td>
		  	<td><input type="text"name="Grade"></td>
		  </tr>
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
		  	<td>請輸入性別</td>
		  	<td><input type="text"name="gender"></td>
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