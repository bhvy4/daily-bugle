<?php
$trending_list_sql = "SELECT * FROM news INNER JOIN categories ON news.category = categories.id ORDER BY rand() LIMIT 5";
$news_list = mysqli_query($conn, $trending_list_sql);
?>

<div class="pb-3">
    <div class="bg-light py-2 px-4 mb-3">
        <h3 class="m-0">Trending</h3>
    </div>
    <?php while ($popular_news = mysqli_fetch_array($news_list)) { ?>
        <div class="d-flex mb-3">
            <?php 
            $imgs = explode(',',$popular_news['images']);
            
            ?>
            <img src="admin/uploads/news/<?=$imgs[0]?>" style="width: 100px; height: 100px; object-fit: cover;">
            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                <div class="mb-1" style="font-size: 13px;">
                    <a href="category.php?id=<?=$popular_news['category']?>"><?=$popular_news['name']?></a>
                    <span class="px-1">/</span>
                    <span><?php $date = explode(" ",$popular_news['updated_on']); echo $date[0];  ?></span>
                </div>
                <a class="h6 m-0" href=""><?= $popular_news['title']?></a>
            </div>
        </div>
    <?php }; ?>
    <!-- <div class="d-flex mb-3">
        <img src="img/news-100x100-2.jpg" style="width: 100px; height: 100px; object-fit: cover;">
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
    <div class="d-flex mb-3">
        <img src="img/news-100x100-5.jpg" style="width: 100px; height: 100px; object-fit: cover;">
        <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
            <div class="mb-1" style="font-size: 13px;">
                <a href="">Technology</a>
                <span class="px-1">/</span>
                <span>January 01, 2045</span>
            </div>
            <a class="h6 m-0" href="">Lorem ipsum dolor sit amet consec adipis elit</a>
        </div>
    </div> -->
</div>