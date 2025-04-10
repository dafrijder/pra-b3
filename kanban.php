<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kanban</title>
    <link rel="stylesheet" href="css/kanban.css">
</head>
<header>
    <?php //require_once "header.php"?>
</header>
<body>
    <main>
        <div class="namethislater">
            <div class="titlebox">
                <div class="title">
                    <img src="" alt="logo">
                    <h1>Kanban</h1>
                </div>
            </div>
            <div class="login-box">
                <div class="login">
                    <!--<p>Ingelogd als: <?php echo $_SESSION['username']; ?></p>!-->
                    <a href="logout.php">Uitloggen</a>
                </div>
            </div>
        </div>
        <div class='navbar'>

        </div>
        <div class="box-container">
            <div class="box">
                <p>To do</p>
            </div>
            <div class="box">
                <p>In progress</p>
            </div>
            <div class="box">
                <p>Done</p>
            </div>
        </div>
        <?php 
        require_once "backend/conn.php";
        $query = "SELECT title,description,department FROM kanban";
        $statement=$conn->prepare($query);
        $statement->execute();
        $kanban = $statement->fetchall(PDO::FETCH_ASSOC);
        ?>
        <div class="bigbox-container">
            <div class="to-do">
                <div class="task-box">       
                    <?php 
                        foreach($kanban as $task){
                            if($task['department']=="to-do"){
                                echo "<div class='task'>";
                                echo "<h2>".$task['title']."</h2>";
                                echo "<p>".$task['description']."</p>";
                                echo "<a href=''>Update</a>";
                                echo "<a href=''>Delete</a>";
                                echo "</div>";
                            }
                            else{
                                continue;
                            }
                    }?>
                </div>
            </div>
            <div class="in-progress">
                <div class="task-box">
                    <?php 
                        foreach($kanban as $task){
                            if($task['department']=="in-progress"){
                                echo "<div class='task'>";
                                echo "<h2>".$task['title']."</h2>";
                                echo "<p>".$task['description']."</p>";
                                echo "<a href=''>Update</a>";
                                echo "<a href=''>Delete</a>";
                                echo "</div>";
                            }
                            else{
                                continue;
                            }
                    }?>
                </div>
            </div>
            <div class="done">
                <div class="task-box">
                    <?php 
                    foreach($kanban as $task){
                        if($task['department']=="done"){
                            echo "<div class='task'>";
                            echo "<h2>".$task['title']."</h2>";
                            echo "<p>".$task['description']."</p>";
                            echo "<a href=''>Update</a>";
                            echo "<a href=''>Delete</a>";
                            echo "</div>";
                        }
                        else{
                            continue;
                        }
                    }?>
                </div>
            </div>
        </div>

    </main>
</body>
<footer>
    <?php //require_once "footer.php"?>
</footer>
</html>