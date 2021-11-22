<?php

if (!isset($url_parse[1]) || empty($url_parse[1])) {
    header("location:".BASE_URL."campaign");
}
?>

<!DOCTYPE html>

<html lang="en">



<head>



	<!-- include cssfiles -->

	<?php include 'includes/meta-tags.php'; ?>



	<!-- include cssfiles -->

	<?php include 'includes/csslinks.php'; ?>



	<style type="text/css">
		body,

		html {

			scroll-behavior: smooth;

			/*Scroll avec effet*/

		}

		.tabbable .nav-tabs {
			overflow-x: auto;
			overflow-y: hidden;
			flex-wrap: nowrap;
		}

		.tabbable .nav-tabs .nav-link {
			white-space: nowrap;
		}
	</style>

</head>



<body data-spy="scroll" data-target=".scrollhead" id="home" data-offset="100">



	<?php include 'includes/header.php'; ?>











	<?php

    $slug=$url_parse[1];

    $q="SELECT * FROM `vendor` WHERE slug='$slug'";

    $data=GetTableRow($q);

    $cityadmin_id=$data['cityadmin_id'];

    $id=$data['vendor_id'];

    $delivery_charges=$data['delivery_charges'];

    $vendor_name=$data['vendor_name'];

    $estimated_delivery_time=$data['estimated_delivery_time'];

    $keywords=explode(',', $data['keywords']);
    $cityadmin=cityadmin_detail($cityadmin_id);
    ?>

	<div class="container-fluid hero-img"
		style="background-image:url(<?=__ImageURL__.$data['main_image']?>);">

		<div class="row">

			<div class="col-12">



			</div>

		</div>

	</div>





	<div class="container" style="position: sticky;

        top: 58px;height:50px;background-color:white;z-index:1000;">

		<a href="#" class="d-flex justify-content-between d-inline-block pt-3 resort-name">

			<h2 class="dish-name-font" id="resort-name-dp"><?=$data['vendor_name']?>

			</h2>

			<i class="h6 mr-2 mb-0 d-inline-block"><?=$data['avg_cost_meal']?> </i>

		</a>

	</div>

	<div class="container bg-white">







		<ul class="ul py-2" style="padding-left:0;color:grey;">

			<?php

           foreach ($keywords as $keyword) {
               ?>

			<a href="javascript:;"><?=ltrim($keyword, ",")?></a>
			<?php
           } ?>



		</ul>

		<div class="clearfix"></div>

	</div>







	<div class="container Order-re">

		<!-- <table class="tb">

			<tr>

				<td><i class="fas fa-star"></i>4.7(982)</td>

				<td>Reviews (102)</td>

				<td>Info</td>

			</tr>



		</table> -->

	</div>



	<div class="container-fluid bg-white mt-2">

		<div class="container padding0">

			<div class="row">

				<div class="col-12 Resort-div">

					<h4 class="dish-name-font pt-5 margin0">Live Delivery Tracking <span>Coming Soon</span></h4>

					<h4 class="dish-name-font pt-5 margin0">Credit Points <span>Coming Soon</span></h4>

				</div>

			</div>

		</div>

	</div>



	<div class="container scrollhead padding0">
		<div class="container sticky-top padding0 top_2">
			<nav class="tabbable">
				<div class="nav nav-tabs" id="nav-tab" role="tablist">
					<?php
                    $res=RestaurantCampaignDetail($id);
                    $i=0;
                    while ($row=mysqli_fetch_array($res)) {
                        $active=$i==0?'active':''; ?>

					<a class="nav-item nav-link <?=$active?>"
						id="nav-<?=slugify($row['title'])?>-tab"
						data-toggle="tab"
						href="#nav-<?=slugify($row['title'])?>"
						role="tab"
						aria-controls="nav-<?=slugify($row['title'])?>"
						aria-selected="true"><?=$row['title']?></a>
					<?php
                        $i++;
                    }?>

					<?php
                    $res=resturant_category($id);
                    while ($row=mysqli_fetch_array($res)) {
                        $exists=checkCategoryProductsExists($row['resturant_cat_id']);
                        if ($exists['total_products']>0) {
                            ?>

					<a class="nav-item nav-link "
						id="nav-<?=slugify($row['cat_name'])?>-tab"
						data-toggle="tab"
						href="#nav-<?=slugify($row['cat_name'])?>"
						role="tab"
						aria-controls="nav-<?=slugify($row['cat_name'])?>"
						aria-selected="true"><?=$row['cat_name']?></a>
					<?php
            $i++;
                        }
                    }?>

				</div>
			</nav>
			<div class="container padding0 mt-3">
				<section class="exclusive bg-white py-2 my-2">
					<div class="tab-content p-10" id="nav-tabContent">
					<!-- // ! compaign Start -->
						<?php
                    $res=RestaurantCampaignDetail($id);
                    $i=0;
                    while ($row=mysqli_fetch_array($res)) {
                        $active_and_show=$i==0?'show active':'';
						$campaign_id=	$row['campaign_id'];
						$campaign_type_id=	$row['campaign_type_id'];
						?>
						<div class="tab-pane fade <?=$active_and_show?>"
							id="nav-<?=slugify($row['title'])?>"
							role="tabpanel"
							aria-labelledby="nav-<?=slugify($row['title'])?>-tab">

							<?php
                            $res2=campaign_resturant_buy_products($row['id']);
                        while ($row2=mysqli_fetch_array($res2)) {
							$campaign_type_id=	$row['campaign_type_id'];
							if($campaign_type_id==1){
								$resturant_variant=variant_detail($row2['variant_id']);
							}else{
								$resturant_variant=  resturant_variant_first($row2['product_id']);
							}
                            
                            if ($resturant_variant) {
                                $strick_price=   $resturant_variant['strick_price'];/* Discount Price*/

                                $discount_price_percentage=   $resturant_variant['discount_price_percentage'];

                                $price=   $resturant_variant['price'];/* Retail Price*/
                            } else {
                                $strick_price=   '';

                                $discount_price_percentage=   '';

                                $price=   '';
                            } ?>

							<div class="col-md-6 resort-detail compaign_product_detail"
								data-campaign-vendor-product-id="<?=$row2['id']?>"
								data-campaign-vendor-id="<?=$row2['campaign_vendor_id']?>"
								data-productid="<?=$row2['product_id']?>"
								data-prodname="<?=$row2['product_name']?>"
								data-prodimage="<?=$row2['product_image']?>"
								data-campaign-type-id="<?=$campaign_id?>"
								data-campaign-id="<?=$campaign_type_id?>"
								data-is-campaign="yes"
								href="javascript:;">

								<div class="col-12 py-2 border-light d-flex justify-content-between align-content-start"
									style="padding-left:5px;padding-right:5px;">

									<div class="resort-detail-text">

										<h6><?=$row2['product_name']?>

										</h6>

										<p class="resort-des m-0"><?=$row2['description']?>

										</p>

										<div class="resort-sub">

											<p class="resort-price"><?=$cityadmin['currency']?>
												<?=$strick_price?> </p>
											<?php 
											if($campaign_type_id==1){
											?>
											<p class="resort-dis"><?=$discount_price_percentage!=''?$discount_price_percentage.' % Off':''?></p>
											<?php } ?>
										</div>





									</div>

									<div>

										<img src="<?=__ImageURL__.$row2['product_image']?>"
											class="img-fluid deal-iamge">

										<div style="position: relative;">

											<i
												class="feather-plus h6 mb-0 d-inline-block totalpadding10 img-icon hover-pointer "></i>

										</div>

									</div>

								</div>

							</div>

							<?php
                        } ?>
						</div>
						<?php $i++;
                    }?>

						<!-- // ! compaign ends -->
						<?php
                        $res=resturant_category($id);
                        
                        while ($row=mysqli_fetch_array($res)) {
                            $exists=checkCategoryProductsExists($row['resturant_cat_id']);
                            if ($exists['total_products']>0) {
                                ?>
						<div class="tab-pane fade"
							id="nav-<?=slugify($row['cat_name'])?>"
							role="tabpanel"
							aria-labelledby="nav-<?=slugify($row['cat_name'])?>-tab">


							<?php
                            $res2=resturant_category_products($row['resturant_cat_id']);
                                while ($row2=mysqli_fetch_array($res2)) {
                                    $resturant_variant=  resturant_variant_first($row2['product_id']);

                                    if ($resturant_variant) {
                                        $strick_price=   $resturant_variant['strick_price'];/* Discount Price*/

                                        $discount_price_percentage=   $resturant_variant['discount_price_percentage'];

                                        $price=   $resturant_variant['price'];/* Retail Price*/
                                    } else {
                                        $strick_price=   '';

                                        $discount_price_percentage=   '';

                                        $price=   '';
                                    } ?>

							<div class="col-md-6 resort-detail product_detail"
								data-productid="<?=$row2['product_id']?>"
								data-prodname="<?=$row2['product_name']?>"
								data-prodimage="<?=$row2['product_image']?>"
								data-is-campaign="no"
								href="javascript:;">

								<div class="col-12 py-2 border-light d-flex justify-content-between align-content-start"
									style="padding-left:5px;padding-right:5px;">

									<div class="resort-detail-text">

										<h6><?=$row2['product_name']?>

										</h6>

										<p class="resort-des m-0"><?=$row2['description']?>

										</p>

										<div class="resort-sub">

											<p class="resort-price"><?=$cityadmin['currency']?>
												<?=$strick_price?>

											</p>

											<!--<p style="color:grey"><del>Rs. <?=$price?></del>

											</p>-->

											<p class="resort-dis"><?=$discount_price_percentage!=''?$discount_price_percentage.' % Off':''?>
											</p>

										</div>





									</div>

									<div>

										<img src="<?=__ImageURL__.$row2['product_image']?>"
											class="img-fluid deal-iamge">

										<div style="position: relative;">

											<i
												class="feather-plus h6 mb-0 d-inline-block totalpadding10 img-icon hover-pointer "></i>

										</div>

									</div>

								</div>

							</div>

							<?php
                                } ?>
						</div>
						<?php
            $i++;
                            }
                        }
            ?>
					</div>
				</section>
			</div>

		</div>
	</div>

	<!-- product Modal -->

	<div class="modal fade" id="prod-varient-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">

		<div class="modal-dialog modal-dialog-centered">

			<!-- product detail div start -->

			<div class="modal-content" id="product_detail_div">





			</div>

			<!-- product detail div end -->

		</div>

	</div>

	<!-- product Modal End-->

	<?php



