<!DOCTYPE html>
<html lang="en">
<head>

<!-- include cssfiles -->
<?php include 'includes/meta-tags.php'; ?>

<!-- include cssfiles -->
<?php include 'includes/csslinks.php'; ?>



</head>

<body class="margin0" id="body">
   
    <!-- include header -->
	<?php include 'includes/header.php'; ?>

    <!-- end of navbar -->
    <!-- for mobile screen -->
 

    <div class="margin-top-75">
        <div class="container">
            <div class="row">
                <div class="col-12">
                        <div class="text-white mt-4">
                           <div class="input-group rounded shadow-sm overflow-hidden">
                                <div class="input-group-prepend">
                                <button class="border-0 btn btn-outline-secondary text-dark bg-white btn-block"><i class="feather-search"></i></button>
                                </div>
                                <input type="text" class="shadow-none border-0 form-control" placeholder="Search for restaurants or dishes">
                           </div> 
                        </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="container">
        <div class="cat-slider">
            <div class="cat-item px-1 py-3">
                <a class="bg-white rounded d-block p-2 text-center shadow-sm" href="trending.html">
                <img alt="#" src="img/icons/Fries.png" class="img-fluid mb-2">
                <p class="m-0 small">Fries</p>
                </a>
            </div>

            <div class="cat-item px-1 py-3">
                <a class="bg-white rounded d-block p-2 text-center shadow-sm" href="trending.html">
                <img alt="#" src="img/icons/Pizza.png" class="img-fluid mb-2">
                <p class="m-0 small">Pizza</p>
                </a>
            </div>

            <div class="cat-item px-1 py-3">
                <a class="bg-white rounded d-block p-2 text-center shadow-sm" href="trending.html">
                <img alt="#" src="img/icons/Burger.png" class="img-fluid mb-2">
                <p class="m-0 small">Burger</p>
                </a>
            </div>

            <div class="cat-item px-1 py-3">
                <a class="bg-white rounded d-block p-2 text-center shadow-sm" href="trending.html">
                <img alt="#" src="img/icons/Sandwich.png" class="img-fluid mb-2">
                <p class="m-0 small">Sandwich</p>
                </a> 
            </div>

            <div class="cat-item px-1 py-3">
                <a class="bg-white rounded d-block p-2 text-center shadow-sm" href="trending.html">
                <img alt="#" src="img/icons/Coffee.png" class="img-fluid mb-2">
                <p class="m-0 small">Coffee</p>
                </a>
            </div>

            <div class="cat-item px-1 py-3">
                <a class="bg-white rounded d-block p-2 text-center shadow-sm" href="trending.html">
                <img alt="#" src="img/icons/Steak.png" class="img-fluid mb-2">
                <p class="m-0 small">Steak</p>
                </a>
            </div>

            <div class="cat-item px-1 py-3">
                <a class="bg-white rounded d-block p-2 text-center shadow-sm" href="trending.html">
                <img alt="#" src="img/icons/ColaCan.png" class="img-fluid mb-2">
                <p class="m-0 small">ColaCan</p>
                </a>
            </div>

            <div class="cat-item px-1 py-3">
                <a class="bg-white rounded d-block p-2 text-center shadow-sm" href="trending.html">
                <img alt="#" src="img/icons/Breakfast.png" class="img-fluid mb-2">
                <p class="m-0 small">Breakfast</p>
                </a>
            </div>

            <div class="cat-item px-1 py-3">
                <a class="bg-white rounded d-block p-2 text-center shadow-sm" href="trending.html">
                <img alt="#" src="img/icons/Salad.png" class="img-fluid mb-2">
                <p class="m-0 small">Salad</p>
                </a>
            </div>
        </div>
    </div> -->

    <div class="bg-white">
        <div class="container">
            <div class="offer-slider">
                <div class="cat-item px-1 py-3">
                    <a class="d-block text-center shadow-sm" href="trending.html">
                    <img alt="#" src="img/pro1.jpg" class="img-fluid rounded">
                    </a>
                </div>
                <div class="cat-item px-1 py-3">
                    <a class="d-block text-center shadow-sm" href="trending.html">
                    <img alt="#" src="img/pro2.jpg" class="img-fluid rounded">
                    </a>
                </div>
                <div class="cat-item px-1 py-3">
                    <a class="d-block text-center shadow-sm" href="trending.html">
                    <img alt="#" src="img/pro5.jpg" class="img-fluid rounded">
                    </a>
                </div>
                <div class="cat-item px-1 py-3">
                    <a class="d-block text-center shadow-sm" href="trending.html">
                    <img alt="#" src="img/pro3.jpg" class="img-fluid rounded">
                    </a>
                </div>
                <div class="cat-item px-1 py-3">
                    <a class="d-block text-center shadow-sm" href="trending.html">
                    <img alt="#" src="img/pro7.jpg" class="img-fluid rounded">
                    </a>
                </div>
                <div class="cat-item px-1 py-3">
                    <a class="d-block text-center shadow-sm" href="trending.html">
                    <img alt="#" src="img/pro2.jpg" class="img-fluid rounded">
                    </a>
                </div>

                <div class="cat-item px-1 py-3">
                    <a class="d-block text-center shadow-sm" href="trending.html">
                    <img alt="#" src="img/pro4.jpg" class="img-fluid rounded">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="pt-4 pb-2 title d-flex align-items-center">
            <h5 class="m-0">Featured</h5>
            <!-- <a class="font-weight-bold ml-auto" href="trending.html">View all <i class="feather-chevrons-right"></i></a> -->
        </div>

        <div class="trending-slider">
            <div class="osahan-slider-item">
                <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                    <div class="list-card-image">
                        <div class="star position-absolute">
                            <span class="badge badge-dedo-number">25 min</span>
                        </div>
                        <div class="favourite-heart text-danger position-absolute"><a href="#"><i class="feather-heart"></i></a></div>
                        <div class="member-plan position-absolute"><span class="badge badge-dark">Promoted</span></div>
                        <a href="third-page.php">
                        <img alt="#" src="img/trending1.png" class="img-fluid item-img w-100">
                        </a>
                    </div>
                    <div class="p-05 position-relative">
                        <div class="list-card-body">
                            <h6 class="mb-1"><a href="third-page.php" class="text-black">Karachi Biryani
                            </a><span class="badge badge-success badge-float"><i class="feather-star"></i> 3.1 (300+)</span>
                            </h6>
                            <p class="text-gray mb-3">$$. Pakistani,Biryani,Hattrick...</p>
                            <p class="text-gray mb-3 time"><span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2">Rs. 40 Delivery Fee</span></p>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="osahan-slider-item">
                <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                    <div class="list-card-image">
                        <div class="star position-absolute">
                            <span class="badge badge-dedo-number">25 min</span>
                        </div>
                        <div class="favourite-heart text-danger position-absolute"><a href="#"><i class="feather-heart"></i></a></div>
                        <div class="member-plan position-absolute"><span class="badge badge-dark">Promoted</span></div>
                        <a href="third-page.php">
                        <img alt="#" src="img/trending1.png" class="img-fluid item-img w-100">
                        </a>
                    </div>
                    <div class="p-05 position-relative">
                        <div class="list-card-body">
                            <h6 class="mb-1"><a href="third-page.php" class="text-black">Karachi Biryani
                            </a><span class="badge badge-success badge-float"><i class="feather-star"></i> 3.1 (300+)</span>
                            </h6>
                            <p class="text-gray mb-3">$$. Pakistani,Biryani,Hattrick...</p>
                            <p class="text-gray mb-3 time"><span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2">Rs. 40 Delivery Fee</span></p>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="osahan-slider-item">
                <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                    <div class="list-card-image">
                        <div class="star position-absolute">
                            <span class="badge badge-dedo-number">25 min</span>
                        </div>
                        <div class="favourite-heart text-danger position-absolute"><a href="#"><i class="feather-heart"></i></a></div>
                        <div class="member-plan position-absolute"><span class="badge badge-dark">Promoted</span></div>
                        <a href="third-page.php">
                        <img alt="#" src="img/trending2.png" class="img-fluid item-img w-100">
                        </a>
                    </div>
                    <div class="p-05 position-relative">
                        <div class="list-card-body">
                            <h6 class="mb-1"><a href="third-page.php" class="text-black">Express Chwaal
                            </a><span class="badge badge-success badge-float"><i class="feather-star"></i> 3.1 (300+)</span>
                            </h6>
                            <p class="text-gray mb-3">$$. Pakistani,Biryani,Hattrick...</p>
                            <p class="text-gray mb-3 time"><span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2">Rs. 40 Delivery Fee</span></p>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="osahan-slider-item">
                <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                    <div class="list-card-image">
                        <div class="star position-absolute">
                            <span class="badge badge-dedo-number">25 min</span>
                        </div>
                        <div class="favourite-heart text-danger position-absolute"><a href="#"><i class="feather-heart"></i></a></div>
                        <div class="member-plan position-absolute"><span class="badge badge-dark">Promoted</span></div>
                        <a href="third-page.php">
                        <img alt="#" src="img/trending4.png" class="img-fluid item-img w-100">
                        </a>
                    </div>
                    <div class="p-05 position-relative">
                        <div class="list-card-body">
                            <h6 class="mb-1"><a href="third-page.php" class="text-black">Karachi Biryani
                            </a><span class="badge badge-success badge-float"><i class="feather-star"></i> 3.1 (300+)</span>
                            </h6>
                            <p class="text-gray mb-3">$$. Pakistani,Biryani,Hattrick...</p>
                            <p class="text-gray mb-3 time"><span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2">Rs. 40 Delivery Fee</span></p>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="py-3 title d-flex align-items-center">
        <h5 class="m-0">Hat-trick Deals</h5>
        <a class="font-weight-bold ml-auto" href="most_popular.html">26 places <i class="feather-chevrons-right"></i></a>
        </div>

        <div class="trending-slider">
            <div class="osahan-slider-item">
                <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                    <div class="list-card-image">
                        <div class="star position-absolute">
                            <span class="badge badge-dedo-number">35 min</span>
                        </div>
                        <div class="favourite-heart text-danger position-absolute"><a href="#"><i class="feather-heart"></i></a></div>
                        <div class="member-plan position-absolute"><span class="badge badge-dedo-deals">Exclusive Deals</span></div>
                        <a href="third-page.php">
                        <img alt="#" src="img/trending1.png" class="img-fluid item-img w-100">
                        </a>
                    </div>
                    <div class="p-05 position-relative">
                        <div class="list-card-body">
                            <h6 class="mb-1"><a href="third-page.php" class="text-black">Karachi Biryani
                            </a><span class="badge badge-success badge-float"><i class="feather-star"></i> 3.1 (300+)</span>
                            </h6>
                            <p class="text-gray mb-3">$$. Pakistani,Biryani,Hattrick...</p>
                            <p class="text-gray mb-3 time"><span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2">Rs. 40 Delivery Fee</span></p>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="osahan-slider-item">
                <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                    <div class="list-card-image">
                        <div class="star position-absolute">
                            <span class="badge badge-dedo-number">45 min</span>
                        </div>
                        <div class="favourite-heart text-danger position-absolute"><a href="#"><i class="feather-heart"></i></a></div>
                        <div class="member-plan position-absolute"><span class="badge badge-dedo-deals">Hattrick Deals</span></div>
                        <a href="third-page.php">
                        <img alt="#" src="img/trending1.png" class="img-fluid item-img w-100">
                        </a>
                    </div>
                    <div class="p-05 position-relative">
                        <div class="list-card-body">
                            <h6 class="mb-1"><a href="third-page.php" class="text-black">Karachi Biryani
                            </a><span class="badge badge-success badge-float"><i class="feather-star"></i> 3.1 (300+)</span>
                            </h6>
                            <p class="text-gray mb-3">$$. Pakistani,Biryani,Hattrick...</p>
                            <p class="text-gray mb-3 time"><span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2">Rs. 40 Delivery Fee</span></p>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="osahan-slider-item">
                <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                    <div class="list-card-image">
                        <div class="star position-absolute">
                            <span class="badge badge-dedo-number">25 min</span>
                        </div>
                        <div class="favourite-heart text-danger position-absolute"><a href="#"><i class="feather-heart"></i></a></div>
                        <div class="member-plan position-absolute"><span class="badge badge-dedo-deals">Hattrick Deals</span></div>
                        <a href="third-page.php">
                        <img alt="#" src="img/trending2.png" class="img-fluid item-img w-100">
                        </a>
                    </div>
                    <div class="p-05 position-relative">
                        <div class="list-card-body">
                            <h6 class="mb-1"><a href="third-page.php" class="text-black">Express Chwaal
                            </a><span class="badge badge-success badge-float"><i class="feather-star"></i> 3.1 (300+)</span>
                            </h6>
                            <p class="text-gray mb-3">$$. Pakistani,Biryani,Hattrick...</p>
                            <p class="text-gray mb-3 time"><span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2">Rs. 40 Delivery Fee</span></p>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="osahan-slider-item">
                <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                    <div class="list-card-image">
                        <div class="star position-absolute">
                            <span class="badge badge-dedo-number">15 min</span>
                        </div>
                        <div class="favourite-heart text-danger position-absolute"><a href="#"><i class="feather-heart"></i></a></div>
                        <div class="member-plan position-absolute"><span class="badge badge-dedo-deals">Exclusive Deals</span></div>
                        <a href="third-page.php">
                        <img alt="#" src="img/trending4.png" class="img-fluid item-img w-100">
                        </a>
                    </div>
                    <div class="p-05 position-relative">
                        <div class="list-card-body">
                            <h6 class="mb-1"><a href="third-page.php" class="text-black">Karachi Biryani
                            </a><span class="badge badge-success badge-float"><i class="feather-star"></i> 3.1 (300+)</span>
                            </h6>
                            <p class="text-gray mb-3">$$. Pakistani,Biryani,Hattrick...</p>
                            <p class="text-gray mb-3 time"><span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2">Rs. 40 Delivery Fee</span></p>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="osahan-slider-item">
                <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                    <div class="list-card-image">
                        <div class="star position-absolute">
                            <span class="badge badge-dedo-number">25 min</span>
                        </div>
                        <div class="favourite-heart text-danger position-absolute"><a href="#"><i class="feather-heart"></i></a></div>
                        <div class="member-plan position-absolute"><span class="badge badge-dedo-deals">Flat 40% Deals</span></div>
                        <a href="third-page.php">
                        <img alt="#" src="img/trending8.png" class="img-fluid item-img w-100">
                        </a>
                    </div>
                    <div class="p-05 position-relative">
                        <div class="list-card-body">
                            <h6 class="mb-1"><a href="third-page.php" class="text-black">Karachi Biryani
                            </a><span class="badge badge-success badge-float"><i class="feather-star"></i> 3.1 (300+)</span>
                            </h6>
                            <p class="text-gray mb-3">$$. Pakistani,Biryani,Hattrick...</p>
                            <p class="text-gray mb-3 time"><span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2">Rs. 40 Delivery Fee</span></p>
                        </div>
                        
                    </div>
                </div>
            </div>

        </div>

        <div class="py-3 title d-flex align-items-center">
        <h5 class="m-0">All restaurants</h5>
        <!-- <a class="font-weight-bold ml-auto" href="most_popular.html">26 places <i class="feather-chevrons-right"></i></a> -->
        </div>

        <div class="most_popular">
            <div class="row">
                <div class="col-md-3 pb-3">
                    <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                        <div class="list-card-image">
                            <div class="star position-absolute"><span class="badge badge-success"><i class="feather-star"></i> 3.1 (300+)</span></div>
                            <div class="favourite-heart text-danger position-absolute"><a href="#"><i class="feather-heart"></i></a></div>
                            <div class="member-plan position-absolute"><span class="badge badge-dedo-deals">Featured</span></div>
                            <a href="third-page.php">
                            <img alt="#" src="img/popular3.png" class="img-fluid item-img w-100">
                            </a>
                        </div>
                        <div class="p-3 position-relative">
                            <div class="list-card-body">
                                <h6 class="mb-1"><a href="third-page.php" class="text-black">The RedRock Restaurant
                                </a>
                                </h6>
                                <p class="text-gray mb-1 small">• North • Hamburgers</p>
                                <p class="text-gray mb-1 rating">
                                </p>
                                
                                <p></p>
                            </div>
                            <div class="list-card-badge">
                                 <small>Delivery Fees Rs. 40</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 pb-3">
                    <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                        <div class="list-card-image">
                            <div class="star position-absolute"><span class="badge badge-success"><i class="feather-star"></i> 3.1 (300+)</span></div>
                            <div class="favourite-heart text-danger position-absolute"><a href="#"><i class="feather-heart"></i></a></div>
                            <div class="member-plan position-absolute"><span class="badge badge-dedo-deals">Featured</span></div>
                            <a href="third-page.php">
                            <img alt="#" src="img/popular1.png" class="img-fluid item-img w-100">
                            </a>
                        </div>
                        <div class="p-3 position-relative">
                            <div class="list-card-body">
                                <h6 class="mb-1"><a href="third-page.php" class="text-black">The Chinese Restaurant
                                </a>
                                </h6>
                                <p class="text-gray mb-1 small">• North • Hamburgers Chiniese</p>
                                <p class="text-gray mb-1 rating">
                                </p>
                                
                                <p></p>
                            </div>
                            <div class="list-card-badge">
                                 <small>Delivery Fees Rs. 40</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 pb-3">
                    <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                        <div class="list-card-image">
                            <div class="star position-absolute"><span class="badge badge-success"><i class="feather-star"></i> 3.1 (300+)</span></div>
                            <div class="favourite-heart text-danger position-absolute"><a href="#"><i class="feather-heart"></i></a></div>
                            <div class="member-plan position-absolute"><span class="badge badge-dedo-deals">Flat 40% Off</span></div>
                            <a href="third-page.php">
                            <img alt="#" src="img/popular1.png" class="img-fluid item-img w-100">
                            </a>
                        </div>
                        <div class="p-3 position-relative">
                            <div class="list-card-body">
                                <h6 class="mb-1"><a href="third-page.php" class="text-black">The osahan Restaurant
                                </a>
                                </h6>
                                <p class="text-gray mb-1 small">• North • Hamburgers</p>
                                <p class="text-gray mb-1 rating">
                                </p>
                                
                                <p></p>
                            </div>
                            <div class="list-card-badge">
                                 <small>Delivery Fees Rs. 40</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 pb-3">
                    <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                        <div class="list-card-image">
                            <div class="star position-absolute"><span class="badge badge-success"><i class="feather-star"></i> 3.1 (300+)</span></div>
                            <div class="favourite-heart text-danger position-absolute"><a href="#"><i class="feather-heart"></i></a></div>
                            <div class="member-plan position-absolute"><span class="badge badge-dedo-deals">Featured</span></div>
                            <a href="third-page.php">
                            <img alt="#" src="img/popular6.png" class="img-fluid item-img w-100">
                            </a>
                        </div>
                        <div class="p-3 position-relative">
                            <div class="list-card-body">
                                <h6 class="mb-1"><a href="third-page.php" class="text-black">The osahan Restaurant
                                </a>
                                </h6>
                                <p class="text-gray mb-1 small">• North • Hamburgers</p>
                                <p class="text-gray mb-1 rating">
                                </p>
                                
                                <p></p>
                            </div>
                            <div class="list-card-badge">
                                 <small>Delivery Fees Rs. 40</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 pb-3">
                    <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                        <div class="list-card-image">
                            <div class="star position-absolute"><span class="badge badge-success"><i class="feather-star"></i> 3.1 (300+)</span></div>
                            <div class="favourite-heart text-danger position-absolute"><a href="#"><i class="feather-heart"></i></a></div>
                            <div class="member-plan position-absolute"><span class="badge badge-dedo-deals">Flat 20% off</span></div>
                            <a href="third-page.php">
                            <img alt="#" src="img/popular7.png" class="img-fluid item-img w-100">
                            </a>
                        </div>
                        <div class="p-3 position-relative">
                            <div class="list-card-body">
                                <h6 class="mb-1"><a href="third-page.php" class="text-black">The osahan Restaurant
                                </a>
                                </h6>
                                <p class="text-gray mb-1 small">• North • Hamburgers</p>
                                <p class="text-gray mb-1 rating">
                                </p>
                                
                                <p></p>
                            </div>
                            <div class="list-card-badge">
                                 <small>Delivery Fees Rs. 40</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 pb-3">
                    <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                        <div class="list-card-image">
                            <div class="star position-absolute"><span class="badge badge-success"><i class="feather-star"></i> 3.1 (300+)</span></div>
                            <div class="favourite-heart text-danger position-absolute"><a href="#"><i class="feather-heart"></i></a></div>
                            <div class="member-plan position-absolute"><span class="badge badge-dedo-deals">Featured</span></div>
                            <a href="third-page.php">
                            <img alt="#" src="img/popular6.png" class="img-fluid item-img w-100">
                            </a>
                        </div>
                        <div class="p-3 position-relative">
                            <div class="list-card-body">
                                <h6 class="mb-1"><a href="third-page.php" class="text-black">DOCE BAKERS
                                </a>
                                </h6>
                                <p class="text-gray mb-1 small">• North • Hamburgers</p>
                                <p class="text-gray mb-1 rating">
                                </p>
                                
                                <p></p>
                            </div>
                            <div class="list-card-badge">
                                 <small>Delivery Fees Rs. 40</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 pb-3">
                    <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                        <div class="list-card-image">
                            <div class="star position-absolute"><span class="badge badge-success"><i class="feather-star"></i> 3.1 (300+)</span></div>
                            <div class="favourite-heart text-danger position-absolute"><a href="#"><i class="feather-heart"></i></a></div>
                            <div class="member-plan position-absolute"><span class="badge badge-dedo-deals">Promoted</span></div>
                            <a href="third-page.php">
                            <img alt="#" src="img/popular1.png" class="img-fluid item-img w-100">
                            </a>
                        </div>
                        <div class="p-3 position-relative">
                            <div class="list-card-body">
                                <h6 class="mb-1"><a href="third-page.php" class="text-black">The Bundu Khan
                                </a>
                                </h6>
                                <p class="text-gray mb-1 small">• North • Hamburgers</p>
                                <p class="text-gray mb-1 rating">
                                </p>
                                
                                <p></p>
                            </div>
                            <div class="list-card-badge">
                                 <small>Delivery Fees Rs. 40</small>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


























