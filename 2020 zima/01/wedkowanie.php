<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Klub wędkowania</title>
    <link rel="stylesheet" href="styl2.css">
</head>

<body>
    <header>
        <h2>Wędkuj z nami!</h2>
    </header>

    <main>
        <div id="lewy">
            <img src="ryba2.jpg" alt="Szczupak">
        </div>
        <div id="prawy">
            <h3>Ryby spokojnego żeru (białe)</h3>

            <?php
            $conn = mysqli_connect('localhost', 'root', '', 'wedkowanie');

            $sql = "SELECT `id`,`nazwa`,`wystepowanie` FROM `ryby` WHERE `styl_zycia` = 2;";

            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                echo $row['id'] . '. ' . $row['nazwa'] . ', wystepuje w: ' . $row['wystepowanie'] . '<br>';
            }

            mysqli_close($conn);
            ?>

            <ol>
                <li>
                    <a href="https://wedkuje.pl/" target="_blank">Odwiedź także</a>
                </li>
                <li>
                    <a href="https://www.pzw.org.pl/home/" target="_blank">Polski Związek Wędkarski</a>
                </li>
            </ol>
        </div>
    </main>

    <footer>
        <p>Stronę wykonał: 000000000000</p>
    </footer>
</body>

</html>