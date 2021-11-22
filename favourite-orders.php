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
    <div class="osahan-favorites">
        <div class="">
            <div class="bg-primary border-bottom p-3 d-flex align-items-center">
                <a class="toggle togglew toggle-2" href="#"><span></span></a>
                <h4 class="font-weight-bold m-0 text-white">Favorites</h4>
            </div>
        </div>

        <div class="container most_popular py-5">
            <h2 class="font-weight-bold mb-3">Favorites</h2>
            <div class="row">
                <?php
       $res= user_favourites_order_list($_SESSION['user']['id']);
       while ($row=mysqli_fetch_array($res)) {
           ?>
                <div class="col-md-4 mb-3">
                    <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm grid-card">
                        <div class="list-card-image">
                            <!-- <div class="star position-absolute"><span class="badge badge-success"><i class="feather-star"></i> 3.1 (300+)</span></div> -->
                            <div class="favourite-heart text-danger position-absolute"><a href="javascript:;"><i
                                        class="fa fa-heart"></i></a></div>
                            <!-- <div class="member-plan position-absolute"><span class="badge badge-dark">Promoted</span></div> -->
                            <a
                                href="<?=BASE_URL?>restaurant/<?=$row['slug']?>">
                                <img alt=""
                                    src="<?=__ImageURL__.$row['main_image']?>"
                                    class="img-fluid item-img w-100">
                            </a>
                        </div>
                        <div class="p-3 position-relative">
                            <div class="list-card-body">
                                <h6 class="mb-1"><a
                                        href="<?=BASE_URL?>restaurant/<?=$row['slug']?>"
                                        class="text-black"><?=$row['vendor_name']?>
                                    </a>
                                </h6>
                                <!-- <p class="text-gray mb-3">North • Hamburgers • Pure veg</p>
                            <p class="text-gray mb-3 time"><span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"><i class="feather-clock"></i> 15–25 min</span> <span class="float-right text-black-50"> $500 FOR TWO</span></p> -->
                            </div>
                            <div class="list-card-badge">
                                <a href="javascript:;" class="btn btn-primary text-white float-right reorder_btn"
                                    data-orderid="<?=$row['type_id']?>">
                                    Re-Order
                                </a>
                                <div class="small">

                                    <?php
                                            $order_res=order_details($row['type_id']);
           while ($row1=mysqli_fetch_array($order_res)) {
               ?>
                                    <p class="text- font-weight-bold mb-0"><?=$row1['product_name']?>
                                        x <?=$row1['product_quantity']?>
                                    </p>
                                    <?php
           } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
       }?>
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
            $(document).ready(function() {
                $('.reorder_btn').on('click', function() {
                    var order_id = $(this).data('orderid');
                    console.log(order_id);
                    $.ajax({
                        type: "post",
                        url: "backend/favourite_orders_ajax.php",
                        data: {
                            re_order: true,
                            order_id: order_id
                        },
                        beforeSend: function() {
                            loader();
                        },
                        success: function(data) {
                            swal.close();
                            var data = JSON.parse(data);
                            console.log(data);
                            $.each(data, function(i, v) {
                                console.log(v);
                                shoppingCartRSB.addItemToCart(v.prodid, v.variantid,
                                v.vendorid, v.count, v.prodname, v.prodimage, v.unit,
                                v.currency, v.price, v.order_description,
                                v.delivery_charges, v.product_addons,
                                v.restaurant_name, v.estimated_delivery_time);
                                displayCart();
                                DisplaySingleCartValues(v.prodid, v.variantid,
                                v.vendorid);
                            });
                            if (data.status == 'SessionExpired') {
                                window.location.reload();
                            }
                        },
                        error: function() {
                            swal.close();
                        }
                    });
                });
            });
        </script>

</body>

</html>