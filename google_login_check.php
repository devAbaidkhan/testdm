<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
include "protected/config.php";
include "google_config.php";
//This $_GET["code"] variable value received after user has login into their Google Account redirct to PHP script then this variable value has been received
if (isset($_GET["code"])) {
    //It will Attempt to exchange a code for an valid authentication token.
    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

    //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
    if (!isset($token['error'])) {
        //Set the access token used for requests
        $google_client->setAccessToken($token['access_token']);

        

        //Create Object of Google Service OAuth 2 class
        $google_service = new Google_Service_Oauth2($google_client);

        //Get user profile data from google
        $data = $google_service->userinfo->get();

        if (!empty($data['email']) && !empty($data['id']) && !empty($data['name'])) {
            $email = $data['email'];
            $social_acc_id = $data['id'];
            $name = $data['name'];
            $picture = $data['picture'];
            $q="SELECT * FROM `tbl_user` WHERE email='$email' AND social_acc_id='$social_acc_id'";
            $exists= GetTableRow($q);
            if (!$exists) {
                //Store "access_token" value in $_SESSION variable for future use.
               $insert= InsertRec('tbl_user', [
                'name'=> $name,
                'email'=> $email,
                'social_acc_id'=> $social_acc_id,
                'picture'=> $picture,
                'access_token'=>$token['access_token'],
                'created_at'=>"NOW()",
                'updated_at'=>"NOW()"
                ]);
                if($insert>0)
                {

                    $_SESSION['LoginStatus']="LoggedIn";
                   
                    $q="SELECT * FROM `tbl_user` WHERE id='$insert'";
                    $data=GetTableRow($q);
                    $_SESSION['user']=$data;
                    $_SESSION['source']='web';
                    header('location:'.BASE_URL);
                }
            }else{
                $_SESSION['LoginStatus']="LoggedIn";
                $_SESSION['user']=$exists;
                $_SESSION['source']='web';
                header('location:'.BASE_URL);
            }
        }

    }
}

//This is for check user has login into system by using Google account, if User not login into system then it will execute if block of code and make code for display Login link for Login using Google account.
