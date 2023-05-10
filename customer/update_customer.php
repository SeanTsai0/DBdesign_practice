<?php
    require_once "../connect.php";

    $customer_id = $_POST['customer_id'];

    $sql = "SELECT customer.* ,sex.type AS gender
              FROM customer INNER JOIN sex ON sex.id = customer.sex_id
             WHERE customer.id = '$customer_id'";

    $result = mysqli_query($conn, $sql);
    $init = mysqli_fetch_assoc($result);
    $gender = $init['gender'];

    $sexSql = "SELECT * FROM sex WHERE type != '$gender'";
    $sexResult = mysqli_query($conn, $sexSql);

?>
<!DOCTYPE html>
<html>
    <head><title>Edit Customer Info</title></head>
    <body>
        <center>
            <br>
            <form action="./set_customer.php" method="post">
                <div>
                    <div>
                        <b>Name : </b>
                        <input type="text" name="customer_name" value="<?php echo $init['name']?>" required>
                    </div>
                    <br>
                    <div>
                        <b>Address : </b>
                        <br>
                        <textarea name="customer_address" id="customer_address" cols="30" rows="10" required><?php echo $init['address']?>
                        </textarea>
                    </div>
                    <br>
                    <div>
                        <b>Sex : </b>
                        <select name="customer_sex" id="customer_sex">
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
                        <b>Birth : </b>
                        <input type="date" name='customer_birth' value="<?php echo $init['birth']?>" required>
                    </div>
                    <br>
                    <input type="text" name="customer_id" value="<?php echo $init['id']?>" hidden>
                    <div>
                        <input type="submit" name="submit" value="Conferm">
                    </div>
                </div>
            </form>
        </center>
    </body>
</html>