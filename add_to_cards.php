<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cards</title>
    <link rel="icon" href="images/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- boostrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">
    <?php
        require_once 'db_config.php';
        if(isset($_GET['addBtn'])){
            $customer_email = $_GET['customer_email'];
            $customer_address = $_GET['address'];
            $product_id = $_GET['product_id'];
            $date = $_GET['date'];
            $select = $con->query("SELECT*FROM shoptable WHERE id='$product_id'");
            $product_name='';
            $product_image ='';
            $product_detail='';
            $product_price ='';

            if($select->num_rows>0){
                while($i=$select->fetch_assoc()){
                    $product_name=$i['names'];
                    $product_image =$i['images'];
                    $product_detail=$i['details'];
                    $product_price =$i['prices'];
                }
            }else{echo $con->error;}
            
            //check if product already exists in customer cards
            $check = $con->query("SELECT*FROM cards WHERE product_id='$product_id' AND customer_email='$customer_email'");
            if($check->num_rows>0){
                    sleep(1);
                    echo '
                    <div class="text-white success_sms"> 
                    <div><i class="bi bi-check-circle-fill icon"></i></div>
                    <div style="font-size:20px;">Product already to card successfully</div>
                    <div class="btn-wrap mt-3">
                        <a href="app.php"><button class="btn btn-light p-2">Continue shoping</button></a>
                       <a href="cards.php"><button class="btn btn-light p-2 text-success">Checkout</button></a>
                    </div>
                   </div>';
            }else{
                //set limit for cards add
                $sql = $con->query("SELECT COUNT(product_id) AS nums FROM cards WHERE customer_email='$customer_email'");
                if ($sql->num_rows>0) {
                    $limits=0;
                    while ($i=$sql->fetch_assoc()) {
                      $limits = $i['nums'];
                    }
                    if($limits>4){
                        echo '<div class="bg-white wrap-checkout">
                        <p>Card has reach it maximum limit</p>
                        <a href="cards.php"><button class="btn btn-warning btn-lg">CHECKOUT</button></a>
                        </div>';
                    }else{
                        $insert = $con->query("INSERT INTO cards(product_id,product_name,product_image,product_detail,product_price,customer_email,customer_address,dates)values('$product_id','$product_name','$product_image','$product_detail','$product_price','$customer_email','$customer_address','$date')");
                            if($insert){
                                sleep(1);
                                echo '<div class="text-white success_sms"> 
                                <div><i class="bi bi-check-circle-fill icon"></i></div>
                                <div style="font-size:20px;">Product add to card successfully</div>
                                <div class="btn-wrap mt-3">
                                    <a href="app.php"><button class="btn btn-light p-2">Continue shoping</button></a>
                                <a href="cards.php"><button class="btn btn-light p-2 text-success">Checkout</button></a>
                                </div>
                            </div>';
                            }else{echo $con-error;}
                    }

                } // end of limit query
                
            }
        }
    ?>

    <style>
        .success_sms{
            display:flex;
            flex-direction:column;
            justify-content:space-around;
            align-items:center;
            width: 450px;
            border-radius:10px;
            padding:2.5rem;
            box-shadow:0px 3px 3px 0px #000;
            background-color:#fff;
            div{
                color:#000;
            }
        }
        .icon{
            font-size:4rem;
            color:green;
        }
        .btn-wrap{
            display:flex;
            justify-content:space-between;
            align-items:center;
            gap:5rem;
        }
        .wrap-checkout{
            border-radius:8px;
            padding:4rem;
            box-shadow: 0px 2px 2px 0px #f1f1f1;
        }
    </style>
</body>
</html>