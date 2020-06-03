<?php
    require_once("conect.php");
    header("Content-type: application/json; charset=utf-8");
    try{
        $db = new PDO('mysql:host=localhost;dbname=class_database',$connect_un,$connect_pw);
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['search_item'] == "id") && isset($_POST['Teacher_id'])) {
                $Teacher_id = $_POST['Teacher_id'];
                $sql_q= "SELECT * FROM teacher WHERE Teacher_id= '$Teacher_id';";
                $query = $db->query($q);
                $datalist = $query->fetch();
            }else if(isset($_POST['search_item'] == "name") && isset($_POST['Teacher_id'])){
                $Name = $_POST['Teacher_id'];
                $sql_q= "SELECT * FROM teacher WHERE Name= '$Name';";
                $query = $db->query($q);
                $datalist = $query->fetch();
            }
            echo json_encode($datalist,JSON_UNESCAPED_UNICODE);
        }else {
            echo json_encode(array('errorMsg' => 'only POST'));
        }
    }catch(PDOException $execption){
        echo json_encode(array('errorMsg' => "SQL Connection failed"));
    }

?>