<?php


print_r($_POST);
exit();

$url = 'https://fcm.googleapis.com/fcm/send';
$fields = array(
    'registration_ids' => array(''),
    'data' => array("message" => '$request->msg', "title" => '@dm')
);


$fields = json_encode($fields);

$headers = array(
    'Authorization: key=' . "AAAAdRgzpFE:APA91bHP6jzHKWwOGbSZRDAk3ENZUG6LYahZ6pGkAgJZTArm3a5jBgITeWdLenjGTU9rK1n2tkulcSJddi5N4q8_b6DfrjTcvX9MotjafBWWdBXarnyWY0xP1es_0Mq67zGStUBmSJ-w",
    'Content-Type: application/json'
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);

$result = curl_exec($ch);

curl_close($ch);

return response()->json(['status'=>'success','title'=>'@chat','message'=>$result]); ?>