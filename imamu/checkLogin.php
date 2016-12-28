<?php
session_start();
include 'db/db.php';
$errors = array();
$username = $_POST['username'];
$password = $_POST['password'];
$user = array();
if(!empty($username) AND !empty($password)){
    $password = @md5($password);
    $query = "select * from `user` where `national_id` = '$username' AND `password` = '$password'";
    $result = @mysqli_query($connection, $query);
    $count = mysqli_num_rows($result);
    if($count > 0){
      $user[@count($user)] = mysqli_fetch_object($result);
      $_SESSION['user'] = $user[0]->id;
      $_SESSION['role'] = $user[0]->role_id;
      if($user[0]->role_id == 1){
        header("Location: Admin/" , false);
      }else if($user[0]->role_id == 2){
        header("Location: Student/" , false);
      }else if($user[0]->role_id == 3){
        header("Location: DR/" , false);
      }else if($user[0]->role_id == 4){
        header("Location: Employee/" , false);
      }

    }else{
      $errors[@count($errors)] = "username or password incorrect";
      $_SESSION["errors"] = $errors;
      header("Location: login.php" , false);
    }
}else{
  header("Location: login.php" , false);
}

 ?>
