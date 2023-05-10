<?php
    require_once "./connect.php";

    $sql = "SELECT * FROM sales_order";
    $result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <center>
            <form action="./remove_order.php" method="post">
            Delete Order : 
            <select name="order_id" id="order_id">
                <?php while ($row = mysqli_fetch_array($result)): ?>
                <option value="<?php echo $row['id'] ?>"><?php echo $row['id'] ?></option>
                <?php endwhile; ?>
            </select>
            <br>
            <br>
            <input type="submit" name="submit" value="DELETE">
        </form>
        </center> 
    </body>
</html>