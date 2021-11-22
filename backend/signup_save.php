<?php
include "../protected/config.php";


$name = isset($_POST['name']) && trim($_POST['name'])!='' ?trim($_POST['name']):'';
$phone = isset($_POST['phone']) && trim($_POST['phone'])!='' ?trim($_POST['phone']):'';
$password = isset($_POST['password']) && trim($_POST['password'])!='' ?trim($_POST['password']):'';
$confirm_password = isset($_POST['confirm_password'])&& trim($_POST['confirm_password'])!='' ?trim($_POST['confirm_password']):'';
$response=array();
if (!empty($name) && !empty($phone) && !empty($password) && !empty($confirm_password)) {
    if(strlen($password)<8)
    {
        $response=array('status'=>'error','msg'=>'Minimum Password Length 8 Is Required');
        echo json_encode($response);
        exit;
    }
    if ($password==$confirm_password) {
        $q="SELECT * FROM `tbl_user` WHERE phone='$phone'";
        $exists= GetTableRow($q);
        if (!$exists) {
            $data=array(
            'name'=>$name,
            'phone'=>$phone,
            'password'=>$password,
            'created_at'=>"NOW()",
            'updated_at'=>"NOW()",
        );
            $insert=InsertRec('tbl_user', $data);
            if ($insert>0) {
                $response=array('status'=>'success','msg'=>'Sigup Successfully');
            } else {
                $response=array('status'=>'error','msg'=>'Something Want Wrong');
            }
        } else {
            $response=array('status'=>'error','msg'=>'You Already Signup');
        }
    } else {
        $response=array('status'=>'error','msg'=>'Password Is Not Matched');
    }
} else {
    $response=array('status'=>'error','msg'=>'All Fields is Required');
}
echo json_encode($response);
