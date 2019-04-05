
<!DOCTYPE html>
<html>
    <head>
        <title>Results</title>
        <meta charset="utf-8">
        <meta name="author" content="Evie Wight">
        <meta name="description" content="Results of Weather Search">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="style.css" type="text/css" media="screen">
    </head>

    <?php
    //*****************creates an error log for the php code to help with debugging*****************//
    error_reporting(E_ALL);
    // writes over the file to delete it so that I can only see the most recent errors
    $file = fopen("final_project.log", 'w');
    fclose($file);
    ini_set("error_log", "final_project.log");
    ?>

<body>

    <?php
    $search = "";
    //insert code to recieve search from post query
    ?>

    <a href='./search.php'>New Search</a>



    <?php
    $headers = array("STATE","STATION","NAME","DATE","AWND","PRCP","SNOW","SNWD","TAVG","TMAX","TMIN","WESD","WESF");
    $data = array(
        array("VT","US1VTBN0010","SOUTH SHAFTSBURY 0.1 W, VT US","3/27/18","",0,"","","","","","",""),
        array("VT","US1VTBN0010","SOUTH SHAFTSBURY 0.1 W, VT US","3/28/18","",0.04,0,1,"","","",0,0),
        array("VT","US1VTBN0010","SOUTH SHAFTSBURY 0.1 W, VT US","3/29/18","",0,0,0,"","","",0,0),
        array("VT","US1VTBN0010","SOUTH SHAFTSBURY 0.1 W, VT US","3/30/18","",0.3,"",0,"","","","",""),
        array("VT","US1VTBN0010","SOUTH SHAFTSBURY 0.1 W, VT US","3/31/18","",0.13,"","","","","","",""),
        array("VT","US1VTBN0010","SOUTH SHAFTSBURY 0.1 W, VT US","4/1/18","",0.02,"","","","","","","")
    );
    
    ?>

    <?php 
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

    ?>


</body>
</html>