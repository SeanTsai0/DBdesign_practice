<?php
    require_once "./connect.php";

    $order_product = $_POST['order_product'];
    $order_buyer = $_POST['order_buyer'];
    $order_seller = $_POST['order_seller'];
    $order_amount = $_POST['order_amount'];
    $order_date = $_POST['order_date'];

    mysqli_begin_transaction($conn, MYSQLI_TRANS_START_READ_WRITE);

    $sql ="INSERT INTO sales_order (product_id, buyer_id, salesperson_id, amount, sales_date)
                VALUES ('$order_product', '$order_buyer', '$order_seller', '$order_amount', '$order_date')";
    $result = mysqli_query($conn, $sql);

    $update_inventory_sql = "UPDATE product SET inventory = (inventory-'$order_amount') WHERE id = $order_product";
    $updateResult = mysqli_query($conn, $update_inventory_sql);

    $isCommit = mysqli_commit($conn);

    if ($isCommit) {
        $isSuccess = "Success Create Order";
    }
    else {
        $isSuccess = "Fail to Create Order";
    }
?>
<!DOCTYPE html>
<html>
    <head></head>
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