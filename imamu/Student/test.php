<?php
session_start();
include '../db/db.php';

if(!empty($_POST)){
  $query = "select id from semester ORDER by id DESC limit 1" ;
  $result = @mysqli_query($connection, $query);
  $semester  = mysqli_fetch_object($result);

  foreach (array_keys($_POST) as $field)
  {
      $query = "INSERT INTO `request` (`id`, `student_id`, `semester_id`, `section_id`, `status`) VALUES (NULL, '".$_SESSION['user']."', '".$semester->id."', '".$_POST[$field]."', '3')" ;
      $result = @mysqli_query($connection, $query);
  }
  header("Location: index.php" , false);
}else{

}


 ?>