if (!isset($_SESSION['source']) || $_SESSION['source']!='mobile') {
    include_once 'includes/footer.php';
}

?>



	<?php include 'includes/side-menu.php';?>



	<?php include_once 'includes/jslinks.php';?>



	<script>
		$(document).ready(function() {

			var BASE_URL = "<?=BASE_URL?>";

			var cityadmin_id = "<?=$cityadmin_id?>";

			var delivery_charges = "<?=$delivery_charges?>";

			var vendor_name = "<?=$vendor_name?>";

			var estimated_delivery_time = "<?=$estimated_delivery_time?>";



			$('.product_detail').on('click', function() {

				$('#qtyShow').text(1);

				var product_id = $(this).data('productid');

				var prodname = $(this).data('prodname');

				var prodimage = $(this).data('prodimage');

				$('#prod_title').text(prodname);

				$.ajax({

					type: "post",

					url: BASE_URL + "backend/product_detail.php",

					data: {

						get_product_varients: true,

						product_id: product_id,

						cityadmin_id: cityadmin_id,

						delivery_charges: delivery_charges,

						prodimage: prodimage,

						product_name: prodname,

						vendor_name: vendor_name,

						estimated_delivery_time: estimated_delivery_time,

					},

					success: function(data) {

						$('#product_detail_div').html(data);

						$('#prod-varient-modal').modal('show');

					}

				});



			});

			$('.compaign_product_detail').on('click', function() {
				$('#qtyShow').text(1);
				var product_id = $(this).data('productid');
				var prodname = $(this).data('prodname');
				var prodimage = $(this).data('prodimage');

				var is_campaign = $(this).data('is-campaign');
				var campaign_vendor_id = null;
				var campaign_vendor_product_id = null;
				var campaign_type_id = null;
				var campaign_id = null;
				
				if(is_campaign=='yes'){
				var campaign_vendor_id = $(this).data('campaign-vendor-id');
				var campaign_vendor_product_id = $(this).data('campaign-vendor-product-id');
				var campaign_type_id = $(this).data('campaign-type-id');
				var campaign_id = $(this).data('campaign-id');
				}
					
				$('#prod_title').text(prodname);
				$.ajax({
					type: "post",
					url: BASE_URL + "backend/campaign_product_detail.php",
					data: {
						get_product_varients: true,
						product_id: product_id,
						cityadmin_id: cityadmin_id,
						delivery_charges: delivery_charges,
						prodimage: prodimage,
						product_name: prodname,
						vendor_name: vendor_name,
						estimated_delivery_time: estimated_delivery_time,
						campaign_vendor_id: campaign_vendor_id,
						campaign_vendor_product_id: campaign_vendor_product_id,
						campaign_type_id: campaign_type_id,
						campaign_id: campaign_id,
						is_campaign: is_campaign,
					},

					success: function(data) {

						$('#product_detail_div').html(data);

						$('#prod-varient-modal').modal('show');

					}

				});



			});



		});

		$(document).on('click', '#plus-product-qty', function() {

			var qty = parseInt($('#qtyShow').text());

			qty = qty + 1;

			$('#qtyShow').text(qty);

			var price = $('input[name="prod_varient"]:checked').data('price') || 0;

			var currency = $('input[name="prod_varient"]:checked').data('currency');

			calculate_price(price, currency);

		});

		$(document).on('click', '#minus-product-qty', function() {

			var qty = parseInt($('#qtyShow').text());

			if (qty > 1) {

				qty = qty - 1;

				$('#qtyShow').text(qty);

				var price = $('input[name="prod_varient"]:checked').data('price') || 0;

				var currency = $('input[name="prod_varient"]:checked').data('currency');

				calculate_price(price, currency);

			}

		});



		$(document).on('click', "input[name='prod_varient']", function() {

			var i = $(this).data('i');

			var unit = $(this).data('unit');

			var currency = $(this).data('currency');

			var price = Number($(this).data('price')) || 0;

			var variantid = Number($(this).data('variantid'));

			var vendorid = Number($(this).data('vendorid'));

			var prodid = $('#prodid').val();

			/* console.log(vendorid);

				console.log(variantid);

				console.log(prodid);

			*/

			$('#prodcurrency').val(currency);

			$('#plus-item').attr('data-prodid', prodid);

			$('#plus-item').attr('data-variantid', variantid);

			$('#plus-item').attr('data-vendorid', vendorid);





			$('#minus-item').attr('data-prodid', prodid);

			$('#minus-item').attr('data-variantid', variantid);

			$('#minus-item').attr('data-vendorid', vendorid);

			calculate_price(price, currency);

		});

		$(document).on('click', '.product_addons_chk', function() {

			var price = $('input[name="prod_varient"]:checked').data('price') || 0;

			var currency = $('input[name="prod_varient"]:checked').data('currency') || '';

			calculate_price(price, currency);

		});



		function calculate_price(product_price, currency) {

			$('input:checkbox[name=product_addons_checkbox]:checked').each(function() {

				var addon_price = (this.checked ? $(this).data('product-addon-price') : 0);

				product_price += addon_price;

			});

			var quantity = $('#qtyShow').text();

			product_price = parseFloat(product_price) * parseFloat(quantity);

			/* var total_price = parseFloat(product_price) + parseFloat(addon_price); */

			$('.product_price_btn').text(currency + ' ' + product_price);

		}
	</script>



	<script type="text/javascript">
		const ratio = .6

		const spies = document.querySelectorAll('[data-spy]')



		let observer = null



		/**

		 * 

		 * @param {HTMLElement} elem 

		 */

		const activate = function(elem) {

			const id = elem.getAttribute("id")

			const anchor = document.querySelector(`a[href="#${id}"]`)

			if (anchor === null) {

				return null

			}

			anchor.parentElement

				.querySelectorAll('.active')

				.forEach((node) => node.classList.remove("active"))

			anchor.classList.add("active")

		}



		/**

		 * 

		 * @param {IntersectionObserverEntry[]} entries 

		 */

		const callback = function(entries) {

			entries.forEach(function(entry) {

				if (entry.isIntersecting) {

					activate(entry.target)

				}

			})

		}



		/**

		 * 

		 * @param {NodeListOf.<Element>} elems 

		 */

		const observe = function(elems) {

			if (observer !== null) {

				elems.forEach(elem => observer.unobserve(elem))

			}

			const y = Math.round(window.innerHeight * ratio)

			observer = new IntersectionObserver(callback, {

				rootMargin: `-${window.innerHeight - y - 1}px 0px -${y}px 0px`

			})

			spies.forEach(elem => observer.observe(elem))

		}



		/**

		 * 

		 * @param {Function} callback 

		 * @param {number} delay

		 * @return {Function}

		 */

		const debounce = function(callback, delay) { //réduit le nombre d'appel

			let timer;

			return function() {

				let args = arguments;

				let context = this;

				clearTimeout(timer);

				timer = setTimeout(function() {

					callback.apply(context, args);

				}, delay)

			}

		}



		if (spies.length > 0) {

			observe(spies)

			let windowH = window.innerHeight

			window.addEventListener("resize", debounce(function() {

				if (window.innerHeight !== windowH) {

					observe(spies)

					windowH = window.innerHeight

				}

			}, 500))

		}
	</script>



	<script>
		// When the user scrolls down 50px from the top of the document, resize the header's font size

		window.onscroll = function() {

			scrollFunction()

		};



		function scrollFunction() {

			if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 100) {

				document.getElementById("resort-name-dp").style.fontSize = "16px";

			} else {

				document.getElementById("resort-name-dp").style.fontSize = "25px";

			}

		}
	</script>

</body>



</html>