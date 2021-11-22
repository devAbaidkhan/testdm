
<?php
if (!isset($_SESSION['LoginStatus'])) {
    header('location:'.BASE_URL.'login');
}
$user=$_SESSION['user'];
?>
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

    <!-- end of navbar -->
    <!-- for mobile screen -->
 

    <div class="osahan-profile">
        <div class="offer-section">
            <div class="container">
                <div class="py-5 d-flex align-items-center">
                    <div>
                        <h2 class="text-white">Profile</h2>
                        <p class="h6 text-white">you can manage your profile from here!</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container position-relative">
            <div class="py-5 osahan-profile row">
                <div class="col-md-12">
                    <div class="rounded shadow-sm p-4 bg-white">
                        <h5 class="mb-4">My account</h5>
                        <div id="edit_profile">
                            <div>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="<?=$user['name']?>">
                                </div>
                                
                                
                                
                                <div class="form-group">
                                    <label for="phone">Mobile Number</label>
                                    <input type="number" class="form-control" id="phone" name="phone" value="<?=$user['phone']?>">
                                </div>
                                
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?=$user['email']?>">
                                </div>
                                
                                <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                                </div>
                                
                            </div>
                            <div class="additional">
                                <div class="change_password my-3">
                                    <a href="forgot_password.html" class="p-3 border rounded bg-white btn d-flex align-items-center">Change Password
                                    <i class="feather-arrow-right ml-auto"></i></a>
                                </div>
                                <div class="deactivate_account">
                                    <a href="forgot_password.html" class="p-3 border rounded bg-white btn d-flex align-items-center">Deactivate Account
                                    <i class="feather-arrow-right ml-auto"></i></a>
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

<?php include 'includes/side-menu.php';?>

<?php include_once 'includes/jslinks.php';?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js" integrity="sha512-6Uv+497AWTmj/6V14BsQioPrm3kgwmK9HYIyWP+vClykX52b0zrDGP7lajZoIY1nNlX4oQuh7zsGjmF7D0VZYA==" crossorigin="anonymous"></script>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "280px";
  // document.getElementById("body").style.backgroundColor = "red";

}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
</body>

</html>