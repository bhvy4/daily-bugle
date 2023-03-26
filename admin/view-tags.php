<?php
include 'inc/head.php';
include '../config/db_connect.php';
if (isset($_SESSION['admin']['user_name'])) {

   $email = base64_decode($_SESSION['admin']['user_name']);
   // $get_email = $_GET['email'];
   // $name = $about= $email = $phone = '';

   $query = "SELECT * from admin_table WHERE email = '$email'";

   $result = mysqli_query($conn, $query);

   $data = mysqli_fetch_array($result, MYSQLI_ASSOC);

   $sql = "select * from tags";
   $result2 = mysqli_query($conn, $sql);
   $tags = array();
   if (mysqli_num_rows($result2) > 0) {
      $tags = mysqli_fetch_all($result2, MYSQLI_ASSOC);
   } else {
      echo " No results found";
   }

   /* deleting tags */
   if(isset($_POST['delete-tag'])){
      $id = mysqli_real_escape_string($conn,$_POST['tag-to-delete']) ;
      $query = "delete from tags where id='$id'";
      $result = mysqli_query($conn,$query);
      if($result){
         header("location: view-tags.php");
      } else{
         echo mysqli_error($conn);
      }
   }
   /*updating tags */
   if(isset($_POST['update-tag'])){
      $id = mysqli_real_escape_string($conn,$_POST['tag-to-update']);
      $_SESSION['tag-id'] = $id;
      header('location: update-tags.php');
   }

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
                           <h2>Tags List</h2>
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
                                       <table class="table table-striped projects">
                                          <thead class="thead-dark">
                                             <tr>
                                                <th style="width: 2%">Id</th>
                                                <th style="width: 30%">Tag Names</th>
                                                <th>Created</th>
                                                <th>Updated</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                             </tr>
                                          </thead>
                                          <?php foreach ($tags as $tag) : ?>
                                             <tbody>
                                                <tr>
                                                   <td><?php echo htmlspecialchars($tag['id']); ?></td>
                                                   <td>
                                                      <a><?php echo htmlspecialchars($tag['name']); ?></a>
                                                   </td>
                                                   <td>
                                                      <?php echo htmlspecialchars($tag['created_on']); ?>
                                                   </td>
                                                   <td><?php echo htmlspecialchars($tag['updated_on']); ?></td>
                                                   <td>
                                                      <button type="button" class="btn btn-success btn-xs"><?php echo htmlspecialchars($tag['status']);  ?></button>
                                                   </td>
                                                   <td>
                                                      <form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
                                                         <input type="hidden" name="tag-to-delete" value="<?php echo $tag['id']; ?>">
                                                         <input type="submit" name="delete-tag" class="btn btn-danger" value="delete">
                                                      </form> <br>
                                                      <form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
                                                         <input type="hidden" name="tag-to-update" value="<?php echo $tag['id']; ?>">
                                                         <input type="submit" name="update-tag" class="btn btn-danger" value="update">
                                                      </form>
                                                   </td>
                                                </tr>
                                             </tbody>
                                          <?php endforeach; ?>
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
            $('.table').DataTable();
         });
      </script>
</body>

</html>