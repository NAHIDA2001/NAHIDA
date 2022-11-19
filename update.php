<?php
session_start();
include '../database/env.php';

if(isset($_POST['submit'])){
    $error=[];
    $id=$_POST['id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    if(empty($name)){
        $msg="Enter Your Name";
        $error['name']=$msg;
    }elseif(strlen($name)>50){
        $msg="Enter Max Character!";
        $error['name']=$msg;
      }
    if(empty($email)){
        $msg="Enter Your email";
        $error['email']=$msg;
    }
    elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $msg="Enter Max valid Email!";
        $error['email']=$msg;
    }
    if(empty($password)){
        $msg="Enter Your password";
        $error['password']=$msg;
    }elseif(strlen($password)<8){
        $msg="Enter Max valid Password!";
        $error['password'] = $msg;
    } 
    if(count($error)==0){

       $query="UPDATE users SET name='$name',email='$email',password='$password' WHERE id=$id";
       $update=mysqli_query($connect,$query);
       $_SESSION['success']="Your Login Update Successfully";
       header('location:../database/alluser.php');

    }else{
        $_SESSION['errors']=$error;
        header("location:../database/edit.php?id=$id");
    }
}else{;
    echo "not Done";
}