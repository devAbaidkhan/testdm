<div class="container-fluid fixed-top bg-white py-2 mobile-none clearHeader nav-shadow1">

	<div class="row">

		<div class="col-12">

			<nav class="d-flex justify-content-between align-items-center">

				<div class="left-section logo-section">

					<a href="<?=BASE_URL?>"><img
							src="<?=BASE_URL?>img/logo/dedo-logo.gif"
							width="80px" class="img-fluid pl-3"></a>

				</div>

				<div class="right-section">

					<div class="d-flex justify-content-end align-items-center">

						<!--<a href="<?=BASE_URL?>deals"-->
						<!--	class="widget-header mr-4 text-white btn bg-primary">-->

						<!--	<div class="icon d-flex align-items-center">-->

						<!--		<i class="fas fa-user h6 mr-2 mb-0"></i> <span>Deals</span>-->

						<!--	</div>-->

						<!--</a>-->

						<a href="javascript:;" class="widget-header mr-4 text-dark header-cart-btn">

							<div class="icon d-flex align-items-center">

								<img src = "<?=BASE_URL?>img/svg/Cart-icon.svg" width="28px" alt="Dedo Cart Button"/><span
									class="badge badge-primary total-countOfQty"
									style="background-color:#ff6600;margin-left:-10px;margin-top:-15px;border-radius:1.25rem"></span><span class="ml-1">Cart</span>

							</div>

						</a>

						<p style="text-align: right;" class="mr-3 pt-2"><img src = "<?=BASE_URL?>img/svg/SideMenu-icon.svg" width="28px" alt="Dedo Cart Button" onclick="openNav()"/>
						</p>

					</div>

				</div>

			</nav>

		</div>

	</div>

</div>





<!-- for mobile screen -->



<div class="container-fluid fixed-top bg-white py-2 large-none nav-shadow1">

	<div class="row">

		<div class="col-12" style="padding-left:5px;padding-right:5px;padding-bottom:5px;text-align:center;">

			<div class="row">
				<?php
                        $previous = "javascript:history.go(-1)";
                        if (isset($_SERVER['HTTP_REFERER'])) {
                            $previous = $_SERVER['HTTP_REFERER'];
                        }
                        ?>
				<div class="col-1 header-top-main"><a
						href="<?=$previous?>"><img src = "<?=BASE_URL?>img/svg/Back-icon.svg" width="28px" alt="Dedo back Button"/></a></div>



				<div class="col-7 header-2nd">
					<?php
                            if (isset($_SESSION['user'])) {
                                ?>
					<a href="javascript:;" class="header-2nd">
						<?php
                                $address_title="";
                                $address=userDefaultAddress($_SESSION['user']['id']);
                                if (!empty($address)) {
									$address_title =implode(' ', array_slice(explode(' ', $address['title']), 0,2));
                                } ?>
						<p><span class="cus-del">Delivering to </span><span class="cus-loc"><?=$address_title?></span><i class="fa fa-chevron-down"
								style="font-size:10px;padding-top:10px;"></i></p>

					</a>
					<?php
                            }
                            ?>
				</div>



				<div class="col-4 header-top-main-2">

					<a href="javascript:;" class="header-cart-btn">

						<img src = "<?=BASE_URL?>img/svg/Cart-icon.svg" width="28px" alt="Dedo Cart Button"/>
						<!--<i class="fas fa-cart-plus" style="font-size:28px"></i>-->

						<span class="badge badge-primary total-countOfQty" style="background-color:#ff6600;margin-left:-10px;margin-top:-15px;border-radius:1.25rem"></span>

					</a>

					<a href="javascript:;"  class="m-0"><img src = "<?=BASE_URL?>img/svg/SideMenu-icon.svg" width="28px" alt="Dedo Cart Button" onclick="openNav()"/>
					<!--<span style="font-size:28px;cursor:pointer" >&#9776;</span>-->
					</a>



				</div>

			</div>

		</div>

	</div>
	<?php
if (isset($_GET['pid']) && $_GET['pid']!='search') {
    ?>
	<div class="container">

		<div class="row">

			<div class="col-12">

				<div class="text-white">

					<div class="input-group rounded shadow-search overflow-hidden">

						<div class="input-group-prepend">

							<a href="<?=BASE_URL?>/search" class="border-0 btn btn-outline-secondary text-dark bg-white btn-block"><i
									class="fa fa-search"></i></a>

						</div>

						<a href="<?=BASE_URL?>/search"  class="shadow-none border-0 form-control">Let's find the best deals for you</a>

					</div>

				</div>

			</div>

		</div>

	</div>
	<?php
}?>

	<!-- 	<div class="container" style="padding-left:0;padding-right:0;text-align:center;">-->

	<!-- 		<div class="row">-->

	<!--    	    <div class="col-6 header-div-main"><a class="m-0"><span class="header-ico-main"><i class="fa fa-sliders"></i> Filters</span></a></div>-->



	<!--    		<div class="col-4 header-div-main"><a href="#"><span class="header-ico-main"><i class="fa fa-spoon"></i> Restuarants</span></a></div>-->



	<!--			<div class="col-6 header-div-main"><a href="<?=BASE_URL?>search"><span
		class="header-ico-main"><i class="fa fa-search"></i> Search</span></a>
</div>-->

<!--</div>-->



<!-- 	</div>-->

</div>