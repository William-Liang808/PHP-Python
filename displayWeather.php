<html>
<body>    
    <style>
        #highTemp {
            position:absolute;
            right: 50%;
            }
        #highHum {
            position:absolute; 
            right: 20%;
            }
    </style>
<?php
$servername = "localhost";
$username = "root";
$password = "raspberry";
$dbname = "stem";
$conn = new mysqli($servername, $username, $password, $dbname);

//Creates table for data to display on html
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

//display all data from db
$sql = "SELECT*FROM humidity";
$result =$conn->query($sql);

//display highest temp
$tempHigh = "SELECT temperature FROM humidity ORDER BY temperature DESC LIMIT 1;";
$result2 =$conn->query($tempHigh);

//display highest humidity
$humidHigh = "SELECT humidity FROM humidity ORDER BY humidity DESC LIMIT 1;";
$result3 =$conn->query($humidHigh);

//lower temp
$tempLow = "SELECT temperature FROM humidity ORDER BY temperature ASC LIMIT 1;";
$asc =$conn->query($tempLow);

//lower humidity
$humLow = "SELECT humidity FROM humidity ORDER BY humidity ASC LIMIT 1;";
$asc2 =$conn->query($humLow);

//fetching lower humidity
if ($asc2->num_rows > 0) {
    while($row3=$asc2->fetch_assoc()){
        $ascHum = $row3["humidity"];
        
        }
    }
    else{
       echo "0 results";
        }
    $conn->close();
    
//fetcher lower temp
if ($asc->num_rows > 0) {
    while($row2=$asc->fetch_assoc()){
        $ascTemp = $row2["temperature"];
        
        }
    }
    else{
       echo "0 results";
        }
    $conn->close();
    
//fetching higher humidity
if ($result3->num_rows > 0) {
    while($row3=$result3->fetch_assoc()){
        $humid = $row3["humidity"];
        
        }
    }
    else{
       echo "0 results";
        }
    $conn->close();
//fetching higher temp    
if ($result2->num_rows > 0) {
    while($row2=$result2->fetch_assoc()){
        $temp = $row2["temperature"];
        
        }
    }
    else{
       echo "0 results";
        }
    $conn->close();
    
// output data of each row    
if ($result->num_rows > 0) {

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
        <h3 id="highTemp">Highest Temp / Lowest Temp<br><?php echo $temp;echo " / "; echo $ascTemp; ?>
        </h3>
        <h3 id="highHum">Highest Humidity / Lowest Humidity<br><?php echo $humid; echo " / "; echo $ascHum ?></h3>
</body>
</html>

