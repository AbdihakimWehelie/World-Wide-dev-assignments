<!DOCTYPE html>
<?php
$hn = 'localhost'; //hostname
    $db = 'wehelie_pbl'; //database
    $un = 'wehelie_pbl'; //username
   $pw = 'mypassword'; //password
    
  
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);
    
    echo "Connected successfully";

  $query  = "SELECT type, count(1) as cnt from classics group by type";



  $result = $conn->query($query);
  if (!$result) die ("Database access failed: " . $conn->error);


?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['type', 'number of books'],
          
      
          
<?php // sqltest.php

 
    

  $rows = $result->num_rows;
  
  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row[0]."', ".$row[1]."],";  
                          }  
                            
  
  $result->close();
  $conn->close();
  
  
?>




        ]);

        var options = {'title':'Book categories', 'width':550, 'height':400};

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
      <h1></h1>
    <div id="piechart" style="width: 900px; height: 500px;">
        Pie Chart
    </div>
  </body>
</html>