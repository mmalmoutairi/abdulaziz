<?php
    // set parameter for connection database
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'imams';

    //connect to database
    $connection = mysqli_connect($server, $username, $password);

    //if not connect to database print error mesaage
    if (!$connection) {
        die("can not connect to Server");
    }

    //select database
    $db = mysqli_select_db($connection, $database);

    //if database not exists print error message
    if (!$db) {
        die("can not connect to Database");
    }

    // set utf8 for arabic letter
    mysqli_query($connection, "SET NAMES 'utf8'");
?>
