<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../css/register.css"> <!-- Lidhja me skedarin CSS për stailizimin -->
</head>
<body>
  
    <main>
        <div class="formStyle">
            <p id="registerForm">Register</p> <!-- Teksti për formën e regjistrimit -->
            <form action="../config/cRegister.php" name="myForm" onsubmit="return validateFormRegister()" method="post"> <!-- Forma e regjistrimit me aksionin për të dërguar të dhënat -->
                <label for="name" class="arrangeLabel" id="pak1">Name: </label><br> <!-- Etiketa për emrin -->
                <input type="text" placeholder="Enter name..." name="name"><br> <!-- Fusha për emrin -->
                <span class="error" id="errorname"></span><br> <!-- Mesazhi për gabime me emrin -->

                <label for="surname" class="arrangeLabel" id="pak2">Surname: </label><br> <!-- Etiketa për mbiemrin -->
                <input type="text" placeholder="Enter surname..." name="surname"><br> <!-- Fusha për mbiemrin -->
                <span class="error" id="errorsurname"></span><br> <!-- Mesazhi për gabime me mbiemrin -->

                <label for="email" class="arrangeLabel" id="pak3">Email: </label><br> <!-- Etiketa për email-in -->
                <input type="email" placeholder="Enter email..." name="email"><br> <!-- Fusha për email-in -->
                <span class="error" id="erroremail"></span><br> <!-- Mesazhi për gabime me email-in -->

                <label for="password" class="arrangeLabel" id="pak4">Password: </label><br> <!-- Etiketa për fjalëkalimin -->
                <input type="password" placeholder="Enter password..." name="password"><br>  <!-- Fusha për fjalëkalimin -->
                <span class="error" id="errorpassword"></span><br> <!-- Mesazhi për gabime me fjalëkalimin -->
                <p id="dont">You already have an account? <a href="login.php"> Login here </a></p> <!-- Teksti për hyrjen në llogari -->
                <input type="submit" value="Register" id="dnButt"><br> <!-- Butoni për regjistrim -->
                <p><a href="index.php"> Go back </a></p> <!-- Teksti për kthim prapa -->
            </form>
        </div>
    </main>

    <script src="../js/register.js"></script> <!-- Lidhja me skedarin JavaScript për funksionalitetin -->
</body>
</html>
