<?php
    require_once "../connect.php";

    $sql = "SELECT id, name FROM employee";

    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <center>
            <form action="./update_employee.php" id="form" method="post">
                Employee name:
                <select name="employee_id" id="select" required>
                    <?php
                        while ($row = mysqli_fetch_array($result)):
                    ?>
                    <option value="<?php echo $row['id']?>">
                        <?php echo $row['name']?>
                    </option>
                    <?php
                        endwhile
                    ?>
                </select>
                <input type="submit" name="submit" value="Modify" />
                <br><br>
                <button><a href="../index.php">back to index</a></button>
            </form>
        </center>
    </body>
</html>