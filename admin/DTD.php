<?php
    require_once("conect.php");
    if(isset($_POST['T_id'])){
        $Teacher_id = $_POST['T_id'];
        try{
            $db = new PDO('mysql:host=localhost;dbname=class_database',$connect_un,$connect_pw);
            $sql_del = "DELETE FROM teacher WHERE Teacher_id = '$Teacher_id';";
            $db->query($sql_del);
            //echo $sql_del;
            print<<<_END
                <script>
                    alert("刪除成功");
                </script>
            _END;
            echo "<meta http-equiv='refresh' content='0;url=delete_teacher.php' />";
        }catch(PDOException $execption){
            echo "Connection failed" . $execption->getMessage();
        }
    }
?>


<input type ="button" onclick="history.back()" value="回到上一頁">