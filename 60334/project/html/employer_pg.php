<?php // sqltest.php

   require "header.php";
?>



<html>
<body>
<head>
   <link rel="stylesheet" type="text/css" href="../css/main_css.css">
   
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
 <style>
 /* container used by the div*/
     .container {
  
  background-color:#34439a;
  display: grid;
  grid-template-columns: 20% 80%;
  grid-template-rows: auto;
  grid-template-areas: 
    "header header header header"
    "main main . sidebar"
    "footer footer footer footer";
}



.container > div{
    
  background-color: rgba(255, 255, 255, 0.8);
  border: 1px solid rgba(0, 0, 0, 0.8);
  text-align: center;
  padding: 20px 0;
  font-size: 30px;
    
}


.responsive {
  max-width: 100%;
  height: auto;
}

.container > item2{
    
    text-position:relative;
    
}
  
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
 /* width: 100%;*/
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
  width: 100%;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
     
     




<div class="container">
    
    <div class="item1">Employer
    <img src="../pictures/default.png" class="responsive">
    </div>
  
  
  <div class="item2">Add Posting
 <form action="insert.php" method="post"><pre>
      ID<input type="number" name="ID">
      Job Name<input type="text" name="Job_Name">
      Employer<input type="text" name="Employer">
      Contact<input type="text" name="Contact">
      City<input type="text" name="City">
      Type<input type="text" name="Type">
      Education<input type="text" name="Education">
      Salary<input type="text" name="Salary">
    <input type="submit" value="ADD RECORD">
  </pre></form>
  
  </div>
    
</div>




</body>
</html>