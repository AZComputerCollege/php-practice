<?php
include "./handler/connection.php";
include "./partials/header.php";
?>


<div class="container d-flex justify-content-center my-5">
    <div class="card w-50">
        <div class="card-header">
           <h3> Create Student</h3>
        </div>
        <div class="card-body">
            <form action="./handler/add.php" method="post">
                <div class="form-group my-3">
                    <label for="">Name: </label>
                    <input type="text" class="form-control" name="full_name" id="">
                </div>
                <div class="form-group my-3">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" id="">
                </div>
                <div class="form-group my-3">
                    <label for="">Phone No.</label>
                    <input type="tel" class="form-control" name="pnumber" id="">
                </div>
    
                <div class="form-group my-3 ">
                    <label for="">Gender</label> <br>
                    <div class="form-check-inline">
                        <input type="radio" name="gender" id="male" class="form-check-input" value="male">
                        <label class="form-check-label" for="male">Male</label>
                    </div>
    
                    <div class="form-check-inline">
                        <input type="radio" name="gender" id="female" class="form-check-input" value="female">
                        <label class="form-check-label" for="female">Female</label>
                    </div>
    
                    <div class="form-check-inline">
                        <input type="radio" name="gender" id="other" class="form-check-input" value="other">
                        <label class="form-check-label" for="other">Other</label>
                    </div>
                </div>
    
                <div class="card-footer text-body-secondary d-flex justify-content-end gap-2">
                    <a href="./list.php" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
    
    
         
        </div>
    
    </div>
</div>




<?php
include "./partials/footer.php";
?>