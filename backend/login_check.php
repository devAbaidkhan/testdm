<?php
include "../protected/config.php";

$phone = isset($_POST['phone']) && trim($_POST['phone'])!='' ?trim($_POST['phone']):'';
$password = isset($_POST['password']) && trim($_POST['password'])!='' ?trim($_POST['password']):'';
$fcm_token = isset($_POST['fcm_token']) && trim($_POST['fcm_token'])!='' ?trim($_POST['fcm_token']):'';

$response=array();
if (!empty($phone) && !empty($password)) {
    $q="SELECT * FROM `tbl_user` WHERE phone='$phone' AND password='$password'";
    $exists= GetTableRow($q);
    if ($exists) {
        $id=$exists['id'];
        $_SESSION['LoginStatus']="LoggedIn";
        $_SESSION['user']=$exists;
        $_SESSION['source']='web';
        UpdateRec('tbl_user'," id=$id",['fcm_token'=>$fcm_token]);
        $response=array('status'=>'success','msg'=>'Login Successfully');
    } else {
        $response=array('status'=>'error','msg'=>'These credentials do not match our records.');
    }
} else {
    $response=array('status'=>'error','msg'=>'All Fields is Required');
}
echo json_encode($response);
