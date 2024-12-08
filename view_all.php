<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebShoppe</title>
    <link rel="icon" href="images/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- boostrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container-fluid">
    <p onclick="back()" class="back"><i class="bi bi-arrow-left-short h1"></i></p>
    <?php
     if(isset($_GET['btn'])){
        $type = $_GET['types'];
        echo '<h3 class="headText">'.$type.'</h3>';
     }
    ?>
    <center>
        <div class="display">
        <?php
        require_once 'db_config.php';
            if(isset($_GET['btn'])){
                $type = $_GET['types'];
                $sql = $con->query("SELECT*FROM shoptable WHERE types='$type' ORDER BY id DESC");
                if ($sql->num_rows>0) {
                    while ($i=$sql->fetch_assoc()) {
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
                    echo '<p class="notFondText">'.$type.' is Loading...</p>';
                }
            } 
        ?>
        </div>
        </center>
    </div>
<style>
 .display{
    display: flex;
    flex-direction: row;
    flex-wrap:wrap;
    width:100%;
    height:90%;
    position: absolute;
    left:0;
    gap:0.5rem;
    justify-content: space-between;
    overflow: auto;
    padding:10px;
}
.image{
    width:150px;
    height:150px;
}
.itemWrap{
    color:#000;
    width: 190px;
    height:230px;
    text-decoration: none;
    box-shadow:0px 2px 3px 2px #ddd;
    padding:2px;
    display:flex;
    flex-direction:column;
    justify-content:space-around;
    align-items:center;
    border-radius:5px;
    transition:0.1s;
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
.back{
    margin:0;
    cursor: pointer;
}
.headText{
    margin-top:18px;
    font-weight:bold;
}
.notFondText{
    padding-left:80px;
}
</style>

<script>
    function back(){
        window.history.back();
    }
</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>