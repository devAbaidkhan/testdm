<?php 
include "../protected/config.php";
if (!isset($_SESSION['LoginStatus'])) {
    $response=array('status'=>'SessionExpired','message'=>'Please Login First');
    echo json_encode($response);
    exit;
}
$id=$_SESSION['user']['id'];
$fcm_token=$_POST['fcm_token'];
UpdateRec('tbl_user'," id=$id",['fcm_token'=>$fcm_token]);
echo json_encode(['status'=>'token updated','token'=>$fcm_token]);
?>