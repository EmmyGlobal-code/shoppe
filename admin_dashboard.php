<?php
    ob_start();
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="icon" href="images/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- boostrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <nav class="nav">
        <div class="container navContainer">
            <div class="row">
                <div class="col"><a href="upload.php">Upload</a></div>
                <div class="col"><a href="logout.php?logout">Logout</a></div>
            </div>
        </div>
    </nav><br><br>
    <div class="container mt-5">
        <div class="display">
    <?php
    $email = $_SESSION['adminemail'];
    $password = $_SESSION['passowrd'];
    require_once 'db_config.php';
        #checking login if it's valiad
            if( $_SERVER["REQUEST_METHOD"] == 'GET'){
                $sql = $con->query("SELECT*FROM admin_login WHERE adminemail='$email' AND passwords='$password'");
                if($sql->num_rows>0){
                    while($i=$sql->fetch_assoc()){
                        $email = $i['adminemail'];
                        $password = $i['passwords'];
                    }
                }else{
                    header("location:admin_login.php");
                }
            }

    $sql = $con->query("SELECT*FROM shoptable ORDER BY id DESC");
            if($sql->num_rows>0){
                while ($i = $sql->fetch_assoc()) {
                    echo '
                        <a href="edit.php?item_id='.$i['id'].'&click=" class="itemWrap" title="Edit">
                            <image src="uploads/'.$i['images'].'" class="image"/>
                            <div class="priceContainer">
                            <p class="itemsPrice">N'.$i['prices'].'</p>
                            <p class="itemsName">'.$i['names'].'</p>
                            </div>
                          </a>';
                }
            }else{
                echo '<p class="notFondText">'.$i['types'].' Loading...</p>';
            }

    ?>
    </div>
  </div>
<style>
    .nav{
        background:#d7ebf5;
        width: 100%;
        height:8%;
        left:0;
        top:0;
        position:fixed;
    }
    .navContainer{
        display:flex;
        justify-content:space-between;
        align-items:center;
    }
    .itemWrap{
    color:#000;
    width: 200px;
    height:230px;
    text-decoration: none;
    padding:2px;
    margin:5px;
    text-align:center;
    }
    .itemWrap:hover{
        text-decoration:none;
        color:#000;
        box-shadow:0px 2px 3px 2px #ddd;
    }
    .display{
        display:flex;
        flex-direction:row;
        flex-wrap:wrap;
        justify-content:space-around;
        align-items:center;
    }
    .image{
        width:150px;
        height:150px;
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

</style>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>