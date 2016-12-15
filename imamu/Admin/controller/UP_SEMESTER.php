<?php

include '../../db/db.php';
session_start();
$errors = array();
$success = array();
$id = $_GET['id'];
$id = (int) $id;
if (isset($_POST['UpdateSemester']) && $id != 0) {
    $name = $_POST['name'];
    $status = $_POST['status'];


    if (@count($errors) == 0) {
        $query = "update `semester` set ";
        $build = array();
        if (!empty($name)) {
            $build[@count($build)] = "`name` = '" . $name . "'";
        }
        if (!empty($status)) {
            $build[@count($build)] = "`isActive` = '" . $status . "'";
        }
        if (@count($build) > 0) {
            for($i = 0 ; $i < @count($build) ; $i++){
              $query = $query.$build[$i];
              if($i != @count($build)-1)
                $query = $query." , ";
            }
            $query = $query ." where `id` = " . $id;
            $result = @mysqli_query($connection, $query);

            if ($result) {
                $_SESSION["success"] = "updated successfuly";
                header("Location:../semester.php", false);
            } else {
                $errors[@count($errors)] = "Error in Update";
                $_SESSION["errors"] = $errors;
                header("Location:../semester.php", false);
            }
        } else {
            $errors[@count($errors)] = "Nothing update";
            $_SESSION["errors"] = $errors;
            header("Location:../semester.php", false);
        }
    } else {
        $errors[@count($errors)] = $errors;
        $_SESSION["errors"] = $errors;
        header("Location:../semester.php", false);
    }
} else {
    header("Location:../semester.php", false);
}


?>
