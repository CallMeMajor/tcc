<?php
session_start()
?>


<style>
    .main{
        padding-right: 130px;
    }
</style>
<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header ">
            <div class="header-bottom  header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo">
                                <a href="index.php"><img src="assets/img/logo/logo.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10">
                            <div class="menu-wrapper  d-flex align-items-center justify-content-end">
                                <!-- Main-menu -->
                                <div class="main-menu d-none d-lg-block">
                                    <nav class="main"> 
                                        <ul id="navigation">                                                                                          
                                            <li><a href="index.php">Home</a></li>
                                            <li><a href="about.php">About</a></li>
                                            <li><a href="contact.php">Contact</a></li>
                                            <?php
                                            if(isset($_SESSION['status'])){
                                                if($_SESSION['status']=='user'){
                                            ?>
                                            <li><a href="services.php">Services</a></li>
                                            <li><a href="blog.php">Blog</a>
                                                <ul class="submenu">
                                                    <li><a href="blog.php">Blog</a></li>
                                                    <li><a href="blog_details.php">Blog Details</a></li>
                                                </ul>
                                            </li>
                                            <?php    
    }
}
?>  
                                            <?php
                                            if(isset($_SESSION['status'])){
                                                if($_SESSION['status']=='agent'){
                                            ?>
                                            <li><a href="add.php">Add Parcel</a></li>
                                            <?php    
                                             }}
                                            ?>  

<?php
if(isset($_SESSION['status'])){
    if($_SESSION['status']=='admin'){

?>
                                            <li><a href="createagent.php">Create Agent</a></li>
                                            <li><a href="./userdashboard/index.php">dashboard</a></li>
<?php    
    }
}
?>    
                                
                                        </ul>
                                      
                                    </nav>
                                </div>
                                <!-- Header-btn -->
                                <?php 
          if(isset($_SESSION['status'])) {
          ?>
                             
                             <div class="header-right-btn d-none d-lg-block ml-20">
                                    <a href="logout.php" class="btn header-btn">Logout</a>
                                </div>
          <?php }else{
            ?>                  
                             
             <div class="header-right-btn d-none d-lg-block ml-20">
                                    <a href="login.php" class="btn header-btn">Login / Register</a>
                                </div>
                   <?php } ?>             
                            </div>
                        </div> 
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div
   