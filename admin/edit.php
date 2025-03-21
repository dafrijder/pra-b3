<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require_once '../head.php'; ?>
</head>

<?php
$id = $_GET['id'];

require_once '../backend/conn.php';
$query = "SELECT * FROM users WHERE id = :id";
$statement = $conn->prepare($query);
$statement->execute([
    ":id" => $id
]);
$user = $statement->fetch();
?>

<body>
    <h1>Gebruiker aanpassen</h1>

    <form action="<?php echo $base_url; ?>/backend/admin-controller.php" method="post">
        <imput type="hidden" name="action" value="update-person">
        <imput type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <div class="form-group">
            <label for="username">Gebruikersnaam:</label>
            <input type="text" name="username" id="username" class="form-input" value="<?php echo $user['username']; ?>">
        </div>
        <div class="form-group">
            <label for="password">Wachtwoord</label>
            <input type="password" name="password" id="password" class="form-input">
        </div>
        <div class="form-group">
            <label for="role">Functie:</label>
            <select name="role" id="role" class="form-input">
                <option value="">Kies een optie</option>
                <option value="user">user</option>
                <option value="admin">admin</option>
            </select>
        </div>
        <div class="form-group">
            <label for="department">Afdeling:</label>
            <input type="text" name="department" id="department" class="form-input" value="<?php echo $user['department']; ?>">
        </div>
        <div class="form-group">
            <input type="submit" value="Opslaan" class="btn">
        </div>
    </form>
</body>

</html>