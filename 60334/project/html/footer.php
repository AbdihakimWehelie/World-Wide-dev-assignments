<?php

    session_start();

?>

<html>
<body>
<head>
  <link rel="stylesheet" type="text/css" href="../css/main_css.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
  <style>
.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: #0052cc;
   color: white;
   text-align: center;
}
</style>

  
</head>



<div class="footer">
    <?php
    if(!isset($_SESSION['username'])){
    echo<<<_END
    <button onclick="window.location='signupForm.php'" >Sign Up</button>
_END;
    }
 
  ?>
  <p>Copyright &copy; 2020  JobS</p>
  
</div>



</body>

</html>