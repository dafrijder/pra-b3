<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo $base_url; ?>/css/admin.css">
    <?php require_once '../head.php'; ?>
    <style>
        td .edit {
            background-color: #24b308;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 0.25rem;
            font-size: 1rem;
            font-weight: bold;
            transition: 0.2s ease-in-out;
            height: 40px;
        }

        td .edit:hover,
        .edit:active {
            background-color: #1c8f06;
            scale: 1.05;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        td .delete {
            background-color:rgb(36, 95, 189);
            color: white;
            padding: 12px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }

        td .delete:hover,
        .delete:active {
            background-color:rgb(17, 71, 158) ;
            scale: 1.05;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
    </style>
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
            </tr>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user['username']; ?></td>
                    <td><?php echo $user['role']; ?></td>
                    <td><?php echo $user['department']; ?></td>
                    <td><a class='edit' href="edit.php?id=<?php echo $user["id"] ?>"><i class="fa-solid fa-pencil"></i></a></td>
                    <td><button class='delete' href=""><i class="fa-solid fa-trash-can"></i></button></td>

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
    </div>
</body>

</html>