<div class="osahan-menu-fotter fixed-bottom bg-white px-3 py-2 text-center large-none">
<div class="row">
<div class="col">
<a href="home.html" class="text-dark small font-weight-bold text-decoration-none">
<p class="h4 m-0"><i class="feather-home text-dark"></i></p>
Home
</a>
</div>
<div class="col selected">
<a href="trending.html" class="text-danger small font-weight-bold text-decoration-none">
<p class="h4 m-0"><i class="feather-map-pin"></i></p>
Trending
</a>
</div>
<div class="col bg-white rounded-circle mt-n4 px-3 py-2">
 <div class="bg-danger rounded-circle mt-n0 shadow">
<a href="checkout.html" class="text-white small font-weight-bold text-decoration-none">
<i class="feather-shopping-cart"></i>
</a>
</div>
</div>
<div class="col">
<a href="favorites.html" class="text-dark small font-weight-bold text-decoration-none">
<p class="h4 m-0"><i class="feather-heart"></i></p>
Favorites
</a>
</div>
<div class="col">
<a href="profile.html" class="text-dark small font-weight-bold text-decoration-none">
<p class="h4 m-0"><i class="feather-user"></i></p>
Profile
</a>
</div>
</div>
</div>

<footer class="section-footer border-top mobile-none">
<div class="container">
<section class="footer-top padding-y py-5">
<div class="row">
<aside class="col-md-4 footer-about">
<article class="d-flex pb-3">
<div><img alt="#" src="img/logo_web.png" class="logo-footer mr-3"></div>
<div>
<h6 class="title text-white">About Us</h6>
<p class="text-muted">Some short text about company like You might remember the Dell computer commercials in which a youth reports.</p>
<div class="d-flex align-items-center">
<a class="btn btn-icon btn-outline-light mr-1 btn-sm" title="Facebook" target="_blank" href="#"><i class="feather-facebook"></i></a>
<a class="btn btn-icon btn-outline-light mr-1 btn-sm" title="Instagram" target="_blank" href="#"><i class="feather-instagram"></i></a>
<a class="btn btn-icon btn-outline-light mr-1 btn-sm" title="Youtube" target="_blank" href="#"><i class="feather-youtube"></i></a>
<a class="btn btn-icon btn-outline-light mr-1 btn-sm" title="Twitter" target="_blank" href="#"><i class="feather-twitter"></i></a>
</div>
</div>
</article>
</aside>
<aside class="col-sm-3 col-md-2 text-white">
<h6 class="title">Error Pages</h6>
<ul class="list-unstyled hov_footer">
<li> <a href="not-found.html" class="text-muted">Not found</a></li>
<li> <a href="maintence.html" class="text-muted">Maintence</a></li>
<li> <a href="coming-soon.html" class="text-muted">Coming Soon</a></li>
</ul>
</aside>
<aside class="col-sm-3 col-md-2 text-white">
<h6 class="title">Services</h6>
<ul class="list-unstyled hov_footer">
<li> <a href="faq.html" class="text-muted">Delivery Support</a></li>
<li> <a href="contact-us.html" class="text-muted">Contact Us</a></li>
<li> <a href="terms.html" class="text-muted">Terms of use</a></li>
<li> <a href="privacy.html" class="text-muted">Privacy policy</a></li>
</ul>
</aside>
<aside class="col-sm-3  col-md-2 text-white">
<h6 class="title">For users</h6>
<ul class="list-unstyled hov_footer">
<li> <a href="login.html" class="text-muted"> User Login </a></li>
<li> <a href="signup.html" class="text-muted"> User register </a></li>
<li> <a href="forgot_password.html" class="text-muted"> Forgot Password </a></li>
<li> <a href="profile.html" class="text-muted"> Account Setting </a></li>
</ul>
</aside>
<aside class="col-sm-3  col-md-2 text-white">
<h6 class="title">More Pages</h6>
<ul class="list-unstyled hov_footer">
<li> <a href="trending.html" class="text-muted"> Trending </a></li>
<li> <a href="most_popular.html" class="text-muted"> Most popular </a></li>
<li> <a href="third-page.php" class="text-muted"> Restaurant Details </a></li>
<li> <a href="favorites.html" class="text-muted"> Favorites </a></li>
</ul>
</aside>
</div>

