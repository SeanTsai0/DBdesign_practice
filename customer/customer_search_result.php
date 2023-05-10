<?php
    require_once "../connect.php";

    $Customer_name = @$_POST['Customer_name'];
    
    $sql = "SELECT customer.*, sex.type as gender
              FROM customer
              LEFT JOIN sex ON sex.id = customer.sex_id
             WHERE name IS NULL OR name = '$Customer_name'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head><title><?php echo $row['name']?>'s infomation</title></head>
    <body>
        <center>
            <h3><?php echo $row['name']?></h3>
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Birth</th>
                    <th>Sex</th>
                </tr>
                <tr>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['name']?></td>
                    <td><?php echo $row['address']?></td>
                    <td><?php echo $row['birth']?></td>
                    <td><?php echo $row['gender']?></td>
                </tr>
            </table>
            <br>
            <button><a href="../index.php">back to index</a></button>
        </center>
    </body>
</html>