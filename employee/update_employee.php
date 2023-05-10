<?php
    require_once "../connect.php";

    $employee_id = $_POST['employee_id'];

    $sql = "SELECT employee.*, department.name AS dept, sex.type AS gender, position.name AS pos
              FROM (
                (
                    employee INNER JOIN department ON employee.dept_id = department.id
                )INNER JOIN sex ON employee.sex_id = sex.id
              )INNER JOIN position ON employee.position_id = position.id
             WHERE employee.id = '$employee_id'";

    $result = mysqli_query($conn, $sql);
    $init = mysqli_fetch_assoc($result);

    $gender = $init['gender'];
    $dept = $init['dept'];
    $pos = $init['pos'];

    $sexSql = "SELECT * FROM sex WHERE type != '$gender'";
    $sexResult = mysqli_query($conn, $sexSql);

    $deptSql = "SELECT * FROM department WHERE name != '$dept'";
    $deptResult = mysqli_query($conn, $deptSql);

    $posSql = "SELECT * FROM position WHERE name != '$pos'";
    $posResult = mysqli_query($conn, $posSql);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Edit Employee Info</title>
    </head>
    <body>
        <center>
            <br>
            <form action="./set_employee.php" method="post">
                <div>
                    <div>
                        <b>Name : </b>
                        <input type="text" name="employee_name" value="<?php echo $init['name']?>" required>
                    </div>
                    <br>
                    <div>
                        <b>Department : </b>
                        <select name="employee_dept" id="employee_dept">
                        <option value="<?php echo $init['dept_id']?>"  selected="selected"><?php echo $init['dept']?></option>
                        <?php
                            while ($row = mysqli_fetch_array($deptResult)):
                        ?>
                        <option value="<?php echo $row['id']?>">
                            <?php echo $row['name']?>
                        </option>
                        <?php
                            endwhile;
                        ?>
                        </select>
                    </div>
                    <br>
                    <div>
                        <b>Salary : </b>
                        <input type="text" name="employee_salary" value="<?php echo $init['salary']?>" required>
                    </div>
                    <br>
                    <div>
                        <b>Birth : </b>
                        <input type="date" name='employee_birth' value="<?php echo $init['birth']?>" required>
                    </div>
                    <br>
                    <div>
                        <b>Sex : </b>
                        <select name="employee_sex" id="employee_sex">
                        <option value="<?php echo $init['sex_id']?>"  selected="selected"><?php echo $init['gender']?></option>
                        <?php
                            while ($row = mysqli_fetch_array($sexResult)):
                        ?>
                        <option value="<?php echo $row['id']?>">
                            <?php echo $row['type']?>
                        </option>
                        <?php
                            endwhile;
                        ?>
                        </select>
                    </div>
                    <br>
                    <div>
                        <b>Position : </b>
                        <select name="employee_pos" id="employee_pos">
                        <option value="<?php echo $init['position_id']?>"  selected="selected"><?php echo $init['pos']?></option>
                        <?php
                            while ($row = mysqli_fetch_array($posResult)):
                        ?>
                        <option value="<?php echo $row['id']?>">
                            <?php echo $row['name']?>
                        </option>
                        <?php
                            endwhile;
                        ?>
                        </select>
                    </div>
                    <br>
                    <input type="text" name="employee_id" value="<?php echo $init['id']?>" hidden>
                    <div>
                        <input type="submit" name="submit" value="Conferm">
                    </div>
                </div>
            </form>
        </center> 
    </body>
</html>