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
                <h2 class="h5 text-primary Main-Heading">About US</h2>
                <div class="osahan-privacy bg-white rounded shadow-sm p-4">
                    
            	    	<div class="row py-5" style="display: flex;align-items: center;">
            	    		<!--<div class="col-md-6 text-center">-->
            	    		<!--	<img src="https://arkaaconsultants.com/images/aboutus/About-us-pic.jpg" class="img-fluid">-->
            	    		<!--</div>-->
            	    		<div class="col-md-6">
            	    			<h2>About DEDO</h2>
                                <p>
                                	  <b>dedoConsultants</b>is a Food estate firm looking forward to embark a new milestone in the modernized world of conducting real estate   business.
            			              We manage a diverse portfolio of properties including commercial, residential and agricultural land throughout the country. 
            			              Our services comprise of property management, buying and selling of land and real estate investments.
            			              dedoConsultants is truly passionate to augment their expertise and reputation they acquired through conventional real estate experience in rather more digitally revolutionized yet comprehensive ways. 
                                </p>
                                <h4>HOW IT ALL STARTED</h4>
                                <p>	
                                      <b>dedoConsultants</b>is a real estate firm looking forward to embark a new milestone in the modernized world of conducting real estate   business.
            			              We manage a diverse portfolio of properties including commercial, residential and agricultural land throughout the country. 
            			              Our services comprise of property management, buying and selling of land and real estate investments.
            			              dedoConsultants is truly passionate to augment their expertise and reputation they acquired through conventional real estate experience in rather more digitally revolutionized yet comprehensive ways. 
                                </p>
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