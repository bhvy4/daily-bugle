<?php
include 'inc/head.php';
include '../config/db_connect.php';
include 'scripts/functions.php';
if (isset($_SESSION['admin']['user_name'])) {


   //deleting news//
   if (isset($_POST['delete-news'])) {
      $id = mysqli_real_escape_string($conn, $_POST['news-to-delete']);
      $delete_news_sql = "delete from news where n_id= '$id'";

      if (mysqli_query($conn, $delete_news_sql)) {
         header('location: view-news.php');
      } else {
         echo 'query error: ' . mysqli_errno($conn);
      }
   }


   /* updating news */
   if (isset($_POST['update-news'])) {
      $id = mysqli_real_escape_string($conn, $_POST['news-to-update']);
      $_SESSION['update-id'] = $id;
      header("location: update-news.php");
   }


   /* changing status */
   // if (isset($_POST['toggle-cat'])) {
   //    $id = mysqli_real_escape_string($conn, $_POST['cat-to-toggle']);
   //    if()
   //    $query = "update categories set status = ''"
   // }


   $email = base64_decode($_SESSION['admin']['user_name']);
   // $get_email = $_GET['email'];
   // $name = $about= $email = $phone = '';

   $query = "SELECT * from admin_table WHERE email = '$email'";
   $result = mysqli_query($conn, $query);
   $data = mysqli_fetch_array($result, MYSQLI_ASSOC);


   /* fetching news content */
   $all_news = array();
   $query = 'SELECT * from news';
   $result = mysqli_query($conn, $query);
   $all_news = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
   header("location: login.php");
}
?>

<body class="dashboard dashboard_2">
   <div class="full_container">
      <div class="inner_container">
         <!-- Sidebar  -->
         <?php include 'inc/sidebar.php'; ?>
         <!-- end sidebar -->
         <!-- right content -->
         <div id="content">
            <!-- topbar -->
            <?php include 'inc/topbar.php'; ?>
            <!-- end topbar -->
            <!-- dashboard inner -->
            <div class="midde_cont">
               <div class="container-fluid">
                  <div class="row column_title">
                     <div class="col-md-12">
                        <div class="page_title">
                           <h2>All News List</h2>
                        </div>
                     </div>
                  </div>
                  <!-- row -->


                  <div class="row column1">
                     <div class="col-md-12">
                        <div class="white_shd full margin_bottom_30">
                           <!-- <div class="full graph_head">
                              <div class="heading1 margin_0">
                                 <h2>Project <small>( Listing Design )</small></h2>
                              </div>
                           </div> -->
                           <div class="full price_table padding_infor_info">
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="table-responsive-sm">
                                       <table class="table table-striped projects" id="cat-table">
                                          <thead class="thead-dark">
                                             <tr>
                                                <th style="width: 2%">Id</th>
                                                <th>Title</th>
                                                <th>Images</th>
                                                <th>Category</th>
                                                <th>Subcategory</th>
                                                <th>Tags</th>
                                                <th>Created</th>
                                                <th>Updated</th>
                                                <th>Action</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <?php foreach ($all_news as $news) : ?>
                                                <tr>
                                                   <td><?php echo htmlspecialchars($news['n_id']); ?></td>
                                                   <td>
                                                      <a><?php echo htmlspecialchars($news['title']); ?></a>
                                                   </td>
                                                   <td>
                                                      <ul class="list-inline">
                                                         <li>
                                                            <?php
                                                            $images_arr = explode(',', $news['images']);
                                                            foreach ($images_arr as $img) {
                                                            ?>
                                                               <img width="40" src="<?php echo "uploads/news/" . $img; ?>" class="rounded-circle" alt="#">
                                                            <?php } ?>
                                                         </li>
                                                      </ul>
                                                   </td>
                                                   <td>
                                                      <?php
                                                      $id = $news['category'];
                                                      $sql = "select name from categories where id = '$id'";
                                                      $result = mysqli_query($conn, $sql);
                                                      // print_r($result);

                                                      while ($row = mysqli_fetch_array($result)) {
                                                         // print_r ($row) ;
                                                         echo $row['name'];
                                                      } ?>
                                                   </td>
                                                   <td>
                                                      <?php
                                                      $id = $news['subcategory'];
                                                      $sql = "select name from subcategory where id = '$id'";
                                                      $result = mysqli_query($conn, $sql);
                                                      // print_r($result);

                                                      while ($row = mysqli_fetch_array($result)) {
                                                         // print_r ($row) ;
                                                         echo $row['name'];
                                                      } ?>
                                                   </td>
                                                   <td>
                                                      <?php
                                                      $tags_id = explode(',', $news['tags']);
                                                      foreach ($tags_id as $tag_id) {
                                                         $sql = "select name from tags where id = '$tag_id'";
                                                         $result = mysqli_query($conn, $sql);
                                                         while ($row = mysqli_fetch_array($result)) {
                                                            echo $row['name'] . ',';
                                                         }
                                                      }
                                                      $result = mysqli_query($conn, $sql);
                                                      // print_r($result);

                                                      while ($row = mysqli_fetch_array($result)) {
                                                         // print_r ($row) ;
                                                         echo $row['name'];
                                                      } ?>
                                                   </td>
                                                   <td><?php echo htmlspecialchars($news['created_on']); ?></td>
                                                   <td><?php echo htmlspecialchars($news['updated_on']); ?></td>
                                                   <td>
                                                      <form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
                                                         <input type="hidden" name="news-to-delete" value="<?php echo $news['n_id']; ?>">
                                                         <input type="submit" name="delete-news" class="btn btn-danger" value="delete">
                                                      </form> <br>
                                                      <form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
                                                         <input type="hidden" name="news-to-update" value="<?php echo $news['n_id']; ?>">
                                                         <input type="submit" name="update-news" class="btn btn-danger" value="update">
                                                      </form>
                                                   </td>
                                                </tr>

                                             <?php endforeach; ?>

                                          </tbody>

                                       </table>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- end row -->

                  <!-- footer -->
                  <?php include "inc/footer.php" ?>
               </div>
               <!-- end dashboard inner -->
            </div>
         </div>
      </div>
      <!-- jQuery -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="js/animate.js"></script>
      <!-- select country -->
      <script src="js/bootstrap-select.js"></script>
      <!-- owl carousel -->
      <script src="js/owl.carousel.js"></script>
      <!-- chart js -->
      <script src="js/Chart.min.js"></script>
      <script src="js/Chart.bundle.min.js"></script>
      <script src="js/utils.js"></script>
      <script src="js/analyser.js"></script>
      <!-- nice scrollbar -->
      <script src="js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
      <script src="js/chart_custom_style2.js"></script>

      <!-- CDN jQuery Datatable -->
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
      <script>
         $(document).ready(() => {
            console.log("Initializing cat-table...");
            $('#cat-table').DataTable();
            console.log("Initializing subcat-table...");
            $('#subcat-table').DataTable();
         });
      </script>
</body>

</html>