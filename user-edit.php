<?php 
$title = "Update User";
include 'includes/header.php';
include 'includes/authenticate.php';
// This page will allow authenticated users to edit the information of other users.

if (!empty($_GET['userId'])) {
    $userId = $_GET['userId'];

    try {
        include 'includes/db-connect.php';
        $sql = "SELECT * FROM CMSusers WHERE userId = :userId";

        $cmd = $db->prepare($sql);
        $cmd->bindParam(':userId', $userId, PDO::PARAM_INT);
        $cmd->execute();

        $user = $cmd->fetch();
        $db = null;
    }
    catch (exception $e) {
        header('location:db-error.php');
        exit();
    }
}
else {
    $user = null;
    // If they arrived here without a userId, they probably want to register as a new user instead.
    header('location:register.php');
}
?>

<form method="post" action="update-user.php" enctype="multipart/form-data">
<fieldset class="form-group">
    <label for="email">Email Address: </label>
    <input class="form-control short" type="email" name="email" id="email" maxlength="50" required value="<?php $user['email']?>"></input>
</fieldset>
<fieldset class="form-group">
    <label for="password">Password: </label>
    <input class="form-control short" type="password" name="password" id="password" maxlength="255" required></input>
</fieldset>
<fieldset class="form-group">
    <label for="conPass">Confirm Password: </label>
    <input class="form-control short" type="password" name="conPass" id="conPass" maxlength="255" required></input>
</fieldset>
    <!-- Just like with the pageId, best bad idea I could think of. -->
<fieldset>
    <input name="userId" id="userId" value="<?php echo $userId ?>" type="hidden" readonly></input>
</fieldset>
<button class="btn btn-success m-2">Save</button>
</form>
<?php
    include 'includes/footer.php';
?>