<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Video On Demand</title>
    <link rel="stylesheet" href="styl3.css">
</head>

<body>
    <header>
        <div id="lewy">
            <h1>Internetowa wypożyczalnia filmów</h1>
        </div>
        <div id="prawy">
            <table>
                <tr>
                    <td>Kryminały</td>
                    <td>Horror</td>
                    <td>Przygodowy</td>
                </tr>
                <tr>
                    <td>20</td>
                    <td>30</td>
                    <td>20</td>
                </tr>
            </table>
        </div>
    </header>

    <main>
        <div id="lista1">
            <h3>Polecamy</h3>
            <?php
            $conn = mysqli_connect('localhost', 'root', '', 'dane3');

            $sql1 = "SELECT `id`,`nazwa`,`opis`,`zdjecie` FROM `produkty` WHERE `id` = 18 OR `id` = 22 OR `id` = 23 OR `id` = 25;";

            $result = mysqli_query($conn, $sql1);

            while ($row = mysqli_fetch_assoc($result)) {
                echo ''
                    . '<div class="film">'
                    . ''
                    . '<h4>'
                    . $row['id']
                    . '. '
                    . $row['nazwa']
                    . '</h4>'
                    . ''
                    . '<img src="' . $row['zdjecie'] . '" alt="film">'
                    . ''
                    . '<p>'
                    . $row['opis']
                    . '</p>'
                    . ''
                    . '</div>';
            }

            mysqli_close($conn);
            ?>
        </div>
        <div id="lista2">
            <h3>Filmy fantastyczne</h3>
            <?php
            $conn = mysqli_connect('localhost', 'root', '', 'dane3');

            $sql2 = "SELECT `id`,`nazwa`,`opis`,`zdjecie` FROM `produkty` WHERE `Rodzaje_id` = 12;";

            $result = mysqli_query($conn, $sql2);

            while ($row = mysqli_fetch_assoc($result)) {
                echo ''
                    . '<div class="film">'
                    . ''
                    . '<h4>'
                    . $row['id']
                    . '. '
                    . $row['nazwa']
                    . '</h4>'
                    . ''
                    . '<img src="' . $row['zdjecie'] . '" alt="film">'
                    . ''
                    . '<p>'
                    . $row['opis']
                    . '</p>'
                    . ''
                    . '</div>';
            }

            mysqli_close($conn);
            ?>
        </div>
    </main>

    <footer>
        <form action="video.php" method="post">
            <label for="id">Usuń film nr.:</label>
            <input type="number" name="id" id="id">

            <input type="submit" value="Usuń film">
        </form>
        <?php
        $conn = mysqli_connect('localhost', 'root', '', 'dane3');

        if (isset($_POST['id'])) {

            $id = $_POST['id'];

            $sql3 = "DELETE FROM `produkty` WHERE `produkty`.`id` = '$id';";

            $result = mysqli_query($conn, $sql3);

            if ($result) {
                echo 'poprawnie usunięto<br>';
            } else {
                echo 'błąd<br>';
            }
        } else {
            echo 'wypełnij pole<br>';
        }

        mysqli_close($conn);
        ?>


        <a href="mailto:ja@poczta.com">0000000000000</a>
    </footer>
</body>

</html>