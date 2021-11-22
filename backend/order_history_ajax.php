<?php
include "../protected/config.php";
if (!isset($_SESSION['LoginStatus'])) {
    $response=array('status'=>'SessionExpired','msg'=>'Please Login First');
    echo json_encode($response);
    exit;
}
$user_id=$_SESSION['user']['id'];
if (isset($_POST['cancel_order'])) {
    $order_id= $_POST['order_id'];
    $vendor_id= $_POST['vendor_id'];
    $cart_no= $_POST['cart_no'];
    $cancelation_msg= isset($_POST['other_reason']) && $_POST['other_reason']=='on'?$_POST['cancelation_msg_custom']:$_POST['cancelation_msg'];
    $vendor= vendor($vendor_id);
    $timezone=$vendor['timezone'];
    if (!empty($timezone)) {
        date_default_timezone_set($timezone);
    }
    UpdateRec('orders'," id=$order_id",[
       'order_status'=>4,
       'canceled_at'=>date('Y-m-d H:i:s'),
       'cancelation_msg'=>$cancelation_msg,
       'canceled_by'=>'user'  
    ]);

    
       $status= SendNotificationToRestrurentAndOrderTaker($vendor_id,"Order Cancelled","Order Cancelled By User
        Cart No #$cart_no");
        
    
    $response=array('status'=>'success');
    echo json_encode($response);
}


if(isset($_POST['add_to_favorite'])){
    $order_id= $_POST['order_id'];
    $type="order";
    $q="SELECT * FROM `user_favourites` WHERE type='$type' AND type_id=$order_id";
    $res=rows_count($q);
    if($res==0){
        $data=array(
            'type_id'=>$order_id,
            'type'=>$type,
            'user_id'=>$user_id,
            'created_at'=>'NOW()',
            'updated_at'=>'NOW()',
        );
        $insert=InsertRec('user_favourites',$data);
        if($insert){
            $response=array('status'=>'success','msg'=>'Favourite Added Successfully');
        }else{
            $response=array('status'=>'error','msg'=>'Something Wrong');
        }
    }else{
       $data= GetTableRow($q);
       $id=$data['id'];
       DeleteRec('user_favourites'," id=$id");
       $response=array('status'=>'found','msg'=>'favourite removed successfully');
    }
   
    echo json_encode($response);
}
