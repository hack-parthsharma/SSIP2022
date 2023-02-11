<?php
include('../allfiledata.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="add_dep.css">
    <title>Document</title>
</head>

<body>
    <section id="add-dep-hero">
        <div class="col1">
            <h1>Departments Management</h1>
        </div>
        <div class="col2">
            <div class="col2-col1">
                <form method="post">
                    <input type="text" placeholder="ex.. D005" name="id">
                    <input type="text" placeholder="ex.. finance" name="name">
                    <input type="submit" name="submit" value="submit" id="idbtn">
                </form>
            </div>
            <div class="col2-col2">
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>ID</th>
                            <th>Department Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (is_array($fetchDataDepartment)) {
                            $sn = 1;
                            foreach ($fetchDataDepartment as $data) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $sn; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['id'] ?? ''; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['name'] ?? ''; ?>
                                    </td>
                                </tr>
                                <?php
                                $sn++;
                            }
                        } else { ?>
                            <tr>
                                <td colspan="8">
                                    <?php echo $fetchDataDepartment; ?>
                                </td>
                            <tr>
                                <?php
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</body>

</html>
<?php
function b(){
@$s = $_POST['submit'];
if ($s) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ssip";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }


    @$id = $_POST['id'];
    @$name = $_POST['name'];

    $sql = "INSERT INTO departments VALUES ('$id', '$name')";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Data Inserted Succesfully")</script>';
    }

    mysqli_close($conn);
}

@$del = $_POST['del-submit'];
if ($del) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ssip";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }


    @$id = $_POST['id'];
    // print_r($id);
    $sql = "DELETE FROM departments WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Data Deleted Succesfully")</script>';
    }else{
        echo '<script>alert("Data Deleted not successfully!!")</script>';
    }

    mysqli_close($conn);
}
}
?>