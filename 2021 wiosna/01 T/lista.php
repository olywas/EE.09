<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Lista przyjaciół</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <h1>Portal Społeczniościowy - moje konto</h1>
    </header>


    <main>
        <h2>Moje zainteresowania</h2>
        <ul>
            <li>muzyka</li>
            <li>film</li>
            <li>komputery</li>
        </ul>
        <h2>Moi znajomi</h2>

        <?php
        $conn = mysqli_connect('localhost', 'root', '', 'dane');

        $sql = "SELECT `imie`,`nazwisko`,`opis`,`zdjecie` FROM `osoby` WHERE `Hobby_id` = 1 OR `Hobby_id` = 2 OR `Hobby_id` = 6;";

        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            echo ''
                . '<div class="zdjecie">'
                . '<img src="' . $row['zdjecie'] . '" alt="przyjaciel">'
                . '</div>'
                . ''
                . '<div class="opis">'
                . '<h3>'
                . $row['imie']
                . ' '
                . $row['nazwisko']
                . '</h3>'
                . '<p>Ostatni wpis: '
                . $row['opis']
                . '</p>'
                . '</div>'
                . ''
                . '<div class="linia">'
                . '<hr>'
                . '</div>'
                . '';
        }

        mysqli_close($conn);
        ?>
    </main>


    <footer>
        <div id="lewy">
            Stronę wykonał: 0000000000000
        </div>
        <div id="prawy">
            <a href="mailto:ja@portal.pl">napisz do mnie</a>
        </div>
    </footer>
</body>

</html>