<?php
include "../protected/config.php";
$response=array();
if (!isset($_SESSION['LoginStatus'])) {
    $response=array('status'=>'SessionExpired','message'=>'Please Login First');
    echo json_encode($response);
    exit;
}
$user_id=$_SESSION['user']['id'];

if (isset($_POST['phone_form'])) {
    $phone = isset($_POST['phone'])&&!empty(trim($_POST['phone']))?trim($_POST['phone']):'';
    if (empty($phone)) {
        $response=array('status'=>'error','msg'=>'Phone Input Field is Required');
        echo json_encode($response);
        exit;
    }

    $q="SELECT * FROM `tbl_user` WHERE id=$user_id";
    $exists=GetTableRow($q);
    if ($exists) {
        UpdateRec('tbl_user', " id=$user_id", ['phone'=>$phone]);
        $_SESSION['user']['phone']=$phone;
        $response=array('status'=>'success','msg'=>'Phone Added Successfully');
    } else {
        $response=array('status'=>'error','msg'=>'Error!! User Not Found');
    }
    echo json_encode($response);
    exit;
}
