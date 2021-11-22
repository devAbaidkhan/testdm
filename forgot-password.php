<!DOCTYPE html>
<html lang="en">
<head>

<!-- include cssfiles -->
<?php include 'includes/meta-tags.php'; ?>

<!-- include cssfiles -->
<?php include 'includes/csslinks.php'; ?>



</head>
<body>
    <div class="osahan-signup login-page">
        <video loop autoplay muted id="vid">
            <source src="<?=BASE_URL?>img/bg.mp4" type="video/mp4">
            <source src="<?=BASE_URL?>img/bg.mp4" type="video/ogg">
            Your browser does not support the video tag.
        </video>
        <div class="d-flex align-items-center justify-content-center flex-column vh-100">
            <div class="px-5 col-md-6 ml-auto">
                <div class="px-5 col-10 mx-auto">
                    <h2>Forgot password</h2>
                    <p>Enter your email address below and we'll send you an email with instructions on how to change your password</p>
                    <form action="index.php" class="mt-5 mb-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <button class="btn btn-primary btn-lg btn-block">Send</button>
                    </form>
                </div>
                <div class="new-acc d-flex align-items-center justify-content-center">
                    <a href="login.php">
                    <p class="text-center m-0">Already an account? Sign in</p>
                    </a>
                </div>
            </div>
        </div>
    </div>

<?php include_once 'includes/side-menu.php';?>

<?php include_once 'includes/jslinks.php';?>

</html>