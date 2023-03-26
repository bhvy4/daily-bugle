<?php
// session_start();
require("../config/db_connect.php");
$name = $email = $phone = $about = $password = $role = $image = $user_id='';
$errors = array('email'=>'','image'=>'', 'sql_error'=>'');

if (isset($_POST['submit'])) {
    $user_id = uniqid();
    $name =  mysqli_real_escape_string($conn,$_POST['name']) ;
    $email = mysqli_real_escape_string($conn,$_POST['email']) ;
    $phone = mysqli_real_escape_string($conn,$_POST['phone']) ;
    $about = mysqli_real_escape_string($conn,$_POST['about']) ;
    $password = password_hash( mysqli_real_escape_string($conn,$_POST['password']),PASSWORD_DEFAULT) ; 
    $role = mysqli_real_escape_string($conn,$_POST['role']) ; 

    // $_SESSION['user_id'] = $user_id;

    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors['email']="Please enter valid email";
        // echo "error in mail";
    }

    $allowed_extensions = array('jpg','jpeg','png');
    $target_dir = "uploads/";
    // if($_FILES["pic"]["size"]==0){
    //     echo "no img";
    // } else{
    //     echo "img";
    // }
    $image_name = $_FILES["image"]["name"];
    $temp_image_name = explode(".", $image_name);
    $ext = end($temp_image_name);

    //echo $image_name . " " . $ext;

    if(!in_array($ext,$allowed_extensions)){
        $errors['image'] = "Only jpg,jpeg,png images are allowed";
        print_r($errors);
    } else{
        if($_FILES["image"]["size"]>1048576){
            $errors['image'] = "file size too large";
            // echo "too large";
        } else{
            $image = uniqid("img_") . "." . $ext;
        }
            
    }

    if(!array_filter($errors)){     
        $query = "INSERT INTO admin_table(user_id,name,email,phone,about,password,role,image ) VALUES('$user_id','$name','$email','$phone','$about','$password','$role','$image')";
        if(mysqli_query($conn,$query)){
            move_uploaded_file($_FILES["image"]["tmp_name"],$target_dir.$image);
            header("location: login.php");
        } else {
           $errors['sql_error'] =  "User could not register due to " . mysqli_errno($conn);
        }
    }

    
}

?>

<?php include 'inc/head.php'; ?>

<body class="inner_page login">
    <div class="full_container">
        <div class="container">
            <div class="center verticle_center full_height">
                <div class="login_section">
                    <div class="logo_login">
                        <div class="center">
                            <img width="210" src="images/logo/logo.png" alt="#" />
                        </div>
                    </div>
                    <div class="login_form">
                        <form id="form" method="post" action=" <?php echo $_SERVER['PHP_SELF']; ?> " enctype="multipart/form-data" >
                            <fieldset>
                                <div class="preview" style="align-items: center;display: flex; justify-content: center;">
                                    <img id="file-ip-1-preview" height="100px" width="100px" style="display: none; border-radius: 50%;">
                                </div>
                                <div class="field">
                                    <label class="label_field">Full Name</label>
                                    <input type="text" name="name" placeholder="Name"  required/>
                                    <p>Enter a valid Name</p>
                                </div>
                                <div class="field">
                                    <label class="label_field">Email Address</label>
                                    <input type="text" name="email" placeholder="E-mail" required/>
                                    <p>Email must be a valid address, e.g. me@mydomain.com</p>
                                    <div class = "error"><?php echo htmlspecialchars($errors['email']); ?></div>
                                </div>
                                <div class="field">
                                    <label class="label_field">Phone Number</label>
                                    <input type="text" name="phone" placeholder="Phone Number" required/>
                                    <p>Telephone must be a valid telephone number (10 digits)</p>
                                </div>
                                <div class="field">
                                    <label class="label_field">About</label>
                                    <input type="text" name="about" placeholder="Enter Your Post" required/>
                                    <p>Field should not contain special characters</p>
                                    
                                </div>
                                <div class="field">
                                    <label class="label_field">Role</label>
                                    <select name = role required>
                                        <option value = "1">User</option>
                                        <option value = "0">Administrator</option>
                                    </select>
                                    
                                </div>
                                <div class="field">
                                    <label class="label_field">Profile Picture</label>
                                    <input type="file" name="image" id = "file-ip-1" accept = "image/*" required/>
                                    <div class = "error"><?php echo htmlspecialchars($errors['image']); ?></div>
                                    
                                </div>
                                <div class="field">
                                    <label class="label_field">Password</label>
                                    <input type="password" name="password" placeholder="Password" id = "pass1" required/>
                                    <p>Password must alphanumeric (@, _ and - are also allowed) and be 8 - 20 characters</p>
                                </div>
                                <div class="field">
                                    <label class="label_field">Confirm Password</label>
                                    <input type="password" name="password2" placeholder="Retype Password" id = "pass2" required/>
                                    <p>password not matching</p>
                                    <!-- <div class="error"></div> -->
                                </div>

                                <div class="field margin_0">
                                    <label class="label_field hidden">hidden label</label>
                                    <button class="main_bt" name="submit" disabled>Sign Up</button>
                                    <p class="error"><?php echo htmlspecialchars($errors['sql_error']) ?></p>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
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
    <!-- nice scrollbar -->
    <script src="js/perfect-scrollbar.min.js"></script>
    <script>
        var ps = new PerfectScrollbar('#sidebar');
    </script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
    <script src="scripts/registerFormValidation.js"></script>
    <script src="scripts/showImage.js"></script>
</body>

</html>