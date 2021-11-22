<?php
if (!isset($_SESSION['LoginStatus'])) {
    header('location:'.BASE_URL.'login');
}
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

    <div class="osahan-checkout">
        <div class="">
            <div class="bg-primary border-bottom p-3 d-flex align-items-center">
                <a class="toggle togglew toggle-2" href="#"><span></span></a>
                <h4 class="font-weight-bold m-0 text-white">Checkout</h4>
            </div>
        </div>

        <div class="container position-relative">
            <div class="py-5 row">
                <div class="col-md-8 mb-3">
                    <div>
                        <div class="osahan-cart-item mb-3 rounded shadow-sm bg-white overflow-hidden checkout-address">

                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="osahan-cart-item rounded rounded shadow-sm overflow-hidden bg-white sticky_sidebar">
                        <div class="d-flex border-bottom osahan-cart-item-profile bg-white p-3">
                            <div class="d-flex flex-column">
                                <h6 class="mb-1 font-weight-bold">Your Cart Details</h6>
                                <p class="mb-0 small text-muted">Items added in the cart
                                </p>
                            </div>
                        </div>
                        <div class="bg-white border-bottom py-2 card-checkout-products">


                        </div>
                        <div class="bg-white p-3 py-3 border-bottom clearfix">
                            <div class="mb-0 input-group">
                                <div class="input-group-prepend"><span class="input-group-text"><i
                                            class="feather-message-square"></i></span></div>
                                <textarea placeholder="Any suggestions? We will pass it on..."
                                    aria-label="With textarea" class="form-control" name="order_suggestion"
                                    id="order_suggestion"></textarea>
                            </div>
                        </div>
                        <div class="bg-white p-3 clearfix border-bottom">
                            <p class="mb-1">Item Total <span class="float-right text-dark total_products_price"></span>
                            </p>

                            <p class="mb-1">Delivery Fee<span class="float-right text-dark devlivery_fee"></span>
                            </p>

                            <hr>
                            <h6 class="font-weight-bold mb-0">Total Payment <span
                                    class="float-right total_net_amount"></span>
                            </h6>
                        </div>
                        <div class="p-3">
                            <!--<a class="btn btn-primary btn-block btn-lg total_net_amount_pay "-->
                            <!--    href="javascript:;"><i class="feather-arrow-right"></i></a>-->
                            <a class="btn btn-primary btn-block btn-lg pay_btn" href="javascript:;"><i
                                    class="feather-arrow-right"></i>Place Order</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Add Address Modal -->
    <form id="add_form" method="POST">
        <div class="modal fade" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Add Address</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" name="add_title" id="add_title">
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea class="form-control" name="add_address" id="add_address" cols="30"
                                        rows="10"></textarea>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="add_is_default"
                                            id="add_is_default">
                                        Default
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="add_form">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--Update Address Modal -->
    <form id="edit_form" method="POST">
        <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Update Address</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" name="edit_title" id="edit_title">
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea class="form-control" name="edit_address" id="edit_address" cols="30"
                                        rows="10"></textarea>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="edit_is_default"
                                            id="edit_is_default">
                                        Default
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="edit_form">
                        <input type="hidden" name="hiddenID" id="hiddenID">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Order Type Modal -->
    <div class="modal fade" id="order_type_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-primary btn-lg btn-block checkout_confirm cart_op"
                                data-ordertype="deliver">Deliver it</button>
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-primary btn-lg btn-block checkout_confirm cart_op1"
                                data-ordertype="pickup">I’ll pick it</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- END Order Type Modal -->
    <?php

