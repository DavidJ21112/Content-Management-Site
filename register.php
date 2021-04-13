<?php
$title = "Register New User";
include 'includes/header.php';
// This page will allow a new user to register their email address and password to the database, with some basic validation. The form data will be posted to a save file.
?>
        <form method="post" action="save-user.php">
            <fieldset class="form-group">
                <label for="email">Email Address: </label>
                <input class="form-control short" type="email" name="email" id="email" maxlength="50" required></input>
            </fieldset>
            <fieldset class="form-group">
                <label for="password">Password: </label>
                <input class="form-control short" type="password" name="password" id="password" maxlength="255" required></input>
            </fieldset>
            <fieldset class="form-group">
                <label for="conPass">Confirm Password: </label>
                <input class="form-control short" type="password" name="conPass" id="conPass" maxlength="255" required></input>
            </fieldset>
            <button class="btn btn-primary m-2">Register!</button>
        </form>
<?php
    include 'includes/footer.php';
?>