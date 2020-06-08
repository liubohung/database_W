<?php
	session_start();
	require_once("conect.php");
	if ( isset($_POST['account']) && isset($_POST['password'])){
		$account = $_POST['account'];
		$pwd = $_POST['password'];
		$account_T = substr($account,0,1);
		switch($account_T){
			case 'D':
				try{
					$db = new PDO('mysql:host=localhost;dbname=class_database',$connect_un,$connect_pw);
					$cusr=$db->query("SELECT Student_id FROM student WHERE Student_id = '$account';");
					$row1=$cusr->fetch(PDO::FETCH_BOTH);
					if(empty($row1['Student_id'])){
						$db=null;
						alert("使用者不存在");
						header("refresh:0;url=chpwd.php");
					}else 
					{
						$cpwd=$db->query("SELECT Password FROM student WHERE Student_id = '$account';");
						$row2=$cpwd->fetch(PDO::FETCH_BOTH);
						if($row2 == "0000"){
							alert("請修改密碼");
							header("refresh:0;url=chpwd.php");
						}
						if(!password_verify( $pwd ,$row2['Password'])){
							alert("使用者名稱或密碼錯誤");
							header("refresh:0;url=login.php");
						}else{
							$_SESSION['account'] = $account;
							$_SESSION['pwd'] = $pwd;
							header("refresh:0;url=welcome.php");
						}
						$db=null;
					}
				}catch (PODException $e){
					print "couldn't to connect to db " . $e->getMessage();
				}
			break;
			case 'T':
				try{
					$db = new PDO('mysql:host=localhost;dbname=class_database',$connect_un,$connect_pw);
					$cusr=$db->query("SELECT Teacher_id FROM teacher WHERE Teacher_id = '$account';");
					$row=$cusr->fetch(PDO::FETCH_BOTH);
					if(empty($row1['Teacher_id']))
					{
						$db=null;
						alert("使用者不存在");
						header("refresh:0;url=login.php");
					}
					else
					{
						$cpwd=$db->query("SELECT Password FROM teacher WHERE Teacher_id = '$account';");
						$row2=$cpwd->fetch(PDO::FETCH_BOTH);
						if( $pwd != $row2[0])){
							alert("使用者名稱或密碼錯誤");
							header("refresh:0;url=login.php");
						}else{
								$_SESSION['T_account'] = $account;
							$_SESSION['T_pwd'] = $pwd;
							header("refresh:0;url=teacher/teacher_home.php");
						}
						$db=null;
					}
				}catch (PODException $e){
					print "couldn't to connect to db " . $e->getMessage();
				}
			break;
			case 'A':
				$db = new PDO('mysql:host=localhost;dbname=class_database',$connect_un,$connect_pw);
				$cusr=$db->query("SELECT Password FROM admin WHERE Admin_id = '$account';");
				$row=$cusr->fetch(PDO::FETCH_BOTH);
				if($pwd == $row[Password]){
					session_start();
					$_SESSION[A_account] = $account;
					$_SESSION[A_pwd] = $pwd;
					header("refresh:0;url=admin\admin.php");
					$db=null;
				}else{
					alert("使用者名稱或密碼錯誤");
					header("refresh:0;url=login.php");
				}
			break;
		}
	}else{
		alert("輸入不正確請重新輸入");
		header("refresh:0;url=login.php");
	}
?>