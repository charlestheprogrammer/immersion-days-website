<?php
session_start();
if ($_SESSION['login'] != "") {
    $scan = scandir('users');

    foreach($scan as $directory) {
        if ($directory != "." AND $directory != ".." AND $directory != "default" AND $directory != "index.php"){
            echo is_dir("/var/www/html/immersion/users/".$directory."");
            echo $directory;
            exec("rm -rf /var/www/html/immersion/users/".$directory."");
        }
    }

    include("dbconnect.php");

    $result = mysqli_query($con, "SELECT login FROM Users");

    while ($row = mysqli_fetch_row($result)){
        echo $row[0];
        exec("cp -r /var/www/html/immersion/users/default/ /var/www/html/immersion/users/".$row[0]."/");
    }

    header('Location: /');
}

else {
    header('Location: /');
}


?>