<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Twoje BMI</title>
    <link rel="stylesheet" href="styl3.css">
</head>

<body>
    <header>
        <div id="logo">
            <img src="wzor.png" alt="wzór BMI">
        </div>
        <div id="baner">
            <h1>Oblicz Swoje BMI</h1>
        </div>
    </header>

    <main>
        <div id="glowny">
            <table>
                <tr>
                    <th>Interpretacja BMI</th>
                    <th>Wartość minimalna</th>
                    <th>Wartość maksymalna</th>
                </tr>
                <?php
                $conn = mysqli_connect('localhost', 'root', '', 'egzamin');

                $sql1 = "SELECT `informacja`,`wart_min`,`wart_max` FROM `bmi`;";

                $reuslt = mysqli_query($conn, $sql1);

                while ($row = mysqli_fetch_assoc($reuslt)) {
                    echo ''
                        . '<tr>'
                        . ''
                        . '<td>'
                        . $row['informacja']
                        . '</td>'
                        . ''
                        . '<td>'
                        . $row['wart_min']
                        . '</td>'
                        . ''
                        . '<td>'
                        . $row['wart_max']
                        . '</td>'
                        . ''
                        . '</tr>'
                        . '';
                }

                mysqli_close($conn);
                ?>
            </table>
        </div>
        <div id="lewy">
            <h2>Podaj wagę i wzrost</h2>
            <form action="bmi.php" method="post">
                <label for="waga">Waga: </label>
                <input type="number" name="waga" id="waga" min="1"><br>

                <label for="wzrost">Wzrost w cm: </label>
                <input type="number" name="wzrost" id="wzrost" min="1">

                <input type="submit" value="Oblicz i zapamiętaj wynik">
            </form>

            <?php
            $conn = mysqli_connect('localhost', 'root', '', 'egzamin');

            if (isset($_POST['waga']) && isset($_POST['wzrost'])) {

                $waga = $_POST['waga'];
                $wzrost = $_POST['wzrost'];

                $bmi = ($waga / ($wzrost * $wzrost)) * 10000;

                echo 'Twoja waga: ' . $waga . '; Twój wzrost: ' . $wzrost . '<br>BMI wynosi: ' .  $bmi;

                if ($bmi > 0 && $bmi < 19) {
                    $bmi_id = '1';
                } else if ($bmi > 19 && $bmi < 26) {
                    $bmi_id = '2';
                } else if ($bmi > 26 && $bmi < 31) {
                    $bmi_id = '3';
                } else if ($bmi > 31 && $bmi < 100) {
                    $bmi_id = '4';
                }

                $dzisiaj = date('Y-m-d');

                $sql2 = "INSERT INTO `wynik` (`bmi_id`, `data_pomiaru`, `wynik`) VALUES ('$bmi_id', '$dzisiaj', '$bmi');";

                $reuslt = mysqli_query($conn, $sql2);

                if ($reuslt) {
                    echo '<br>poprawnie dodano do bazy wynik';
                } else {
                    echo '<br>błąd';
                }
            }

            mysqli_close($conn);
            ?>
        </div>
        <div id="prawy">
            <img src="rys1.png" alt="ćwiczenia">
        </div>
    </main>

    <footer>
        Autor: 0000000000000
        <a href="kwerendy.txt" target="_blank">Zobacz kwerendy</a>
    </footer>

</body>

</html>