<!DOCTYPE html>
<html>
<head>
	<title>Delete Student data</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist\css\bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>     
    <script src="bootstrap-3.3.7-dist\js/bootstrap.min.js"></script>
</head>
<body>
<script>
	function post_sub(PARAMS) {        
    			var temp = document.createElement("form");        
    			temp.action = "DTD.php";        
    			temp.method = "post";        
    			temp.style.display = "none";
    			var opt = document.createElement("input");        
        		opt.name = 'T_id';        
        		opt.value = PARAMS;
        		temp.appendChild(opt);        
    			document.body.appendChild(temp);        
    			temp.submit();        
    			return temp;        
	}
    $("#button_s").click(function(){
        $( "#mytbody" ).empty();
		$( "#mytbody" ).append("<tr id=\"T_id\"></tr><tr id=\"name\"></tr><tr id=\"college\"></tr><tr id=\"department\"></tr><tr id =\"class\"></tr><tr id=\"mail\"></tr><tr id=\"level\"></tr>");
        $.ajax({
            type: "POST",
            url: "DT.php",
            dataType: "html",
            data: {
                Class: $("#member").val(),
                Collage: $("#department").val(),
            },
            error: function(xhr) {
                alert('Ajax request 發生錯誤');            
			},
            success: function(msg){
                var array_return =  $.parseJSON ( msg );
				if(array_return['errorMsg'] == "SQL Connection failed" || array_return['errorMsg'] == "only POST"){
					alert("發生錯誤");
				}else{
					var dii = "<td>";
                    var eddi = "</td>";
					$("#T_id").append("<td>教師id</td>" +dii + array_return['Teacher_id'] + eddi);
					$("#name").append("<td>名字</td>" + dii + array_return['Name'] + eddi);
					$("#college").append("<td>學院</td>"+dii+array_return['College'] + eddi);
					$("#department").append("<td>系級</td>"+dii+array_return['Department'] + eddi);
					$("#class").append("<td>班級</td>"+dii+array_return['Class'] + eddi);
					$("#mail").append("<td>信箱</td>"+dii+array_return['Email'] + eddi);
					$("#level").append("<td>職別</td>"+dii+array_return['Level'] + eddi);
					$("mydiv").append("<input name=\"button_del\" value=\"刪除\" onclick =\"post_sub(" + array_return['Teacher_id'] + ")\">");
				}  
            }
        });
    });
    </script>
	<h1>刪除教師資料</h1>
	<form>
		<select name="查詢項目">
		　<option value="id">教師id</option>
		　<option value="name">姓名</option>
		</select>
		<input type="text" name="Teacher_id">
		<input type="submit" id="button_s" value="查詢"/>
	</form>
	<table id="mydiv" border="1" align="center"><tbody id ="mytbody">
	</tbody></table>
</body>
</html>
