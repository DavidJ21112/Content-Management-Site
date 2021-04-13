<?php
$title = "Connection Error";
include 'header.php';
// This page acts as a unique error message for database connection issues, preventing sensitive server data from being exposed in default messages.
?>
<main>
    <h1>Oh No!</h1>
    <p>We've encountered a connection error. Please try again later. </p>
</main>

<?php
    include 'includes/footer.php';
?>