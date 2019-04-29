<?php
include 'top.php';
?>

<img src="images/help.png" id = "help">

<table id = "helpTable">
<legend>Attribute Glossary</legend>

<tr>
	<th>Abbreviation</th>
	<th>Attribute Name</th>
	<th>Description</th>
</tr>

<tr>
	<td>PRCP</td><td>Precipitation</td><td>Approximate total rainfall in inches.</td>
</tr>
<tr>
	<td>SNOW</td><td>Snowfall</td><td>Approximate total snowfall in inches.</td>
</tr>
<tr>
	<td>SNWD</td><td>Snow Depth</td><td>Depth of snow in inches at designated recording site.</td>
</tr>
<tr>
	<td>TAVG</td><td>Average Temperature</td><td>The temperature in degrees Celcius averaged over the last 24 hours.</td>
</tr>
<tr>
	<td>TMAX</td><td>Maximum Temperature</td><td>The maximum temperature in degrees Celcius over the last 24 hours.</td>
</tr>
<tr>
	<td>TMIN</td><td>Minimum Temperature</td><td>The minimum temperature in degrees Celcius over the last 24 hours.</td>
</tr>
<tr>
	<td>WESF</td><td>Water Equivilent</td><td>The equivilent reainfall in inches of snowfall over 24 hour period.</td>
</tr>

</table>


<h3>Query Help</h3>
<p>To start a new query, use the search link on the navigation bar. Select the state where records are desired. A list of stations will appear, allowing you to select which stations to include in the record retrieval. Use the attribute selection interface to select which record columns to display in the output table. Hit the sumbit button to execute the query!</p>


<?php
include 'footer.php';
?>
