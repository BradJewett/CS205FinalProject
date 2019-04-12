<?php
include 'top.php';
//##############################################################################
//
// This page lists the records based on the query given
// 
//##############################################################################
$records = '';

$query = 'SELECT `STATION`, `NAME`, `DATE`, `AWND`, `PRCP`, '
        . '`SNOW`, `SNWD`, `TAVG`, `TMAX`, `TMIN`, `WESD`, `WESF` FROM `tblVT` LIMIT 300';
//$query = 'SELECT `STATION`, `DATE` FROM `VT-WEATHER`';
// NOTE: The full method call would be:
//           $thisDatabaseReader->querySecurityOk($query, 0, 0, 0, 0, 0)
if ($thisDatabaseReader->querySecurityOk($query, 0)) {
    $query = $thisDatabaseReader->sanitizeQuery($query);
    $records = $thisDatabaseReader->select($query, '');
    
}

if (DEBUG) {
    print '<p>Contents of the array<pre>';
    print_r($records);
    print '</pre></p>';
}

print '<h2>Simple data for VT</h2>';
?>
<table>
<tr>
    <th>STATION</th>
    <th>NAME</th>
    <th>DATE</th>
    <th>AWND</th>
    <th>PRCP</th>
    <th>SNOW</th>
    <th>SNWD</th>
    <th>TAVG</th>
    <th>TMAX</th>
    <th>TMIN</th>
    <th>WESD</th>
    <th>WESF</th>
</tr>
<?php
if (is_array($records)) {
    foreach ($records as $record) {
        print "<tr>";
        print "<td>" . $record['STATION'] . "</td><td>" . $record['NAME'] 
                . "</td><td>" . $record['DATE'] . "</td><td>" . $record['AWND'] 
                . "</td><td>" . $record['PRCP'] . "</td><td>" . $record['SNOW'] 
                . "</td><td>" . $record['SNWD'] . "</td><td>" . $record['TAVG']
                . "</td><td>" . $record['TMAX'] . "</td><td>" . $record['TMIN'] 
                . "</td><td>" . $record['WESD'] . "</td><td>" . $record['WESF'] . "</td>";
        print "</tr>";
   //print '<p>' . $record['STATION'] . ' ' . $record['DATE'] . '</p>';
        }
}



include 'footer.php';
?>