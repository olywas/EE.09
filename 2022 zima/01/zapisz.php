<?php
if (isset($_POST['imie']) && isset($_POST['nazwisko']) && isset($_POST['adres'])) {
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $adres = $_POST['adres'];

    $conn = mysqli_connect('localhost', 'root', '', 'wedkowanie');

    $sql = "INSERT INTO `karty_wedkarskie` (`imie`, `nazwisko`, `adres`, `data_zezwolenia`, `punkty`) VALUES ('$imie', '$nazwisko', '$adres', NULL, NULL);";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo 'poprawnie wyslano';
    } else {
        echo 'błąd';
    }

    mysqli_close($conn);
}
