<?php include 'inc/head.php'; ?>
   <body class="inner_page media_gallery">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            <?php include"inc/sidebar.php"; ?>
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
                              <h2>Media Gallery</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row column4 graph">
                        <!-- Gallery section -->
                        <?php include 'inc/gallery.php'; ?>
                     </div>
                     <!-- footer -->
                     <?php include 'inc/footer.php'; ?>
                  <!-- end dashboard inner -->
               </div>
            </div>
            <!-- model popup -->
            <!-- The Modal -->
            <?php include "inc/modal.php" ?>
            <!-- end model popup -->
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
      <!-- fancy box js -->
      <script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/jquery.fancybox.min.js"></script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
      <!-- calendar file css -->    
      <script src="js/semantic.min.js"></script>
   </body>
</html>