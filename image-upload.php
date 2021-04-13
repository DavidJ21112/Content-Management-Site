<?php
include 'includes/header.php';
?>
    <form method="post" action="process-upload.php" enctype="multipart/form-data">
        <input name="logo" id="logo" type="file" accept=".jpg, .jpeg, .png" />
        <button>Upload</button>
    </form>
</body>
</html>