<?php

if (!isset($url_parse[1]) || empty($url_parse[1])) {

    header("location:".BASE_URL."restaurants");

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
   overflow-y:hidden;
   flex-wrap: nowrap;
}
.tabbable .nav-tabs .nav-link {
  white-space: nowrap;
}


#ans-template-wrap{
	max-width: 767px;
	position: relative;
	margin: 0 auto;
}

.ans-nav-wrap{
	position: fixed;
	left: 0;
	right: 0;
	/*top: 0;*/
	margin-top: 0px;
	height: 60px;
	width: 100%;
	background: #4B5563;
}

#ans-onepage-nav{
	padding: 0;
	text-align: center;
	display: flex;
	overflow: auto;
	margin-bottom: 0px;
}



#ans-onepage-nav li{
	display: inline-block;
	line-height: 41px;
	white-space: nowrap;
}

#home{
	padding-top: 0px;
}


#ans-onepage-nav li a {
	color: #000;
	text-decoration: none;
	text-transform: uppercase;
}

#ans-onepage-nav li a.scroll.ans-active{
	font-weight: bold;
	border-bottom: 3px solid rgb(75, 39, 105);
	color: rgba(75, 39, 105,0.6);
}

.tabbable{
    position: sticky;
    top: 125px;
    left: 0px;
    right: 0px;
    z-index: 99;
}
#nav-tab{
    background: #fff !important;
}
.nav-link{
    padding: 5px 10px 0px 10px !important;
}
.tabbable{
    box-shadow: 2px 4px 8px 0px rgb(0 0 0 / 20%)
}
.tab-content{
    padding-bottom: 300px;
}</style>

</head>



<body data-spy="scroll" data-target=".scrollhead" id="home" data-offset="100">



	<?php include 'includes/header.php'; ?>







	<?php

$slug=$url_parse[1];

$q="SELECT * FROM `vendor` WHERE slug='$slug' AND status=1";

$data=GetTableRow($q);

$cityadmin_id=$data['cityadmin_id'];

$id=$data['vendor_id'];

$delivery_charges=$data['delivery_charges'];

$vendor_name=$data['vendor_name'];

$estimated_delivery_time=$data['estimated_delivery_time'];

$keywords=explode(',', $data['keywords']);

