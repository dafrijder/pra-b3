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
            <!-- check if user is admin -->
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') : ?>
                <a href="<?php echo $base_url; ?>/admin/index.php">Admin Panel</a>
            <?php endif; ?>
            <!-- check if user loged in -->
            <?php if (isset($_SESSION['user'])) : ?>
                <a href="<?php $base_url?>/logout.php">Logout</a>
            <?php else : ?>
                <a href="<?php $base_url?>/login.php">Login</a>
            <?php endif; ?>
        </div>
        <?php if (isset($_SESSION['user'])) : ?>
        <div class="user">
            <p>Welkom <?php echo $_SESSION['user'];
            if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') : ?>
            <i class="fa-solid fa-user-tie"></i>
            <?php else : ?>
                <i class="fa-solid fa-user"></i>
            <?php endif;?></p>
        </div>
        <?php endif; ?>
    </nav>
</header>