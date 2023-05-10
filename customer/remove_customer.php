<?php
    require_once "../connect.php";

    $customer_id = $_POST['customer_id'];

    $sql = "DELETE FROM customer WHERE id = '$customer_id'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $isSuccess = "Delete Customer!";
    }
    else {
        $isSuccess = "Fail to Delete Customer...";
    }
?>

<!DOCTYPE html>
<html>
    <head><title>Remove Customer</title></head>
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