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

<div class="osahan-profile">
<div class="d-none">
<div class="bg-primary border-bottom p-3 d-flex align-items-center">
<a class="toggle togglew toggle-2" href="#"><span></span></a>
<h4 class="font-weight-bold m-0 text-white">Profile</h4>
</div>
</div>

<div class="container position-relative">
<div class="py-5 osahan-profile row">

<div class="col-md-8 mb-3">
<div class="rounded shadow-sm">
<div class="osahan-cart-item-profile bg-white rounded shadow-sm p-4">
<div class="flex-column">
 <h6 class="font-weight-bold">Tell us about yourself</h6>
<p class="text-muted">Whether you have questions or you would just like to say hello, contact us.</p>
<form>
<div class="form-group">
<label for="exampleFormControlInput1" class="small font-weight-bold">Your Name</label>
<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Gurdeep Osahan">
</div>
<div class="form-group">
<label for="exampleFormControlInput2" class="small font-weight-bold">Email Address</label>
<input type="email" class="form-control" id="exampleFormControlInput2" placeholder="iamosahan@gmail.com">
</div>
<div class="form-group">
<label for="exampleFormControlInput3" class="small font-weight-bold">Phone Number</label>
<input type="number" class="form-control" id="exampleFormControlInput3" placeholder="1-800-643-4500">
</div>
<div class="form-group">
<label for="exampleFormControlTextarea1" class="small font-weight-bold">HOW CAN WE HELP YOU?</label>
<textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Hi there, I would like to ..." rows="3"></textarea>
</div>
<a class="btn btn-primary btn-block" href="#">SUBMIT</a>
</form>

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