function validateFormRegister(){
    var name = document.forms["myForm"]["name"]; 
    var surname = document.forms["myForm"]["surname"];          
    var email = document.forms["myForm"]["email"];    
    var password= document.forms["myForm"]["password"];

    if (name.value == "")                                  
    { 
        document.getElementById('errorname').innerHTML="Please enter a valid name!";  
        return false; 
    }else{
        document.getElementById('errorname').innerHTML="";  
    }

    if (surname.value == "")                                  
    { 
        document.getElementById('errorsurname').innerHTML="Please enter a valid surname!";  
        return false; 
    }else{
        document.getElementById('errorsurname').innerHTML="";  
    }

    if (email.value == "")                                   
    { 
        document.getElementById('erroremail').innerHTML="Please enter a valid email address!"; 
        return false; 
    }else{
        document.getElementById('erroremail').innerHTML="";  
    }
   
    if (email.value.indexOf("@", 0) < 0)                 
    { 
        document.getElementById('erroremail').innerHTML="Please enter a valid email address!"; 
       
        return false; 
    } 

    if (password.value == "")                                  
    { 
        document.getElementById('errorpassword').innerHTML="Please enter a valid password";  
        return false; 
    }else{
        document.getElementById('errorpassword').innerHTML=""; 
        alert("You are registered! You can try and login now!"); 
        
    }



}