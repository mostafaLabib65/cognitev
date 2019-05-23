<!doctype html>
<html>
    <head>
        <script type='text/javascript' src='https://canvasjs.com/assets/script/canvasjs.min.js'></script>
        <script type='text/javascript'>

            <?php
                echo " window.onload = function () {";
                $index = 0;
                foreach ($data as $chart){
                    echo "chart = new CanvasJS.Chart('chartContainer' + $index,{
                          title:{
                          text: 'Graph'+$index
                          },
                          data:[
                          {
                            type: 'column',
                            dataPoints:[";
                    foreach($chart as $rows)
                    {
                        $label1 = current($rows);
                        $label2 = next($rows);
                        $label = "$label1 - $label2";
                        echo "{label:'{$label}',y:{$rows->count}},";
                    }
                    echo "]}]});
                         chart.render();";
                    $index = $index+1;
                }
                echo "}";
            ?>
        </script>

    </head>
<body>
<?php
    $no_of_charts = count($data);
    for($i=0; $i < $no_of_charts; $i++){
        echo "<div id='chartContainer$i' style='height: 270px; width: 40%;'></div>";
    }
?>

</body>
</html>
