<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>David's Community</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="css/styles.css" />
    </head>

    <body>
<?php

$email = $_POST['email'];
$password = $_POST['password'];
$conPass = $_POST['conPass'];

$valid = true;
// Validate if an email was entered, if a password was entered, and if passwords match

if (empty($email)) {
    echo "Please enter an email address.";
    $valid = false;
}

// I discovered the PHP FILTER options at: https://www.php.net/manual/en/filter.examples.validation.php
// Used here to check if what was entered in the email field follows proper email format.
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

    // Check if the email address is already in use.

    $sql = "SELECT * FROM CMSusers
                WHERE email = :email";
    
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':email', $email, PDO::PARAM_STR, 50);
    $cmd->execute();

    $user = $cmd->fetch();
    if (!empty($user)) {
        echo 'User already exists';
        $db = null;
        exit();
    }

    // Add the new user to the database after hashing their password.
    $sql = "INSERT INTO CMSusers (email, password) VALUES (:email, :password)";

    // Hash the password
    $password = password_hash($password, PASSWORD_DEFAULT);
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':email', $email, PDO::PARAM_STR, 50);
    $cmd->bindParam(':password', $password, PDO::PARAM_STR, 255);

    $cmd->execute();

    $db = null;

    echo "User Saved!";
    // // redirect to login
    // header('location:login.php');
}


?>
    </body>
</html>