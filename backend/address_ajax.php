<?php

include "../protected/config.php";

$response=array();

if (!isset($_SESSION['LoginStatus'])) {
    $response=array('status'=>'SessionExpired','message'=>'Please Login First');

    echo json_encode($response);

    exit;
}

$user_id=$_SESSION['user']['id'];

if (isset($_POST['add_form'])) {
    $title = isset($_POST['add_title']) && !empty(trim($_POST['add_title']))?trim($_POST['add_title']):'';

    $address = isset($_POST['add_address']) && !empty(trim($_POST['add_address']))?trim($_POST['add_address']):'';

    $is_default = isset($_POST['add_is_default']) && $_POST['add_is_default']=='on' ?1:'ANull';

    if (empty($title) || empty($address)) {
        $response=array('status'=>'error','msg'=>'All Fields is Required');

        echo json_encode($response);

        exit;
    }



    $data=array(

    'user_id'=>$user_id,

    'title'=>$title,

    'address'=>$address,

    'is_default'=>$is_default,

    'created_at'=>date('Y-m-d H:i:s'),

    'updated_at'=>date('Y-m-d H:i:s'),

    );

    UpdateRec('user_address', " user_id=$user_id", ['is_default'=>'ANull']);

    $insert=InsertRec('user_address', $data);

    if ($insert>0) {
        $response=array('status'=>'success','msg'=>'Address Added Successfully');
    } else {
        $response=array('status'=>'error','msg'=>'Address Not Added Successfully');
    }

    echo json_encode($response);

    exit;
}



if (isset($_POST['edit_form'])) {
    $id = isset($_POST['hiddenID']) && !empty(trim($_POST['hiddenID']))?trim($_POST['hiddenID']):'';

    $title = isset($_POST['edit_title']) && !empty(trim($_POST['edit_title']))?trim($_POST['edit_title']):'';

    $address = isset($_POST['edit_address']) && !empty(trim($_POST['edit_address']))?trim($_POST['edit_address']):'';

    $is_default = isset($_POST['edit_is_default']) && $_POST['edit_is_default']=='on' ?1:'ANull';

    if (empty($id) || empty($title) || empty($address)) {
        $response=array('status'=>'error','msg'=>'All Fields is Required');

        echo json_encode($response);

        exit;
    }



    $data=array(

    'user_id'=>$user_id,

    'title'=>$title,

    'address'=>$address,

    'is_default'=>$is_default,

    'updated_at'=>date('Y-m-d H:i:s'),

    );

    if ($is_default==1) {
        UpdateRec('user_address', " user_id=$user_id", ['is_default'=>'ANull']);
    }

    /*    if ($is_default==0) {

           $q="SELECT * FROM `user_address` WHERE user_id=$user_id AND is_default=1 LIMIT 1";

           $exists= GetTableRow($q);

           if (!$exists) {

               $response=array('status'=>'error','msg'=>'Aleast One Must Be Default');

               echo json_encode($response);

               exit;

           }

       } */

    $update=UpdateRec('user_address', " id=$id", $data);

    $response=array('status'=>'success','msg'=>'Address Updated Successfully');

    echo json_encode($response);

    exit;
}

if (isset($_POST['address_list'])) {
   $order_type= $_POST['order_type'];
   if($order_type=='pickup'){
       return true;
       exit;
   }
    $res=  user_address($_SESSION['user']['id']); ?>
<div class="osahan-cart-item-profile bg-white p-3">
    <div class="d-flex flex-column">
        <h6 class="mb-3 font-weight-bold">Delivery Address</h6>
        <div class="row" id="address_div">


            <?php
    while ($row=mysqli_fetch_array($res)) {
        ?>
            <div class="custom-control col-lg-6 custom-radio mb-3 position-relative border-custom-radio">

                <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input"
                    checked>

                <label class="custom-control-label w-100" for="customRadioInline1">

                    <div>

                        <div class="p-1 bg-white rounded shadow-sm w-100">

                            <div class="d-flex align-items-center mb-2">

                                <h6 class="mb-0"><?=$row['title']?>

                                </h6>

                                <?php

                                                            if ($row['is_default']==1) {
                                                                ?>

                                <p class="mb-0 badge badge-success ml-auto"><i class="icofont-check-circled"></i>
                                    Default</p>

                                <?php
                                                            } ?>

                            </div>

                            <div class="d-flex align-items-center mb-2">

                                <p class="small text-muted m-0"><?=$row['address']?>

                                </p>

                                <a href="javascript:;" class="ml-auto edit_data"
                                    data-id="<?=$row['id']?>"
                                    data-title="<?=$row['title']?>"
                                    data-address="<?=$row['address']?>"
                                    data-is-default="<?=$row['is_default']?>"><i
                                        class="fa fa-edit" style="font-size:20px"></i></a>

                            </div>

                        </div>



                    </div>

                </label>

            </div>

            <?php
    } ?>
        </div>
        <a class="btn btn-primary" href="javascript:;" data-toggle="modal" data-target="#add_modal">
            ADD NEW ADDRESS </a>
    </div>
</div>
<?php
}
