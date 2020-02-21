<?php
$servername = "localhost";
$username = "root";
$password = "raspberry";
$dbname = "stem";

$conn = new mysqli($servername, $username, $password, $dbname);

// check connection
if($conn->connect_error){
    die("connection failed:".$conn->connect_error);
}

$sql = "SELECT*FROM humidity";
$result =$conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo " humidity is: ".$row['humidity']."<br>". " temperature is: ".$row['temperature']."<br>". " date/time is: " . $row['dateTime']."<br><br>";
    
    }
} else {
    echo "0 results";
}

$conn->close();

?>
