<?php
    include_once "../config/dbconnect.php";

    $v_id=$_POST['v_id'];
    $product= $_POST['product'];
    $qty= $_POST['qty'];
   
    $updateItem = mysqli_query($conn,"UPDATE product SET 
        product_id=$product, 
        quantity_in_stock=$qty 
        WHERE product_id=$v_id");


    if($updateItem)
    {
        echo "true";
    }
?>