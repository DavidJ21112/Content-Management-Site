<?php
$title = "Image Upload";
include 'includes/header.php';
include 'includes/authenticate.php';
?>
    <form method="post" action="process-upload.php" enctype="multipart/form-data">
        <input name="logo" id="logo" type="file" accept=".jpg, .jpeg, .png" />
        <button>Upload</button>
    </form>
<?php
include 'includes/footer.php';
?>