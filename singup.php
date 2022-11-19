<?php
session_start();
include '../database/env.php';
if(isset($_POST['submit'])){
    
$errors=[];
 $request=$_POST;
 $name=trim(htmlentities($request['name']));
 $email=trim(htmlentities($request['email']));
 $password=trim(htmlentities($request['password']));
 $entype= md5(($password));

  if(empty($name)){
    $msg="Enter Your Name!";
    $errors['name']=$msg;
  }elseif(strlen($name)>50){
    $msg="Enter Max Character!";
    $errors['name']=$msg;
  }
  if(empty($email)){
    $msg="Enter Your email!";
    $errors['email']=$msg;
  }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $msg="Enter Max valid Email!";
    $errors['email']=$msg;
}

  if(empty($password)){
    $msg="Enter Your password!";
    $errors['password']=$msg;
  }elseif(strlen($password)<8){
    $msg="Enter Max valid Password!";
    $errors['password'] = $msg;
} if(count($errors)>0){
    $_SESSION['errors']=$errors;
    $_SESSION['old_data']=$request;
    header("location:../database/index.php");
}else{
   $query="INSERT INTO users( name,email,password) VALUES ('$name','$email','$entype')";
   $store=mysqli_query($connect,$query);
}
if($store){
  $_SESSION['success']="your post adds successfuly";
  header("location:../database/index.php");
}else{
  echo "error";
}
}else{
    echo "click Submit button!";
}