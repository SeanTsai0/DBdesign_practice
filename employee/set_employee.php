<?php
    require_once "../connect.php";

    $employee_id = $_POST['employee_id'];
    $employee_name = $_POST['employee_name'];
    $employee_dept = $_POST['employee_dept'];
    $employee_salary = $_POST['employee_salary'];
    $employee_birth = $_POST['employee_birth'];
    $employee_sex = $_POST['employee_sex'];
    $employee_pos = $_POST['employee_pos'];

    $sql = "UPDATE employee
               SET name = '$employee_name',
                   dept_id = '$employee_dept',
                   salary = '$employee_salary',
                   birth = '$employee_birth',
                   sex_id = '$employee_sex',
                   position_id = '$employee_pos'
             WHERE id = '$employee_id'";
    
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $isSuccess = "Modified Successful!";    
    } 
    else {
        $isSuccess = "Fail to Modified Customer";
    }
?>
<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <center>
            <b><?php echo $isSuccess ?></b>
            <div>
                <button><a href="../index.php">back to index</a></button>
            </div>
        </center>
    </body>
</html>
