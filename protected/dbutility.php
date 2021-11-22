<?php
//WriteLog($strQuery);

$DB_CON = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($DB_CON->connect_errno) {
}
function GetDataTable($strQuery)
{
    global $DB_CON;

    $result = mysqli_query($DB_CON, $strQuery);
    
    if (!$result) {
        return 0;// ("Error: %s\n", mysqli_error($DB_CON));
        exit();
    }
    return $result;
}
function rows_count($checking)
{
    $re=GetDataTable($checking);
    return mysqli_num_rows($re);
}
function GetTableRow($strQuery)
{
    global $DB_CON;

    $result = mysqli_query($DB_CON, $strQuery);
    
    if (!$result) {
        return 0;// ("Error: %s\n", mysqli_error($DB_CON));
        exit();
    }
    $record = mysqli_fetch_array($result);
    
    if (true) {
        return $record;
    } else {
        return false;
    }
}

function GetRecordCount($tbl, $criteria)
{
    global $DB_CON;

    if (!empty($criteria)) {
        $where="where $criteria";
    }
    $query="select count(*) as cnt from $tbl $where";
    $result=mysqli_query($DB_CON, $query);
    if ($nRow= mysqli_fetch_array($result)) {
        return $nRow[0];
    } else {
        return "0";
    }
}

