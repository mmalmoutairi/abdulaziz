<?php

include '../../db/db.php';
include '../../lib/reader.php';



session_start();
$MultiErrors = array();
if (isset($_POST['addExcel'])) {
  $uploaddir = "../../file/";
  $uploadfile = $uploaddir.$_FILES['userfile']['name'];
  $type = pathinfo($uploadfile, PATHINFO_EXTENSION);
  if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile) && $type == 'xls') {
    $excel = new Spreadsheet_Excel_Reader();
    $excel->read($uploadfile);
    $x=2;
    while($x<=$excel->sheets[0]['numRows']) {
      $y=1;
      $data = array();
      while($y<=$excel->sheets[0]['numCols']) {
        $cell = isset($excel->sheets[0]['cells'][$x][$y]) ? $excel->sheets[0]['cells'][$x][$y] : '';
        $data[@count($data)] = $cell;
        $y++;
      }
      $errors = array();

      $check = validateEmail($data[6]);
      if ($check) {
          $errors[@count($errors)] = "Email is exists ".$data[6];
      }

      // validate national id is exists
      $check = validateNationalId($data[4]);
      if ($check) {
          $errors[@count($errors)] = "National ID is exists ".$data[4];
      }

      // validate student is is exists
      $check = validateStudentId($data[5]);
      if ($check) {
          $errors[@count($errors)] = "Student ID is exists ".$data[5];
      }

      if (@count($errors) == 0) {
         $password = @md5($data[6]);
          $query = "INSERT INTO `user` (`id`, `first_name`, `middle_name`, `third_name`, `last_name`, `national_id`,
              `student_id`, `email`, `password`, `status`, `role_id`) VALUES (NULL, '$data[0]', '$data[1]', '$data[2]',
             '$data[3]', '$data[4]', '$data[5]', '$data[6]', '$password', '1', '2');";
          $result = @mysqli_query($connection, $query);
      } else {
          $MultiErrors = array_merge($MultiErrors, $errors);
          $_SESSION["errors"] = $MultiErrors;
      }
      $x++;
    }

    header("Location:../Student_management.php", false);
  } else {
    header("Location:../index.php", false);
  }
} else {
    header("Location:../index.php", false);
}

function validateEmail($email) {
    include '../../db/db.php';
    $query = "SELECT * FROM `user` WHERE `email` = '$email';";
    $result = @mysqli_query($connection, $query);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        return true;
    } else {
        return false;
    }
}

function validateNationalId($national_id) {
    include '../../db/db.php';
    $query = "SELECT * FROM `user` WHERE `national_id` = '$national_id';";
    $result = @mysqli_query($connection, $query);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        return true;
    } else {
        return false;
    }
}

function validateStudentId($student_id) {
    include '../../db/db.php';
    $query = "SELECT * FROM `user` WHERE `student_id` = '$student_id';";
    $result = @mysqli_query($connection, $query);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        return true;
    } else {
        return false;
    }
}

?>
