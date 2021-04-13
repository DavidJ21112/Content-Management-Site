<?php 
$title = "Users";
include 'includes/header.php';
include 'includes/authenticate.php';

// This page will display all users registered in the database, if the current user is authenticated. Users can be edited and deleted.

include 'includes/db-connect.php';

// Collect the userIds and emails from the database.
$sql = "SELECT userId, email FROM CMSusers";

$cmd = $db->prepare($sql);
$cmd->execute();

$users = $cmd->fetchAll();

// Display the data in a table.
echo '<table class="table table-striped table-hover"><thead class="table-dark"><th>Id</th><th>Email Address</th><th></th><th></th></thead>';

foreach ($users as $u) {
    echo '<tr><td>' . $u['userId'] . '</td><td>' . $u['email'] . '</td>
    <td><a href="user-edit.php?userId=' . $u['userId'] . '" class="btn btn-warning">Edit</a></td>
    <td><a href="delete-user.php?userId=' . $u['userId'] . '" onclick="return confirmDelete();" class="btn btn-danger">Delete</a></td></tr>';

}

echo '</table>';

$db = null;

include 'includes/footer.php';
?>