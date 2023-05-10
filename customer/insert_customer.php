<?php
    require_once "../connect.php";

    $customer_name = $_POST['customer_name'];
    $customer_address = $_POST['customer_address'];
    $customer_sex = $_POST['customer_sex'];
    $customer_birth = $_POST['customer_birth'];

    $sql = "INSERT INTO customer (name, address, sex_id, birth)
            SELECT '$customer_name', '$customer_address', id, '$customer_birth'
              FROM sex 
             WHERE id = '$customer_sex'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $isSuccess = "Add Customer ".$customer_name."!";
    } 
    else {
        $isSuccess = "Fail to Add Customer";
    }
?>
<!DOCTYPE html>
<html>
    <head><title>Create Result</title></head>
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