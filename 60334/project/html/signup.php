<?php
  

    
// Connect to user data base
$servername = "localhost";
$username = "wehelie_jobs";
$dbpassword = "mypassword";
$database="wehelie_jobs";

// Create connection
$conn = new mysqli($servername, $username, $dbpassword,$database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
 
    
    
    
$email = $_POST['email'];// what the signup form has for the id
$first_name = $_POST['first_name'];// what the signup form has for the id
$last_name = $_POST['last_name'];// what the signup form has for the id
$type=$_POST['type'];
$password = $_POST['psw'];// what the signup form has for the id
$pwdrepeat= $_POST['psw-repeat'];// what the signup form has for the id



    
    
    
     if($password != $pwdrepeat )
     {
        
        
        // code to send user back to the starting pg
        header('Location: signupForm.php?error=passwordcheck&email='.$email.'&first_name='.$first_name.'&last_name='.$last_name);
        exit();
    }
    


    else
    {
        $sql="INSERT INTO USERS (email, Password, first_name, last_name, type) VALUES(?,?,?,?,?)";
        $stmt= mysqli_stmt_init($conn);
                
        if(!mysqli_stmt_prepare($stmt,$sql))
            {
                
                //send user home
                header('Location: signupForm.php?error=sqlerror');
                exit();
            }
            
    
        else
            {
                $salt1="YU^&";
                $salt2="HB$#";
                $hashpwd=hash( 'ripemd128',"$salt1$password$salt2");
                
               
                mysqli_stmt_bind_param($stmt,"ssssi",$email, $hashpwd, $first_name, $last_name,$type);
                mysqli_stmt_execute($stmt);
                header('Location: post_table.php?signup=success');
                exit(); 
                
                
            }        
    
        
    }
    

    
    
    
    
   
    




?>