<?php
require './assets/navbar.php';
// Connect to database
$conn = mysqli_connect("localhost", "root", "", "tcc");

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get tracking number from URL parameter
$tracking_number = $_SESSION['tracking'];
// Retrieve tracking details from database
$query = "SELECT * FROM add_parcel WHERE track_id = '$tracking_number'";
$result = mysqli_query($conn, $query);

// Check if tracking number exists
if (mysqli_num_rows($result) > 0) {
  // Get tracking details
  $row = mysqli_fetch_assoc($result);
  $current_location = $row['current_location'];
  $delivery_status = $row['extra_services'];
  $estimated_delivery_date = $row['city_of_departure'];
} else {
  // Tracking number not found
  $error_message = "Tracking number not found";
}

// Close database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Tracking Details</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">

  <style>
    .tracking-details {
  width: 80%;
  margin: 40px auto;
  background-image: url(sam-balye-meRfje3AqMw-unsplash.jpg);
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  /* padding: 20px; */
  /* padding-left: 50px;
  padding-right: 50px; */
  border: 1px solid #ddd;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  
}

.tracking-details h2 {
  margin-top: 0;
  font-size: 45px;
  margin-bottom: 20px;
  border-bottom: 2px solid white;
}

.tracking-details p {
  margin-bottom: 20px;
  color: rgb(255, 90, 0);
  font-size: 20px;
}
h2{
    display: flex;
    justify-content: center;
    color: rgb(255, 90, 0);
}
#map {
  width: 100%;
  height: 300px;
  margin-top: 20px;
  
}
.track{
    display: flex;
    justify-content: end;
    /* color: rgb(255, 90, 0); */
    color: white;
    /* text-decoration: underline; */
}
.color{
    background-color: rgba(0, 0, 0, 0.790);
  padding: 20px;
  border: 1px solid #ddd;
  border-radius: 10px;
}
.class{
  padding-left: 40px;
  padding-right: 40px;
  font-size: 20px;
}
  </style>
</head>
<body>
    <form action="" method="get">
  <div class="tracking-details">
  <div class="color">
    <h2>Tracking Details</h2>
    <?php if (isset($error_message)) { ?>
      <p><?php echo $error_message; ?></p>
    <?php } else { ?>
      <div class="row class"><p class="col-6">Tracking Number: </p><span class="track col-6"><?php echo $tracking_number; ?></span></div>
      <div class="row class"><p class="col-6">Current Location: </p><span class="track col-6"><?php echo $current_location; ?></span></div>
      <div class="row class"><p class="col-6">Extra Services: </p><span class="track col-6"><?php echo $delivery_status; ?></span></div>
      <div class="row class"><p class="col-6">City of Departure: </p><span class="track col-6"><?php echo $estimated_delivery_date; ?></span></div>
    <?php } ?>
  </div>
  </div>
  </form>
  <div id="map"></div>
  <footer>
    <!--? Footer Start-->
    <div class="footer-area footer-bg">
        <div class="container">
            <div class="footer-top footer-padding">
                <!-- footer Heading -->
                <div class="footer-heading">
                    <div class="row justify-content-between">
                        <div class="col-xl-6 col-lg-8 col-md-8">
                            <div class="wantToWork-caption wantToWork-caption2">
                                <h2>We Understand The Importance Approaching Each Work!</h2>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4">
                            <span class="contact-number f-right">+ 1 212-683-9756</span>
                        </div>
                    </div>
                </div>
                <!-- Footer Menu -->
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>COMPANY</h4>
                                <ul>
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Company</a></li>
                                    <li><a href="#"> Press & Blog</a></li>
                                    <li><a href="#"> Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Open hour</h4>
                                <ul>
                                    <li><a href="#">Monday 11am-7pm</a></li>
                                    <li><a href="#"> Tuesday-Friday 11am-8pm</a></li>
                                    <li><a href="#"> Saturday 10am-6pm</a></li>
                                    <li><a href="#"> Sunday 11am-6pm</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>RESOURCES</h4>
                                <ul>
                                    <li><a href="#">Home Insurance</a></li>
                                    <li><a href="#">Travel Insurance</a></li>
                                    <li><a href="#"> Car Insurance</a></li>
                                    <li><a href="#"> Business Insurance</a></li>
                                    <li><a href="#"> Heal Insurance</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-5 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <!-- logo -->
                            <div class="footer-logo">
                                <a href="index.php"><img src="assets/img/logo/logo2_footer.png" alt=""></a>
                            </div>
                            <div class="footer-tittle">
                                <div class="footer-pera">
                                    <p class="info1">GThe trade war currently ensuing between te US anfd several natxions around thdhe globe, most fiercely with.</p>
                                </div>
                            </div>
                            <!-- Footer Social -->
                            <div class="footer-social ">
                                <a href="https://www.facebook.com/sai4ull"><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fas fa-globe"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

</footer>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAMeGcRDbO5vRXdgO9eTNTPzevjZD_tqYc&callback=initMap" async defer></script>
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_ACTUAL_API_KEY&callback=initMap" async defer></script> -->

  <script>
  function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 24.9989, lng: 67.0635}, // north karachi, karachi, pakistan
    zoom: 12
  });
  var marker = new google.maps.Marker({
    position: {lat: 24.9989, lng: 67.0635}, // north karachi, karachi, pakistan
    map: map
  });
}
  
  
//   if($current_location=='karachi'){
//         function initMap() {
//   var map = new google.maps.Map(document.getElementById('map'), {
//     center: {lat: 24.9989, lng: 67.0635}, // north karachi, karachi, pakistan
//     zoom: 12
//   });
//   var marker = new google.maps.Marker({
//     position: {lat: 24.9989, lng: 67.0635}, // north karachi, karachi, pakistan
//     map: map
//   });
// }
// }else if($current_location=='lahore'){
//   function initMap() {
//   var map = new google.maps.Map(document.getElementById('map'), {
//     center: {lat: 31.5497, lng: 74.3436}, // north karachi, karachi, pakistan
//     zoom: 12
//   });
//   var marker = new google.maps.Marker({
//     position: {lat: 31.5497, lng: 74.3436}, // north karachi, karachi, pakistan
//     map: map
//   });
// }
// }
// else if($current_location=='islamabad'){
//   function initMap() {
//   var map = new google.maps.Map(document.getElementById('map'), {
//     center: {lat: 33.6844, lng: 73.0479}, // north karachi, karachi, pakistan
//     zoom: 12
//   });
//   var marker = new google.maps.Marker({
//     position: {lat: 33.6844, lng: 73.0479}, // north karachi, karachi, pakistan
//     map: map
//   });
// }
// }else{
//   function initMap() {
//   var map = new google.maps.Map(document.getElementById('map'), {
//     center: {lat: 30.1798, lng: 66.9750}, // north karachi, karachi, pakistan
//     zoom: 12
//   });
//   var marker = new google.maps.Marker({
//     position: {lat: 30.1798, lng: 66.9750}, // north karachi, karachi, pakistan
//     map: map
//   });
// }
// }
  </script>
  <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="./assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/animated.headline.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script>

    <!-- Nice-select, sticky -->
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>
    
    <!-- contact js -->
    <script src="./assets/js/contact.js"></script>
    <script src="./assets/js/jquery.form.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/mail-script.js"></script>
    <script src="./assets/js/jquery.ajaxchimp.min.js"></script>
    
    <!-- Jquery Plugins, main Jquery -->	
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>
    
</body>
</html>