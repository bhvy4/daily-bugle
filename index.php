<?php include 'inc/head.php'; ?>
<?php
$category_news_sql = "SELECT * FROM categories";
$slider_result = mysqli_query($conn, $category_news_sql);
?>
<!-- Topbar Start -->
<?php include 'inc/topbar.php'; ?>
<!-- Topbar End -->


<!-- Navbar Start -->
<?php include 'inc/navbar.php'; ?>
<!-- Navbar End -->


<!-- Top News Slider Start -->
<?php include 'inc/topnews.php'; ?>
<!-- Top News Slider End -->


<!-- Main News Slider Start -->
<?php include 'inc/mainnews.php'; ?>
<!-- Main News Slider End -->


<!-- Featured News Slider Start -->
<?php include 'inc/featured-news.php'; ?>
<!-- Featured News Slider End -->


<!-- Category News Slider Start -->
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <?php while ($cat_row = mysqli_fetch_array($slider_result)) : ?>
                <div class="col-lg-6 py-3">
                    <div class="bg-light py-2 px-4 mb-3">
                        <h3 class="m-0"><?= $cat_row['name'] ?></h3>
                    </div>
                    <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                        <?php
                        $id = $cat_row['id'];
                        $catnews_slider_sql = "SELECT * from news WHERE category='$id' ORDER BY rand() LIMIT 4";
                        $slider_content_result = mysqli_query($conn, $catnews_slider_sql);
                        while ($news_slider_row = mysqli_fetch_array($slider_content_result)) :
                        ?>
                            <div class="position-relative">
                                <img class="img-fluid w-100" src="admin/uploads/news/<?=$news_slider_row['images']?>" style="object-fit: cover;">
                                <div class="overlay position-relative bg-light">
                                    <div class="mb-2" style="font-size: 13px;">
                                        <a href=""><?= $cat_row['name'] ?></a>
                                        <span class="px-1">/</span>
                                        <span><?php $date_arr = explode(' ',$news_slider_row['updated_on']); echo $date_arr[0]; ?></span>
                                    </div>
                                    <a class="h4 m-0" href="single.php?id=<?=$news_slider_row['n_id']?>"><?= $news_slider_row['title'] ?></a>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        
                    </div>
                </div>
            <?php endwhile; ?>
            
        </div>
    </div>
</div>
</div>
<!-- Category News Slider End -->


<!-- Category News Slider Start -->
<div class="container-fluid">
    <div class="container">
        <div class="row">
        </div>
    </div>
</div>
</div>
<!-- Category News Slider End -->


<!-- News With Sidebar Start -->
<div class="container-fluid py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- popular news slider -->
                <?php include 'inc/popular-news-slider.php' ?>

                <div class="mb-3 pb-3">
                    <a href=""><img class="img-fluid w-100" src="img/ads-700x70.jpg" alt=""></a>
                </div>
                <!-- latest news slider -->
                <?php include 'inc/latest-news-slider.php' ?>
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