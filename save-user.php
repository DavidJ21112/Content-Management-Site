<?php
$title = "Saving User";
include 'includes/header.php';
// This page will add a newly registered user's information to the database.

$email = $_POST['email'];
$password = $_POST['password'];
$conPass = $_POST['conPass'];

$valid = true;
// Validate if an email was entered, if a password was entered, and if passwords match

if (empty($email)) {
    echo "Please enter an email address.";
    $valid = false;
}

// I discovered the PHP FILTER options in the official documentation at: https://www.php.net/manual/en/filter.examples.validation.php
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
    try{
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

        header('location:login.php');
    }
    catch (exception $e) {
        header('location:db-error.php');
        exit();
    }
}

include 'includes/footer.php';
?>