<?php
	require_once("conect.php");
	session_start();
	$account = $_SESSION['account'] ;
	if ( isset($account) && isset($_POST['subchoose'])) {
		$code = $_POST['subchoose'] ;
		try{
			$check = "SELECT class.Code,Haveto FROM class JOIN class_detail ON class.Code = class_detail.Code WHERE Person_id = '$account' AND class.Code ='$code'; ";
			$sub = "DELETE FROM class WHERE Person_id = '$account' AND Code ='$code';";
			$db = new PDO('mysql:host=localhost;dbname=class_database',$connect_un,$connect_pw);
			$do_it = $db->query($check);
			$result = $do_it->fetch(PDO::FETCH_ASSOC);
			if(!empty($result)){
				if($result['Haveto'] == 'M'){
					print<<<_END
						<script>
							alert ("該課為必修請小心退選課程");
						</script>
					_END;
				}
				$sub_class_sql = "UPDATE class_detail SET Nownum = Nownum - 1 WHERE Code='$code';";
				print<<<_END
					<script>
					alert ("退選成功");
					</script>
					_END;
				$row = $db->exec($sub);
				$row = $db->exec($sub_class_sql);
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
	$db = null;
	header("refresh:0;url=welcome2.php");
	}
?>