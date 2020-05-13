<?php
	require_once("conect.php");
	session_start();
	$account = $_SESSION['account'] ;
	if ( isset($account) && isset($_POST['choose'])) {
		$code = $_POST['choose'] ;
		try{
			$check = "SELECT Person_id FROM class WHERE Person_id = '$account' AND Code ='$code';";
			$add = "INSERT INTO class(Code,Person_id) VALUES ('$code','$account');";
			$db = new PDO('mysql:host=localhost;dbname=class_database',$connect_un,$connect_pw);
			$result = $db->exec($check);
			if(empty($result)){
				$row = $db->exec($add);
				print "$row";
				print<<<_END
				<script>
				alert ("加選成功");
				setTimeout(function(){window.location.href='login.html';},1000);
				</script>
				_END;
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