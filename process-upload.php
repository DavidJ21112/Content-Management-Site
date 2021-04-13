<?php
include 'includes/header.php';

if ($_FILES['logo']['name'] != null) {
    $name = $_FILES['logo']['name'];
    echo "Name: $name<br />";

    $size = $_FILES['logo']['size'];
    echo "Size: $size bytes<br />";

    $tmp_name = $_FILES['logo']['tmp_name'];
    echo "Tmp Name: $tmp_name<br />";

    $type = mime_content_type($tmp_name);
    echo "Type: $type<br />";

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

?>

</body>
</html>