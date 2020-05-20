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
	function same_time($database,$cod,$ac){
		$check_Timecod = "SELECT * FROM (SELECT Day,Time FROM time WHERE Code = '$cod') a INNER JOIN (SELECT time.Day,time.Time FROM time JOIN class on time.Code = class.Code WHERE class.Person_id = '$ac') b WHERE a.Day = b.Day AND a.Time = b.Time; ";
		$do_it = $database->query($check_Timecod);
		$row = $do_it->fetchALl(PDO::FETCH_BOTH);
		if(empty($row)){
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
			print<<<_END
					<script>
					alert ("超出學分上限");
					</script>
					_END;
		}else{
			$add_sql = "INSERT INTO class(Code,Person_id) VALUES ('$cod','$ac');";
			$add_class_sql = "UPDATE class_detail SET Nownum = Nownum + 1 WHERE Code='$cod';";
			$add_studentT_sql = "UPDATE student SET Credit = Credit + $credit WHERE Person_id = '$ac';";
			$row = $database->query($add_sql);
			$row = $database->query($add_class_sql);
			$row = $database->query($add_studentT_sql);
			print<<<_END
					<script>
					alert ("加選成功");
					</script>
					_END;
		}
	}

	require_once("conect.php");
	session_start();
	$account = $_SESSION['account'] ;
	if ( isset($account) && isset($_POST['addchoose'])) {
		$code = intval($_POST['addchoose']);
		if($code == 0){
			print<<<_END
					<script>
					alert ("選課有誤");
					</script>
					_END;
		}else{
		try{
			$db = new PDO('mysql:host=localhost;dbname=class_database',$connect_un,$connect_pw);
			if( check_sec($db,$code,$account) ){
				if( check_total($db,$code) ){
					if(same_time($db,$code,$account)){
						allow_add($db,$code,$account);
					}else{
						print<<<_END
					<script>
					alert ("該時段已有課無法加選");
					</script>
					_END;
					}
					
				}else{
					print<<<_END
					<script>
					alert ("無法加選");
					</script>
					_END;
				}
			}else{
					print<<<_END
					<script>
					alert ("已曾經加選過");
					</script>
					_END;
			}	
		}catch(PDOException $e){
		print " Could't create table" . $e->getMessage();
		}
	}
	$db = null;
	header("refresh:0;url=welcome.php");
	}
?>