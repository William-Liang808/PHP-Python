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

$sql = "SELECT*FROM students WHERE name ='Scam'";
$result =$conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row['name']. " is " . $row['age']. " and in grade Level: " . $row['gradeLevel']. "<br><br>";
    }
} else {
    echo "0 results";
}
$conn->close();

?>