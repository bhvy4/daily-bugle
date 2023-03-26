<?php
$top_slider_news_sql = "SELECT * FROM news ORDER BY rand() LIMIT 4";
$top_slider_news = mysqli_query($conn, $top_slider_news_sql);
?>

<div class="container-fluid">
    <div class="row align-items-center bg-light px-lg-5">
        <div class="col-12 col-md-8">
            <div class="d-flex justify-content-between">
                <div class="bg-primary text-white text-center py-2" style="width: 100px;">Trending</div>
                <div class="owl-carousel owl-carousel-1 tranding-carousel position-relative d-inline-flex align-items-center ml-3" style="width: calc(100% - 100px); padding-left: 90px;">
                    <?php while ($row = mysqli_fetch_array($top_slider_news)) : ?>
                        <div class="text-truncate"><a class="text-secondary" href="single.php?id=<?=$row['n_id']?>"><?=$row['title']?></a></div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
        <div class="col-md-4 text-right d-none d-md-block">
            <?=date("l \, F j \, Y")?>
        </div>
    </div>
    <div class="row align-items-center py-2 px-lg-5">
        <div class="col-lg-4">
            <a href="" class="navbar-brand d-none d-lg-block">
                <h1 class="m-0 display-5 text-uppercase"><span class="text-primary">Daily</span>Bugle</h1>
            </a>
        </div>
        <div class="col-lg-8 text-center text-lg-right">
            <img class="img-fluid" src="img/ads-700x70.jpg" alt="">
        </div>
    </div>
</div>