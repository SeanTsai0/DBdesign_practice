<?php
    require_once "../connect.php";

    $sql = "SELECT id, type FROM sex ";
    $result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
    <head><title>add new customer</title></head>
    <body>
        <center>
            <form action="./insert_customer.php" method="post">
                <br>
                <div>
                    <div>
                        <b>Name:</b>
                        <input type="text" name="customer_name" placeholder="Enter Customer Name" required>
                    </div>
                    <br>
                    <div>
                        <b>Address : </b>
                        <br>
                        <textarea name="customer_address" id="customer_address" cols="30" rows="10" placeholder="Enter Customer Address" required></textarea>
                    </div>
                    <br>
                    <div>
                        <b>Sex : </b>
                        <select name="customer_sex" id="customer_sex">
                        <?php
                            while ($row = mysqli_fetch_array($result)):
                        ?>
                        <option value="<?php echo $row['id']?>">
                            <?php echo $row['type']?>
                        </option>
                        <?php
                            endwhile;
                        ?>
                        </select>
                    </div>
                    <br>
                    <div>
                        <b>Birth : </b>
                        <input type="date" name='customer_birth' required>
                    </div>
                    <br>
                    <div>
                        <input type="submit" name="submit" value="Create Customer Info">
                    </div>
                </div>
            </form>
        </center>  
    </body>
</html>