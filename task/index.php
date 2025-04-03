<!doctype html>
<html lang="nl">

<head>
    <title></title>
    <?php
    require_once '../head.php';
    require_once '../templates/header.php';
    if (!isset($_SESSION['user'])) {
        header("Location: " . $base_url . "/login.php");
        exit;
    }
    ?>
</head>

<body>
    
    <div class="container">


    </div>

</body>

</html>
