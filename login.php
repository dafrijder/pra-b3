<!doctype html>
<html lang="nl">

<head>
    <title></title>
    <?php require_once 'head.php'; ?>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>

    <div class="container">
        <?php require_once 'templates/header.php'; ?>
        <div class="login-container">
            <div class="login-info">
                <h1>Login</h1>
                <p>Welkom bij het takenlijst systeem. Log in met je gebruikersnaam en wachtwoord om toegang te krijgen tot je taken en om nieuwe taken aan te maken. Als je nog geen account hebt, neem dan contact op met de beheerder.</p>
            </div>
            <form action="./backend/admin-controller.php" method="post" class="login-form">
                <input type="hidden" name="action" value="login">
                <div class="form-goup">
                    <label for="username">Gebruikersnaam:</label>
                    <input type="text" name="username" id="username">
                </div>
                <div class="form-goup">
                    <label for="password">Wachtwoord:</label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="form-goup">
                    <input type="submit" value="Login">
                </div>
            </form>
            <div class="form-footer">
                <p>Wachtwoord vergeten? Neem contact op met de systeembeheerder voor hulp. Voor technische problemen, stuur een e-mail naar support@developerland.nl.</p>
            </div>
        </div>

    </div>

</body>
<script>
    password = document.getElementById('password');
    password.onfocus = function() {
        password.type = 'text';
    }
    password.onblur = function() {
        password.type = 'password';
    }
</script>
<?php require_once 'templates/footer.php'; ?>
</html>