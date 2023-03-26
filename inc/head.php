<?php $conn = mysqli_connect('localhost', 'bhavya', '12345678', 'daily-bugle') or die('Connection error: ' . mysqli_connect_error()); ?>
<?php
function tags()
{
    @$conn = mysqli_connect('localhost', 'bhavya', '12345678', 'daily-bugle') or die('Connection error: ' . mysqli_connect_error());
    $tag_sql = "SELECT * FROM tags";
    $tags = mysqli_query($conn, $tag_sql);
    while ($row = mysqli_fetch_array($tags)) :
        echo ' <a href="" class="btn btn-sm btn-outline-secondary m-1">' . $row['name'] . '</a>';
    endwhile;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>NEWSROOM - <?php echo strtoupper(str_replace("-", " ", str_replace(".php", "", basename($_SERVER['PHP_SELF'])))); ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <meta >

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>