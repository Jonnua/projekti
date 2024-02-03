<?php
include '../config/config.php'; // Përfshini skedarin e konfigurimit për të vendosur një lidhje me bazën e të dhënave

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Merrni të dhënat e formës duke përdorur metodën POST
    $user_id = $conn->real_escape_string($_POST['user_id']); // Merrni ID e përdoruesit
    $name = $conn->real_escape_string($_POST['name']); // Merrni emrin
    $surname = $conn->real_escape_string($_POST['surname']); // Merrni mbiemrin
    $email = $conn->real_escape_string($_POST['email']); // Merrni adresën email
    $phone = $conn->real_escape_string($_POST['phone']); // Merrni numrin e telefonit
    $address = $conn->real_escape_string($_POST['address']); // Merrni adresën
    $location = $conn->real_escape_string($_POST['location']); // Merrni vendndodhjen
    $guests = intval($_POST['guests']); // Konvertoni numrin e vizitorëve në integer
    $arrival_date = $conn->real_escape_string($_POST['arrival_date']); // Merrni datën e arritjes
    $leaving_date = $conn->real_escape_string($_POST['leaving_date']); // Merrni datën e largimit

    $sql = "INSERT INTO bookings (user_id, name, surname, email, phone, address, location, guests, arrival_date, leaving_date) VALUES ('$user_id', '$name', '$surname', '$email', '$phone', '$address', '$location', $guests, '$arrival_date', '$leaving_date')";

    if ($conn->query($sql) === TRUE) {
        echo "Rezervimi është shtuar me sukses!";
    } else {
        echo "Gabim: " . $conn->error;
    }

    $conn->close();
}
?>
