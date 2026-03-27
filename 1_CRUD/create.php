<?php
include "./handler/connection.php";
include "./partials/header.php";


// ======== Edit Data ===========
if (isset($_GET['id']) && $_GET['id'] != "") {
    $id = $_GET['id'];

    // $query = "SELECT * FROM `signup_subs` WHERE `id` = '$id'";

    // $sql = mysqli_query($conn, "SELECT * FROM signup_subs As s LEFT JOIN teachers As t ON s.teacher_id = t.id  WHERE s.id = $id");
    $sql = mysqli_query($conn, "SELECT * FROM signup_subs WHERE id = $id");

    $student = mysqli_fetch_assoc($sql);


    // echo '<pre>';
    // print_r($student);
    // echo '</pre>';
}

?>



<div class="container d-flex justify-content-center my-5">
    <div class="card w-50">
        <div class="card-header">
            <h3><?php echo isset($_GET['id']) ? "Update" : "Create" ?> Student</h3>
        </div>
        <div class="card-body">
            <form action="<?php echo isset($_GET['id']) ? "./handler/update.php?id=$id" : "./handler/add.php"  ?>" method="post" enctype="multipart/form-data">
                <div class="form-group my-3">
                    <label for="">Name: </label>
                    <input type="text" class="form-control" name="full_name" value="<?php echo @$student['full_name'] ?>" id="">
                </div>
                <div class="form-group my-3">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" id="" value="<?php echo @$student['email'] ?>">
                </div>
                <div class="form-group my-3">
                    <label for="">Phone No.</label>
                    <input type="tel" class="form-control" name="pnumber" id="" value="<?php echo @$student['pnumber'] ?>">
                </div>


                <?php
                $checkValue = "male";
                if (isset($student['gender']) && $student['gender'] == "female") {
                    $checkValue = "female";
                } else if (isset($student['gender']) && $student['gender'] == "other") {
                    $checkValue = "other";
                }
                ?>

                <div class="form-group my-3 ">
                    <label for="">Gender</label> <br>
                    <div class="form-check-inline">
                        <input type="radio" name="gender" id="male" class="form-check-input" value="male" <?php echo $checkValue == "male" ? "checked" : "" ?>>
                        <label class="form-check-label" for="male">Male</label>
                    </div>

                    <div class="form-check-inline">
                        <input type="radio" name="gender" id="female" class="form-check-input" value="female" <?php echo $checkValue == "female" ? "checked" : "" ?>>
                        <label class="form-check-label" for="female">Female</label>
                    </div>

                    <div class="form-check-inline">
                        <input type="radio" name="gender" id="other" class="form-check-input" value="other" <?php echo $checkValue == "other" ? "checked" : "" ?>>
                        <label class="form-check-label" for="other">Other</label>
                    </div>
                </div>

                <div class="my-3">
                    <label for="">Profile Pic</label><br>
                    <input type="file" name="profile_pic" class="form-control">
                </div>
                <?php
                    if(isset($student)){
                        $filePath = './uploads/'.$student['profile_pic'];
                        if($_GET['id'] && $student['profile_pic'] && file_exists($filePath)){
                           ?>
                       <div>
                           <img src="./uploads/<?php echo $student['profile_pic'] ?>" alt="IMAGE" width="70">
                       </div>
   
                           <?php
                        }
                    }
                ?>


                <?php
                    if(isset($student)&&$student['subjects']){
                        $subjects = explode(',',$student['subjects']);
                    }
                ?>

                <div class="form-group my-3 ">
                    <label for="">Subjects</label> <br>
                    <div class="form-check-inline">
                        <input type="checkbox" name="subject[]" id="english" class="form-check-input" value="english" <?php echo (isset($subjects) && (in_array('english',$subjects))) ? "checked" : "" ?>>
                        <label class="form-check-label" for="english">English</label>
                    </div>

                    <div class="form-check-inline">
                        <input type="checkbox" name="subject[]" id="urdu" class="form-check-input" value="urdu" <?php echo  (isset($subjects) && (in_array('urdu',$subjects))) ? "checked" : "" ?>>
                        <label class="form-check-label" for="urdu">Urdu</label>
                    </div>

                    <div class="form-check-inline">
                        <input type="checkbox" name="subject[]" id="math" class="form-check-input" value="math" <?php echo  (isset($subjects) && (in_array('math',$subjects))) ? "checked" : "" ?>>
                        <label class="form-check-label" for="math">Math</label>
                    </div>
                </div>

                <?php
                $query = "SELECT id,tname FROM `teachers` WHERE is_active=1";
                $sql = mysqli_query($conn, $query);
                // $students = mysqli_fetch_all($sql);

                // print_r($students);
                ?>

                <div class="my-3">
                    <label for="">Teacher</label>
                    <select name="teacher_id" class="form-select" id="">
                        <?php
                        while ($teacher = mysqli_fetch_assoc($sql)) {
                            // print_r($teacher);
                        ?>
                            <option value="<?php echo $teacher['id'] ?>"   <?php echo (isset($student['teacher_id'])&&$student['teacher_id']==$teacher['id']) ?'Selected':''?>>
                                <?php echo $teacher['tname'] ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div>
                    <label for="">Gallary</label>
                    <input type="file" name="gallary[]" class="form-control" multiple>
                </div>



                <div class="card-footer text-body-secondary d-flex justify-content-end gap-2">
                    <a href="./list.php" class="btn btn-secondary">Cancel</a>
                    <button type="submit" name="sub" class="btn btn-primary"><?php echo isset($_GET['id']) ? "Update" : "Submit" ?></button>
                </div>
            </form>



        </div>

    </div>
</div>




<?php
include "./partials/footer.php";
?>