<!DOCTYPE html>
<html lang="en">
    <!-- This header is identical in every way to the main header except for the absence of the bottom <h2> element. If I had more time I would refactor the original header, but this will work for now. -->
    <head>
        <meta charset="UTF-8">
        <title>David's Community | <?php echo $title;?></title>
        <link rel="icon" type="image/jpeg" href="images/icon.jpg" />
        <link rel="stylesheet" type="text.css" href="css/normalize.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="css/styles.css" />
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <div class="d-flex">
                <!-- The icon will double as a link to the home page. -->
                <a href="index.php"><img src="images/icon.jpg" alt="The wonderful icon of our community" height="100" width="100" /></a>
            
            <h1 class="p-2">David's Community</h1>
<?php 

try{
    include 'includes/db-connect.php';

    $sql = "SELECT pageId, pageName FROM pages";

    $cmd = $db->prepare($sql);
    $cmd->execute();

    $pages = $cmd->fetchAll();

    echo '<ul class="navbar-nav">';
    foreach ($pages as $p) {
        echo '<li class="nav-item p-2"><a class="nav-link" href="index.php?pageId='. $p['pageId'] . '">'. $p['pageName'] . '</a></li>';
    }

    echo '</ul>';
}
catch (exception $e) {
    header('location:db-error.php');
}
?>

<ul class="navbar-nav" style="margin-left: auto;">
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION['username'])) {
?>
    <li class="nav-item p-2">
        <a class="nav-link" href="register.php">Register</a>
    </li>
    <li class="nav-item p-2">
        <a class="nav-link" href="login.php">Login</a>
    </li>
<?php
}
else { ?>
    <li class="nav-item p-2">
        <a class="nav-link profile" href="#"><?php echo $_SESSION['username']; ?></a>
    </li>
    <li class="nav-item p-2">
        <a class="nav-link" href="logout.php">Logout</a>
    </li>
    <li class="nav-item p-2">
        <a class="nav-link" href="admin-control.php">Admin Control Panel</a>
    </li>
<?php } ?>
            </ul>
            </div>
        </div>
        </nav>
        <div class="container">

<!-- Title h2 is removed specifically for the index, hence the need for a unique header. -->