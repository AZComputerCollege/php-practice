<?php
include "./handler/connection.php";
include "./partials/header.php";

if (isset($_GET['id']) && $_GET['id'] != "") {
    $id = $_GET['id'];

    // $query = "SELECT * FROM `signup_subs` WHERE `id` = '$id'";

    $sql = mysqli_query($conn, "SELECT * FROM `signup_subs` WHERE `id` = '$id'");

    $record = mysqli_fetch_assoc($sql);

    // print_r($record);
}

?>



<div class="container d-flex justify-content-center my-5">
    <div class="card w-50">
        <div class="card-header">
            <h3><?php echo isset($_GET['id']) ? "Update" : "Create" ?> Student</h3>
        </div>
        <div class="card-body">
            <form action="<?php echo isset($_GET['id'])? "./handler/update.php?id=$id" : "./handler/add.php"  ?>" method="post">
                <div class="form-group my-3">
                    <label for="">Name: </label>
                    <input type="text" class="form-control" name="full_name" value="<?php echo @$record['full_name'] ?>" id="">
                </div>
                <div class="form-group my-3">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" id="" value="<?php echo @$record['email'] ?>">
                </div>
                <div class="form-group my-3">
                    <label for="">Phone No.</label>
                    <input type="tel" class="form-control" name="pnumber" id="" value="<?php echo @$record['pnumber'] ?>">
                </div>


                <?php
                $checkValue = "male";
                if (isset($record['gender']) && $record['gender'] == "female") {
                    $checkValue = "female";
                }else if (isset($record['gender']) && $record['gender'] == "other"){
                    $checkValue = "other";
                }
                ?>

                <div class="form-group my-3 ">
                    <label for="">Gender</label> <br>
                    <div class="form-check-inline">
                        <input type="radio" name="gender" id="male" class="form-check-input" value="male" <?php echo $checkValue=="male"?"checked":"" ?>>
                        <label class="form-check-label" for="male">Male</label>
                    </div>

                    <div class="form-check-inline">
                        <input type="radio" name="gender" id="female" class="form-check-input" value="female" <?php echo $checkValue=="female"?"checked":"" ?>>
                        <label class="form-check-label" for="female">Female</label>
                    </div>

                    <div class="form-check-inline">
                        <input type="radio" name="gender" id="other" class="form-check-input" value="other" <?php echo $checkValue=="other"?"checked":"" ?>>
                        <label class="form-check-label" for="other">Other</label>
                    </div>
                </div>

                <div class="card-footer text-body-secondary d-flex justify-content-end gap-2">
                    <a href="./list.php" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary"><?php echo isset($_GET['id']) ? "Update" : "Submit" ?></button>
                </div>
            </form>



        </div>

    </div>
</div>




<?php
include "./partials/footer.php";
?>