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
                <input type="hidden" name="addtask">
                <div class="form-group">
                    <label for="name">Wat is uw naam:</label>
                    <input type="text" name="name" id="name" placeholder="Jhon Doe">
                </div>
                <div class="form-group">
                    <label for="section">afdeling:</label>
                    <select name="afdeling" id="afdeling">
                        <option value="">kies een afdeling</option>
                        <option value="techniek">techniek</option>
                        <option value=""></option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">title van de taak:</label>
                    <input type="text" name="title" id="title">
                </div>
                <div class="form-group">
                    <label for="description">beschrijving:</label>
                    <textarea name="description" id="description"></textarea>
                </div>
                <div class="form-group"></div>
            </form>
        </div>

    </div>

</body>

</html>