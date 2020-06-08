<?php
	require_once("conect.php");
	if ( isset($_POST['Account']) && isset($_POST['Email']) ) {
		$email = $_POST['Email'];
		$account= $_POST['Account'];
		try{
			$db = new PDO('mysql:host=localhost;dbname=class_database',$connect_un,$connect_pw);
			$cusr=$db->query("SELECT Email FROM student WHERE Student_id = '$account';");
			$row1=$cusr->fetch(PDO::FETCH_BOTH);
			if($email == $row1){
				$message = Swift_Message::newInstance();
				$message->setFrom("127.0.0.1");
				$message->setTo($email);
				$message->setSubject("Change Password");
				$message->setBody(<<<_TEXT_
				If you need to change password;
				please go to here;
				_TEXT_);
			}else{
				$db =null;
				alert("請重新輸入");
				header("refresh:0;url=cwdsearch.php");
			}
		}catch (PODException $e){
			print "couldn't to connect to db " . $e->getMessage();
		}
	}else{
		alert("請再次重新輸入");
		header("refresh:0;url=cwdsearch.php");
	}
?>