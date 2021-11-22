<?php
$token=$_GET['token'];
 $status=FCM_Notification(array($token),'Dedo','Dedo Testing Notfication');
echo"<pre>";
print_r($status);
echo"<pre>";
function FCM_Notification($firebaseToken,$title,$body){
    $SERVER_API_KEY ='AAAANN1p9wA:APA91bGOsXLbtwPTUspY0J1uo4AzcuWLgQNRrOR3Zk8wnGA1kQsKiJBmRnS9zyHy1Q5M_0uMosp4mFivEYPW5rxn7sg2YCyIXIpOGI3o0YCZygOApY8_N_HXqWMm6er0nssFbLY-Pnyd';

    $data = [
        "registration_ids" => $firebaseToken,
        "data" => [
            "title" => $title,
            "message" => $body,
            "icon"=>"https://dedodelivery.com/testdm/img/logo/dedo-logo.png",
            /* "sound"=>"", */
            // "click_action"=> "New_Order",
            // "openURL" => "https://dedodelivery.com/dedo_testing/ordertaker/today_order_restaurant",
        ],
        "webpush"=>[
            "fcm_options"=>[
                "link"=> "https://dedodelivery.com/dedo_testing/ordertaker/today_order_restaurant"
                ]
            ]
    ];
    $dataString = json_encode($data);

    $headers = [
        'Authorization: key=' . $SERVER_API_KEY,
        'Content-Type: application/json',
    ];

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

    $response = curl_exec($ch);
    return $response;
}

?>