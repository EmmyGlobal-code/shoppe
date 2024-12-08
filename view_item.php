<?php ob_start(); session_start(); ?>
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
<body class="bg-light">
    <div id="con"></div>
<?php
require_once 'db_config.php';
// get item id
     if (isset($_GET['btn'])) {
        $product_id = $_GET['item_id'];
        if (isset($_SESSION['customer_email'])) {
            $customer_email = $_SESSION['customer_email'];
            //view product
            $sql = $con->query("SELECT*FROM shoptable WHERE id='$product_id'");
        if ($sql->num_rows>0) {
            while ($i=$sql->fetch_assoc()) {
                // display items details and add cards option for payment for product
                echo '
                <div class="container-fluid">
                <p onclick="back()" class="back"><i class="bi bi-arrow-left-short h1"></i></p><br><br>
                <div class="container">
                <div class="row custom-row">
                    <div class="col custom_col1 p-3">
                        <div>
                            <image src="uploads/'.$i['images'].'" class="view_image"/>
                        </div>
                        <div>
                            <div>
                            <p class="details">'.$i['details'].'</p>
                            <p class="itemsPrice">N'.$i['prices'].'</p>
                            <p class="itemsName">'.$i['names'].'</p><br/>
                            </div>
                            <button class="addBtn btn btn-success btn-lg" onclick="AddToCard()" id="addBtn">Add to Card</button>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-4 custom_col2 p-3">
                    <h5>DELIVERY & RETURNS</h5><hr>
                    <p>WebShoppe offer fast and smart delivery for customer with less delivery fee</p><hr>
                    <div>
                    <b>Choose your location</b><br><br>
                    <label>State:</label>
                    <select onchange="setLGA()" id="select1" class="select">
                        <option Selected>Nasarawa</option>
                        <option>Plateau</option>
                        <option>Kaduna</option>
                        <option>Lagos</option>
                    </select><br>
                    <label>LGA:</label>
                    <select id="select2" class="select">
                        <option>Akwanga</option>
                        <option>Nassarawa Eggon</option>
                        <option>Caro</option>
                        <option>Keana</option>
                    </select>
                    </div>
                    <p class="mt-2">Product will be deliver withing 48 hours after shopping</p>
                    </div>

                    </div>

                    </div>
                    </div>';
            }
        }
                }else{
                    header("location:customer_login.php");
                }
        }
     ?>

<style>
.custom-row{

}
.custom_col1{
  display: flex;
  flex-direction: row;
  justify-content: space-around;
  flex-wrap:wrap;
  align-items: center;
  padding:15px;
  margin-right:8px;
  background-color:#fff;
}
.custom_col2{
    background-color:#fff;  
}
.details{
    padding:5px;
    width:300px;
}
.itemsName{
    text-align: center;
    margin:0;
    font-size:20px;
}
.itemsPrice{
    font-weight: bold;
    text-align: center;
    margin:0;
    font-size:25px;
}
.view_image{
  width: 300px;
  height: 300px;
}
.addBtn{
    padding:10px;
    width:100%;
    outline:none;
    border-radius:10px;
    border:none;
    transition:0.2s;
}
.addBtn:hover{
    box-shadow:0px 2px 5px 2px #d1d1d1;
}
.detailsCon{
    width: 400px;
    padding:5px;
    text-align:center;
}
.back{
    margin:0;
    cursor: pointer;
    position:fixed;
}
.customContainer{
    padding:0;
}
.select{
    width: 250px;
    padding:8px;
}
.display{
    width:100%;
    height:100%;
    left:0;
    top:0;
    position:absolute;
    background-color:#f1f1f1;
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
.input{
    outline:none;
    border-radius:8px;
}
.submitBtn{
    background-color:#c2e2f1;
}
.logo-wrap{
    display:flex;
    flex-direction:column;
    justify-content:space-between;
    align-items:center;
}
.success-wrap{
    position: fixed;
    width:100%;
    height:100%;
    top:0;
    left:0;
    padding:10px;
    display:flex;
    justify-content:center;
    align-items:center;
    background-color:rgba(150,150,150,0.5);
    z-index: 1;
    }
</style>

<script>
    function back(){
        window.history.back();
    }

    function setLGA(){
        var state = document.getElementById('select1').value;
        if(state=='Nasarawa'){
            document.getElementById('select2').innerHTML='<option>Akwanga</option><option>Nassarawa Eggon</option><option>Caro</option><option>Keana</option>';
        }else if(state == 'Plateau'){
            document.getElementById('select2').innerHTML='<option>Jos</option><option>Terminos</option><option>Shendam</option><option>Pam</option>';
        }else if(state == 'Kaduna'){
            document.getElementById('select2').innerHTML='<option>Sanga</option>';
        }else if(state == 'Lagos'){
            document.getElementById('select2').innerHTML='<option>Solaja</option>';
        }
       
    }

    function AddToCard(){
        document.getElementById('addBtn').innerHTML='Loading...';
        var state = document.getElementById('select1').value+' '+'State';
        var lga = document.getElementById('select2').value;
        var productId = '<?php echo $product_id?>';
        var customer_address = lga+','+state;
        var customerEmail = '<?php echo $customer_email ?>';
        var date = new Date().toDateString();
        var xml = new XMLHttpRequest();
            xml.open('GET','add_to_cards.php?customer_email='+customerEmail+'&address='+customer_address+'&product_id='+productId+'&date='+date+'&addBtn=',true);
        xml.onload = function(){
            if(xml.status == 200){
                document.getElementById('con').innerHTML='<div class="success-wrap">'+this.responseText+'</div>';
                document.getElementById('addBtn').innerHTML='Add to card';
            }
        }
        xml.send();
    }

    function closeSms(){
        document.getElementById('con').innerHTML='';
    }
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>