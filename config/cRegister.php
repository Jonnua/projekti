<?php
// Përfshijmë skedarin e konfigurimit për lidhjen me bazën e të dhënave
include 'config.php'; 

// Kontrollojmë nëse kemi një kërkesë POST nga forma e regjistrimit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Marrim dhe pastrim të dhënat e hyra nga forma për të parandaluar SQL Injection
    $name = $conn->real_escape_string($_POST['name']);
    $surname = $conn->real_escape_string($_POST['surname']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    $user_type = 0; // Caktojmë një lloj të paracaktuar të përdoruesit

    // Përgatisim SQL query për të shtuar një përdorues të ri në bazën e të dhënave
    $sql = "INSERT INTO users (name, surname, email, password, user_type) VALUES ('$name', '$surname', '$email', '$password', '$user_type')";

    // Ekzekutojmë query dhe kontrollojmë nëse regjistrimi ishte i suksesshëm
    if ($conn->query($sql) === TRUE) {
        // Nëse regjistrimi përfundon me sukses, dërgojmë përdoruesin në faqen e hyrjes
        echo "New record created successfully";
        header("Location: ../pages/login.php"); 
        exit();
    } else {
        // Nëse ka ndonjë gabim, tregojmë gabimin
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Mbyllim lidhjen me bazën e të dhënave
    $conn->close();
}
?>
