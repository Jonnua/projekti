<?php
// Lidhemi me bazën e të dhënave dhe fillojmë një sesion të ri
include 'config.php'; 
session_start(); 

// Kontrollojmë nëse kemi një kërkesë POST nga forma e hyrjes
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Merrim email dhe fjalëkalim nga forma
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    // Pyesim bazën e të dhënave nëse ekziston një përdorues me këtë email
    $stmt = $conn->prepare("SELECT id, password, user_type FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Kontrollojmë nëse kemi ndonjë përgjigje nga baza e të dhënave
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Kontrollojmë nëse fjalëkalimi është i saktë
        if ($password === $row['password']) { 
            // Vendosim të dhënat e përdoruesit në sesion
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_type'] = $row['user_type'];
            $_SESSION['user_name'] = $row['name']; 
            $_SESSION['user_surname'] = $row['surname']; 
            $_SESSION['user_email'] = $row['email']; 

            // Në varësi të llojit të përdoruesit, ridrejtojmë në faqe të ndryshme
            if ($row['user_type'] == 1) {
                header("Location: ../dashboard/dashboard.php"); 
            } else {
                header("Location: ../pages/afterlogin.php"); 
            }
            exit();
        } else {
            // Nëse fjalëkalimi nuk është i saktë, trego një mesazh gabimi
            echo "<script>alert('Invalid email or password'); window.location.href='login.php';</script>";
            exit();
        }
    } else {
        // Nëse nuk ekziston përdoruesi, trego një mesazh gabimi
        echo "<script>alert('Invalid email or password'); window.location.href='login.php';</script>";
        exit();
    }

    // Mbyllim deklaratën dhe lidhjen me bazën e të dhënave
    $stmt->close();
    $conn->close();
}
?>
