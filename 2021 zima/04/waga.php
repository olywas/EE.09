<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Twój wskaźnik BMI</title>
    <link rel="stylesheet" href="styl4.css">
</head>

<body>
    <header>
        <div id="baner">
            <h2>Oblicz wskaźnik BMI</h2>
        </div>
        <div id="logo">
            <img src="wzor.png" alt="liczymy BMI">
        </div>
    </header>

    <main>
        <div id="lewy">
            <img src="rys1.png" alt="zrzuć kalorie!">
        </div>
        <div id="prawy">
            <h1>Podaj dane</h1>
            <form action="waga.php" method="post">
                <label for="waga">Waga: </label>
                <input type="number" name="waga" id="waga"><br>

                <label for="wzrost">Wzrost [cm]: </label>
                <input type="number" name="wzrost" id="wzrost"><br>

                <input type="submit" value="Licz BMI i zapisz wynik">
            </form>
            <?php
            if (isset($_POST['waga']) && isset($_POST['wzrost'])) {

                $waga = $_POST['waga'];
                $wzrost = $_POST['wzrost'];

                $bmi = ($waga / ($wzrost * $wzrost)) * 10000;

                echo 'Twoja waga: ' . $waga . '; Twój wzrost: ' . $wzrost . '<br>BMI wynosi: ' . $bmi;

                if ($bmi >= 0 && $bmi <= 19) {
                    $bmi_id = '1';
                } else if ($bmi >= 19 && $bmi <= 25) {
                    $bmi_id = '2';
                } else if ($bmi >= 26 && $bmi <= 30) {
                    $bmi_id = '3';
                } else if ($bmi >= 31 && $bmi <= 100) {
                    $bmi_id = '4';
                }

                $dzisiaj = date('Y-m-d');

                $conn = mysqli_connect('localhost', 'root', '', 'egzamin');

                $sql1 = "INSERT INTO `wynik` (`bmi_id`, `data_pomiaru`, `wynik`) VALUES ('$bmi_id', '$dzisiaj', '$bmi');";

                $result = mysqli_query($conn, $sql1);

                if ($result) {
                    echo '<br>poprawnie zapisano';
                } else {
                    echo '<br>błąd';
                }

                mysqli_close($conn);
            }
            ?>
        </div>
        <div id="glowny">
            <table>
                <tr>
                    <th>lp.</th>
                    <th>Interpretacja</th>
                    <th>zaczyna się od...</th>
                </tr>
                <?php
                $conn = mysqli_connect('localhost', 'root', '', 'egzamin');

                $sql1 = "SELECT `id`,`informacja`,`wart_min` FROM `bmi`;";

                $result = mysqli_query($conn, $sql1);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo ''
                        . '<tr>'
                        . ''
                        . '<td>'
                        . $row['id']
                        . '</td>'
                        . ''
                        . '<td>'
                        . $row['informacja']
                        . '</td>'
                        . ''
                        . '<td>'
                        . $row['wart_min']
                        . '</td>'
                        . ''
                        . '</tr>'
                        . '';
                }

                mysqli_close($conn);

                ?>
            </table>
        </div>
    </main>

    <footer>
        Autor: 00000000000000
        <a href="kw2.jpg" target="_blank">Wynik działania kwerendy 2</a>
    </footer>
</body>

</html>