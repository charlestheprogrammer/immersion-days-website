<?php
    include('dbconnect.php');

    $pseudo = $_POST['pseudo'];
    $pass = md5($_POST['pass']."immersionWebsite");

    $s = "select pseudo, score, fullperm, login from Users where pseudo='$pseudo'  &&  password='$pass'";

    $result = mysqli_query($con, $s);

    $num = mysqli_num_rows($result);

    if ($num == 1) {
        session_start();
        $_SESSION['pseudo'] = $pseudo;
        while ($row = mysqli_fetch_row($result)){
            $_SESSION['login'] = $row[3];
            $_SESSION['score'] = $row[2];
            $_SESSION['fullperm'] = $row[1];
        }
        header("Location: /");
    }
    else {
        header("Location: /login/");
        return;
    }
    
?>