<!doctype html>
<html lang="nl">

<head>
    <title></title>
    <?php
    require_once '../head.php';
    require_once '../templates/header.php';
    session_start();
    if (!isset($_SESSION['user'])) {
        header("Location: " . $base_url . "/index.php");
        
    }
    ?>
</head>

<body>
    
    <div class="container">


    </div>

</body>

</html>
