<?php include "inc/head.php" ?>
   <body class="inner_page map">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            <?php include"inc/sidebar.php" ?>
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
                              <h2>Chart</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row column1">
                        <div class="col-lg-6">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Line Chart</h2>
                                 </div>
                              </div>
                              <div class="map_section padding_infor_info">
                                 <canvas id="line_chart"></canvas>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Line Chart</h2>
                                 </div>
                              </div>
                              <div class="map_section padding_infor_info">
                                 <canvas id="bar_chart"></canvas>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Radar Chart</h2>
                                 </div>
                              </div>
                              <div class="map_section padding_infor_info">
                                 <canvas id="radar_chart"></canvas>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Pie Chart</h2>
                                 </div>
                              </div>
                              <div class="map_section padding_infor_info">
                                 <canvas id="pie_chart"></canvas>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- end row -->
                  </div>
                  <!-- footer -->
                 <?php include 'inc/footer.php'; ?>
               <!-- end dashboard inner -->
            </div>
         </div>
      </div>
      <!-- jQuery -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- chart js -->
      <script src="js/Chart.min.js"></script>
      <script src="js/Chart.bundle.min.js"></script>
      <script src="js/utils.js"></script>
      <script src="js/analyser.js"></script>
      <!-- wow animation -->
      <script src="js/animate.js"></script>
      <!-- select country -->
      <script src="js/bootstrap-select.js"></script>
      <!-- owl carousel -->
      <script src="js/owl.carousel.js"></script> 
      <!-- nice scrollbar -->
      <script src="js/perfect-scrollbar.min.js"></script>
      <!-- sidebar -->
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
   </body>
</html>