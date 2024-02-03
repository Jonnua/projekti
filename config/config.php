<?php
// Caktojmë të dhënat e lidhjes me bazën e të dhënave
$servername = "localhost"; // Emri i serverit
$username = "root";       // Emri i përdoruesit për bazën e të dhënave
$password = "";           // Fjalëkalimi për bazën e të dhënave (bosh në këtë rast)
$dbname = "user_database";// Emri i bazës së të dhënave

// Krijimi i lidhjes me bazën e të dhënave
$conn = new mysqli($servername, $username, $password, $dbname);

// Kontrollojmë nëse lidhja me bazën e të dhënave ka dështuar
if ($conn->connect_error) {
  // Nëse ka një gabim, ndalo ekzekutimin dhe trego mesazhin e gabimit
  die("Connection failed: " . $conn->connect_error);
}
?>

