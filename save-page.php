<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Saving New Page...</title>
</head>
<body>
<?php

$pageName = $_POST['pageName'];
$pageContent = $_POST['pageContent'];
$valid = true;

if (empty(trim($pageName))) { 
    echo "Please enter a Title for your page<br />";
    $valid = false;
}
else if (empty($pageContent)) {
    echo "Please enter some Content for your page <br />";
    $valid = false;
}

if ($valid) {
    include 'includes/db-connect.php';

    $sql = "INSERT INTO pages (pageName, pageContent)
        VALUES (:pageName, :pageContent)";

    $cmd = $db->prepare($sql);

    $cmd->bindParam(':pageName', $pageName, PDO::PARAM_STR, 50);
    $cmd->bindParam(':pageContent', $pageContent, PDO::PARAM_STR, 1000);

    $cmd->execute();

    $db = null;
}