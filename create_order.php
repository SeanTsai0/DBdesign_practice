<?php
    require_once "connect.php";

    $productSql = "SELECT id, name, inventory FROM product";
    $productResult = mysqli_query($conn, $productSql);

    $buyerSql = "SELECT id, name FROM customer";
    $buyerResult = mysqli_query($conn, $buyerSql);

    $sellerSql = "SELECT id, name FROM employee";
    $sellerResult = mysqli_query($conn, $sellerSql);

?>
<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <center>
            <form action="./insert_order.php" method="post">
                <table border="1">
                    <tr>
                        <th>Product</th>
                        <th>Buyer</th>
                        <th>Seller</th>
                        <th>Amount</th>
                        <th>Transaction Date</th>
                    </tr>
                    <tr>
                        <td>
                            <form action="./create_order.php" method="post" name="product_form">
                            <select name="order_product" id="order_product" required >
                                <option value="" disabled selected>---select---</option>
                                <?php while ($p_row = mysqli_fetch_array($productResult)): ?>
                                <option value="<?php echo $p_row['id']?>"><?php echo $p_row['name']?></option>
                                <?php endwhile?>
                            </select>
                            </form>
                        </td>
                        <td>
                            <select name="order_buyer" id="order_buyer" required>
                                <?php while ($b_row = mysqli_fetch_array($buyerResult)): ?>
                                <option value="<?php echo $b_row['id']?>"><?php echo $b_row['name']?></option>
                                <?php endwhile?>
                            </select>
                        </td>
                        <td>
                            <select name="order_seller" id="order_seller" required>
                                <?php while ($s_row = mysqli_fetch_array($sellerResult)): ?>
                                <option value="<?php echo $s_row['id']?>"><?php echo $s_row['name']?></option>
                                <?php endwhile?>
                            </select>
                        </td>
                        <td>
                            <input type="number" name="order_amount" id="ordre_amount" min="1" required>
                        </td>
                        <td>
                            <input type="date" name="order_date" id="order_date" required>
                        </td>
                        <br>
                    </tr>
                </table>
                <br>
                <input type="submit" name="submit" value="Create">
            </form>
            </center>
    </body>
</html>