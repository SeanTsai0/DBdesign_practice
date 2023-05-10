<?php
    require_once "../connect.php";

    $sql = "SELECT id, name FROM employee";

    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
    <html>
        <head>
            <title>Employee Infomation</title>
        </head>
        <body>
            <center>
                <br>
                <form action="./employee_search_result.php" id="form" name="form" method="post">
                    Employee name:
                    <select name='employee_name' required='true'>
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
                </form>
            </center>
        </body>
    </html>
</html>