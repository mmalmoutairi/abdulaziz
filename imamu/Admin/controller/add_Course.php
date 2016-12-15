<?php

include '../../db/db.php';
session_start();
$errors = array();
if (isset($_POST['addCourse'])) {
    $name = $_POST['name'];
    $code = $_POST['code'];
    $hours = $_POST['hours'];
    // validate code is exists
    $check = validateCode($code);
    if ($check) {
        $errors[@count($errors)] = "Code is exists";
    }

    if (@count($errors) == 0) {
        $query = "INSERT INTO `course` (`id`, `name`, `code`, `hours`) VALUES (NULL, '$name', '$code', '$hours');";
        $result = @mysqli_query($connection, $query);
        if ($result) {
            $_SESSION["success"] = "Add Course successfuly";
            header("Location:../Cours_Management.php", false);
        } else {
            $errors[@count($errors)] = "Found error please contact support";
            $_SESSION["errors"] = $errors;
            header("Location:../Add_cours.php", false);
        }
    } else {
        $_SESSION["errors"] = $errors;
        header("Location:../Add_cours.php", false);
    }
} else {
    header("Location:../Add_cours.php", false);
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
