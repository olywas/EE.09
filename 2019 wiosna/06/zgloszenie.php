<?php

$zespol = $_POST['zespol'];
$dyspozytor = $_POST['dyspozytor'];
$adres = $_POST['adres'];

$conn = mysqli_connect('localhost', 'root', '', 'ratownictwo');

if (!$conn) {
    echo "blad poloczenia z serwerem";
}

$czas = date('H:i:s');

$sql = "INSERT INTO zgloszenia (id, ratownicy_id, dyspozytorzy_id, adres, pilne, czas_zgloszenia) VALUES (NULL, '$zespol', '$dyspozytor', '$adres', '0', '$czas' );";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo 'poprawnie wysalno';
} else {
    echo 'blad';
}


mysqli_close($conn);
