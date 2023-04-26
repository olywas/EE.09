<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Mój kalendarz</title>
    <link rel="stylesheet" href="styl5.css">
</head>

<body>
    <header>
        <div id="lewy">
            <img src="logo1.png" alt="Mój kalendarz">
        </div>
        <div id="prawy">
            <h1>KALENDARZ</h1>

            <?php
            $conn = mysqli_connect('localhost', 'root', '', 'egzamin5');

            $sql1 = "SELECT `miesiac`,`rok` FROM `zadania` WHERE `dataZadania` = '2020-07-01';";

            $result = mysqli_query($conn, $sql1);

            while ($row = mysqli_fetch_assoc($result)) {
                echo ''
                    . '<h3>'
                    . 'miesiąc: '
                    . $row['miesiac']
                    . ', rok:'
                    . $row['rok']
                    . '<h3>'
                    . '';
            }

            ?>
        </div>
    </header>

    <main>
        <?php

        $sql2 = "SELECT `dataZadania`,`wpis` FROM `zadania` WHERE `miesiac` = 'lipiec';";

        $result = mysqli_query($conn, $sql2);

        while ($row = mysqli_fetch_assoc($result)) {
            echo ''
                . '<div class="dzien">'
                . '<h5>'
                . $row['dataZadania']
                . '</h5>'
                . '<p>'
                . $row['wpis']
                . '<p>'
                . '</div>'
                . '';
        }

        ?>
    </main>

    <footer>
        <form action="" method="POST">
            <label for="wpis">dodaj wpis</label>
            <input type="text" name="wpis" id="wpis">

            <input type="submit" value="DODAJ">
        </form>

        <?php

        if (isset($_POST['wpis'])) {
            $wpis = $_POST['wpis'];

            $sql3 = "UPDATE `zadania` SET `wpis` = '$wpis' WHERE `dataZadania`= '2020-07-13';";

            $result = mysqli_query($conn, $sql3);

            if ($result) {
                echo 'poprawnie uaktualniono';
            } else {
                echo 'blad';
            }
        }
        mysqli_close($conn);
        ?>

        <p>Stronę wykonał: 000000000000</p>
    </footer>

</body>

</html>