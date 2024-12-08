<?php
ob_start();
session_start();
$login = false;
if(isset($_POST['loginBtn'])){
    if(!empty($_POST['adminemail']) && !empty($_POST['password'])){
        $email = $_POST['adminemail'];
        $password = $_POST['password'];
        require_once 'db_config.php';
        $sql = $con->query("SELECT*FROM admin_login WHERE adminemail='$email' AND passwords='$password' ");

        if($sql->num_rows>0){
            $login=true;
            while($i=$sql->fetch_assoc()){
                $_SESSION['adminemail'] = $i['adminemail'];
                $_SESSION['passowrd'] = $i['passwords'];
            }
        }
        if($login == true){
            sleep(1);
            header("location:admin_dashboard.php");
        }else{
            echo 'invalid login details';
        }
    }
}

?>