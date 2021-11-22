// ************************************************

// Shopping Cart API

// ************************************************

// showing pop msg

var shoppingCartRSB = (function () {

    // =============================

    // Private methods and propeties

    // =============================

    cart = [];





    // Constructor

    function Item(prodid, variantid, vendorid, campaign_vendor_product_id, count, prodname, prodimage, unit, currency, price, order_description, delivery_charges, product_addons, restaurant_name, estimated_delivery_time, is_campaign) {

        this.prodid = prodid;

        this.variantid = variantid;

        this.vendorid = vendorid;

        this.campaign_vendor_product_id = campaign_vendor_product_id;

        this.count = count;

        this.prodname = prodname;

        this.prodimage = prodimage;

        this.unit = unit;

        this.currency = currency;

        this.price = price;

        this.order_description = order_description;

        this.delivery_charges = delivery_charges;

        this.product_addons = product_addons;

        this.restaurant_name = restaurant_name;

        this.estimated_delivery_time = estimated_delivery_time;

        this.is_campaign = is_campaign;

    }



    // Save cart

    function saveCart() {

        localStorage.setItem('shoppingCartRSB', JSON.stringify(cart));

    }



    // Load cart

    function loadCart() {

        cart = JSON.parse(localStorage.getItem('shoppingCartRSB'));

    }

    if (localStorage.getItem("shoppingCartRSB") != null) {

        loadCart();

    }





    // =============================

    // Public methods and propeties

    // =============================

    var obj = {};



    // Add to cart

    obj.addItemToCart = function (prodid, variantid, vendorid, campaign_vendor_product_id, count, prodname, prodimage, unit, currency, price, order_description, delivery_charges, product_addons, restaurant_name, estimated_delivery_time, is_campaign) {



        if (prodid == undefined || vendorid == undefined || variantid == undefined) {

            return false;

        }



        for (var item in cart) {

            if (cart[item].prodid == prodid && cart[item].vendorid == vendorid && cart[item].variantid == variantid && cart[item].campaign_vendor_product_id == campaign_vendor_product_id) {

                cart[item].count++;

                saveCart();

                return;

            }



        }

        var item = new Item(prodid, variantid, vendorid, campaign_vendor_product_id, count, prodname, prodimage, unit, currency, price, order_description, delivery_charges, product_addons, restaurant_name, estimated_delivery_time, is_campaign);

        cart.push(item);



        saveCart();

    }

    // Set count from item

    obj.setCountForItem = function (prodid, variantid, vendorid, campaign_vendor_product_id, count) {

        for (var i in cart) {

            if (cart[i].prodid == prodid && cart[i].vendorid == vendorid && cart[i].variantid == variantid && cart[item].campaign_vendor_product_id == campaign_vendor_product_id) {

                cart[i].count = count;

                break;

            }

        }

    };

    // Remove item from cart

    obj.removeItemFromCart = function (prodid, variantid, vendorid, campaign_vendor_product_id) {

        for (var item in cart) {

            if (cart[item].prodid == prodid && cart[item].vendorid == vendorid && cart[item].variantid == variantid && cart[item].campaign_vendor_product_id == campaign_vendor_product_id) {

                cart[item].count--;

                if (cart[item].count === 0) {

                    cart.splice(item, 1);

                }

                break;

            }

        }

        saveCart();

    }

    // Remove all items from cartremoveItemFromCart(prodid,type,SelectedFeatureID)

    obj.removeItemFromCartAll = function (prodid, variantid, vendorid, campaign_vendor_product_id) {

        for (var item in cart) {

            if (cart[item].prodid == prodid && cart[item].variantid == variantid && cart[item].vendorid == vendorid && cart[item].campaign_vendor_product_id == campaign_vendor_product_id) {

                cart.splice(item, 1);

                break;

            }

        }

        saveCart();

    }



    obj.TotalDeliveryCharges = function (prodid, variantid, vendorid, campaign_vendor_product_id) {

        var delivery_charges = 0;

        for (var item in cart) {

            if (cart[item].prodid == prodid && cart[item].variantid == variantid && cart[item].vendorid == vendorid && cart[item].campaign_vendor_product_id == campaign_vendor_product_id) {

                delivery_charges += parseFloat(cart[item].delivery_charges);

                break;

            }

        }

    }



    // Clear cart

    obj.clearCart = function () {

        cart = [];

        saveCart();

    }



    // Count cart 

    obj.totalCount = function () {

        var totalCount = 0;

        for (var item in cart) {
            totalCount += 1;

        }

        return totalCount;

    }



    // Total cart

    obj.totalCart = function () {

        var totalCart = 0;

        for (var item in cart) {

            totalCart += cart[item].price * cart[item].count;

        }

        return Number(totalCart.toFixed(2));

    }



    // List cart

    obj.listCart = function () {

        var cartCopy = [];

        for (i in cart) {

            item = cart[i];

            itemCopy = {};

            for (p in item) {

                itemCopy[p] = item[p];



            }

            itemCopy.total = Number(item.price * item.count).toFixed(2);

            cartCopy.push(itemCopy)

        }

        return cartCopy;

    }



    obj.DisplayItemQty = function (prodid, variantid, vendorid, campaign_vendor_product_id) {

        var totalQtyCount = 0;

        for (var item in cart) {

            if (cart[item].prodid == prodid && cart[item].variantid == variantid && cart[item].vendorid == vendorid && cart[item].campaign_vendor_product_id == campaign_vendor_product_id) {

                totalQtyCount = cart[item].count;

            }

        }

        return totalQtyCount;

    }

    // cart : Array

    // Item : Object/Class

    // addItemToCart : Function

    // removeItemFromCart : Function

    // removeItemFromCartAll : Function

    // clearCart : Function

    // countCart : Function

    // totalCart : Function

    // listCart : Function

    // saveCart : Function

    // loadCart : Function

    return obj;

})();