function InsertWithLastID($strTable, $arrValue)
{
    $strQuery = "	insert into $strTable (";

    reset($arrValue);
        
    foreach ($arrValue as $key => $value) {
        $strQuery .= $key . ",";
    }
    
    $strQuery = substr($strQuery, 0, strlen($strQuery) - 1);

    $strQuery .= ") values (";

    reset($arrValue);
        
    foreach ($arrValue as $key => $value) {
        if ($value == "ANull" || $value == "") {
            $strQuery .= "Null,";
        } elseif ($value == "NOW()") {
            $strQuery .= "NOW(),";
        } else {
            $strQuery .= "'" . FixString($value) . "',";
        }
    }
        
    $strQuery = substr($strQuery, 0, strlen($strQuery) - 1);
    $strQuery .= ");";
    global $DB_CON;
    $result = mysqli_query($DB_CON, $strQuery);

    $LastChatID = mysqli_insert_id($DB_CON);

    if (!$result) {
        return 0;// ("Error: %s\n", mysqli_error($DB_CON));
        exit();
    }
    return $LastChatID;
}
function InsertRec($strTable, $arrValue)
{
    $strQuery = "	insert into $strTable (";

    reset($arrValue);
        
    foreach ($arrValue as $key => $value) {
        $strQuery .= $key . ",";
    }
    
    
    //while(list ($strKey, $strVal) = each($arrValue))
    //{
    //
    //	$strQuery .= $strKey . ",";
    //
    //	echo $strQuery;
    //}

    // remove last comma
    $strQuery = substr($strQuery, 0, strlen($strQuery) - 1);

    $strQuery .= ") values (";

    reset($arrValue);
        
    foreach ($arrValue as $key => $value) {
        if ($value == "ANull" || $value == "") {
            $strQuery .= "Null,";
        } elseif ($value == "NOW()") {
            $strQuery .= "NOW(),";
        } else {
            $strQuery .= "'" . FixString($value) . "',";
        }
    }
        
    //while(list ($strKey, $strVal) = each($arrValue))
    //{
    //	$strQuery .= "'" . FixString($strVal) . "',";
    //}

    // remove last comma
    $strQuery = substr($strQuery, 0, strlen($strQuery) - 1);
    $strQuery .= ");";
    //		echo $strQuery;
    // execute query
        
    global $DB_CON;
    $success = mysqli_query($DB_CON, $strQuery) or die(mysqli_error($DB_CON));

    //SQLQuery($strQuery);
    //	echo "<br>$strQuery<br>";
        
    //return id of last insert record
    $id=mysqli_insert_id($DB_CON);
        
        
    //$id= getMaxId($strTable);
    return $id;
}
function DeleteRec($strTable, $strCriteria)
{
    if (!empty($strCriteria)) {
        $condition="where $strCriteria";
    }
    $strQuery = "delete from $strTable $condition";
    //SQLQuery($strQuery);
    global $DB_CON;
    $success = mysqli_query($DB_CON, $strQuery);
}
function UpdateRec($strTable, $strWhere, $arrValue)
{
    $strQuery = "	update " . $strTable . " set ";
    reset($arrValue);
    foreach ($arrValue as $key => $value) {
        if ($value == "ANull" || $value == "") {
            $strQuery = $strQuery . $key . "=Null,";
        } elseif ($value == "NOW()") {
            $strQuery = $strQuery . $key . "=NOW(),";
        } else {
            $strQuery = $strQuery . $key . "='" . FixString($value) . "',";
        }
    }
    // remove last comma
    $strQuery = substr($strQuery, 0, strlen($strQuery) - 1);

    $strQuery = $strQuery . " where " . $strWhere . ";";
        
    //		echo $strQuery ;

    global $DB_CON;
    $success = mysqli_query($DB_CON, $strQuery) or die(mysqli_error($DB_CON));
    // execute query
        //SQLQuery($strQuery);
        //die($strQuery);
}
function resturant_category($vendor_id)
{
    $category_query="SELECT * FROM `resturant_category` WHERE vendor_id=$vendor_id  ORDER BY order_no ASC";
    $res=GetDataTable($category_query);
    return $res;
}
function resturant_category_products($category_id)
{
    $query="SELECT * from resturant_product WHERE subcat_id=$category_id AND product_status=1  ORDER BY order_no ASC";
    $res=GetDataTable($query);
    return $res;
}
function resturant_variant($product_id)
{
    $query="SELECT * FROM `resturant_variant` WHERE product_id=$product_id";
    $res=GetDataTable($query);
    return $res;
}
function cityadmin_detail($cityadmin_id)
{
    $query="SELECT * FROM `cityadmin` WHERE cityadmin_id=$cityadmin_id";
    $res=GetTableRow($query);
    return $res;
}
function user_address($user_id)
{
    $q="SELECT * FROM `user_address` WHERE user_id=$user_id ORDER BY is_default DESC";
    $res=GetDataTable($q);
    return $res;
}
function vendor($vendor_id)
{
    $q="SELECT vendor.*,cityadmin.currency,cityadmin.timezone FROM `vendor` INNER JOIN cityadmin ON vendor.cityadmin_id=cityadmin.cityadmin_id WHERE vendor.vendor_id=$vendor_id";
    $res=GetTableRow($q);
    return $res;
}
function resturant_variant_first($product_id)
{
    $q="SELECT * FROM `resturant_variant` WHERE product_id=$product_id order BY variant_id ASC LIMIT 1";
    $res=GetTableRow($q);
    return $res;
}
function restaurant_product_addons($product_id)
{
    $query="SELECT restaurant_product_addons.*,restaurant_addons.addon_name,restaurant_addons.addon_price,restaurant_addons.order_no FROM `restaurant_product_addons`
    INNER JOIN `restaurant_addons` ON restaurant_product_addons.addon_id=restaurant_addons.addon_id
    WHERE restaurant_product_addons.product_id=$product_id
    ORDER BY restaurant_addons.order_no ASC";
    $res=GetDataTable($query);
    return $res;
}
function OrderPlacedNotification($firebaseToken)
{
    $SERVER_API_KEY ='AAAANN1p9wA:APA91bGOsXLbtwPTUspY0J1uo4AzcuWLgQNRrOR3Zk8wnGA1kQsKiJBmRnS9zyHy1Q5M_0uMosp4mFivEYPW5rxn7sg2YCyIXIpOGI3o0YCZygOApY8_N_HXqWMm6er0nssFbLY-Pnyd';

    $data = [
        "registration_ids" => $firebaseToken,
        "notification" => [
            "title" => 'New Order Received',
            "body" => 'Waiting For Confirmation',
            "icon"=>"https://dedodelivery.com/testdm/img/logo/dedo-logo.png",
            /* "sound"=>"", */
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
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

    $response = curl_exec($ch);
    return $response;
}
function tbl_user($id)
{
    $q="SELECT * FROM `tbl_user` WHERE id=$id";
    $res=GetTableRow($q);
    return $res;
}
function orders($user_id, $order_status)
{
    $q="SELECT orders.*,vendor.vendor_name,
    vendor.vendor_logo,
    vendor.slug,
    vendor.main_image
    FROM `orders`,`vendor`
    WHERE
    orders.vendor_id=vendor.vendor_id AND
    user_id=$user_id AND order_status=$order_status 
    ORDER BY `orders`.`id` DESC";
    $res=GetDataTable($q);
    return $res;
}
function order_details($order_id)
{
    $q="SELECT order_details.*,resturant_product.product_name
    FROM `order_details`,resturant_product
    WHERE 
    order_details.product_id=resturant_product.product_id
    AND order_id=$order_id";
    $res=GetDataTable($q);
    return $res;
}
function FCM_Notification($firebaseToken, $title, $body)
{
    $SERVER_API_KEY ='AAAANN1p9wA:APA91bGOsXLbtwPTUspY0J1uo4AzcuWLgQNRrOR3Zk8wnGA1kQsKiJBmRnS9zyHy1Q5M_0uMosp4mFivEYPW5rxn7sg2YCyIXIpOGI3o0YCZygOApY8_N_HXqWMm6er0nssFbLY-Pnyd';

    $data = [
        "registration_ids" => $firebaseToken,
        "notification" => [
            "title" => $title,
            "body" => $body,
            "icon"=>"https://dedodelivery.com/testdm/img/logo/dedo-logo.png",
            /* "sound"=>"", */
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
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

    $response = curl_exec($ch);
    return $response;
}
function SendNotificationToRestrurentAndOrderTaker($vendor_id, $title, $body)
{
    $fcm_token=array();
    $q="SELECT fcm_token FROM `vendor` WHERE vendor_id=$vendor_id";
    $res= GetTableRow($q);
    if (!empty($res['fcm_token'])) {
        $fcm_token[]= $res['fcm_token'];
    }
    $q1="SELECT fcm_token FROM `ordertakers` WHERE vendor_id=$vendor_id";
    $res1= GetDataTable($q1);
    while ($row=mysqli_fetch_array($res1)) {
        if (!empty($row['fcm_token'])) {
            $fcm_token[]= $row['fcm_token'];
        }
    }
        
    // $user_data=tbl_user($_SESSION['user']['id']);
       
    return FCM_Notification($fcm_token, $title, $body);
}
function user_favourites_order_list($user_id)
{
    $q="SELECT user_favourites.*,
    orders.id AS order_id,
    vendor.vendor_name,
    vendor.slug,
    vendor.main_image 
    FROM `user_favourites`,`orders`,`vendor`
    WHERE `user_favourites`.type_id=orders.id
    AND orders.vendor_id=vendor.vendor_id
    AND user_favourites.type='order'
    AND user_favourites.user_id=$user_id";
    $res=GetDataTable($q);
    return $res;
}
function get_resturant_product_detail($product_id)
{
    $q="SELECT * FROM `resturant_product` WHERE product_id=$product_id";
    $res=GetTableRow($q);
    return $res;
}
function get_order_product_addons($order_id, $order_detail_id)
{
    $q="SELECT * FROM `order_product_addons` WHERE order_id=$order_id AND order_detail_id=$order_detail_id";
    $res=GetDataTable($q);
    return $res;
}
function get_restaurant_product_addons($restaurant_product_addon_id)
{
    $q="SELECT restaurant_product_addons.*,restaurant_addons.addon_name,restaurant_addons.addon_price FROM `restaurant_product_addons`,restaurant_addons WHERE restaurant_product_addons.addon_id=restaurant_addons.addon_id AND restaurant_product_addons.id=$restaurant_product_addon_id";
    $res=GetTableRow($q);
    return $res;
}
function userDefaultAddress($user_id)
{
    $q="SELECT * FROM `user_address` WHERE user_id=$user_id AND is_default=1 LIMIT 1";
    return GetTableRow($q);
}
function checkCategoryProductsExists($category_id)
{
    $q="SELECT COUNT(*)  AS total_products FROM `resturant_product` WHERE subcat_id=$category_id AND product_status=1";
    return GetTableRow($q);
}
function campaignsList()
{
    $q="SELECT campaigns.*,campaign_types.name AS campaign_type FROM `campaigns` INNER JOIN campaign_types ON campaigns.campaign_type_id=campaign_types.id ORDER BY id DESC";
    return GetDataTable($q);
}
function JoinedRestaurantCampaigns()
{
    $q="SELECT campaign_vendor.*,
    campaigns.title,
    campaigns.description,
    campaigns.banner 
    FROM `campaign_vendor`
    INNER JOIN campaigns ON campaign_vendor.campaign_id=campaigns.id
    INNER JOIN vendor ON campaign_vendor.vendor_id=vendor.vendor_id
    WHERE vendor.ui_type=2";
    return GetDataTable($q);
}
function campaign_restaurant_category($vendor_id)
{
    $q="SELECT resturant_category.* FROM `campaign_vendor_products` INNER JOIN resturant_category ON campaign_vendor_products.category_id=resturant_category.resturant_cat_id WHERE resturant_category.vendor_id=$vendor_id AND campaign_vendor_products.product_type='buy' GROUP BY resturant_category.resturant_cat_id ORDER BY resturant_category.resturant_cat_id ASC";
    return GetDataTable($q);
}
function campaign_resturant_buy_products($campaign_vendor_id)
{
    $q="SELECT campaign_vendor_products.*, resturant_product.product_name, resturant_product.product_image, resturant_product.description,campaign_vendor.campaign_type_id
   FROM `campaign_vendor_products` 
   INNER JOIN resturant_product ON campaign_vendor_products.product_id=resturant_product.product_id 
   INNER JOIN campaign_vendor ON campaign_vendor_products.campaign_vendor_id=campaign_vendor.id
   WHERE campaign_vendor_id=$campaign_vendor_id AND resturant_product.product_status=1 AND campaign_vendor_products.product_type='buy' GROUP BY campaign_vendor_products.product_id ORDER BY resturant_product.order_no ASC;";
    return GetDataTable($q);
}
function RestaurantCampaignDetail($vendor_id)
{
    $q="SELECT campaign_vendor.*,
    campaigns.title,
    campaigns.description,
    campaigns.banner 
    FROM `campaign_vendor`
    INNER JOIN campaigns ON campaign_vendor.campaign_id=campaigns.id
    INNER JOIN vendor ON campaign_vendor.vendor_id=vendor.vendor_id
    WHERE vendor.ui_type=2 AND campaign_vendor.vendor_id=$vendor_id";
    return GetDataTable($q);
}
function variant_detail($variant_id)
{
    $query="SELECT * FROM `resturant_variant` WHERE variant_id=$variant_id";
    $res=GetTableRow($query);
    return $res;
}
function campaign_resturant_buy_variant($campaign_vendor_id, $product_id)
{
    $query="SELECT resturant_variant.*,campaign_vendor_products.id AS campaign_vendor_product_id FROM `campaign_vendor_products` INNER JOIN resturant_variant ON campaign_vendor_products.variant_id=resturant_variant.variant_id WHERE campaign_vendor_products.campaign_vendor_id=$campaign_vendor_id AND campaign_vendor_products.product_id=$product_id AND product_type='buy';";
    $res=GetDataTable($query);
    return $res;
}
function campaign_resturant_free_variant($campaign_vendor_buy_product_id)
{
  $query="SELECT resturant_variant.*,resturant_product.product_name FROM `campaign_vendor_products`
  INNER JOIN resturant_product ON campaign_vendor_products.product_id=resturant_product.product_id
  INNER JOIN resturant_variant ON campaign_vendor_products.variant_id=resturant_variant.variant_id
  WHERE campaign_vendor_buy_product_id=$campaign_vendor_buy_product_id AND product_type='free';";
    return GetTableRow($query);
}
