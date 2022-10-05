<?php $db = mysqli_connect("localhost", "root", "", "crud");
if (!$db) {
    die('error in db' . mysqli_error($db));
} else {
    $id = $_GET['id'];
    $qry = "SELECT * FROM user WHERE id = $id";
    $run = $db->query($qry);
    if ($run->num_rows > 0) {
        while ($row = $run->fetch_assoc()) {
            $id - $row['id'];
            $name = $row['name'];
            $email = $row['email'];
            $address = $row['address'];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT USER</title>
</head>

<body>
    <div class="edit-user-form">
        <form method="post">
            <div class="id">
                <br>
                <label>ID</label>
                <input type="text" name="id" value="<?php echo $id; ?>" disabled>
            </div>
            <div class="name">
                <br>
                <label>Name</label>
                <input type="text" name="name" value="<?php echo $name; ?>" required>
            </div>
            <br><br>
            <div>
                <label>Email</label>
                <input type="email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <br><br>
            <div>
                <label>Address</label>
                <input type="text" name="address" value="<?php echo $address; ?>" required>
            </div>
            <br><br>
            <div>
                <input type="submit" name="update" value="UPDATE">
            </div>
        </form>
    </div>
</body>

</html>
<?php
if (isset($_POST['update'])) {
    $id - $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $qry = "UPDATE user SET name ='$name', email='$email', address='$address' WHERE id = '$id'";
    if (mysqli_query($db, $qry)) {
        header('location: user.php');
    } else {
        echo mysqli_error($db);
    }
}
?>