<!doctype html>
<html lang="nl">

<head>
    <title></title>
    <?php
    require_once '../head.php';
    require_once '../templates/header.php';
    if (!isset($_SESSION['user'])) {
        header("Location: " . $base_url . "/index.php");
    }
    ?>
</head>
<?php
require_once '../backend/conn.php';
$query = "SELECT * FROM kanban";
$statement = $conn->prepare($query);
$statement->execute();
$tasks = $statement->fetchAll();
?>

<body>

    <div class="container">
        <table>
            <tr>
                <th>Todo</th>
                <th>Doing</th>
                <th>Done</th>
            </tr>
            <?php foreach ($tasks as $task) :?>
                <tr>
                    <td><h3><?php echo $task['title'] ?></h3></td>
                    <td><p><?php echo $task['description'] ?></p></td>
                    <td><?php echo $task['deparment'] ?></td>
                    <td><?php echo $task['status'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

    </div>

</body>

</html> 