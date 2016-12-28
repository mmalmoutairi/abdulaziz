<?php
session_start();
include '../../db/db.php';
$id = $_GET['id'];
$id = (int) $id;
if (isset($_POST['addComment']) && $id != 0) {
    $comment = $_POST['comment'];

    if (@count($errors) == 0) {
        $query = "INSERT INTO `feedback` (`id`, `request_id`, `file`, `comment`, `sender`) VALUES (NULL, '$id', NULL, '$comment', '".$_SESSION['user']."');";
        $result = @mysqli_query($connection, $query);
        if ($result) {
            $query = "UPDATE `request` set `status` = 4 where `id` = ".$id;
            $result = @mysqli_query($connection, $query);
            header("Location:../ViewRequest.php?id=$id", false);
        } else {
            header("Location:../index.php", false);
        }
    } else {
        header("Location:../index.php", false);
    }
} else {
    header("Location:../index.php", false);
}

?>
