<?php
    require_once "../connect.php";

    $deptSql = "SELECT id, name FROM department";
    $deptResult = mysqli_query($conn, $deptSql);

    $sexSql = "SELECT id, type FROM sex";
    $sexResult = mysqli_query($conn, $sexSql);

    $positionSql = "SELECT id, name FROM position";
    $positionResult = mysqli_query($conn, $positionSql);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>add new employee</title>
    </head>
    <body>
        <center>
            <br>
            <form action="./insert_employee.php" method="post">
                <div>
                    <div>
                        <b>Name : </b>
                        <input type="text" name="employee_name" placeholder="Enter Employee Name" required>
                    </div>
                    <br>
                    <div>
                    <b>Department : </b>
                        <select name="employee_dept" id="employee_dept">
                            <?php while ($dept = mysqli_fetch_array($deptResult)): ?>
                            <option value="<?php echo $dept['id']?>"><?php echo $dept['name'] ?></option>
                            <?php endwhile ?>
                        </select>
                    </div>
                    <br>
                    <div>
                        <b>Salary : </b>
                        <input type="text" name="employee_salary" placeholder="Enter Employee Salary" required>
                    </div>
                    <br>
                    <div>
                        <b>Sex : </b>
                        <select name="employee_sex" id="employee_sex">
                            <?php while ($sex = mysqli_fetch_array($sexResult)): ?>
                            <option value="<?php echo $sex['id']?>"><?php echo $sex['type'] ?></option>
                            <?php endwhile ?>
                        </select>
                    </div>
                    <br>
                    <div>
                        <b>Birth : </b>
                        <input type="date" name='employee_birth' required>
                    </div>
                    <br>
                    <div>
                        <b>Position : </b>
                        <select name="employee_position" id="employee_position">
                            <?php while ($position = mysqli_fetch_array($positionResult)): ?>
                            <option value="<?php echo $position['id']?>"><?php echo $position['name'] ?></option>
                            <?php endwhile ?>
                        </select>
                    </div>
                    <br>
                    <div>
                        <input type="submit" name="submit" value="add">
                    </div>
                </div>
            </form>
        </center>
    </body>
</html>