if (!isset($_SESSION['source']) || $_SESSION['source']!='mobile') {
    include_once 'includes/footer.php';
}
?>


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
        $(document).ready(function() {
            console.log(localStorage.getItem('order_type'));
            if (shoppingCartRSB.listCart() <= 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Cart is Empty',
                    showConfirmButton: false,
                    timer: 1500
                })
                //window.location.replace(BASE_URL);
                $('.pay_btn').addClass('disabled');
            }
            displayCartCheckOut();
            address_list();
            $('#add_form').validate({
                rules: {
                    add_title: "required",
                    add_address: "required",
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
            $('#add_form').on('submit', function(e) {
                e.preventDefault();
                // check if the input is valid using a 'valid' property
                if (!$('#add_form').valid()) {
                    return false;
                }

                $.ajax({
                    type: 'post',
                    url: 'backend/address_ajax.php',
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
                            address_list();
                            alertMsg(data.msg, 'success');
                            $('#add_modal').modal('hide');
                            $('#add_form')[0].reset();

                        } else if (data.status == 'error') {
                            alertMsg(data.msg, 'error');
                        } else if (data.status == 'SessionExpired') {
                            alertMsg(data.msg, 'error');
                            window.location.href = BASE_URL + 'logout.php';
                        }
                    },
                    error: function() {
                        Swal.close();
                    }
                });
            });

            $('#edit_form').validate({
                rules: {
                    edit_title: "required",
                    edit_address: "required",
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
            $('#edit_form').on('submit', function(e) {
                e.preventDefault();
                // check if the input is valid using a 'valid' property
                if (!$('#edit_form').valid()) {
                    return false;
                }

                $.ajax({
                    type: 'post',
                    url: 'backend/address_ajax.php',
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
                            address_list();
                            alertMsg(data.msg, 'success');
                            $('#edit_modal').modal('hide');
                            $('#edit_form')[0].reset();

                        } else if (data.status == 'error') {
                            alertMsg(data.msg, 'error');
                        } else if (data.status == 'SessionExpired') {
                            alertMsg(data.msg, 'error');
                            window.location.href = BASE_URL + 'logout.php';
                        }
                    },
                    error: function() {
                        Swal.close();
                    }
                });
            });

            // pay cart btn
            $('.pay_btn').on('click', function(e) {
                e.preventDefault();
                var cartArray = shoppingCartRSB.listCart();
                var order_suggestion = $('#order_suggestion').val();
                var order_type = localStorage.getItem('order_type');
                if (shoppingCartRSB.listCart().length <= 0) {
                    alertMsg('Cart Is Empty', 'error');
                    return false;
                }
                if (order_type == '') {
                    $('#order_type_modal').modal('show');
                    return false;
                }

                $('.pay_btn').addClass('disabled');
                $.ajax({
                    type: "POST",
                    url: "backend/place_order_ajax.php",
                    data: {
                        place_order: true,
                        cartArray: cartArray,
                        order_suggestion: order_suggestion,
                        order_type: order_type,
                    },
                    success: function(data) {
                        $('.pay_btn').removeClass('disabled');

                        Swal.close();
                        var data = JSON.parse(data);
                        if (data.status == 'error') {
                            alertMsg(data.msg, 'error');
                        } else if (data.status == 'success') {
                            localStorage.setItem('order_type', '');
                            alertMsg(data.msg, 'success');
                            shoppingCartRSB.clearCart();
                            window.location.replace(BASE_URL + 'order-successful');
                        } else if (data.status == 'SessionExpired') {
                            window.location.replace(BASE_URL + 'login');
                        }
                    },
                    error: function() {
                        Swal.close();
                        $('.pay_btn').removeClass('disabled');
                    }
                });
            });
            $('.checkout_confirm').on('click', function(e) {
                e.preventDefault();
                var ordertype = $(this).data('ordertype');
                localStorage.setItem('order_type', ordertype);
                $('#order_type_modal').modal('toggle');
            });
        });
        $(document).on('click', '.edit_data', function() {
            $('#edit_form')[0].reset();
            var id = $(this).data('id');
            var title = $(this).data('title');
            var address = $(this).data('address');
            var is_default = $(this).data('is-default');

            $('#hiddenID').val(id);
            $('#edit_title').val(title);
            $('#edit_address').text(address);
            if (is_default == 1) {
                $('#edit_is_default').attr('checked', true);
            }
            $('#edit_modal').modal('show');
        });

        function address_list() {
            var order_type = localStorage.getItem('order_type');
            $.ajax({
                type: "post",
                url: "backend/address_ajax.php",
                data: {
                    address_list: true,
                    order_type: order_type
                },
                success: function(data) {
                    $('.checkout-address').html(data);
                }
            });
        }
    </script>
</body>

</html>