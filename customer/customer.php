<?php
    require_once "../connect.php";

    $sql = "SELECT id, name FROM customer";

    $result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
    <html>
        <head><title>Customer Infomation</title></head>
        <body>
            <center>
                <br>
                <form action="./customer_search_result.php" id="form" name="form" method="post">
                    Customer name:
                    <select name='Customer_name' required='true'>
                        <?php
                            while ($row = mysqli_fetch_array($result)):
                        ?>
                        <option value="<?php echo $row['name'];?>"> 
                            <?php echo $row['name']; ?>
                        </option>
                    <?php
                        endwhile;
                    ?>
                    </select>
                    <input type="submit" name="submit" value="Search" />
                    <br>
                    <br>
                    <button><a href="../index.php">back to index</a></button>
                </form>
            </center>
        </body>
    </html>
</html>