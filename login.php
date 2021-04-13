<?php 
$title = "Login";
include 'includes/header.php';
// This page contains a form for an existing user to enter their email and password. It will send this info to a validation page.
?>
        <form method="post" action="validate-login.php">
            <fieldset class="form-group">
                <label for="email">Email Address: </label>
                <input class="form-control short" type="email" name="email" id="email" maxlength="50" required></input>
            </fieldset>
            <fieldset class="form-group">
                <label for="password">Password: </label>
                <input class="form-control short" type="password" name="password" id="password" maxlength="255" required></input>
            </fieldset>
            <button class="btn btn-primary mt-2">Sign In To Our Awesome Community</button>
        </form>
<?php
include 'includes/footer.php';
?>