<?php include 'inc/head.php'; ?>
<!-- Topbar Start -->
<?php include 'inc/topbar.php'; ?>
<!-- Topbar End -->


<!-- Navbar Start -->
<?php include 'inc/navbar.php'; ?>
<!-- Navbar End -->
<?php
$cat_name = '';
$cat_id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql_cat = "SELECT categories.name,categories.id FROM categories INNER JOIN subcategory ON categories.id=subcategory.category_id where categories.id='$id' or subcategory.id='$id' ORDER BY rand() LIMIT 1";
    //exit;
    $cat_data = mysqli_query($conn, $sql_cat);
    $cat_datas = mysqli_fetch_array($cat_data);
    $cat_name = $cat_datas['name'];
    $cat_id = $cat_datas['id'];

    $sql = "SELECT *,categories.name,categories.id  FROM news INNER JOIN categories ON news.category=categories.id where categories.id='$id' ORDER BY rand() LIMIT 4";

    //SELECT news.title,news.images,categories.name,news.updated_on FROM news INNER JOIN categories ON news.category=categories.id where categories.id='79' and news.created_on like '%16%' ORDER BY rand() LIMIT 6
    //exit;
    $news_data = mysqli_query($conn, $sql);
    //print_r(mysqli_fetch_array($news_data));exit;

    if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
        $page_no = $_GET['page_no'];
    } else {
        $page_no = 1;
    }

    $total_records_per_page = 6;

    $offset = ($page_no - 1) * $total_records_per_page;
    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;
    $adjacents = "2";

    $pagination_sql = "SELECT COUNT(*) AS total_records  FROM news INNER JOIN categories ON news.category=categories.id where categories.id='$id'";

    $result_count = mysqli_query($conn, $pagination_sql);
    // print_r($result_count);
    $total_records = mysqli_fetch_array($result_count);
    // print_r($total_records);
    $total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    $second_last = $total_no_of_pages - 1; // total pages minus 1

    $result = mysqli_query($conn, "SELECT *,categories.name,categories.id  FROM news INNER JOIN categories ON news.category=categories.id where categories.id='$id' ORDER BY rand() LIMIT $offset, $total_records_per_page");
}

?>

<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="container">
        <nav class="breadcrumb bg-transparent m-0 p-0">
            <a class="breadcrumb-item" href="#">Home</a>
            <a class="breadcrumb-item" href="category.php?id=<?php echo $cat_id; ?>">Category - <?php echo $cat_name; ?></a>
            <span class="breadcrumb-item active"><?php echo $cat_name; ?></span>
        </nav>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- News With Sidebar Start -->
