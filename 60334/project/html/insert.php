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
        
       
       if (isset($_POST['ID'])   &&
           isset($_POST['Job_Name'])   &&
      isset($_POST['Employer'])    &&
      isset($_POST['Contact']) &&
      isset($_POST['City']) &&
      isset($_POST['Type'])     &&
      isset($_POST['Education']) &&
      isset($_POST['Salary'])){   
      
    

  	
    $ID   = get_post($conn, 'ID');
    $Job_Name   = get_post($conn, 'Job_Name');
    $Employer    = get_post($conn, 'Employer');
    $Contact = get_post($conn, 'Contact');
    $City = get_post($conn, 'City');
    $Type     = get_post($conn, 'Type');
    $Education     = get_post($conn, 'Education');
    $Salary     = get_post($conn, 'Salary');
    
    
     $query    = "INSERT INTO JOB_POST VALUES" .
      "($ID,'$Job_Name', '$Employer', '$Contact','$City', '$Type', '$Education', '$Salary')";
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