<?php
setcookie('cookie', 0, time() + 60 * 60 * 2, '/');
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Port Lotniczy</title>
    <link rel="stylesheet" href="styl5.css">
</head>

<body>
    <header>
        <div id="pierwszy">
            <img src="zad5.png" alt="logo lotnisko">
        </div>
        <div id="drugi">
            <h1>Przyloty</h1>
        </div>
        <div id="trzeci">
            <h3>przydatne linki</h3>
            <a href="kwerendy.txt" target="_blank">Pobierz...</a>
        </div>
    </header>

    <main>
        <table>
            <tr>
                <th>czas</th>
                <th>kierunek</th>
                <th>numer rejsu</th>
                <th>status</th>
            </tr>
            <?php

            $conn = mysqli_connect('localhost', 'root', '', 'egzamin');

            $sql1 = "SELECT `czas`,`kierunek`,`nr_rejsu`,`status_lotu` FROM `przyloty` ORDER BY `czas` ASC;";

            $result = mysqli_query($conn, $sql1);

            while ($row = mysqli_fetch_assoc($result)) {
                echo ''
                    . '<tr>'
                    . ''
                    . '<td>'
                    . $row['czas']
                    . '</td>'
                    . ''
                    . '<td>'
                    . $row['kierunek']
                    . '</td>'
                    . ''
                    . '<td>'
                    . $row['nr_rejsu']
                    . '</td>'
                    . ''
                    . '<td>'
                    . $row['status_lotu']
                    . '</td>'
                    . ''
                    . '</tr>'
                    . '';
            }

            mysqli_close($conn);
            ?>
        </table>
    </main>

    <footer>
        <div id="lewy">
            <?php

            if (!isset($_COOKIE['cookie'])) {
                echo '<p><b>Dzień dobry! Strona lotniska używa ciasteczek</b></p>';
            } else {
                echo '<p><i>Witaj ponownie na stronie lotniska</i></p>';
            }

            ?>
        </div>
        <div id="prawy">
            Autor: 000000000000
        </div>
    </footer>

</body>

</html>