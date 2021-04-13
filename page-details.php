<?php 
$title = "Create New Page";
include 'includes/header.php';
include 'includes/authenticate.php';
?>

<!-- This page will allow logged in users to create new pages on the site. -->
<form method="post" action="save-page.php">
    <fieldset class="form-group">
        <label for='pageName'>Title of Page (50 Characters Max):</label>
        <input class="form-control" name="pageName" id="pageName" maxlength="50" required ></input>
    </fieldset>
    <fieldset class="form-group">
        <label for='pageContent'>Page Content (1000 Characters Max):</label>
        <textarea class="form-control" name="pageContent" id="pageContent" maxlength="1000" required ></textarea>
    </fieldset>
    <button class="btn btn-primary">Save</button>
</form>
<?php
    include 'includes/footer.php';
?>