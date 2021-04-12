<?php

$username = $_POST['email'];
$password = $_POST['password'];

include 'db.php';
$sql = "SELECT * FROM CMSusers WHERE email = :email";
$cmd = $db->prepare($sql);
$cmd->bindParam(':email', $email, PDO::PARAM_STR, 50);

$cmd->execute();
$user = $cmd->fetch();

if (!empty($user)) {
    if (password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['username'] = $email;
        // header('location:games.php');
    }
    else {
        header('location:login.php?invalid=true');
    }
}
else {
    header('location:login.php?invalid=true');
}

?>