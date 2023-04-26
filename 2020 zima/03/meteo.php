<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Prognoza pogody Poznań</title>
    <link rel="stylesheet" href="styl4.css">
</head>

<body>
    <header>
        <div id="lewy">
            <p>maj, 2019 r.</p>
        </div>
        <div id="srodkowy">
            <h2>Prognoza dla Poznania</h2>
        </div>
        <div id="prawy">
            <img src="logo.png" alt="prognoza">
        </div>
    </header>

    <div id="lewy">
        <a href="kwerendy.txt" download="kwerendy">Kwerendy</a>
    </div>
    <div id="prawy">
        <img src="obraz.jpg" alt="Polska, Poznań">
    </div>

    <main>
        <table>
            <tr>
                <th>Lp.</th>
                <th>DATA</th>
                <th>NOC - TEMPERATURA</th>
                <th>DZIEŃ - TEMPERATURA</th>
                <th>OPADY [mm/h]</th>
                <th>CIŚNIENIE [hPa]</th>
            </tr>
            <?php

            $conn = mysqli_connect('localhost', 'root', '', 'prognoza');

            $sql = "SELECT * FROM `pogoda` WHERE `miasta_id` = 2 ORDER BY `data_prognozy` DESC;";
            $i = 1;

            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo ''
                    . '<tr>'
                    . '<td>'
                    . $i++
                    . '</td>'
                    . '<td>'
                    . $row['data_prognozy']
                    . '</td>'
                    . '<td>'
                    . $row['temperatura_noc']
                    . '</td>'
                    . '<td>'
                    . $row['temperatura_dzien']
                    . '</td>'
                    . '<td>'
                    . $row['opady']
                    . '</td>'
                    . '<td>'
                    . $row['cisnienie']
                    . '</td>'
                    . '</tr>'
                    . '';
            }
            mysqli_close($conn);
            ?>
        </table>
    </main>

    <footer>
        <p>Stronę wykonał: 000000000000</p>
    </footer>

</body>

</html>