<?php
    header("Content-type: application/json; charset=utf-8");
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['Class']) && isset($_POST['Collage'])) { 
            require_once("Noname.php");
            $class = $_POST['Class']; 
            $collage = $_POST['Collage']; 
            $ALLHELD = "SELECT * FROM class_detail WHERE Class = '$class' and College = '$collage';";
            $db = new PDO('mysql:host=localhost;dbname=class_database',$connect_un,$connect_pw);
            $cdata = $db->query($ALLHELD);
            $rows = $cdata->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($rows,JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(array('errorMsg' => '資料未輸入完全！'));
        }
    } else {
        echo json_encode(array('errorMsg' => '請求無效，只允許 POST 方式訪問！'));
    }
?>