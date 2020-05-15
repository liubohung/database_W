<input type="button" onmousedown="alert('Hello')" value="測試按鈕">



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
						<script type="text/javascript">
						if (confirm("該課為必修是否確定退選") ) {
							alert ("退選成功");
							var ans="YES";
							location.href="subclass.php?value=" + ans; 
						} else {
							alert ("請小心注意退選課程");
							setTimeout(function(){window.location.href='welcome2.php';},1000);
						}   
						</script>
					_END;
					$ans = $_GET['ans'];
					if ($ans == 'YES'){
						$row = $db->exec($sub);
					}
				}else{
					print<<<_END
						<script>
						alert ("退選成功");
						</script>
					_END;
					$row = $db->exec($sub);
				}
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
	header("refresh:0;url=welcome2.php");
	}
?>

