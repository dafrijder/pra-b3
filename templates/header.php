<?php
    session_start();
?>
<header>
    <nav>
        <div class="logo">
            <a href="<?php $base_url?>/index.php"><img src="<?php $base_url?>/img/logo-big-v4.png" alt="logo"></a>
        </div>
        <div class="navlinks">
            <a href="<?php $base_url?>/index.php">home</a>
            <a href="<?php $base_url?>/kanban.php">kanban</a>
            <a href="<?php $base_url?>/task/index.php">tasks</a>
            <?php if (isset($_SESSION['user'])) : ?>
                <a href="<?php $base_url?>/logout.php">Logout</a>
            <?php else : ?>
                <a href="<?php $base_url?>/login.php">Login</a>
            <?php endif; ?>
        </div>
        <div class="user">
            <p>Welkom <?php 
            echo $_SESSION['user'];
            ?></p>
        </div>
    </nav>
</header>