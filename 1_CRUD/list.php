<?php
include "./handler/connection.php";
include "./partials/header.php";
?>

<style>
    .subject {
        background-color: skyblue;
        padding: 2px 8px;
        margin: 1px;
        border-radius: 4px;
    }
</style>

<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center">
        <h1>Students</h1>
        <a href="./create.php" class="btn btn-primary d-block">Create</a>
    </div>
    <?php
    if (isset($_GET['success'])) {
        if ($_GET['success'] == 1) {
    ?>
            <div class="alert alert-success">Date saved successfully</div>
        <?php
        } else {
        ?>
            <div class="alert alert-danger">Date save failed</div>
    <?php
        }
    }
    if (isset($_GET['delete-success'])) {
        if ($_GET['delete-success'] == 1) {
            echo '<div class="alert alert-success">Record Deleted successfully</div>';
        } else {
            echo '<div class="alert alert-success">Record Deletion Failed</div>';
        }
    }

    ?>



    <form class="d-flex gap-2 w-50 mt-5">
        <input type="text" name="fullName" class="form-control" value="<?php echo (isset($_GET['fullName'])) ? $_GET['fullName'] : '' ?>">
        <a href="/1_CRUD/list.php" class="btn btn-warning">Reset</a>
        <button class="btn btn-info" type="submit">Submit</button>
        <!-- <button class="btn btn-warning" >Reset</button> -->
    </form>
    <table class="table mt-3">

        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Profile Pic</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Gender</th>
                <th scope="col">Subjects</th>
                <th scope="col">Teacher</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>

            </tr>
        </thead>
        <tbody>
            <?php
            // $query = "SELECT `full_name`,`email` FROM `signup_subs`";
            // $query = "SELECT * FROM `signup_subs` WHERE `created_at`>'2026-03-13 00:00:00' AND  `created_at`<'2026-03-13 23:59:00'";

            $query = "SELECT t.*,s.*, 
                s.id AS stdID, 
                s.created_at AS stdCreatedAt 
                FROM signup_subs AS s 
                LEFT JOIN teachers AS t 
                ON s.teacher_id = t.id";

            if (isset($_GET['fullName'])) {
                $fullname = $_GET['fullName'];
                $query .= " WHERE s.full_name LIKE '%$fullname%' OR t.tname LIKE  '%$fullname%'";
            }

            $query .= " ORDER BY stdID DESC";
            $mysql = mysqli_query($conn, $query);

            $count = mysqli_num_rows($mysql);

            if ($count > 0) {
                while ($row = mysqli_fetch_assoc($mysql)) {
                    // echo "<pre>";
                    // print_r($row);
                    // echo "</pre>";
            ?>
                    <tr>
                        <td><?php echo $row['stdID'] ?? '' ?></td>
                        <td><img src="./uploads/<?php echo $row['profile_pic'] ?? '' ?>" alt="" width="50"></td>
                        <td><?php echo $row['full_name'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['pnumber'] ?? '' ?></td>
                        <td><?php echo $row['gender'] ?? '' ?></td>
                        <td>
                            <?php

                            if ($row['subjects']) {
                                $subjects = explode(',', $row['subjects']);
                                if ($subjects) {
                                    foreach ($subjects as $sub) {
                                        // echo $sub;
                                        echo  '<span class="subject">' . ucfirst($sub) . '</span>';
                                    }
                                }
                            }
                            ?>
                        </td>
                        <td><?php echo $row['tname']??'N/A' ?></td>
                        <td><?php echo $row['stdCreatedAt'] ?? '' ?></td>
                        <td>
                            <a href="./create.php?id=<?php echo $row['id'] ?? '' ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="./handler/delete.php?id=<?php echo $row['id'] ?? '' ?>" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>

                <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="7" align="center">No Records Found</td>
                </tr>

            <?php
            }
            ?>

        </tbody>
    </table>
</div>

<?php
include "./partials/footer.php";
?>