<!DOCTYPE html>
<html lang="en">
    <!-- Nearly every page on the site will have this header file at its top. -->
    <head>
        <meta charset="UTF-8">
        <!-- By assigning unique $title variables on each page, they can all have unique titles in their header. -->
        <title>David's Community | <?php echo $title;?></title>
        <!-- The favicon will use the same image as the page's primary icon.-->
        <link rel="icon" type="image/jpeg" href="images/icon.jpg" />
        <!-- This site is styled by a mix of Bootstrap and custom styles -->
        <link rel="stylesheet" type="text.css" href="css/normalize.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="css/styles.css" />
    </head>
    <body>
        <!-- The navbar contains the main icon, the site's name, links to each database "page" generated dynamically, user login/logout controls, and the admin control panel for logged in users. -->
        <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <div class="d-flex">
            
                <img src="images/icon.jpg" alt="The wonderful icon of our community" height="100" width="100" />
            
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
            <!-- The $title variable will also create the page's specific <h2> header. I realized too late that this would need to be omitted on the index, so I had to make a second, otherwise identical header file for it. -->
            <h2><?php echo $title;?></h2>
