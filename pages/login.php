<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Login</title> <!-- Titulli i faqes -->
    <link rel="stylesheet" href="../css/login.css"> <!-- Lidhja me skedarin CSS për stailizimin -->
</head>
<body>

    <main>
        <div class="formStyle">
            <p id="loginForm">Login</p> <!-- Teksti për formën e login-it -->
            <form action="../config/cLogin.php" name="loginForm" onsubmit="return validateLoginForm()" method="post"> <!-- Forma e login-it me aksionin për të dërguar të dhënat -->
                <label for="email" class="arrangeLabel">Email: </label><br> <!-- Etiketa për fushën e email-it -->
                <input type="email" placeholder="Enter email..." name="email"><br> <!-- Fusha për email-in -->
                <span class="error" id="erroremail"></span><br> <!-- Mesazhi për gabime me email-in -->

                <label for="password" class="arrangeLabel">Password: </label><br> <!-- Etiketa për fushën e fjalëkalimit -->
                <input type="password" placeholder="Enter password..." name="password"><br>  <!-- Fusha për fjalëkalimin -->
                <span class="error" id="errorpassword"></span><br> <!-- Mesazhi për gabime me fjalëkalimin -->
                <p id="dont">You don't have an account? <a href="register.php"> Register here </a></p> <!-- Teksti për regjistrimin -->
                <input type="submit" value="Login" id="dnButt"><br> <!-- Butoni për login -->
                <p><a href="index.php"> Go back </a></p> <!-- Teksti për kthim prapa -->
                <h1 id="testim"></h1> <!-- Element për shfaqjen e mesazheve -->
            </form>
        </div>
    </main>

    <script src="../js/login.js"></script> <!-- Lidhja me skedarin JavaScript për funksionalitetin -->
</body>
</html>
