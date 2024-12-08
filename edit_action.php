<?php
$imageFile = basename($_FILES['uploadImg']['name']);
$dir ='uploads/'.basename($_FILES['uploadImg']['name']);
$path = pathinfo($_FILES['uploadImg']['name'],PATHINFO_EXTENSION);
require_once 'db_config.php';

    if (isset($_POST['editBtn'])) {
        $id = $_POST['item_id'];
        $productName = $_POST['name'];
        $productPrice = $_POST['price'];
        $productColour = $_POST['colour'];
        $productType = $_POST['type'];
        $productDetail = $_POST['detail'];
        if (empty($_FILES['uploadImg']['name'])) {
            $update = $con->query("UPDATE shoptable SET names='$productName', prices='$productPrice', colours='$productColour', types='$productType', details='$productDetail' WHERE id='$id'");
            if($update){
                echo 'update succefully';
            }else{
                echo $con->error;
            }
        }else{
            if(move_uploaded_file($_FILES['uploadImg']['tmp_name'], $dir)){
                $update = $con->query("UPDATE shoptable SET names='$productName',
                images='$imageFile', prices='$productPrice', colours='$productColour', types='$productType', details='$productDetail' WHERE id='$id'");
            if($update){
                echo 'update succefully';
            }else{
                echo $con->error;
            }
            }else{
                echo 'upload fail';
            }
        }
    }

?>