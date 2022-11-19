<?php
session_start();
include_once '../database/env.php';
$id=$_GET['id'];
$query= "DELETE FROM users WHERE id=$id";
$Delet=  mysqli_query($connect,$query);
if($Delet){
    $_SESSION['success']="Delet Successfully";
  header("location:../database/alluser.php");
}