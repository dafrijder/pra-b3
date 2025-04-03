<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: " . $base_url . "/login.php");
    exit;
}
require_once 'conn.php';
$action = $_POST['action'];

if ($action == 'addtask') 
{
    $title = $_POST['title'];
    $description = $_POST['description'];
    $deadline = $_POST['deadline'];
    $status = $_POST['status'];
    $user = $_POST['username'];
    $department = $_POST['department'];
    $query = "INSERT INTO kanban (title, description, user, department, deadline, status) VALUES (:title, :description, :user, :department, :deadline, :status)";
    $stmt = $conn->prepare($query); 
    $stmt->execute([
        ":title" => $title,
        ":description" => $description,
        ":user" => $user,
        ":department" => $department,
        ":deadline" => $deadline,
        ":status" => $status
    ]);
    header('Location: ' . $base_url . '/task/index.php');
}
?>