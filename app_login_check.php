<?php
include "protected/config.php";
$social_acc_id=$_POST['Account_id'];
$name=$_POST['Name'];
$email=$_POST['Email'];
$picture=$_POST['Profile_imgUrl'];
$fcm_token=$_POST['FCMToken'];
if (empty($_POST['Email'])) {
    echo json_encode(['status'=>'error','message'=>'Email is Required']);
    exit;
}
if (empty($_POST['Account_id'])) {
    echo json_encode(['status'=>'error','message'=>'Account ID is Required']);
    exit;
}
$q="SELECT * FROM `tbl_user` WHERE email='$email' AND social_acc_id='$social_acc_id'";
            $exists= GetTableRow($q);
            if (!$exists) {
                //Store "access_token" value in $_SESSION variable for future use.
                $insert= InsertRec('tbl_user', [
                'name'=> $name,
                'email'=> $email,
                'social_acc_id'=> $social_acc_id,
                'picture'=> $picture,
                'fcm_token'=> $fcm_token,
                'created_at'=>"NOW()",
                'updated_at'=>"NOW()"
                ]);
                if ($insert>0) {
                    $_SESSION['LoginStatus']="LoggedIn";
                   
                    $q="SELECT * FROM `tbl_user` WHERE id='$insert'";
                    $data=GetTableRow($q);
                    $_SESSION['user']=$data;
                    $_SESSION['source']='mobile';
                    header('location:'.BASE_URL);
                }
            } else {
                $id= $exists['id'];
                UpdateRec('tbl_user', " id=$id", ['fcm_token'=>$fcm_token]);
                $_SESSION['LoginStatus']="LoggedIn";
                $_SESSION['user']=$exists;
                $_SESSION['source']='mobile';
                header('location:'.BASE_URL);
            }
