<!DOCTYPE html>
<?php // sqltest.php

   require "header.php";
?>



<html>
<body>
<head>
 
</head>
 <style>
 .container {
  
  background-color:#34439a;
  display: grid;
  grid-template-columns: 20% 80%;
  grid-template-rows: auto;
  grid-template-areas: 
    "header header header header"
    "main main . sidebar"
    "footer footer footer footer";
    
   /* width: 960px;*/
position: relative;
margin:0 auto;
line-height: 1.4em;
}



.container > div{
    
  background-color: rgba(255, 255, 255, 0.8);
  border: 1px solid rgba(0, 0, 0, 0.8);
  text-align: center;
  padding: 20px 0;
  font-size: 30px;
    
}

@media only screen and (max-width: 479px){
    #container2 { width: 90%; }
}

.responsive {
  max-width: 100%;
  height: auto;
}
     
     
 </style>
 

<header> 

</header>


<div class="container" class="responsive">
    
    <div class="item1">Job Seeker
    <img src="../pictures/default.png" class="responsive">
    </div>
  
  
  <div class="item2">Added Jobs

  <?php
  
  $servername = "localhost";
$username = "wehelie_jobs";
$password = "mypassword";
$database="wehelie_jobs";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}




 if (isset($_POST['delete']) && isset($_POST['ID']))
  {
      foreach ($_POST['ID'] as $value) {

     $query    ="DELETE FROM ADDED_JOBS WHERE id = " .$value;
      $result   = $conn->query($query);

  	if (!$result) echo "DELETE failed: $query<br>" .
      $conn->error . "<br><br>";   
      }  
    
  }

  if (isset($_POST['Job Name'])   &&
      isset($_POST['Employer'])    &&
      isset($_POST['Contact']) &&
      isset($_POST['City']) &&
      isset($_POST['Type'])     &&
      isset($_POST['Education']) &&
      isset($_POST['Salary']))
  {
    $Job   = get_post($conn, 'Job Name');
    $Employ    = get_post($conn, 'Employer');
    $Contact = get_post($conn, 'Contact');
    $City = get_post($conn, 'City');
    $Type     = get_post($conn, 'Type');
    $Edu     = get_post($conn, 'Education');
    $Salary     = get_post($conn, 'Salary');
    $query    = "INSERT INTO ADDED_JOBS VALUES" .
      "('$Job', '$Employ', '$Contact','$City', '$Type', '$Edu', '$Salary')";
    $result   = $conn->query($query);

  	if (!$result) echo "INSERT failed: $query<br>" .
      $conn->error . "<br><br>";
  }


  
  
     $sql = "SELECT * FROM ADDED_JOBS";
    $result = $conn->query($sql);
  if (!$result) die ("Database access failed: " . $conn->error);

  $rows = $result->num_rows;
  
  echo <<<_END
  
  <script src="../js/checkboxes.js "></script>
    <form action="profile_pg.php" method="post">
    
  <input type="hidden" name="delete" value="yes">
  <input type="submit"  value="DELETE RECORD">
  <table>
  <thread>
  <th>ID</th>
  <th>Job Name</th>
  <th>Employer</th>
  <th>Contact</th>
  <th>City</th>
  <th>Type</th>
  <th>Education</th>
  <th>Salary</th>
  <th><input type="checkbox" id= "check" onclick= "check_all(this)">
  
  </thread>
  
  
  
  
_END;
  
  
  for ($j = 0 ; $j < $rows ; ++$j)
  {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);

    echo <<<_END
   <link rel="stylesheet" type="text/css" href="../css/table.css">
  <tr>
  <td> $row[0]</td>
  <td> $row[1]</td>
  <td> $row[2]</td>
  <td> $row[3]</td>
  <td> $row[4]</td>
  <td> $row[5]</td>
  <td> $row[6]</td>
  <td> $row[7]</td>
  <td>
  <input type="checkbox" name= "ID[]" value="$row[0]">
  <input type="hidden" name="delete" value="yes">
  <input type="hidden" name="add" value="yes">
  
 
  
_END;
  }
  
  echo"</table></form>";
  
  $result->close();
  $conn->close();
  
  function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }
  
  
  ?>
  
 




</body>
</html>