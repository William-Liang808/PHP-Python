<html>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "raspberry";
$dbname = "stem";
$conn = new mysqli($servername, $username, $password, $dbname);

echo '<table border= "0" cellspacing="10" cellpadding="2">
    <tr>    
        <td> <font face ="Arial">Humidity</font> </td>
        <td> <font face ="Arial">Temperature</font> </td>
        <td> <font face ="Arial">Date/Time</font> </td>
</tr>';
// check connection
if($conn->connect_error){
    die("connection failed:".$conn->connect_error);
}

$sql = "SELECT*FROM humidity";
$result =$conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $field1name = $row["humidity"];
        $field2name = $row["temperature"];
        $field3name = $row["dateTime"];
 
        echo '<tr> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
                  <td>'.$field3name.'</td> 
              </tr>';
    }
} else {
    echo "0 results";
}
$conn->close();
?>
</body>
</html>
