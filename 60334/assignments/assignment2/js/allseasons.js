function changePic(){
    
    
    var img = document.getElementById("Seasons"); 
    var value = img.options[img.selectedIndex].value;// used to get the value of the picture link
    
    
    
    document.getElementById("picture").src = value; // changes the picture source on page to which pic is selected
    
    
}