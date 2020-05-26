<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>searchtry</title>
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist\css\bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>     
    <script src="bootstrap-3.3.7-dist\js/bootstrap.min.js"></script>
    <style type="text/css">
        body{
            background-color: #eaf3db; 
        }
        .fromcss {
            line-height: 1.2em;
            font-style: italic;
            font-size:150%; 
        }
    </style>
</head>
<body>
<script>
        department = new Array();
        department[0] = ["企管一甲", "企管一乙", "企管二甲", "企管二乙", "企管三甲", "企管三乙", "企管四甲", "企管四乙", "企管碩一", "企管碩二"]; //企管系
        department[1] = ["通識－社會整合(SB)", "通識－社會(S)", "通識－社會(夜)(S)", "通識－人文(H)", "通識－人文(夜)(H)", "通識－自然(N)", "通識－自然(夜)(N)", "通識－統合(M)", "通識－統合(夜)(M)"];    //通識課
        department[2] = ["資訊一甲", "資訊一乙", "資訊一丙", "資訊二甲", "資訊二乙", "資訊二丙", "資訊二丁", "資訊三甲", "資訊三乙", "資訊三丙", "資訊三丁", "資訊碩一", "資訊博一", "資訊博二", "電腦系統學程資訊三", "軟體工程學程資訊三", "網路與資安學程資訊三", "資訊跨域學程資訊三"];  //資訊系
        function renew(index) {
            for (var i = 0; i < department[index].length; i++)
                document.myForm.member.options[i] = new Option(department[index][i], department[index][i]); // 設定新選項
            document.myForm.member.length = department[index].length;   // 刪除多餘的選項
        }
</script>
    <style type="text/css">
        select{
            height:20%;
            line-height:32px;
            font-size:14px;
            width:30%;
            border-bottom-style:solid;
            text-align: center;
            text-align-last: center;
            margin:20px auto;
            appearance:none;
            -webkit-appearance:none;
            -moz-appearance:none;
            -ms-appearance:none;
            -o-appearance:none;
            -khtml-appearance:none;
        }
    </style>
    <?php
	    include "func.php";
	    session_start();
	    nav_judge();
    ?>
    <div id="cccc" style="text-align:center">
    <form name="myForm">
        <fieldset>
            <div>
                <p>學院</p>
            </div>
        </fieldset>
        <div border="1px" style="float:left;width: 50%;height: 50%;">
            <p>系別：</p>
            <select id="department" onchange="renew(this.selectedIndex);">
                <option value="企業管理學系">企業管理系</option>
                <option value="通識核心課程">通識</option>
                <option value="資訊工程學系">資訊工程系</option>
            </select>
        </div>
        <div border="1px" style="float:right;width: 50%;height: 50%;">
            <p>班級：</p>
            <select id="member">
                <option value="">請由左方選取系別</option>
            </select>
        <input type="button" id="button_s" value="Search">
        </div>
    </form>
    </div>
    <div style="text-align:center;">
            <table id="mydiv" border="1" align="center"><tbody id ="mytbody"></tbody></table>
            <div id = "bbb"></div>
    </div>
<script>
    $("#button_s").click(function(){
        $( "#mytbody" ).empty();
        var hst = "<td><div style=\"text-align:center;\">開課班級</div></td>s <td><div style=\"text-align:center;\"> 課程名稱</div></td>s <td><div style=\"text-align:center;\">選課代號</div></td>s <td><div style=\"text-align:center;\">學分數</div></td>s <td><div style=\"text-align:center;\">必選修</div></td>s <td><div style=\"text-align:center;\">開課單位</div></td>s <td><div style=\"text-align:center;\">開課人數</div></td>s <td><div style=\"text-align:center;\">已收授人數</div></td>s <td><div style=\"text-align:center;\">授課教師</div></td>s ";
            $("#mytbody").append(hst);
        $.ajax({
            type: "POST",
            url: "getclass.php",
            dataType: "html",
            data: {
                Class: $("#member").val(),
                Collage: $("#department").val(),
            },
            error: function(xhr) {
                alert('Ajax request 發生錯誤');            },
            success: function(msg){
                var array_return =  $.parseJSON ( msg );
                console.log(array_return[0].Name);
                for(var i=0 ;i<msg.length;i++){
                    var dii = "<td style=\"height:40px\"><div style=\"text-align:center;\">";
                    var eddi = "</div></td>";
                    var str="";
                    str+="<tr>" + dii + array_return[i].Class + eddi;
                    str+= dii + array_return[i].Name + eddi;
                    str+= dii + array_return[i].Code + eddi;
                    str+= dii + array_return[i].Credit + eddi;
                    str+= dii + array_return[i].Haveto + eddi;
                    str+= dii + array_return[i].College + eddi;
                    str+= dii + array_return[i].Totalnum + eddi;
                    str+= dii + array_return[i].Nownum + eddi;
                    str+= dii + array_return[i].Teacher_Name + eddi+"</tr>";
                    $("#mytbody").append(str);
                }
            }
        });
    });
    </script>
</div>
</body>
</html>