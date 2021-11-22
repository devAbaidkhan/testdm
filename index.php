<?php 

include_once "protected/config.php";

if(isset($_GET['pid']))

{

$path = parse_url($_GET['pid'], PHP_URL_PATH);

$url_parse = explode("/", trim($path, "/"));

/* echo '<pre>';

print_r($url_parse);

echo '</pre>';
exit; */
if($_GET['pid']=='restaurants'){include_once "resort.php";}

if($url_parse[0]=='restaurant'){include_once "resort-details.php";}

if($_GET['pid']=='login'){include_once "login.php";}

if($_GET['pid']=='signup'){include_once "signup.php";}

if($_GET['pid']=='forgot-password'){include_once "forgot-password.php";}

if($_GET['pid']=='privacy'){include_once "privacy.php";}

if($_GET['pid']=='order-successful'){include_once "order-successful.php";}

if($_GET['pid']=='order-history'){include_once "order-history.php";}

if($_GET['pid']=='deals'){include_once "deals.php";}

if($_GET['pid']=='favourite-orders'){include_once "favourite-orders.php";}

if($_GET['pid']=='profile'){include_once "profile.php";}

if($_GET['pid']=='cart'){include_once "cart.php";}

if($_GET['pid']=='cart-checkout'){include_once "checkout.php";}

if($_GET['pid']=='order-successful'){include_once "order-successful.php";}

if($_GET['pid']=='search'){include_once "search-page.php";}

if($url_parse[0]=='campaigns-restaurant'){include_once "campaigns_restaurant_details.php";exit;}

if($url_parse[0]=='campaigns'){include_once "campaigns.php";}

}else

{

    include_once "home.php";

}



?>