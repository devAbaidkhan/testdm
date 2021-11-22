<?php
include "../protected/config.php";
if (!isset($_SESSION['LoginStatus'])) {
    $response=array('status'=>'SessionExpired','msg'=>'Please Login First');
    echo json_encode($response);
    exit;
}

if (isset($_POST['re_order'])) {
    $order_id=$_POST['order_id'];
    $q="SELECT * FROM `orders` WHERE id=$order_id";
    $res= GetTableRow($q);
    $order_id=$res['id'];

    // getting details of order
    $q1="SELECT * FROM `order_details` WHERE order_id=$order_id";
    $res1= GetDataTable($q1);
    $response=array();
    while ($row=mysqli_fetch_array($res1)) {
        $order_detail_id= $row['id'];
        $product=get_resturant_product_detail($row['product_id']);
        $vendor=vendor($res['vendor_id']);
        $order_product_addons=get_order_product_addons($order_id, $order_detail_id);
        $product_addons=array();
        if (!empty($order_product_addons)) {
            while ($addon_row=mysqli_fetch_array($order_product_addons)) {
                $restaurant_product_addons= get_restaurant_product_addons($addon_row['restaurant_product_addon_id']);
                $product_addons[]=array(
                   'id'=>$addon_row['restaurant_product_addon_id'],
                   'name'=>$restaurant_product_addons['addon_name'],
                   'price'=>$restaurant_product_addons['addon_price'],
               );
            }
        }
      
        $response[]=array(
            'count'=>$row['product_quantity'],
            'currency'=>$res['currency'],
            'delivery_charges'=>$res['delivery_charges'],
            'estimated_delivery_time'=>$vendor['estimated_delivery_time'],
            'order_description'=>$res['user_order_suggestion'],
            'price'=>$row['price'],
            'prodid'=>$row['product_id'],
            'prodimage'=>$product['product_image'],
            'prodname'=>$product['product_name'],
            'product_addons'=>$product_addons,
            'restaurant_name'=>$vendor['vendor_name'],
            'total'=>$row['total_price'],
            'unit'=>$row['unit'],
            'variantid'=>$row['variant_id'],
            'vendorid'=>$res['vendor_id'],
        );
    }
    echo json_encode($response);
}
