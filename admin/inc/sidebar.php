<?php
require("../config/db_connect.php");



?>

<!-- Sidebar  -->
<nav id="sidebar">
   <div class="sidebar_blog_1">
      <div class="sidebar-header">
         <div class="logo_section">
            <a href="<?php echo $backend_url; ?>"><img class="logo_icon img-responsive" src="images/logo/logo_icon.png" alt="#" /></a>
         </div>
      </div>
      <div class="sidebar_user_info">
         <div class="icon_setting"></div>
         <div class="user_profle_side">
            <div class="user_img"><img class="img-responsive" src=<?php echo "./uploads/" . $data['image'] ?> alt="#" /></div>
            <div class="user_info">
               <h6><?php echo htmlspecialchars($data['name']) ?></h6>
               <p><span class="online_animation"></span> Online</p>
            </div>
         </div>
      </div>
   </div>
   <div class="sidebar_blog_2">
      <h4>General</h4>
      <ul class="list-unstyled components">
         <!-- <li class="active">
            <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a>
            <ul class="collapse list-unstyled" id="dashboard">
               <li>
                  <a href="dashboard.php">> <span>Default Dashboard</span></a>
               </li>
               <li>
                  <a href="dashboard_2.php">> <span>Dashboard style 2</span></a>
               </li>
            </ul>
         </li> -->
         <li> <a href="dashboard.php"> <i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a></li>
         <li class="active">
            <a href="#cat" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-dashboard yellow_color"></i> <span>Category</span></a>
            <ul class="collapse list-unstyled" id="cat">
               <li>
                  <a href="add-category.php">> <span>Add</span></a>
               </li>
               <li>
                  <a href="add-subcategory.php">> <span>Add Subcategory</span></a>
               </li>
               <li>
                  <a href="view-category.php">> <span>View</span></a>
               </li>
            </ul>
         </li>
         <li class="active">
            <a href="#tag" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-dashboard yellow_color"></i> <span>Tags</span></a>
            <ul class="collapse list-unstyled" id="tag">
               <li>
                  <a href="add-tags.php">> <span>Add</span></a>
               </li>
               <li>
                  <a href="view-tags.php">> <span>View</span></a>
               </li>
            </ul>
         </li>
         <li class="active">
            <a href="#news" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-dashboard yellow_color"></i> <span>News</span></a>
            <ul class="collapse list-unstyled" id="news">
               <li>
                  <a href="add-news.php">> <span>Add</span></a>
               </li>
               <li>
                  <a href="view-news.php">> <span>View</span></a>
               </li>
               <li>
                  <a href="update-news.php">> <span>Update</span></a>
               </li>
            </ul>
         </li>
         <?php /*
         <li><a href="widgets.php"><i class="fa fa-clock-o orange_color"></i> <span>Widgets</span></a></li>
         <li>
            <a href="#element" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-diamond purple_color"></i> <span>Elements</span></a>
            <ul class="collapse list-unstyled" id="element">
               <li><a href="general_elements.php">> <span>General Elements</span></a></li>
               <li><a href="media_gallery.php">> <span>Media Gallery</span></a></li>
               <li><a href="icons.php">> <span>Icons</span></a></li>
               <li><a href="invoice.php">> <span>Invoice</span></a></li>
            </ul>
         </li>
         <li><a href="tables.php"><i class="fa fa-table purple_color2"></i> <span>Tables</span></a></li>
         <li>
            <a href="#apps" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-object-group blue2_color"></i> <span>Apps</span></a>
            <ul class="collapse list-unstyled" id="apps">
               <li><a href="email.php">> <span>Email</span></a></li>
               <li><a href="calendar.php">> <span>Calendar</span></a></li>
               <li><a href="media_gallery.php">> <span>Media Gallery</span></a></li>
            </ul>
         </li>
         <li><a href="price.php"><i class="fa fa-briefcase blue1_color"></i> <span>Pricing Tables</span></a></li>
         <li>
            <a href="contact.php">
               <i class="fa fa-paper-plane red_color"></i> <span>Contact</span></a>
         </li>
         <li class="active">
            <a href="#additional_page" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-clone yellow_color"></i> <span>Additional Pages</span></a>
            <ul class="collapse list-unstyled" id="additional_page">
               <li>
                  <a href="profile.php">> <span>Profile</span></a>
               </li>
               <li>
                  <a href="project.php">> <span>Projects</span></a>
               </li>
               <li>
                  <a href="login.php">> <span>Login</span></a>
               </li>
               <li>
                  <a href="404_error.php">> <span>404 Error</span></a>
               </li>
            </ul>
         </li>
         <li><a href="map.php"><i class="fa fa-map purple_color2"></i> <span>Map</span></a></li>
         <li><a href="charts.php"><i class="fa fa-bar-chart-o green_color"></i> <span>Charts</span></a></li>
         <li><a href="settings.php"><i class="fa fa-cog yellow_color"></i> <span>Settings</span></a></li>

         */?>
      </ul>
   </div>
</nav>
<!-- end sidebar -->