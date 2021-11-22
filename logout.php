<?php
include_once "protected/config.php";
//Reset OAuth access token
// $google_client->revokeToken();

//Destroy entire session data.

$id=$_SESSION['user']['id'];
UpdateRec('tbl_user', " id=$id", ['fcm_token'=>'ANull']);
unset($_SESSION['LoginStatus']);
unset($_SESSION['user']);


if ($_SESSION['source']=='web') {
    //redirect page to index.php
    header('location:index.php');
}
?>

