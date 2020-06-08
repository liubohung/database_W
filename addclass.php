<?php
	function check_sec($database, $cod, $ac){
		$check_sql = "SELECT Code FROM class WHERE Person_id = '$ac' AND Code ='$cod';";
		$do_it = $database->query($check_sql);
		$rel = $do_it->fetch(PDO::FETCH_BOTH);
		if(empty($rel)){
			return True;
		}else{
			return False;
		}
	}
	function check_total($database,$cod){
		$check_total = "SELECT Totalnum,Nownum FROM class_detail WHERE Code ='$cod';";
		$do_it = $database->query($check_total);
		$row = $do_it->fetch(PDO::FETCH_BOTH);
		if(empty($row)){
			return false;
		}else{
			if($row[0] == $row[1]){
				return false;
			}else{
				return True;
			}
		}	
	}
	function same($database,$cod,$ac){
		$check_Timecod = "SELECT * FROM (SELECT Day,Time FROM time WHERE Code = '$cod') a INNER JOIN (SELECT time.Day,time.Time FROM time JOIN class on time.Code = class.Code WHERE class.Person_id = '$ac') b WHERE a.Day = b.Day AND a.Time = b.Time; ";
		$do_cT = $database->query($check_Timecod);
		$row1 = $do_cT->fetchALl(PDO::FETCH_BOTH);
		$check_class = "SELECT Name FROM `class_detail` JOIN (SELECT * From class WHERE class.Person_id='$ac') a ON class_detail.code = a.Code WHERE Name IN (SELECT Name FROM class_detail WHERE code = '$cod');";
		$do_cS = $database->query($check_class);
		$row2 = $do_cS->fetchALl(PDO::FETCH_BOTH);
		if(empty($row1) && empty($row2)){
			return True;
		}else{
			return False;
		}
	}
	function allow_add($database,$cod,$ac){
		$check_TotalS = "SELECT Credit FROM student WHERE Student_id = '$ac';";
		$get_total = $database->query($check_TotalS);
		$total = $get_total->fetch(PDO::FETCH_ASSOC)['Credit'];
		$check_creditS = "SELECT Credit FROM class_detail WHERE Code ='$cod';";
		$get_credit = $database->query($check_creditS);
		$credit = $get_credit->fetch(PDO::FETCH_ASSOC)['Credit'];
		if( ($total + $credit) > 30){
			if($_SERVER['HTTP_REFERER'] == "http://127.0.0.1/LLW_SQL_Project/Web/trypull.php"){
				echo json_encode(array('errorMsg' => '超出學分上限！'));
			}else{
				alert("超出學分上限");
			}
		}else{
			$add_class_sql_T ="
			BEGIN;
			INSERT INTO class(Code,Person_id) VALUES ($cod,\"$ac\");
			UPDATE class_detail SET Nownum = Nownum + 1 WHERE Code = $cod ;
			UPDATE student SET Credit = Credit + $credit WHERE Student_id = \"$ac\";
			COMMIT;" ;
			$row = $database->query($add_class_sql_T);
			if($_SERVER['HTTP_REFERER'] == "http://127.0.0.1/LLW_SQL_Project/Web/trypull.php"){
				echo json_encode(array('errorMsg' => '加選成功！'));
			}else{
				alert("加選成功");
			}
		}
	}

	require_once("conect.php");
	session_start();
	if (isset($_SESSION['account']) && isset($_POST['addchoose'])) {
		$account = $_SESSION['account'];
		$code = intval($_POST['addchoose']);
		if($code == 0){
			alert("選課有誤");
		}else{
		try{
			$db = new PDO('mysql:host=localhost;dbname=class_database',$connect_un,$connect_pw);
			if( check_sec($db,$code,$account) ){
				if( check_total($db,$code) ){
					if(same($db,$code,$account)){
						allow_add($db,$code,$account);
					}else{
						if($_SERVER['HTTP_REFERER'] == "http://127.0.0.1/LLW_SQL_Project/Web/trypull.php"){
							echo json_encode(array('errorMsg' => '該時段已有課無法加選'));
						}else{
							alert("該時段已有課無法加選");
						}
					}
				}else{
					if($_SERVER['HTTP_REFERER'] == "http://127.0.0.1/LLW_SQL_Project/Web/trypull.php"){
						echo json_encode(array('errorMsg' => '無法加選'));
					}else{
						alert("無法加選");
					}
				}
			}else{
				if($_SERVER['HTTP_REFERER'] == "http://127.0.0.1/LLW_SQL_Project/Web/trypull.php"){
					echo json_encode(array('errorMsg' => '已曾經加選過！'));
				}else{
					alert("已曾經加選過");
				}
			}	
		}catch(PDOException $e){
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