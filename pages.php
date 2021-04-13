<?php 
$title = "Pages";
include 'includes/header.php';
include 'includes/authenticate.php';

// This page will allow logged in users to view a list of all pages on the site, with the option to delete them.
try {
    include 'includes/db-connect.php';

    // Collect the page Ids and names from the database.
    $sql = "SELECT pageId, pageName FROM pages";

    $cmd = $db->prepare($sql);
    $cmd->execute();

    $pages = $cmd->fetchAll();

    // Display the data in a table.
    echo '<table><thead><th>Id</th><th>Page Name</th></thead>';

    foreach ($pages as $p) {
        echo '<tr><td>' . $p['pageId'] . '</td><td>' . $p['pageName'] . '</td>
            <td><a href="page-edit.php?pageId=' . $p['pageId'] . '">Edit</a></td>
            <td><a href="delete-page.php?pageId=' . $p['pageId'] . '">Delete</a></td></tr>';
    }

    echo '</table>';

    $db = null;
}
catch (exception $e) {
    header('location:db-error.php');
    exit();
}
?>