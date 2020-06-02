<?php
require_once "conect.php";
session_start();
if (isset($_SESSION['account']) && isset($_POST['subchoose'])) {
	$account = $_SESSION['account'];
	$code = $_POST['subchoose'];
	if ($code == 0) {
		print <<<_END
					<script>
					alert ("退課有誤");
					</script>
					_END;
	} else {
		try {
			$check = "SELECT class.Code,Haveto FROM class JOIN class_detail ON class.Code = class_detail.Code WHERE Person_id = '$account' AND class.Code ='$code'; ";
			$db = new PDO('mysql:host=localhost;dbname=class_database', $connect_un, $connect_pw);
			$do_it = $db->query($check);
			$result = $do_it->fetch(PDO::FETCH_ASSOC);

			if (!empty($result)) {
				if ($result['Haveto'] == 'M') {
					print <<<_END
						<script>
							alert ("該課為必修請小心退選課程");
						</script>
					_END;
				}
				$sub_class_sql_T = "
				BEGIN;
				DELETE FROM class WHERE Person_id = '$account' AND Code = '$code';
				UPDATE class_detail SET Nownum = Nownum - 1 WHERE Code ='$code';
				UPDATE student SET Credit = Credit - (SELECT DISTINCT Credit FROM class_detail WHERE Code='$code') WHERE Student_id =  '$account';
				COMMIT;";
				$sub = "DELETE FROM class WHERE Person_id = '$account' AND Code ='$code';";
				$sub_class_sql = "UPDATE class_detail SET Nownum = Nownum - 1 WHERE Code='$code';";
				$sub_total = "UPDATE student SET Credit = Credit - (SELECT DISTINCT Credit FROM class_detail WHERE Code='$code') WHERE student_id = $account;";
				print <<<_END
					<script>
					alert ("退選成功");
					</script>
					_END;
				$row = $db->query($sub_class_sql_T);
				// $row = $db->exec($sub_class_sql);
			} else {
				print <<<_END
				<script>
				alert ("無法退選");
				</script>
				_END;
			}
		} catch (PDOException $e) {
			print " Could't create table" . $e->getMessage();
		}
	}
	$db = null;
	$db = null;
	switch($_SERVER['HTTP_REFERER']){
		case "http://127.0.0.1/database_W/trypull.php":
			header("refresh:0;url=trypull.php");
		break;
		case "http://127.0.0.1/database_W/welcome2.php":
			header("refresh:0;url=welcome2.php");
		break;
		default:
			header("refresh:0;url=welcome.php");
	}
}
?>