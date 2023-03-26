<?php
$slider_news_sql = "SELECT * FROM news ORDER BY rand() LIMIT 6";
$top_news = mysqli_query($conn, $slider_news_sql);

?>

<div class="container-fluid py-3">
    <div class="container">
        <div class="owl-carousel owl-carousel-2 carousel-item-3 position-relative">
            <?php while ($row = mysqli_fetch_array($top_news)) : ?>
                <div class="d-flex">
                    <img src="admin/uploads/news/<?=$row['images']?>" style="width: 80px; height: 80px; object-fit: cover;">
                    <div class="d-flex align-items-center bg-light px-3" style="height: 80px;">
                        <a class="text-secondary font-weight-semi-bold" href=""><?=$row['title']?></a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>