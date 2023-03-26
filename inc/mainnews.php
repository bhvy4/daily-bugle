<?php
$sql = "SELECT news.n_id,categories.id,news.title,news.images,categories.name,news.updated_on FROM news INNER JOIN categories ON news.category=categories.id ORDER BY rand() LIMIT 6";
$news_data = mysqli_query($conn, $sql);

?>
<div class="container-fluid py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="owl-carousel owl-carousel-2 carousel-item-1 position-relative mb-3 mb-lg-0">
                    <?php while ($row = mysqli_fetch_array($news_data)) { ?>
                        <div class="position-relative overflow-hidden" style="height: 435px;">
                            <?php
                            $img_arr = explode(',', $row['images']);
                            $img = $img_arr[0];
                            ?>
                            <img class="img-fluid h-100" src="admin/uploads/news/<?= $img ?>" style="object-fit: cover;">
                            <div class="overlay">
                                <div class="mb-1">
                                    <a class="text-white" href="category.php?id=<?=$row['id']?>"><?= $row['name'] ?></a>
                                    <span class="px-2 text-white">/</span>
                                    <a class="text-white" href="#" disable><?php $time=explode(" ",$row['updated_on']);
                                     echo $time[0];?></a>
                                </div>
                                <a class="h2 m-0 text-white font-weight-bold" href="single.php?id=<?=$row['n_id']?>"><?php echo $row['title'] ?></a>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- <div class="position-relative overflow-hidden" style="height: 435px;">
                        <img class="img-fluid h-100" src="img/news-700x435-2.jpg" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-1">
                                <a class="text-white" href="">Technology</a>
                                <span class="px-2 text-white">/</span>
                                <a class="text-white" href="">January 01, 2045</a>
                            </div>
                            <a class="h2 m-0 text-white font-weight-bold" href="">Sanctus amet sed amet ipsum lorem. Dolores et erat et elitr sea sed</a>
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="col-lg-4">
                <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                    <h3 class="m-0">Categories</h3>
                    <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
                </div>
                <?php
                $sql = "select * from categories order by rand() limit 4 ";
                $result2 = mysqli_query($conn, $sql);
                foreach ($result2 as $category) :
                ?>
                    <div class="position-relative overflow-hidden mb-3" style="height: 80px;">
                        <img class="img-fluid w-100 h-100" src="<?php echo "admin/uploads/category/" . $category['image']; ?>" style="object-fit: cover;">
                        <a href="category.php?id=<?=$category['id']?>" class="overlay align-items-center justify-content-center h4 m-0 text-white text-decoration-none">
                            <?php echo htmlspecialchars($category['name']); ?>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>