<!DOCTYPE html>
<html>
<head>
</head>
<?php 
	function research(){
		print<<<_END
			<script>
			alert ("請重新查詢");
			setTimeout(function(){window.location.href='searchtry.php';},1000);
			</script>
		_END;
	}
	require_once("Noname.php");
	if ( isset($_POST['search_class'] )) {
		$code = intval( $_POST['search_class'] );
		if($code == 0){
			 research();
		}else{
			$db = new PDO('mysql:host=localhost;dbname=class_database',$connect_un,$connect_pw);
			$cusr = $db->query("SELECT * FROM class_detail WHERE Code = '$code';");
			$row = $cusr->fetch(PDO::FETCH_BOTH);
			if(empty($row[0])){
				research();
			} else {
				$good = array('開課班級','課程名稱','選課代號','學分數','必選修','開課單位','開課人數','已收授人數','授課教師');
				print "<div style=\"text-align:center\";>";
				print " <table width=\"300\" border=\"0\"> ";
				for($i =0 ; $i<9; $i++) {
					print "<tr>
　							<td> $good[$i] </td>
							<td> $row[$i] </td>
							</tr> ";
				}
				print "</table>";
				print "<input type=\"button\" value=\"返回查詢\" onclick=\"location.href='searchtry.php'\"> ";
				print "</div>";
			}
		}
	}else{
		research();
	}
?>
</body>
</html>