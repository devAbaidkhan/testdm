<?php
include "../protected/config.php";
$search = isset($_POST['search'])?trim($_POST['search']):'';

/* echo '<pre>';
print_r($res->num_rows);
echo '</pre>'; */
?>
<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active col-6" id="nav-restrurents-tab" data-toggle="tab" href="#nav-restrurents"
            role="tab" aria-controls="nav-restrurents" aria-selected="true">Restrurents</a>
        <a class="nav-item nav-link col-6" id="nav-items-tab" data-toggle="tab" href="#nav-items" role="tab"
            aria-controls="nav-items" aria-selected="false">Items</a>
    </div>
</nav>
<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-restrurents" role="tabpanel" aria-labelledby="nav-restrurents-tab">
        <ul class="list-group">
            <?php
            $restruarent_q="SELECT * FROM `vendor` WHERE vendor_name LIKE '%$search%' AND  ui_type=2";
            $res=GetDataTable($restruarent_q);
            if ($res->num_rows>0) {
                while ($row=mysqli_fetch_object($res)) {
                    ?>

                        <a href="<?=BASE_URL.'restaurant/'.$row->slug?>"
                            class="list-group-item list-group-item-action"><?=$row->vendor_name?></a>
                        <?php
                }
            }
            ?>
        </ul>
    </div>
    <div class="tab-pane fade" id="nav-items" role="tabpanel" aria-labelledby="nav-items-tab">
        <ul class="list-group">
        <?php
            $prod_q="SELECT vendor.*,resturant_product.product_name FROM `vendor`
            INNER JOIN resturant_product
            ON vendor.vendor_id = resturant_product.vendor_id
            WHERE 
            vendor.ui_type=2
            AND resturant_product.product_name LIKE '%$search%';";
            $res=GetDataTable($prod_q);
            if ($res->num_rows>0) {
                while ($row=mysqli_fetch_object($res)) {
                    ?>

                        <a href="<?=BASE_URL.'restaurant/'.$row->slug?>"
                            class="list-group-item list-group-item-action"><?=$row->product_name?> <small class="text-danger">( <?=$row->vendor_name?> ) </small></a>
                        <?php
                }
            }
            ?>
        </ul>
    </div>
</div>