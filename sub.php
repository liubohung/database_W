<?php
	session_start();
	$ans = $_GET['value'];
	$account = $_SESSION['account'] ;
	$sub = "DELETE FROM class WHERE Person_id = '$account' AND Code ='$ans';";
	$db = new PDO('mysql:host=localhost;dbname=class_database',$connect_un,$connect_pw);
	$do_it = $db->query($sub);
	print<<<_END
	<script>
	alert ("退選成功");
	</script>
	_END;
?>