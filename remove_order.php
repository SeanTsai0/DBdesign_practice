<?php
    require_once "./connect.php";

    echo $order_id = $_POST['order_id'];

    mysqli_begin_transaction($conn, MYSQLI_TRANS_START_READ_WRITE);

    $update_query = "UPDATE product 
                         SET inventory = (inventory + (SELECT amount FROM sales_order WHERE id = '$order_id'))
                       WHERE id = (SELECT product_id FROM sales_order WHERE id = '$order_id')";
    $update_result = mysqli_query($conn, $update_query);
    
    $delete_query = "DELETE FROM sales_order WHERE id = '$order_id'";
    $delete_result = mysqli_query($conn, $delete_query);

    $isCommit = mysqli_commit($conn);

    if ($isCommit) {
        $isSuccess = "Delete Order!";
    }
    else {
        $isSuccess = "Fail to Delete Order...";
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
                <button><a href="./index.php">back to index</a></button>
            </div>
        </center>
    </body>
</html>