<?php
    session_start();
    if ($_SESSION['login'] != ""){
        header('Location: /');
    }
?>


<html>
    <head>
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/style.css" rel="stylesheet">
        <title>Immersion - Login</title>
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
                        <a class="nav-link" href="/">Accueil </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/subject">Sujet</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/scoreboard">Scoreboard</a>
                    </li>
                    <li class="nav-item active">
                        <?php
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

        <div class="content" style="height: fit-content; min-height: 0px; border-radius: 10px; border-bottom: 2px solid rgb(202, 0, 0)">
            <div class="forms">
                <div class="login">
                    <p style="text-align: center;">Connexion</p>
                    <form action="login.php" method="POST">
                        <p>Pseudo</p>
                        <input type="text" name="pseudo" id="pseudo" required />
                        <p>Mot de passe</p>
                        <input type="password" name="pass" id="pass" required /> <br/>
                        <input type="submit" value="Connexion"/> 
                    </form>
                </div>
                <div class="register">
                    <p style="text-align: center;">Inscription</p>
                    <form action="register.php" method="POST">
                        <p>Pseudo</p>
                        <input type="text" name="pseudo" id="pseudo" required />
                        <p>Prénom</p>
                        <input type="text" name="firstname" id="firstname" required />
                        <p>Nom</p>
                        <input type="text" name="lastname" id="lastname" required />
                        <p>Mot de passe</p>
                        <input type="password" name="pass" id="pass" required /> <br/>
                        <input type="submit" value="Inscription"/> 
                    </form>
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="/js/bootstrap.min.js"></script>
    </body>
</html>