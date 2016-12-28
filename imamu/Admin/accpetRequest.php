<?php

include '../db/db.php';
$id = $_GET['id'];
$id = (int) $id;

if($id != 0){
  $query = "UPDATE `request` set `status` = 1 where `id` = ".$id;
  $result = @mysqli_query($connection, $query);
  if($result){
    header("Location: Accept.php" , false);
  }else{
    header("Location: index.php" , false);
  }
}else{
    header("Location: index.php" , false);
}

?>
