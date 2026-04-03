<?php
require "./conn.php";

if (isset($_POST)) {
    if ($_POST['category'] == "" || $_POST['pname'] == "" || $_POST['pdescription'] == "" || $_POST['p_price'] == "" || $_POST['s_price'] == "" || $_POST['tax'] == "" || $_POST['qty'] == "") {
        echo json_encode(["status" => 403, "Message" => "Please fillout all fields"], 403);
    } else {
            $subcategory= (isset($_POST['subcategory']) && ($_POST['subcategory']!=""))?$_POST['subcategory']:NULL;

            $subcategoryValue = is_null($subcategory) ? "NULL" : "'$subcategory'";

        if (isset($_FILES['thumbnail'])) {
            $image = $_FILES['thumbnail']['name'];
            $newName = rand(100000, 999999) .".". strtolower(pathinfo($image, PATHINFO_EXTENSION));

            move_uploaded_file($_FILES['thumbnail']['tmp_name'], "../uploads/" . $newName);

            $query = "INSERT INTO product 
                (category_id, subcategory_id, pname, pdescription, p_price, s_price, tax, qty, thumbnail) 
                VALUES (
                    '{$_POST['category']}',
                    $subcategoryValue,
                    '{$_POST['pname']}',
                    '{$_POST['pdescription']}',
                    '{$_POST['p_price']}',
                    '{$_POST['s_price']}',
                    '{$_POST['tax']}',
                    '{$_POST['qty']}',
                    '$newName'
                )";

            $run = mysqli_query($conn, $query);

            if ($run) {
                echo json_encode(["status" => 200, "Message" => "Data Inserted Successfully"], 200);
            } else {
                echo json_encode(["status" => 500, "Message" => "Data Insertion Failed", "error"=> mysqli_error($conn,$run)], 200);
            }
        }
    }
}
