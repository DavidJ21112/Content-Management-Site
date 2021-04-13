<?php
$title = "Deleting Page...";
include 'includes/header.php';
include 'includes/authenticate.php';

$pageId = $_GET['pageId'];

if (is_numeric($pageId)) {
    try {
        include 'includes/db-connect.php';

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "DELETE FROM pages WHERE pageId = :pageId";
        $cmd = $db->prepare($sql);
        $cmd->bindParam(':pageId', $pageId, PDO::PARAM_INT);
        $cmd->execute();

        $db = null;
    }
    catch (exception $e) {
        header('location:db-error.php');
        exit();
    }
}
header('location:pages.php');
?>
<?php
    include 'includes/footer.php';
?>