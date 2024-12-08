<?php ob_start(); session_start(); require_once 'db_config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="images/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- boostrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
            <div class="display bg-light">
                <div>
                    <?php
                        if(isset($_SESSION['customer_email'])){
                           header("location:customer_account.php");
                        }
                    ?>
                </div>
                <form class="form" method="POST">
                    <div class="logo-wrap">
                        <img src="images/logo.png" alt="logo" style="width:100px;"/><br>
                        <h4> Welcome to WebShoppe</h4>
                        <p>Type your email to login or create WebShoppe account.</p>
                    </div>
                    <input type="email" class="form-control p-4" placeholder="Enter your email" name="customer_email" required /><br>
                    <button class="btn btn-dark p-3 submitBtn" name="submit" >Continue</button><br>
                    <center>
                        <p style="margin:0; padding:0;">By continue you agree to WebShoppe</p>
                        <p style="margin:0; padding:0;"><a href="#">Terms and service</a></p>
                    </center>
                        <br>
                    <div class="btn btn-primary p-3" name="">Sign up with Facebook</div>
                </form>
            </div>
        <style>
        .display{
            width:100%;
            height:100%;
            left:0;
            top:0;
            position:absolute;
            z-index: 1;
        }
        .form{
            width: 350px;
            height:350px;
            position:absolute;
            transform:translate(-50%, -50%);
            left:50%;
            top:40%;
            display:flex;
            flex-direction:column;
        }
        </style>
        <?php
            if(isset($_POST['submit'])){
                $customer_email = $_POST['customer_email'];
                $select = $con->query("SELECT*FROM customers WHERE customer_email='$customer_email'");

                if($select->num_rows>0){
                    $_SESSION['customer_email'] = $customer_email;
                    header("location:app.php");
                }else{
                    $insert = $con->query("INSERT INTO customers(customer_email)VALUES('$customer_email')");
                    if($insert){
                        $_SESSION['customer_email'] = $customer_email;
                        header("location:app.php");
                    }else{
                        echo $con->error;
                    }
                }
            }
        ?>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>