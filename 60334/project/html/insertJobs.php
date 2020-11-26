<!DOCTYPE html>
<html>
    
<head>
      <title>Job Post Inserted</title>
   </head>    

    
<body>

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
echo "Insert successful. Hit the button to go back the last pg.";
echo<<<_END
<button type="button" onclick="javascript:history.back()">Back</button> 
_END;
        foreach ($_POST['Job'] as $value) {

     $query    = "INSERT INTO ADDED_JOBS Select * from JOB_POST where id =".$value;
      $result   = $conn->query($query);

  	if (!$result) echo "INSERT failed: $query<br>" .
      $conn->error . "<br><br>";   

}
		$result->close();  
		$conn->close();         
       function get_post($conn, $var)  {    
		return $conn->real_escape_string($_POST[$var]);  
		}         
?>


</body>
</html>