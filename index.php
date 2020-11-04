<?php
    session_start();
?>


<html>
    <head>
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/style.css" rel="stylesheet">
        <title>Immersion - Accueil</title>
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
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Accueil <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/subject">Sujet</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/scoreboard">Scoreboard</a>
                    </li>
                    <li class="nav-item">
                        <?php
                        session_start();
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

        <div class="content">
            <div class="description">
                <div class="text">
                    <h5>L'objectif</h5>
                    <p>Bonjour ! Ce site est le lieu sur lequel vous pouvez vous comparer aux autres étudiants en journée d'immersion, tout comme vous. Les équipes sont détaillées sur la page Teams, le sujet est disponible sur la page qui lui correspond et le scoreboard est dès à présent ouvert.</p>
                    <p>Avant de commencer, vous devez créer un compte en choisissant votre pseudo, et en indiquant votre nom ainsi que votre prénom. Vous pourrez ensuite proposer votre code en cliquant sur votre login qui sera affiché sur le site web.</p>
                    <p>Votre code sera exécuté à chaque envoi sur le serveur, et le classement sera immédiatement actualisé.</p>
                </div>
                <div class="img">
                    <img src="epita.png" class="rounded" alt="" style="max-width: 90%; max-height: 250px">
                </div>
            </div>

            <div class="presentation">
                <div class="img">
                    <img src="campus.jpg" class="rounded" alt="" style="max-width: 90%; max-height: 250px;transform: translateY(-50%);">
                </div>
                <div class="text">
                    <h5>La journée d'immersion</h5>
                    <p>Les journées d'immersion à EPITA ont pour but de vous présenter ce que des étudiants de première année vivent quotidiennement. En cette période particulière et inédite, il nous fallait trouver un autre moyen de continuer de vous proposer des journées d'immersion, en changeant le format pour ne pas avoir de contact. Toute la pédagogie de l'EPITA est conservée ici, vous retrouvez un TP qui s'approche de ce que les étudiants de première année ont chaque semaine. Il y a un classement pour créer un peu de challenge entre vous, exactement comme certains TP de l'école. Enfin pour finir, nous voulions garder un esprit d'équipe et d'entraide, c'est pour cela que nous avons créé des équipes pour vous permettre de poser des questions à un étudiant de l'école et à 4 personnes intéréssées par l'école comme vous.</p>
                </div>
            </div>

            <div class="description" style="margin-top: 20px">
                <div class="text">
                    <h5>Déroulement de cette journée</h5>
                    <p>Cette "journée" est en réalité une demie-journée pendant laquelle vous avez la possibilité de découvrir l'école, c'est pour cela que vous aurez une présentation faite par notre directeur de campus qui expliquera le fonctionnement et la pédagogie de l'école, ainsi que la présentation d'un emploi du temps de SUP (première année de la prépa).</p>
                    <p>Vous aurez ensuite un TP qui vous fera découvrir le langage python, l'affichage dans une console. Vous aurez ensuite la possibilté de découvrir le principe d'une intelligence artificielle en vous entrainant sur un jeu de "hasard", le plus ou moins. Présenté de cette manière, cela va un peu à l'encontre du principe de l'IA qui ne peut se baser sur du hasard, mais vous verrez c'est intéressant.</p>
                    <p>Pour finir, n'oubliez pas de poser toutes les questions que vous souhaitez pendant la présentation ou pendant votre exercice, que ce soit sur du code ou sur le fonctionnement de l'école, tout le monde sera ravi de vous répondre.</p>
                </div>
                <div class="img">
                    <img src="immersion.jpeg" class="rounded" alt="" style="max-width: 90%; max-height: 250px">
                </div>
            </div>

            <div class="presentation" style="margin-bottom: 20px">
                <div class="img">
                    <img src="preparation.png" class="rounded" alt="" style="max-width: 90%; max-height: 250px;transform: translateY(-50%);">
                </div>
                <div class="text">
                    <h5>Préparer son environnement</h5>
                    <p>Pour être le plus efficace possible et participer à cette journée, pas besoin d'installer Linux et de maitriser les commandes de base. Il vous faut simplement avoir Python sur votre ordinateur et une application performante pour coder. Nous vous conseillons Visual Studio Code qui permet d'avoir un thème sombre et une coloration des mots importants du langage pour vous aider. Ce n'est pas la seule aplication et vous êtes libre de choisir entièrement ce que vous préférez.</p>
                    <p>Vous n'utiliserez rien d'autre que du Python pendant cette journée, vous n'avez donc rien d'autre à configurer sur votre ordinateur personnel. Il vous faudra également un compte discord pour pouvoir assister à la journée à distance.</p>
                </div>
            </div>
        </div>

        <?php
            if ($_SESSION['login'] != "") {
                echo "
                <div class='logout' onclick='location.href = "."\"/login/logout.php\"".";'>
                    <p>Déconnexion</p>
                </div>";
            }
        ?>
        

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="/js/bootstrap.min.js"></script>
    </body>
</html>