<?php 
ob_start(); 
session_start(); 
$customer_email = $_SESSION['customer_email']; 
require_once 'db_config.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
    <link rel="icon" href="images/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- boostrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <?php
        if(isset($_GET['remove_btn'])){
            $product_id = $_GET['id'];
            $delete = $con->query("DELETE FROM cards WHERE customer_email='$customer_email' AND product_id='$product_id'");
            if($delete){
                echo '<div class="success-wrap">
                    <div class="text-white p-2 success_sms"> 
                    <div><i class="bi bi-trash3 icon"></i></div>
                    <div style="font-size:20px; color:green">Product remove successfully</div>
                   </div>
                   </div>
                   <script>
                   setTimeout(()=>{
                   document.location="cards.php";
                    }, 1500)
                   </script>';
            }else{echo $con->error;}
        }

    ?>

    <style>
    .success-wrap{
    position: absolute;
    width:100%;
    height:100%;
    top:0;
    left:0;
    padding:10px;
    display:flex;
    justify-content:center;
    align-items:center;
    background-color:#f1f1f1;
    z-index: 1;
    }
    .success_sms{
            display:flex;
            flex-direction:column;
            justify-content:space-around;
            align-items:center;
            width: 450px;
            height:200px;
            border-radius:10px;
            padding:2rem;
            box-shadow:0px 3px 3px 0px #000;
            background-color:#fff;
            color:green;
        }
        .icon{
            font-size:5rem;
            color:green;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>