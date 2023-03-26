<?php include 'inc/head.php'; ?>
   <body class="inner_page general_elements">
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
                              <h2>General Elements</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row column4 graph">
                        <!-- tab style 1 -->
                        <?php include 'inc/tab-style-1.php'; ?>
                        <!-- tab style 2 -->
                        <?php include 'inc/tab-style-2.php'; ?>                        
                        <!-- tab style 3 -->
                        <?php include 'inc/tab-style-3.php'; ?>
                        <!-- tab style 4 -->
                        <?php include 'inc/tab-style-4.php'; ?>
                        <!-- Alerts -->
                        <?php include 'inc/alerts.php'; ?>
                        <!-- funcation section -->
                        <div class="col-md-6">
                           <!-- model popup -->  
                           <?php include 'inc/model-popup.php'; ?>
                           <!-- tootips --> 
                           <?php include 'inc/tooltips.php'; ?>
                           <!-- dropdown --> 
                           <?php include 'inc/dropdown.php'; ?>
                        </div>
                     </div>
                  </div>
                  <!-- footer -->
                  <?php include 'inc/footer.php'; ?>
               </div>
               <!-- end dashboard inner -->
            </div>
         </div>
         <!-- model popup -->
         <!-- The Modal -->
         <?php include 'inc/modal.php'; ?>
         <!-- end model popup -->
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
      <!-- calendar file css -->    
      <script src="js/semantic.min.js"></script>
   </body>
</html>