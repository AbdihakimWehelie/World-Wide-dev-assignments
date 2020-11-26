<?php
   
  
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

 
$email =$_POST["userid"];
$password = $_POST["psw"];// what the signup form has for the id

$salt1="YU^&";
$salt2="HB$#";
$hashpwd=hash( 'ripemd128',"$salt1$password$salt2");





   
    $query  = "SELECT * FROM USERS WHERE email= '$email' ";
  $result = $conn->query($query);
  if (!$result) die ("Database access failed: " . $conn->error);

  $rows = $result->num_rows;
  
  for ($j = 0 ; $j < $rows ; ++$j)
  {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);

if (strcmp($hashpwd,$row[3]) ==0)
  //if($hashpwd== $row[3])
  {
    echo <<<_END
  <pre>
        ID  $row[0]
      email $row[1]
  Made date $row[2]
   Password $row[3]
 First Name $row[4]
 Last Name  $row[5]
  </pre>
  <form action="sqltest.php" method="post">
  <input type="hidden" name="delete" value="yes">
  <input type="hidden" name="isbn" value="$row[4]">
  <input type="submit" value="DELETE RECORD"></form>
_END;
  

  
    
session_start();
$_SESSION['username'] = $email;
$_SESSION['password'] = $hashpwd;
$_SESSION['forename'] = $row[4];
$_SESSION['surname'] = $row[5];
$_SESSION['type']= $row[6];
echo "$row[4] $row[5] : Hi $row[4],
you made the account '$row[2]'";

if($_SESSION['type']==1){
    header("Location: post_table2.php");
}

else if($_SESSION['type']==2){
    header("Location: home_pg.php");
}
      
  }else
  echo " the username/password don't match our record";
  
}

   
   
?>