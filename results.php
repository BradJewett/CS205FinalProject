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
print($_POST['chkAverageTemperature']);
foreach($_POST as $item) {
    print_r($item);
    print('<br />');
}
print("</p>");

$query = 'SELECT ';
$headers = array('Station');

foreach($_POST as $attribute) {
    if(gettype($attribute) != 'array') {
        array_push($headers, $attribute);
    }
}

for($i = 0; $i < sizeof($headers); $i++) {
    if($i != 0) {
        $query = $query . ", ";
    }
    $query = $query . $headers[$i] . " ";
    print($query . "<br />");
}

$query = $query . "WHERE ";
for($i = 0; $i < sizeof($_POST['lstStations']); $i++) {
    if($i != 0) {
        $query = $query . "AND ";
    }
    $query = $query . "STATION=" . $_POST['lstStations'][$i] . " ";
    print($query . "<br />");
}

print($query);

if ($thisDatabaseReader->querySecurityOk($query, 0)) {
    $query = $thisDatabaseReader->sanitizeQuery($query);
    $records = $thisDatabaseReader->select($query, '');
}

$data = $records;
print("<p>");
print_r($records);
print("</p>");

// $headers = array("STATE","STATION","NAME","DATE","AWND","PRCP","SNOW","SNWD","TAVG","TMAX","TMIN","WESD","WESF");
// $data = array(
//     array("VT","US1VTBN0010","SOUTH SHAFTSBURY 0.1 W, VT US","3/27/18","",0,"","","","","","",""),
//     array("VT","US1VTBN0010","SOUTH SHAFTSBURY 0.1 W, VT US","3/28/18","",0.04,0,1,"","","",0,0),
//     array("VT","US1VTBN0010","SOUTH SHAFTSBURY 0.1 W, VT US","3/29/18","",0,0,0,"","","",0,0),
//     array("VT","US1VTBN0010","SOUTH SHAFTSBURY 0.1 W, VT US","3/30/18","",0.3,"",0,"","","","",""),
//     array("VT","US1VTBN0010","SOUTH SHAFTSBURY 0.1 W, VT US","3/31/18","",0.13,"","","","","","",""),
//     array("VT","US1VTBN0010","SOUTH SHAFTSBURY 0.1 W, VT US","4/1/18","",0.02,"","","","","","","")
// );


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
