<!doctype html>
<html lang="nl">

<head>
    <title></title>
    <link rel="stylesheet" href="../css/task.css">
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
        <div class="kanban">
            <div class="backlog">
                <div class="colum-header">
                    <h2>backlog</h2>
                </div>
                <ul class="task-list">
                    <?php foreach ($tasks as $task) : ?>
                        <?php if ($task['status'] == 'backlog') : ?>
                            <li class="task-item">
                                <div class="task-info">
                                    <h3><?php echo $task['title']; ?></h3>
                                    <p><?php echo $task['description']; ?></p>
                                    <p>Deadline: <?php echo $task['deadline']; ?></p>
                                    <p>Start datum: <?php echo $task['date']; ?></p>
                                    <p>Afdeling: <?php echo $task['department']; ?></p>
                                </div>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="doing">
                <div class="colum-header">
                    <h2>doing</h2>
                </div>
                <ul class="task-list">
                    <?php foreach ($tasks as $task) : ?>
                        <?php if ($task['status'] == 'doing') : ?>
                            <li class="task-item">
                                <div class="task-info">
                                    <h3><?php echo $task['title']; ?></h3>
                                    <p><?php echo $task['description']; ?></p>
                                    <p>Deadline: <?php echo $task['deadline']; ?></p>
                                    <p>Start datum: <?php echo $task['date']; ?></p>
                                    <p>Afdeling: <?php echo $task['department']; ?></p>
                                </div>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="done">
                <div class="colum-header">
                    <h2>done</h2>
                </div>
                <ul class="task-list">
                    <?php foreach ($tasks as $task) : ?>
                        <?php if ($task['status'] == 'done') : ?>
                            <li class="task-item">
                                <div class="task-info">
                                    <h3><?php echo $task['title']; ?></h3>
                                    <p><?php echo $task['description']; ?></p>
                                    <p>Deadline: <?php echo $task['deadline']; ?></p>
                                    <p>Start datum: <?php echo $task['date']; ?></p>
                                    <p>Afdeling: <?php echo $task['department']; ?></p>
                                </div>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

</body>

</html>