<?php
include 'top.php';

$search = $_POST;
//insert code to recieve search from post query

//Array ( [lstStations] => Array ( [0] => SOUTH SHAFTSBURY 0.1 W, VT US ) [chkPrecipitation] => Precipitation [chkAverageTemperature] => 
//AverageTemperature [btnSubmit-station] => Submit )

// print("<p>");
// print_r($_POST);
// print("</p>");

// print("<p>");
// foreach($_POST as $item) {
//     print_r($item);
//     print('<br />');
// }
// print("</p>");

//QUERY generation
$query = 'SELECT ';
$headers = array('NAME', 'DATE');

foreach($_POST['lstAttributes'] as $attribute) {
    array_push($headers, $attribute);
}

$cols = $headers;

//translate attributes from english to the col names in the database
$attributes = array("Date", "Name", "Precipitation", "SnowDepth", "Snowfall", "AverageTemperature", "MaximumTemperature", "MinimumTemperature", "WaterEquivilent");
$names = array("DATE", "NAME", "PRCP", "SNWD", "SNOW", "TAVG", "TMAX", "TMIN", "WESD");
for($i = 0; $i < sizeof($headers); $i++) {
    for($j = 0; $j < sizeof($attributes); $j++) {
        if($headers[$i] == $attributes[$j]) {
            $cols[$i] = $names[$j];
        }
    }
}

// print_r("Cols: " . $cols . "<br />");

//add all of the attributes being searched for
for($i = 0; $i < sizeof($cols); $i++) {
    if($i != 0) {
        $query = $query . ", ";
    }
    $query = $query . "`" . $cols[$i] . "`";
    if($i == sizeof($cols)-1) {
        $query = $query . " ";
    }
    // print($query . "<br />");
}

//add the table that is being queried
$query = $query . "FROM `tbl" .  $_POST['state_choose'] . "` ";

//add the where clause to specify the stations to look at
$query = $query . "WHERE ";
for($i = 0; $i < sizeof($_POST['lstStations']); $i++) {
    if($i != 0) {
        $query = $query . "OR ";
    }
    $query = $query . "`NAME` = ?"; //" . $_POST['lstStations'][$i] . "
    // print($query . "<br />");
}

// $query = 'SELECT `STATION`, `NAME`, `DATE`, `AWND`, `PRCP`, '
//         . '`SNOW`, `SNWD`, `TAVG`, `TMAX`, `TMIN`, `WESD`, `WESF` FROM `tblVT` LIMIT 300';

// print($query . "<br />");

$records = "";

if ($thisDatabaseReader->querySecurityOk($query, 1)) {
    $query = $thisDatabaseReader->sanitizeQuery($query);
    $records = $thisDatabaseReader->select($query, $_POST['lstStations']);
}

$data = $records;
// print("<pre>");
// print("Records: ");
// print_r($records);
// print("</pre>");

print("<table border=1px>");
foreach ($headers as $header) {
    print("<th>");
    print($header);
    print("</th>");
}

foreach ($data as $item) { 
    print("<tr>");
    for ($i = 0; $i < sizeof($item)/2; $i++) {
        print("<td>");
        print($item[$i]);
        print("</td>");
    }
    print("</tr>");
}


include 'footer.php';
?>