// *****************************************

// Triggers / Events

// ***************************************** 





// Clear items

$(document).on('click', '.clear-cart', function () {

    shoppingCartRSB.clearCart();

    //  $('.total-cart').html('0.00');

    displayCart();

    window.location.reload();

});



// Add item

//shoppingCartRSB.clearCart();

$(document).on('click', '.add-to-cart', function (e) {

    e.preventDefault();


    var product_addons = [];
    $('input:checkbox[name=product_addons_checkbox]:checked').each(function () {
        var addon = {};
        addon['id'] = (this.checked ? $(this).data('product-addon-id') : "");
        addon['name'] = (this.checked ? $(this).data('product-addon-name') : "");
        addon['price'] = (this.checked ? $(this).data('product-addon-price') : 0);
        product_addons.push(addon);
    });

    var i = $('input[name="prod_varient"]:checked').data('i');

    var unit = $('input[name="prod_varient"]:checked').data('unit');

    var currency = $('input[name="prod_varient"]:checked').data('currency');

    var price = Number($('input[name="prod_varient"]:checked').data('price'));

    var variantid = Number($('input[name="prod_varient"]:checked').data('variantid'));

    var vendorid = Number($('input[name="prod_varient"]:checked').data('vendorid'));





    var prodid = $('#prodid').val();

    var prodname = $('#prodname').val();

    var prodimage = $('#prodimage').val();

    var order_description = $('#order_description').val();

    var delivery_charges = $('#delivery_charges').val();

    var restaurant_name = $('#restaurant_name').val();

    var estimated_delivery_time = $('#estimated_delivery_time').val();

    var count = parseInt($('#qtyShow').text());

    var is_campaign = $('#is_campaign').val();


    var campaign_vendor_product_id = '';
    if (is_campaign == 'yes') {
        campaign_vendor_product_id = $('input[name="prod_varient"]:checked').data('campaign-vendor-product-id');
    }

    if (prodid == undefined || isNaN(variantid) || isNaN(vendorid) || variantid == undefined || vendorid == undefined) {

        $('#prod_varient_error').show();

        return false;

    }
    if (prodid < 1) {
        return false;
    }
    if (prodid > 1) {

        // showing pop msg

        const Toast = Swal.mixin({ //when firing the toast, the first window closes automatically

            toast: true,

            position: 'top-end',

            showConfirmButton: false,

            timer: 1500

        });

        Toast.fire({

            icon: 'success',

            title: prodname + ' is Added'

        });

        //end pop up

        shoppingCartRSB.addItemToCart(prodid, variantid, vendorid, campaign_vendor_product_id, count, prodname, prodimage, unit, currency, price, order_description, delivery_charges, product_addons, restaurant_name, estimated_delivery_time, is_campaign);

        displayCart();

        DisplaySingleCartValues(prodid, variantid, vendorid, campaign_vendor_product_id);

        var btn_type = $(this).data('type');

        if (btn_type == 'checkout') {

            window.location.href = BASE_URL + 'cart';

        } else {

            $('#prod-varient-modal').modal('toggle');

        }

        //alert("bob");

        //addToCart($(this).attr("id"));

    }

});





