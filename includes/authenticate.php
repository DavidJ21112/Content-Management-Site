<?php
// If the user is not logged in to an active session, they will be redirected to the login page and any remaining code on the page will not run. This will prevent anonymous users from accessing administrative controls.
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION['username'])) {
    header('location:login.php');
    exit();
}
?>