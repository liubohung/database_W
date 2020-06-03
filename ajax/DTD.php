<?php
    require_once("conect.php");
    if(isset($_POST['T_id'])){
        $Teacher_id = $_POST['T_id'];
        try{
            $db = new PDO('mysql:host=localhost;dbname=class_database',$connect_un,$connect_pw);
            $sql_del = "DELETE FROM teacher WHERE Teacher_id = '$Teacher_id';";
            $db->query($sql_del);
            print<<<_END
                <script>
                    alert("刪除成功");
                </script>
            _END;
        }catch(PDOException $execption){
            echo "Connection failed" . $execption->getMessage();
        }
        header("refresh:0;url=delete_teacher.php");
    }
?>