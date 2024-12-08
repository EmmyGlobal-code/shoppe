<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="icon" href="images/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- boostrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container">
            <h3>Products Update</h3><hr><br>
        <?php
        if(isset($_GET['click'])){
            $id = $_GET['item_id'];
        }
            require_once 'db_config.php';
            $sql = $con->query("SELECT*FROM shoptable WHERE id='$id'");
            if ($sql->num_rows>0) {
                while($i=$sql->fetch_assoc()){
                    echo '<form action="edit_action.php" enctype="multipart/form-data" method="POST">
                            <input type="hidden" value="'.$i['id'].'" name="item_id"/>
                            <div class="row">
                            <div class="col">
                            <label>Name:</label><br>
                            <input type="text" name="name" value="'.$i['names'].'"/>
                            </div>
                              <div class="col mt-3">
                              <label>Change Image:</label><br>
                            <input type="file" name="uploadImg"/>
                            </div>
                            </div>

                            <br>

                             <div class="row">
                            <div class="col">
                            <label>Price:</label><br>
                            <input type="text" name="price" value="'.$i['prices'].'"/>
                            </div>
                              <div class="col mt-3">
                              <label>Colour:</label><br>
                            <input type="text" name="colour" value="'.$i['colours'].'"/>
                            </div>
                            </div>
                            
                            <br>

                             <div class="row">
                            <div class="col">
                            <label>Type:</label><br>
                            <select name="type">
                                    <option Selected >'.$i['types'].'</option>
                                    <option>Phones</option>
                                    <option>Fashions</option>
                                    <option>Computing</option>
                                    <option>Electronics</option>
                            </select>
                            </div>
                              <div class="col mt-3">
                              <label>Details:</label><br>
                            <textarea type="text" name="detail" class="textArea">'.$i['details'].'</textarea>
                            </div>
                            </div><br>
                            <div>
                            <button class="btn btn-dark btn-lg" name="editBtn">Save</button>
                            </div>
                        </form>';
                }
            }
        ?>
    </div>

    <style>
        .textArea{
            width: 300px;
            height:150px;
        }
    </style>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>