</section>
</div>

<section class="footer-copyright border-top py-3 bg-light">
<div class="container">
<p class="mb-0 text-center"> © 2020 Company All rights reserved </p>
</div>
</section>
</footer>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <!-- <a href="#"><img src="img/logo_web.png" class="img-fluid"></a> -->
  <ul class="sidebar-ul">
      <li class="sidebar-li"><a href="home.html"><i class="feather-home mr-2"></i> Homepage</a></li>
      <li class="sidebar-li"><a href="home.html"><i class="feather-list mr-2"></i> My Orders</a></li>
      <li class="sidebar-li"><a href="home.html"><i class="feather-home mr-2"></i> Homepage</a></li>
      <li class="sidebar-li"><a href="favorites.html"><i class="feather-heart mr-2"></i> Favorites</a></li>
      <li class="sidebar-li"><a href="trending.html"><i class="feather-trending-up mr-2"></i> Trending</a></li>
      <li class="sidebar-li"><a href="most_popular.html"><i class="feather-award mr-2"></i> Most Popular</a></li>
      <li class="sidebar-li"><a href="third-page.php"><i class="feather-paperclip mr-2"></i> Restaurant Detail</a></li>
      <li class="sidebar-li"><a href="checkout.html"><i class="feather-list mr-2"></i> Checkout</a></li>
      <li class="sidebar-li"><a href="successful.html"><i class="feather-check-circle mr-2"></i> Successful</a></li>
      <li class="sidebar-li"><a href="map.html"><i class="feather-map-pin mr-2"></i> Live Map</a></li>
      <div class="dropdown">
         <li class="sidebar-li " data-toggle="dropdown"><a href="map.html"><i class="feather-map-pin mr-2"></i> Dropdown Menu <i class="feather-chevron-down"></i></a></li>

        <div class="dropdown-menu dropdown-menu-position">
          <a class="dropdown-item" href="#">Link 1</a>
          <a class="dropdown-item" href="#">Link 2</a>
          <a class="dropdown-item" href="#">Link 3</a>
        </div>
      </div>
      <li class="sidebar-li"><a href="map.html"><i class="feather-user mr-2"></i> User</a></li>
  </ul>

