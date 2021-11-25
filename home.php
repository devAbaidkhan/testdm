<?php
// $source = isset($_GET['source'])?$_GET['source']:'web';
$source = isset($_SESSION['source'])&&$_SESSION['source']=='web'?$_SESSION['source']:'mobile';
$LoginStatus = isset($_SESSION['LoginStatus'])?'LoggedIn':'NotLoggedIn';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>


</style>
	<!-- include cssfiles -->
	<?php include 'includes/meta-tags.php'; ?>

	<!-- include cssfiles -->
	<?php include 'includes/csslinks.php'; ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script>
		function getLocation() {
			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(savePosition, positionError, {
					timeout: 10000
				});
			} else {
				//Geolocation is not supported by this browser
			}
		}

		// handle the error here
		function positionError(error) {
			var errorCode = error.code;
			var message = error.message;
			console.log(message);
			//  alert(message);
		}

		function savePosition(position) {
			//  console.log(position);
			$.post("backend/latlng_session.php", {
				lat: position.coords.latitude,
				lng: position.coords.longitude
			});
		}
	</script>

</head>

<body class="margin0" id="body">

	<!-- include header -->
	<?php include 'includes/header-index.php'; ?>





	<!-- hero section  -->
	<div class="container-fluid vertical-align">
		<div class="row">
			<div class="col-12">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<p class="hero-section-heading index-fnt">Welcome, <span class="index-fnt-1"><span class="index-fnt-2"><?=$LoginStatus=='LoggedIn'?$_SESSION['user']['name']:'Login Now'?></span> to enjoy the app</span></p>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="Main-search-hme">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a href="<?=BASE_URL?>search">
                        <div class="text-white mt-4">
                            <div class="input-group rounded shadow-search overflow-hidden">
                                <div class="input-group-prepend">
                                    <button class="border-0 btn btn-outline-secondary text-dark bg-white btn-block"><i class="fa fa-search"></i></button>
                                </div>
                                
                                <button class="shadow-none border-0 form-control">Let's find the best deals for you</button>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    

	<!--<div class="container-fluid hero-search-img vertical-align mobile-none">-->
	<!--	<div class="row">-->
	<!--		<div class="col-12">-->
	<!--			<div class="container">-->
	<!--				<div class="row">-->
	<!--					<div class="col-12">-->
	<!--						<p class="hero-section-heading">Get More!</p>-->

	<!--						<form class="d-inline-block bg-white p-3 light-box-shadow">-->
	<!--							<input type="text" name="" size="50" style="height: 60px;"-->
	<!--								placeholder="Enter your full address" class="p-2 input-search-filed border-1">-->
	<!--							<i class="fas fa-user" style="margin-left: -35px;font-size: 20px;"></i>&nbsp;&nbsp;-->

	<!--							<input type="button" name="" class="btn btn-outline-primary custom-button-style ml-3"-->
	<!--								value="Delivery me">&nbsp;&nbsp; OR &nbsp;&nbsp;-->
	<!--							<input type="button" name="" class="btn btn-outline-primary custom-button-style"-->
	<!--								value="I'll Pick it">-->
	<!--						</form>-->

	<!--					</div>-->
	<!--				</div>-->
	<!--			</div>-->
	<!--		</div>-->
	<!--	</div>-->
	<!--</div>-->

	<!-- three column section -->
	<div class="container py-5 mobile-none">
		<div class="row">
			<div class="col-md-4 gallery-lazyload-img">
				<a href="<?=BASE_URL?>restaurants"> <img class="lazyload-image" data-src="img/categories/cat1.png"
						class="img-fluid"></a>
			</div>
			<div class="col-md-4 gallery-lazyload-img">
				<a href="#popup2"> <img class="lazyload-image" data-src="img/categories/cat2.png" class="img-fluid"></a>
			</div>
			<div class="col-md-4 gallery-lazyload-img">
				<a href="#popup1"> <img class="lazyload-image" data-src="img/categories/cat3.png" class="img-fluid"></a>
			</div>
		</div>
	</div>
	
	<div id="popup1" class="overlayop">
      <div class="popupop">
        <h2>Dedo</h2>
        <a class="closeop" href="#">&times;</a>
        <div class="contentop">
          This feature is coming soon.
        </div>
      </div>
    </div>
    
    <div id="popup2" class="overlayop">
      <div class="popupop">
        <h2>Dedo</h2>
        <a class="closeop" href="#">&times;</a>
        <div class="contentop">
          This feature is coming soon.
        </div>
      </div>
    </div>
    
    <div id="popup3" class="overlayop">
      <div class="popupop">
        <h2>Dedo</h2>
        <a class="closeop" href="#">&times;</a>
        <div class="contentop">
          This feature is coming soon.
        </div>
      </div>
    </div>
    
    <div id="popup4" class="overlayop">
      <div class="popupop">
        <h2>Dedo</h2>
        <a class="closeop" href="#">&times;</a>
        <div class="contentop">
          This feature is coming soon.
        </div>
      </div>
    </div>

	<!-- app section -->

	<div class="container-fluid bg-primary bg-pink mobile-none">
		<div class="container">
			<div class="row  pt-5">
				<div class="col-md-6">
					<h6 class="text-white">Amazing deals for you</h6>
					<p class="text-white">It's all at your fingertips -- the food you love. Find the right deal to suit
						your mood, and make the first bite last. Join the club.</p>
					<p class="pt-5">
						<a href="#"><img src="img/android-gallery.png" width="150px" class="img-fluid"></a>
						<a href="#"><img src="img/apple-gallery.png" width="150px" class="img-fluid"></a>
					</p>
				</div>
				<div class="col-md-6 bg-img-app text-center">
					<img src="img/app.png" class="img-fluid custom-app-img">
				</div>
			</div>
		</div>
	</div>





	<!--<div class="container-fluid hero-search-img vertical-align large-none">-->
	<!--	<div class="row">-->
	<!--		<div class="col-12">-->
	<!--			<div class="container">-->
	<!--				<div class="row">-->
	<!--					<div class="col-12">-->
	<!--						<p class="hero-section-heading">Get more!</b></b> </p>-->
	<!--						<form>-->
	<!--							<div class="input-container">-->
	<!--								<input type="text" name="" style="height: 60px;margin-top: 5px;margin-bottom: 10px;"-->
	<!--									placeholder="Enter your full address" class="p-2 w-100 border-1">-->
									<!--<i class="fas fa-user"  style="margin-left: -35px;font-size: 20px;"></i><br>-->
	<!--							</div>-->

	<!--							<p class="text-center py-2 ">-->
									<!-- mobile-margin-top-20 -->
	<!--								<input type="button" name=""-->
	<!--									class="btn btn-outline-primary custom-button-style1 mx-1"-->
	<!--									value="Deliver me"><input type="button" name=""-->
	<!--									class="btn btn-outline-primary custom-button-style1 mx-1" value="I'll pick it">-->
	<!--							</p>-->
	<!--						</form>-->
	<!--					</div>-->
	<!--				</div>-->
	<!--			</div>-->
	<!--		</div>-->
	<!--	</div>-->
	<!--</div>-->


	<div class="container py-5 large-none mobile-div-menu">
		<div class="row">
			<div class="col-12">
			    <div>
				<a href="<?=BASE_URL?>restaurants"><img src="img/categories/cat1-mb.png" width="350px" class="img-fluid"></a>
				</div>
			</div>
		</div>
		<div class="row py-3 mobile-margin-bottom-40">
			<div class="col-6">
			    
				<a href="#popup3"><img src="img/categories/cat2.png" width="250px" class="img-fluid"></a>
				
			</div>
			<div class="col-6">
			    <a href="#popup4"><img src="img/categories/cat3.png" width="250px" class="img-fluid"></a>
				
			</div>
		</div>
	</div>

	<?php
 if ($_SESSION['source']!='mobile') {
     include_once 'includes/footer.php';
 }
