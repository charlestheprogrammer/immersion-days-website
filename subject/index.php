<?php
    session_start();

    function isMobileDevice() {
        return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    }


    if(isMobileDevice()){
        header('Location: /subject/subject.pdf');
    }
?>

<html>
    <head>
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/style.css" rel="stylesheet">
        <title>Immersion - Sujet</title>

        <style>
            .download {
                position: absolute;
                left: 10px;
                bottom: 10px;
                padding: 10px 20px;
                background: rgb(202, 0, 0);
                border-radius: 10px;
                text-decoration: none;
                color: #fff;
                border: 1px solid transparent;
                transition: 1s;
                z-index: 9999;
            }

            .download:hover {
                border: 1px solid rgb(202, 0, 0);
                color: rgb(70, 70, 70);
                text-decoration: none;
                background: none;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="min-height: 5vh">
            <a class="navbar-brand" href="/">Immersion</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="https://draze.fr">Draze.fr</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/">Accueil <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/subject">Sujet <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/scoreboard">Scoreboard</a>
                    </li>
                    <li class="nav-item">
                        <?php
                        if ($_SESSION['login'] != ""){
                            echo "<a class='nav-link' href='/users/".$_SESSION['login']."'>".$_SESSION['login']."</a>";
                        }
                        else {
                            echo "<a class='nav-link' href='/login'>Login</a>";
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </nav>

        <a class="download" href="skeleton.zip" download>
            Téléchargement
        </a>

        <?php
            if ($_SESSION['login'] != "") {
                echo "
                <div class='logout' onclick='location.href = "."\"/login/logout.php\"".";'>
                    <p>Déconnexion</p>
                </div>";
            }
        ?>

        <div class="content">
            <iframe src="subject.pdf" style="width: auto;min-width: 75%; height:90vh; margin-top: 20px;position:relative;left:50%;transform: translateX(-50%)">
        </div>

        


        

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="/js/bootstrap.min.js"></script>
    </body>
</html>