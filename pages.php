<?php 
$title = "Pages";
include 'includes/header.php';
include 'includes/authenticate.php';

// This page will allow authenticated users to view a list of all pages on the site, with the option to edit and delete them.
try {
    include 'includes/db-connect.php';

    // Collect the page Ids and names from the database.
    $sql = "SELECT pageId, pageName FROM pages";

    $cmd = $db->prepare($sql);
    $cmd->execute();

    $pages = $cmd->fetchAll();

    // Display the data in a table.
    echo '<table class="table table-striped table-hover"><thead class="table-dark"><th>Id</th><th>Page Name</th><th></th><th></th></thead>';

    foreach ($pages as $p) {
        echo '<tr><td>' . $p['pageId'] . '</td><td>' . $p['pageName'] . '</td>
            <td><a class="btn btn-warning" href="page-edit.php?pageId=' . $p['pageId'] . '">Edit</a></td>
            <td><a class="btn btn-danger" href="delete-page.php?pageId=' . $p['pageId'] . '" onclick="return confirmDelete();">Delete</a></td></tr>';
    }

    echo '</table>';

    $db = null;
}
catch (exception $e) {
    header('location:db-error.php');
    exit();
}

    include 'includes/footer.php';
?>