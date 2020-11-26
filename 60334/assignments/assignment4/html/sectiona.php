<html>
   
   <head>
      <title>Add New Record in MySQL Database</title>
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
        
                  echo <<<_END
      <form action="insert.php" method="post"><pre>
           First name <input type="text" name="firstname">
           Last name <input type="text" name="lastname">
          Usertype <select name="usertype" id="usertype">
    <option value=1>1</option>
    <option value=2>2</option>
    </select>
           Email <input type="text" name="email">
           Password <input type="text" name="password">
           </pre><input type="submit" value="ADD RECORD"></form>
_END;
        
    
    if (isset($_POST['firstname'])   &&
      isset($_POST['lastname'])    &&
      isset($_POST['usertype'])     &&
      isset($_POST['email']) &&
      isset($_POST['password'])){  
    echo 111111;
    $stmt = $conn->prepare("INSERT INTO user_profiles(fname, lname, usercode, email, password) VALUES(?, ?, ?, ?, ?)");
    $firstname = get_post($conn, 'firstname');
    $lastname = get_post($conn, 'lastname');
    $usertype = get_post($conn, 'usertype');
    $email = get_post($conn, 'email');
    $password = get_post($conn, 'password');
     echo $firstname . '   '.    $lastname;
    
    $stmt->bind_param(" sssss", $firstname, $lastname, $usertype,  $email, $password); 
    
       	if (!$stmt) echo "INSERT failed: $query<br>" .
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