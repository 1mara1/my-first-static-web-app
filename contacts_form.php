<?php

$leadName=$_POST["name"];
$leadEmail=$_POST["email"];
$leadPhone=$_POST["phone"];
$leadSuburb=$_POST["suburb"];
$typeEnquiry=$_POST["type_enquiry"];
$leadComment=$_POST["comments"];

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "ContactsMrMrsLDS";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



$sql = "INSERT INTO contacts (name, phone, email, suburb, type, comments)
VALUES ( $leadName, $leadPhone, $leadEmail, $leadSuburb, $typeEnquiry, $leadComment);";




$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> 


