<?php

//getting all categories//
$sql = "select * from categories";
$categories = mysqli_query($conn, $sql);
//$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<div class="container-fluid p-0 mb-3">
    <nav class="navbar navbar-expand-lg bg-light navbar-light py-2 py-lg-0 px-lg-5">
        <a href="" class="navbar-brand d-block d-lg-none">
            <h1 class="m-0 display-5 text-uppercase"><span class="text-primary">News</span>Room</h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
            <ul class="navbar-nav mr-auto py-0">
                <li>
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                </li>
                <!-- <a href="category" class="nav-item nav-link"></a> --->
                <!-- <li>
                    <a href="single.php" class="nav-item nav-link">Single News</a>
                </li> -->
                <li class="nav-item dropdown">
                    <a href="category.php" class="nav-link dropdown-toggle" data-toggle="dropdown">Categories</a>
                    <ul class="dropdown-menu rounded-0 m-0">
                        <?php while ($row = mysqli_fetch_array($categories)) { ?>
                            <li class=" dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="category.php?id=<?= $row['id']; ?>"><?php echo $row['name']; ?></a>
                                <?php
                                $id = $row['id'];
                                $sql2 = "SELECT * FROM subcategory WHERE category_id = '$id'";
                                $subcategories = mysqli_query($conn, $sql2);
                                // print_r($subcategories);
                                ?>
                                <ul class="dropdown-menu ">
                                    <?php while ($row2 = mysqli_fetch_array($subcategories)) { ?>
                                        <li><a href="subcategory.php?id=<?= $row2['id']; ?>" class="dropdown-item"><?php echo $row2['name']; ?></a></li>
                                    <?php }; ?>
                                </ul>
                            </li>
                        <?php }; ?>
                    </ul>
                </li>
                <li><a href="contact.php" class="nav-item nav-link">Contact</a></li>
                <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown"> Categories </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="http://google.com">Google</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Submenu</a></li>
                            <li><a class="dropdown-item" href="#">Submenu0</a></li>
                            <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Submenu 1</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Subsubmenu1</a></li>
                                    <li><a class="dropdown-item" href="#">Subsubmenu1</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Submenu 2</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Subsubmenu2</a></li>
                                    <li><a class="dropdown-item" href="#">Subsubmenu2</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>  --->
            </ul>
            <form action="search.php" method="GET">
            <div class="input-group ml-auto" style="width: 100%; max-width: 300px;">
                    <input name ='query' type="text" class="form-control" placeholder="Keyword">
                    <div class="input-group-append">
                        <button  type="submit" class="input-group-text text-secondary"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </nav>
</div>