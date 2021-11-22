<script>
    var ImageURL = "<?=__ImageURL__?>";
</script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>



<script src="<?=BASE_URL?>js/flickity.pkgd.js"></script>



<!--<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>-->

<!-- 

<script type="722d1a0f78ec93e22e490cf0-text/javascript" src="vendor/slick/slick.min.js"></script> -->



<script src="<?=BASE_URL?>vendor/sidebar/hc-offcanvas-nav.js"></script>



<script src="https://rawgit.com/toddmotto/echo/master/dist/echo.js"></script>

<!--<script src="js/osahan.js"></script>-->

<!-- 

<script src="722d1a0f78ec93e22e490cf0-text/javascript" src="js/rocket-loader.min.js" data-cf-settings="722d1a0f78ec93e22e490cf0-|49" defer=""></script> 



<script src="js/rocket-loader.min.js" data-cf-settings="722d1a0f78ec93e22e490cf0-|49" defer=""></script>-->

<script src="https://kit.fontawesome.com/6227f58e4c.js" crossorigin="anonymous"></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.15.7/sweetalert2.min.js"
    integrity="sha512-IHQXMp2ha/aGMPumvzKLQEs9OrPhIOaEXxQGV5vnysMtEmNNcmUqk82ywqw7IbbvrzP5R3Hormh60UVDBB98yg=="
    crossorigin="anonymous"></script>

<script src="https://www.gstatic.com/firebasejs/8.5.0/firebase.js"></script>

<script src="<?=BASE_URL?>js/notification.js"></script>

<script
    src="<?=BASE_URL?>js/cart.js?qid=<?=time()?>">
</script>

<script>
    var BASE_URL = "<?=BASE_URL?>";



    $(document).on('click', '.logout-btn', function() {

        messaging.getToken({

            vapidKey: 'BElaslGmmOMctUgh05FA4zQ0Jqd8Cu6o4cQOrTkfoWsEe9XRLN1HhqwJ1yMEc1v8lcJAWhrCR2BCMWHB1XQI0-M'

        }).then((currentToken) => {

            messaging.deleteToken(currentToken).then(() => {

                console.log('Token deleted.');

                setTokenSentToServer(false);

                window.location.replace(BASE_URL + 'logout.php');

                // Once token is deleted update UI.

            }).catch((err) => {

                console.log('Unable to delete token. ', err);

                window.location.replace(BASE_URL + 'logout.php');

            });

        }).catch((err) => {

            console.log('Error retrieving registration token. ', err);

            showToken('Error retrieving registration token. ', err);

            window.location.replace(BASE_URL + 'logout.php');

        });



    });



    function openNav() {

        document.getElementById("mySidenav").style.width = "280px";

        // document.getElementById("body").style.backgroundColor = "red";



    }



    function closeNav() {

        document.getElementById("mySidenav").style.width = "0";

    }

    $(document).on('click', '.header-cart-btn', function() {
        if (shoppingCartRSB.listCart() <= 0) {

            Swal.fire({

                icon: 'error',

                title: 'Cart is Empty',

                showConfirmButton: false,

                timer: 1500

            })

          return false;

        }else{
            window.location.href = BASE_URL + "cart";
        }
       
    });
</script>



<script type="text/javascript">
    window.onscroll = function() //when window scroll then this function execution start

    {

        if (window.pageYOffset > 70) {

            $('.nav-shadow1').addClass('newClass');

        } else {

            $('.nav-shadow1').removeClass('newClass');

        }

    }



    function alertMsg(title, icon = 'success') {

        // showing pop msg

        const Toast = Swal.mixin({ //when firing the toast, the first window closes automatically

            toast: true,

            position: 'top-end',

            showConfirmButton: false,

            timer: 1500

        });

        Toast.fire({

            icon: icon,

            title: title

        });

        //end pop up

    }



    function loader() {

        Swal.fire({

            allowOutsideClick: false,

            showConfirmButton: false,

            willOpen: () => {

                Swal.showLoading()

            },

        });

    }
</script>