function displayCart() {

    var cartArray = shoppingCartRSB.listCart();

    console.log(cartArray);

    var delivery_charges = 0;

    var output = "";

    var output_mbl = "";

    var vendor_id_for_restaurant = [];

    var vendor_id_arr = [];

    var total_addon_price = 0;

    for (var i in cartArray) {



        if (cartArray[i].count == 1) {

            var displayMinus = 'fa fa-trash-o';

        } else {

            var displayMinus = 'fa fa-minus';

        }

        if (cartArray[i].count === undefined || cartArray[i].count === null) {

            var count = 1;

        } else {

            var count = cartArray[i].count;

        }

        if (!isNaN(cartArray[i].delivery_charges) && cartArray[i].delivery_charges != undefined && cartArray[i].delivery_charges.length > 0) {



            if ($.inArray(cartArray[i].vendorid, vendor_id_arr) == -1) {

                delivery_charges += parseFloat(cartArray[i].delivery_charges);

                vendor_id_arr.push(cartArray[i].vendorid);

            }



        }

        var mobile_view_restaurarent_title = "";

        if ($.inArray(cartArray[i].vendorid, vendor_id_for_restaurant) == -1) {



            vendor_id_for_restaurant.push(cartArray[i].vendorid);



            output += '<tr><td colspan="4" class="cart-bold-text">' + cartArray[i].restaurant_name + '<span class="badge badge-dedo-deals ml-2">' + cartArray[i].estimated_delivery_time + '</span></td></tr>';



            mobile_view_restaurarent_title = '<label style="font-size:12px;color:grey;">' + cartArray[i].restaurant_name + '<span class="badge badge-dedo-deals ml-2">' + cartArray[i].estimated_delivery_time + '</span></label>';

        }



        var product_addon_name = "";

        var product_addon_price = 0;



        $.each(cartArray[i].product_addons, function (i, data) {


            product_addon_name += data.name + ' ,';



            product_addon_price = parseFloat(product_addon_price) + parseFloat(data.price);

            product_addon_price = product_addon_price.toFixed(2);





            total_addon_price = parseFloat(total_addon_price) + parseFloat(data.price);

            total_addon_price = total_addon_price.toFixed(2);

        });

        var total_product_price = parseFloat(cartArray[i].total) + parseFloat(product_addon_price);

        total_product_price = total_product_price.toFixed(2);

        product_addon_name = product_addon_name.replace(/,\s*$/, "");

        product_addon_name = product_addon_name != '' ? '( ' + product_addon_name + ' )' : '';

        var product_addon_price_div = product_addon_price != 0 ? '(+ ' + product_addon_price + ' )' : '';

        output += '<tr>' +

            '<td>' +

            '<div class="d-flex justify-content-start select-none">' +

            '<div class="product-cart">' +

            '<img src="' + ImageURL + cartArray[i].prodimage + '" alt="" class="img-fluid">' +

            '</div>' +

            '<div class="product-cart-title pt50">' +

            '<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' + cartArray[i].prodname + '<small style="color:#dc3545">(' + cartArray[i].unit + ')</small>' +

            '<br><small class="ml-5">' + product_addon_name + '</small>' +

            '</span>' +

            '</div>' +

            '</div>' +

            '</td>' +

            '<td>' +

            '<strong class="d-inline-block pt50" style="font-size: 18px;">' + cartArray[i].currency + cartArray[i].price +

            '<small>' + product_addon_price_div + '</small>' +

            '</strong>' +

            '</td>' +

            '<td>' +

            '<div class="d-flex align-items-center pt50">' +

            '<div>' +

            '<span class="minus-text text-dark btn btn-danger minus-item" id="minusButton" type="button"' +

            'data-prodid="' + cartArray[i].prodid + '" data-variantid="' + cartArray[i].variantid + '" data-vendorid="' + cartArray[i].vendorid + '" data-campaign-vendor-product-id="' + cartArray[i].campaign_vendor_product_id + '">' +

            '<i class="' + displayMinus + '"></i></span>' +

            '<span  id="displayCount" class="d-inline-block px-1 " style="font-size: 20px;">' + count + '</span>' +

            '<span class="plus-text text-dark btn btn-success padding0 plus-item" id="countButton" type="button"' + 'data-prodid="' + cartArray[i].prodid + '" data-variantid="' + cartArray[i].variantid + '" ' +

            'data-vendorid="' + cartArray[i].vendorid + '" data-campaign-vendor-product-id="' + cartArray[i].campaign_vendor_product_id + '">' +

            '<i class="fa fa-plus"></i></span>' +

            '</div>' +

            '</div>' +

            '</td>' +

            '<td class="middle-middle">' +

            '<strong class="d-inline-block pt50" style="font-size: 18px;">' + cartArray[i].currency + total_product_price + '</strong>' +

            '<a href="javascript:;" class="delete-cart-product" data-prodid="' + cartArray[i].prodid + '" ' +

            'data-variantid="' + cartArray[i].variantid + '" data-vendorid="' + cartArray[i].vendorid + '" data-campaign-vendor-product-id="' + cartArray[i].campaign_vendor_product_id + '"><i class="fa fa-window-close text-danger" style="font-size:24px"></i></a>' +

            '</td>' +

            '</tr>';

        ///Close



        output_mbl += '<div class="col-xs-12 mb-cart-main">' +

            mobile_view_restaurarent_title +

            '<a href="javascript:;" class="delete-cart-product float-right" data-prodid="' + cartArray[i].prodid + '" data-variantid="' + cartArray[i].variantid + '" data-vendorid="' + cartArray[i].vendorid + '" data-campaign-vendor-product-id="' + cartArray[i].campaign_vendor_product_id + '">' +

            '<i class="fa fa-window-close" style="font-size:18px"></i></a>' +

            '<div class="col-xs-12">' +

            '<div class="col-xs-3 cart-p1 ">' +

            '<img src="' + ImageURL + cartArray[i].prodimage + '" alt="" class="img-fluid cart-mobile-product">' +

            '</div>' +

            '<div class="col-xs-9 cart-dtl">' +



            '<h6>' + cartArray[i].prodname + '</h6>' +

            '<small>' + product_addon_name + '</small>' +

            '<p>' + cartArray[i].unit + '</p>' +



            '<div class="rst">' +

            '<h2 class="cart-mobile-price"><span>' + cartArray[i].currency + ' ' + cartArray[i].price +

            '<small>' + product_addon_price_div + '</small>' +

            '</span></h2>' +





            '<div class="rst2">' +

            '<span class="minus-text text-dark btn minus-item mb-minus" id="minusButton1"' +

            'data-prodid="' + cartArray[i].prodid + '" data-variantid="' + cartArray[i].variantid + '" data-vendorid="' + cartArray[i].vendorid + '" data-campaign-vendor-product-id="' + cartArray[i].campaign_vendor_product_id + '">' +

            '<i class="' + displayMinus + '"></i></span>' +

            '<span id="displayCount1" class="d-inline-block px-1" style="font-size: 16px;">' + count + '</span>' +

            '<span class="plus-text  text-dark btn plus-item mb-plus" id="countButton1"' +

            'data-prodid="' + cartArray[i].prodid + '" data-variantid="' + cartArray[i].variantid + '" data-vendorid="' + cartArray[i].vendorid + '" data-campaign-vendor-product-id="' + cartArray[i].campaign_vendor_product_id + '">' +

            '<i class="fa fa-plus"></i></span>' +

            '</div>' +

            '</div>' +

            '</div>' +

            '</div>' +

            /* '<h2 class="cart-mobile-price pt-5 color-pink">Total : 700 PKR</h2>'+ */

            '</div>';



    }

    var totalItems = cartArray.length;

    $('.show-cart').html(output);

    $('.show-cart-mobile').html(output_mbl);

    var TotalCart = 0;

    if (totalItems > 0) {

        $('.total-cart').html(shoppingCartRSB.totalCart().toFixed(2));

        var dicount = shoppingCartRSB.totalCart() * 0;

        TotalCart = shoppingCartRSB.totalCart().toFixed(2);

        TotalCart = (parseFloat(TotalCart) + parseFloat(total_addon_price)).toFixed(2);

        var DeliveryFee = 0;

        $('.DeliverFeeAmt').html(delivery_charges);

        var AfterDeliveryFee = parseFloat(TotalCart) + parseFloat(delivery_charges);

        $('.total-cartNet').html(AfterDeliveryFee.toFixed(2));



    } else {

        $('.total-countOfQty').html(shoppingCartRSB.totalCount());

    }

    $('.total-cart').html(TotalCart);

    $('.total-countOfQty').html(shoppingCartRSB.totalCount());



}

