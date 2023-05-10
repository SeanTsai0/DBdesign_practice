<?php
    require_once "../connect.php";

    $employee_name = $_POST['employee_name'];
    $employee_dept = $_POST['employee_dept'];
    $employee_salary = $_POST['employee_salary'];
    $employee_sex = $_POST['employee_sex'];
    $employee_birth = $_POST['employee_birth'];
    $employee_position = $_POST['employee_position'];

    $sql = "INSERT INTO employee(name, dept_id, salary, birth, sex_id, position_id)
            VALUES('$employee_name', '$employee_dept', '$employee_salary', '$employee_birth', '$employee_sex', '$employee_position')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $isSuccess = "Success Add ".$employee_name;
    } 
    else {
        $isSuccess = "Fail to Add Employee";
    }
?>
<!DOCTYPE html>
<html>
    <head><title>Create Result</title></head>
    <body>
        <center>
            <br>
            <b><?php echo $isSuccess ?></b>
            <div>
                <br>
                <button><a href="../index.php">back to index</a></button>
            </div>
        </center>
    </body>
</html>

    

