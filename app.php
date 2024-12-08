<?php ob_start(); session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebShoppe</title>
    <link rel="icon" href="images/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"/>
    <!-- boostrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <?php
        require_once 'db_config.php';
        $customer_email = ''; 
        if(isset($_SESSION['customer_email'])){
            $customer_email = $_SESSION['customer_email']; 
        }else{
           // return null;
        }
    ?>
</head>
<body>
        <nav class="navbar">
            <div class="nav-wrap">
                <ul class="left-menu">
                    <li>    
                    <i class="bi bi-list h2 icons" onclick="openMenue()" title="menue"></i></li>
                    <li><h3 class="nameText">WebShoppe</h3></li>
                </ul>
                <ul class="center-menu">
                    <li>
                        <form action="search_action.php" method="GET">
                            
                        <div class="search-input-wrap"><i class="bi bi-search h3" style="color:#7c7ef8;"></i>
                        <input type="search" class="srh-input" name="searchText" placeholder="Search here...." onclick="search()" required autocomplete="off">
                        </div>
                        </form>
                    </li>
                </ul>
                <ul class="right-menu">
                    <li> <a href="customer_login.php"><button class="btn btn-dark"><i class="bi bi-person"></i> Account</button></a></li>
                    <li>
                    <?php
                        $card_num = '';
                        $number = $con->query("SELECT COUNT(*) AS nums FROM cards WHERE customer_email='$customer_email'");
                        if($number->num_rows>0){
                            while($i=$number->fetch_assoc()){
                                $card_num = $i['nums'];
                            }
                        }
                        ?>
                        <div class="card-wrap">
                            <a href="cards.php" title="card"><i class="bi bi-cart-check h3" style="color:#000;"></i></a> 
                    <?php if(!empty($card_num)){echo '<p class="card-num">'.$card_num.'</p>';} ?>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
            <!--mobile navbar-->
            <nav class="mobile-nav">
                <div class="mobile-nav-wrap">
                    <ul class="left-menu">
                        <li><i class="bi bi-list h2 icons" onclick="openMenue()"></i></li>
                        <li><h3 class="nameText">WebShoppe</h3></li>
                    </ul>
                <ul class="right-menu">
                    <li><a href="search_action.php"><i class="bi bi-search h3" style="color:#000;"></i></a></li>
                    <li><a href="customer_login.php"><i class="bi bi-person h3" style="color:#000;"></i></a></li>
                    <li>
                    <?php
                    $card_num = '';
                    $number = $con->query("SELECT COUNT(*) AS nums FROM cards WHERE customer_email='$customer_email'");
                    if($number->num_rows>0){
                        while($i=$number->fetch_assoc()){
                            $card_num = $i['nums'];
                        }
                    }
                    ?>
                    <div class="card-wrap">
                        <a href="cards.php"><i class="bi bi-cart-check h3" style="color:#000;"></i></a> 
                        <?php if(!empty($card_num)){echo '<p class="card-num">'.$card_num.'</p>';} ?>
                    </div>
                    </li>
                </ul>
                </div>
            </nav> <!--End fo mobile-nav -->

        <!-- Menue Container-->
    <div class="menueListContainer bg-light" id="listContainer">
        <div class="closeContainer">
            <i class="bi bi-x-square h3 closeIcon" onclick="closeMenue()"></i>
        </div>
    </div><br>
    <div class="container mt-5">
         <!-- Top Deal Container-->
         <div class="p-1">
        <h3 class="headText">Top Deals</h3>
        <div class="display">
            <?php
            $sql = $con->query("SELECT*FROM shoptable ORDER BY id DESC");
            if($sql->num_rows>0){
                while ($i = $sql->fetch_assoc()) {
                    echo '
                        <a href="view_item.php?item_id='.$i['id'].'&btn=" class="itemWrap">
                            <image src="uploads/'.$i['images'].'" class="image"/>
                            <div class="priceContainer">
                            <p class="itemsPrice">N'.$i['prices'].'</p>
                            <p class="itemsName">'.$i['names'].'</p>
                            </div>
                          </a>';
                }
            }else{
                echo '<p class="notFondText">'.$i['types'].' Not available Loading...</p>';
            }
            ?>
        </div><!--End of top deal-->

        <!--shop by category--> <div>
        <h3 class="headText">Shop by Categories</h3>
        <div class="categoryCon">
            <a class="content" href="view_all.php?types=Phones&btn"><i class="bi bi-phone"></i> <span class="spanText">Phones</span></a>
            <a class="content" href="view_all.php?types=Fashions&btn"><span class="spanText">Fashions</span></a>
            <a class="content" href="view_all.php?types=Computing&btn"><i class="bi bi-pc-display-horizontal"></i> <span class="spanText">Computing</span></a>
            <a class="content" href="view_all.php?types=Electronics&btn"><i class="bi bi-tv-fill"></i> <span class="">Electronics</span></a>
            <a class="content" href="#"><i class="bi bi-tv-fill"></i> <span class="">Dresss</span></a>
        </div>
        </div><!-- end shop by category-->

         <!-- Phones querys--> <div>
         <h3 class="headText">Phones</h3>
         <div class="display">
            <?php
                $sql = $con->query("SELECT*FROM shoptable   WHERE types='Phones' LIMIT 6");
                if($sql->num_rows>0){

                    while ($i = $sql->fetch_assoc()) {
                        echo '
                             <a href="view_item.php?item_id='.$i['id'].'&btn=" class="itemWrap">
                                <image src="uploads/'.$i['images'].'" class="image"/>
                                <div class="priceContainer">
                                <p class="itemsPrice">N'.$i['prices'].'</p>
                                <p class="itemsName">'.$i['names'].'</p>
                                </div>
                                </a>';
                    }
                }else{
                    echo '<p class="notFondText">Not available Loading...</p>';
                }
            ?>
            </div> 
            <div class="viewBtnContainer">
                <a class="viewMoreBtn" href="view_all.php?types=Phones&btn">VIEW ALL <i class="bi bi-chevron-right"></i></a>
            </div>
        </div><!-- End Phones querys-->

             <!-- Fashion querys--> <div>
         <h3 class="headText">Fashion</h3>
         <div class="display">
            <?php
                $sql = $con->query("SELECT*FROM shoptable   WHERE types='Fashions' LIMIT 6");
                if($sql->num_rows>0){

                    while ($i = $sql->fetch_assoc()) {
                        echo '
                             <a href="view_item.php?item_id='.$i['id'].'&btn=" class="itemWrap">
                                <image src="uploads/'.$i['images'].'" class="image"/>
                                <div class="priceContainer">
                                <p class="itemsPrice">N'.$i['prices'].'</p>
                                <p class="itemsName">'.$i['names'].'</p>
                                </div>
                                </a>';
                    }
                }else{
                    echo '<p class="notFondText">Not available loading...</p>';
                }
            ?>
            </div> 
            <div class="viewBtnContainer">
                <a class="viewMoreBtn" href="view_all.php?types=Fashions&btn">VIEW ALL <i class="bi bi-chevron-right"></i></a>
            </div>
        </div><!-- End Fashion querys-->

             <!-- Computing querys--> <div>
         <h3 class="headText">Computing</h3>
         <div class="display">
            <?php
                $sql = $con->query("SELECT*FROM shoptable   WHERE types='Computing' LIMIT 6");
                if($sql->num_rows>0){

                    while ($i = $sql->fetch_assoc()) {
                        echo '
                             <a href="view_item.php?item_id='.$i['id'].'&btn=" class="itemWrap">
                                <image src="uploads/'.$i['images'].'" class="image"/>
                                <div class="priceContainer">
                                <p class="itemsPrice">N'.$i['prices'].'</p>
                                <p class="itemsName">'.$i['names'].'</p>
                                </div>
                                </a>';
                    }
                }else{
                    echo '<p class="notFondText">Not available Loading...</p>';
                }
            ?>
            </div>
            <div class="viewBtnContainer">
                <a class="viewMoreBtn" href="view_all.php?types=Computing&btn">VIEW ALL <i class="bi bi-chevron-right"></i></a>
            </div>
        </div><!-- End Computing querys-->

             <!-- Electronics querys--> <div>
         <h3 class="headText">Electronics</h3>
         <div class="display">
            <?php
                $sql = $con->query("SELECT*FROM shoptable   WHERE types='Electronics' LIMIT 6");
                if($sql->num_rows>0){

                    while ($i = $sql->fetch_assoc()) {
                        echo '
                             <a href="view_item.php?item_id='.$i['id'].'&btn=" class="itemWrap">
                                <image src="uploads/'.$i['images'].'" class="image"/>
                                <div class="priceContainer">
                                <p class="itemsPrice">N'.$i['prices'].'</p>
                                <p class="itemsName">'.$i['names'].'</p>
                                </div>
                                </a>';
                    }
                }else{
                    echo '<p class="notFondText">Not available  Loading...</p>';
                }
            ?>
            </div> 
            <div class="viewBtnContainer">
                <a class="viewMoreBtn" href="view_all.php?types=Electronics&btn">VIEW ALL <i class="bi bi-chevron-right"></i></a>
            </div>
        </div><!-- End Electronies querys-->
    </div>
    </div>

    <?php require_once 'footer.php'; ?>
    
    <style>
        *{
            margin:0;
            padding:0;
        }
        .mobile-nav{
            width: 100%;
            position:fixed;
            left:0;
            top:0;
            background-color:#fff;
            padding:10px;
            z-index: 1;
            border-bottom:solid 1.5px #7c7ef8;
            @media screen and (min-width:890px) {
               display:none;
            }
        }
        .mobile-nav-wrap{
            display:flex;
            flex-direction:row;
            justify-content:space-between;
            align-items:center;
            width:100%;
            gap:1rem;
            ul{
                margin:0;
                padding:0;
                list-style:none;
            }
        }
        .navbar{
            width: 100%;
            position:fixed;
            left:0;
            top:0;
            background-color:#fff;
            z-index: 1;
            border-bottom:solid 1.5px #7c7ef8;
            @media screen and (max-width: 890px){
             display:none;
             .mobile-nav{
                display:block;
             }
          }
        }
        .nav-wrap{
            display:flex;
            flex-direction:row;
            justify-content:space-around;
            align-items:center;
            width:100%;
            gap: 2rem;
            ul{
                margin:0;
                padding:0;
                list-style:none;
            }
        }
        .left-menu{
            display:flex;
            flex-direction:row;
            justify-content:space-between;
            align-items:center;
            gap:1rem;
        }
        .right-menu{
            display:flex;
            flex-direction:row;
            justify-content:space-between;
            align-items:center;
            gap:1rem;
        }
        .icons{
            cursor: pointer;
            padding:2px;
            border-radius:5px;
            transition:0.3s;
            color:#000;
        }
        .icons:hover{
            box-shadow:0px 3px 3px 0.1px #000;
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
        .center-menu{

        }
        .search-input-wrap{
            border:solid 1px #7c7ef8;
            border-radius:5px;
            padding-left:10px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            gap:0.5rem;
        }
        .srh-input{
            outline:none;
            width:350px;
            border:none;
            
        }
        .menueListContainer{
            position: fixed;
            width: 100%;
            background-color:#fff;
            height: 100%;
            left: -100%;
            top:0;
            display:none;
            transition: 1s;
            z-index: 1;
        }
        .closeContainer{
            position: absolute;
            padding:5px;
            left:3%;
        }
        .closeIcon{
            cursor:pointer;
        }

        .display{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            overflow: auto;
            gap:0.5rem;
            padding:8px;
        }
        .viewBtnContainer{
        display:flex;
        justify-content:flex-end;
        align-items:center;
    }
    .viewMoreBtn{
        margin:0;
        padding:0;
        cursor: pointer;
        margin-right:15px;
        margin-top:10px;
    }
 .image{
        width:150px;
        height: 150px;
        margin:10px;
        }
    .itemWrap{
        color:#000;
        width: 200px;
        height:230px;
        text-decoration: none;
        box-shadow:0px 2px 3px 2px #ddd;
        padding:2px;
        border-radius:5px;
        transition:0.3s;
        }
        .itemWrap:hover{
            text-decoration:none;
            box-shadow:0px 1px 2px 1px #ddd;
            background-color:rgba(225,225,225,0.3);
            color:#000;
        }
        .itemsName{
        text-align: center;
        margin:0;
        }
        .itemsPrice{
            font-weight: bold;
            text-align: center;
            margin:0;
        }
    .headText{
        margin-top:18px;
        margin-bottom: 18px;
        font-weight:bold;
    }
    .categoryCon{
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        gap:1rem;
        margin-top:15px;
        overflow:auto;
        padding:10px;
    }
    .content{
        background-color:#ddd;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap:0.5rem;
        font-weight: bold;
        border-radius: 10px;
        color:#000;
        box-shadow: none;
        cursor: pointer;
        transition: 0.3s;
        padding:10px;
    }
    .content:hover{
        box-shadow: 0px 3px 3px 0px #000;
    }
    </style>
    <script>
        function search(){
            document.location='search_action.php';
        }
    </script>
        <script src="menueBar.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>