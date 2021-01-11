
<?php

// Validations for the CHECKOUT1 form 

extract( $_GET);

// get the parameters
	$name = htmlentities($_GET["name"]); // no digits
	$phone = htmlentities($_GET["phone"]); // numbers only
	$email = htmlentities($_GET["email"]); // contains @ and word then dot
	$suburb =  htmlentities($_GET["suburb"]); // no digits allowed


	// Define the patterns
	
//	$patternPostcode = "/\d{4}/"; // format: 9999
//	$patternPostcodeOver = "/\d{5}/";// format: 9999
	$patternNumbersOnly = "/[0-9]/";
	$patternNoDigits = "/[a-zA-Z]$/";// format: xxx 
	$patternEmail = "/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/"; //Code  according to Regexlib.com, Retrieved 09 September 2017, <//http://regexlib.com/RETester.aspx?regexp_id=16>
//	$patternPhone = "/\b\d{2}[-.]?\d{4}[-.]?\d{4}\b/"; //format  dd-dddd-dddd
//	$patternAddress = "/^\d+ \D+ \D+$/"; // format: dd Xxx Xxx 
//	$patternPassword = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,25}$/"; // RegExLib.com, Retrieved 20 September 2017 <http://regexlib.com>

	$iserror = false;

	// Test for active field
	

	  

// Test for correct input from the user 
	if($name){	
		 if(!preg_match($patternNoDigits, $name) ) {
			echo " Please use words not numbers";
			 $iserror = true;
			return;
		}else { 
			$iserror = false;
		 }
	}
	

	if($phone){ 
		// Test for correct input from the user 
		if(!preg_match($patternNumbersOnly, $phone) ) {
			echo " Telephone must contains numbers only";
			 $iserror = true;
			return;
		}else { 
			$iserror = false;
			
		 }

	}		

// Test for email
	if($email){ 
		// Test for correct input from the user
		if(!preg_match($patternEmail , $email ) ) {
			echo " Email must have @ and a dot.";
			$iserror = true;
			return;
		}else { 
			$iserror = false;
		}
	}
	
	
	// Test for suburb
	if($suburb){	
		 if(!preg_match($patternNoDigits, $suburb) ) {
			echo "Please use words not numbers";
			 $iserror = true;
			return;
		}else { 
			$iserror = false;
		 }
	}
	
?> 








