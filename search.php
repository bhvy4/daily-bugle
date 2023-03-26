<?php include 'inc/head.php'; ?>
<?php

if(isset($_GET['query'])){
    $search_txt = mysqli_real_escape_string($conn,$_GET['query']);
    if(strlen($search_txt>=3)){
        $category_news_sql = "SELECT * FROM news INNER JOIN categories ON news.category=categories.id WHERE (title LIKE '%$search_txt%') OR (author_name LIKE '%$search_txt%') OR (content LIKE '%$search_txt%') ";
        $slider_result = mysqli_query($conn, $category_news_sql);
        
    } else{
        echo "minimun length should be 3";
    }

}
?>
<!-- Topbar Start -->
<?php include 'inc/topbar.php'; ?>
<!-- Topbar End -->


<!-- Navbar Start -->
<?php include 'inc/navbar.php'; ?>
<!-- Navbar End -->


<!-- News With Sidebar Start -->
<div class="container-fluid py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">Search Results:</h3>
                        </div>
                    </div>
                    <?php while($row=mysqli_fetch_array($slider_result)) :?>
                    <div class="col-lg">
                        <div class="position-relative mb-3">
                            <!-- <img class="img-fluid w-100" src="img/news-500x280-2.jpg" style="object-fit: cover;"> -->
                            <div class="overlay position-relative bg-light">
                                <div class="mb-2" style="font-size: 14px;">
                                    <a href=""><?=$row['name']?></a>
                                    <span class="px-1">/</span>
                                    <span><?php $date = explode(' ',$row['updated_on']); echo $date[0];?></span>
                                </div>
                                <a class="h4" href=""><?= $row['title'] ?></a>
                              <?php /*  <p class="m-0"><?= substr(htmlspecialchars($row['content']),0,30) ; ?>...</p>*/?>
                            </div>
                        </div>
                        
                    </div>
                    <?php endwhile; ?>
                    <!-- <div class="col-lg-6">
                        <div class="position-relative mb-3">
                            <img class="img-fluid w-100" src="img/news-500x280-3.jpg" style="object-fit: cover;">
                            <div class="overlay position-relative bg-light">
                                <div class="mb-2" style="font-size: 14px;">
                                    <a href="">Technology</a>
                                    <span class="px-1">/</span>
                                    <span>January 01, 2045</span>
                                </div>
                                <a class="h4" href="">Est stet amet ipsum stet clita rebum duo</a>
                                <p class="m-0">Rebum dolore duo et vero ipsum clita, est ea sed duo diam ipsum, clita at justo, lorem amet vero eos sed sit...</p>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <img src="img/news-100x100-3.jpg" style="width: 100px; height: 100px; object-fit: cover;">
                            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                <div class="mb-1" style="font-size: 13px;">
                                    <a href="">Technology</a>
                                    <span class="px-1">/</span>
                                    <span>January 01, 2045</span>
                                </div>
                                <a class="h6 m-0" href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <img src="img/news-100x100-4.jpg" style="width: 100px; height: 100px; object-fit: cover;">
                            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                <div class="mb-1" style="font-size: 13px;">
                                    <a href="">Technology</a>
                                    <span class="px-1">/</span>
                                    <span>January 01, 2045</span>
                                </div>
                                <a class="h6 m-0" href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                            </div>
                        </div>
                    </div> -->
                </div>
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