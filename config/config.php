<?php

    // connecting to a database
    ob_start();
    session_start();

    $timezone = date_default_timezone_set("Africa/Accra");

    // connecting to the database
    $db['db_server'] = "localhost";
    $db['db_user']   = "root";
    $db['db_pass'] = "";
    $db['db_name'] = "jobportal";


    foreach($db as $key => $value){
        define(strtoupper($key), $value);
    }

    global $cnnection;
    $connection = mysqli_connect(DB_SERVER , DB_USER , DB_PASS , DB_NAME);
        if(!$connection){
            die ("Connection failed" .mysqli_error($connetion));
        }


?>