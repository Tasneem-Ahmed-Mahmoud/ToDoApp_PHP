<?php
$conn= mysqli_connect("localhost","root","");
$sql="CREATE DATABASE IF NOT EXISTS `todoapp`";
mysqli_query($conn,$sql);
if(!$conn){
    echo "connection fiald" . mysqli_connect_error($conn);
}
mysqli_close($conn);
$conn=mysqli_connect("localhost","root","","todoapp");
if(!$conn){
    echo "connection fiald" . mysqli_connect_error($conn);
}

$sql="CREATE TABLE IF NOT EXISTS `tasks`(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(200) NOT NULL,
    `status` VARCHAR(200) DEFAULT 'active'
)";
mysqli_query($conn,$sql);
// mysqli_close($conn);