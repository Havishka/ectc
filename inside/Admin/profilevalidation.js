function checkForm()
{
//fetching values from all input fields and storing them in variables
    var name = document.getElementById("fname1").value;
	var lname = document.getElementById("lname1").value;
    var password = document.getElementById("password1").value;
    var email = document.getElementById("email1").value;
    var website = document.getElementById("website1").value;    
	var nic = document.getElementById("nic1").value;  
//Check input Fields Should not be blanks.
    if (name == '' || lname == '' || password == '' || email == '' || website == '') 
    {
        alert("Fill All Fields");
    }

    else
    {
	
	//Notifying error fields
	var fname1 = document.getElementById("fname");
	var lname1 = document.getElementById("lname");
    var password1 = document.getElementById("password");
    var email1 = document.getElementById("email");
    var website1 = document.getElementById("website");
	var nic1 = document.getElementById("nic");
	//Check All Values/Informations Filled by User are Valid Or Not.If All Fields Are invalid Then Generate alert.
        if (lname1.innerHTML == 'Invalid name' || fname1.innerHTML == 'Invalid name' || password1.innerHTML == 'Password too short' || email1.innerHTML == 'Invalid email' || website1.innerHTML == 'Invalid website'|| nic1.innerHTML == 'Invalid nic') 
        {
            alert("Fill Valid Information");
        }
        else 
        {
		//Submit Form When All values are valid.
            document.getElementById("myForm").submit();
        }
    }
}

//AJAX Code to check  input field values when onblur event triggerd.
function validate(field, query)
{
	var xmlhttp;
	
if (window.XMLHttpRequest)
  {// for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }	
  
    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState != 4 && xmlhttp.status == 200)
        {
            document.getElementById(field).innerHTML = "Validating..";
        }
        else if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById(field).innerHTML = xmlhttp.responseText;
        }
        else
        {
            document.getElementById(field).innerHTML = "Error Occurred. <a href='index.php'>Reload Or Try Again</a> the page.";
        }
    }
    xmlhttp.open("GET", "reg/validation.php?field=" + field + "&query=" + query, false);
    xmlhttp.send();
}