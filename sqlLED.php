<html>
<body>

<!-- Form where you can choose 0 to turn light off or 1 to turn light on.  -->

<!-- On submit, send the form-data to a file named "sqlLED.php" --> 

<form action="sqlLED.php" method="post">
<br>

Light: 
<select name="light">
	<option value="0" selected>0</option>
	<option value="1">1</option>
</select>
<br><br>

<input type="submit">
</form>

</body>
</html>

<?php
// Log in information 
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "button";

// Collect values from form with method = "post"
$light = (int)$_POST["light"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert into database the 0 or 1 values from phpforms.php
$sql = "UPDATE switch SET power = '$light' WHERE id = 2";

// header("location: phpforms.php");

// Checks if new record was created successfully
if ($conn->query($sql) === TRUE) {
    echo "<br>";
    if ($light == 1) {
        echo "Light is on.";
    }
    else {
        echo "Light is off.";
    }
} 

else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?> 
