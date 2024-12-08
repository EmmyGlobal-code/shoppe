<?php
require_once 'db_config.php';
$errors='';
$file = basename($_FILES['fileToUpload']['name']);
$path = 'uploads/'.basename($_FILES['fileToUpload']['name']);
$fileExtension = strtolower(pathinfo($file, PATHINFO_EXTENSION));

if(isset($_POST['uploadBtn'])){
$productName = $_POST['name'];
$productPrice = $_POST['price'];
$productColour = $_POST['colour'];
$productType = $_POST['type'];
$productDetail = $_POST['detail'];
$check = getimagesize($_FILES['fileToUpload']['tmp_name']);
if($check == false){
    $errors = 'file is not an image';
}else{
    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$path)) {
           $upload = $con->query("INSERT INTO shoptable(
                                        names,
                                        images,
                                        prices,
                                        colours,
                                        types,
                                        details)value(
                                                        '$productName',
                                                        '$file',
                                                        '$productPrice',
                                                        '$productColour',
                                                        '$productType',
                                                        '$productDetail'
                                        )");
            if($upload){
                echo 'upload successfully';
            }else{
                $con->error;
            }
    }else{          
        $errors = 'upload fail';
    }
}
}
?>