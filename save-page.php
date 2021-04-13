<?php
$title = "Saving Page";
include 'includes/header.php';
include 'includes/authenticate.php';

$pageName = $_POST['pageName'];
$pageContent = $_POST['pageContent'];
$valid = true;

if (empty(trim($pageName))) { 
    echo "Please enter a Title for your page<br />";
    $valid = false;
    echo '<a href="page-details.php">Back to Page Details</a>';
}
else if (empty(trim($pageContent))) {
    echo "Please enter some Content for your page <br />";
    $valid = false;
    echo '<a href="page-details.php">Back to Page Details</a>';
}

if ($valid) {
        try{
        include 'includes/db-connect.php';

        $sql = "INSERT INTO pages (pageName, pageContent)
            VALUES (:pageName, :pageContent)";

        $cmd = $db->prepare($sql);

        $cmd->bindParam(':pageName', $pageName, PDO::PARAM_STR, 50);
        $cmd->bindParam(':pageContent', $pageContent, PDO::PARAM_STR, 1000);

        $cmd->execute();

        $db = null;

        header('location:pages.php');
    }
    catch (exception $e) {
        header('location:db-error.php');
        exit();
    }
}

include 'includes/footer.php';
?>