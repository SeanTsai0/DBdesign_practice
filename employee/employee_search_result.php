<?php
    require_once "../connect.php";

    $Employee_name = @$_POST['employee_name'];
    
    $sql = "SELECT employee.*, position.name as position, sex.type as gender, department.name as dept
              FROM (
                (
                    employee INNER JOIN position ON employee.position_id = position.id)
                        INNER JOIN sex ON sex.id = employee.sex_id)
                INNER JOIN department ON department.id = employee.dept_id
             WHERE employee.name IS NULL OR employee.name = '$Employee_name'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $row['name']?>'s infomation</title>
    </head>
    <body>
        <center>
            <br>
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Sex</th>
                    <th>Birth</th>
                    <th>Department</th>
                    <th>Position</th>
                    <th>Salary</th>
                </tr>
                <tr>
                    <td><?php print_r($row['id'])?></td>
                    <td><?php print_r($row['name'])?></td>
                    <td><?php print_r($row['gender'])?></td>
                    <td><?php print_r($row['birth'])?></td>
                    <td><?php print_r($row['dept'])?></td>
                    <td><?php print_r($row['position'])?></td>
                    <td><?php print_r($row['salary'])?></td>
                </tr>
            </table>
            <br>
            <button><a href="../index.php">back to index</a></button>
        </center>
    </body>
</html>