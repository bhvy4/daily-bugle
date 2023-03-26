<?php include "inc/head.php" ?>
   <body class="inner_page invoice_page">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
           <?php include "inc/sidebar.php" ?>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <?php include "inc/topbar.php" ?>
               <!-- end topbar -->
               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Calendar</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row">
                        <!-- invoice section -->
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2><i class="fa fa-calendar" aria-hidden="true"></i> Calendar</h2>
                                 </div>
                              </div>
                              <div class="full padding_infor_info">
                                 <div class="invoice_inner">
                                    <div class="row">
                                       <div class="col-md-12">
                                          <div class="white_shd full margin_bottom_30">
                                             <div class="full graph_head">
                                                <div class="heading1 margin_0">
                                                   <h2>Calendar</h2>
                                                </div>
                                             </div>
                                             <div class="full progress_bar_inner">
                                                <div class="row">
                                                   <div class="col-md-12">
                                                      <div class="full">
                                                         <div class="ui calendar" id="example14"></div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
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