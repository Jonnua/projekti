<?php
// Fillon sesionin - kjo është e nevojshme për të përdorur variablat e sesionit
session_start();

// Shkatërron të gjitha të dhënat e sesionit aktual
session_destroy();

// Ridrejton përdoruesin në faqen e hyrjes
header('Location: ../pages/login.php');
?>