</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-header">
<div class="d-flex justify-content-between">
<h5 class="modal-title">Mango Khoya Shake</h5>
</div>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body p-0">
<div class="osahan-filter">
<div class="filter">

<div class="p-3 bg-light border-bottom d-flex justify-content-between">
<h6 class="m-0">Select variations</h6>
<p class="m-0">1 required</p>
</div>
<div class="custom-control border-bottom px-0  custom-radio">
<input type="radio" id="customRadio1f" name="location" class="custom-control-input" checked>
<label class="custom-control-label py-3 w-100 px-3" for="customRadio1f">Small (+PKR 120.00)</label>
</div>
<div class="custom-control border-bottom px-0  custom-radio">
<input type="radio" id="customRadio2f" name="location" class="custom-control-input">
<label class="custom-control-label py-3 w-100 px-3" for="customRadio2f">Regular (+PKR 180.00)</label>
</div>


<div class="p-3 bg-light border-bottom">
<h6 class="m-0">FILTER</h6>
<p class="m-0">Any specific preferences? Let the restaurant know.</p>
</div>
<div class="custom-control border-bottom px-2  custom-checkbox">
<textarea placeholder="eg no mayo" class=" w-100 border-1" rows="3"></textarea>
</div>
<div class="p-3 bg-light border-bottom d-flex justify-content-between">
<h6 class="m-0">Select Quantity</h6>
<p><span class="icon feather-minus"></span><span> 1 </span><span class="feather-plus"></span></p>
</div>


