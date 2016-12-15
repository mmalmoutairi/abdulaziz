<?php

include '../../db/db.php';
session_start();
$errors = array();
$success = array();
$id = $_GET['id'];
$id = (int) $id;
if (isset($_POST['UpdateSection']) && $id != 0) {
    $section_number   = $_POST['section_number'];
    $room             = $_POST['room'];
    $course_id        = $_POST['course_id'];
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
        $query = "update `section` set ";
        $build =array();
        if (!empty($section_number)) {
            $build[@count($build)] = "`section_number` = '" . $section_number . "'";
        }
        if (!empty($room)) {
            $build[@count($build)] = "`room` = '" . $room . "'";
        }
        if (!empty($course_id)) {
            $build[@count($build)] = "`course_id` = '" . $course_id . "'";
        }
        if (!empty($start)) {
            $build[@count($build)] = "`start_time` = '" . $start . "'";
        }
        if (!empty($end)) {
            $build[@count($build)] = "`finish_time` = '" . $end . "'";
        }
        if (!empty($max)) {
            $build[@count($build)] = "`max_studemt` = '" . $max . "'";
        }

        if (@count($build) > 0) {
            for($i = 0 ; $i < @count($build) ; $i++){
              $query = $query.$build[$i];
              if($i != @count($build)-1)
                $query = $query." , ";
            }
            $query = $query . " , `sun` = $sun , `mon` = $mon , `tue` = $tue , `wed` = $wed , `thu` = $thu ";
            $query = $query ." where `id` = " . $id;
            $result = @mysqli_query($connection, $query);

            if ($result) {
                $_SESSION["success"] = "updated successfuly";
                header("Location:../section.php", false);
            } else {
                $errors[@count($errors)] = "Error in Update";
                $_SESSION["errors"] = $errors;
                header("Location:../section.php", false);
            }
        } else {
            $errors[@count($errors)] = "Nothing update";
            $_SESSION["errors"] = $errors;
            header("Location:../section.php", false);
        }
    } else {
        $errors[@count($errors)] = $errors;
        $_SESSION["errors"] = $errors;
        header("Location:../section.php", false);
    }
} else {
    header("Location:../section.php", false);
}

?>
