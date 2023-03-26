<?php include 'inc/head.php'; ?>
<!-- Topbar Start -->
<?php include 'inc/topbar.php'; ?>
<!-- Topbar End -->
<!-- Navbar Start -->
<?php include 'inc/navbar.php'; ?>
<!-- Navbar End -->

<?php
/*
if(empty($_POST['name']) || empty($_POST['subject']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$m_subject = strip_tags(htmlspecialchars($_POST['subject']));
$message = strip_tags(htmlspecialchars($_POST['message']));

$to = "info@example.com"; // Change this email to your //
$subject = "$m_subject:  $name";
$body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\n\nEmail: $email\n\nSubject: $m_subject\n\nMessage: $message";
$header = "From: $email";
$header .= "Reply-To: $email";	

if(!mail($to, $subject, $body, $header))
  http_response_code(500); */
?>
<?php

if (isset($_POST['submit'])) {
   // print_r($_REQUEST);exit("<script>alert('ok')</script>");
   //Array ( [name] => sdfdsfsad [email] => fdsfds@fdasfds.com [subject] => dsfadsfdsZ [message] => zX [submit] => )
    $name = $email = $message = $subject = $submit_message = '';
    $errors = array('name' => '', 'email' => '', 'message' => '', 'subject' => '');
    //echo 'cake';
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Incorrect email format';
    }
    $subject =mysqli_real_escape_string($conn, $_POST['subject']);
    $message =mysqli_real_escape_string($conn, $_POST['message']);

    if (!array_filter($errors)) {
        $contact_sql = "INSERT INTO contact_table(contact_name,contact_email,contact_subject,contact_message) VALUES('$name','$email','$subject','$message')";
        if (mysqli_query($conn, $contact_sql)) {
            $submit_message = 'Information submitted successfully';
        } else {
            $submit_message = 'Information could not be submitted';
        }
    }
}
// } else {
//     echo 'error';
// }

?>
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="container">
        <nav class="breadcrumb bg-transparent m-0 p-0">
            <a class="breadcrumb-item" href="#">Home</a>
            <span class="breadcrumb-item active">Contact</span>
        </nav>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Contact Start -->
<div class="container-fluid py-3">
    <div class="container">
        <div class="bg-light py-2 px-4 mb-3">
            <h3 class="m-0">Contact Us For Any Queries</h3>
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="bg-light mb-3" style="padding: 30px;">
                    <h6 class="font-weight-bold">Get in touch</h6>
                    <p>Labore ipsum ipsum rebum erat amet nonumy, nonumy erat justo sit dolor ipsum sed, kasd lorem sit et duo dolore justo lorem stet labore, diam dolor et diam dolor eos magna, at vero lorem elitr</p>
                    <div class="d-flex align-items-center mb-3">
                        <i class="fa fa-2x fa-map-marker-alt text-primary mr-3"></i>
                        <div class="d-flex flex-column">
                            <h6 class="font-weight-bold">Our Office</h6>
                            <p class="m-0">123 Street, New York, USA</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <i class="fa fa-2x fa-envelope-open text-primary mr-3"></i>
                        <div class="d-flex flex-column">
                            <h6 class="font-weight-bold">Email Us</h6>
                            <p class="m-0">info@example.com</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-2x fa-phone-alt text-primary mr-3"></i>
                        <div class="d-flex flex-column">
                            <h6 class="font-weight-bold">Call Us</h6>
                            <p class="m-0">+012 345 6789</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="contact-form bg-light mb-3" style="padding: 30px;">
                    <div id="success"></div>
                    <form method="POST" action="contact.php" id="">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="control-group">
                                    <input name='name' type="text" class="form-control p-4" id="name" placeholder="Your Name" required="required" data-validation-required-message="Please enter your name" />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="control-group">
                                    <input name='email' type="email" class="form-control p-4" id="email" placeholder="Your Email" required="required" data-validation-required-message="Please enter your email" />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <input name='subject' type="text" class="form-control p-4" id="subject" placeholder="Subject" required="required" data-validation-required-message="Please enter a subject" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea name='message' class="form-control" rows="4" id="message" placeholder="Message" required="required" data-validation-required-message="Please enter your message"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <?php 
if (isset($_POST['submit'])) {  echo $submit_message; } ?>
                            <button name='submit' class="btn btn-primary font-weight-semi-bold px-4" style="height: 50px;" type="submit" id="sendMessageButton">Send Message</button>
                            <!-- <p class="help-block text-success"></p> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->

<!-- Footer Start -->
<?php include 'inc/footer.php'; ?>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-dark back-to-top"><i class="fa fa-angle-up"></i></a>


<?php include 'inc/foot.php'; ?>
