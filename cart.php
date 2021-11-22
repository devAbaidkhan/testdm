<!DOCTYPE html>

<html lang="en">



<head>



	<!-- include cssfiles -->

	<?php include 'includes/meta-tags.php'; ?>



	<!-- include cssfiles -->

	<?php include 'includes/csslinks.php'; ?>







</head>



<body class="fixed-bottom-bar">



	<?php include 'includes/header.php'; ?>



	<div class="container mobile-none cart-main">

		<div class="row">

			<div class="col-12">

				<table class="table">

					<thead class="cart-table-head">

						<tr>

							<th>PRODUCT</th>

							<th>PRICE</th>

							<th>QUANTITY</th>

							<th>TOTAL</th>

						</tr>

					</thead>

					<tbody class="show-cart">



					</tbody>

				</table>



				<div class="d-flex justify-content-between">

					<h2 class="cart-bold-text">Subtotal</h2>

					<p class="cart-bold-price total-cart"></p>

				</div>

				<div class="d-flex justify-content-between">

					<h2 class="cart-bold-text">Delivery fee</h2>

					<p class="DeliverFeeAmt"></p>

				</div>



				

				<div class="d-flex justify-content-between align-self-center">

					<h2><span class="cart-bold-text">Total</span><sub style="font-size: 10px"></sub> </h2>

					<p class="cart-bold-price total-cartNet"></p>

				</div>

				<div>

					<a href="javascript:;" class="cart-checkout"><button class="btn btn-checkout-cart w-100 py-3">Go To

							Checkout</button></a>

				</div>

			</div>

		</div>

	</div>

	<!-- // ?  for mobile screen -->

	<div class="col-md-12 large-none p-3">

		<h2 class="margin0 mobile-background-heading-color p-2 text-white">Product</h2>

		<!-- product details -->

		<div class="show-cart-mobile">



		</div>





		<!--end product details -->

		<div class="d-flex justify-content-between mt-5">

			<h2 class="cart-bold-text">Subtotal</h2>

			<p class="cart-bold-price total-cart"></p>

		</div>

		<div class="d-flex justify-content-between">

			<h2 class="cart-bold-text">Delivery fee</h2>

			<p class="cart-bold-price DeliverFeeAmt"></p>

		</div>

		<!-- <a href="#">

			<p class="fa fa-check text-danger m-0 cart-text cart-voucher pb-5"> Apply a Voucher</p>

		</a> -->

		<div class="d-flex justify-content-between">

			<h2 class="cart-bold-text">Total<span style="font-size: 10px;"></span></h2>

			<p class="cart-bold-price total-cartNet"></p>

		</div>







		<div>

			<a href="javascript:;" class="cart-checkout"><button class="btn btn-checkout-cart w-100 py-3">Go To

					Checkout</button></a>

		</div>

	</div>

	<!-- Modal -->

	<div class="modal fade" id="checkout_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"

		aria-hidden="true">

		<div class="modal-dialog modal-dialog-centered" role="document"> <!-- style="align-items: flex-end;"-->

			<div class="modal-content">

				<div class="modal-body">

					<ul class="list-group">

						<li class="list-group-item">Keep Your Phone Nearby</li>

						<!--<li class="list-group-item">Call The Restrurent If you need Help</li>-->

						<li class="list-group-item">Relax And Wait For Your Delivary</li>

					</ul>

					<button type="button" class="btn btn-primary btn-lg btn-block checkout_info">Got It</button>

				</div>

			</div>

		</div>

	</div>

		<!-- Order Type Modal -->

	<div class="modal fade" id="order_type_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"

		aria-hidden="true">

		<div class="modal-dialog modal-dialog-centered" role="document">

			<div class="modal-content">

				<div class="modal-body">

				<div class="row">

				<div class="col-md-6">

				<button type="button" class="btn btn-primary btn-lg btn-block checkout_confirm cart_op" data-ordertype="deliver">Deliver it</button>

				</div>

				<div class="col-md-6">

				<button type="button" class="btn btn-primary btn-lg btn-block checkout_confirm cart_op1" data-ordertype="pickup">I’ll pick it</button>

				</div>

				</div>

					

				</div>

			</div>

		</div>

	</div>

