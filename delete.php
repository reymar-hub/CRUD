<?php $db = mysqli_connect("localhost", "root", "", "crud");
$qry = "DELETE FROM user WHERE id='" . $_GET["id"] . "'";
if (!$db) {
    die('error in db' . mysqli_error($db));
} else {
    $id = $_GET['id'];
    $qry = "DELETE FROM user WHERE id = $id";
    if (mysqli_query($db, $qry)) {
        header('location: user.php');
    }
}