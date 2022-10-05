<?php

// php code to search data in mysql database and set it in input text

if (isset($_POST['search'])) {
    // id to search
    $id = $_POST['id'];

    // connect to mysql
    $db = mysqli_connect("localhost", "root", "", "crud");

    // mysql search query
    $qry = "SELECT * FROM user WHERE id = '$id' LIMIT 1";

    $result = mysqli_query($db, $qry);

    // if id exist 
    // show data in inputs
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $name = $row['name'];
            $email = $row['email'];
            $address = $row['address'];
        }
    }

    // if the id not exist
    // show a message and clear inputs
    else {
        echo "Undifined ID";
        $name = "";
        $email = "";
        $address = "";
    }


    mysqli_free_result($result);
    mysqli_close($db);
}

// in the first time inputs are empty
else {
    $name = "";
    $email = "";
    $address = "";
}


?>

<!DOCTYPE html>

<html>

<head>

    <title> PHP FIND DATA </title>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>

    <br><br>
    <form action="search.php" method="post">
        <table style="width: 80%" border="1">
            <tr>
                <th>USER ID</th>
                <th>USER NAME</th>
                <th>USER EMAIL</th>
                <th>USER ADDRESS</th>
                <th>OPERATIONS</th>
            </tr>
            <tr class="table-data">
                <td>
                </td>
                <td>
                    <?php echo $name; ?>
                </td>
                <td>
                    <?php echo $email; ?>
                </td>
                <td>
                    <?php echo $address; ?>
                </td>
                <td>
                    <a href="edit.php?id=<?php echo $id; ?>">EDIT</a>
                    <a href="delete.php?id=<?php echo $id; ?>" onclick="return confirm('Are you sure?')">DELETE</a>
                </td>
            </tr>
            <input type="text" name="id">
            <input type="submit" name="search" value="Find">
        </table>
    </form>

</body>

</html>
<style>
.table-data {
    text-align: center;
    margin-left: 200px;
}
</style>