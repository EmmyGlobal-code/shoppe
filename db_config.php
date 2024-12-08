<?php
$con = new Mysqli("localhost","root","");
$db = $con->query("CREATE DATABASE shopDatabase");
$con->select_db("shopDatabase");
$tb = $con->query("CREATE TABLE shopTable(
id int(50) AUTO_INCREMENT PRIMARY KEY NOT NULL,
names VARCHAR(100) NOT NULL,
images VARCHAR(70) NOT NULL,
prices VARCHAR(80) NOT NULL,
colours VARCHAR(90) NOT NULL,
types VARCHAR(120) NOT NULL,
details VARCHAR(150) NOT NULL
 )");

 // CREATE CUSTOMER TABLE
$customer = $con->query("CREATE TABLE customers(
customer_id int(100) AUTO_INCREMENT PRIMARY KEY NOT NULL,
customer_email VARCHAR(60) NOT NULL
)");

//CRATE CARDS TABLE
 $card = $con->query("CREATE TABLE cards(
 product_id VARCHAR(20) NOT NULL,
 product_name VARCHAR(30) NOT NULL,
 product_image VARCHAR(50) NOT NULL,
 product_detail VARCHAR(40) NOT NULL,
 product_price VARCHAR(70) NOT NULL,
 customer_email VARCHAR(50) NOT NULL,
 customer_address VARCHAR(40) NOT NULL,
 dates VARCHAR(80) NOT NULL
    )");

 $admin_tb = $con->query("CREATE TABLE admin_login(
                    adminemail VARCHAR(50) NOT NULL,
                    passwords VARCHAR(70) NOT NULL)");


?>