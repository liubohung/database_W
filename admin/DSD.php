<?php
    require_once("conect.php");
    if(isset($_POST['S_id'])){
        $Student_id = $_POST['S_id'];
        try{
            $db = new PDO('mysql:host=localhost;dbname=class_database',$connect_un,$connect_pw);
            $sql_del = "DELETE FROM student WHERE Student_id = '$Student_id';";
            $db->query($sql_del);
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