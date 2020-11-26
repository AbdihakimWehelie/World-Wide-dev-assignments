function Convert(){
 
    var cad= document.getElementById("cad").value;// the DOM gets the value from the 'cad' box and stores it in a variable
    
    var usd=cad*0.75;
    
    
    
    document.getElementById("us").value = usd;// the DOM gets the ID from the US box and fills it with the USD value
    
}