<?php 
$title = "Admin Controls";
include 'includes/header.php';
include 'includes/authenticate.php';
?>

<nav>
    <ul class="list-group">
        <li class="list-group-item">
            <a href="page-details.php">Add a New Page</a>
        </li>
        <li class="list-group-item">
            <a href="pages.php">Manage Current Pages</a>
        </li>
        <li class="list-group-item">
            <a href="user-list.php">Manage Users</a>
        </li>
        <li class="list-group-item">
            <a href="image-upload.php">Upload a Logo</a>
        </li>
    </ul>

</nav>
<?php
    include 'includes/footer.php';
?>