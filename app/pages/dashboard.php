<?php 
include "../../app/config/config.php";
include ROOT_PATH."/app/config/connect.php";
include ROOT_PATH."/assets/html/head.php";
?>
<?php 
    session_start();
    if(isset($_SESSION["userID"])) {
        echo "is logged";
    } else {
        echo "not logged";
        header('Location: ./login.php');
    }
    echo '<br>';
    echo 'UserId:'.$_SESSION["userID"];
?>


<form method="post">
    <button type="submit" name="logout">Logout</button>
</form>

<?php 
if (isset($_POST["logout"])) {
    session_destroy();
    header('Location: ./login.php');
}
?>

<h1>Hello World</h1>
<?php include ROOT_PATH."/assets/html/footer.php" ?>