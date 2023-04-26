<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Wędkujemy</title>
    <link rel="stylesheet" href="styl_1.css">
</head>

<body>

    <header>
        <h1>Portal dla wędkarzy</h1>
    </header>

    <main>
        <div id="lewy">
            <h2>Ryby drapieżne naszych wód</h2>

            <?php
            $conn = mysqli_connect('localhost', 'root', '', 'wedkowanie');

            $sql = "SELECT nazwa, wystepowanie FROM ryby WHERE styl_zycia = 1;";

            $result =  mysqli_query($conn, $sql);

            echo '<ul>';
            while ($row = mysqli_fetch_array($result)) {
                echo ''
                    . '<li>'
                    . $row['nazwa'] . ', występowanie: ' . $row['wystepowanie']
                    . '</li>'
                    . '';
            }
            echo '</ul>';



            mysqli_close($conn);
            ?>
        </div>

        <div id="prawy">
            <img src="ryba1.jpg" alt="Sum">
            <br>
            <a href="kwerendy.txt" download="kwerendy.txt">Pobierz kwerendy</a>
        </div>
    </main>

    <footer>
        <p>Stronę wykonał:00000000000</p>
    </footer>

</body>

</html>