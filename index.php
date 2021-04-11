<?php 
include 'includes/header.php';

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

echo '<h2>' . $pages['pageName'] . '</h2>';
echo '<p>' . $pages['pageContent'] . '</p>';

?>

    </body>
</html>