<?php

include "../protected/config.php";

$response=array();



if (!isset($_SESSION['LoginStatus'])) {

    $response=array('status'=>'SessionExpired','msg'=>'Please Login First');

    echo json_encode($response);

    exit;

}

$user_id=$_SESSION['user']['id'];

if (isset($_POST['place_order'])) {

    $cartArray=$_POST['cartArray'];

    $order_type=$_POST['order_type'];

   $check_order_query="SELECT * FROM `orders` WHERE user_id=$user_id AND order_status IN(1,2)";

   $order_query_count=rows_count($check_order_query);

   if($order_query_count>=2)

   {

       $response=array('status'=>'error','msg'=>'Your previous order is Still Pending Or Confirmed');

        echo json_encode($response);

        exit;

   }

   

    $order_suggestion = isset($_POST['order_suggestion']) && !empty(trim($_POST['order_suggestion']))?trim($_POST['order_suggestion']):'ANull';

   

    if($order_type=='deliver'){

        $q="SELECT * FROM `user_address` WHERE user_id=$user_id AND is_default=1";

        $exists=GetTableRow($q);

            if (!$exists) {

                $response=array('status'=>'error','msg'=>"You Don't have Default Address.");

                echo json_encode($response);

                exit;

            }

    }

    

    $address_id= $exists['id'];

    $vendor_arr=array();

    $orderArray=array();

    $total_product_price=array();

    $delivery_charges=array();

    $net_amount=array();





    foreach ($cartArray as $key => $cart) {

        $delivary=0;

        if (!in_array($cart['vendorid'], $vendor_arr)) {

            $vendor_arr[]=$cart['vendorid'];

            $delivary+=(double)$cart['delivery_charges'];

            $delivery_charges[]=$delivary;

            $orderArray[]=array(

                'user_id'=>$user_id,

                'vendor_id'=>$cart['vendorid'],

                'address_id'=>$address_id,

                'order_suggestion'=>$order_suggestion,

                'delivery_charges'=>$delivary,

                'currency'=>$cart['currency'],

            );

        }

        // $vendor_arr[]=$cart['vendorid'];

    }

 

    foreach ($vendor_arr as $key => $vendor_id) {

        $total=0;





        foreach ($cartArray as $cart) {

            if ($vendor_id==$cart['vendorid']) {

                $total+=(double)$cart['total']+(double)sum_product_addon_price($cart['product_addons']??'');

            }

        }

        $total_product_price[]= $total;

    }

    $cart_no= time().rand(1111, 9999);

    $fin=array();

    $insert_order_details=array();

    for ($i=0; $i < count($orderArray); $i++) {

        $vendor= vendor($orderArray[$i]['vendor_id']);

        if (!empty($vendor['timezone'])) {

            date_default_timezone_set($vendor['timezone']);

        }

       

        $data=array(

                'cart_no'=>$cart_no,

                'user_id'=>$orderArray[$i]['user_id'],

                'vendor_id'=>$orderArray[$i]['vendor_id'],

                'address_id'=>$orderArray[$i]['address_id'],

                'total_product_price'=>$total_product_price[$i],

                'delivery_charges'=>$delivery_charges[$i],

                'net_amount'=> (double)$total_product_price[$i]+(double)$delivery_charges[$i],

                'order_status'=> 1,

                'order_type'=> $order_type,

                'currency'=>$orderArray[$i]['currency'],

                'user_order_suggestion'=>$orderArray[$i]['order_suggestion'],

                'created_at'=>date('Y-m-d H:i:s'),

                'updated_at'=>date('Y-m-d H:i:s'),

        );

        

        $order_id=InsertRec('orders', $data);

        if ($order_id>0) {

            foreach ($cartArray as $cart) {

                if ($data['vendor_id']==$cart['vendorid']) {

                    $addon_price= sum_product_addon_price($cart['product_addons']??'');

                    $total_price=$cart['total']+$addon_price;

                    $order_details_data=array(

                        'order_id'=>$order_id,

                        'product_id'=>$cart['prodid'],

                        'variant_id'=>$cart['variantid'],

                        'unit'=>$cart['unit'],

                        'order_description'=>$cart['order_description'],

                        'price'=>$cart['price'],

                        'addon_price'=>$addon_price,

                        'product_quantity'=>$cart['count'],

                        'total_price'=>$total_price,

                        'is_campaign_product'=>$cart['is_campaign']=='yes'?1:0,

                        'campaign_vendor_product_id'=>$cart['campaign_vendor_product_id']!=""?$cart['campaign_vendor_product_id']:null,

                        'created_at'=>date('Y-m-d H:i:s'),

                        'updated_at'=>date('Y-m-d H:i:s'),

                    );

                    $order_detail_id= InsertRec('order_details', $order_details_data);

                    insert_order_product_addons($order_id, $order_detail_id, $cart['product_addons']??'');

                    $insert_order_details[]=$order_detail_id;

                }

            }

        }

    }

    

    //$vendor_arr=array_unique($vendor_arr);

    if (count($insert_order_details)>0) {

        $fcm_token=array();

        foreach ($vendor_arr as $id) {

            $q="SELECT fcm_token FROM `vendor` WHERE vendor_id=$id";

            $res= GetTableRow($q);

            if (!empty($res['fcm_token'])) {

                $fcm_token[]= $res['fcm_token'];

            }

            $q1="SELECT fcm_token FROM `ordertakers` WHERE vendor_id=$id";

            $res1= GetDataTable($q1);

            while ($row=mysqli_fetch_array($res1)) {

                if (!empty($row['fcm_token'])) {

                    $fcm_token[]= $row['fcm_token'];

                }

            }

        }

        // $user_data=tbl_user($_SESSION['user']['id']);

       

        $status=OrderPlacedNotification($fcm_token);

        $response=array('status'=>'success','msg'=>'Order Placed Successfully');

    } else {

        $response=array('status'=>'error','msg'=>'Try Again !! Order Not Placed Successfully');

    }

    echo json_encode($response);

    exit;

}



function insert_order_product_addons($order_id, $order_detail_id, $product_addons)

{

    if ($order_id>0 && $order_detail_id>0) {

        if (!empty($product_addons) && count($product_addons)>0) {

            foreach ($product_addons as $addons) {

                $data=array(

                    'order_id'=>$order_id,

                    'order_detail_id'=>$order_detail_id,

                    'restaurant_product_addon_id'=>$addons['id'],

                    'restaurant_product_addon_price'=>$addons['price'],

                );

                InsertRec('order_product_addons', $data);

            }

        }

    }

}

function sum_product_addon_price($product_addons)

{

    $total_price=0;

    if (!empty($product_addons) && count($product_addons)>0) {

        foreach ($product_addons as $addons) {

            $total_price=$total_price +$addons['price'];

        }

    }

    return $total_price;

}

