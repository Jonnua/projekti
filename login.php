<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>

    <main>
        <div class="formStyle">
            <p id="loginForm">Login</p>
            <form action="afterlogin.php" name="myForm" onsubmit="return validateFormLogin()">
                
            <label for="email" class="arrangeLabel" id="pak1">Email: </label>
            <input type="email" placeholder="Enter email" id="emaili" name="email"><br>
            <span class="error" id="erroremail"></span><br>
            
            <label for="password" class="arrangeLabel" id="pak2">Password: </label>
            <input type="password" placeholder="Enter password" id="passi" name="password">
            <span class="error" id="errorpassword"></span>

            <p id="dont">You don't have an account? <a href="register.php"> Register here </a></p>
            <input type="submit" value="Login" id="dnButt"><br>
            <p><a href="index.php"> Go back </a></p>
            <h1 id="testim"></h1>
            </form>
        </div>
        
    </main>

    <script src="./js/login.js"></script>
</body>
</html>