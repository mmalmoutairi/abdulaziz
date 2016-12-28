<?php

include '../db/db.php';
$id = $_GET['id'];
$id = (int) $id;

if (isset($_POST['addGrade']) && $id != 0) {
  $grade      = $_POST['grade'];
  $request_id = $_POST['request_id'];

  for($i = 0 ;$i < @count($grade) ; $i++){
    $cours = array();
    $query = "select c.id , c.group , c.chose , rr.student_id from course c , request rr where c.id = (select s.course_id from section s where s.id = (select r.section_id from request r where r.id = ".$request_id[$i].")) AND rr.id = ".$request_id[$i]." limit 1";
    $result = @mysqli_query($connection, $query);
    $count = mysqli_num_rows($result);
    for($J = 0 ; $J < $count ; $J++){
      $cours[@count($cours)] = mysqli_fetch_object($result);
    }
    $query = "INSERT INTO `completed` (`id`, `student_id`, `course_id`, `groups`, `chose`, `grade`) VALUES (NULL, '".$cours[0]->student_id."', '".$cours[0]->id."', '".$cours[0]->group."', '".$cours[0]->chose."', '".$grade[$i]."')";
    $result = @mysqli_query($connection, $query);

  }
  $url = "Student.php?id=".$id;
  header("Location: $url" , false);
}else{
  header("Location: index.php" , false);

}



?>
