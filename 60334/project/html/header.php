<?php

    session_start();

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
  
  
</head>
    
_END;

 if(isset($_SESSION['username']) && $_SESSION['type'] ==2 )
        {
            
            echo<<<_END
             <header>
      <h1 class="jobs">JobS</h1>
 
            
          <div class="dropdown">
  <button class="button dropbtn" style="float: top-right;">Options</button>
  <div class="dropdown-content">
  <a href="employer_pg.php"> Employer Profile</a>
  <a href="logout.php">Logout</a>
  
  
  </div>
</div>
    </header>         
_END;
            
        }
        
        
        
        
     else if(isset($_SESSION['username']) && $_SESSION['type']==1 )
        {
           
            echo<<<_END
             <header>
      <h1 class="jobs">JobS</h1>
 
            
            <div class="dropdown">
  <button class="button dropbtn" style="float: top-right;">Options</button>
  <div class="dropdown-content">
  <a href="profile_pg.php">Seeker Profile</a>
  <a href="post_table2.php">Add Jobs</a>
  <a href="logout.php">Logout</a>
  
  
  
  
  
  </div>
    </header>         
_END;
            
        }

else{
    
     echo <<<_END
  <header>
      <h1 class="jobs">JobS</h1>
      <button class="button button2" style="float: top-right;"onclick="document.getElementById('id01').style.display='block'">Login</button>
  </header>  
_END;
}





echo<<<_END

  

<ul id= "taskbar">
  <li><a class="active" href="home_pg.php">Home</a></li>
  <li><a href="post_table.php">Find Postings</a></li>
  <li><a href="about.php">Contact</a></li>
</ul>


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


/* Conditionals

 if(isset($_SESSION['username']))
        {
            
            echo"You're logged in";
            echo<<<_END
             <header>
      <h1 class="jobs">JobS</h1>
 
            
            <div class="dropdown">
  <button class="dropbtn">Dropdown</button>
  <div class="dropdown-content">
  <a href="#">Link 1</a>
  <a href="#">Link 2</a>
  <a href="#">Link 3</a>
  </div>
</div>
    </header>         
_END;
            
        }

else{
    
     echo <<<_END
  <header>
      <h1 class="jobs">JobS</h1>
      <button class="button button2" style="float: top-right;"onclick="document.getElementById('id01').style.display='block'">Login</button>
  </header>  
_END;
}


 if(isset($_SESSION['ID']))
 {
     // code for logged in user
     
     
     
 }
 
 
 
 else
 {
     
     echo <<<_END
  <header>
      <h1 class="jobs">JobS</h1>
      <button class="button button2" style="float: top-right;"onclick="document.getElementById('id01').style.display='block'">Login</button>
  </header>  
    


<ul id= "taskbar">
  <li><a class="active" href="#home">Home</a></li>
  <li><a href="#news">Find Postings</a></li>
  <li><a href="#contact">Advanced Search</a></li>
  <li><a href="#contact">Contact</a></li>
  <li><a href="#about">About</a></li>
</ul>


<!-- The Modal -->
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'"
class="close" title="Close Modal">&times;</span>

  <!-- Modal Content -->
  <form class="modal-content animate" action="login.php" method="post">
    <div class="imgcontainer">
      <img src="../pictures/default.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="mail" required>

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
     
     
 }




*/



?>