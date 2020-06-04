<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <script src="http://d3js.org/d3.v3.min.js"></script>
        <style>
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
                        print "{ x:" + $i +",w:" + $row['Nownum'] +",na:" + $row['Name'] + "},";
                        $i++;
                    }
                ?>
                ];

                var s = d3.select('body')
                        .append('svg')
                        .attr({
                            'width':"70%",
                            'height':300
                        }).style({
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
                    };
                });
                },false);

    </script>
    <body>
        
    </body>
</html>