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
    function Item(prodid, variantid, vendorid, count, prodname, prodimage, unit, currency, price, order_description, delivery_charges) {
        this.prodid = prodid;
        this.variantid = variantid;
        this.vendorid = vendorid;
        this.count = count;
        this.prodname = prodname;
        this.prodimage = prodimage;
        this.unit = unit;
        this.currency = currency;
        this.price = price;
        this.order_description = order_description;
        this.delivery_charges = delivery_charges;
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
    obj.addItemToCart = function (prodid, variantid, vendorid, count, prodname, prodimage, unit, currency, price, order_description, delivery_charges) {
        if (prodid == undefined || vendorid == undefined || variantid == undefined) {
            return false;
        }
      
        for (var item in cart) {
            if (cart[item].prodid == prodid && cart[item].vendorid == vendorid && cart[item].variantid == variantid) {
                cart[item].count++;
                saveCart();
                return;
            }

        }
        var item = new Item(prodid, variantid, vendorid, count, prodname, prodimage, unit, currency, price, order_description, delivery_charges);
        cart.push(item);
        
        saveCart();
    }
    // Set count from item
    obj.setCountForItem = function (prodid, variantid, vendorid, count) {
        for (var i in cart) {
            if (cart[i].prodid == prodid && cart[i].vendorid == vendorid && cart[i].variantid == variantid) {
                cart[i].count = count;
                break;
            }
        }
    };
    // Remove item from cart
    obj.removeItemFromCart = function (prodid, variantid, vendorid) {
        for (var item in cart) {
            if (cart[item].prodid == prodid && cart[item].vendorid == vendorid && cart[item].variantid == variantid) {
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
    obj.removeItemFromCartAll = function (prodid, variantid, vendorid) {
        for (var item in cart) {
            if (cart[item].prodid == prodid && cart[item].variantid == variantid && cart[item].vendorid == vendorid) {
                cart.splice(item, 1);
                break;
            }
        }
        saveCart();
    }

    obj.TotalDeliveryCharges = function (prodid, variantid, vendorid) {
        var delivery_charges = 0;
        for (var item in cart) {
            if (cart[item].prodid == prodid && cart[item].variantid == variantid && cart[item].vendorid == vendorid) {
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
            totalCount += cart[item].count;
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

    obj.DisplayItemQty = function (prodid, variantid, vendorid) {
        var totalQtyCount = 0;
        for (var item in cart) {
            if (cart[item].prodid == prodid && cart[item].variantid == variantid && cart[item].vendorid == vendorid) {
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
// Add item


// $('.add-to-cart').click(function(event) {
//   event.preventDefault();
//   var prodid = $(this).data('prodid');
//   var type = $(this).data('type');
//   var stock = $(this).data('stock');
//   var dvmsg = $(this).data('dvmsg');
//   var prodname = $(this).data('prodname');
//   var image = $(this).data('image');
//   var price = Number($(this).data('price')).toFixed(2);
// // var price = $('#Price').val();
//  shoppingCartRSB.addItemToCart(prodid, type,stock,dvmsg,price,prodname,image, 1);
//  displayCart();
// });

// Clear items
$(document).on('click', '.clear-cart', function () {
    shoppingCartRSB.clearCart();
    //  $('.total-cart').html('0.00');
    displayCart();
    window.location.reload();
});
/* $('.clear-cart').click(function() {
  
}); */

/* $('.add-to-cart').unbind('click').click(function () {
  //alert("bob");
  //addToCart($(this).attr("id"));
}); */
//shoppingCartRSB.clearCart();
$(document).on('click', '.add-to-cart', function (e) {
    e.preventDefault();

    /* if(confirm('Testing Confirm') == true){
                alert('Yes');
            }else{
                alert('No');
            } */
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
    var count = parseInt($('#qtyShow').text());

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
        shoppingCartRSB.addItemToCart(prodid, variantid, vendorid, count, prodname, prodimage, unit, currency, price, order_description, delivery_charges);
        displayCart();
        DisplaySingleCartValues(prodid, variantid, vendorid);
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
    for (var i in cartArray) {
        vendor_id_arr = [];
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
        if (!isNaN(cartArray[i].delivery_charges) && cartArray[i].delivery_charges != undefined && cartArray[i].delivery_charges.length>0  ) {
            
            if ($.inArray(cartArray[i].vendor_id, vendor_id_arr) == -1) 
            {
                delivery_charges += parseFloat(cartArray[i].delivery_charges);
                vendor_id_arr.push(cartArray[i].vendor_id);
            }
            
        }



        output += '<tr>' +
            '<td>' +
            '<div class="d-flex justify-content-start select-none">' +
            '<div class="product-cart">' +
            '<img src="' + ImageURL + cartArray[i].prodimage + '" alt="" class="img-fluid">' +
            '</div>' +
            '<div class="product-cart-title pt50">' +
            '<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' + cartArray[i].prodname + '<small style="color:#dc3545">(' + cartArray[i].unit + ')</small></span>' +
            '</div>' +
            '</div>' +
            '</td>' +
            '<td>' +
            '<strong class="d-inline-block pt50" style="font-size: 18px;">' + cartArray[i].currency + cartArray[i].price + '</strong>' +
            '</td>' +
            '<td>' +
            '<div class="d-flex align-items-center pt50">' +
            '<div>' +
            '<span class="minus-text text-dark btn btn-danger minus-item" id="minusButton" type="button"' +
            'data-prodid="' + cartArray[i].prodid + '" data-variantid="' + cartArray[i].variantid + '" data-vendorid="' + cartArray[i].vendorid + '">' +
            '<i class="' + displayMinus + '"></i></span>' +
            '<span  id="displayCount" class="d-inline-block px-1 " style="font-size: 20px;">' + count + '</span>' +
            '<span class="plus-text text-dark btn btn-success padding0 plus-item" id="countButton" type="button"' + 'data-prodid="' + cartArray[i].prodid + '" data-variantid="' + cartArray[i].variantid + '" ' +
            'data-vendorid="' + cartArray[i].vendorid + '">' +
            '<i class="fa fa-plus"></i></span>' +
            '</div>' +
            '</div>' +
            '</td>' +
            '<td class="middle-middle">' +
            '<strong class="d-inline-block pt50" style="font-size: 18px;">' + cartArray[i].currency + cartArray[i].total + '</strong>' +
            '</td>' +
            '</tr>';
        ///Close

        output_mbl += '<div class="cart-product-border p-3">' +
            '<div class="d-flex align-items-center justify-content-start">' +
            '<div>' +
            '<img src="' + ImageURL + cartArray[i].prodimage + '" alt="" class="img-fluid cart-mobile-product">' +
            '</div>' +
            '<div>' +
            '<h4>' + cartArray[i].prodname + '</h4>' +
            '<p>' + cartArray[i].unit + '</p>' +
            '</div>' +
            '</div>' +
            '<h2 class="cart-mobile-price">Price : <span class="color-pink">' + cartArray[i].currency + cartArray[i].price + '</span></h2>' +
            '<h2 class="cart-mobile-quantity pt-2">Quantity :</h2>' +

            '<div class="d-flex justify-content-between cart-quantity-border">' +
            '<span class="minus-text text-dark btn btn-danger minus-item" id="minusButton1"' +
            'data-prodid="' + cartArray[i].prodid + '" data-variantid="' + cartArray[i].variantid + '" data-vendorid="' + cartArray[i].vendorid + '">' +
            '<i class="' + displayMinus + '"></i></span>' +
            '<span id="displayCount1" class="d-inline-block px-1" style="font-size: 20px;">' + count + '</span>' +
            '<span class="plus-text  text-dark btn btn-success plus-item" id="countButton1"' +
            'data-prodid="' + cartArray[i].prodid + '" data-variantid="' + cartArray[i].variantid + '" data-vendorid="' + cartArray[i].vendorid + '">' +
            '<i class="fa fa-plus"></i></span>' +
            '</div>' +
            /* '<h2 class="cart-mobile-price pt-5 color-pink">Total : 700 PKR</h2>'+ */
            '</div>';

    }
    var totalItems = cartArray.length;
    $('.show-cart').html(output);
    $('.show-cart-mobile').html(output_mbl);

    if (totalItems > 0) {
        $('.total-cart').html(shoppingCartRSB.totalCart().toFixed(2));
        var dicount = shoppingCartRSB.totalCart() * 0;
        var TotalCart = shoppingCartRSB.totalCart().toFixed(2);

        var DeliveryFee = 0;
        $('.DeliverFeeAmt').html(delivery_charges);
        var AfterDeliveryFee = parseFloat(TotalCart) + parseFloat(delivery_charges);
        $('.total-cartNet').html(AfterDeliveryFee.toFixed(2));

    } else {
        $('.total-countOfQty').html(shoppingCartRSB.totalCount());
    }
    $('.total-cart').html(shoppingCartRSB.totalCart().toFixed(2));
    $('.total-countOfQty').html(shoppingCartRSB.totalCount());
    //test end



    //   if(LoginCustOrderCount == 0){
    //       $(".CartDiscount").show();
    //       $('.total-cart').html(shoppingCartRSB.totalCart().toFixed(2));
    //       var dicount = shoppingCartRSB.totalCart() * 0.1;
    //       $('.discountCart').html(dicount.toFixed(2));
    //       var TotalCart = shoppingCartRSB.totalCart() - dicount;
    //       $('.total-cartNet').html(TotalCart.toFixed(2));
    //   }else{
    //       $(".CartDiscount").hide();
    //       $('.total-cart').html(shoppingCartRSB.totalCart().toFixed(2));
    //       $('.total-cartNet').html(shoppingCartRSB.totalCart().toFixed(2));
    //   }
    //   $('.total-countOfQty').html(shoppingCartRSB.totalCount());
    //   $('.total-count').html(totalItems);
}


function displayCartCheckOut() {

    var cartArray = shoppingCartRSB.listCart();
    var delivery_charges = 0;
    var output = "";
    var output_mbl = "";
    for (var i in cartArray) {
        vendor_id_arr = [];
      
        if (cartArray[i].count === undefined || cartArray[i].count === null) {
            var count = 1;
        } else {
            var count = cartArray[i].count;
        }
        if (cartArray[i].delivery_charges.length>0 && !isNaN(cartArray[i].delivery_charges) && cartArray[i].delivery_charges != undefined ) {
            
            if ($.inArray(cartArray[i].vendor_id, vendor_id_arr) == -1) 
            {
                delivery_charges += parseFloat(cartArray[i].delivery_charges);
                vendor_id_arr.push(cartArray[i].vendor_id);
            }
            
        }



        
        output += '<div class="gold-members d-flex align-items-center justify-content-between px-3 py-2 border-bottom">'+
        '<div class="media align-items-center">'+
            '<div class="mr-2 text-danger">&middot;</div>'+
            '<div class="media-body">'+
                '<p class="m-0">'+ cartArray[i].prodname +'</p>'+
            '</div>'+
        '</div>'+
        '<div class="d-flex align-items-center">'+
            '<p class="text-gray mb-0 float-right ml-2 text-muted small">'+count+'</p>'+
            '<p class="text-gray mb-0 float-right ml-2 text-muted small">'+ cartArray[i].currency+' '+ cartArray[i].price + '</p>'+
        '</div>'+
    '</div>';
        ///Close

        

    }
    var totalItems = cartArray.length;
    $('.card-checkout-products').html(output);

    if (totalItems > 0) {
        $('.total_products_price').html(shoppingCartRSB.totalCart().toFixed(2));
        var dicount = shoppingCartRSB.totalCart() * 0;
        var TotalCart = shoppingCartRSB.totalCart().toFixed(2);

      
        var DeliveryFee = 0;
        $('.devlivery_fee').html(delivery_charges);
        var AfterDeliveryFee = parseFloat(TotalCart) + parseFloat(delivery_charges);
        $('.total_net_amount').html(AfterDeliveryFee.toFixed(2));
        $('.total_net_amount_pay').text("PAY "+AfterDeliveryFee.toFixed(2));

    } else {
        $('.total-countOfQty').html(shoppingCartRSB.totalCount());
    }
    
    //test end



    //   if(LoginCustOrderCount == 0){
    //       $(".CartDiscount").show();
    //       $('.total-cart').html(shoppingCartRSB.totalCart().toFixed(2));
    //       var dicount = shoppingCartRSB.totalCart() * 0.1;
    //       $('.discountCart').html(dicount.toFixed(2));
    //       var TotalCart = shoppingCartRSB.totalCart() - dicount;
    //       $('.total-cartNet').html(TotalCart.toFixed(2));
    //   }else{
    //       $(".CartDiscount").hide();
    //       $('.total-cart').html(shoppingCartRSB.totalCart().toFixed(2));
    //       $('.total-cartNet').html(shoppingCartRSB.totalCart().toFixed(2));
    //   }
    //   $('.total-countOfQty').html(shoppingCartRSB.totalCount());
    //   $('.total-count').html(totalItems);
}
// Delete item button


// -1
$(document).on("click", ".minus-item", function (event) {
    
    var prodid = $(this).data('prodid');
    var variantid = $(this).data('variantid');
    var vendorid = $(this).data('vendorid');
    if (prodid == undefined || variantid == undefined || vendorid == undefined) {
        return false;
    }
    shoppingCartRSB.removeItemFromCart(prodid, variantid, vendorid);
    DisplaySingleCartValues(prodid, variantid, vendorid);
    displayCart();
})
// +1
$(document).on("click", ".plus-item", function (event) {

    var prodid = $(this).data('prodid');
    var variantid = $(this).data('variantid');
    var vendorid = $(this).data('vendorid');

    if (prodid == undefined || variantid == undefined || vendorid == undefined) {
        return false;
    }
    shoppingCartRSB.addItemToCart(prodid, variantid, vendorid);
    displayCart();
})



// -1
$('#field1').on("click", ".minus-item", function (event) {
    var prodid = $(this).data('prodid');
    var type = $(this).data('type');
    shoppingCartRSB.removeItemFromCart(prodid, type, 0);
    DisplaySingleCartValues(type, prodid, 0);
    displayCart();
});

function DisplaySingleCartValues(prodid, variantid, vendorid) {
    var str1 = '.';
    var str2 = '.minus';
    var str = str1.concat(variantid, prodid);
    var minusClass = str2.concat(variantid, prodid);
    var cartArray = shoppingCartRSB.listCart();
    for (var i in cartArray) {
        if (cartArray[i].prodid == prodid && variantid == cartArray[i].variantid && vendorid == cartArray[i].vendorid) {
            //$(''+str).html(cartArray[i].count);
            // $("input:text").val("Glenn Quagmire");
           
            $('#qtyShow').html(cartArray[i].coun);
        }
    }
}

/* $('.add-to-cart1').unbind('click').click(function() {
       //alert("bob");
       //addToCart($(this).attr("id"));
   }); */

/*  $('.add-to-cart1').bind('click').click(function(event) {
  
 }); */
$(document).on('click', '.add-to-cart1', function (event) {
    /*if(confirm('Testing Confirm') == true){
                alert('Yes');
            }else{
                alert('No');
            }*/
    event.preventDefault();
    //       alert('AddCart');
    var str1 = 'singlePageQty';
    var prodid = $(this).data('prodid');
    var type = $(this).data('type');
    var stock = $(this).data('stock');
    var dvmsg = $(this).data('dvmsg');
    var prodname = $(this).data('prodname');
    var image = $(this).data('image');
    var price = Number($(this).data('price'));
    var qtyVal = str1.concat(type, prodid);
    var distinctselectedfeautre = $(this).data('distinctselectedfeautre');





    // alert(qtyVal);
    //  var qty = $('#qtyShow').val;
    var qty = Number(document.getElementById("qtyShow").value);
    var SelectedFeatureIDArray = 0;
    var SelectedFeatureID = [];
    SelectedFeatureID.push(SelectedFeatureIDArray);

    var SelectedFeatureName = [0];
    // alert(qty);
    // var price = $('#Price').val();
    if (Number(qty) < 1) {
        shoppingCartRSB.removeItemFromCartAll(prodid, type, distinctselectedfeautre);
    } else {
        if (stock == 1) {
            if (dvmsg != -1) {

                shoppingCartRSB.removeItemFromCartAll(prodid, type, distinctselectedfeautre);
                shoppingCartRSB.addItemToCart(prodid, type, distinctselectedfeautre, stock, dvmsg, price, prodname, image, qty, SelectedFeatureID, SelectedFeatureName);


            } else {
                $('#DvMsgConfirmationModal').modal('show');
                $('#DvMsgConfirmationModalTitle').html('Notice');
                $('#DvMsgConfirmationModalBody').html('This product will be delivered in minimum  ' + DvMsg + ' hours. Are you sure you want to order it ?');
                document.getElementById("DvMsgYesButton").setAttribute("onClick", "javascript: GetCartActionAfterConfirmation(" + ID + ", '" + Type + "', '" + Stock + "', '" + DvMsg + "');");
            }
        } else {
            $('#alertModal').modal('show');
            $('#alertModalTitle').html('Please Try Later');
            $('#alertModalBody').html('Delivery currently not available.');
        }
    }
    displayCart();
    DisplaySingleCartValues(type, prodid, distinctselectedfeautre);
    //alert("bob");
    //addToCart($(this).attr("id"));
});
displayCart();