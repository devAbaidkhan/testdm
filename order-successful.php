
<!DOCTYPE html>
<html lang="en">
<head>

<!-- include cssfiles -->
<?php include 'includes/meta-tags.php'; ?>

<!-- include cssfiles -->
<?php include 'includes/csslinks.php'; ?>



</head>

<body class="margin0" id="body">
   
	<!-- include header -->
	<?php include 'includes/header.php'; ?>
    <div class="">
        <div class="bg-primary p-3 d-flex align-items-center">
            <a class="toggle togglew toggle-2" href="#"><span></span></a>
            <h4 class="font-weight-bold m-0 text-white">Thanks :)</h4>
        </div>
    </div>

    <div class="osahan-coming-soon d-flex justify-content-center align-items-center page-top">
        <div class="col-md-6">
            <div class="text-center pb-3">
                <h3 class="font-weight-bold">Order Placed Successfully</h3>
               
            </div>

            <div class="bg-white rounded text-center p-4">
                <h6 class="mb-2">We will notify you about Confirmation</h6>
                <!-- <p class="small text-muted">Order placed, waiting for confirmation</p> -->
                <img src="img/making.gif" width="300px;">
                <!--<p>Check your order status in <a href="order-history.php" class="font-weight-bold text-decoration-none text-primary">My Orders</a> about next steps information.</p>-->
                <a href="<?=BASE_URL?>" class="btn rounded btn-primary btn-lg btn-block">Back to Home</a>
                
                <a href="<?=BASE_URL?>order-history" class="btn rounded btn-primary btn-lg btn-block">Track your Order</a>
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
$(document).ready(function () {
   
});
</script>
</body>
</html>