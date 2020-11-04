<?php
session_start();
if ($_SESSION['login'] != ""){
    $login = $_SESSION['login'];
    $uploads_dir = '/users';
    if ($_FILES["uploadme"]["name"] == "bot.py"){
        $tmp_name = $_FILES["uploadme"]["tmp_name"];
        if (move_uploaded_file($tmp_name, "/var/www/html/immersion/$uploads_dir/$login/bot.py")) {
            header('Location: /scoreboard/');
            $result = shell_exec("python3 users/".$login."/mouli.py");
            include("dbconnect.php");
            mysqli_query($con, "UPDATE Users SET lastscore=".$result." WHERE login = '".$login."'");
            $resultQ = mysqli_query($con, "SELECT score FROM "."Users"." WHERE login = '".$login."'");

            while ($row = mysqli_fetch_row($resultQ)){
                echo $row[0]." - ";
                echo $result;
                if ($result >= $row[0]){
                    echo "updated";
                    mysqli_query($con, "UPDATE Users SET score=".$result." WHERE login = '".$login."'");
                }
            }
        }
        else {
            header("Location: /users/".$login."");
        }
    }
    else {
        header("Location: /users/".$login."");
    }
}

else {
    header('Location: /');
}
?>