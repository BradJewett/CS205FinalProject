<?php
include 'top.php';

$search = $_POST;
//insert code to recieve search from post query

//Array ( [lstStations] => Array ( [0] => SOUTH SHAFTSBURY 0.1 W, VT US ) [chkPrecipitation] => Precipitation [chkAverageTemperature] => 
//AverageTemperature [btnSubmit-station] => Submit )

print("<p>");
print_r($_POST);
print("</p>");

print("<p>");
foreach($_POST as $item) {
    print_r($item);
    print('<br />');
}
print("</p>");

$query = 'SELECT ';
$headers = array('STATION', 'DATE');

foreach($_POST as $attribute) {
    if(gettype($attribute) != 'array' && $attribute != "Submit") {
        array_push($headers, $attribute);
    }
}

$attributes = array("Precipitation", "SnowDepth", "Snowfall", "AverageTemperature", "MaximumTemperature", "MinimumTemperature", "WaterEquivilent");
$names = array("PRCP", "SNWD", "SNOW", "TAVG", "TMAX", "TMIN", "WESD");
for($i = 0; $i < sizeof($headers); $i++) {
    for($j = 0; $j < sizeof($attributes); $j++) {
        if($headers[$i] == $attributes[$j]) {
            $headers[$i] = $names[$j];
        }
    }
}

for($i = 0; $i < sizeof($headers); $i++) {
    if($i != 0) {
        $query = $query . ", ";
    }
    $query = $query . "'" . $headers[$i] . "' ";
    print($query . "<br />");
}

$query = $query . "FROM `tblVT` ";

$query = $query . "WHERE ";
for($i = 0; $i < sizeof($_POST['lstStations']); $i++) {
    if($i != 0) {
        $query = $query . "OR ";
    }
    $query = $query . "'STATION' LIKE '" . $_POST['lstStations'][$i] . "' ";
    print($query . "<br />");
}

$query = $query . ';';
print($query . "<br />");

// $query = "SELECT
// STATION,
// 'DATE',
// PRCP,
// TAVG
// FROM
// tblVT
// WHERE
// STATION LIKE '%SHAFTSBURY%'
// OR STATION LIKE '%GREENSBORO%';";

$records = "";
        
if ($thisDatabaseReader->querySecurityOk($query, 0)) {
    $query = $thisDatabaseReader->sanitizeQuery($query);
    $records = $thisDatabaseReader->select($query, '');
}

$data = $records;
print("<p>");
print("Records: ");
print_r($records);
print("</p>");

print("<table border=1px>");
foreach ($headers as $header) {
    print("<th>");
    print($header);
    print("</th>");
}
foreach ($data as $item) { 
    print("<tr>");
    foreach ($item as $data_point) {
        print("<td>");
        print($data_point);
        print("</td>");
    }
    print("</tr>");
}


include 'footer.php';
?>
