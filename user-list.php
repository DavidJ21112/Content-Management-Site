<?php 
include 'includes/header.php';
include 'includes/authenticate.php';

// This page will display all users registered in the database to logged in users.

include 'includes/db-connect.php';

// Collect the userIds and emails from the database.
$sql = "SELECT userId, email FROM CMSusers";

$cmd = $db->prepare($sql);
$cmd->execute();

$users = $cmd->fetchAll();

// Display the data in a table.
echo '<table><thead><th>Id</th><th>Email Address</th></thead>';

foreach ($users as $u) {
    echo '<tr><td>' . $u['userId'] . '</td><td>' . $u['email'] . '</td>
    <td><a href="user-edit.php?userId=' . $u['userId'] . '">Edit</a></td>
    <td><a href="delete-user.php?userId=' . $u['userId'] . '">Delete</a></td></tr>';

}

echo '</table>';

$db = null
?>