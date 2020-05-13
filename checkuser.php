<?php
	require_once("conect.php");
	if ( isset($_POST['Name']) && isset($_POST['Email']) ) {
		$email = $_POST['Email'];
		$name = $_POST['Name'];
		try{
			$db = new PDO('mysql:host=localhost;dbname=class_database',$connect_un,$connect_pw);
			$cusr=$db->query("SELECT Name FROM user WHERE Name = '$name';");
			$row1=$cusr->fetch(PDO::FETCH_BOTH);
			if(empty($row1[0])){
				$password_hash = password_hash($password, PASSWORD_DEFAULT);
				$q= "INSERT INTO user (Name,Email,Phone,Password) VALUES ('$name','$email','$phone','$password_hash');";
				$result = $db->exec($q);
				if ($result === false) {
					$error = $db->errorinfo();
					$db =null;
					print "cant no insert";
					print<<<_END
					<script>
					setTimeout(function(){window.location.href='newuser.html';},1000);
					</script>
					_END;
				} else {
					$db =null;
					print<<<_END
					<script>
					alert ("成功註冊");
					setTimeout(function(){window.location.href='Home.html';},1000);
					</script>
				_END;
				}
			}else{
				$db =null;
				print<<<_END
				<script>
				alert ("請重新輸入,");
				setTimeout(function(){window.location.href='newuser.html';},1000);
				</script>
				_END;
			}
		}catch (PODException $e){
			print "couldn't to connect to db " . $e->getMessage();
		}
	}else{
		print<<<_END
				<script>
				alert ("請再次重新輸入");
				setTimeout(function(){window.location.href='newuser.html';},10000);
				</script>
		_END;
	}
?>