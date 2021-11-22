<?php

include "../protected/config.php";

if (isset($_POST['get_product_varients'])) {

    $product_id=  $_POST['product_id'];
    $cityadmin_id=  $_POST['cityadmin_id'];
    $delivery_charges=  $_POST['delivery_charges'];
    $prodimage=  $_POST['prodimage'];
    $product_name=  $_POST['product_name'];
    $vendor_name=  $_POST['vendor_name'];
    $campaign_vendor_id=  $_POST['campaign_vendor_id'];
    $campaign_vendor_product_id=  $_POST['campaign_vendor_product_id'];
    $campaign_type_id=  $_POST['campaign_type_id'];
    $campaign_id=  $_POST['campaign_id'];
    $is_campaign=  $_POST['is_campaign'];
    //   getting franchise admin detail to get currency

    $cityadmin=cityadmin_detail($cityadmin_id);

    $currency=$cityadmin['currency']; ?>

<div class="modal-header" style="border-bottom:none;">

    <div class="modal-proimage justify-content-between">

        <img src="<?=__ImageURL__.$prodimage?>" width="200px"

            id="product_detail_image" alt="">

    </div>

    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

        <span aria-hidden="true">&times;</span>

    </button>

</div>

<div class="container modal-protext">

    <h5 class="modal-title" id="prod_title"><?=$product_name?></h5>

    <p>This Products is very tasty and has many more flavors.</p>

</div>



<div class="modal-body p-0">

    <div class="osahan-filter">

        <div class="filter">



            <div class="p-5 d-flex justify-content-between">
                <h6 class="m-0 txt-bold">Select variations</h6>
            </div>

            <?php

            $res=resturant_variant($product_id);

            $i=1;

            while ($row=mysqli_fetch_array($res)) {

            ?>



            <div class="custom-control border-bottom px-0  custom-radio">

                <input type="radio" id="prod_varient<?=$i?>"

                    name="prod_varient" class="custom-control-input prod_varient_chk"

                    data-i="<?=$i?>"

                    data-unit="<?=$row['unit']?>"

                    data-currency="<?=$currency?>"

                    data-price="<?=$row['strick_price']?>"

                    data-variantid="<?=$row['variant_id']?>"

                    data-vendorid="<?=$row['vendor_id']?>"
                    >

                <label class="custom-control-label py-5 w-100 px-3"

                    for="prod_varient<?=$i?>"><?=$row['quantity']?> <?=$row['unit']?>

                    (+<?=$currency?>

                    <?=$row['strick_price']?>) <strike>(+<?=$currency?>

                    <?=$row['price']?>)</strike></label>

            </div>

            <?php

            $i++;

                } ?>

            <small class="text-danger" id="prod_varient_error" style="display: none;">Please select

                varient first</small>

            <div class="p-5  d-flex justify-content-between">

                <h6 class="m-0 txt-bold">Select Quantity</h6>

                <p><a href="javascript:;" id="minus-product-qty" data-proid="" data-vendorid="" data-variantid=""

                        class="modal-qty"><span class="icon feather-minus"></span></a>

                    <span id="qtyShow">1</span>

                    <a href="javascript:;" id="plus-product-qty" data-proid="" data-vendorid="" data-variantid=""

                        class="modal-qty"><span class="feather-plus"></span></a>

                </p>

            </div>

                <?php 
                $addon_res= restaurant_product_addons($product_id);
                if($addon_res->num_rows>0){
                ?>

            <div class="p-5  d-flex justify-content-between">

                <h6 class="m-0 txt-bold">Add Ons<span class="modal-span">(Select your choice)</span></h6>

                <!--<p class="m-0">1 required</p>-->

            </div>

            <div class="container">

                <?php

                        
                    while ($addon=mysqli_fetch_array($addon_res)) {

                        ?>

                <label class="containerchk"><?=$addon['addon_name']?>

                    <small>(+<?=$currency?> <?=$addon['addon_price']?>)</small>

                    <input type="checkbox" name="product_addons_checkbox" class="product_addons_checkbox product_addons_chk"

                        data-product-addon-name="<?=$addon['addon_name']?>"

                        data-product-addon-price="<?=$addon['addon_price']?>"

                        data-product-addon-id="<?=$addon['id']?>">

                    <span class="checkmark"></span>

                </label>

                <?php

                } ?>

            </div>

            <?php

                } ?>




            <div class="p-5">

                <h6 class="m-0 txt-bold">Add a Note</h6>

                <!--<p class="m-0">Any specific preferences? Let the restaurant know.</p>-->

            </div>

            <div class="custom-control border-bottom px-2  custom-checkbox">

                <textarea placeholder="Anything else we need to know ?" class=" w-100 border-1 p-2" rows="5"

                    id="order_description"></textarea>

            </div>







            <!--<div class="p-5 bg-light border-bottom">-->

            <!--	<h6 class="m-0">If this product is not available</h6>-->

            <!--</div>-->

            <!--<div class="custom-control border-bottom px-2  custom-checkbox">-->

            <!--	<select class="custom-control w-100 px-2 py-5" style="margin-bottom: 100px;">-->

            <!--		<option class="">remove it from the order</option>-->

            <!--		<option class="">cancel the entire order</option>-->

            <!--		<option class="">call me and confirm</option>-->

            <!--	</select>-->

            <!--</div>-->

        </div>

    </div>

</div>

<div class="modal-footer p-0 border-0">

    <!--<div class="col-6 m-0 p-0">-->

    <!--    <button type="button" class="btn border-top btn-lg btn-block add-to-cart cart-price" data-type="checkout">-->

    <!--        <span class="product_price_btn"></span></button>-->

    <!--</div>-->

    <div class="col-12 m-0 p-0">

        <input type="hidden" id="prodname"

            value="<?=$_POST['product_name']?>">

        <input type="hidden" id="prodimage"

            value="<?=$_POST['prodimage']?>">

        <input type="hidden" id="prodid"

            value="<?=$_POST['product_id']?>">

        <input type="hidden" id="prodcurrency"

            value="<?=$currency?>">

        <input type="hidden" id="delivery_charges"

            value="<?=$_POST['delivery_charges']?>">

        <input type="hidden" id="restaurant_name"

            value="<?=$_POST['vendor_name']?>">

        <input type="hidden" id="estimated_delivery_time" value="<?=$_POST['estimated_delivery_time']?>">

        <input type="hidden" id="is_campaign" value="<?=$is_campaign?>">
        <input type="hidden" id="campaign_id" value="<?=$campaign_id?>">
        <input type="hidden" id="campaign_vendor_id" value="<?=$campaign_vendor_id?>">
        <input type="hidden" id="campaign_type_id" value="<?=$campaign_type_id?>">
        <input type="hidden" id="campaign_vendor_product_id" value="<?=$campaign_vendor_product_id?>">

        <button type="button" class="btn btn-cart btn-lg btn-block add-to-cart" data-type=""><span class="product_price_btn"></span><span class="cart_btn">Add To Cart</span></button>

    </div>

</div>

<?php

}

