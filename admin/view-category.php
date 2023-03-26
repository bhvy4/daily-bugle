<?php
include 'inc/head.php';
include '../config/db_connect.php';
include 'scripts/functions.php';
if (isset($_SESSION['admin']['user_name'])) {


   //deleting cat subcat

   if (isset($_POST['delete-cat'])) {
      $id = mysqli_real_escape_string($conn, $_POST['cat-to-delete']);
      $delete_cat_sql = "delete from categories where id= '$id'";
      $delete_sub_sql = "delete from subcategory where category_id= '$id'";

      if (mysqli_query($conn, $delete_cat_sql) && mysqli_query($conn, $delete_sub_sql)) {
         header('location: view-category.php');
      } else {
         echo 'query error: ' . mysqli_errno($conn);
      }
   }

   if (isset($_POST['delete-subcat'])) {
      $id = mysqli_real_escape_string($conn, $_POST['subcat-to-delete']);
      $delete_sub_sql = "delete from subcategory where id= '$id'";
      echo "$id";
      if (mysqli_query($conn, $delete_sub_sql)) {
         header('location: view-category.php');
      } else {
         echo 'query error: ' . mysqli_errno($conn);
      }
   }

   /* updating cat and subcat */

   if (isset($_POST['update-cat'])) {
      $id = mysqli_real_escape_string($conn, $_POST['cat-to-update']);
      $_SESSION['update-id'] = $id;
      header("location: update-category.php");
   }

   if (isset($_POST['update-subcat'])) {
      $id = mysqli_real_escape_string($conn, $_POST['subcat-to-update']);
      $_SESSION['update-id'] = $id;
      header("location: update-subcategory.php");
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
   // $sql2 = "select * from subcategory ";
   
   $result = mysqli_query($conn, $query);
   $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
   
   $categories = array();
   
   $sql = "select * from categories";
   $result2 = mysqli_query($conn, $sql);
   // $result3 = mysqli_query($conn, $sql2);

   if (mysqli_num_rows($result2) > 0) {
      $categories = mysqli_fetch_all($result2, MYSQLI_ASSOC);
      // print_r($categories);
   } else {
      echo " No results found";
   }

   // $subcategories = mysqli_fetch_all($result3, MYSQLI_ASSOC);

   // print_r($data);
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
                           <h2>All Main Category List</h2>
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
                                                <th style="width: 30%">Category Name</th>
                                                <th>Image</th>
                                                <th>Created</th>
                                                <th>Updated</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <?php foreach ($categories as $category) : ?>
                                                <tr>
                                                   <td><?php echo htmlspecialchars($category['id']); ?></td>
                                                   <td>
                                                      <a><?php echo htmlspecialchars($category['name']); ?></a>
                                                   </td>
                                                   <td>
                                                      <ul class="list-inline">
                                                         <li>
                                                            <img width="40" src="<?php echo "uploads/category/" . $category['image']; ?>" class="rounded-circle" alt="#">
                                                         </li>
                                                      </ul>
                                                   </td>
                                                   <td><?php echo htmlspecialchars($category['created_on']); ?></td>
                                                   <td><?php echo htmlspecialchars($category['updated_on']); ?></td>
                                                   <td>
                                                      <form method = 'post' action="toggle-status.php">
                                                         <button type="submit" name="<?php echo htmlspecialchars($category['id']) ?>" class="btn btn-success btn-xs"><?php echo htmlspecialchars($category['status']);  ?></button>
                                                      </form>
                                                   </td>
                                                   <td>
                                                      <form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
                                                         <input type="hidden" name="cat-to-delete" value="<?php echo $category['id']; ?>">
                                                         <input type="submit" name="delete-cat" class="btn btn-danger" value="delete">
                                                      </form> <br>
                                                      <form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
                                                         <input type="hidden" name="cat-to-toggle" value="<?php echo $category['id']; ?>">
                                                         <input type="submit" name="toggle-cat" class="btn btn-danger" value="change status">
                                                      </form> <br>
                                                      <form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
                                                         <input type="hidden" name="cat-to-update" value="<?php echo $category['id']; ?>">
                                                         <input type="submit" name="update-cat" class="btn btn-danger" value="update">
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
                     <!-- end row -->
                  </div>

                  <div class="row column_title">
                     <div class="col-md-12">
                        <div class="page_title">
                           <h2>All Sub Category List</h2>
                        </div>
                     </div>
                  </div>
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
                                       <table class="table table-striped projects" id="subcat-table">
                                          <thead class="thead-dark">
                                             <tr>
                                                <th style="width: 2%">Id</th>
                                                <th style="width: 30%">SubCategory Name</th>
                                                <th style="width: 30%">Parent Category Name</th>
                                                <th>Image</th>
                                                <th>Created</th>
                                                <th>Updated</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <tr>

                                                <?php // add_subcategory($category,$conn); 
                                                ?>
                                                <?php
                                                $query =  "select * from subcategory  ";
                                                $result = mysqli_query($conn, $query);
                                                $subcategories = array();
                                                if (mysqli_num_rows($result) > 0) {
                                                   $subcategories = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                                }
                                                foreach ($subcategories as $sub) { ?>
                                             <tr>
                                                <?php
                                                   $categories_id = $sub['category_id'];
                                                   // echo($sub['image']);die;
                                                   echo "<td>" . $sub['id'] . "</td>";
                                                   echo "<td>" . $sub['name'] . "</td>";

                                                   $sql6 = "select * from categories where id=$categories_id";
                                                   $categories_id = '';
                                                   $result56 = $conn->query($sql6);
                                                   // echo $result56;
                                                   // print_r($result56);
                                                   //exit; 
                                                   $rom12 = mysqli_fetch_array($result56);
                                                   echo "<td>" . $rom12['name'] . "</td>";
                                                   $result56 = 'null';

                                                   echo "<td><img width='40' src='uploads/subcategory/" . $sub['image'] . "' class='rounded-circle' alt='#'></td>";
                                                   echo "<td>" . $sub['created_on'] . "</td>";
                                                   echo "<td>" . $sub['updated_on'] . "</td>";
                                                   echo "<td> <button type='button' class='btn btn-success btn-xs'>" . $sub['status'] . "</button></td>"

                                                ?>
                                                <!-- <td>
                                                      <button type="button" class="btn btn-success btn-xs"><?php echo htmlspecialchars($sub['status']);  ?></button>
                                                   </td> -->
                                                <td>
                                                   <form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
                                                      <input type="hidden" name="subcat-to-delete" value="<?php echo $sub['id']; ?>">
                                                      <input type="submit" name="delete-subcat" class="btn btn-danger" value="delete">
                                                   </form><br>
                                                   <form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
                                                      <input type="hidden" name="sub-id-to-toggle" value="<?php echo $sub['id']; ?>">
                                                      <input type="submit" name="toggle-subcat" class="btn btn-danger" value="change status">
                                                   </form> <br>
                                                   <form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
                                                      <input type="hidden" name="subcat-to-update" value="<?php echo $sub['id']; ?>">
                                                      <input type="submit" name="update-subcat" class="btn btn-danger" value="update">
                                                   </form>
                                                </td>
                                             </tr> <?php } ?>

                                          </tbody>

                                       </table>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- end row -->
                  </div>
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