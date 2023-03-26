<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$errors = array('email'=>'');
if (isset($_POST['newsletter-submit'])) {
    $newsletter_email = '';
    if (empty($_POST['newsletter-email'])) {
        $errors['email'] = 'Please enter the email';
        echo 'empty'.'<br>';
    } else {
        $newsletter_email = $_POST['newsletter-email'];
        if (!filter_var($newsletter_email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Please enter email in correct format';
        } else {
            $newsletter_sql = "INSERT INTO newsletter(newsletter_email) VALUES('$newsletter_email')";
            echo '$newsletter_sql';
            if (mysqli_query($conn, $newsletter_sql)) {
                echo 'success';
            } else {
                echo 'failure';
            }
        }
    }
} 
?>

<div class="pb-3">
    <div class="bg-light py-2 px-4 mb-3">
        <h3 class="m-0">Newsletter</h3>
    </div>
    <div class="bg-light p-4 mb-3">
        <p>Contact us with you email</p>
        <div class="input-group" style="width: 100%;">
            <form method='post' action="index.php">
                <input name='newsletter-email' type="text" class="form-control form-control-lg" placeholder="Your Email"><br>
                <div class="input-group-append">
                    <button class="btn btn-primary" type='submit' name='newsletter-submit'>Sign Up</button>
                    <p class="help-block text-danger"><?php echo $errors['email'] ?></p>
                </div>
            </form>
        </div>
        <!-- <small>Sit eirmod nonumy kasd eirmod</small> -->
    </div>
</div>