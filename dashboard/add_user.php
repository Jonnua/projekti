<?php
include '../config/config.php'; // Përfshini skedarin e konfigurimit për të vendosur një lidhje me bazën e të dhënave

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Merrni të dhënat e formës duke përdorur metodën POST
    $name = $conn->real_escape_string($_POST['name']); // Merrni emrin
    $surname = $conn->real_escape_string($_POST['surname']); // Merrni mbiemrin
    $email = $conn->real_escape_string($_POST['email']); // Merrni adresën email
    $password = $conn->real_escape_string($_POST['password']); // Merrni fjalëkalimin
    $user_type = $conn->real_escape_string($_POST['user_type']); // Merrni tipin e përdoruesit

    // SQL query për të shtuar përdoruesin në tabelën e përdoruesve
    $sql = "INSERT INTO users (name, surname, email, password, user_type) VALUES ('$name', '$surname', '$email', '$password', '$user_type')";

    // Kontrolloni nëse query është ekzekutuar me sukses
    if ($conn->query($sql) === TRUE) {
        echo "Përdoruesi është shtuar me sukses!";
    } else {
        echo "Gabim: " . $conn->error;
    }

    $conn->close(); // Mbyllni lidhjen me bazën e të dhënave
}
?>
