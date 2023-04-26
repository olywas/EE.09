<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Warzywniak</title>
    <link rel="stylesheet" href="styl2.css">
</head>

<body>
    <header>
        <div id="lewy">
            <h1>Internetowy sklep z eko-warzywami</h1>
        </div>
        <div id="prawy">
            <ol>
                <li>warzywa</li>
                <li>owoce</li>
                <li>
                    <a href="https://terapiasokami.pl/" target="_blank">soki</a>
                </li>
            </ol>
        </div>
    </header>

    <main>
        <?php
        $conn = mysqli_connect('localhost', 'root', '', 'dane2');

        $sql1 = "SELECT `nazwa`,`ilosc`,`opis`,`cena`,`zdjecie` FROM `produkty` WHERE `Rodzaje_id` = 1 OR `Rodzaje_id` = 2;";

        $result = mysqli_query($conn, $sql1);

        while ($row = mysqli_fetch_assoc($result)) {
            echo ''
                . '<div class="produkt">'
                . ''
                . '<img src="' . $row['zdjecie'] . '" alt="warzywniak">'
                . ''
                . '<h5>'
                . $row['nazwa']
                . '</h5>'
                . ''
                . '<p>'
                . 'opis: '
                . $row['opis']
                . '</p>'
                . ''
                . '<p>'
                . 'na stanie: '
                . $row['ilosc']
                . '</p>'
                . ''
                . '<h2>'
                . $row['cena']
                . ' zł'
                . '<h2>'
                . '</div>';
        }
        mysqli_close($conn);
        ?>
    </main>

    <footer>
        <form action="sklep.php" method="post">
            <label for="nazwa">Nazwa: </label>
            <input type="text" name="nazwa" id="nazwa">

            <label for="cena">Cena: </label>
            <input type="text" name="cena" id="cena">

            <input type="submit" value="Dodaj produkt">
        </form>
        <?php
        $conn = mysqli_connect('localhost', 'root', '', 'dane2');

        if (isset($_POST['nazwa']) && isset($_POST['cena'])) {
            $nazwa = $_POST['nazwa'];
            $cena = $_POST['cena'];

            $sql2 = "INSERT INTO `produkty` (`id`, `Rodzaje_id`, `Producenci_id`, `nazwa`, `ilosc`, `opis`, `cena`, `zdjecie`) VALUES (NULL, '1', '4', '$nazwa', '10', NULL, '$cena', 'owoce.jpg');";

            $result = mysqli_query($conn, $sql2);

            if ($result) {
                echo 'poprawnie dodano';
            } else {
                echo 'błąd dodawnia';
            }
        } else {
            echo 'wypelnij wszystkie pola';
        }
        mysqli_close($conn);
        ?>

        <p>Stronę wykonał: 0000000000000</p>
    </footer>
</body>

</html>