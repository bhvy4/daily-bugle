<?php
include 'inc/head.php';
include '../config/db_connect.php';
include './scripts/functions.php';

if (isset($_SESSION['admin']['user_name'])) {
    $email = base64_decode($_SESSION['admin']['user_name']);
    // $get_email = $_GET['email'];
    // $name = $about= $email = $phone = '';
    $created_on = date('d-m-y h:i:s');

    $query = "SELECT * from admin_table WHERE email = '$email'";

    $result = mysqli_query($conn, $query);

    $data = mysqli_fetch_array($result, MYSQLI_ASSOC);


    // print_r($data);

    if (isset($_POST['submit'])) {
        $tag = '';
        $errors = array('tag' => '');
        $tag = trim(mysqli_real_escape_string($conn, $_POST['tag']));
        if (empty($tag)) {
            $errors['tag'] = "Name cannot be empty";
        }



        // echo "image is : $image_name <br>";
        if (!array_filter($errors)) {
            $sql = "insert into tags(name,created_on,updated_on) values('$tag','$created_on','$created_on')";

            if (mysqli_query($conn, $sql)) {
                // echo $sql;
                echo "<script>window.onload = ()=>{addStatusMessage('success','successfully added')}; </script>";
                // exit;

                header("location: add-tags.php");
            } else {
                echo "<script>window.onload = ()=>{addStatusMessage('error','could not be added')}; </script>";
            }
        }
    }
} else {
    header("location: login.php");
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
                                    <h2>Add Tags</h2>
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
                                                    <label class="label_field">Tag Name:</label>
                                                    <input type="text" name="tag" required />
                                                </div>


                                                <div class="field margin_10">
                                                    <!-- <label class="label_field hidden">hidden label</label> -->
                                                    <button class="main_bt" name="submit">Add</button>
                                                </div>
                                                <div class = "field" id="error-message-container"></div>
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