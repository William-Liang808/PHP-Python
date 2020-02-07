
<?php

//require 'errorHandler.php';

$servername = "localhost";
$username = "willia20";
$password = "liang";
$dbname = "willia20";
//have to use single quote for variable
$name = 'will';
$age = 8;
$gradeLevel = 12;

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// check connection
if($conn->connect_error){
    die("connection failed:".$conn->connect_error);
}

//inserts name,age grade into students table
$sql = "INSERT INTO students (name, age, gradeLevel) VALUES ('$name', '$age', '$gradeLevel')";

//creates a student record if not will display error
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();




?>
