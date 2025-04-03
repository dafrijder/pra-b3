<?php
require_once 'conn.php';
$action = $_POST['action'];

if ($action == 'add-person') {
    session_start();
    if (!isset($_SESSION['user'])) {
        header("Location: " . $base_url . "/login.php");
        exit;
    }
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
    session_start();
    if (!isset($_SESSION['user'])) {
        header("Location: " . $base_url . "/login.php");
        exit;
    }
    $id = $_POST['id'];
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
    $query = "UPDATE users SET username = :username, password = :password, role = :role, department = :department WHERE id = :id";
    $statement = $conn->prepare($query);
    $statement->execute([
        ":username" => $username,
        ":password" => $password,
        ":role" => $role,
        ":department" => $department,
        ":id" => $id
    ]);
    header('Location: ' . $base_url . '/admin/index.php');
}
if ($action == 'delete-person') {
    session_start();
    if (!isset($_SESSION['user'])) {
        header("Location: " . $base_url . "/login.php");
        exit;
    }
    $id = $_POST['id'];
    $query = "DELETE FROM users WHERE id = :id";
    $statement = $conn->prepare($query);
    $statement->execute([
        ":id" => $id
    ]);
    header('Location: ' . $base_url . '/admin/index.php');
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
        session_start();
        $_SESSION['user'] = $user['username'];

        header('Location: ' . $base_url . '/index.php');
    } else {
        $error = 'Gebruikersnaam of wachtwoord is onjuist';
    }
}
