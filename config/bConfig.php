<?php

// Lidhemi me bazën e të dhënave dhe fillojmë sesionin
include 'config.php'; 
session_start();

// Nëse s'je i kyçur, shko drejt në faqen e kyçjes
if (!isset($_SESSION['user_id'])) {
    header("Location: ../pages/login.php");
    exit();
}

// Nëse dikush po dërgon të dhëna me formularin, merremi me to
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    // Merremi të dhënat e përdoruesit nga sesioni
    $user_id = $_SESSION['user_id'];

    // Pyesim bazën e të dhënave për emrin, mbiemrin dhe emailin e përdoruesit
    $user_query = "SELECT name, surname, email FROM users WHERE id = ?";
    $stmt = $conn->prepare($user_query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_data = $result->fetch_assoc();

    // Nëse gjejmë përdoruesin, vazhdojmë me procesin e rezervimit
    if ($user_data) {
        $name = $user_data['name'];
        $surname = $user_data['surname'];
        $email = $user_data['email'];

        // Merremi të dhënat e tjera nga formulari
        $phone = $conn->real_escape_string($_POST['phone']);
        $guests = intval($_POST['guests']);
        $arrival_date = $conn->real_escape_string($_POST['arrivals']);
        $leaving_date = $conn->real_escape_string($_POST['leaving']);
        $location = $conn->real_escape_string($_POST['location']);
        $address = $conn->real_escape_string($_POST['address']);

        // Hedhim të dhënat në bazën e të dhënave për rezervimin
        $stmt = $conn->prepare("INSERT INTO bookings (user_id, name, surname, email, phone, guests, arrival_date, leaving_date, location, address) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issssiisss", $user_id, $name, $surname, $email, $phone, $guests, $arrival_date, $leaving_date, $location, $address);

        // Nëse rezervimi u bë me sukses, trego një mesazh, ndryshe trego gabimin
        if ($stmt->execute()) {
            echo "Rezervimi u bë me sukses!";
        } else {
            echo "Gabim: " . $stmt->error;
        }

        // Mbyllim deklaratën dhe lidhjen me bazën e të dhënave
        $stmt->close();
    } else {
        echo "Gabim: Nuk u gjetën të dhënat e përdoruesit!";
    }

    // Mbyllim lidhjen me bazën e të dhënave
    $conn->close();
}

?>
