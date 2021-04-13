<?php 
$title = "Edit Page";
include 'includes/header.php';
include 'includes/authenticate.php';

if (!empty($_GET['pageId'])) {
    $pageId = $_GET['pageId'];

    try {
        include 'includes/db-connect.php';
        $sql = "SELECT * FROM pages WHERE pageId = :pageId";

        $cmd = $db->prepare($sql);
        $cmd->bindParam(':pageId', $pageId, PDO::PARAM_INT);
        $cmd->execute();

        $page = $cmd->fetch();
        $db = null;
    }
    catch (exception $e) {
        header('location:db-error.php');
        exit();
    }
}
else {
    $page = null;
    // If they arrived here without a page Id, they should porbably be making a new page instead. Redirect them to the new page page.
    header('location:page-details.php');
}
?>

<form method="post" action="update-page.php">
    <fieldset>
        <label for='pageName'>Title of Page (50 Characters Max):</label>
        <input name="pageName" id="pageName" maxlength="50" required value="<?php echo $page['pageName']; ?>"></input>
    </fieldset>
    <fieldset>
        <label for='pageContent'>Page Content (1000 Characters Max):</label>
        <!-- Why can't textarea use value="" like a normal element... argh -->
        <textarea name="pageContent" id="pageContent" maxlength="1000" required ><?php echo $page['pageContent']; ?></textarea>
    </fieldset>
    <!-- I need the pageId to be submitted to update-page.php, but don't want it to be visible on the form. This was the best bad idea I could think of. -->
    <fieldset>
        <input name="pageId" id="pageId" value="<?php echo $pageId ?>" type="hidden" readonly></input>
    </fieldset>
    <button>Save</button>
</form>
</body>
</html>