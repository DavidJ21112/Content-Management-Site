<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <!-- By assigning unique $title variables on each page, they can all have unique titles in their header. -->
        <title>David's Community | <?php echo $title;?></title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="css/styles.css" />
    </head>
    <body>
        <header>
            <h1>David's Community</h1>
            <img src="images/icon.jpg" alt="The wonderful icon of our community" height="200" width="200" />
        </header>
        <nav>
        <!-- Navigation goes here -->
<?php 

try{
    include 'includes/db-connect.php';

    $sql = "SELECT pageId, pageName FROM pages";

    $cmd = $db->prepare($sql);
    $cmd->execute();

    $pages = $cmd->fetchAll();

    echo '<ul>';
    foreach ($pages as $p) {
        echo '<li><a href="index.php?pageId='. $p['pageId'] . '">'. $p['pageName'] . '</a></li>';
    }

    echo '</ul>';
}
catch (exception $e) {
    header('location:db-error.php');
}
?>

<ul>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION['username'])) {
?>
    <li>
        <a href="register.php">Register</a>
    </li>
    <li>
        <a href="login.php">Login</a>
    </li>
<?php
}
else { ?>
    <li>
        <a href="#"><?php echo $_SESSION['username']; ?></a>
    </li>
    <li>
        <a href="logout.php">Logout</a>
    </li>
    <li>
        <a href="admin-control.php">Admin Control Panel</a>
    </li>
<?php } ?>
            </ul>
        </nav>
        <h2><?php echo $title;?></h2>