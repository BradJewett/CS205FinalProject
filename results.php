
<!DOCTYPE html>
<html>
    <head>
        <title>Photo Gallery</title>
        <meta charset="utf-8">
        <meta name="author" content="Evie Wight">
        <meta name="description" content="Evie Wight's Photos">
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

    <a href='./search.php'>New Search</a>

</body>
</html>