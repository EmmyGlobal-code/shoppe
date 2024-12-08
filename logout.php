<?php
    ob_start();
    session_start();

    if(isset($_GET['logout'])){
        session_destroy();
        sleep(1);
        header("location:admin_login.php");
    }

?>