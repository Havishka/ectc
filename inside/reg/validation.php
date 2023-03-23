<?php

include("../connection.php");

$value = $_GET['query'];
$formfield = $_GET['field'];

$error_validation=0;

//Check NIC
if ($formfield == "nic") {
	
	
	//$result = str_split($_GET['query']);
				
				
		
	
	
	
    if (strlen($value) == 10) {
		
		
						  if (!preg_match("/^([0-9]{9})(v|V)$/", $value)) {
						echo "Invalid nic";
						$error_validation=1;
					} else {
						
						
						
						//check nic
						
						
						$sql = "SELECT nic FROM student WHERE nic='$value'";
						$result = $con->query($sql);
						
						if ($result->num_rows > 0) {
							// output data of each row
							$error_validation=1;
							echo "<span>This NIC already registered!</span>";
							
							
						} else {
							$error_validation=0;
						echo "<span>Valid Nic : This NIC not yet registered!</span>";
						 
						}
					}
						
		
    }else if(strlen($value) == 12){
		
		 
		 
		   if (!preg_match("/^([0-9]{12})$/", $value)) {
						echo "Invalid nic";
						$error_validation=1;
					} else {
						
						
						
						$sql = "SELECT nic FROM student WHERE nic='$value'";
						$result = $con->query($sql);
						
						if ($result->num_rows > 0) {
							// output data of each row
							$error_validation=1;
							echo "<span>This NIC already registered!</span>";
							
							
						} else {
							$error_validation=0;
								echo "<span>Valid Nic : This NIC not yet registered!</span>";
						 
						}
						
						
					}
		 
		
		
		
	}else if((strlen($value) < 12)&&(strlen($value) >=11)){
		
		
		
        echo "Enter 12 DIGITS nic without V";
		$error_validation=1;
		
		
		
		
		
    }else if (strlen($value) < 10){
		
		echo "Enter old nic (943033897V) or new nic type (199410292457)";
		$error_validation=1;
		
	}else{
		
		echo "Invalid Nic";
		$error_validation=1;
		
	}
	
	
	
}




//Check Valid or Invalid user name when user enters user name in username input field.
if ($formfield == "fname") {
	
	
	
	
	
	
	
	
	
    if (strlen($value) < 3) {
        echo "First name Toooo short: Invalid";
    } else {
         if (!preg_match("/^[\\p{L} .'-]+$/", $value)) {
						echo "Invalid name : Special characters or numbers found!";
					} else {
						echo "<span>First is name valid</span>";
					}
    }
}

if ($formfield == "lname") {
	
	
	
	
	
	
	
	
	
    if (strlen($value) < 3) {
        echo "Last name Toooo short: Invalid";
    } else {
         if (!preg_match("/^[\\p{L} .'-]+$/", $value)) {
						echo "Invalid name : Special characters or numbers found!";
					} else {
						echo "<span>Last is name valid</span>";
					}
    }
}

//Check Valid or Invalid password when user enters password in password input field.
if ($formfield == "password") {
    if (strlen($value) < 6) {
        echo "Password too short";
    } else {
        echo "<span>Strong</span>";
    }
}

//Check Valid or Invalid email when user enters email in email input field.
if ($formfield == "email") {
    if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $value)) {
        echo "Invalid email";
    } else {
        echo "<span>Email address is Valid</span>";
    }
}

//Check Valid or Invalid website address when user enters website address in website input field.
if ($formfield == "website") {
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $value)) {
        echo "Invalid website";
    } else {
        echo "<span>Valid</span>";
    }
}
?>