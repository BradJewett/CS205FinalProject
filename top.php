<!DOCTYPE html>
<html lang="en">
    <head>
        <title>CS205 Sample Query</title>
        <meta charset="utf-8">
        <meta name="author" content="Junfei Ma, Owen Bruning, Brad Jewett, Evie Wight">
        <meta name="description" content="CS205 Sample Query">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--[if lt IE 9]>
        <script src="//html5shim.googlecode.com/sin/trunk/html5.js"></script>
        <![endif]-->

        <link rel="stylesheet" href="custom.css" type="text/css" media="screen">

        <?php
        // %^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
        //
        // inlcude all libraries. 
        // 
        // %^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
        print '<!-- begin including libraries -->';
        
        include 'lib/constants.php';

        include LIB_PATH . '/Connect-With-Database.php';

        $PATH_PARTS = pathinfo($url);

        print '<!-- libraries complete-->';
        
        //*****************creates an erro log for the php code to help with debugging*****************//
        error_reporting(E_ALL);
        // writes over the file to delete it so that I can only see the most recent errors
        $file = fopen("final_project.log", 'w');
        fclose($file);
        ini_set("error_log", "final_project.log");
        ?>	

    </head>

    <!-- **********************     Body section      ********************** -->
     <?php
    print '<body id="' . $PATH_PARTS['filename'] . '">';
    include 'header.php';
    include 'nav.php';
    
    ?>