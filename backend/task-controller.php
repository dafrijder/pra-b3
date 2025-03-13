<?php
require_once 'conn.php';
$action = $_POST['action'];

if ($action == 'addtask') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $deadline = $_POST['deadline'];
    $status = $_POST['status'];
    $username = $_POST['username'];
    $department = $_POST['department'];
    $query = "INSERT INTO tasks (title, description, deadline, status, username, department) VALUES (':title', ':description', ':deadline', ':status', ':username', ':department')";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':deadline', $deadline);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':department', $department);
    $stmt->execute();
    header('Location: ../index.php');

}
?>