<!-- END Order Type Modal -->



	<!-- Update Phone Number modal -->

	<div class="modal fade" id="phone_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"

		aria-hidden="true">

		<div class="modal-dialog modal-dialog-centered" role="document" style="align-items: flex-end;">

			<div class="modal-content">

			<form id="phone_form" method="POST">

			<div class="modal-body">

					<div class="row">

					<div class="col-md-12">

					<label for="phone">Enter Phone</label>

					<input type="number" id="phone" name="phone" class="form-control">

					</div>

					</div>

					<input type="hidden" name="phone_form">

					<button  class="btn btn-primary btn-lg btn-block" type="submit" id="save_phone_btn">Save</button>

				</div>

				</form>

				

			</div>

		</div>

	</div>

	<?php



if (!isset($_SESSION['source']) || $_SESSION['source']!='mobile') {

    include_once 'includes/footer.php';

}

?>

	<?php include_once 'includes/side-menu.php';?>



	<?php include_once 'includes/jslinks.php';?>

 <!-- jquery-validation -->

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js" integrity="sha512-6Uv+497AWTmj/6V14BsQioPrm3kgwmK9HYIyWP+vClykX52b0zrDGP7lajZoIY1nNlX4oQuh7zsGjmF7D0VZYA==" crossorigin="anonymous"></script>

	<script>

		$(document).ready(function() {

			if (shoppingCartRSB.listCart() <= 0) {

				Swal.fire({

					icon: 'error',

					title: 'Cart is Empty',

					showConfirmButton: false,

					timer: 1500

				})

				window.location.replace(BASE_URL);

			}

			$('.cart-checkout').on('click', function(e) {

				e.preventDefault();

				$.ajax({

					type: "post",

					url: "backend/cart_checkout.php",

					success: function(data) {

						var data = JSON.parse(data);

						if (data.status == 'error') {

							alertMsg(data.message, 'error');

						} else if (data.status == 'success') {

							//$('#checkout_modal').modal('show');

							$('#order_type_modal').modal('show');

						}else if(data.status=='nophone')

						{

							alertMsg(data.message, 'error');

							$('#phone_modal').modal('show');

						}

						 else if (data.status == 'SessionExpired') {

							alertMsg(data.message, 'error');

							window.location.href = BASE_URL + 'login';

						}

					}

				});

			});



			$('.checkout_info').on('click', function(e) {

				e.preventDefault();

				$('#checkout_modal').modal('toggle');

				$('#order_type_modal').modal('show');

			});

			$('.checkout_confirm').on('click', function(e) {

				e.preventDefault();

				var ordertype=$(this).data('ordertype');

				localStorage.setItem('order_type',ordertype);

				window.location.href = BASE_URL + 'cart-checkout';

			});





			$('#phone_form').validate({

                rules: {

                    phone: "required",

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

            $('#phone_form').on('submit', function(e) {

                e.preventDefault();

                // check if the input is valid using a 'valid' property

                if (!$('#phone_form').valid()) {

                    return false;

                }



                $.ajax({

                    type: 'post',

                    url: 'backend/cart_ajax.php',

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

                            $('#phone_modal').modal('hide');

                            $('#phone_form')[0].reset();



                        } else if (data.status == 'error') {

                            alertMsg(data.msg, 'error');

                        } else if (data.status == 'SessionExpired') {

                            alertMsg(data.msg, 'error');

                            window.location.href = BASE_URL + 'login';

                        }

                    },

                    error: function() {

                        Swal.close();

                    }

                });

            });

		});

	</script>

</body>



</html>