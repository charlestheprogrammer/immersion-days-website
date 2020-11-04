<?php
    include('dbconnect.php');

    $pseudo = $_POST['pseudo'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    echo "test";
    $pass = md5($_POST['pass']."immersionWebsite");

    echo "pass";

    //$s = " select pseudo, score, fullperm from Users where pseudo='Draze'";
    $s = " select pseudo, score, fullperm from Users where pseudo='$username'  &&  password='$pass'";
    $result = mysqli_query($con, $s);

    $n = mysqli_num_rows($result);


    if ($n == 0) {

        session_start();
        $firstname = str_replace(" ", "-", $firstname);
        $lastname = str_replace(" ", "-", $lastname);
        $login = strtolower($firstname).".".strtolower($lastname);
        $insert = mysqli_query($con, "INSERT INTO Users (pseudo, password, fullperm, score, login) VALUES ('".$pseudo."', '".$pass."', FALSE, 0, '".$login."');");

        if ($insert) {
            header("Location: /");
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['score'] = 0;
            $_SESSION['fullperm'] = 0;
            $_SESSION['login'] = $login;
            exec("cp -r /var/www/html/immersion/users/default/ /var/www/html/immersion/users/".$login."/");
            chmod("/var/www/html/immersion/users/".$login."", 0777);
        }
        else {
            session_start();
            header("Location: /login/");
            session_destroy();
        }
    }
    else {
        session_start();
        header("Location: /login/");
        session_destroy();
        return;
    }
    
?>