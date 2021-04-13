<?php 
// This index acts as the site's homepage. All database-generated "pages" will be loaded from this page.
// All pages will have a $title variable that will work with the header to generate page titles.
$title="Welcome";
// All pages will include a seperate header file. This index has a unique one, as I put an extra <h2> at the end of the original that I do not want on the index specifically.
include 'includes/index-header.php';

// Try/catch blocks act as error handling to prevent connection data from appearing in error messages.
try {
    // The database connection is included in this file.
    include 'includes/db-connect.php';

    // If there is a pageId, it will be added to a variable to help load a "page" from the database.
    if (!empty($_GET['pageId'])) {
        $pageId = $_GET['pageId'];
    }

    // An SQL query to use a pageId to get the relevant page name and content from the database.
    $sql = "SELECT * FROM pages
                WHERE pageId = :pageId";

    $cmd = $db->prepare($sql);
    $cmd->bindParam(':pageId', $pageId, PDO::PARAM_INT);
    $cmd->execute();

    $pages = $cmd->fetch();
    $db = null;

    // If a pageId is present, the page's content will load from the database.
    if (!empty($pageId)){
    echo '<h3>' . $pages['pageName'] . '</h3>';
    echo '<p>' . $pages['pageContent'] . '</p>';
    }
}
catch (exception $e) {
    // If there's a connection error the page will redirect to a custom error file and abort any remaining code. This is used on all database connections.
    header('location:db-error.php');
    exit();
}

// A seperate footer file is included on every file to help manage CSS and ensure consistency.
include 'includes/footer.php';
?>