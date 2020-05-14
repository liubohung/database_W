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
		if($row[0] == $row[1]){
			return false;
		}else{
			return True;
		}
	}
	function allow_add($database,$cod,$ac){
		$add_sql = "INSERT INTO class(Code,Person_id) VALUES ('$cod','$ac');";
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
				if(check_total($db,$code)){
					$row = $db->exec($add);
					print<<<_END
					<script>
					alert ("加選成功");
					setTimeout(function(){window.location.href='login.html';},1000);
					</script>
					_END;
				}else{
					print<<<_END
					<script>
					alert ("人數已滿無法加選");
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