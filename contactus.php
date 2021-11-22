<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>

<!-- include cssfiles -->
<?php include 'includes/meta-tags.php'; ?>

<!-- include cssfiles -->
<?php include 'includes/csslinks.php'; ?>



</head>

<body class="fixed-bottom-bar">

    <!-- include header -->
	<?php include 'includes/header.php'; ?>



<div class="container position-relative">
    <div class="py-5 osahan-profile row">
        <div class="col-md-12 mb-3">
            <div class="rounded shadow-sm">
                <h2 class="h5 text-primary Main-Heading">Contact US</h2>
                <div class="osahan-privacy bg-white rounded shadow-sm p-4">
                    <div class="container">
            	    	<div class="row contact-find-us-section">
            				<div class="col-md-4 text-center contact-info-section">
            	    			<div class="card p-3">
            	    				<i class="fa fa-envelope contact-social-icons"></i>
            		    			<h2 class="mb-0">Email</h2>
            		    			<span><a href="mailto:admin@gmail.com">admin@gmail.com</a></span>
            						<span><a href="mailto:admin@gmail.com">admin@gmail.com</a></span>
            	    			</div>
            	    		</div>
            	    		<div class="col-md-4 text-center contact-info-section">
            	    			<div class="card p-3">
            	    				<i class="fa fa-phone-alt contact-social-icons"></i>
            		    			<h2 class="mb-0">Phone</h2>
            		    			<span><a href="#">+0096 3434 5678</a></span>
            		    			<span><a href="#">+0096 3434 5678</a></span>
            	    			</div>
            	    		</div>
            				<div class="col-md-4 text-center contact-info-section">
            	    			<div class="card p-3">
            	    				<i class="fa fa-map-marker-alt contact-social-icons"></i>
            			    			<h2 class="mb-0">Address</h2>
            			    			<span>Surkhet, NP12 <br> Birendranagar 06</span>
            	    			</div>
            	    		</div>
            	    	</div>
            	    </div>
                </div>
            </div>
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

</body>

</html>