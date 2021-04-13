<?php
// When the user logs out, their session will be terminated and they will be redirected to index.php.
session_start();
session_unset();
session_destroy();

header('location:index.php');
?>