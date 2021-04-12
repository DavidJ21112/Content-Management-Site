<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>David's Community</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="css/styles.css" />
    </head>
    <body>
        <header>
            <h1>David's Community</h1>
        </header>
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
    </body>
</html>