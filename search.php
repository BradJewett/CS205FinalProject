<?php
include 'top.php';

$query = "SELECT `STATE`, `NAME` FROM `tblStates`";
if ($thisDatabaseReader->querySecurityOk($query, 0)) {
    $query = $thisDatabaseReader->sanitizeQuery($query);
    $states = $thisDatabaseReader->select($query, '');
}
$state_choose = "";
$state_choose = htmlentities($_POST["lstStates"], ENT_QUOTES, "UTF-8");
 if (DEBUG){ 
    print '<p>Post Array:</p><pre>';
    print_r($_POST);
    print '</'
    . 'pre>';
 }
?>


<form action = "<?php print $phpSelf; ?>"
          id = "formStates"
          method = "post">

                <fieldset>
                    <legend>Weather Records - States (Please only select "Vermont". Our database only contains VT records for now!)</legend>    
                    
                    <p>
                        <?php
                        print '<label for="lstStates"';
                        
                    print '> States: ';
                    print '<select id="lstStates" ';
                    print '        name="lstStates"';
                    print '        tabindex="300" >';
                    foreach ($states as $state) {
                        
                        print '<option ';
                      //  if ($state_choose == $state["STATE"])
                      //      print " selected='selected' ";
                        print 'value="' . $state["STATE"] . '">' . $state["NAME"];
                        print '</option>';
                    }
                    print '</select></label>';
                   
                        ?>
                    </p>
                    
                </fieldset> 
            <fieldset class="buttons">
                <legend></legend>
                <input class = "button" id = "btnSubmit-state" name = "btnSubmit-state" tabindex = "900" type = "submit" value = "Submit" >
            </fieldset> 
</form>     

<?php
if (isset($_POST["btnSubmit-state"])) {
    if (DEBUG){ 
    print "List box user selection:  ";
    print $state_choose;
    }
  
    
    print $state_choose;
    $query_station = 'SELECT `NAME` FROM `tbl'. $state_choose . '` WHERE `STATE` = ?';
    
    $selected_state = array($state_choose);
    
    if ($thisDatabaseReader->querySecurityOk($query_station, 1)) {
        $query_station = $thisDatabaseReader->sanitizeQuery($query_station);
        $stations = $thisDatabaseReader->select($query_station, $selected_state);
    }
    
    $checkbox_station = array();
    foreach ($stations as $station){
        if (in_array($station['NAME'], $checkbox_station)){
           
        }else{
             array_push($checkbox_station,$station['NAME']);
        }
        //print $station['NAME'];
    }
    if (DEBUG){ 
    foreach ($checkbox_station as $station){
        print $station;
        print "<br>";
    }
    }
    ?>

<form action = "results.php"
          id = "formStations"
          method = "post">

                <fieldset>
                    <legend>Weather Records - Stations</legend>    
                <?php
                foreach($checkbox_station as $station){
                print '<input type="checkbox" name = "lstStations[]" id = "lstStations" value="' . $station . '" >' . $station . "<br>";
                
            }
            ?>
           </fieldset> 

           <!-- Attribute Selection Interface -->
           <fieldset>
           		<legend>Choose which attributes to display</legend>
           		<?php 
           		$attributes = array("Precipitation", "SnowDepth", "Snowfall", "AverageTemperature", "MaximumTemperature", "MinimumTemperature", "WaterEquivilent");

           		foreach ($attributes as $atr) {
                $name = $atr;
           			print '<input type = "checkbox" name = "chk' . $name . '" id = "chk' . $name . '" value = "' . $name . '">' . $name . '</input>' . PHP_EOL;
           		}
           		?>
           	</fieldset>
           	<!-- End Attribute Selection Interface -->

            <fieldset class="buttons">
                <legend></legend>
                <input class = "button" id = "btnSubmit-station" name = "btnSubmit-station" tabindex = "900" type = "submit" value = "Submit" >
            </fieldset> 
</form>  
 
<?php

}  
    
    if (isset($_GET["lstStations"])) {
        print "**********************************************";
        $station_choose = $_GET["lstStations"];
        foreach ($station_choose as $station){
            print $station;
            print "<br";
        }
    }

?>



<?php
include 'footer.php';
?>