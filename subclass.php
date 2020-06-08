<?php
session_start();
require_once "conect.php";
if (isset($_SESSION['account']) && isset($_POST['subchoose'])) {
	$account = $_SESSION['account'];
	$code = $_POST['subchoose'];
	if ($code == 0) {
		alert("退課有誤");
	} else {
		try {
			$check = "SELECT class.Code,Haveto,class_detail.Credit FROM class JOIN class_detail ON class.Code = class_detail.Code WHERE Person_id = '$account' AND class.Code ='$code'; ";
			$db = new PDO('mysql:host=localhost;dbname=class_database', $connect_un, $connect_pw);
			$do_it = $db->query($check);
			$result = $do_it->fetch(PDO::FETCH_ASSOC);
			$person_credit = "SELECT Credit FROM student WHERE Student_id = '$account'";
			$do = $db->query($person_credit);
			$result2 = $do->fetch(PDO::FETCH_ASSOC);
			if(($result2['Credit'] - $result['class_detail.Credit']) < 9){
				alert("低於學分限制無法退選");
			}else{
				if (!empty($result)) {
					if ($result['Haveto'] == 'M') {
						alert("該課為必修請小心退選課程");
					}
					$sub_class_sql_T = "
					BEGIN;
					DELETE FROM class WHERE Person_id = '$account' AND Code = '$code';
					UPDATE class_detail SET Nownum = Nownum - 1 WHERE Code ='$code';
					UPDATE student SET Credit = Credit - (SELECT DISTINCT Credit FROM class_detail WHERE Code='$code') WHERE Student_id =  '$account';
					COMMIT;";
					$sub = "DELETE FROM class WHERE Person_id = '$account' AND Code ='$code';";
					$sub_class_sql = "UPDATE class_detail SET Nownum = Nownum - 1 WHERE Code='$code';";
					$sub_total = "UPDATE student SET Credit = Credit - (SELECT DISTINCT Credit FROM class_detail WHERE Code='$code') WHERE student_id = $account;";
					alert("退選成功");
					$row = $db->query($sub_class_sql_T);
				} else {
					alert("無法退選");
				}
			}
			
			
		} catch (PDOException $e) {
			print " Could't create table" . $e->getMessage();
		}
	}
	$db = null;
	switch($_SERVER['HTTP_REFERER']){
		case "http://140.134.38.148/welcome2.php":
			header("refresh:0;url=welcome2.php");
		break;
		case "http://140.134.38.148/trypull.php":
			header("refresh:0;url=trypull.php");
		break;
		case "http://127.0.0.1/database_W/trypull.php":
			header("refresh:0;url=trypull.php");
		break;
		case "http://127.0.0.1/database_W/welcome2.php":
			header("refresh:0;url=welcome2.php");
		break;
		default:
			header("refresh:0;url=welcome.php");
	}
}
?>