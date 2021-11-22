<?php



function SetSettingUser(){}
function SetTheme(){}
function GetLanguage(){}
//function GetUser(){}
//function GetUser(){}


////////COMMON FUNCTIONS ////////////
function FixString($strString){
        $strString = trim($strString);
        $strString = str_replace("'", "''", $strString);
        $strString = str_replace("\'", "'", $strString);
        $strString = str_replace("", ",", $strString);
        $strString = str_replace("\\", "", $strString);
        $strString = str_replace("\"", "&#34;", $strString);
        $strString = str_replace('\"', '"', $strString);
        return $strString;

}

function fetchData($data)
{
    $data = $_REQUEST["$data"];
    $data = str_replace(";", "", $data);
    $data = str_replace("=", "", $data);
    $data = str_replace("--", "", $data);
    $data = str_replace("'", "", $data);
    $data = str_replace("'", "", $data);
    $data = str_replace("<", "", $data);
    $data = str_replace(">", "", $data);

    return $data;
}


?>