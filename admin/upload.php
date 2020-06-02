<?php
header("Content-Type:text/html; charset=utf-8");

if($_FILES["file"]["error"]>0){
	echo "錯誤没有上傳檔案" . $_FILES["file"]["name"]."<br/>";
}
else{
	//echo "檔案名稱: " . $_FILES["file"]["name"]."<br/>";
	//echo "檔案類型: " . $_FILES["file"]["type"]."<br/>";
	//echo "檔案大小: " . ($_FILES["file"]["size"] / 1024)." Kb<br />";
	//echo "暫存名稱: " . $_FILES["file"]["tmp_name"];
	$file = $_FILES['file']['tmp_name'];
	$dest = 'upload/' . $_FILES['file']['name'];
	move_uploaded_file($file, $dest);
	if (!$fp = fopen($dest,"r")) 
	{  //假如開啟錯誤
		echo "Cannot open $dbname\n";  //顯示錯誤
		exit;
		}
	else
		{  //開啟成功
			$size = filesize($dest)+1;  //取得筆數
			$row=0;  //從0筆開始讀取
			while($temp=fgetcsv($fp,$size,",")){  //讀取csv資料給temp陣列
			if ($row>0)
			{  //假如筆數大於0
				echo $temp[0]. " " . $temp[1]."<br/>";
			}
			$row=$row+1; 
		}
		fclose($fp);  //關閉檔案
	}
}

?>