?>

	<div class="container-fluid hero-img"

		style="background-image:url(<?=__ImageURL__.$data['main_image']?>);">

		<div class="row">

			<div class="col-12">

			

			</div>

		</div>

	</div>





	<div class="container" style="position: sticky;

        top: 80px;height:50px;background-color:white;z-index:99;">

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

			<a href="javascript:;"><?=ltrim($keyword,",")?></a>
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
        <div class="container padding0 top_2">
			<nav class="tabbable">
            <div class="nav nav-tab" id="nav-tab" role="tablist">
                <ul id="ans-onepage-nav">
        			<?php
        			$res=resturant_category($id);
        			$i=0;
                    while ($row=mysqli_fetch_array($res)) {
                        $active=$i==0?'active':'';
                        $exists=checkCategoryProductsExists($row['resturant_cat_id']);
                        if ($exists['total_products']>0) {
                            ?>
        
        						
        						    <li><a class="nav-item nav-link scroll" href="#nav-<?=slugify($row['cat_name'])?>-tab"><?=$row['cat_name']?></a></li>
        						
        						<!--<a class="nav-item nav-link <?=$active?>" id="nav-<?=slugify($row['cat_name'])?>-tab" data-toggle="tab" href="#nav-<?=slugify($row['cat_name'])?>" role="tab" aria-controls="nav-<?=slugify($row['cat_name'])?>" aria-selected="true"><?=$row['cat_name']?></a>-->
        				<?php
                    $i++;
                        }
                    }?>
                </ul>
            </div>
			</nav>
			<div class="container padding0 mt-3">
		<section class="exclusive bg-white">
			<div class="tab-content p-10" id="nav-tabContent">
			<?php
			$res=resturant_category($id);
			$i=0;
            while ($row=mysqli_fetch_array($res)) {
				$active_and_show=$i==0?'show active':'';
				$exists=checkCategoryProductsExists($row['resturant_cat_id']);
                if ($exists['total_products']>0) {
                ?>
            <!--<div class="tab-pane fade show <?=$active_and_show?>" id="nav-<?=slugify($row['cat_name'])?>" role="tabpanel" aria-labelledby="nav-<?=slugify($row['cat_name'])?>-tab">-->
                <div id="nav-<?=slugify($row['cat_name'])?>-tab" class="ans-section">


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

							href="javascript:;">

							<div class="col-12 py-2 border-light d-flex justify-content-between align-content-start"

								style="padding-left:5px;padding-right:5px;">

								<div class="resort-detail-text">

									<h6><?=$row2['product_name']?>

									</h6>

									<p class="resort-des m-0"><?=$row2['description']?>

									</p>

									<div class="resort-sub">

										<p class="resort-price">Rs. <?=$strick_price?>

										</p>

										<!--<p style="color:grey"><del>Rs. <?=$price?></del>

										</p>-->

										<p class="resort-dis"><?=$discount_price_percentage?>%

											Off</p>

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
            }}
			?>
          </div>
          </section>
          </div>
          
		</div>



	</div>





	<!--<main>-->

	<!--       <section id="section1" class="scrollspy-section" data-spy>Section 1</section>-->

	<!--       <section id="section2" class="scrollspy-section" data-spy>Section 2</section>-->

	<!--       <section id="section3" class="scrollspy-section" data-spy>Section 3</section>-->

	<!--       <section id="section4" class="scrollspy-section" data-spy>Section 4</section>-->

	<!--      </main>-->



	<!-- Exclusive Deals -->

	<!-- <div class="container padding0 my-3">

		<section id="exclusive" class="exclusive bg-white py-2 my-2">

		<div class="wrap-content px-3" style="padding: 50px 0px;">

			<h4>Exclusive Deals</h4>

			<div class="container-fluid">

				<div class="row mt-4">

					<div class="col-md-6">

						<h5 class="deal-title font-weight-bold margin">Exclusive Deal 1</h5>

						<p class="text-dark margin0">Chicken Chilli with dry rice</p>

						<span class="font-weight-bold d-inline-block deal-price">PKR 330.00</span>&nbsp;&nbsp;&nbsp;<span class="deal-price"><del>PKR 390.00</del></span>

					</div>

					<div class="col-md-6">

						

					</div>

				</div>

			</div>

		</div>

		</section>

	</div> -->




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

			var price = Number($(this).data('price'))||0;

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

			var currency = $('input[name="prod_varient"]:checked').data('currency')||'';

			calculate_price(price, currency);

		});



		function calculate_price(product_price, currency) {

			$('input:checkbox[name=product_addons_checkbox]:checked').each(function() {

				var addon_price = (this.checked ? $(this).data('product-addon-price') : 0);

				product_price += addon_price;

			});

			var quantity=$('#qtyShow').text();

			product_price=parseFloat(product_price)*parseFloat(quantity);

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
<script>
    (function( $ ) {
	
	$.fn.onePgaeNav = function( options ){

		var settings = $.extend({
			activeClass		: 'ans-active',
			wrapper			: '', 		// Nav wrapper selector for scroll effect
			speed 			: 200,		// animation speed
			navStop 		: 180,		// stop before top
			navStart 		: 230,		// change class before navstart pixel

		}, options ),
		$that = $(this);

		$(this).on( 'click' , clickScroll );

		if (settings.wrapper) {
			$(window).on('scroll',function(){
				var sectionTop 	= [],
				windowTop 	= $(window).scrollTop();

				$that.each(function(){
					var hash = $(this).attr('href'),
						hashOffset = $( hash ).offset();
					if (typeof hashOffset !== 'undefined' ) {
						sectionTop.push( hashOffset.top);
					};
				});

				$.each( sectionTop, function(index){
					if ( windowTop > sectionTop[index] - settings.navStart ){
						$that.removeClass(settings.activeClass)
							.eq(index).addClass(settings.activeClass);
					}
				});
			});
		};

		function clickScroll(event){
			event.preventDefault();

			var hash 		= $(this).attr('href'),
				hashOffset 	= $(hash).offset(),
				hashTop 	= hashOffset.top;

			$('html, body').animate({
				scrollTop: hashTop - settings.navStop
			}, settings.speed);
		}

	};

}(jQuery));
</script>
<script type="text/javascript">
		jQuery('.scroll').onePgaeNav({
			wrapper : '#ans-onepage-nav'
		});
	</script>
</body>



</html>