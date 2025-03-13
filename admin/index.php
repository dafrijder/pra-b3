<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require_once 'head.php'; ?>
</head>

<body>
    <?php require_once 'header.php'; ?>
    <h1>Administratie</h1>
    <div class="form-group">
        <form action="<?php echo $base_url; ?>/backend/admin-controller.php" method="post">
            <imput type="hidden" name="action" value="add-person">

                <div class="form-group">
                    <label for="username">Gebruikersnaam:</label>
                    <imput type="text" name="username" id="username" class="form-imput">
                </div>

                <div class="form-group">
                    <label for="password">Wachtwoord:</label>
                    <imput type="text" name="password" id="password" class="form-imput">
                </div>

                <div class="form-group">
                    <label for="role">Functie:</label>
                    <select name="role" id="role">
                        <option value="">Kies een optie</option>
                        <option value="user">user</option>
                        <option value="admin">admin</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="department">Afdeling:</label>
                    <imput tupe="department" id="department" class="form-imput">
                </div>
                <imput type="submit" value="Toevoegen">
        </form>
    </div>


    <?php require_once 'footer.php'; ?>
</body>

</html>