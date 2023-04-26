<?php
setcookie('ciastko', 0, time() + 10, '/');
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Odloty samolotów</title>
    <link rel="stylesheet" href="styl6.css">
</head>

<body>
    <header>
        <div id="lewy">
            <h2>Odloty z lotniska</h2>
        </div>
        <div id="prawy">
            <img src="zad6.png" alt="logotyp">
        </div>
    </header>

    <main>
        <h4>tabela odlotów</h4>
        <table>
            <tr>
                <th>lp.</th>
                <th>numer rejsu</th>
                <th>czas</th>
                <th>kierunek</th>
                <th>status</th>
            </tr>
            <?php

            $conn = mysqli_connect('localhost', 'root', '', 'egzamin');

            $sql1 = "SELECT `id`,`nr_rejsu`,`czas`,`kierunek`,`status_lotu` FROM `odloty` ORDER BY `czas` DESC;";

            $result = mysqli_query($conn, $sql1);

            while ($row = mysqli_fetch_assoc($result)) {
                echo ''
                    . '<tr>'
                    . ''
                    . '<td>'
                    . $row['id']
                    . '</td>'
                    . ''
                    . '<td>'
                    . $row['nr_rejsu']
                    . '</td>'
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
        <div id="pierwszy">
            <a href="kw1.jpg" target="_blank">Pobierz obraz</a>
        </div>
        <div id="drugi">
            <?php

            if (!isset($_COOKIE['ciastko'])) {
                echo '<p><i>Dzień dobry! Sprawdź regulamin naszej strony</i></p>';
            } else {
                echo '<p><b>Miło nam, że nas znowu odwiedziłeś</b></p>';
            }


            ?>
        </div>
        <div id="trzeci">
            Autor: 0000000000000
        </div>
    </footer>

</body>

</html>