?>


	<?php include_once 'includes/side-menu.php';?>

	<?php include_once 'includes/jslinks.php';?>

	<script>
		$(document).ready(function() {
			getLocation();
		});
	</script>


	<script>
	var source="<?=$source?>";
	var LoginStatus="<?=$LoginStatus?>";
	console.log(source);
	
        
	if(source=='web' && LoginStatus=='LoggedIn'){
		messaging
        .requestPermission()
        .then(function () {
            return messaging.getToken({
                vapidKey: 'BElaslGmmOMctUgh05FA4zQ0Jqd8Cu6o4cQOrTkfoWsEe9XRLN1HhqwJ1yMEc1v8lcJAWhrCR2BCMWHB1XQI0-M'
            })
           
        })
        .then(function (token) {
           
            save_fcm(token);
            
        }).catch(function (err) {
            console.log(err);
        });
		
	}
	
	function save_fcm(fcm_token){
	    console.log(fcm_token);
	    $.ajax({
            type: "post",
            url: "backend/save_fcm_token.php",
            data: {
                fcm_token: fcm_token
            },
            success: function (data) {

            }
        });
	}
	</script>
	
	<script type="text/javascript">
    "use strict";

let lazyImages = [...document.querySelectorAll('.lazyload-image')];
let inAdvance = 300;

function lazyLoad() {
  lazyImages.forEach(image => {
    if (image.offsetTop < window.innerHeight + window.pageYOffset + inAdvance) {
      image.src = image.dataset.src;

      image.onload = () => image.classList.add('loaded');
    }
  }); // if all loaded removeEventListener
}

lazyLoad();
// window.addEventListener('scroll', _.throttle(lazyLoad, 16));
// window.addEventListener('resize', _.throttle(lazyLoad, 16));
</script>
</body>



</html>