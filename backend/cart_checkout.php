<?php
include "../protected/config.php";
$response=array();
if (!isset($_SESSION['LoginStatus'])) {
    $response=array('status'=>'SessionExpired','message'=>'Please Login First');
    echo json_encode($response);
    exit;
}

// ? checking user added their phone number or not
if (isset($_SESSION['user']['id'])) {
    $q="SELECT * FROM `tbl_user` WHERE id=".$_SESSION['user']['id']."";
    $data=GetTableRow($q);
    if ($data) {
        if (empty($data['phone'])) {
            $response=array('status'=>'nophone','message'=>'Please Add Your Phone Number');
            echo json_encode($response);
            exit;
        }else
        {
            $response=array('status'=>'success','message'=>'Number Found');
            echo json_encode($response);
            exit;
        }
    }else
    {
        $response=array('status'=>'SessionExpired','message'=>'Please Login Again');
        echo json_encode($response);
        exit;
    }
}
