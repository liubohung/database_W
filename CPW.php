<?php
	session_start();
	if(isset( $_SESSION['account'])){
		$ac = $_SESSION['account'];
		require_once("conect.php");
		$ps1 = $_POST['change'];
		$ps2 = $_POST['check'];
		if( $ps1 == $ps2 ){
			$pwd_h = password_hash($ps1, PASSWORD_DEFAULT);
			$change_spw_sql = "UPDATE student SET Password = '$pwd_h' WHERE Student_id = '$ac';";
			$db = new PDO('mysql:host=localhost;dbname=class_database',$connect_un,$connect_pw);
			$cc = $db->query($change_spw_sql);
			print<<<_END
					<script>
					alert ("修改成功請重新登入");
					setTimeout(function(){window.location.href='Home.html';},1000);
					</script>
				_END;
			setcookie(session_name(),'',time() - 2592000,'/');
			session_destroy();
		}else{
			print<<<_END
					<script>
					alert ("請重新更改");
					setTimeout(function(){window.location.href='welcome2.php';},1000);
					</script>
				_END;
		}

	}else{
		header("refresh:0;url=Home.html");
	}
?>