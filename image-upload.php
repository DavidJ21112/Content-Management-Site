<?php
$title = "Image Upload";
include 'includes/header.php';
include 'includes/authenticate.php';
// This page will allow an authenticated user to upload a new image file from their computer, which will act as the new site icon.
?>
    <form class="form-group" method="post" action="process-upload.php" enctype="multipart/form-data">
        <input class="form-control" name="logo" id="logo" type="file" accept=".jpg, .jpeg, .png" />
        <button class="btn btn-primary m-2">Upload</button>
        <!-- NOTE: A hard refresh (ctrl + shift + R) may be necessary to see the new image. -->
    </form>
<?php
include 'includes/footer.php';
?>