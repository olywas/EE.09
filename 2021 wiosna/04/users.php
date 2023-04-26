<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Panel administratora</title>
    <link rel="stylesheet" href="styl4.css">
</head>

<body>

    <header>
        <h3>Portal Społecznościowy - panel administatora</h3>
    </header>

    <main>
        <div id="lewy">
            <h4>Użytkownicy</h4>
            <?php
            $conn = mysqli_connect('localhost', 'root', '', 'dane4');

            $sql1 = "SELECT `id`,`imie`,`nazwisko`,`rok_urodzenia`,`zdjecie` FROM `osoby` LIMIT 30;";

            $result = mysqli_query($conn, $sql1);

            while ($row = mysqli_fetch_assoc($result)) {
                echo ''
                    . $row['id']
                    . '. '
                    . $row['imie'] . ' ' .  $row['nazwisko']
                    . ', ';

                echo 2022 - $row['rok_urodzenia'];
                echo ' lat<br>';
            }

            mysqli_close($conn);
            ?>
            <a href="settings.html">Inne ustawienia</a>
        </div>
        <div id="prawy">
            <h4>Podaj id użytkownika</h4>
            <form action="users.php" method="post">
                <input type="number" name="id" id="id">

                <input type="submit" value="ZOBACZ" id="submit">
            </form>

            <hr>

            <?php
            $conn = mysqli_connect('localhost', 'root', '', 'dane4');

            if (isset($_POST['id'])) {
                $id = $_POST['id'];

                $sql2 = "SELECT osoby.imie, osoby.nazwisko, osoby.rok_urodzenia, osoby.opis, osoby.zdjecie, hobby.nazwa FROM osoby JOIN hobby ON osoby.Hobby_id = hobby.id WHERE osoby.id = '$id';";

                $result = mysqli_query($conn, $sql2);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo ''
                        . '<h2>'
                        . $id
                        . '. '
                        . $row['imie'] . ' ' .  $row['nazwisko']
                        . '</h2>'
                        . ''
                        . '<img src="' . $row['zdjecie'] . '" alt="' . $id . '">'
                        . ''
                        . '<p>'
                        . 'Rok urodzenia: '
                        . $row['rok_urodzenia']
                        . '</p>'
                        . ''
                        . '<p>'
                        . 'Opis: '
                        . $row['opis']
                        . '</p>'
                        . ''
                        . '<p>'
                        . 'Hobby: '
                        . $row['nazwa']
                        . '</p>'
                        . '';
                }
            }

            mysqli_close($conn);
            ?>
        </div>
    </main>

    <footer>
        <p>Stronę wykonał: 0000000000000</p>
    </footer>
</body>

</html>