<?php
include '../../db/db.php';
session_start();
$errors = array();
if (isset($_POST['addStudent'])) {
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $third_name = $_POST['third_name'];
    $last_name = $_POST['last_name'];
    $national_id = $_POST['national_id'];
    $student_id = $_POST['student_id'];
    $email = $_POST['email'];
    $password = @md5($_POST['password']);
    // validate email is exists
    $check = validateEmail($email);
    if ($check) {
        $errors[@count($errors)] = "Email is exists";
    }

    // validate national id is exists
    $check = validateNationalId($national_id);
    if ($check) {
        $errors[@count($errors)] = "National ID is exists";
    }

    // validate student is is exists
    $check = validateStudentId($student_id);
    if ($check) {
        $errors[@count($errors)] = "Student ID is exists";
    }

    if (@count($errors) == 0) {
        $query = "INSERT INTO `user` (`id`, `first_name`, `middle_name`, `third_name`, `last_name`, `national_id`,
            `student_id`, `email`, `password`, `status`, `role_id`) VALUES (NULL, '$first_name', '$middle_name', '$third_name',
           '$last_name', '$national_id', '$student_id', '$email', '$password', '1', '2');";
        $result = @mysqli_query($connection, $query);
        if ($result) {
            $_SESSION["success"] = "Add student successfuly";
            header("Location:../Student_management.php", false);
        } else {
            $errors[@count($errors)] = "Found error please contact support";
            $_SESSION["errors"] = $errors;
            header("Location:../Add_student.php", false);
        }
    } else {
        $_SESSION["errors"] = $errors;
        header("Location:../Add_student.php", false);
    }
} else {
    header("Location:../Add_student.php", false);
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
