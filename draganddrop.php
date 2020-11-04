<?php
    session_start();
    $url = $_SERVER['REQUEST_URI'];
    $url = str_replace("/", "", $url);
    $url = str_replace("users", "", $url);
    if ($url != "draganddrop.php" && $url != $_SESSION['login']){
        header('Location: /');
    }
?>


<html>
    <head>
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/style.css" rel="stylesheet">
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
                        <a class="nav-link" href="/">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/teams">Teams</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/subject">Sujet</a>
                    </li>
                    <li class="nav-item active">
                        <?php
                        session_start();
                        if ($_SESSION['login'] != ""){
                            echo "<a class='nav-link' href='/users/".$_SESSION['login']."'>".$_SESSION['login']." <span class='sr-only'>(current)</span></a>";
                        }
                        else {
                            echo "<a class='nav-link' href='/login'>Login</a>";
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </nav>

        <form action="/moulinette.php" class="tryscore">
            <p>Déposez ici le fichier du code pour faire afficher votre score publiquement</p>
            <input type="file" id="file" required />
            <label for="file" class="btn-3"><span>Selectionner</span></label>
            <input type="submit" value="Envoyer">
        </form>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="/js/bootstrap.min.js"></script>
    </body>
</html>