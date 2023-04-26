<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>piłka nożna</title>
    <link rel="stylesheet" href="styl2.css">
</head>

<body>
    <header>
        <h3>Reprezentacja polski w piłce nożnej</h3>
        <img src="obraz1.jpg" alt="reprezentacja">
    </header>

    <main>

        <div id="lewy">
            <form action="liga.php" method="post">
                <select name="id" id="id">
                    <option value="1">Bramkarze</option>
                    <option value="2">Obrońcy</option>
                    <option value="3">Pomocnicy</option>
                    <option value="4">Napastnicy</option>
                </select>

                <input type="submit" value="Zobacz">
            </form>
            <img src="zad2.png" alt="piłka">
            <p>Autor: 00000000000000</p>
        </div>
        <div id="prawy">
            <ol>
                <?php
                $conn = mysqli_connect('localhost', 'root', '', 'egzamin');

                if (isset($_POST['id'])) {

                    $id = $_POST['id'];

                    $sql1 = "SELECT `imie`,`nazwisko` FROM `zawodnik` WHERE `pozycja_id` = '$id';";

                    $result = mysqli_query($conn, $sql1);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo ''
                            . '<li>'
                            . '<p>'
                            . $row['imie']
                            . ' '
                            . $row['nazwisko']
                            . '</p>'
                            . '</li>'
                            . '';
                    }
                }

                mysqli_close($conn);
                ?>
            </ol>
        </div>
        <div id="glowny">
            <h3>Liga mistrzów</h3>
        </div>
        <div id="liga">
            <?php
            $conn = mysqli_connect('localhost', 'root', '', 'egzamin');

            $sql2 = "SELECT `zespol`,`punkty`,`grupa` FROM `liga` ORDER BY `punkty` DESC;";

            $result = mysqli_query($conn, $sql2);

            while ($row = mysqli_fetch_assoc($result)) {
                echo ''
                    . '<div class="druzyna">'
                    . ''
                    . '<h2>'
                    . $row['zespol']
                    . '</h2>'
                    . ''
                    . '<h1>'
                    . $row['punkty']
                    . '</h1>'
                    . ''
                    . '<p>'
                    . 'grupa: '
                    . $row['grupa']
                    . '</p>'
                    . ''
                    . '</div>'
                    . '';
            }

            mysqli_close($conn);
            ?>
        </div>
    </main>
</body>

</html>