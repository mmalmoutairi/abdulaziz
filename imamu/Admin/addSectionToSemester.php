<?php
include '../db/db.php';
$array = array();
$id = $_GET['semester'];
$id = (int) $id;
if ($id != 0) {
    $query = "select * from `semester` where `id` = " . $id;
    $result = @mysqli_query($connection, $query);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        for ($i = 0; $i < $count; $i++) {
            $array[@count($array)] = mysqli_fetch_object($result);
        }
        $sections = $_POST['section'];
        if(!empty($sections)){
            foreach ($sections as $key => $value) {
              $query = "INSERT INTO `SectionSemester` (`id`, `semester_id`, `section_id`) VALUES (NULL, '$id', '$value');";
              $result = @mysqli_query($connection, $query);
            }
            ?>
            <script>
                window.location = "Semestr_cours.php";
            </script>
            <?php
        }else{
          ?>
          <script>
              window.location = "Semestr_cours.php";
          </script>
          <?php
        }
    } else {
        ?>
        <script>
            window.location = "Semestr_cours.php";
        </script>
        <?php
    }
} else {
    ?>
    <script>
        window.location = "Semestr_cours.php";
    </script>
    <?php
}
?>
