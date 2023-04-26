<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Wycieczki i urlopy</title>
    <link rel="stylesheet" href="styl3.css">
</head>

<body>
    <header>
        <h1>BIURO PODRÓŻY</h1>
    </header>

    <div id="lewy">
        <h2>KONTAKT</h2>
        <a href="mailto:biuro@wycieczki.pl">napisz do nas</a>
        <p>telefon: 555666777</p>
    </div>
    <div id="srodkowy">
        <h2>GALERIA</h2>
        <?php
        $conn = mysqli_connect('localhost', 'root', '', 'egzamin3');

        $sql1 = "SELECT `nazwaPliku`,`podpis` FROM `zdjecia` ORDER BY `podpis` ASC;";

        $result = mysqli_query($conn, $sql1);

        while ($row = mysqli_fetch_assoc($result)) {
            echo ''
                . '<img  '
                . 'src="' . $row['nazwaPliku'] . '"'
                . 'alt="' . $row['podpis'] . '"'
                . '>';
        }

        ?>
    </div>
    <div id="prawy">
        <h2>PROMOCJE</h2>
        <table>
            <tr>
                <td>Jesień</td>
                <td>Grupa 4+</td>
                <td>grupa 10+</td>
            </tr>
            <tr>
                <td>5%</td>
                <td>10%</td>
                <td>15%</td>
            </tr>
        </table>
    </div>


    <div id="dane">
        <h2>LISTA WYCIECZEK</h2>
        <?php
        $sql2 = "SELECT `id`,`dataWyjazdu`,`cel`,`cena` FROM `wycieczki` WHERE `dostepna` = '1';";

        $result = mysqli_query($conn, $sql2);
        while ($row = mysqli_fetch_assoc($result)) {
            echo ''
                . $row['id']
                . ', '
                . $row['dataWyjazdu']
                . ', '
                . $row['cel']
                . ', cena: '
                . $row['cena']
                . '<br>';
        }

        mysqli_close($conn);
        ?>
    </div>


    <footer>
        <p>Stronę wykonał: 0000000000000</p>
    </footer>

</body>

</html>