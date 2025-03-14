<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require_once '../head.php'; ?>
</head>
<body>
    <h1>Gebruiker aanpassen</h1>

    <form action="<?php echo $base_url; ?>/backend/admin-controller.php" method="post">
        <imput type = "hidden" name = "action" value = "update-person">
    </form>
</body>
</html>