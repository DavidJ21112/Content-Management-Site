<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Updating user...</title>
</head>
<body>
<?php

$email = $_POST['email'];
$password = $_POST['password'];
$conPass = $_POST['conPass'];
$userId = $_POST['userId'];
$valid = true;

// All the same validation from save-user
if (empty($email)) {
    echo "Please enter an email address.";
    $valid = false;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Please enter a valid email address.";
    $valid = false;
}

if (empty($password)) {
    echo "Please enter a password.";
    $valid = false;
}

if ($password != $conPass) {
    echo "Passwords do not match, please try again.";
    $valid = false;
}

if ($valid) {
    include 'includes/db-connect.php';

    $sql = "UPDATE CMSusers 
                SET email = :email, password= :password
                WHERE userId = :userId";

    $cmd = $db->prepare($sql);

    // Don't forget to hash the new password!
    $password = password_hash($password, PASSWORD_DEFAULT);

    $cmd = $db->prepare($sql);
    $cmd->bindParam(':email', $email, PDO::PARAM_STR, 50);
    $cmd->bindParam(':password', $password, PDO::PARAM_STR, 255);
    $cmd->bindParam(':userId', $userId, PDO::PARAM_INT);
    $cmd->execute();

    $db = null;

    header('location:user-list.php');
}