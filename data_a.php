<?php
	session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
	    <title>選課資料</title>
	    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist\css\bootstrap.min.css">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>     
	    <script src="bootstrap-3.3.7-dist\js/bootstrap.min.js"></script>
        <script src="http://d3js.org/d3.v3.min.js"></script>
        <style>
            body{
			    background-color: #eaf3db; 
		    }
            .bar{
                fill: blue;
            }
        </style>
    </head>
    <?php
        include "func.php";
        nav_judge();
    ?>
        <script>
            window.addEventListener('load',function(){
                var data=[
                <?php
                    require_once("Noname.php");
                    $ALLHELD = "SELECT * FROM class_detail ;";//WHERE Class = '$class' and College = '$collage';
                    $db = new PDO('mysql:host=localhost;dbname=class_database',$connect_un,$connect_pw);
                    $cdata = $db->query($ALLHELD);
                    $rows = $cdata->fetchAll(PDO::FETCH_ASSOC);
                    $i = 0;
                    foreach($rows as $row){
                        print "{ x:"; 
                        print $i;
                        print ",w:";
                        print $row['Nownum'];
                        print ",na:\"";
                        print $row['Name'];
                        print "\"},";
                        $i++;
                    }
                ?>];
                var s = d3.select('body')
                        .append('svg')
                        .attr({
                            'width':'90%',
                            'height':'100%'
                        })
                        .style({
                            'margin' : '5%',
                            'border':'1px solid #000'
                        });

                s.selectAll('rect')
                .data(data)
                .enter()
                .append('rect')
                .attr({
                'fill':'#09c',
                'width':0,
                'height':30,
                'x':0,
                'y':function(d){
                    return (d.x-1) * 35;
                }
                })
                .transition()
                .duration(1500)
                .attr({
                'width':function(d){
                    return d.w;
                }
                });
                s.selectAll('text')
                .data(data)
                .enter()
                .append('text')
                .text(function(d){
                return 0  ;
                })
                .attr({
                'fill':'#000',
                'x':3,
                'y':function(d){
                    return d.x * 35 - 12;
                }
                })
                .transition()
                .duration(1500)
                .attr({
                'x':function(d){
                    return d.w + 3;
                }
                })
                .tween('number',function(d){
                    var i = d3.interpolateRound(0, d.w);
                    return function(t) {
                    this.textContent = i(t)+ d.na;
                    }
                });
                },false);

    </script>
    <body style="height:10000px">
        
    </body>
</html>