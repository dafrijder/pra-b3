<?php
require_once 'conn.php';
$action = $_POST['action'];
var_dump($_POST);

if ($action == 'add-person') {
    $username = $_POST['username'];
    if (empty($username)) {
        $error = 'Gebruikersnaam is verplicht';
    }
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
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

    $query = "INSERT INTO users (username, password, role, department) VALUES (:username, :password, :role, :department)";
    $statement = $conn->prepare($query);


    $statement->execute([
        ":username" => $username,
        ":password" => $password,
        ":role" => $role,
        ":department" => $department
    ]);

    header('Location: ' . $base_url . '/admin/index.php');
}

if ($action == "update-person") {
    $id = $_POST['id'];
}
if ($action == 'login') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM users WHERE username = :username";
    $statement = $conn->prepare($query);
    $statement->execute([
        ":username" => $username
    ]);
    $user = $statement->fetch();
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user;
        header('Location: ' . $base_url . '/task/index.php');
    } else {
        $error = 'Gebruikersnaam of wachtwoord is onjuist';
    }
}