// display cart end



function displayCartCheckOut() {



    var cartArray = shoppingCartRSB.listCart();

    var delivery_charges = 0;

    var total_addon_price = 0;

    var output = "";

    for (var i in cartArray) {

        vendor_id_arr = [];



        if (cartArray[i].count === undefined || cartArray[i].count === null) {

            var count = 1;

        } else {

            var count = cartArray[i].count;

        }

        if (cartArray[i].delivery_charges.length > 0 && !isNaN(cartArray[i].delivery_charges) && cartArray[i].delivery_charges != undefined) {



            if ($.inArray(cartArray[i].vendorid, vendor_id_arr) == -1) {

                delivery_charges += parseFloat(cartArray[i].delivery_charges);

                vendor_id_arr.push(cartArray[i].vendorid);

            }



        }



        var product_addon_name = "";

        var product_addon_price = 0;





        $.each(cartArray[i].product_addons, function (i, data) {

            

            product_addon_name += data.name + ' ,';



            product_addon_price = parseFloat(product_addon_price) + parseFloat(data.price);

            product_addon_price = product_addon_price.toFixed(2);





            total_addon_price = parseFloat(total_addon_price) + parseFloat(data.price);

            total_addon_price = total_addon_price.toFixed(2);

        });



        var total_product_price = parseFloat(cartArray[i].total) + parseFloat(product_addon_price);

        total_product_price = total_product_price.toFixed(2);

        /* removing comma from end  */

        product_addon_name = product_addon_name.replace(/,\s*$/, "");

        product_addon_name = product_addon_name != '' ? '( ' + product_addon_name + ' )' : '';

        var product_addon_price_div = product_addon_price != 0 ? '(+ ' + product_addon_price + ' )' : '';





        output += '<div class="gold-members d-flex align-items-center justify-content-between px-3 py-2 border-bottom">' +

            '<div class="media align-items-center">' +

            '<div><i class="fa fa-circle mr-4 text-primary"></i></div>' +

            '<div class="media-body">' +

            '<p class="m-0">' + cartArray[i].prodname + '</p>' +

            '</div>' +

            '</div>' +

            '<div class="d-flex align-items-center">' +

            '<p class="text-gray mb-0 float-right ml-2 text-muted small">' + count + '  ' + cartArray[i].unit + '</p>' +

            '<p class="text-gray mb-0 float-right ml-2 text-muted small">' + cartArray[i].currency + ' ' + cartArray[i].price +

            '<small>' + product_addon_price_div + '</small>' +

            '</p>' +

            '</div>' +

            '</div>';

        ///Close







    }

    var totalItems = cartArray.length;

    $('.card-checkout-products').html(output);



    if (totalItems > 0) {



        var dicount = shoppingCartRSB.totalCart() * 0;

        var TotalCart = shoppingCartRSB.totalCart().toFixed(2);

        TotalCart = (parseFloat(TotalCart) + parseFloat(total_addon_price)).toFixed(2);



        $('.total_products_price').html(cartArray[0].currency + " " + TotalCart);

        $('.devlivery_fee').html(cartArray[0].currency + " " + delivery_charges);

        var AfterDeliveryFee = parseFloat(TotalCart) + parseFloat(delivery_charges);

        $('.total_net_amount').html(cartArray[0].currency + " " + AfterDeliveryFee.toFixed(2));

        $('.total_net_amount_pay').text("PAY " + cartArray[0].currency + " " + AfterDeliveryFee.toFixed(2));



    } else {

        $('.total-countOfQty').html(shoppingCartRSB.totalCount());

    }

}

