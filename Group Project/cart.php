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
                <a href="./cart.php" class="nav-button bar-item">Checkout</a>
                <a href="./contact.php" class="nav-button bar-item">Contact Us</a>
				<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {?>
				<!--Can Be used for profile -->
				<?php } else {?>
				<a href="./login.php" class="nav-button bar-item">Login</a> <?php } ?>
				
            </nav> 
        </div>
        <br>
        <!-- Slide Show -->
        <section>

		
        <div class="a-container padding-64 red grayscale xlarge" id="about">
          <div class="content"><br>
            <?php 
			if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){ ?>
			  <div class="row">
				<div class="columns3"><font style="color: white">Menu</font></div>
				<div class="columns3"><font style="color: white">Price</font></div>
				<div class="columns3"><font style="color: white">Amount</font></div>
				<?php
				if ( isset( $_SESSION[ 'v_id' ] ) == TRUE ) {
				  $uid = $_SESSION[ 'v_id' ];
				} else {
				  $uid = NULL;
				}

				$sql = "SELECT food.foodname,food.price, cart.amount,cart.fid FROM cart INNER JOIN food ON cart.fid=food.foodid WHERE cart.uid =".$uid.";";
				$total = 0;
				require_once('connect.php');
				$query = pg_query($conn,$sql);
				if(!$query){
					echo "An error occurred.";
					exit;
					}
				

				while ($row = pg_fetch_row($query)) {

					$foodname = $row[0];
					$price = $row[1];
					$amount = $row[2];
					$fid =$row[3];
					$total = $total + ($price*$amount);
					?>
					<div class="row">
						<div class="columns3"><font style="color: white"><?php echo $foodname ?></font></div>
						<div class="columns3"><font style="color: white"><?php echo $price ?></font></div>
						<div class="columns3"><font style="color: white"><?php echo $amount ?></font>
						<a href="editcart.php?action=3&fid=<?echo $fid ?>"><img class="trashimg" src='Delete.png'; style="width:5%;height:5%;"> </a>
						</div>
					</div>
					<?php


					}

					
					

				?>
			</div> 
			
			<div class="botcart"><font style="color:white" >Total : $<?php echo $total ?> </font></div>
			<a href='checkcart.php?total=<?php echo $total?>'><input type="button" center class="btn" value="CHECKOUT">
		  </div>
		  <?php } 
		  else{
			  ?>
			  <p center> You need to log in to order! </p>
		  <?php } ?>
		</div>
		
		
		</input>
		</a>
          </div>
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
                      <p>Agent's Kitchen ??Copyright 2022 <a href="https://google.com" target="_blank" rel="noreferrer">Google.com</a></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </body>

</html>

