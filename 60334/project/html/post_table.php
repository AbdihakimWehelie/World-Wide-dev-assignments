<?php // sqltest.php




   require "header.php";






    echo<<<_END
    <html>
<body>
<head>
   <link rel="stylesheet" type="text/css" href="../css/main_css.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
  
   <script>

var modal = document.getElementById('id01');


window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script> 
  
  
</head>
    
_END;

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




if (isset($_POST['Job Name'])   &&
      isset($_POST['Employer'])    &&
      isset($_POST['City']) &&
      isset($_POST['Type'])     &&
      isset($_POST['Education']) &&
      isset($_POST['Salary']))
  {
    $Job   = get_post($conn, 'Job Name');
    $Employ    = get_post($conn, 'Employer');
    $City = get_post($conn, 'City');
    $Type     = get_post($conn, 'Type');
    $Edu     = get_post($conn, 'Education');
    $Salary     = get_post($conn, 'Salary');
    $query    = "INSERT INTO JOB_POST VALUES" .
      "('$Job', '$Employ', '$City', '$Type', '$Edu', '$Salary')";
    $result   = $conn->query($query);

  	if (!$result) echo "INSERT failed: $query<br>" .
      $conn->error . "<br><br>";
  }



  echo <<<_END
  
  
  
  
  
  

<!-- The Modal -->
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'"
class="close" title="Close Modal">&times;</span>

  <form class="modal-content animate" action="loginTest.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="../pictures/default.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="userid"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="userid" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
        
      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div> 
  
  
  
  
  
  
  
  
  
_END;

 $sql = "SELECT * FROM JOB_POST";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Job Name</th><th>Employer</th><th>Contact</th><th>City</th><th>Type</th><th>Education</th><th>Salary</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["ID"]."</td><td>" . $row["Job Name"]. "</td><td>" . $row["Employer"]. "</td><td>" .$row["Contact"]. "</td><td>". $row["City"]."</td><td>". $row["Type"]. "</td><td>" . $row["Education"]."</td><td>" . $row["Salary"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();







?>
</body>
</html>

<?php // sqltest.php

   require "footer.php";
?>