// Delete item button





// -1

$(document).on("click", ".minus-item", function (event) {



    var prodid = $(this).data('prodid');

    var variantid = $(this).data('variantid');

    var vendorid = $(this).data('vendorid');
    var campaign_vendor_product_id = $(this).data('campaign-vendor-product-id');

    if (prodid == undefined || variantid == undefined || vendorid == undefined) {

        return false;

    }

    shoppingCartRSB.removeItemFromCart(prodid, variantid, vendorid, campaign_vendor_product_id);

    DisplaySingleCartValues(prodid, variantid, vendorid, campaign_vendor_product_id);

    displayCart();

});

// +1

$(document).on("click", ".plus-item", function (event) {



    var prodid = $(this).data('prodid');

    var variantid = $(this).data('variantid');

    var vendorid = $(this).data('vendorid');
    var campaign_vendor_product_id = $(this).data('campaign-vendor-product-id');


    if (prodid == undefined || variantid == undefined || vendorid == undefined) {

        return false;

    }

    shoppingCartRSB.addItemToCart(prodid, variantid, vendorid, campaign_vendor_product_id);

    displayCart();

});

$(document).on("click", ".delete-cart-product", function (event) {



    var prodid = $(this).data('prodid');

    var variantid = $(this).data('variantid');

    var vendorid = $(this).data('vendorid');

    var campaign_vendor_product_id = $(this).data('campaign-vendor-product-id');

    if (prodid == undefined || variantid == undefined || vendorid == undefined) {

        return false;

    }

    shoppingCartRSB.removeItemFromCartAll(prodid, variantid, vendorid, campaign_vendor_product_id);

    DisplaySingleCartValues(prodid, variantid, vendorid, campaign_vendor_product_id);

    displayCart();

    if (shoppingCartRSB.listCart() <= 0) {
        Swal.fire({
            icon: 'error',
            title: 'Cart is Empty',
            showConfirmButton: false,
            timer: 1500
        })
        window.location.replace(BASE_URL);
    }


});





function DisplaySingleCartValues(prodid, variantid, vendorid, campaign_vendor_product_id) {

    var str1 = '.';

    var str2 = '.minus';

    var str = str1.concat(variantid, prodid);

    var minusClass = str2.concat(variantid, prodid);

    var cartArray = shoppingCartRSB.listCart();

    for (var i in cartArray) {
        if (cartArray[i].prodid == prodid && variantid == cartArray[i].variantid && vendorid == cartArray[i].vendorid && campaign_vendor_product_id == cartArray[i].campaign_vendor_product_id) {

            //$(''+str).html(cartArray[i].count);

            // $("input:text").val("Glenn Quagmire");



            $('#qtyShow').html(cartArray[i].count);

        }

    }

}

displayCart();