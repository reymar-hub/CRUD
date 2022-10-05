<?php $db = mysqli_connect("localhost", "root", "", "crud"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PROJECT</title>
</head>

<body>
    <div class="container">
        <form class="form-inline" method="post" action="search.php">
            <input type="text" name="id" class="form-control" placeholder="Search ID..">
            <button type="submit" name="save" class="btn btn-primary">Search</button>
        </form>
    </div>
    <div class="add-user-form">
        <form method="post">
            <div class="name">
                <br>
                <label>Name</label>
                <input type="text" name="name" placeholder="Enter Name:" required>
            </div>
            <br><br>
            <div>
                <label>Email</label>
                <input type="email" name="email" placeholder="Enter Email:" required>
            </div>
            <br><br>
            <div>
                <label>Address</label>
                <input type="text" name="address" placeholder="Enter Address:" required>
            </div>
            <br><br>
            <div>
                <input type="submit" name="submit" value="SUBMIT">
            </div>
        </form>
    </div>
    <div class="table-form">
        <center>
            <h3>USER INFORMATIONS</h3>
        </center>
        <table style="width: 80%" border="1">
            <tr>
                <th>USER ID</th>
                <th>USER NAME</th>
                <th>USER EMAIL</th>
                <th>USER ADDRESS</th>
                <th>OPERATIONS</th>
            </tr>
            <?php
            $i = 1;
            $qry = "select * from user";
            $run = $db->query($qry);
            if ($run->num_rows > 0) {
                while ($row = $run->fetch_assoc()) {
                    $id = $row['id'];
            ?>
            <tr>
                <td><?php echo $i++; ?> </td>
                <td><?php echo $row['name'] ?> </td>
                <td><?php echo $row['email'] ?> </td>
                <td><?php echo $row['address'] ?> </td>
                <td>
                    <a href="edit.php?id=<?php echo $id; ?>">EDIT</a>
                    <a href="delete.php?id=<?php echo $id; ?>" onclick="return confirm('Are you sure?')">DELETE</a>
                </td>
            </tr>
            <?php
                }
            }
            ?>
        </table>
    </div>
</body>

</html>
<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $qry = "insert into user values(null,'$name','$email','$address')";
    if (mysqli_query($db, $qry)) {
        echo '<script>alert("user added successfully"); </script>';
        header('location: user.php');
    } else {
        echo mysqli_error($db);
    }
}
?>

<style>
.add-user-form {
    border: black solid 2px;
    margin-left: 830px;
    margin-top: 100px;
    width: 250px;
    height: 250px;
    text-align: center;
}

.table-form {
    margin-left: 300px;
    text-align: center;
}
</style>