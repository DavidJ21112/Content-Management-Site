<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Deleting User... Bye Felicia</title>
</head>
<body>
<?php
include 'includes/authenticate.php';

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
        header('location:error.php');
        exit();
    }
}
header('location:user-list.php');
?>
</body>
</html>