<?php
    session_start();
?>


<html>
    <head>
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/style.css" rel="stylesheet">

        <title>Immersion - Scoreboard</title>

        <style>
            .content {
                padding-left: 40px;
                padding-right: 40px;
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
                        <a class="nav-link" href="/">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/subject">Sujet</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/scoreboard">Scoreboard <span class="sr-only">(current)</span></a>
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
            <div class="scoreboard">
                <?php
                if ($_SESSION['login'] != "") {
                    include('dbconnect.php');
                    $result = mysqli_query($con, "SELECT login, pseudo, lastscore, date FROM Users ORDER BY lastscore desc");
                    $i = 1;
                    while ($row = mysqli_fetch_row($result)) {
                        if ($row[0] == $_SESSION['login']){
                            $score = $row[2];
                            $pseudo = $row[1];
                            $rank = $i;
                            $date = $row[3];
                        }
                        $i++;
                    }
                    if (isset($date)){
                        $split = explode("-", $date);
                        $time = explode(":", explode(" ", $split[2])[1]);
                        $year = explode(" ", $split[2])[0]."/".$split[1]."/".substr($split[0], 1, 2)." à ".$time[0].":".$time[1];
                    }
                    else {
                        $year = "-";
                    }
                    echo "
                    <div class='perso'>
                        <p>Classement personnel</p>
                        <table style='width:95%; position:relative;left:50%;transform:translateX(-50%);'>
                            <thead>
                                <tr>
                                    <td style='width:8%;margin-left:10px'>Rang</td>
                                    <td style='width:fit-content;'>Nom</td>
                                    <td>Pseudo</td>
                                    <td>Score</td>
                                    <td>Dernier refresh</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class='item'>
                                    <td class='self'>".$rank."</td>
                                    <td>".$_SESSION['login']."</td>
                                    <td>".$pseudo."</td>
                                    <td>".$score."</td>
                                    <td>".$year."</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>";
                }
                ?>
                

                <div class="global">
                    <p>Scoreboard</p>
                    <table style="width:95%; position:relative;left:50%;transform:translateX(-50%);">
                        <thead>
                            <tr>
                                <td style="width:8%;margin-left:10px">Rang</td>
                                <td style="width:fit-content;">Nom</td>
                                <td>Pseudo</td>
                                <td>Score</td>
                                <td>Best score</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                include('dbconnect.php');
                                $result = mysqli_query($con, "SELECT login, pseudo, score, lastscore FROM Users ORDER BY score desc");
                                $i = 1;
                                $totalscore = 0;
                                $totalcurrent = 0;
                                while ($row = mysqli_fetch_row($result)){
                                    echo "<tr class='item'>";
                                    if ($row[0] == $_SESSION['login']){
                                        echo "<td class='self'>".$i."</td>";
                                    }
                                    else {
                                        echo "<td>".$i."</td>";
                                    }
                                    echo "<td>".$row[0]."</td>";
                                    echo "<td>".$row[1]."</td>";
                                    echo "<td>".$row[3]."</td>";
                                    echo "<td>".$row[2]."</td>";
                                    echo "</tr>";
                                    $i++;
                                    $totalscore += (int)$row[2];
                                    $totalcurrent += (int)$row[3];
                                }

                                echo "<tr class='item'>";
                                echo "<td colspan='3'>Scores cummulés</td>";
                                echo "<td>".$totalcurrent."</td>";
                                echo "<td>".$totalscore."</td>";
                            ?>
                        </tbody>
                    </table>
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