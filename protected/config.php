<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

include('common.php');
include('settings.php');
include('constants.php');
include('dbconfig.php');
include('dbutility.php');
include('utility.php');
include('functions.php');


?>