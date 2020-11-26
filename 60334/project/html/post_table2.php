<?php // sqltest.php

   require "header.php";
?>



<?php // sqltest.php

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
  
  
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[5];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script> 


<script>
function edusearch() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput2");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[6];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

  
<script>
function employsearch() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput3");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>  
  
  
</head>
    
_END;




  echo <<<_END
  
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search by job type" title="Type in a name">

<br><br><input type="text" id="myInput2" onkeyup="edusearch()" placeholder="Search by Education" title="Education">

<br><br><input type="text" id="myInput3" onkeyup="employsearch()" placeholder="Search by Employer" title="Employer">

<br><br><br>  
  
  
  

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
    $query    = "INSERT INTO ADDED_JOBS VALUES" .
      "('$Job', '$Employ', '$City', '$Type', '$Edu', '$Salary')";
    $result   = $conn->query($query);

  	if (!$result) echo "INSERT failed: $query<br>" .
      $conn->error . "<br><br>";
  }


  
  
     $sql = "SELECT * FROM JOB_POST";
    $result = $conn->query($sql);
  if (!$result) die ("Database access failed: " . $conn->error);

  $rows = $result->num_rows;
  
  echo <<<_END
  
  <script src="../js/checkboxes.js "></script>
    <form action="insertJobs.php" method="post">
    
  <input type="hidden" name="add" value="yes">
  <input type="submit"  value="ADD JOBS">
  <table id="myTable">
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
  <input type="checkbox" name= "Job[]" value="$row[0]">
  <input type="hidden" name="add" value="yes">
  

  </td></tr>
  
 
  
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

<?php // sqltest.php

   require "footer.php";
?>