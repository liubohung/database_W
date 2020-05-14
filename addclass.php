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
	function allow_add($database,$cod,$ac){
		$check_TotalS = "SELECT SUM(Credit) FROM class_detail JOIN class ON class.Code = class_detail.Code WHERE Person_id = '$ac'; ";
		$get_total = $database->query($check_TotalS);
		$total = $get_total->fetch(PDO::FETCH_ASSOC);

		$check_creditS = "SELECT Credit FROM class_detail WHERE Code ='$cod';";
		$get_credit = $database->query($check_creditS);
		$credit = $get_credit->fetch(PDO::FETCH_ASSOC);

		if( ($total[0] + $credit[0]) > 30){
			print<<<_END
					<script>
					alert ('$total');
					alert ('$credit[0]');
					alert ("超出學分上限");
					</script>
					_END;
		}else{
			$add_sql = "INSERT INTO class(Code,Person_id) VALUES ('$cod','$ac');";
			$row = $database->query($add_sql);
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
		$code = $_POST['addchoose'] ;
		try{
			$add = "INSERT INTO class(Code,Person_id) VALUES ('$code','$account');";
			$db = new PDO('mysql:host=localhost;dbname=class_database',$connect_un,$connect_pw);
			if( check_sec($db,$code,$account) ){
				if( check_total($db,$code) ){
					allow_add($db,$code,$account);
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
				setTimeout(function(){window.location.href='login.html';},1000);
				</script>
				_END;
			}
		}catch(PDOException $e){
		print " Could't create table" . $e->getMessage();
	}
	header("refresh:0;url=welcome.php");
	}
?>