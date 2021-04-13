<?php 
$title="Welcome";
include 'includes/index-header.php';

try {
    include 'includes/db-connect.php';

    if (!empty($_GET['pageId'])) {
        $pageId = $_GET['pageId'];
    }

    $sql = "SELECT * FROM pages
                WHERE pageId = :pageId";

    $cmd = $db->prepare($sql);
    $cmd->bindParam(':pageId', $pageId, PDO::PARAM_INT);
    $cmd->execute();

    $pages = $cmd->fetch();
    $db = null;

    if (!empty($pageId)){
    echo '<h3>' . $pages['pageName'] . '</h3>';
    echo '<p>' . $pages['pageContent'] . '</p>';
    }
}
catch (exception $e) {
    header('location:db-error.php');
    exit();
}

include 'includes/footer.php';
?>