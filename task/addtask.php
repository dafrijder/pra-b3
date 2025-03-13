<?php
session_start();
// if (!isset($_SESSION['username'])) {
//     header('Location: ../index.php');
//     exit();
// }
$username = $_SESSION['username'];
$department = $_SESSION['department'];
?>

<!doctype html>
<html lang="nl">

<head>
    <title></title>
    <?php require_once '../head.php'; ?>
</head>

<body>

    <div class="container">
        <div class="addtask-container">
            <div class="addtask-info">
                <h1>Add a task</h1>

            </div>
            <form action="../backend/task-controler.php" method="post">
                <input type="hidden" name="action" value="addtask">
                <input type="hidden" name="username" value="<?php $username?>">
                <input type="hidden" name="department" value="<?php $department?>">
                <input type="hidden" name="status" value="backlog">
                <div class="form-group">
                    <label for="title">title van de taak:</label>
                    <input type="text" name="title" id="title">
                </div>
                <div class="form-group">
                    <label for="description">beschrijving:</label>
                    <textarea name="description" id="description"></textarea>
                </div>
                <div class="form-group">
                    <label for="deadline">Deadline:</label>
                    <input type="date" name="deadline" id="deadline">
                </div>

            </form>
        </div>

    </div>

</body>

</html>