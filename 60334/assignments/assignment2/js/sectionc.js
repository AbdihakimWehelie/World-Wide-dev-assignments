function mulitply(){
    
    var x= document.getElementById("x").value;// the DOM gets the value from the 'x' ID to do the function
    
    var y= document.getElementById("y").value;// the DOM gets the value from the 'y' ID to do the function
    
    
    var z= x* y;
    
    document.getElementById("answer").innerHTML=z // the DOM gets the paragraph id 'answer' and adds the z variable to the page
    
}



function divide(){ // see mulitply()
    
        var x= document.getElementById("x").value;
    
    var y= document.getElementById("y").value;
    
    
    var z= x/y;
    
    document.getElementById("answer").innerHTML=z
    
    
    
}