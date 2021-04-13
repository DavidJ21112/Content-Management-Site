<?php
$title = "Deleting User... Bye Felicia";
include 'includes/header.php';
include 'includes/authenticate.php';
// This page will process user deletion requests from an authenticated user.

$userId = $_GET['userId'];

if (is_numeric($userId)) {
    try {
        include 'includes/db-connect.php';

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "DELETE FROM CMSusers WHERE userId = :userId";
        $cmd = $db->prepare($sql);
        $cmd->bindParam(':userId', $userId, PDO::PARAM_INT);
        $cmd->execute();

        $db = null;
    }
    catch (exception $e) {
        header('location:db-error.php');
        exit();
    }
}
header('location:user-list.php');

include 'includes/footer.php';
?>