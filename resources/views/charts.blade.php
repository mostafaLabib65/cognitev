<!doctype html>
<html>
    <head>
        <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        <script type="text/javascript">
            window.onload = function () {
                var chart = new CanvasJS.Chart("chartContainer",{
                    title:{
                        text: "Graph"
                    },
                    data:[
                        {
                            type: "column",
                            dataPoints:[

                                <?php
                                foreach($data as $rows)
                                {
                                    $label1 = current($rows);
                                    $label2 = next($rows);
                                    $label = "$label1 - $label2";
                                    echo "{label:'{$label}',y:{$rows->count}},";
                                }
                                ?>



                            ]
                        }
                    ]
                });
                chart.render();
            }
        </script>
    </head>
<body>
<div id="chartContainer" style="height: 270px; width: 40%;"></div>
</body>
</html>
