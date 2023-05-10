<?php
    require_once "../connect.php";

    $customer_id = $_POST['customer_id'];
    $customer_name = $_POST['customer_name'];
    $customer_address = $_POST['customer_address'];
    $customer_sex = $_POST['customer_sex'];
    $customer_birth = $_POST['customer_birth'];

    $sql = "UPDATE customer
               SET name = '$customer_name',
                   address = '$customer_address',
                   sex_id = '$customer_sex',
                   birth = '$customer_birth'
             WHERE id = '$customer_id'";
    
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $isSuccess = "Modified ".$customer_name."'s Infomation";    
    } 
    else {
        $isSuccess = "Fail to Modified Customer";
    }
?>
<!DOCTYPE html>
<html>
    <head><title>Modified Result</title></head>
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
