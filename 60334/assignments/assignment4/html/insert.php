<!DOCTYPE html>
<html>
    
<head>
      <title>Record inserted</title>
   </head>    

    
<body>

<?php
          $hn = 'localhost'; //hostname
          $db = 'wehelie_users'; //database
          $un = 'wehelie_users'; //username
          $pw = 'mypassword'; //password
         
         
         
         $conn = new mysqli($hn, $un, $pw, $db);
         
         
         if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                        }
        
        echo "Connected successfully";
        
        if (isset($_POST['firstname'])   &&
      isset($_POST['lastname'])    &&
      isset($_POST['usertype'])     &&
      isset($_POST['email']) &&
      isset($_POST['password'])){  
    echo 111111;
    

  	
  
    $firstname = get_post($conn, 'firstname');
    $lastname = get_post($conn, 'lastname');
    $usertype = get_post($conn, 'usertype');
    $email = get_post($conn, 'email');
    $password = get_post($conn, 'password');
     echo $firstname . '   '.    $lastname;
    
     $query    = "INSERT INTO user_profiles VALUES" .
      "('$firstname', '$lastname', '$usertype', '$email', '$password')";
    $result   = $conn->query($query);
    
       if (!$result) echo "INSERT failed: $query<br>" .
      $conn->error . "<br><br>";
          
      }
  

    
    
		$stmt->close();  
		$conn->close();

    
         
       function get_post($conn, $var)  {    
		return $conn->real_escape_string($_POST[$var]);  
		} 
  
        
        
        
        
        
        
?>


</body>
</html>