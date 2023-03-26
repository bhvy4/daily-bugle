<?php
include 'inc/head.php';
include '../config/db_connect.php';
include './scripts/functions.php';


if (isset($_SESSION['admin']['user_name'])) {
    $email = base64_decode($_SESSION['admin']['user_name']);

    $created_on = date('d-m-y h:i:s');

    $query = "SELECT * from admin_table WHERE email = '$email'";

    $result = mysqli_query($conn, $query);

    $data = mysqli_fetch_array($result, MYSQLI_ASSOC);

    // $target_dir = "uploads/category/";

    // print_r($data);

    /*fetching all categories*/
    $sql = "select * from categories";
    $result2 = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result2) > 0) {
        $categories = mysqli_fetch_all($result2, MYSQLI_ASSOC);
        // print_r($categories);    
    } else {
        echo " No results found";
    }

    //fetching all tags//
    $sql = "select * from tags";
    $result2 = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result2) > 0) {
        $tags = mysqli_fetch_all($result2, MYSQLI_ASSOC);
        // print_r($categories);    
    } else {
        echo " No results found";
    }

    // //fetching subcategories
    // $category_id = $_POST['category_id'];
    // $subcategories = array();
    // $sql = "select * from subcategory where category_id = '$category_id'";
    // $result = mysqli_query($conn,$sql);
    // $subcategories = mysqli_fetch_all($result,MYSQLI_ASSOC);




    $errors = array('title' => '', 'author_name' => '', 'location' => '', 'tags1' => '', 'images' => '', 'cat' => '', 'subcat' => '', 'content' => '');
    if (isset($_POST['submit'])) {
        $title = $subcategory = $tags1 = $location = $images = $category = $content = $author_name = '';

        if (empty($_POST['author_name'])) {
            $errors['author_name'] = "Author name should not be empty";
        } else {
            $author_name = mysqli_real_escape_string($conn, $_POST['author_name']);
        }

        if (empty($_POST['title'])) {
            $errors['title'] = "title should not be empty";
        } else {
            $title = mysqli_real_escape_string($conn, $_POST['title']);
        }

        if (empty($_POST['tags'])) {
            $errors['tags1'] = "tags should not be empty";
        } else {
            $tags_arr = $_POST['tags'];
            $tags1 = implode(',', $tags_arr);
        }

        if (empty($_POST['location'])) {
            $errors['location'] = "location should not be empty";
        } else {
            $location = mysqli_real_escape_string($conn, $_POST['location']);
        }

        if ($_FILES['images']['size'][0] == 0) {
            $errors['images'] = "images should not be empty";
        } else {
            $images = mysqli_real_escape_string($conn, $_POST['title']);
            $target_dir = "uploads/news/";
            $allowed_extensions = ["jpg", "jpeg", "png"];
            $images_arr = array();
            $images_str = '';
            $length = count($_FILES['images']['name']);
            for ($i = 0; $i < $length; $i++) {
                $tmp_name = basename($_FILES['images']['name'][$i]);
                $tmp_array = explode('.', $tmp_name);
                $ext = end($tmp_array);
                echo $ext . '<br>';
                if (!in_array($ext, $allowed_extensions)) {
                    $errors['image'] = 'File type not allowed';
                } else {
                    $image_name = uniqid("img_") . '.' . $ext;
                    move_uploaded_file($_FILES['images']['tmp_name'][$i], $target_dir . $image_name);
                    array_push($images_arr, $image_name);
                    $images_str = implode(',', $images_arr);
                }
            }
        }

        if (empty($_POST['cat'])) {
            $errors['cat'] = "category should not be empty";
        } else {
            $category = mysqli_real_escape_string($conn, $_POST['cat']);
        }
        if (empty($_POST['subcat'])) {
            $errors['subcat'] = "subcategory should not be empty";
        } else {
            $subcategory = mysqli_real_escape_string($conn, $_POST['subcat']);
        }
        if (empty($_POST['content'])) {
            $errors['news'] = 'news cannot be empty';
        } else {
            $content = mysqli_real_escape_string($conn, $_POST['content']);
        }

        if (!array_filter($errors)) {
            $sql = "insert into news(title,author_name,tags,Location,images,content,category,subcategory,created_on,updated_on) values('$title','$author_name','$tags1','$location','$images_str','$content','$category','$subcategory','$created_on','$created_on')";

            if (mysqli_query($conn, $sql)) {
                header('location: add-news.php');
            } else {
                echo mysqli_errno($conn);
            }
        } else {
            echo "error 2323432 <br>";

            print_r($errors);
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
                                    <h2>Add News</h2>
                                </div>
                            </div>
                        </div>

                        <!-- Add category form  -->
                        <div class="container">
                            <div class="center verticle_center ">
                                <div id="error-message-container"></div>
                                <div class="login-section">
                                    <div class="login_form">
                                        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" enctype="multipart/form-data">
                                            <div class="field">
                                                <Label class="label_field">News Title</Label>
                                                <input type="text" name="title" required>
                                                <p><?php echo $errors['title'] ?></p>
                                            </div>
                                            <div class="field">
                                                <Label class="label_field">Author Name</Label>
                                                <input type="text" name="author_name" required>
                                                <p><?php echo $errors['author_name'] ?></p>
                                            </div>
                                            <div class="field">
                                                <label for="" class="label_field">Tags</label>
                                                <select class="select" name="tags[]" multiple>
                                                    <?php foreach ($tags as $tag) : ?>
                                                        <option value="<?php echo $tag['id'] ?>"><?php echo $tag['name'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <p><?php echo $errors['tags1'] ?></p>
                                            </div>
                                            <div class="field">
                                                <Label class="label_field">Location</Label>
                                                <input type="text" name="location" required>
                                                <p><?php echo $errors['location'] ?></p>
                                            </div>
                                            <div class="field">
                                                <Label class="label_field">Images</Label>
                                                <input type="file" name="images[]" accept="image/*" multiple>
                                                <p class="error"><?php echo $errors['images'] ?></p>
                                            </div>
                                            <div class="field">
                                                <label for="cat" class="label_field">Select Category</label>
                                                <select class='select' name="cat" id="category" placeholder='select' required>
                                                    <option value="" disabled>Select Category</option>
                                                    <?php foreach ($categories  as $category_name) {; ?>
                                                        <option value="<?php echo $category_name['id']; ?>"><?php echo $category_name['name']; ?></option>
                                                    <?php }; ?>
                                                </select>
                                                <p><?php echo $errors['cat'] ?></p>
                                            </div>
                                            <div class="field">
                                                <label for="subcat" class="label_field">Select subcategory</label>
                                                <select name="subcat" id="subcategory" placeholder='select' required>
                                                    <option value="" disabled>Select subcategory</option>
                                                </select>
                                                <p><?php echo $errors['subcat'] ?></p>
                                            </div> <?php summernote(); ?>
                                            <div class="field">
                                                <label for="news" class="label_field">Add News</label>
                                                <textarea name="content" id="summernote" cols="30" rows="10" width="100"></textarea>
                                                <p><?php echo $errors['content'] ?></p>
                                            </div>
                                            <div class="field margin_0 text-center"></div>
                                            <button class="main_bt text-center" type="Submit" name="submit">Add</button>
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
                    console.log('summernote ready');
                    $('#summernote').summernote({
                        height: 200,
                    });

                    $('#category').on('change', function() {
                        console.log('php');
                        let category_id = this.value;
                        console.log(category_id);
                        $.ajax({
                            url: 'process_subcategory.php',
                            type: 'POST',
                            data: {
                                category_id: category_id
                            },
                            success: function(result) {
                                $('#subcategory').html(result);
                            }
                        })
                    })

                });
            </script>
</body>

</html>