<?php ob_start(); session_start(); require_once 'db_config.php'; $email = $_SESSION['customer_email']; if(empty($email)){ header("location:customer_login.php"); } ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Account</title>
    <link rel="icon" href="images/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- boostrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">
    <nav class="navbar">
        <div class="container">
            <div class="nav-wrap bg-white">
                <div class="left-nav">
                    <a href="app.php" title="shop"><i class="bi bi-shop icon-size" style="color:#000;"></i></a>
                </div>
                <div class="center-nav">2</div>
                <div class="right-nav">
                    <ul class="logout-wrap">
                    <a href="#" style="color:#000;"><i class="bi bi-question-circle icon-size" style="color:#000"></i> Helps</a>
                    <?php
                        $card_num = '';
                        $number = $con->query("SELECT COUNT(*) AS nums FROM cards WHERE customer_email='$email'");
                        if($number->num_rows>0){
                            while($i=$number->fetch_assoc()){
                                $card_num = $i['nums'];
                            }
                        }
                        ?>
                        <div class="card-wrap">
                            <a href="cards.php" title="card"><i class="bi bi-cart-check icon-size" style="color:#000;"></i></a> 
                    <?php if(!empty($card_num)){echo '<p class="card-num" style="color:#000">'.$card_num.'</p>';} ?>
                        </div>
                     <button class="btn bg-white" id="logout" onclick="logout()" title="<?php echo $email; ?>"><i class="bi bi-power icon-size"></i></button>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div id="logoutDisplay"></div>

    <div class="container">
    <div class="container mt-3 custom-container">
        <div class="row custom-row">
            <div class="col-lg-4 col-md-6 col-sm-6 left-column bg-white p-3">
                <ul>
                    <p class="paraText">Settings & privacy</p><hr>
                    <li><i class="bi bi-person-circle"></i> Profiles</li>
                    <li><i class="bi bi-check2-circle"></i> Update account</li>
                    <li><i class="bi bi-lock"></i> Change email address</li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 right-column bg-white p-3">
            <ul class="">
                <p class="paraText" >Help & support</p><hr>
                <li>Report a problem</li>
                <li>Account 1</li>
                <li><i class="bi bi-question-circle"></i> Help</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container mt-3">
    <div class="history-con">
            <p class="bg-white p-4">Transaction History</p>
        </div>
    </div>

    </div>

        <?php require_once 'footer.php'; ?>
    <style>
        .nav-wrap{
            display:flex;
            flex-direction:row;
            justify-content:space-between;
            align-items:center;
            background:#ddd;
            padding:1rem;
            width:100%;
            border-radius:10px;
        }
      .logout-wrap{
            display:flex;
            flex-direction:row;
            justify-content:space-between;
            align-items:center;
            gap:1rem;
            p{
                color:#d1d1d1;
            }
        }
        .icon-size{
            font-size:1.5rem;
        }
        .card-wrap{
            display:flex;
            justify-content:center;
        }
        .card-num{
            background-color:red;
            font-size:13px;
            width:18px;
            height:18px;
            padding:0;
            margin:0;
            border-radius:50%;
            display:inline;
            display:flex;
            justify-content:center;
            align-items:center;
        }
        .profile-icon{
            font-size:5rem;
            cursor: pointer;
            border-radius:30px;
        }
        .custom-row{
            display:flex;
            flex-direction:row;
            flex-wrap:space-between;
            justify-content:space-between;
            align-items:center;
            gap:0rem;
        }
        .left-column{
            display:flex;
            flex-direction:column;
            justify-content:space-between;
        }
        .center-column{
            display:flex;
            justify-content:center;
            align-items:center;
        }
        .right-column{
            display:flex;
            flex-direction:column;
            justify-content:space-between;
            
        }
        .paraText{
            font-weight:bold;
            font-size:1.3rem;
        }
        .custom-container{
            border-radius:10px;
        }
        ul > li{
            list-style:none;
            margin:5px;
        }
        .logout-sms{
            position:fixed;
            width: 100%;
            height:100%;
            left:100%;
            top:0;
            left:0;
            background-color:rgba(100,100,120,0.8);
            z-index: 1;
            display:flex;
            justify-content:center;
            align-items:center;
        }
        .logout-sms-wrap{
            background-color:#fff;
            padding:4rem;
            border-radius:5px;
            box-shadow:0px 2px 3px 0px #000;
        }
        .logout-btn-wrap{
            display:flex;
            justify-content:space-between;
            align-items:center;
            gap:1rem;
            button{
                padding:10px;
                width:80px;
            }
        }
    </style>

    <script>
        function logout(){
            document.getElementById('logoutDisplay').innerHTML='<div class="logout-sms"><div class="logout-sms-wrap"><p>Are your sure you want logout?</p><div class="logout-btn-wrap"><form><button class="btn btn-light" name="logout">Yes</button></form><a href="customer_account.php"><button class="btn btn-light text-primary" id="closeBtn">No</button></a></div></div></div>';
        }

    </script>

<?php
        if(isset($_GET['logout'])){
            sleep(1);
            session_destroy();
            header("location:app.php");
        }
        
        ?>
</body>
</html>