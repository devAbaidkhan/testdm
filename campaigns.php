
<?php

if (!isset($url_parse[1]) || empty($url_parse[1])) {

    header("location:".BASE_URL."restaurants");

}
$campaign=$url_parse[1];
?>
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


        </div>

    </div>

   
    <div class="container">

        

        <section>

        <div class="pt-4 pb-2 title d-flex align-items-center">

            <h5 class="m-0">Campaigns</h5>

            <!-- <a class="font-weight-bold ml-auto" href="trending.html">View all <i class="feather-chevrons-right"></i></a> -->

        </div>

      <div class="container">

        <div class="row py-3">

          <div class="owl-carousel owl-theme">

            <?php
            $cam_res= campaignsList();
            while($row=mysqli_fetch_array($cam_res)){
                ?>
                    <div class="item">

                    <div class="card">

                    <a href="<?=BASE_URL.'campaigns/'.$row['id']?>">
                        <img class="card-img-top" src="<?=__ImageURL__.$row['banner']?>" alt="Card image cap">
                    </a>

                    </div>

                    </div>
                <?php
            }
            ?>
            
          </div>

         

          

          

        </div>

      </div>

    </section>



        <div class="py-3 title d-flex align-items-center">

            <h5 class="m-0">All Restaurants Who's Joined Campaign</h5>

        </div>



        <div class="most_popular">

            <div class="row">

            <?php 

            $q="";
            $q="SELECT vendor.* FROM `campaign_vendor`
            INNER JOIN vendor ON campaign_vendor.vendor_id=vendor.vendor_id
            WHERE campaign_vendor.campaign_id=$campaign AND vendor.status=1" ;

          $res=  GetDataTable($q);

          while ($row=mysqli_fetch_array($res)) {

         $vendor_id=   urlencode(base64_encode($row['vendor_id']));
         $cityadmin=cityadmin_detail($row['cityadmin_id']);
       $delivery_charges=  $row['delivery_charges']!='' || $row['delivery_charges']!=0 ? $row['delivery_charges'].' '.$cityadmin['currency']:'Free';
              ?>

                <div class="col-md-3 pb-3">

                    <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">

                        <div class="list-card-image">

                            <!--<div class="star position-absolute"><span class="badge badge-success"></i>Hattrick-->

                            <!--        Deals</span></div>-->

                            <!--<div class="favourite-heart text-danger position-absolute"><a href="javascript:;"><i-->

                            <!--            class="feather-heart"></i></a></div>-->

                            <div class="member-plan position-absolute"><span

                                    class="badge badge-dedo-deals"><?=$row['estimated_delivery_time']?></span></div>

                                    <!--<div class="star position-absolute"><span class="badge badge-success"><i class="feather-star"></i> 3.1 (300+)</span></div>-->



                            <a href="<?=BASE_URL?>campaigns-restaurant/<?=$row['slug']?>">

                                <img alt="#" src="<?=__ImageURL__.$row['main_image']?>"  class="img-fluid item-img w-100 loading">

                            </a>

                        </div>

                        <div class="p-3 padding-rest-name position-relative">

                            <div class="list-card-body">

                                <h6 class="mb-1 flex-parent" style="display: flex;align-items: center;">

                                    <div class="flex-child long-and-truncated" style="flex: 1;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;width:150px;">

                                    <a href="<?=BASE_URL?>campaigns-restaurant/<?=$row['slug']?>" class="text-black"><?=$row['vendor_name']?> </a>

                                    </div>

                                    <a href="#" class="res_rating"><?=$row['avg_cost_meal']?> </a>

                                </h6>

                                

                                <p class="text-gray mb-1 small"> <?=$row['keywords']!='' ? ' '.$row['keywords'] : ''?></p>

                                 <!--<p class="text-gray mb-1 small"><i class="fa fa-motorcycle"></i> <?=$row['estimated_delivery_time']?> minutes</p>-->

                                 <p class="text-gray mb-1 small"></p>

                                <p class="dim-text rest-rating"><span class="badge badge-success"><!-- <i

                                            class="feather-star"></i> 3.1</span>(1589) --></p>

                            </div>

                            <div class="list-card-badge">

                                 <span class="dfee">Delivery <?=$delivery_charges?></span>

                                 <span class="drate"><i class="feather-star"></i> 3.1 (2.4k)</span>

                            </div>

                        </div>

                    </div>

                </div>

<?php  }?>


            </div>



            



        </div>



    </div>



    <?php



if (!isset($_SESSION['source']) || $_SESSION['source']!='mobile') {

    include_once 'includes/footer.php';

}

?>



    <?php include 'includes/side-menu.php';?>



    <?php include_once 'includes/jslinks.php';?>





    <script>

        function openNav() {

            document.getElementById("mySidenav").style.width = "280px";

            // document.getElementById("body").style.backgroundColor = "red";



        }



        function closeNav() {

            document.getElementById("mySidenav").style.width = "0";

        }

    </script>

    

    <script>

            $(document).ready(function() {

              var owl = $('.owl-carousel');

              owl.owlCarousel({

                margin: 10,

                nav: true,

                loop: true,

                responsive: {

                  0: {

                    items: 1.4

                  },

                  768: {

                    items: 2.2

                  },

                  1000: {

                    items: 3.2

                  },

                  1200: {

                    items: 4

                  }

                }

              })

            })

          </script>

          

          <script type="text/javascript">

    	$('img').load(function(){

		   $(this).css('background','none');

		});

    </script>

</body>



</html>