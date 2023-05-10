<?php
    require_once "../connect.php";

    $sql = "SELECT id, name FROM customer";

    $result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
    <head><title>Delete Customer Infomation</title></head>
    <body>
        <center>
            <br>
            <form action="./remove_customer.php" id="form" name="form" method="post">
                Customer name:
                <select name='customer_id' required='true'>
                    <?php
                        while ($row = mysqli_fetch_array($result)):
                    ?>
                    <option value="<?php echo $row['id'];?>"> 
                        <?php echo $row['name']; ?>
                    </option>
                <?php
                    endwhile;
                ?>
                </select>
                <input type="submit" name="submit" value="Delete" />
                <br>
                <br>
                <button><a href="../index.php">back to index</a></button>
            </form>
        </center>
    </body>
</html>