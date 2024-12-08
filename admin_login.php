<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="icon" href="images/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- boostrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <nav class="nav">
    </nav>
    <div class="customContainer">
        <form action="admin_login_action.php" method="POST" class="form">
                <div class="form-group">
                <label for="email">Login ID:</label>
                    <input type="email" placeholder="philip@gmail.com" class="form-control" name="adminemail" required />
                </div>
                <div class="form-group">
                <label for="password">Password:</label>
                    <input type="password" placeholder="******"  class="form-control"  name="password" required /><br>
                    <button class="loginBtn" name="loginBtn">Login</button>
                </div>
            </div>
        </form>
    </div>

    <style>
        .nav{
            width:100%;
            height:30%;
            position:fixed;
            background-color:#d7ebf5;
        }
        .logo{
            width: 100px;
            border-radius:50%;
        }
        .customContainer{
        width:100%;
        height:100%;
        top:0;
        left:0;
          position:absolute;
          display:flex;
          justify-content:center;
          align-items:center;
        }
        .form{
            width:250px;
        }
        .loginBtn{
            background:#d7ebf5;
            padding:5px;
            width:100px;
            outline:none;
            border:none;
            border-radius:5px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>