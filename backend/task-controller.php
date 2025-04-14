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
elseif ($action == 'updatestatus')
{
    $task_id = $_POST['task_id'];
    $status = $_POST['status'];
    
    $query = "UPDATE kanban SET status = :status WHERE id = :task_id";
    $stmt = $conn->prepare($query);
    $stmt->execute([
        ":status" => $status,
        ":task_id" => $task_id
    ]);
    
    header('Location: ' . $base_url . '/task/index.php');
    exit;
}
elseif ($action == 'delete')
{
    $task_id = $_POST['task_id'];
    
    // Verify the task exists before deleting
    $checkQuery = "SELECT id FROM kanban WHERE id = :task_id";
    $checkStmt = $conn->prepare($checkQuery);
    $checkStmt->execute([":task_id" => $task_id]);
    
    if ($checkStmt->rowCount() > 0) {
        // Task exists, proceed with deletion
        $deleteQuery = "DELETE FROM kanban WHERE id = :task_id";
        $deleteStmt = $conn->prepare($deleteQuery);
        $deleteStmt->execute([":task_id" => $task_id]);
        
        // Set a success message in session if needed
        $_SESSION['message'] = "Task successfully deleted.";
    } else {
        // Task doesn't exist
        $_SESSION['error'] = "Task not found.";
    }
    
    header('Location: ' . $base_url . '/task/index.php');
    exit;
}
?>
