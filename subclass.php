<?php
	require_once("conect.php");
	session_start();
	$account = $_SESSION['account'] ;
	if ( isset($account) && isset($_POST['subchoose'])) {
		$code = $_POST['subchoose'] ;
		try{
			$check = "SELECT Code FROM class WHERE Person_id = '$account' AND Code ='$code';";
			$sub = "DELETE FROM class WHERE Person_id = '$account' AND Code ='$code';";
			$db = new PDO('mysql:host=localhost;dbname=class_database',$connect_un,$connect_pw);
			$do_it = $db->query($check);
			$result = $do_it->fetch(PDO::FETCH_ASSOC);
			if(!empty($result)){
				$row = $db->exec($sub);
				print "$row";
				print<<<_END
				<script>
				alert ("退選成功");
				</script>
				_END;
			}else{
				print<<<_END
				<script>
				alert ("無法退選");
				</script>
				_END;
			}
		}catch(PDOException $e){
		print " Could't create table" . $e->getMessage();
	}
	header("refresh:0;url=welcome.php");
	}
?>

