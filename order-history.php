<!DOCTYPE html>
<html lang="en">

<head>

    <!-- include cssfiles -->
    <?php include 'includes/meta-tags.php'; ?>

    <!-- include cssfiles -->
    <?php include 'includes/csslinks.php'; ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.0/sweetalert2.min.css"
        integrity="sha512-qZl4JQ3EiQuvTo3ccVPELbEdBQToJs6T40BSBYHBHGJUpf2f7J4DuOIRzREH9v8OguLY3SgFHULfF+Kf4wGRxw=="
        crossorigin="anonymous" />

</head>

<body>
    <!-- include header -->
    <?php include 'includes/header.php'; ?>

    <div class="Ordermain">
        <div class="">
            <div class="bg-primary border-bottom p-05 d-flex align-items-center">
                <a class="toggle togglew toggle-2" href="#"><span></span></a>
                <h6 class="font-weight-bold m-0 text-white">Order History</h6>
            </div>
        </div>
        <section class="osahan-main-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <ul class="nav nav-tabsa custom-tabsa border-0 flex-column bg-white rounded overflow-hidden shadow-sm c-t-order"
                            id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link border-0 text-dark py-3 active tablinksorder"
                                    onclick="openTab(event, 'completed_orders')" id="defaultOpen">
                                    <i class="feather-check mr-2 text-success mb-0"></i> Completed</a>
                            </li>

                            <li class="nav-item border-top" role="presentation">
                                <a class="nav-link border-0 text-dark py-3 tablinksorder"
                                    onclick="openTab(event, 'confirmed_orders')">
                                    <i class="feather-clock mr-2 text-warning mb-0"></i> Confirmed</a>
                            </li>

                            <li class="nav-item border-top" role="presentation">
                                <a class="nav-link border-0 text-dark py-3 tablinksorder"
                                    onclick="openTab(event, 'pending_orders')">
                                    <i class="feather-clock mr-2 text-warning mb-0"></i> Pendings</a>
                            </li>

                            <li class="nav-item border-top" role="presentation">
                                <a class="nav-link border-0 text-dark py-3 tablinksorder"
                                    onclick="openTab(event, 'canceled_orders')">
                                    <i class="feather-x-circle mr-2 text-danger mb-0"></i> Canceled</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content col-md-9" id="myTabContent">
                        <div class="tab-pane tabcontent" id="completed_orders">
                            <div class="order-body">
                                <?php
                                $i=0;
                            $res=orders($_SESSION['user']['id'], 3);
                            while ($row=mysqli_fetch_array($res)) {
                                $i++;
                                ?>
                                <div class="pb-3">
                                    <div class="p-3 rounded shadow-sm bg-white">
                                        <div class="d-flex border-bottom pb-3">
                                            <div class="text-muted mr-3">
                                                <img alt=""
                                                    src="<?=__ImageURL__.$row['main_image']?>"
                                                    class="img-fluid order_img rounded">
                                            </div>
                                            <div>
                                                <p class="mb-0 font-weight-bold"><a
                                                        href="<?=BASE_URL?>restaurant/<?=$row['slug']?>"
                                                        class="text-dark"><?=$row['vendor_name']?></a>
                                                </p>

                                                <p>ORDER #<?=$row['cart_no']?>
                                                </p>
                                                <!-- <p class="mb-0 small"><a href="javascript:;">View Details</a></p> -->
                                            </div>
                                            <div class="ml-auto">
                                                <p class="bg-success text-white py-1 px-2 rounded small mb-1">Completed
                                                </p>
                                                <p class="small font-weight-bold text-center"><i
                                                        class="feather-clock"></i> <?=date('d-M-Y h:i:s a', strtotime($row['created_at']))?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="d-flex pt-3">
                                            <div class="small">
                                                <?php
                                            $order_res=order_details($row['id']);
                                while ($row1=mysqli_fetch_array($order_res)) {
                                    ?>
                                                <p class="text- font-weight-bold mb-0"><?=$row1['product_name']?>
                                                    x <?=$row1['product_quantity']?>
                                                </p>
                                                <?php
                                } ?>
                                            </div>
                                            <div class="text-muted m-0 ml-auto mr-3 small">Total Payment<br>
                                                <span class="text-dark font-weight-bold"><?=$row['currency'].' '.$row['net_amount']?></span>
                                            </div>
                                            <div class="text-right">

                                            <a href="javascript:;" class="favorite_btn" data-orderid="<?=$row['id']?>" id="favorite_btn<?=$i?>" data-i="<?=$i?>">
                                            <?php 
                                            $check_favourite_q="SELECT * FROM `user_favourites` WHERE type='order' AND type_id=".$row['id'];
                                            $count_favourite=rows_count($check_favourite_q);
                                            if($count_favourite>0){
                                                $icon='fas fa-heart';
                                            }else{
                                                $icon='far fa-heart';
                                            }
                                            ?>
                                            <i class="<?=$icon?>"></i>
                                            </a>
                                                <!-- <a href="javascript:;" class="btn btn-primary px-3">Track</a>
                                                <a href="javascript:;" class="btn btn-outline-primary px-3">Help</a> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>

                            </div>
                        </div>
                        <!-- Confirmed Order Tab -->
                        <div class="tab-pane  tabcontent" id="confirmed_orders">
                            <div class="order-body">
                                <?php
                            $res=orders($_SESSION['user']['id'], 2);
                            while ($row=mysqli_fetch_array($res)) {
                                $i++;
                                ?>
                                <div class="pb-3">
                                    <div class="p-3 rounded shadow-sm bg-white">
                                        <div class="d-flex border-bottom pb-3">
                                            <div class="text-muted mr-3">
                                                <img alt=""
                                                    src="<?=__ImageURL__.$row['main_image']?>"
                                                    class="img-fluid order_img rounded">
                                            </div>
                                            <div>
                                                <p class="mb-0 font-weight-bold"><a
                                                        href="<?=BASE_URL?>restaurant/<?=$row['slug']?>"
                                                        class="text-dark"><?=$row['vendor_name']?></a>
                                                </p>

                                                <p>ORDER #<?=$row['cart_no']?>
                                                </p>
                                                <!-- <p class="mb-0 small"><a href="javascript:;">View Details</a></p> -->
                                            </div>
                                            <div class="ml-auto">
                                                <p class="bg-primary text-white py-1 px-2 rounded small mb-1">Confirmed
                                                </p>
                                                <p class="small font-weight-bold text-center"><i
                                                        class="feather-clock"></i> <?=date('d-M-Y h:i:s a', strtotime($row['created_at']))?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="d-flex pt-3">
                                            <div class="small">
                                                <?php
                                            $order_res=order_details($row['id']);
                                while ($row1=mysqli_fetch_array($order_res)) {
                                    ?>
                                                <p class="text- font-weight-bold mb-0"><?=$row1['product_name']?>
                                                    x <?=$row1['product_quantity']?>
                                                </p>
                                                <?php
                                } ?>
                                            </div>
                                            <div class="text-muted m-0 ml-auto mr-3 small">Total Payment<br>
                                                <span class="text-dark font-weight-bold"><?=$row['currency'].' '.$row['net_amount']?></span>
                                            </div>
                                            <div class="text-right">
                                            <a href="javascript:;" class="favorite_btn" data-orderid="<?=$row['id']?>" id="favorite_btn<?=$i?>" data-i="<?=$i?>">
                                            <?php 
                                            $check_favourite_q="SELECT * FROM `user_favourites` WHERE type='order' AND type_id=".$row['id'];
                                            $count_favourite=rows_count($check_favourite_q);
                                            if($count_favourite>0){
                                                $icon='fas fa-heart';
                                            }else{
                                                $icon='far fa-heart';
                                            }
                                            ?>
                                            <i class="<?=$icon?>"></i>
                                           
                                            </a>
                                                <!--<a href="javascript:;" class="btn btn-primary px-3">Track</a>-->
                                                <!--<a href="javascript:;" class="btn btn-outline-primary px-3">Help</a>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>

                            </div>
                        </div>
                        <!--End Confirmed Order Tab -->
                        <!-- Pending Order Tab -->
                        <div class="tab-pane  tabcontent" id="pending_orders">
                            <div class="order-body">
                                <?php
                            $res=orders($_SESSION['user']['id'], 1);
                            while ($row=mysqli_fetch_array($res)) {
                                $i++;
                                ?>
                                <div class="pb-3">
                                    <div class="p-3 rounded shadow-sm bg-white">
                                        <div class="d-flex border-bottom pb-3">
                                            <div class="text-muted mr-3">
                                                <img alt=""
                                                    src="<?=__ImageURL__.$row['main_image']?>"
                                                    class="img-fluid order_img rounded">
                                            </div>
                                            <div>
                                                <p class="mb-0 font-weight-bold"><a
                                                        href="<?=BASE_URL?>restaurant/<?=$row['slug']?>"
                                                        class="text-dark"><?=$row['vendor_name']?></a>
                                                </p>

                                                <p>ORDER #<?=$row['cart_no']?>
                                                </p>
                                                <!-- <p class="mb-0 small"><a href="javascript:;">View Details</a></p> -->
                                            </div>
                                            <div class="ml-auto">
                                                <p class="bg-warning text-white py-1 px-2 rounded small mb-1">Pending
                                                </p>
                                                <p class="small font-weight-bold text-center"><i
                                                        class="feather-clock"></i> <?=date('d-M-Y h:i:s a', strtotime($row['created_at']))?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="d-flex pt-3">
                                            <div class="small">
                                                <?php
                                            $order_res=order_details($row['id']);
                                while ($row1=mysqli_fetch_array($order_res)) {
                                    ?>
                                                <p class="text- font-weight-bold mb-0"><?=$row1['product_name']?>
                                                    x <?=$row1['product_quantity']?>
                                                </p>
                                                <?php
                                } ?>
                                            </div>
                                            <div class="text-muted m-0 ml-auto mr-3 small">Total Payment<br>
                                                <span class="text-dark font-weight-bold"><?=$row['currency'].' '.$row['net_amount']?></span>
                                            </div>
                                            <div class="text-right">
                                                <!--<a href="javascript:;" class="btn btn-primary px-3">Track</a>-->
                                                <!--<a href="javascript:;" class="btn btn-outline-primary px-3">Help</a>-->
                                                <a href="javascript:;" class="favorite_btn" data-orderid="<?=$row['id']?>" id="favorite_btn<?=$i?>" data-i="<?=$i?>">
                                                <?php 
                                                    $check_favourite_q="SELECT * FROM `user_favourites` WHERE type='order' AND type_id=".$row['id'];
                                                    $count_favourite=rows_count($check_favourite_q);
                                                    if($count_favourite>0){
                                                        $icon='fas fa-heart';
                                                    }else{
                                                        $icon='far fa-heart';
                                                    }
                                                    ?>
                                                    <i class="<?=$icon?>"></i>
                                                </a>
                                                <a href="dm/chat/<?=$row['vendor_id']?>"
                                                   class="btn btn-outline-danger px-3 chat_btn"
                                                   data-orderid="<?=$row['id']?>"
                                                   data-vendorid="<?=$row['vendor_id']?>">Chat</a>
                                                <a href="javascript:;"
                                                    class="btn btn-outline-danger px-3 cancel_order_btn"
                                                    data-orderid="<?=$row['id']?>"
                                                    data-vendorid="<?=$row['vendor_id']?>" data-cartno="<?=$row['cart_no']?>">Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>

                            </div>
                        </div>
                        <!--End Pending Order Tab -->

                        <!-- Canceled Order Tab -->
                        <div class="tab-pane tabcontent" id="canceled_orders">
                            <div class="order-body">
                                <?php
                            $res=orders($_SESSION['user']['id'], 4);
                            while ($row=mysqli_fetch_array($res)) {
                                $i++;
                                ?>
                                <div class="pb-3">
                                    <div class="p-3 rounded shadow-sm bg-white">
                                        <div class="d-flex border-bottom pb-3">
                                            <div class="text-muted mr-3">
                                                <img alt=""
                                                    src="<?=__ImageURL__.$row['main_image']?>"
                                                    class="img-fluid order_img rounded">
                                            </div>
                                            <div>
                                                <p class="mb-0 font-weight-bold"><a
                                                        href="<?=BASE_URL?>restaurant/<?=$row['slug']?>"
                                                        class="text-dark"><?=$row['vendor_name']?></a>
                                                </p>

                                                <p>ORDER #<?=$row['cart_no']?>
                                                </p>
                                                <!-- <p class="mb-0 small"><a href="javascript:;">View Details</a></p> -->
                                            </div>
                                            <div class="ml-auto">
                                                <p class="bg-danger text-white py-1 px-2 rounded small mb-1">Cancelled
                                                </p>
                                                <p class="small font-weight-bold text-center"><i
                                                        class="feather-clock"></i> <?=date('d-M-Y h:i:s a', strtotime($row['created_at']))?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="d-flex pt-3">
                                            <div class="small">
                                                <?php
                                            $order_res=order_details($row['id']);
                                while ($row1=mysqli_fetch_array($order_res)) {
                                    ?>
                                                <p class="text- font-weight-bold mb-0"><?=$row1['product_name']?>
                                                    x <?=$row1['product_quantity']?>
                                                </p>
                                                <?php
                                } ?>
                                            </div>
                                            <div class="text-muted m-0 ml-auto mr-3 small">Total Payment<br>
                                                <span class="text-dark font-weight-bold"><?=$row['currency'].' '.$row['net_amount']?></span>
                                            </div>
                                            <div class="text-right">
                                           <a href="javascript:;" class="favorite_btn" data-orderid="<?=$row['id']?>" id="favorite_btn<?=$i?>" data-i="<?=$i?>">
                                           <?php 
                                            $check_favourite_q="SELECT * FROM `user_favourites` WHERE type='order' AND type_id=".$row['id'];
                                            $count_favourite=rows_count($check_favourite_q);
                                            if($count_favourite>0){
                                                $icon='fas fa-heart';
                                            }else{
                                                $icon='far fa-heart';
                                            }
                                            ?>
                                            <i class="<?=$icon?>"></i>
                                           </a>
                                                <!--<a href="javascript:;" class="btn btn-primary px-3">Track</a>-->
                                                <!--<a href="javascript:;" class="btn btn-outline-primary px-3">Help</a>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>

                            </div>
                        </div>
                        <!--End Canceled Order Tab -->
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- Modal -->
    <form method="POST" id="cancel_form">
        <div class="modal fade" id="cancel_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Order Cancellation Reason</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <select name="cancelation_msg" id="cancelation_msg" class="form-control">
                                        <option value="" selected disabled>Select Reason</option>
                                        <?php
                                    $cancel_Q="SELECT * FROM `cancellation_msg` WHERE status=1";
                                   $cancel_res= GetDataTable($cancel_Q);
                                   while ($row_data=mysqli_fetch_array($cancel_res)) {
                                       ?>
                                        <option
                                            value="<?=$row_data['message']?>">
                                            <?=$row_data['message']?>
                                        </option>
                                        <?php
                                   }?>
                                    </select>
                                </div>

                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" id="other_reason"
                                            name="other_reason">
                                        Other
                                    </label>
                                </div>

                                <div class="form-group" id="custom_reason_div" style="display: none;">
                                    <label for="">Enter Your Reason</label>
                                    <textarea class="form-control" name="cancelation_msg_custom"
                                        id="cancelation_msg_custom" rows="3"></textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="order_id" id="order_id">
                        <input type="hidden" name="cart_no" id="cart_no">
                        <input type="hidden" name="vendor_id" id="vendor_id">
                        <input type="hidden" name="cancel_order">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php

if ($_SESSION['source']!='mobile') {
    include_once 'includes/footer.php';
}
?>
    <?php include_once 'includes/side-menu.php';?>

    <?php include_once 'includes/jslinks.php';?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.0/sweetalert2.min.js"
        integrity="sha512-jJHgrGWRvOyyVt4TghrM7L+HSb02QkXJPPBJhDIkiqEzUYWBKe76GVVsZggmjZWOmsPwS0WSPIvyUGZzJta8kg=="
        crossorigin="anonymous"></script>
    <script>
        function openTab(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinksorder");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
    </script>
    <script>
        $(document).ready(function() {
            $('.cancel_order_btn').on('click', function() {
                var order_id = $(this).data('orderid');
                var vendor_id = $(this).data('vendorid');
                var cartno = $(this).data('cartno');
                $('#order_id').val(order_id);
                $('#vendor_id').val(vendor_id);
                $('#cart_no').val(cartno);
                $('#cancel_modal').modal('toggle');
            });
            $('#other_reason').on('click', function() {
                if ($("#other_reason").prop('checked') == true) {
                    $('#custom_reason_div').show();
                } else {
                    $('#custom_reason_div').hide();
                }
            });
            $("#cancel_form").on('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You Want To Cancel The Order!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, cancel it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "backend/order_history_ajax.php",
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
                                var data=JSON.parse(data);
                                if (data.status == 'success') {
                                    alertMsg('Order Cancelled');
                                    window.location.reload();
                                } else if (data.status == 'error') {
                                    alertMsg('Error!! Try Again','error');
                                }
                            },error:function(){
                                Swal.close();
                            }
                        });

                    }
                })
            });

            $('.favorite_btn').on('click', function () {
                var order_id=$(this).data('orderid');
                var i=$(this).data('i');
                $.ajax({
                    type: "post",
                    url: "backend/order_history_ajax.php",
                    data: {
                        add_to_favorite:true,
                        order_id:order_id
                    },
                    beforeSend:function(){
                        loader();
                    },
                    success: function (data) {
                        swal.close();
                        var data=JSON.parse(data);
                        if(data.status=='success'){
                            $('#favorite_btn'+i).html('<i class="fas fa-heart"></i>');
                        }else if(data.status=='found'){
                            $('#favorite_btn'+i).html('<i class="far fa-heart"></i>');
                        }
                    },error:function(){
                        swal.close();
                    }
                });
            });
        });
    </script>

</body>

</html>