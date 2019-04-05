<?php
include 'top.php';

$search = "";
//insert code to recieve search from post query
$headers = array("STATE","STATION","NAME","DATE","AWND","PRCP","SNOW","SNWD","TAVG","TMAX","TMIN","WESD","WESF");
$data = array(
    array("VT","US1VTBN0010","SOUTH SHAFTSBURY 0.1 W, VT US","3/27/18","",0,"","","","","","",""),
    array("VT","US1VTBN0010","SOUTH SHAFTSBURY 0.1 W, VT US","3/28/18","",0.04,0,1,"","","",0,0),
    array("VT","US1VTBN0010","SOUTH SHAFTSBURY 0.1 W, VT US","3/29/18","",0,0,0,"","","",0,0),
    array("VT","US1VTBN0010","SOUTH SHAFTSBURY 0.1 W, VT US","3/30/18","",0.3,"",0,"","","","",""),
    array("VT","US1VTBN0010","SOUTH SHAFTSBURY 0.1 W, VT US","3/31/18","",0.13,"","","","","","",""),
    array("VT","US1VTBN0010","SOUTH SHAFTSBURY 0.1 W, VT US","4/1/18","",0.02,"","","","","","","")
);



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
