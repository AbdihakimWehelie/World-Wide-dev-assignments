<html>
<body>
    

<?php

  function print_square($num)// using $num gets the value of enterned number
  {
  
      echo "The square of " .$num. " is " .pow($num,2);
  
  }
    
    
   function print_sqrt($num)// using $num gets the value of enterned number
  {
  
      echo "The square root of " .$num. " is " .sqrt($num);
  
  
  }  
    



    $num= $_GET["num"];// since the html page uses 'get', $_GET will obtain values from the page
    $functype=$_GET["functype"];// value from the select page to determine the switch case


    
    switch($functype){
        
       
    case 1:
        print_square($num);
        break;
    
    case 2:
        print_sqrt($num);
        break;
        
        
    default:
        echo "No values recived.";
        break;
    }
    
    
    
 ?>  
    
</body>
</html>