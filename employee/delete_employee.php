<?php
    require_once "../connect.php";

    $sql = "SELECT id, name FROM employee";

    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
    <head><title>Delete Employee</title></head>
    <body>
        <center>
            <br>
            <form action="./remove_employee.php" id="form" name="form" method="post">
                Employee name:
                <select name='employee_id' required='true'>
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
                <br/>
                <br>
                <button><a href="../index.php">back to index</a></button>
            </form>
        </center>
    </body>
</html>