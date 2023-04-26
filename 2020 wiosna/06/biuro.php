<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Wycieczki krajoznawcze</title>
    <link rel="stylesheet" href="styl4.css">
</head>

<body>
    <header>
        <h1>WITAMY W BIURZE PODRÓŻY</h1>
    </header>

    <main>
        <div id="dane">
            <h3>ARCHIWUM WYCIECZEK</h3>
            <?php
            $conn = mysqli_connect('localhost', 'root', '', 'egzamin4');

            $sql1 = "SELECT `id`,`cel`,`cena` FROM `wycieczki` WHERE `dostepna` = 0;";

            $result = mysqli_query($conn, $sql1);

            while ($row = mysqli_fetch_assoc($result)) {
                echo ''
                    . $row['id']
                    . ', '
                    . $row['cel']
                    . ', cena: '
                    . $row['cena']
                    . '<br>';
            }

            ?>
        </div>

        <div id="lewy">
            <h3>NAJTANIEJ...</h3>
            <table>
                <tr>
                    <td>Włochy</td>
                    <td>od 1200 zł</td>
                </tr>
                <tr>
                    <td>Francja</td>
                    <td>od 1200 zł</td>
                </tr>
                <tr>
                    <td>Hiszpania</td>
                    <td>od 1400 zł</td>
                </tr>
            </table>
        </div>
        <div id="srodkowy">
            <h3>TU BYLIŚMY</h3>
            <?php

            $sql2 = "SELECT `nazwaPliku`,`podpis` FROM `zdjecia`ORDER BY `podpis` DESC;";

            $result = mysqli_query($conn, $sql2);

            while ($row = mysqli_fetch_assoc($result)) {
                echo ''
                    . '<img src="' . $row['nazwaPliku'] . '" alt="' . $row['podpis'] . '">'
                    . '';
            }

            mysqli_close($conn);
            ?>
        </div>
        <div id="prawy">
            <h3>SKONTAKTUJ SIĘ</h3>
            <a href="mailto:wycieczki@wycieczki.pl">napisz do nas</a>
            <p>telefon: 555 666 777</p>
        </div>
    </main>

    <footer>
        <p>Stronę wykonał: 000000000000</p>
    </footer>
</body>

</html>