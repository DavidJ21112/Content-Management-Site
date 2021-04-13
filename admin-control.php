<?php 
$title = "Admin Controls";
include 'includes/header.php';
include 'includes/authenticate.php';
// This page acts as a central panel for all administrative controls. User must be authenticated to access.
?>

<nav>
    <ul class="list-group">
        <li class="list-group-item short">
            <a href="page-details.php">Add a New Page</a>
        </li>
        <li class="list-group-item short">
            <a href="pages.php">Manage Current Pages</a>
        </li>
        <li class="list-group-item short">
            <a href="user-list.php">Manage Users</a>
        </li>
        <li class="list-group-item short">
            <a href="image-upload.php">Upload a Logo</a>
        </li>
    </ul>

</nav>
<?php
    include 'includes/footer.php';
?>