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

<div id = "mainBody">

<form action = "<?php print $phpSelf; ?>"
          id = "formStates"
          method = "post">
          <img class = "sectionHeader" src="images/states.png">
                <fieldset id = "stateSelect">  
                    
                    <p>
                        <?php
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
                    print '</select>';
                   
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


    //Find the full state name
    $stateName = "";
    foreach($states as $state) {
      if ($state["STATE"] == $state_choose) {
        $stateName = $state["NAME"];
      }
    }


    ?>

<form action = "results.php"
          id = "formStations"
          method = "post">
          <img class = "sectionHeader" src="images/stations.png">
                <div>
                <fieldset  id = "weatherStations"> 
                      <div class = "stationOutput">  
                <?php
                for ($n = 0; $n < sizeof($checkbox_station); $n = $n + 2) {
                $namePartsShort = explode(", " . $state_choose, $checkbox_station[$n]);
                $namePartsLong = explode(" " . strtoupper($stateName), $checkbox_station[$n]);
                $shortName = "wrong";
                if (strlen($namePartsShort[0]) < strlen($namePartsLong[0]) ) {
                  $shortName = $namePartsShort[0];
                } else {
                  $shortName = $namePartsLong[0];
                }

                
                print '<input type="checkbox" name = "lstStations[]" id = "lstStations" value="' . $checkbox_station[$n] . '" >' . substr($shortName, 0, 20) . "<br>";      
                }
                ?>
                </div>
                <div class = "stationOutput">
                <?php
                for ($n = 1; $n < sizeof($checkbox_station); $n = $n + 2) {
                $namePartsShort = explode(", " . $state_choose, $checkbox_station[$n]);
                $namePartsLong = explode(" " . strtoupper($stateName), $checkbox_station[$n]);
                $shortName = "wrong";
                if (strlen($namePartsShort[0]) < strlen($namePartsLong[0]) ) {
                  $shortName = $namePartsShort[0];
                } else {
                  $shortName = $namePartsLong[0];
                }
                print '<input type="checkbox" name = "lstStations[]" id = "lstStations" value="' . $checkbox_station[$n] . '" >' . substr($shortName, 0, 20) . "<br>";      
                }
                ?>
              </div>
           </fieldset> 
         </div>
         <img class = "sectionHeader" src="images/attributes.png">
           <!-- Attribute Selection Interface -->
           <fieldset id = "attributeSelect">
              <?php 
              $attributes = array("Precipitation", "SnowDepth", "Snowfall", "AverageTemperature", "MaximumTemperature", "MinimumTemperature", "WaterEquivilent");

              print '<div class = "stationOutput">';
              for ($n = 0; $n < sizeof($attributes); $n = $n + 2) {
                $name = $attributes[$n];
                $nameWords = preg_split('/(?=[A-Z])/',$name);
                print '<p><input type = "checkbox" name = "lstAttributes[]" id = "lstAttributes" value = "' . $name . '"> ';
                  foreach($nameWords as $word) {
                    print $word . " ";
                  }
                print ' </input></p>' . PHP_EOL;
              }
              print '</div><div class = "stationOutput">';

              for ($n = 1; $n < sizeof($attributes); $n = $n + 2) {
                $name = $attributes[$n];
                $nameWords = preg_split('/(?=[A-Z])/',$name);
                print '<p><input type = "checkbox" name = "lstAttributes[]" id = "lstAttributes" value = "' . $name . '"> ';
                  foreach($nameWords as $word) {
                    print $word . " ";
                  }
                print ' </input></p>' . PHP_EOL;
              }
              print '</div>';
              ?>
            </fieldset>
            <!-- End Attribute Selection Interface -->

            <fieldset class="buttons">
                <legend></legend>
                <input class = "button" id = "btnSubmit-station" name = "btnSubmit-station" tabindex = "900" type = "submit" value = "Submit" >
            </fieldset> 

            <input type = "hidden" name = "state_choose" value = <?php print $state_choose; ?> >
</form>  

        

<?php

}  
    
   if (isset($_POST["btnSubmit-station"])) {
       
       
        
        foreach ($_POST["lstStation"] as $station){
            print $station;

            print "<br>";
       }
    } 

?>

</div>




<?php
include 'footer.php';
?>