<?php

include("../config/db_connect.php");

$_SESSION['admin'] = array();

$message = $email = $password = $email_error = '';

$errors = array('email' => '', 'password' => '');

// if (isset($_GET['flag'])) {
//    if ($_GET['flag'] == 'register') {
//       $message =  "Registration successfull, Please Login here.";
//    } else if ($_GET['flag'] == 'unauthorised') {
//       $message = "page cannot be accessed. Please Sign in";
//    }
// }


if (isset($_POST['submit'])){
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = mysqli_real_escape_string($conn, $_POST['password']);

   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = "Please enter valid email.";
   }



   if (!array_filter($errors)) {
      $query = "select * from admin_table where email = '$email'";
      $result = mysqli_query($conn, $query);
      $data = mysqli_fetch_assoc($result);

      // print_r("$data");
      if (password_verify($password, $data['password'])) {
         $_SESSION['admin']['name'] =$data['name'];
         $_SESSION['admin']['user_name'] = base64_encode($data['email']);
         $_SESSION['admin']['role'] = $data['role'];

         print_r($_SESSION);

         echo "logged";
         header("location: dashboard.php");
      } else {
         echo "incorrecct password";
         $errors['password'] = "Incorrect password";
      }
   }
}else{
   //if ($_GET['flag'] == 'register') {
      //$message =  "Registration successfull, Please Login here.";
 //  } else if ($_GET['flag'] == 'unauthorised') {
      $message = "page cannot be accessed. Please Sign in";
  // }
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
                  <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                     <fieldset>
                        <div style="text-align: center;color: orange ;"><?php echo htmlspecialchars($message) ?></div>
                        <div class="field">
                           <label class="label_field">Email Address</label>
                           <input type="email" name="email" placeholder="E-mail" />
                           <p>Email must be a valid address, e.g. me@mydomain.com</p>
                           <p style="text-align:center; color:red;"><?php echo htmlspecialchars($errors['email']); ?></p>
                        </div>
                        <div class="field">
                           <label class="label_field">Password</label>
                           <input type="password" name="password" placeholder="Password" />
                           <p>Password must alphanumeric (@, _ and - are also allowed) and be 8 - 20 characters</p>
                           <p style="text-align:center; color:red;"><?php echo htmlspecialchars($errors['password']); ?></p>
                        </div>
                        <div class="field">
                           <label class="label_field hidden">hidden label</label>
                           <label class="form-check-label"><input type="checkbox" class="form-check-input"> Remember Me</label>
                           <a class="forgot" href="">Forgotten Password?</a>
                        </div>
                        <div class="field margin_0">
                           <label class="label_field hidden">hidden label</label>
                           <button class="main_bt" name="submit">Sing In</button>
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
   <script src="scripts/loginFormValidation.js"></script>
</body>

</html>