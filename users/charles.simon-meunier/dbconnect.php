<?php
    $host = 'localhost';
    $username = 'root';
    $password = 'rkSsrA5w';
    $dbname = 'immersion';

    $con = mysqli_connect($host, $username, $password, $dbname);

    mysqli_set_charset($con, "utf8");
?>