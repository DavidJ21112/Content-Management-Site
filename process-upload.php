<?php
$title = "Upload Confirmation";
include 'includes/header.php';
include 'includes/authenticate.php';
// This page will process file upload requests.

// The file's information will be displayed to the user.
if ($_FILES['logo']['name'] != null) {
    $name = $_FILES['logo']['name'];
    echo "Name: $name<br />";

    $size = $_FILES['logo']['size'];
    echo "Size: $size bytes<br />";

    $tmp_name = $_FILES['logo']['tmp_name'];
    echo "Tmp Name: $tmp_name<br />";

    $type = mime_content_type($tmp_name);
    echo "Type: $type<br />";

    // After an extra validation check to make sure the correct file type has been uploaded, the new file will be saved to the images folder. To avoid a mess of hundreds of saved image files, the image will be renamed "icon.jpg" and will replace the previous icon.jpg file.
    if ($_FILES['logo']['type'] == 'image/jpeg' || $_FILES['logo']['type'] == 'image/png') {
        move_uploaded_file($tmp_name, "images/icon.jpg");
        echo "Upload Successful!";
    }
    else {
        echo "Invalid file type, please upload a jpg, jpeg, or png.";
    }
}
else {
    echo 'No file uploaded';
}

    include 'includes/footer.php';
?>