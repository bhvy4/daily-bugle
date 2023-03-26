<?php include 'inc/head.php'; ?>
<?php

if (isset($_GET['id'])) {
    $news_id = $_GET['id'];
    $sql = "SELECT news.author_name,news.updated_on,news.category,news.title,categories.name,news.images,news.content,news.tags FROM news INNER JOIN categories ON news.category=categories.id WHERE n_id = '$news_id'";
    $news = mysqli_query($conn, $sql);
    $news_data = mysqli_fetch_array($news);
} else {
    echo "<script>window.location.href='index.php'</script>";
    // header('location: index.php');
}
?>
<!-- Topbar Start -->
<?php include 'inc/topbar.php'; ?>
<!-- Topbar End -->
<!-- Navbar Start -->
<?php include 'inc/navbar.php'; ?>
<!-- Navbar End -->


<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="container">
        <nav class="breadcrumb bg-transparent m-0 p-0">
            <a class="breadcrumb-item" href="#">Home</a>
            <a class="breadcrumb-item" href="#">Category</a>
            <a class="breadcrumb-item" href="category.php?id=<?= $news_data['category'] ?>"><?= $news_data['name'] ?></a>
            <span class="breadcrumb-item active"><?= $news_data['title'] ?></span>
        </nav>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- News With Sidebar Start -->
<div class="container-fluid py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- News Detail Start -->
                <div class="position-relative mb-3">
                    <?php
                    $img_arr = explode(',', $news_data['images'])
                    ?>
                    <img class="img-fluid w-100" src="admin/uploads/news/<?= $img_arr[0] ?>" style="object-fit: cover;">
                    <div class="pb-3">
                        <div class="bg-light py-2 px-4 mb-3">
                            <!-- <h3 class="m-0">Tags</h3> -->
                            <div class="d-flex flex-wrap m-n1">
                                <?php
                                $all_tags = explode(',', $news_data['tags']);
                                foreach ($all_tags as $tag_id) {
                                    $tag_sql = "select * from tags where id = $tag_id";
                                    $tag_result = mysqli_query($conn, $tag_sql);
                                    $tag_data = mysqli_fetch_array($tag_result);
                                    echo ' <a href="#" class="btn btn-sm btn-outline-secondary m-1">' . $tag_data['name'] . '</a>';
                                }
                                ?>
    
                            </div>
                        </div>
                    </div>
                    <div class="overlay position-relative bg-light">
                        <div class="mb-3">
                            <span><?= $news_data['author_name'] ?></span>
                            <span class="px-1">/</span>
                            <span> <?php $date = explode(" ", $news_data['updated_on']);
                                    echo $date[0];  ?> </span>
                        </div>
                        <div>
                            <h3 class="mb-3"><?= $news_data['title'] ?></h3>
                            <div><?php echo $news_data['content'] ?></div>
                        </div>
                    </div>
                </div>
                <!-- News Detail End -->

                <!-- Comment List Start -->
                <!-- <?php include 'inc/comment-list.php'; ?> -->
                <!-- Comment List End -->

                <!-- Comment Form Start -->
                <?php include 'inc/comment-form.php' ?>
                <!-- Comment Form End -->
            </div>

            <div class="col-lg-4 pt-3 pt-lg-0">
                <!-- Social Follow Start -->
                <?php include 'inc/social-follows.php'; ?>
                <!-- Social Follow End -->

                <!-- Newsletter Start -->
                <?php include 'inc/newsletter.php'; ?>
                <!-- Newsletter End -->

                <!-- Ads Start -->
                <div class="mb-3 pb-3">
                    <a href=""><img class="img-fluid" src="img/news-500x280-4.jpg" alt=""></a>
                </div>
                <!-- Ads End -->

                <!-- Popular News Start -->
                <?php include 'inc/popular-news.php'; ?>
                <!-- Popular News End -->

                <!-- Tags Start -->
                <?php include 'inc/tags.php'; ?>
                <!-- Tags End -->
            </div>
        </div>
    </div>
</div>
</div>
<!-- News With Sidebar End -->


<!-- Footer Start -->
<?php include 'inc/footer.php'; ?>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-dark back-to-top"><i class="fa fa-angle-up"></i></a>


<?php include 'inc/foot.php'; ?>