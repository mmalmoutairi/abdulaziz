<?php

include '../../db/db.php';
session_start();
$errors = array();
if (isset($_POST['AddSemester'])) {
    $name = $_POST['name'];
    $status = $_POST['status'];
    // validate code is exists

    $query = "INSERT INTO `semester` (`id`, `name`, `isActive`) VALUES (NULL, '$name', '$status');";
    $result = @mysqli_query($connection, $query);
    if ($result) {
        $_SESSION["success"] = "Add Semester successfuly";
        header("Location:../semester.php", false);
    } else {
        $errors[@count($errors)] = "Found error please contact support";
        $_SESSION["errors"] = $errors;
        header("Location:../add_semester.php", false);
    }
} else {
    header("Location:../add_semester.php", false);
}


?>
