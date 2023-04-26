<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Rozgrywki futbolowe</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <h2>Światowe rozgrywki piłkarskie</h2>
        <img src="obraz1.jpg" alt="boisko">
    </header>

    <div id="mecze">
        <?php
        $conn = mysqli_connect('localhost', 'root', '', 'egzamin');

        $sql1 = "SELECT `zespol1`,`zespol2`,`wynik`,`data_rozgrywki` FROM `rozgrywka` WHERE `zespol1` = 'EVG';";

        $result = mysqli_query($conn, $sql1);

        while ($row = mysqli_fetch_assoc($result)) {
            echo ''
                . '<div class="rozgrywka">'
                . ''
                . '<h3>'
                . $row['zespol1']
                . ' - '
                . $row['zespol2']
                . '</h3>'
                . ''
                . '<h4>'
                . $row['wynik']
                . '</h4>'
                . ''
                . '<p>'
                . 'w dniu: '
                . $row['data_rozgrywki']
                . '</p>'
                . ''
                . '</div>'
                . '';
        }

        mysqli_close($conn);
        ?>
    </div>

    <main>
        <div id="glowny">
            <h2>Reprezentacja Polski</h2>
        </div>
        <div id="lewy">
            <p>Podaj pozycję zawodników (1-bramkarze, 2-obrońcy, 3-pomocnicy, 4-napastnicy):</p>

            <form action="futbol.php" method="post">
                <input type="number" name="pozycja" id="pozycja">

                <input type="submit" value="Sprawdź">
            </form>

            <ul>
                <?php
                $conn = mysqli_connect('localhost', 'root', '', 'egzamin');

                if (isset($_POST['pozycja'])) {
                    $pozycja = $_POST['pozycja'];

                    $sql2 = "SELECT `imie`,`nazwisko` FROM `zawodnik` WHERE `pozycja_id` = '$pozycja';";

                    $result = mysqli_query($conn, $sql2);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo ''
                            . '<li>'
                            . $row['imie']
                            . ' '
                            . $row['nazwisko']
                            . '</li>'
                            . '';
                    }
                } else {
                    echo 'wprowadz pozycje<br>';
                }

                mysqli_close($conn);
                ?>
            </ul>
        </div>
        <div id="prawy">
            <img src="zad1.png" alt="piłkarz">
            <p>Autor: 00000000000000</p>
        </div>
    </main>

</body>

</html>