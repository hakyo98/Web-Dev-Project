<!DOCTYPE html>
<?php
session_start();

?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
		<script src="script.js"></script>
    </head>
    <body>
        <div class="bar black nav-bar center">
            <h2 class="container center content">-----</h2>
        </div>
        <!-- Band Description -->
        <section class="container text-center content" style="width:100%">
            <h2 class="wide">AGENT'S KITCHEN</h2>
            <p class=""><i>We love Food & Music</i></p>
        </section>
        <!-- Navigation -->
        <div class="nav-bar bar black center" id="sub-header">
           <nav class="">
                <a href="./index.php" class="nav-button bar-item">Home</a>
                <a href="./menu.php" class="nav-button bar-item">Menu</a>
                <a href="#order" class="nav-button bar-item">Checkout</a>
                <a href="./contact.php" class="nav-button bar-item">Contact Us</a>
				<a href="./login.php" class="nav-button bar-item">Login</a>
            </nav> 
        </div>
        <br>
        <section>

        <div class="a-container padding-64 red grayscale xlarge" id="about">
          <div class="content"><br>
			
			<h1>Please Enter Your Location to Calculate the Delivery Price</h1>
			<div id="location"></div>
			<script>
				var div  = document.getElementById("location");
				function getLocation() {
					if (navigator.geolocation) {
						navigator.geolocation.getCurrentPosition(showPosition, showError);
					} else {
						div.innerHTML = "The Browser Does not Support Geolocation";
					}
				}

				function showPosition(position) {
					div.innerHTML = "Latitude: " + position.coords.latitude + "<br>Longitude: " + position.coords.longitude;
					$_SESSION['lat']=position.coords.latitude;
					$_SESSION['lon']=position.coords.longitude; 
				}

				function showError(error) {
					if(error.PERMISSION_DENIED){
						div.innerHTML = "The User have denied the request for Geolocation.";
					}
				}
				getLocation();
			</script>
			
			<?php
			$total = $_GET['total']
			?>
			<a href='./payment.php?total=<?php echo $total;?>' center> 	CHECK OUT </a>
			

			
        </div>
        <br>
        <img class="mySlides" src="fp3.jpg" style="width:49%;">
        <img class="mySlides" src="fp5.jpg" style="width:49%; float: right;"><br>

    </section>
        <div class="footer">
            <div class="footer__menu">
              <div class="container">
                <div class="row">
                  <div class="col-12 col-lg-4 col-xl-5 col">
                    <div class="footer__absolute">
                      <p>Agent's Kitchen ©Copyright 2022 <a href="https://google.com" target="_blank" rel="noreferrer">Google.com</a></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </body>

</html>

