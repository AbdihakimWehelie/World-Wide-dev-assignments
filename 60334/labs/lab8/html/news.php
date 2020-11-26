<!DOCTYPE html>
<html lang="en">
<head>
  <title>News</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/jquery-3.5.1.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</head>
<body>
<div class="jumbotron text-center">
  <h1>Abed News</h1>
  <p>Resize this responsive page to see the effect!</p> 
</div>
<div class="container">
  <div class="row">
<?php 
   $hn = 'localhost'; //hostname
    $db = 'wehelie_database'; //database
    $un = 'wehelie_database'; //username
   $pw = 'mypassword'; //password
   
   
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);
  $query  = "SELECT * FROM news";
  $result = $conn->query($query);
  if (!$result) die($conn->error);
  $rows = $result->num_rows; 
for ($j = 0 ; $j < $rows ; ++$j){
  echo '<div class="col-sm-4">';
  $result->data_seek($j);    
echo '<h3>'. $result->fetch_assoc()['title']   . '</h3> ' ; 
 $result->data_seek($j);  
echo $result->fetch_assoc()['news'] ;
echo '</div>'; }  
echo '</div>';
?>  
</div>
</body> </html>