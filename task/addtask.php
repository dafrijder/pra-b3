<?php
// session_start();
// if (!isset($_SESSION['username'])) {
//     header('Location: ../index.php');
//     exit();
// }
// $username = $_SESSION['username'];
$username = "niels";
// $department = $_SESSION['department'];
$department = "testing";
?>

<!doctype html>
<html lang="nl">

<head>
    <title></title>
    <?php require_once '../head.php'; ?>
    <link rel="stylesheet" href="../css/addtask.css">
</head>

<body>

    <div class="container">
        <div class="addtask-container">
            <div class="addtask-info">
                <h1>Maak een taak aan</h1>
                <p>Vul de onderstaande velden in om een nieuwe taak toe te voegen aan het systeem. Geef een duidelijke titel en beschrijving zodat anderen begrijpen wat er gedaan moet worden. De taak wordt automatisch toegevoegd aan de backlog.</p>
                <p>Huidige gebruiker: <strong><?php echo $username; ?></strong> | Afdeling: <strong><?php echo $department; ?></strong></p>
            </div>
            <form action="../backend/task-controller.php" method="post">
                <input type="hidden" name="action" value="addtask">
                <input type="hidden" name="username" value="<?php echo $username; ?>">
                <input type="hidden" name="department" value="<?php echo $department ?>">
                <input type="hidden" name="status" value="backlog">
                <div class="form-group">
                    <label for="title">Titel van de taak:</label>
                    <input type="text" name="title" id="title" class="form-input">
                </div>
                <div class="form-group">
                    <label for="description">Beschrijving:</label>
                    <textarea name="description" id="description"></textarea>
                </div>
                <div class="form-group">
                    <label for="deadline">Deadline:</label>
                    <input type="date" name="deadline" id="deadline" class="form-input">
                </div>
                <div class="form-group">
                    <input type="submit" value="Add task">
                </div>

            </form>
        </div>

    </div>

</body>

</html>