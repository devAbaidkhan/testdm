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

    <div class="">
        <div class="bg-primary p-3 d-flex align-items-center">
            <a class="toggle togglew toggle-2" href="#"><span></span></a>
            <h4 class="font-weight-bold m-0 text-white">Offer</h4>
        </div>
    </div>

    <div class="offer-section">
        <div class="container">
            <div class="py-5 d-flex align-items-center">
                <div>
                    <h2 class="text-white">Deals for you</h2>
                    <p class="h6 text-white">Explore top deals and offers exclusively for you!</p>
                </div>
                <div class="ml-auto"><img alt="#" src="img/offers.png" class="img-fluid offers_img"></div>
            </div>
        </div>
    </div>

    <div class="bg-white shadow-sm">
        <div class="container">
            <div class="bg-white">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="px-0 py-3 nav-link text-dark h6 border-0 mb-0 tablinksDeals" onclick="openfunc(event, 'London')" id="defaultOpen">Flat % Discount</a>
                    </li>
                    <li class="nav-item bottom-tab" role="presentation">
                        <a class="px-0 py-3 nav-link text-dark h6 border-0 mb-0 ml-3 tablinksDeals" onclick="openfunc(event, 'Paris')">Buy & Get</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

<div class="container">
    <div class="tab-content" id="myTabContent">

        <div class="tab-pane fade show active py-4 tabcontentDeals" id="London">
            <h5 class="mb-3 mt-0">Flat % Discount Deals</h5>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="bg-white shadow-sm rounded p-4">
                        <p class="h6 mb-3"><span class="feather-home text-primary"></span><span class="ml-3">SBI75</span></p>
                        <p class="font-weight-bold mb-2">Get 15% discount using SBI Credit Cards</p>
                        <p class="mb-4">Use code SBI75 and get 15% discount up to Rs.75 on orders above Rs.400</p>
                        <p><a href="#" class="text-primary">+ MORE</a></p>
                        <a href="#" class="btn btn-outline-primary">COPY CODE</a>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="bg-white shadow-sm rounded p-4">
                        <p class="h6 mb-3"><span class="feather-home text-primary"></span><span class="ml-3">PAYZAPP100</span></p>
                        <p class="font-weight-bold mb-2">Get 15% discount using HDFC PayZapp Card</p>
                        <p class="mb-4">Use code PAYZAPP100 & get 15% discount up to Rs.100 on orders above Rs.250</p>
                        <p><a href="#" class="text-primary">+ MORE</a></p>
                        <a href="#" class="btn btn-outline-primary">COPY CODE</a>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="bg-white shadow-sm rounded p-4">
                        <p class="h6 mb-3"><span class="feather-home text-primary"></span><span class="ml-3">LP75</span></p>
                        <p class="font-weight-bold mb-2">Get flat cashback of Rs.75 using LazyPay</p>
                        <p class="mb-4">Use code LP75 & get flat cashback of Rs.75 on orders above Rs.250 on first LazyPay</p>
                        <p><a href="#" class="text-primary">+ MORE</a></p>
                        <a href="#" class="btn btn-outline-primary">COPY CODE</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade show active py-4 tabcontentDeals" id="Paris">
            <h5 class="mb-3 mt-0">Buy & Get Free Deals</h5>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="bg-white shadow-sm rounded p-4">
                        <p class="h6 mb-3"><span class="feather-home text-primary"></span><span class="ml-3">SBI75</span></p>
                        <p class="font-weight-bold mb-2">Buy 1 Coke and Get Free</p>
                        <p class="mb-4">Use code SBI75 and get 15% discount up to Rs.75 on orders above Rs.400</p>
                        <p><a href="#" class="text-primary">+ MORE</a></p>
                        <a href="#" class="btn btn-outline-primary">COPY CODE</a>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="bg-white shadow-sm rounded p-4">
                        <p class="h6 mb-3"><span class="feather-home text-primary"></span><span class="ml-3">PAYZAPP100</span></p>
                        <p class="font-weight-bold mb-2">Buy 1 Coke and Get Free</p>
                        <p class="mb-4">Use code PAYZAPP100 & get 15% discount up to Rs.100 on orders above Rs.250</p>
                        <p><a href="#" class="text-primary">+ MORE</a></p>
                        <a href="#" class="btn btn-outline-primary">COPY CODE</a>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="bg-white shadow-sm rounded p-4">
                        <p class="h6 mb-3"><span class="feather-home text-primary"></span><span class="ml-3">LP75</span></p>
                        <p class="font-weight-bold mb-2">Buy 1 Coke and Get Free</p>
                        <p class="mb-4">Use code LP75 & get flat cashback of Rs.75 on orders above Rs.250 on first LazyPay</p>
                        <p><a href="#" class="text-primary">+ MORE</a></p>
                        <a href="#" class="btn btn-outline-primary">COPY CODE</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<?php 

if ($_SESSION['source']!='mobile') {
include_once 'includes/footer.php'; 
}
?>


<?php include_once 'includes/side-menu.php';?>

<?php include_once 'includes/jslinks.php';?>

<script>
function openfunc(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontentDeals");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinksDeals");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>

</body>
</html>