<?php
$title = "Image Upload";
include 'includes/header.php';
include 'includes/authenticate.php';
// This page will allow an authenticated user to upload a new image file from their computer, which will act as the new site icon.
?>
    <form method="post" action="process-upload.php" enctype="multipart/form-data">
        <input name="logo" id="logo" type="file" accept=".jpg, .jpeg, .png" />
        <button>Upload</button>
    </form>
<?php
include 'includes/footer.php';
?>