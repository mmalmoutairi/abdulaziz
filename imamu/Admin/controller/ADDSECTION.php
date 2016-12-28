<?php
include '../../db/db.php';
session_start();
$errors = array();
$success = array();
if (isset($_POST['AddSection'])) {
    $section_number   = $_POST['section_number'];
    $room             = $_POST['room'];
    $course_id        = $_POST['course_id'];
    $dr_id            = $_POST['dr_id'];
    $start            = $_POST['start'];
    $max              = $_POST['max'];
    $end              = $_POST['end'];
    $day              = $_POST['day'];
    $sun              = 2 ;
    $mon              = 2 ;
    $tue              = 2 ;
    $wed              = 2 ;
    $thu              = 2 ;

    if(@count($day) > 0){
      foreach ($day as $key => $value) {
        if($value == "sun")
          $sun = 1;
        if($value == "mon")
          $mon = 1;
        if($value == "tue")
          $tue = 1;
        if($value == "wed")
          $wed = 1;
        if($value == "thu")
          $thu = 1;
      }
    }
    else{
      $errors[@count($errors)] = "Please Choose at least one day";
    }


    if (@count($errors) == 0) {
      $query = "INSERT INTO `section` (`id`, `dr_id`, `section_number`, `room`,  `course_id`, `start_time`, `finish_time`, `max_studemt`, `sun`, `mon`, `tue`, `wed`, `thu`) VALUES (NULL, '$dr_id', '$section_number', '$room', '$course_id',  '$start', '$end', '$max', '$sun', '$mon', '$tue', '$wed', '$thu')";
      $result = @mysqli_query($connection, $query);
      if ($result) {
          $_SESSION["success"] = "Add Section successfuly";
          header("Location:../section.php", false);
      } else {
          $errors[@count($errors)] = "Found error please contact support";
          $_SESSION["errors"] = $errors;
          header("Location:../Add_section.php", false);
      }
    } else {
        $errors[@count($errors)] = $errors;
        $_SESSION["errors"] = $errors;
        header("Location:../section.php", false);
    }
} else {
    header("Location:../section.php.php", false);
}


?>