<div class="container-fluid py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                            <h3 class="m-0"><?php echo $cat_name; ?></h3>
                            <!-- <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a> -->
                        </div>
                    </div>
                    <?php while ($news = mysqli_fetch_array($news_data)) { ?>
                        <div class="col-lg-6">
                            <div class="position-relative mb-3">
                                <?php
                                // print_r($news_data);
                                $img_arr = explode(',', $news['images'])
                                ?>
                                <img class="img-fluid w-100" src="admin/uploads/news/<?= $img_arr[0] ?>" style="object-fit: cover;">
                                <div class="overlay position-relative bg-light">
                                    <div class="mb-2" style="font-size: 14px;">
                                        <a href=""><?php echo $cat_name; ?></a>
                                        <span class="px-1">/</span>
                                        <span><?php $date = explode(" ", $news['updated_on']);
                                                echo $date[0];  ?></span>
                                    </div>
                                    <a class="h4" href="single.php?id=<?= $news['n_id']; ?>"><?= $news['title'] ?></a>
                                    <?php

                                    $str = strip_tags($news['content']);
                                    // echo strnlen($str);
                                    if (strlen($str) > 500) {
                                        $string_cut = substr($str, 500);
                                        $endpoint = strpos($string_cut, ' ');

                                        $str = $endpoint ? substr($string_cut, 0, $endpoint) : substr($string_cut, 0);
                                        $str .= "... <a href='single.php?id=" . $news['n_id'] . "'>Read More</a>";
                                    }

                                    ?>
                                    <p class="m-0"><?= $str ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <div class="mb-3">
                    <a href=""><img class="img-fluid w-100" src="img/ads-700x70.jpg" alt=""></a>
                </div>

                <div class="row">
                    <?php while ($row = mysqli_fetch_array($result)) { ?>
                        <div class="col-lg-6">
                            <div class="d-flex mb-3">
                                <?php
                                $img_arr = explode(',', $row['images'])
                                ?>
                                <img src="admin/uploads/news/<?= $img_arr[0] ?>" style="width: 100px; height: 100px; object-fit: cover;">
                                <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                    <div class="mb-1" style="font-size: 13px;">
                                        <a href=""><?= $row['name'] ?></a>
                                        <span class="px-1">/</span>
                                        <span><?php $date = explode(" ", $row['updated_on']);
                                                echo $date[0];  ?></span>
                                    </div>
                                    <a class="h6 m-0" href="single.php?id=<?= $row['n_id'] ?>"><?= $row['title'] ?></a>
                                </div>
                            </div>
                        </div>
                    <?php }; ?>

                </div>
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="Page navigation">
                            <div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
                                <strong>Page <?php echo $page_no . " of " . $total_no_of_pages; ?></strong>
                            </div>
                            <!-- <ul class="pagination justify-content-center">
                                <?php if ($page_no > 1) {
                                    echo "<li><a href='?id=$cat_id&page_no=1'>First Page<a/><li>";
                                }
                                ?>
                                <li <?php if ($page_no <= 1) {
                                        echo "class=disabled";
                                    } ?>>
                                    <a <?php if ($page_no > 1) {
                                            echo "href='?id=$cat_id&page_no=$previous_page'";
                                        } ?>>Previous Page</a>
                                </li>
                                <li <?php if ($page_no >= $total_no_of_pages) {
                                        echo "class=disabled";
                                    } ?>>
                                    <a <?php if ($page_no < $total_no_of_pages) {
                                            echo "href='?id=$cat_id&page_no=$next_page'";
                                        } ?>>Next Page</a>
                                </li>
                                <?php
                                if ($page_no < $total_no_of_pages) {
                                    echo "<li><a href='?id=$cat_id&page_no=$total_no_of_pages'>Last Page &rsaquo;&rsaquo;<a/><li>";
                                }
                                ?>
                            </ul> -->

                            <ul class="pagination justify-content-center">

                                <li <?php if ($page_no <= 1) {
                                        echo "class= page-link disabled";
                                    } ?>>
                                    <a <?php if ($page_no > 1) {
                                            echo "class= 'page-link' href='?id=$cat_id&page_no=$previous_page'";
                                        } ?>>&lsaquo;</a>
                                </li>
                                <?php
                                if ($total_no_of_pages <= 10) {
                                    for ($counter = 1; $counter <= $total_no_of_pages; $counter++) {
                                        if ($counter == $page_no) {
                                            echo "<li class='page-item active'><a class ='page-link'>$counter</a></li>";
                                        } else {
                                            echo "<li class= 'page-item'><a class ='page-link' href='?id=$cat_id&page_no=$counter'>$counter</a></li>";
                                        }
                                    }
                                }
                                ?>
                                <li <?php if ($page_no >= $total_no_of_pages) {
                                        echo "class= page-link disabled";
                                    } ?>>
                                    <a <?php if ($page_no < $total_no_of_pages) {
                                            echo "class = 'page-link' href='?id=$cat_id&page_no=$next_page'";
                                        } ?>>&rsaquo;</a>
                                </li>
                                <?php
                                if ($page_no < $total_no_of_pages) {
                                    echo "<li><a class='page-link'href='?id=$cat_id&page_no=$total_no_of_pages'>Last Page &rsaquo;&rsaquo;<a/><li>";
                                }
                                ?>
                            </ul>
                        </nav>

                    </div>
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


<!-- JavaScript Libraries -->
<?php include 'inc/foot.php'; ?>