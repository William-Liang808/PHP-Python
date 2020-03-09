<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
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
$selHum = "SELECT humidity FROM humidity ORDER BY humidity DESC LIMIT 100";
$resultChar =$conn->query($selHum);

$selTemp = "SELECT temperature FROM humidity ORDER BY temperature DESC LIMIT 100";
$resultTemp =$conn->query($selTemp);
if ($resultTemp->num_rows > 0) {
    while($row2 = $resultTemp->fetch_assoc()) {
        echo $row2["temperature"];
    
} 
}
else {
    echo "0 results";
}
echo $charTemp;
$conn->close();
if ($resultChar->num_rows > 0) {
    while($row3 = $resultChar->fetch_assoc()) {
        echo $row3["humidity"];
    }
    
} else {
    echo "0 results";
}
echo $charHum;
$conn->close();
?>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<meta charset="utf-8">
<title></title>
</head>
<body>

<div id="chart">
</div>
<script>
var options = {
series: [
{
name: "Temp",
data: [<?php echo $charTemp;?>]
},
{
name: "Humidity",
data: [<?php echo $charHum;?>]
}
],
chart: {
height: 300,
width: 500,
type: 'line',
dropShadow: {
enabled: true,
color: '#000',
top: 18,
left: 7,
blur: 10,
opacity: 0.2
},
toolbar: {
show: false
}
},
colors: ['#77B6EA', '#545454'],
dataLabels: {
enabled: true,
},
stroke: {
curve: 'smooth'
},
title: {
text: 'Average High & Low Temperature',
align: 'left'
},
grid: {
borderColor: '#e7e7e7',
row: {
colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
opacity: 0.5
},
},
markers: {
size: 1
},
xaxis: {
categories: ['2/26/20 8:54am', '2/26/20 8:56am', '2/28/20 8:35am'],
title: {
text: 'Date / Time'
}
},
yaxis: {
title: {
text: 'Temperature / Humidity'
},
min: 24,
max: 55
},
legend: {
position: 'top',
horizontalAlign: 'right',
floating: true,
offsetY: -25,
offsetX: -5
}
};

var chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();

</script>
</body>
</html>

