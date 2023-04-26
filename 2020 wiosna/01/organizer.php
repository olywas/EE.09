<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Organizer</title>
    <link rel="stylesheet" href="styl6.css">
</head>

<body>
    <header>
        <div id="pierwszy">
            <h2>MÓJ ORGANIZER</h2>
        </div>
        <div id="drugi">
            <form action="organizer.php" method="post">
                <label for="wpis">Wpis wydarzenia: </label>
                <input type="text" name="wpis" id="wpis">

                <input type="submit" value="ZAPISZ">
            </form>
            <?php
            $conn = mysqli_connect('localhost', 'root', '', 'egzamin6');

            $wpis = $_POST['wpis'];

            $sql = "UPDATE `zadania` SET `wpis` = '$wpis' WHERE `dataZadania` = '2020-08-27';";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo 'poprawnie uaktualniono';
            } else {
                echo 'błąd';
            }
            ?>
        </div>
        <div id="trzeci">
            <img src="logo2.png" alt="Mój organizer">
        </div>
    </header>

    <main>
        <?php
        $sql1 = "SELECT `dataZadania`,`miesiąc`,`wpis` FROM `zadania` WHERE `miesiąc` = 'sierpień';";

        $result = mysqli_query($conn, $sql1);
        while ($row = mysqli_fetch_assoc($result)) {
            echo ''
                . '<div class="dzien">'
                . '<h6>'
                . $row['dataZadania']
                . ', '
                . $row['miesiąc']
                . '</h6>'
                . '<p>'
                . $row['wpis']
                . '<p>'
                . '</div>'
                . '';
        }


        ?>
    </main>

    <footer>
        <?php
        $sql2 = "SELECT `miesiąc`,`rok` FROM `zadania` WHERE `dataZadania` = '2020-08-01';";

        $result = mysqli_query($conn, $sql2);
        while ($row = mysqli_fetch_assoc($result)) {
            echo ''
                . '<h1>'
                . 'miesiąc: '
                . $row['miesiąc']
                . ', rok: '
                . $row['rok']
                . '</h1>'
                . '';
        }

        mysqli_close($conn);
        ?>
        <p>Stronę wykonał: 00000000000000</p>
    </footer>
</body>

</html>