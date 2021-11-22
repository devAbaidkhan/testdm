<?php

if ($_POST['campaign_type_id']==1) {
    include "campaign_type_1.php";
}else if($_POST['campaign_type_id']==2 || $_POST['campaign_type_id']==3){
    include "campaign_type_2_&_3.php";
}
