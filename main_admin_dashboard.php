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
<body class="body">
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="web-name-con">
                    <h3>WebShoppe</h3>
                </div>
            </div>
            <div class="col">
                <div class="search-wrap">
                    <div class="input-wrap">
                        <input type="search" class="src-input" placeholder="Search...">
                    </div>
                    <div class="profile-wrap">
                        <span><i class="bi bi-bell h4 icon"></i></span>
                        <span><i class="bi bi-chat h4 icon"></i></span>
                        <span><i class="bi bi-person-circle h1" style="color:#ddd;"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .body{
            background-color:#d7ebf5;
        }
        .web-name-con{
            padding:5px;
            width: 200px;
            height:100px;
            background-color:#fff;
            display:flex;
            justify-content:center;
            align-items:center;
            border-radius:5px;
        }
        .search-wrap{
            display:flex;
            flex-direction:row;
            flex-wrap:wrap;
            justify-content:space-between;
            align-items:center;
            background-color:#fff;
            padding:15px;
        }
        .input-wrap{
            padding:5px;
        }
        .src-input{
            padding:15px;
            width:350px;
            border-radius:8px;
            outline:none;
            border:none;
            background-color:#d7ebf5;
        }
        .profile-wrap{
            display:flex;
            flex-direction:row;
            justify-content:space-around;
            align-items:center;
            width:200px;
        }
        .icon{
            cursor:pointer;
            color:#d3d3d3;
        }
    </style>
</body>
</html>