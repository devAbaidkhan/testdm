<div id="mySidenav" class="sidenav">
	
	<div class="containerSide">
      <img src="<?=BASE_URL?>img/cover/small-bg.jpg" alt="sidenav" style="width:100%;">
      <div class="bottom-leftSide">
      <!--<p>Hello</p>-->
      <span>Have a nice day!</span>
      </div>
      <div class="top-leftSide"><img src="<?=BASE_URL?>img/sidebar/side-bar-logo.svg" width="80px"></div>
      <div class="top-rightSide"><a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a></div>
      <!--<div class="bottom-rightSide">Bottom Right</div>-->
      <!--<div class="centeredSide">Centered</div>-->
    </div>
	<!-- <a href="#"><img src="img/logo_web.png" class="img-fluid"></a> -->
	<ul class="sidebar-ul">
		<?php
 if (isset($_SESSION['LoginStatus']) && $_SESSION['LoginStatus']=='LoggedIn') {
     ?>
		<li class="sidebar-li"><a href="<?=BASE_URL?>profile"><img src="<?=BASE_URL?>img/sidebar/13.png" width="22px"> Profile</a></li>
		<li class="sidebar-li"><a
				href="<?=BASE_URL?>order-history"><img src="<?=BASE_URL?>img/sidebar/3.png" width="22px"> My Orders</a></li>

		<!-- <li class="sidebar-li"><a href="trending.html"><i class="feather-trending-up mr-2"></i> Trending</a></li> -->
		<!-- <li class="sidebar-li"><a href="most_popular.html"><i class="feather-award mr-2"></i> Most Popular</a></li> -->
		<li class="sidebar-li"><a href="<?=BASE_URL?>favourite-orders"><img src="<?=BASE_URL?>img/sidebar/12.png" width="22px"> My Favorites</a></li>
		<!--<li class="sidebar-li"><a href="<?=BASE_URL?>deals"><img src="<?=BASE_URL?>img/sidebar/1.png" width="22px"> Deals</a></li>-->
		
		<?php
 }?>
 <li class="sidebar-li"><a href="<?=BASE_URL?>"><img src="<?=BASE_URL?>img/sidebar/1.png" width="22px"> Home</a></li>
		<li class="sidebar-li"><a href="<?=BASE_URL?>restaurants"><img src="<?=BASE_URL?>img/sidebar/2.png" width="22px"> Restaurants</a></li>
		<li class="sidebar-li"><a href="<?=BASE_URL?>privacy"><img src="<?=BASE_URL?>img/sidebar/8.png" width="22px"> Privacy Policy</a></li>
		            <a href="<?=BASE_URL?>#"><img src="<?=BASE_URL?>img/sidebar/5.png" width="22px"> Invite a friend</a></li>
					<li class="sidebar-li"><a href="<?=BASE_URL?>contactus"><img src="<?=BASE_URL?>img/sidebar/6.png" width="22px"></i> Help/Live Support</a></li>
					<li class="sidebar-li"><a href="<?=BASE_URL?>t-and-c"><img src="<?=BASE_URL?>img/sidebar/10.png" width="22px"> Terms & Conditions</a></li>
					<li class="sidebar-li"><a href="<?=BASE_URL?>aboutus"><img src="<?=BASE_URL?>img/sidebar/11.png" width="22px"> About Us</a></li>
					<?php
 if (isset($_SESSION['LoginStatus']) && $_SESSION['LoginStatus']=='LoggedIn') {
     if (isset($_SESSION['source']) && $_SESSION['source']=='web') {
         ?>
		<li class="sidebar-li"><a href="javascript:;" class="logout-btn"><img src="<?=BASE_URL?>img/sidebar/7.png" width="22px"> Logout</a></li>
					<?php
     }else if(isset($_SESSION['source']) && $_SESSION['source']=='mobile'){
		 ?>
		 <li class="sidebar-li"><a href="<?=BASE_URL?>logout.php"><img src="<?=BASE_URL?>img/sidebar/7.png" width="22px"> Logout</a></li>
		 <?php
	 }
 }?>
		<!-- <div class="dropdown">
         <li class="sidebar-li " data-toggle="dropdown"><a href="map.html"><i class="feather-map-pin mr-2"></i> Dropdown Menu <i class="feather-chevron-down"></i></a></li>

        <div class="dropdown-menu dropdown-menu-position">
          <a class="dropdown-item" href="#">Link 1</a>
          <a class="dropdown-item" href="#">Link 2</a>
          <a class="dropdown-item" href="#">Link 3</a>
        </div>
      </div> -->
		<?php
 if (!isset($_SESSION['LoginStatus'])) {
     ?>
		<li class="sidebar-li"><a href="<?=BASE_URL?>login"><img src="<?=BASE_URL?>img/sidebar/9.png" width="22px"> Login</a></li>
		<!--<li class="sidebar-li"><a href="<?=BASE_URL?>signup"><i-->
		<!--			class="feather-user mr-2"></i> Signup</a></li>-->
		<?php
 }
      ?>

		<!--<li class="sidebar-li"><a href="forget_password.php"><i class="feather-user mr-2"></i> Forget Password</a></li>-->
	</ul>

</div>