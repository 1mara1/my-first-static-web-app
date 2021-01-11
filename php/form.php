<?php ob_start() ?>
<?php require_once("functions.php"); ?>

<?php
session_start();

$iserror = false;




//$leadName = htmlentities($_POST['name']);
//$leadEmail = htmlentities($_POST['email']);
//$leadPhone = htmlentities($_POST['phone']);
//$leadSuburb = htmlentities($_POST['suburb']);
//$type = htmlentities($_POST['type-enquiry']);
//$leadComment = htmlentities($_POST['comments']);


	// Test for field empty and set 
					if (isset( $_POST["name"])) {
						if($_POST["name"] != ""){
							// Assign the field value to the variable
							$name = $_POST["name"];
							// Sanitise the value and assign
							$nameSafe = htmlentities($fname, ENT_QUOTES);
							// Session field
							$_SESSION['name'] = $nameSafe;
							// Assign the session value to a variable 
							$nameSession = $_SESSION['name'];
						} else {
							$iserror = true; // Keep track of the errors
							$name = ""; 		
						}
						if($_POST["phone"] != ""){
							// Assign the field value to the variable
							$phone = $_POST["phone"];
							// Sanitise the value and assign
							$phoneSafe = htmlentities($phone, ENT_QUOTES);
							// Session field
							$_SESSION['phone'] = $phoneSafe;
							// Assign the session value to a variable 
							$phoneSession = $_SESSION['phone'];
						} else {
							$iserror = true; // Keep track of the errors
							$phone = ""; 		
						}
						if($_POST["email"] != ""){
							// Assign the field value to the variable
							$email = $_POST["email"];
							// Sanitise the value and assign
							$emailSafe = htmlentities($email, ENT_QUOTES);
							// Session field
							$_SESSION['email'] = $emailSafe;
							// Assign the session value to a variable 
							$emailSession = $_SESSION['email'];
						} else {
							$iserror = true; // Keep track of the errors
							$email = ""; 		
						}
						if($_POST["suburb"] != ""){
							// Assign the field value to the variable
							$suburb = $_POST["suburb"];
							// Sanitise the value and assign
							$suburbSafe = htmlentities($suburb, ENT_QUOTES);
							// Session field
							$_SESSION['suburb'] = $suburbSafe;
							// Assign the session value to a variable 
							$suburbSession = $_SESSION['suburb'];
						} else {
							$iserror = true; // Keep track of the errors
							$suburb = ""; 		
						}
						if($_POST["type-enquiry"] != ""){
							// Assign the field value to the variable
							$type = $_POST["type-enquiry"];
							// Sanitise the value and assign
							$typeSafe = htmlentities($type, ENT_QUOTES);
							// Session field
							$_SESSION['type'] = $typeSafe;
							// Assign the session value to a variable 
							$typeSession = $_SESSION['type'];
						} else {
							$iserror = true; // Keep track of the errors
							$type = ""; 		
						}
						if($_POST["comments"] != ""){
							// Assign the field value to the variable
							$comments = $_POST["comments"];
							// Sanitise the value and assign
							$commentsSafe = htmlentities($comments, ENT_QUOTES);
							// Session field
							$_SESSION['comments'] = $commentsSafe;
							// Assign the session value to a variable 
							$commentsSession = $_SESSION['comments'];
						} else {
							$iserror = true; // Keep track of the errors
							$type = ""; 		
						}
					}
					
					if(!$iserror ){
						
						print_r($nameSafe);


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
							VALUES ('$nameSafe', '$phoneSafe', '$emailSafe', '$suburbSafe', '$typeSafe', '$commentsSafe');";
						}

						if ($connection->query($sql) === TRUE) {
							redirect_to("../success.html");
							
							//$last_id = $conn->insert_id;
							
							//echo "New record created successfully. Last inserted ID is: " . $last_id;
						} else {
							echo "Error: " . $sql . "<br>" . $conn->error;
						}

						$connection->close();
					}else{
						redirect_to("../index.html");
						ob_end_flush(); // Closes the buffer	
					}
				

	


?> 







