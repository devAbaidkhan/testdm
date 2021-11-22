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
                    <h2 class="text-dark my-0">Hello There.</h2>
                    <p class="text-50">Sign up to enjoy DEDO </p>
                    <form class="mt-5 mb-4" method="POST" id="sign_up_form">
                        <div class="form-group">
                            <label for="name" class="text-dark">Name</label>
                            <input type="text" placeholder="Enter Name" class="form-control" id="name"
                                aria-describedby="nameHelp" name="name">
                        </div>
                        <div class="form-group">
                            <label for="phone" class="text-dark">Mobile Number</label>
                            <input type="number" placeholder="Enter Mobile" class="form-control" id="phone"
                                aria-describedby="numberHelp" name="phone">
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-dark">Password</label>
                            <input type="password" placeholder="Enter Password" class="form-control" id="password"
                                name="password">
                        </div>
                        <div class="form-group">
                            <label for="confirm_password" class="text-dark">Confirm Password</label>
                            <input type="password" placeholder="Enter Confirm Password" class="form-control"
                                id="confirm_password" name="confirm_password">
                        </div>
                        <button class="btn btn-primary btn-lg btn-block" type="submit">
                            SIGN UP
                        </button>
                        <!-- <div class="py-2">
                            <button class="btn btn-facebook btn-lg btn-block"><i class="feather-facebook"></i> Connect with Facebook</button>
                        </div> -->
                    </form>
                </div>
                <div class="new-acc d-flex align-items-center justify-content-center">
                    <a href="<?=BASE_URL?>login">
                        <p class="text-center m-0">Already an account? Sign in</p>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <?php include_once 'includes/side-menu.php';?>

    <?php include_once 'includes/jslinks.php';?>
    <!-- jquery-validation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js" integrity="sha512-6Uv+497AWTmj/6V14BsQioPrm3kgwmK9HYIyWP+vClykX52b0zrDGP7lajZoIY1nNlX4oQuh7zsGjmF7D0VZYA==" crossorigin="anonymous"></script>
    </script>
    <script>
        $('#sign_up_form').validate({
            rules: {
                name: "required",
                phone: "required",
                password: {
                    required:true,
                    minlength:8,
                },
                confirm_password: {
                    required:true,
                    equalTo : "#password"
                },
            },
            messages: {},
            errorElement: 'small',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
        $('#sign_up_form').on('submit', function(e) {
            e.preventDefault();
            // check if the input is valid using a 'valid' property
            if (!$('#sign_up_form').valid()) {
                return false;
            }

            $.ajax({
                type: 'post',
                url: 'backend/signup_save.php',
                data: new FormData(this),
                contentType: false,
                data_type: 'json',
                cache: false,
                processData: false,
                beforeSend: function() {
                    loader();
                },
                success: function(data) {
                    Swal.close();
                    var data = JSON.parse(data);
                    if (data.status == 'success') {
                        alertMsg(data.msg, 'success');
                        window.location.href = BASE_URL + 'login';
                    } else if (data.status == 'error') {
                        alertMsg(data.msg, 'error');
                    }
                },
                error: function() {
                    Swal.close();
                }
            });
        });
    </script>
</body>

</html>