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


        /* to show current name and image */
        $id = $_SESSION['update-id'];
        $query1 = "Select * from news where n_id = '$id' ";
        $result1 = mysqli_query($conn, $query1);
        $news_data = mysqli_fetch_array($result1, MYSQLI_ASSOC);


        // updting news //
        if (isset($_POST['submit'])) {
            $news_title = $content = '';
            $errors = array('news_title' => '','news_content'=>'');
            $news_title = trim(mysqli_real_escape_string($conn, $_POST['news_title']));
            $content = trim(mysqli_real_escape_string($conn, $_POST['content']));
            $news_to_update_id = $_SESSION['update-id'];
            if (empty($news_title)) {
                $errors['news_title'] = "Name cannot be empty";
            }

            if (!array_filter($errors)) {
                $sql = "update news set title = '$news_title', content = '$content' ,updated_on = '$updated_on' where n_id = '$news_to_update_id' ";

                if (mysqli_query($conn, $sql)) {
                    echo "<script type='text/javascript'>addStatusMessage('success','Category has been added sucessfully'); </script>";
                    unset($_SESSION['update-id']);
                    header("location: view-news.php");
                } else {
                    echo mysqli_errno($conn);
                }
            }
        }
    } else {
        header("location: login.php");
    }
} else {
    echo "cannot access this page";
    header("location: view-news.php");
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
                                    <h2>Update News</h2>
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
                                                    <label class="label_field">Current Title:</label>
                                                    <input value="<?php echo($news_data['title']); ?>" type="text" required disabled />
                                                </div>
                                                <div class="field">
                                                    <label class="label_field">New Title:</label>
                                                    <input type="text" name="news_title" required />
                                                </div>
                                                <div class="field">
                                                    <label class="label_field">Content:</label>
                                                    <textarea name="content" id="summernote" cols="30" rows="10">
                                                        <?php echo $news_data['content'] ?>
                                                    </textarea>
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
            <!-- <script src="js/jquery.min.js"></script> -->
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
            <script>
                $(document).ready(function() {
                    $('#summernote').summernote({
                        
                        height: 200
                        
                    });
                });
            </script>
</body>

</html>