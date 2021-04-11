<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>David's Community</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="css/styles.css" />
    </head>
    <body>
        <header>
            <h1>David's Community</h1>
        </header>
        <nav>
        <!-- Navigation goes here -->
<?php 

include 'includes/db-connect.php';

$sql = "SELECT pageId, pageName FROM pages";

$cmd = $db->prepare($sql);
$cmd->execute();

$pages = $cmd->fetchAll();

echo '<ul>';
foreach ($pages as $p) {
    echo '<li><a href="index.php?pageId='. $p['pageId'] . '">'. $p['pageName'] . '</a></li>';
}

echo '</ul>'

?>
        </nav>