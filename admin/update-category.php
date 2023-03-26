<?php
include 'inc/head.php';
include '../config/db_connect.php';
include './scripts/functions.php';

if (isset($_SESSION['update-id'])) {

    if (isset($_SESSION['admin']['user_name'])) {
        $email = base64_decode($_SESSION['admin']['user_name']);

        $updated_on = date('d-m-y h:i:s');

        $query = "SELECT * from admin_table WHERE email = '$email'";

        $result = mysqli_query($conn, $query);

        $data = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $target_dir = "uploads/category/";

        // print_r($data);

        /* to show current name and image */
        $id = $_SESSION['update-id'];
        $query1 = "Select * from categories where id = '$id' ";
        echo $query1;
        $result1 = mysqli_query($conn, $query1);
        $cat_data = mysqli_fetch_array($result1, MYSQLI_ASSOC);

        if (isset($_POST['submit'])) {
            $image = $category = '';
            $errors = array('category' => '', 'image' => '');
            $category = trim(mysqli_real_escape_string($conn, $_POST['category']));
            $cat_to_update_id = $_SESSION['update-id'];
            if (empty($category)) {
                $errors['category'] = "Name cannot be empty";
            }

            // $image_name = image_checker($image,$errors);
            $allowed_extensions = array('jpg', 'jpeg', 'png');
            $image_name = $_FILES["images"]["name"];
            $temp_image_name = explode(".", $image_name);
            $ext = end($temp_image_name);

            //echo $image_name . " " . $ext;

            if (!in_array($ext, $allowed_extensions)) {
                $errors['image'] = "Only jpg,jpeg,png images are allowed";
                // print_r($errors);
            } else {
                if ($_FILES["images"]["size"] > 1048576) {
                    $errors['image'] = "file size too large";
                    // echo "too large";
                } else {
                    $image = uniqid("img_") . "." . $ext;
                }
            }

            // echo "image is : $image_name <br>";
            if (!array_filter($errors)) {
                if (move_uploaded_file($_FILES["images"]["tmp_name"], $target_dir . $image)) {
                    $sql = "update categories set name = '$category',image = '$image', updated_on = '$updated_on' where id = '$cat_to_update_id' ";

                    if (mysqli_query($conn, $sql)) {
                        // echo $sql;
                        echo "<script type='text/javascript'>addStatusMessage('success','Category has been added sucessfully'); </script>";
                        // exit;
                        unset($_SESSION['update-id']);
                        header("location: view-category.php");
                    } else {
                        echo mysqli_errno($conn);
                    }
                }
            }
        }
    } else {
        header("location: login.php");
    }
} else {
    echo "cannot access this page";
    header("location: view-category.php");
}

?>

<body class="dashboard dashboard_2">
    <div class="full_container">
        <div class="inner_container">
            <!-- Sidebar  -->
            <?php include 'inc/sidebar.php'; ?>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
                <!-- topbar -->
                <?php include 'inc/topbar.php'; ?>
                <!-- end topbar -->
                <!-- dashboard inner -->
                <div class="midde_cont">
                    <div class="container-fluid">
                        <div class="row column_title">
                            <div class="col-md-12">
                                <div class="page_title">
                                    <h2>Update Category</h2>
                                </div>
                            </div>
                        </div>

                        <!-- Add category form  -->
                        <div class="container">
                            <div class="center verticle_center full_height">
                                <div id="error-message-container"></div>
                                <div class="login-section">
                                    <div class="login_form">
                                        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" enctype="multipart/form-data">
                                            <fieldset>
                                                <div class="field">
                                                    <label class="label_field">Current Name:</label>
                                                    <input value="<?php echo $cat_data['name']; ?>" type="category" name="category" required disabled />
                                                </div>
                                                <div class="field">
                                                    <label class="label_field">New Name:</label>
                                                    <input type="category" name="category" required />
                                                </div>
                                                <div class="field">
                                                    <label class="label_field">Current Image:</label>
                                                    <img width="100" src="uploads/category/<?php echo $cat_data['image'] ?>" alt="" class="rounded-circle">
                                                </div>
                                                <div class="field">
                                                    <label class="label_field">New Image:</label>
                                                    <input type="file" name="images" accept="image/*" required />
                                                </div>

                                                <div class="field margin_0">
                                                    <!-- <label class="label_field hidden">hidden label</label> -->
                                                    <button class="main_bt" name="submit">Update</button>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- footer -->
                        <?php include 'inc/footer.php'; ?>
                        <!-- end dashboard inner -->
                    </div>
                </div>
            </div>
            <!-- jQuery -->
            <script src="js/jquery.min.js"></script>
            <script src="js/popper.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <!-- wow animation -->
            <script src="js/animate.js"></script>
            <!-- select country -->
            <script src="js/bootstrap-select.js"></script>
            <!-- owl carousel -->
            <script src="js/owl.carousel.js"></script>
            <!-- chart js -->
            <script src="js/Chart.min.js"></script>
            <script src="js/Chart.bundle.min.js"></script>
            <script src="js/utils.js"></script>
            <script src="js/analyser.js"></script>
            <!-- nice scrollbar -->
            <script src="js/perfect-scrollbar.min.js"></script>
            <script>
                var ps = new PerfectScrollbar('#sidebar');
            </script>
            <!-- custom js -->
            <script src="js/custom.js"></script>
            <script src="js/chart_custom_style2.js"></script>

            <script src="./scripts/functions.js"></script>
</body>

</html>