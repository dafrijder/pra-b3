<?php
$action = $_POST['action'];
var_dump($_POST);

if ($action == 'add-person') {
    $username = $_POST['username'];
    if (empty($username)) {
        $error = 'Gebruikersnaam is verplicht';
    }
    $password = $_POST['password'];
    if (empty($password)) {
        $error = 'Wachtwoord is verplicht';
    }
    $role = $_POST['role'];
    if (empty($role)) {
        $error = 'Functie is verplicht';
    }
    $department = $_POST['department'];
    if (empty($department)) {
        $error = 'Afdeling is verplicht';
    }

    if (isset($error)) {
        $error = 'Er is een fout opgetreden';
    } else {
        $query = "INSERT INTO users (username, password, role, department) VALUES ('$username', '$password', '$role', '$department')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            $success = 'Gebruiker is toegevoegd';
        } else {
            $error = 'Er is een fout opgetreden';
        }
    }

    $statement = mysqli_prepare($conn, $query);
    $item = $statement->fetchALL(PDO::FETCH_ASSOC);

    $statement->execute([
        ": username" => $username,
        ": password" => $password,
        ": role" => $role,
        ": department" => $department
    ]);

    header('Location: ' . $base_url . '/admin.php');
}
?>