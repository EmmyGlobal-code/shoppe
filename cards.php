<?php ob_start(); session_start();require_once 'db_config.php'; 
 if(isset($_SESSION['customer_email'])){$customer_email = $_SESSION['customer_email'];}
 else{$customer_email = '';}
 ?>
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
        <nav class="navbar">
            <div class="container">
                    <div class="nav-wrap">
                <div class="left-menu">
                    <a href="app.php" title="shop"><i class="bi bi-shop icon-size" style="color:#000"></i></a>
                </div>
                <div class="center-menu">
                   2
                </div>
                <div class="right-menu">
                <a href="#" style="color:#000;"><i class="bi bi-question-circle icon-size" style="color:#000"></i> Helps</a>
                <a href="customer_login.php"><button class="btn btn-dark"><i class="bi bi-person"></i> Account</button></a>
                </div>
            </div>
            </div>
        </nav>
    <div class="container mt-5">
    <div class="row">
        <!--col-1-->
        <div class="col col-bg p-3">
            <div class="card-wrap">
                <?php
                $number = $con->query("SELECT COUNT(*) AS nums FROM cards WHERE customer_email='$customer_email'");
                if($number->num_rows>0){
                    while($i=$number->fetch_assoc()){
                        echo '<p> Card('.$i['nums'].') </p>';
                    }
                }
                ?>
            </div><hr>
        <?php
        $select = $con->query("SELECT*FROM cards WHERE customer_email='$customer_email'");
        if($select->num_rows>0){
            while($i=$select->fetch_assoc()){
                echo '
                    <div class="col-wrap">
                        <div class="image_wrap">
                            <image src="uploads/'.$i['product_image'].'" class="image2"/>
                            <p class="pl-3 detail-text"><span>'.$i['product_name'].'</span> <span>'.$i['product_detail'].'</span></p>
                        </div>
                        <div><p class="itemsPrice">N'.$i['product_price'].'</p></div>
                    </div><br>
                    <div class="remove-wrap">
                        <a href="delete.php?id='.$i['product_id'].'&remove_btn="><button class="removeBtn" name="remove_btn"><i class="bi bi-trash"></i> Remove</button></a>
                        <div>'.$i['dates'].'</div>
                    </div><hr>

              ';

            }
        }else{
            echo '<div class="bg-white p-5">
                    <center>
                        <h3>No items found in your card</h3><br>
                        <button class="btn btn-primary btn-lg" ><a href="app.php" class="links">Start Shop</a></button>
                    </center>
                  </div>';
        }
        ?>
            <div class="total_wrap">
                <?php
                $price = $con->query("SELECT SUM(product_price) AS total FROM cards WHERE customer_email='$customer_email'");
                if($price->num_rows>0){
                    while($i=$price->fetch_assoc()){
                        if(!empty($i['total'])){
                        echo '<button class="btn btn-success btn-lg"> CHECKOUT(N'.$i['total'].',000)</button>';
                         }
                    }
                }
                ?>
            </div>
          </div> <!-- end of col1-->
          </div> <!-- end of row-->
       
        <div class="display-wrap p-3 mt-5">
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
        </div>
        </div>
    </div><br>
    <?php require_once 'footer.php'; ?>
    <style>
        .nav-wrap{
            display:flex;
            flex-direction:row;
            justify-content:space-between;
            align-items:center;
            width:100%;
            background-color:#fff;
            padding:1.5rem;
            border-radius:10px;
            gap: 1rem;
        }
        .icon-size{
            font-size:1.5rem;
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
        .center-menu{

        }
        .srh-input{
            padding:8px;
            border-radius:5px;
            outline:none;
            width:350px;
            border-width:1.5px;
            border-color:#7c7ef8;
        }
        .srh-btn{
            padding:8px;
            outline:none;
            border-radius:5px;
            border-width:1.5px;
            border:none;
            background-color:#7c7ef8;
        }
.notFondText{
    padding:5px;
}
.shopContainer{
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    width: 10%;
    align-items:center;
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
.display{
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items:center;
    gap:0.5rem;
    overflow: auto;
    padding:8px;
}
.display-wrap{
    background-color:#fff;
}
.headText{
    margin-top:18px;
    margin-bottom: 18px;
    font-weight:bold;
}

.content{
    background-color:#23242a;
    display: flex;
    justify-content: center;
    align-items: center;
    font-weight: bold;
    border-radius: 10px;
    color:#fff;
    margin:10px;
    box-shadow: none;
    cursor: pointer;
    transition: 0.3s;
    padding:8px;
}
.content:hover{
    box-shadow: 0px 4px 4px 0px #111111;
    color:#fff;
}
.srh-wrap{
    width:100%;
    height:100%;
    position:fixed;
    top:0;
    left:0;
    background-color:#fff;
    z-index: 1;
    display:flex;
    flex-direction:column;
    justify-content:flex-start;
    padding:15px;
    overflow:auto;
}
.srhItemWrap{
  color:#000;
  text-decoration: none;
  padding:2px;
  display:flex;
  margin-top:10px;
  align-items:center;
}
.srhItemWrap:hover{
    text-decoration:none;
    color:#000;
    box-shadow:0px 2px 3px 2px #ddd;
}
.srh-not-found{
    padding:10px;
    font-size:20px;
}
.closeSrch{
    position: fixed;
    display:flex;
    flex-direction:row;
    justify-content:space-between;
    padding:10px;
    align-items:center;
    width:100%;
    left:0;
    top:0;
    background:#d7ebf5;
    z-index: 1;
}
.responseWrap{
    margin-top:5%;
}
.closeIcon{
    margin-right:10px;
    cursor: pointer;
}
.spanText{
    padding-left:5px;
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
.viewBtnContainer{
    display:flex;
    justify-content:flex-end;
    align-items:center;
    padding:15px;
}
.viewMoreBtn{
    margin:0;
    padding:0;
    cursor: pointer;
    color:rgb(255, 4, 4);
    margin-right:15px;
}
.viewMoreBtn:hover{
    text-decoration:none;
    color:#000;
}
.links{
    color:#fff;
}
.links:hover{
    color:#fff;
}
.image2{
    width:80px;
    height:80px;
}
.col-bg{
    background-color:#fff;
}
.col-wrap{
    display:flex;
    flex-direction:row;
    justify-content:space-between;
    align-items:center;
}
.image_wrap{
    display:flex;
    flex-direction:row;
    justify-content:space-around;
    align-items:center;
}
.detail-text{
    font-family:sans-serif;
    font-size:18px;
}
.remove-wrap{
    display:flex;
    flex-direction:row;
    justify-content:space-between;
    align-items:center;
    .removeBtn{
        color:red;
        cursor: pointer;
        outline:none;
        border:none;
        background-color:#fff;
    }
}
.total_wrap{
    display:flex;
    justify-content:flex-end;
}
    </style>
  
<script src="menueBar.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>