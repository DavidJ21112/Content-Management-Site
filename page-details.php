<?php 
include 'includes/header.php';
include 'includes/authenticate.php';
?>

<!-- This page will allow logged in users to create new pages on the site. -->
<form method="post" action="save-page.php">
    <fieldset>
        <label for='pageName'>Title of Page (50 Characters Max):</label>
        <input name="pageName" id="pageName" maxlength="50" required ></input>
    </fieldset>
    <fieldset>
        <label for='pageContent'>Page Content (1000 Characters Max):</label>
        <textarea name="pageContent" id="pageContent" maxlength="1000" required ></textarea>
    </fieldset>
    <button>Save</button>
</form>
</body>
</html>