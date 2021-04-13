<?php
// This page will validate a user's login data by comparing it to the database using the userId and password_verify function.
$email = $_POST['email'];
$password = $_POST['password'];

include 'includes/db-connect.php';
$sql = "SELECT * FROM CMSusers WHERE email = :email";
$cmd = $db->prepare($sql);
$cmd->bindParam(':email', $email, PDO::PARAM_STR, 50);

$cmd->execute();
$user = $cmd->fetch();

// If the password is valid, a session begins and the user is redirected to index.php.
if (!empty($user)) {
    if (password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['username'] = $email;
        header('location:index.php');
    }
    else {
        header('location:login.php?invalid=true');
    }
}
else {
    header('location:login.php?invalid=true');
}

include 'includes/footer.php';
?>