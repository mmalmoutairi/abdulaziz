<?php

include '../../db/db.php';
session_start();
$errors = array();
$success = array();
$id = $_GET['id'];
$id = (int) $id;
if (isset($_POST['UP_COURSE']) && $id != 0) {
    $name = $_POST['name'];
    $code = $_POST['code'];
    $hours = $_POST['hours'];
    // validate code is exists
    if (!empty($code)) {
        $check = validateCode($code);
        if ($check) {
            $errors[@count($errors)] = "Code is exists";
        }
    }


    if (@count($errors) == 0) {
        $query = "update `course` set ";
        $build =array();
        if (!empty($name)) {
            $build[@count($build)] = "`name` = '" . $name . "'";
        }
        if (!empty($code)) {
            $build[@count($build)] = "`code` = '" . $code . "'";
        }
        if (!empty($hours)) {
            $build[@count($build)] = "`hours` = '" . $hours . "'";
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
                header("Location:../Cours_Management.php", false);
            } else {
                $errors[@count($errors)] = "Error in Update";
                $_SESSION["errors"] = $errors;
                header("Location:../Cours_Management.php", false);
            }
        } else {
            $errors[@count($errors)] = "Nothing update";
            $_SESSION["errors"] = $errors;
            header("Location:../Cours_Management.php", false);
        }
    } else {
        $errors[@count($errors)] = $errors;
        $_SESSION["errors"] = $errors;
        header("Location:../Cours_Management.php", false);
    }
} else {
    header("Location:../Cours_Management.php", false);
}

function validateCode($code) {
    include '../../db/db.php';
    $query = "SELECT * FROM `course` WHERE `code` = '$code';";
    $result = @mysqli_query($connection, $query);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        return true;
    } else {
        return false;
    }
}

?>
