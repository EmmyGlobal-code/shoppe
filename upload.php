<?php 
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data upload</title>
    <?php require_once "upload.php"; 
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
    ?>
    <link rel="icon" href="images/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- boostrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">
    <div class="formWrap">
    <form action="upload_action.php" class="uploadForm" method="POST" enctype="multipart/form-data">
        <h2>Products Upload</h2><hr>
        <div class="container formContainer">
  <div class="row">
    <div class="col">
    <label for="name" class="labelText">Product Name:</label><br>
    <input type="text" name="name" required class="formInput"  placeholder="Name"/>
    </div>
    <div class="col">
    <label for="price" class="labelText">Product Price:</label><br>
    <input type="text" name="price" required class="formInput" placeholder="Price" />
    </div>
  </div><br>
  <div class="row customRow">
    <div class="col">
    <label for="color" class="labelText">Products Colour:</label><br>
    <input type="text" name="colour" required class="formInput" placeholder="Colour" />
    </div>
    <div class="col">
    <label for="type" class="labelText">Product Type:</label><br>
    <select name="type" id="type" class="formInput">
      <option>Phones</option>
      <option>Fashions</option>
      <option>Computing</option>
      <option>Electronics</option>
    </select>
    </div>
  </div><br>
  <div class="detailContainer">
    <label for="detail" class="labelText">Products Details:</label><br>
    <textarea name="detail" required class="textArea" placeholder="Type product details"></textarea>
  </div>
  </div><br>
  <div class="uploadInpContainer">
    <label for="files" class="fileLabel">
      <p style="margin:0" id="fileText">Select file:</p>
      <i class="bi bi-cloud-arrow-up-fill h1" style="color:#c2e2f1"></i>
    </label><br>
    <input type="file" name="fileToUpload" id="files" required hidden  accept="image/*" onchange="getFile()"/>
    <div id="displayFile"></div>
  </div><br>
  <div class="btnContainer">
  <button class="uploadBtn" name="uploadBtn">Upload</button>
  </div>
</form>
</div>

<style>
.uploadForm{
  background-color: #fff;
  padding: 10px;
  margin-top:10px;
  margin-bottom: 10px;
  border-radius: 10px;
  box-shadow: 0px 3px 5px 3px #3b3a3a;
}
.formContainer{
  display: flex;
  flex-direction: column;
  flex-wrap: wrap;
}
.formInput{
  border-radius: 10px;
  padding:10px;
  outline: none;
  border-width: 2px;
}
.textArea{
  width:400px;
  padding:5px;
  border-radius:10px;
  border-color:#000;
  height:80px;
  border-width:2px;
}
.uploadInpContainer{
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
  align-items: center;
}
.fileLabel{
  border-color:#86b9d3;
  border-style: dotted;
  border-width: 3px;
  padding:15px;
  width: 400px;
  height: 100px;
  border-radius: 10px;
  cursor: pointer;
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  align-items: center;
}
.labelText{
  font-weight: bold;
}
.formWrap{
  display: flex;
  justify-content: center;
  align-items: center;
}
.uploadBtn{
  width: 100%;
  background-color: #86b9d3;
  outline: none;
  border:none;
  padding:10px;
  border-radius: 5px;
}
.uploadFileName{
  font-size: 15px;
  font-weight: bold;
}
</style>
<script>
  function getFile(){
    document.getElementById('displayFile').innerHTML='<p class="uploadFileName">'+document.getElementById('files').value+'</p>';
    document.getElementById('fileText').innerHTML='Selected <i class="bi bi-check-circle-fill" style="color:#86b9d3;"></i>';
}
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>