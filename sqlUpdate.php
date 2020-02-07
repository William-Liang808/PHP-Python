<?php
$servername = "localhost";
$username = "willia20";
$password = "liang";
$dbname = "willia20";
$name = "Cole house";

$conn = new mysqli($servername, $username, $password, $dbname);

// check connection
if($conn->connect_error){
    die("connection failed:".$conn->connect_error);
}

$sql = "UPDATE students SET name='Scam' WHERE name='will'";
$result =$conn->query($sql);

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>