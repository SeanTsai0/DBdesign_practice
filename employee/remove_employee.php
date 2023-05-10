<?php
    require_once "../connect.php";

    $employee_id = $_POST['employee_id'];

    $sql = "DELETE FROM employee WHERE id = '$employee_id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $isSuccess = "Delete Employee!";
    }
    else {
        $isSuccess = "Fail to Delete Employee...";
    }
?>
<!DOCTYPE html>
<html>
    <head><title>Delete Result</title></head>
    <body>
        <center>
            <br>
            <b><?php echo $isSuccess ?></b>
            <div>
                <br>
                <button><a href="../index.php">back to index</a></button>
            </div>
        </center>
    </body>
</html>