<div class="p-3 bg-light border-bottom">
<h6 class="m-0">If this product is not available</h6>
</div>
<div class="custom-control border-bottom px-2  custom-checkbox">
<select class="custom-control w-100 px-2 py-3" style="margin-bottom: 100px;">
    <option class="">remove it from the order</option>
    <option class="">cancel the entire order</option>
    <option class="">call me and confirm</option>
</select>
</div>
</div>
</div>
</div>
<div class="modal-footer p-0 border-0">
<div class="col-6 m-0 p-0">
<button type="button" class="btn border-top btn-lg btn-block" data-dismiss="modal">Close</button>
</div>
<div class="col-6 m-0 p-0">
<button type="button" class="btn btn-primary btn-lg btn-block">Apply</button>
</div>
</div>
</div>
</div>
</div>
<script type="722d1a0f78ec93e22e490cf0-text/javascript" src="vendor/jquery/jquery.min.js"></script>
<script type="722d1a0f78ec93e22e490cf0-text/javascript" src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script type="722d1a0f78ec93e22e490cf0-text/javascript" src="vendor/slick/slick.min.js"></script>

<script type="722d1a0f78ec93e22e490cf0-text/javascript" src="vendor/sidebar/hc-offcanvas-nav.js"></script>

<script type="722d1a0f78ec93e22e490cf0-text/javascript" src="js/osahan.js"></script>

<script src="722d1a0f78ec93e22e490cf0-text/javascript" src="js/rocket-loader.min.js" data-cf-settings="722d1a0f78ec93e22e490cf0-|49" defer=""></script>

<script src="js/rocket-loader.min.js" data-cf-settings="722d1a0f78ec93e22e490cf0-|49" defer=""></script>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "280px";
  // document.getElementById("body").style.backgroundColor = "red";

}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
</body>

</html>