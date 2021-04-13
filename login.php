<?php 
$title = "Login";
include 'includes/header.php';
?>
        <form method="post" action="validate-login.php">
            <fieldset>
                <label for="email">Email Address: </label>
                <input type="email" name="email" id="email" maxlength="50" required></input>
            </fieldset>
            <fieldset>
                <label for="password">Password: </label>
                <input type="password" name="password" id="password" maxlength="255" required></input>
            </fieldset>
            <button>Sign In To Our Awesome Community</button>
        </form>
<?php
include 'includes/footer.php';
?>