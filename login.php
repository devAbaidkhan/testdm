<?php
include('google_config.php');

if (isset($_SESSION['LoginStatus']) && $_SESSION['LoginStatus']=='LoggedIn') {
    header('location:'.BASE_URL);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- include cssfiles -->
    <?php include 'includes/meta-tags.php'; ?>

    <!-- include cssfiles -->
    <?php include 'includes/csslinks.php'; ?>

    <style>

    </style>

</head>

<body>
    <div class="login-page vh-100">
        <video loop autoplay muted id="vid">
            <source src="<?=BASE_URL?>img/bg.mp4" type="video/mp4">
            <source src="<?=BASE_URL?>img/bg.mp4" type="video/ogg">
            Your browser does not support the video tag.
        </video>
        <div class="d-flex align-items-center justify-content-center vh-100">
            <div class="px-5 col-md-6 ml-auto">
                <div class="px-5 col-10 mx-auto">
                    <h2 class="text-dark my-0">Welcome Back</h2>
                    <p class="text-50">Sign in to continue</p>
                    <form class="mt-5 mb-4" method="POST" id="login_form">
                        <div class="form-group">
                            <label for="phone" class="text-dark">Phone</label>
                            <input type="number" placeholder="Enter Phone Number" class="form-control" id="phone"
                                name="phone" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-dark">Password</label>
                            <input type="password" placeholder="Enter Password" class="form-control" id="password"
                                name="password" autocomplete="off">
                        </div>
                        <input type="hidden" value="" id="fcm_token" name="fcm_token">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">SIGN IN</button>

                        <div class="form-group col-md-12 xyz login-btn-gl"> <a
                                href="<?=$google_client->createAuthUrl()?>"
                                type="button" class="btn btn-primary btn-lg btn-block gplus "><i class="fa fa-google"
                                    style="padding-right:10px;"></i>Sign in with GOOGLE</a>
                        </div>



                        <!-- <div class="py-2">
                            <button class="btn btn-lg btn-facebook btn-block"><i class="feather-facebook"></i> Connect with Facebook</button>
                        </div> -->
                    </form>
                    <a href="<?=BASE_URL?>forgot-password"
                        class="text-decoration-none">
                        <p class="text-center sign-clr">Forgot your password?</p>
                    </a>
                    <!--<div class="d-flex align-items-center justify-content-center">-->
                    <!--    <a href="<?=BASE_URL?>signup">-->
                    <!--        <p class="text-center m-0">Don't have an account?<span class="sign-clr"> Sign up</span></p>-->
                    <!--    </a>-->
                    <!--</div>-->
                </div>
            </div>
        </div>
    </div>


    <?php include_once 'includes/side-menu.php';?>

    <?php include_once 'includes/jslinks.php';?>
    <!-- jquery-validation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"
        integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg=="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"
        integrity="sha512-6Uv+497AWTmj/6V14BsQioPrm3kgwmK9HYIyWP+vClykX52b0zrDGP7lajZoIY1nNlX4oQuh7zsGjmF7D0VZYA=="
        crossorigin="anonymous"></script>
    <script>
        $('#login_form').validate({
            rules: {
                phone: "required",
                password: "required",
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
        $('#login_form').on('submit', function(e) {
            e.preventDefault();
            // check if the input is valid using a 'valid' property
            if (!$('#login_form').valid()) {
                return false;
            }
            if ($('#fcm_token').val() == '') {
                resetUI();
            }
            $.ajax({
                type: 'post',
                url: 'backend/login_check.php',
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
                        window.location.href = BASE_URL;
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


    <!-- <script>
        var firebaseConfig = {
            apiKey: "AIzaSyCnoGCBci98i7Je2YRiwu9pwtvbIn5qKAQ",
            authDomain: "dedo-push-notification.firebaseapp.com",
            projectId: "dedo-push-notification",
            storageBucket: "dedo-push-notification.appspot.com",
            messagingSenderId: "227053008640",
            appId: "1:227053008640:web:e3da5517be4b9dfef165e5",
            measurementId: "G-G5H4XT0GLZ"
        };

        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        const messaging = firebase.messaging();
        initFirebaseMessagingRegistration();

        function initFirebaseMessagingRegistration() {
            messaging
                .requestPermission()
                .then(function() {
                    return messaging.getToken()
                })
                .then(function(token) {
                    console.log(token);

                    /* $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: '{{ route("save-token") }}',
                        type: 'POST',
                        data: {
                            token: token
                        },
                        dataType: 'JSON',
                        success: function (response) {
                            alert('Token saved successfully.');
                        },
                        error: function (err) {
                            console.log('User Chat Token Error'+ err);
                        },
                    }); */

                }).catch(function(err) {
                    console.log(err);
                });
        }


        messaging.onMessage(function(payload) {
            const noteTitle = payload.notification.title;
            const noteOptions = {
                body: payload.notification.body,
                icon: payload.notification.icon,
            };
            new Notification(noteTitle, noteOptions);
        });
    </script> -->
    <script>
    resetUI();
        /* var token = init();
        messaging.deleteToken(token).then(() => {

            console.log('Token deleted.');
            setTokenSentToServer(false);
            // Once token is deleted update UI.
            // resetUI();
        }).catch((err) => {
            console.log('Unable to delete token. ', err);
        }); */
    </script>
</body>

</html>