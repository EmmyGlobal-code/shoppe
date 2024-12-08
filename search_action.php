<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="icon" href="images/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- boostrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container mt-5">
    <form action="search_action.php" method="GET" class="form">
        <div class="form-wrap bg-light">
                <div class="search-input-wrap"><i class="bi bi-search h3" style="color:#7c7ef8;"></i>
                    <input type="search" class="srh-input" name="searchText" placeholder="Search here...." required>
                </div>
                <div><button name="srhBtn" class="srh-btn">Search</button></div>
            </div>
        </form>
            <?php
        require_once 'db_config.php';

        if(isset($_GET['srhBtn'])){
            $srhText = $_GET['searchText'];
            $sql=$con->query("SELECT*FROM shoptable WHERE names LIKE '%$srhText%'");
            if($sql->num_rows>0){
                while($i=$sql->fetch_assoc()){
                        echo ' 
                            <div class="srh-wrap">
                            <div class="srh-navbar bg-light">
                                <h3>Search Result</h3>
                                <i class="bi bi-x-square-fill h3 closeIcon" onclick="closeSearch()"></i>
                                </div><br>
                                <div class="mt-5">
                                 <a href="view_item.php?item_id='.$i['id'].'&btn=" class="srhItemWrap">
                                        <image src="uploads/'.$i['images'].'" class="image"/>
                                        <div class="priceContainer">
                                        <p class="itemsPrice">N'.$i['prices'].'</p>
                                        <p class="itemsName">'.$i['names'].'</p>
                                        </div>
                                        </a>
                            </div>
                            </div>';
                    
                }
            }else{
                echo '
                <div class="srh-wrap">
                            <div class="srh-navbar bg-light">
                                <h3>Search Result</h3>
                                <i class="bi bi-x-square-fill h3 closeIcon" onclick="closeSearch()"></i>
                                </div><br>
                <p class="srh-not-found"> Search not found</p>
                </div>';
            }
        }

        ?>
    </div>
    <style>
        .form-wrap{
            display:flex;
            flex-direction:row;
            justify-content:center;
            align-items:center;
            gap:0.5rem;
            position:absolute;
            top:0;
            left:0;
            padding:10px;
            width:100%;
        }
     .search-input-wrap{
            border:solid 1px #7c7ef8;
            border-radius:5px;
            padding-left:10px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            gap:0.5rem;
            background-color:#fff;
        }
        .srh-input{
            outline:none;
            width:350px;
            border:none;
            @media screen and (max-width:600px){
                width: 150px;
            }
        }
        .srh-btn{
            outline:none;
            border:none;
            padding:10px;
            border-radius:5px;
        }
    .srh-navbar{
        position:fixed;
        display:flex;
        width:100%;
        height:10%;
        top:0;
        left:0;
        justify-content:space-between;
        align-items:center;
        padding-right:20px;
        padding-left:20px;
        z-index: 1;
    }
    .image{
        width:150px;
        height: 150px;
        margin:10px;
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
        background:#fff;
        z-index: 1;
    }
    .closeIcon{
        margin-right:10px;
        color:#ee1e1e;
        cursor: pointer;
    }
    .srhItemWrap{
    color:#000;
    text-decoration: none;
    padding:2px;
    display:flex;
    align-items:center;
    border-bottom:solid 1px #ddd;
    }
    .srhItemWrap:hover{
        text-decoration:none;
        color:#000;
        background-color:rgba(225,225,225,0.3);
        box-shadow:0px 2px 3px 2px #ddd;
    }
    </style>

    <script>
        function closeSearch(){
            document.location='app.php';
        }
    </script>
</body>
</html>