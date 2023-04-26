<?php
$conn = mysqli_connect('localhost', 'root', '', 'wedkarstwo');

if (!$conn) {
    echo 'nie udalo sie polaczyc z baza';
    return;
}

$lowisko = $_POST['lowisko'];
$data = $_POST['data'];
$sedzia = $_POST['sedzia'];


$sql = "INSERT INTO zawody_wedkarskie (Karty_wedkarskie_id, Lowisko_id, data_zawodow, sedzia)
        VALUES (0, '$lowisko', '$data', '$sedzia');";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo 'dodano zawody';
} else {
    echo 'błąd';
}


mysqli_close($conn);
