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
                                    <button class="edit-task-btn"
                                        data-id="<?php echo $task['id']; ?>"
                                        data-status="<?php echo $task['status']; ?>"
                                        data-title="<?php echo $task['title']; ?>">Wijzig status</button>
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
                                    <button class="edit-task-btn"
                                        data-id="<?php echo $task['id']; ?>"
                                        data-status="<?php echo $task['status']; ?>"
                                        data-title="<?php echo $task['title']; ?>">Wijzig status</button>
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
                                    <button class="edit-task-btn"
                                        data-id="<?php echo $task['id']; ?>"
                                        data-status="<?php echo $task['status']; ?>"
                                        data-title="<?php echo $task['title']; ?>">Wijzig status</button>
                                </div>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

    <!-- In the modal section, update the delete form to correctly pass the task ID -->
    <div class="model" id="taskModal">
        <div class="model-content">
            <span class="close">&times;</span>
            <h2>Edit task status</h2>
            <div class="task-title-display">
                <strong>Taak: </strong><span id="modal-task-title"></span>
            </div>
            <form action="../backend/task-controller.php" method="post">
                <input type="hidden" name="action" value="updatestatus">
                <input type="hidden" name="task_id" id="task_id">
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select name="status" id="status">
                        <option value="backlog">backlog</option>
                        <option value="doing">doing</option>
                        <option value="done">done</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" value="Save" class="btn btn-primary">
                </div>
            </form>

            <form action="../backend/task-controller.php" method="post" onsubmit="return confirm('Weet je zeker dat je deze taak wilt verwijderen?');">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="task_id" id="delete_task_id">
                <div class="form-group">
                    <input type="submit" value="Delete Task" class="btn btn-danger">
                </div>
            </form>
        </div>
    </div>


    <script>
        // Get the modal
        const modal = document.getElementById('taskModal');

        // Get the <span> element that closes the modal
        const closeBtn = document.querySelector('.close');

        // Get all edit buttons
        const editButtons = document.querySelectorAll('.edit-task-btn');

        // Get the task_id input fields
        const taskIdInput = document.getElementById('task_id');
        const deleteTaskIdInput = document.getElementById('delete_task_id');

        // Get the status select field
        const statusSelect = document.getElementById('status');

        // Get the task title display element
        const taskTitleDisplay = document.getElementById('modal-task-title');

        // Add click event to all edit buttons
        editButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Get the task ID, current status, and title from data attributes
                const taskId = button.getAttribute('data-id');
                const currentStatus = button.getAttribute('data-status');
                const taskTitle = button.getAttribute('data-title');

                // Set the task ID in both forms
                taskIdInput.value = taskId;
                deleteTaskIdInput.value = taskId;

                // Set the current status in the dropdown
                statusSelect.value = currentStatus;

                // Display the task title in the modal
                taskTitleDisplay.textContent = taskTitle;

                // Display the modal
                modal.style.display = 'block';
            });
        });

        // Close the modal when clicking on <span> (x)
        closeBtn.addEventListener('click', () => {
            modal.style.display = 'none';
        });

        // Close the modal when clicking anywhere outside of it
        window.addEventListener('click', (event) => {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        });
    </script>

</body>

</html>