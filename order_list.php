<?php
    require_once "./connect.php";

    if (!empty($_POST['sales_date'])) {
        $date = $_POST['sales_date'];
        $result = mysqli_query($conn, 
        "SELECT sales_order.id, product.name, customer.name, employee.name, amount, sales_date, amount*product.price AS total_price
           FROM (
            (sales_order INNER JOIN product ON sales_order.product_id = product.id)
            INNER JOIN customer ON customer.id = sales_order.buyer_id
            ) 
        INNER JOIN employee ON employee.id = sales_order.salesperson_id
        WHERE sales_date = '$date'"); 
       }
    else {
        $result = mysqli_query($conn,
         "SELECT sales_order.id, product.name, customer.name, employee.name, amount, sales_date, amount*product.price AS total_price
            FROM (
            (sales_order INNER JOIN product ON sales_order.product_id = product.id)
           INNER JOIN customer ON customer.id = sales_order.buyer_id) 
       INNER JOIN employee ON employee.id = sales_order.salesperson_id");
    }

    $date_list = mysqli_query($conn, "SELECT sales_date FROM sales_order GROUP BY sales_date");
?>

<!DOCTYPE html>
<html>
    <html>
        <head>
            <title>Order List</title>  
        </head>
        <body>
            <center>
                <br>
                <form action="./order_list.php" id="form" name="form" method="post">
                    Search Order by Sale Date:
                    <select name='sales_date'>
                        <option value="">------All------</option>
                        <?php
                            while ($row = mysqli_fetch_array($date_list)):
                        ?>
                        <option value="<?php echo $row['sales_date'];?>"> 
                            <?php echo $row['sales_date']; ?>
                        </option>
                    <?php
                        endwhile;
                    ?>
                    </select>
                    <input type="submit" name="submit" value="Search" />
                </form>
                <p></p>
                <table width="700" border="1">
                    <tr>
                        <th>Order Number</th>
                        <th>Product</th>
                        <th>Buyer</th>
                        <th>Sales rep.</th>
                        <th>Amount</th>
                        <th>Sale Date</th>
                        <th>Total Price</th>
                    </tr>
                    <?php
                        while ($row = mysqli_fetch_row($result)):
                    ?>
                    <tr>
                        <td><?php echo $row[0]?></td>
                        <td><?php echo $row[1]?></td>
                        <td><?php echo $row[2]?></td>
                        <td><?php echo $row[3]?></td>
                        <td><?php echo $row[4]?></td>
                        <td><?php echo $row[5]?></td>
                        <td><?php echo $row[6]?></td>
                    </tr>
                    <?php
                        endwhile
                    ?>
                </table>
                <br>
                <button><a href="./index.php">back to index</a></button>
            </center>
        </body>
    </html>
</html>