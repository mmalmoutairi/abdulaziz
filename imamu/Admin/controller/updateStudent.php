<?php

include '../../db/db.php';
session_start();
$errors = array();
$success = array();
$id = $_GET['id'];
$id = (int) $id;
if (isset($_POST['updateStudent']) && $id != 0) {
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $third_name = $_POST['third_name'];
    $last_name = $_POST['last_name'];
    $national_id = $_POST['national_id'];
    $student_id = $_POST['student_id'];
    $email = $_POST['email'];
    $status = $_POST['status'];
    $password = $_POST['password'];
    // validate email is exists
    if (!empty($email)) {
        $check = validateEmail($email);
        if ($check) {
            $errors[@count($errors)] = "Email is exists";
        }
    }

    // validate national id is exists
    if (!empty($national_id)) {
        $check = validateNationalId($national_id);
        if ($check) {
            $errors[@count($errors)] = "National ID is exists";
        }
    }

    // validate student is is exists
    if (!empty($student_id)) {
        $check = validateStudentId($student_id);
        if ($check) {
            $errors[@count($errors)] = "Student ID is exists";
        }
    }

    if (@count($errors) == 0) {
        $query = "update `user`  set ";
        $build = array();
        if (!empty($first_name)) {
            $build[@count($build)] = "`first_name` = '" . $first_name . "'";
        }
        if (!empty($middle_name)) {
            $build[@count($build)] = "`middle_name` = '" . $middle_name . "'";
        }
        if (!empty($third_name)) {
            $build[@count($build)] = "`third_name` = '" . $third_name . "'";
        }
        if (!empty($last_name)) {
            $build[@count($build)] = "`last_name` = '" . $last_name . "'";
        }
        if (!empty($national_id)) {
            $build[@count($build)] = "`national_id` = '" . $national_id . "'";
        }
        if (!empty($student_id)) {
            $build[@count($build)] = "`student_id` = '" . $student_id . "'";
        }
        if (!empty($email)) {
            $build[@count($build)] = "`email` = '" . $email . "'";
        }
        if (!empty($status)) {
            $build[@count($build)] = "`status` = '" . $status . "'";
        }
        if (!empty($password)) {
            $build[@count($build)] = "`password` = '" . @md5($password) . "'";
        }


        if (@count($build) > 0) {

            for($i = 0 ; $i < @count($build) ; $i++){
              $query = $query.$build[$i];
              if($i != @count($build)-1)
                $query = $query." , ";
            }
            $query = $query . " where `id` = " . $id;
            $result = @mysqli_query($connection, $query);
            if ($result) {
                $_SESSION["success"] = "updated successfuly";
                header("Location:../Student_management.php", false);
            } else {
                $errors[@count($errors)] = "Error in Update";
                $_SESSION["errors"] = $errors;
                header("Location:../Student_management.php", false);
            }
        } else {
            $errors[@count($errors)] = "Nothing update";
            $_SESSION["errors"] = $errors;
            header("Location:../Student_management.php", false);
        }
    } else {
        $errors[@count($errors)] = $errors;
        $_SESSION["errors"] = $errors;
        header("Location:../Student_management.php", false);
    }
} else {
    header("Location:../Student_management.php", false);
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
