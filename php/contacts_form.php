<?php ob_start() ?>
<?php require_once("functions.php"); ?>
<?php session_start(); ?>

<?php


    $userResponse =  $_POST['g-recaptcha-response'];
	echo " $userResponse ";
	ob_end_flush(); // Closes the buffer
			die();	
	
	
	function post_captcha($user_response){
		$fields_string = '';
		$fields = array(
			'secret' => '6Le46z8UAAAAAH_5xK8XjsEsOXfaq1EGk1qX-KmA',
			'response' => $user_response
		);
		foreach($fields as $key=>$value){
			$fields_string .= $key . '=' . $value . '&';
			$fields_string = rtrim($fields_string, '&');
		}
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
		curl_setopt($ch, CURLOPT_POST, count($fields));
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch);
		curl_close($ch);
		
		return json_decode($result, true);
	}
	

	$res = post_captcha($_POST['g-recaptcha-response']);
	
	echo " $res[]";

			
	if( !$res['success']){
		
		redirect_to("../index.html#contact");
			ob_end_flush(); // Closes the buffer
			die();
		
		
	}else {
		
		echo "success ";
		ob_end_flush(); // Closes the buffer
			die();	
	}
	
	

$sub = $_POST['submit'];

if(isset($sub)){
	
	
	$respKey = $_POST['g-recaptcha-response'];
	
	$secretKey = "6Le46z8UAAAAAH_5xK8XjsEsOXfaq1EGk1qX-KmA";
	$responseKey = $respKey;
	$userIP = $_SERVER['REMOTE_ADDR'];
	
	$url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";
	$response = file_get_contents($url);
	
	$response = json_decode($response );
	
	if($response -> success){
		echo "success ";
		ob_end_flush(); // Closes the buffer
			die();	
	}else {
		echo "form submission was not successful  ";
		ob_end_flush(); // Closes the buffer
			die();
	}
	
	
	
	
	
	
	$name = $_POST['name'];
	$nameSplashed = stripslashes($name);
	$nameSafe = htmlentities($nameSplashed , ENT_QUOTES);
	$_SESSION['name'] = $nameSafe;
	$nameSess = $_SESSION['name'];

	$phone = $_POST['phone'];
	$phoneSplashed = stripslashes($phone);
	// Sanitise the value and assign
	$phoneSafe = htmlentities($phoneSplashed, ENT_QUOTES);
	// Session field
	$_SESSION['phone'] = $phoneSafe;
	// Assign the session value to a variable 
	$phoneSession = $_SESSION['phone'];

	$email = $_POST['email'];
	$emailSplashed = stripslashes($email);
	// Sanitise the value and assign
	$emailSafe = htmlentities($emailSplashed, ENT_QUOTES);
	// Session field
	$_SESSION['email'] = $emailSafe;
	// Assign the session value to a variable 
	$emailSession = $_SESSION['email'];
	
	$suburb = $_POST['suburb'];
	$suburbSplashed = stripslashes($suburb);
	// Sanitise the value and assign
	$suburbSafe = htmlentities($suburbSplashed, ENT_QUOTES);
	// Session field
	$_SESSION['suburb'] = $suburbSafe;
	// Assign the session value to a variable 
	$suburbSession = $_SESSION['suburb'];
	
	$typeEnquiry = $_POST['type_enquiry'];
	$isTypeSelected = true;
	$typeSelection = "";
	
	if(!empty($typeEnquiry)){
	
	  foreach($typeEnquiry as $typeSelected){											
			$typeSelection = "$typeSelected";
			
		}
	}else {
		$isTypeSelected = false;
		
	}
	
		$comments = $_POST['comments'];
		$commentsSplashed = stripslashes($comments);
		// Sanitise the value and assign
		$commentsSafe = htmlentities($commentsSplashed, ENT_QUOTES);
		// Session field
		$_SESSION['comments'] = $commentsSafe;
		// Assign the session value to a variable 
		$commentsSession = $_SESSION['comments'];

						// Update the database
						$serverhost = "localhost";
						$username = "Mara2";
						$password = "MaraPass1!";
						$dbname = "MrMrsL";


						// Create connection
						$connection = new mysqli($serverhost, $username, $password, $dbname);
						// Check connection
						// Check connection
						if ($connection->connect_error) {
							die("Connection failed: " . $connection->connect_error);
						}
						else {
							$sql = "INSERT INTO leads(name, phone, email, suburb, type, comments)
							VALUES ('$nameSess', '$phoneSession', '$emailSession', '$suburbSession', '$typeSelection', '$commentsSession');";
						
							// Login details for mail server 
							$smpt_server = '';
							$usernameMail = '';
							$passwordMail = '';
							ob_end_flush(); // Closes the buffer
					
            
							$to = 'admin@mr-mrsldrivingschool.com.au';
							$subject = 'New contact form have been submitted';
							$htmlContent = "
								<h1>Contact request details</h1>
								<p><b>Name: </b>".$nameSess."</p>
								<p><b>Tel: </b> <a style='color:blue;' ref='tel:.$phoneSession.'>".$phoneSession."</a> </p>
								<p><b>Email: </b> <a style='color:blue;' ref='.$emailSession.'>".$emailSession."</a> </p>
								<p><b>Enquire about: </b>".$typeSelection."</p>
								<p><b>Suburb: </b>".$suburbSession."</p>
								<p><b>Message: </b>".$commentsSession."</p>
							";
							// Always set content-type when sending HTML email
							$headers = "MIME-Version: 1.0" . "\r\n";
							$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
							// More headers
							$headers .= 'From:'.$name.' <'.$email.'>' . "\r\n";
							//send email
							@mail($to,$subject,$htmlContent,$headers);	
						}

						if ($connection->query($sql) === TRUE) {
							//$last_id = $conn->insert_id;
							
							//header("Location: success.html");
							//die();
							redirect_to("../success.html");
							
							ob_end_flush(); // Closes the buffer
						
							//echo "New record created successfully. Last inserted ID is: " . $last_id;
						} else {
							echo "Error: " . $sql . "<br>" . $conn->error;
							ob_end_flush(); // Closes the buffer
						}

						$connection->close();

						ob_end_flush(); // Closes the buffer
	
	}	// end Form submitted				
						
?> 

