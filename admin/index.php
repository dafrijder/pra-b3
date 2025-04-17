<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
    session_start();
    if (!isset($_SESSION['user'])) {
        header("Location: " . $base_url . "/login.php");
        exit;
    }
    require_once '../head.php';
    require_once '../templates/header.php';

    ?>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <div class="container">
        <h1>Administratie</h1>

        <?php
        require_once '../backend/conn.php';
        $query = "SELECT * FROM users";
        $statement = $conn->prepare($query);
        $statement->execute();
        $users = $statement->fetchAll();
        ?>

        <table>
            <h2>Gebruikers</h2>
            <tr>
                <th>Gebruikersnaam</th>
                <th>Functie</th>
                <th>Afdeling</th>
                <th>acties</th>
                <th></th>
            </tr>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user['username']; ?></td>
                    <td><?php echo $user['role']; ?></td> 
                    <td><?php echo $user['department']; ?></td>
                    <td><a class='edit' href="edit.php?id=<?php echo $user["id"] ?>"><i class="fa-solid fa-pencil"></i></a></td>
                    <td><button class='delete' data-id="<?php echo $user["id"] ?>" data-username="<?php echo $user["username"] ?>"><i class="fa-solid fa-trash-can"></i></button></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <div class="">
            <form action="<?php echo $base_url; ?>/backend/admin-controller.php" method="post">
                <input type="hidden" name="action" value="add-person">

                <div class="form-group">
                    <label for="username">Gebruikersnaam:</label>
                    <input type="text" name="username" id="username" class="form-input">
                </div>

                <div class="form-group">
                    <label for="password">Wachtwoord:</label>
                    <input type="password" name="password" id="password" class="form-input">
                </div>

                <div class="form-group">
                    <label for="role">Functie:</label>
                    <select name="role" id="role">
                        <option value="">Kies een optie</option>
                        <option value="user">user</option>
                        <option value="admin">admin</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="department">Afdeling:</label>
                    <input type="text" name="department" id="department" class="form-input">
                </div>
                <input type="submit" value="Toevoegen">
            </form>
        </div>

        <!-- Modal for delete confirmation -->
        <div class="modal" id="deleteModal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Gebruiker verwijderen</h2>
                <p>Weet je zeker dat je deze gebruiker wilt verwijderen?</p>
                <p id="deleteUsername"></p>
                <form action="<?php echo $base_url; ?>/backend/admin-controller.php" method="post">
                    <input type="hidden" name="action" value="delete-person">
                    <input type="hidden" name="id" id="deleteUserId">
                    <input type="submit" value="Verwijderen">
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    const deleteButtons = document.querySelectorAll('.delete');
    const modal = document.getElementById('deleteModal');
    const closeButton = document.querySelector('.close');
    const deleteUserId = document.getElementById('deleteUserId');
    const deleteUsername = document.getElementById('deleteUsername');

    deleteButtons.forEach(button => {
        button.addEventListener('click', () => {
            const id = button.getAttribute('data-id');
            const username = button.getAttribute('data-username');

            deleteUserId.value = id;
            deleteUsername.textContent = username;
            modal.style.display = 'block';
        });
    });

    closeButton.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    window.addEventListener('click', (event) => {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    });
</script>
<?php require_once '../templates/footer.php'; ?>
</html>