<?php
include 'header.php';


include '../db/db.php';
$query = "SELECT * FROM `semester` WHERE isActive = 1 ORDER BY id DESC limit 1";
$result = @mysqli_query($connection, $query);
$count = mysqli_num_rows($result);
$regestration = false;
$courses = array();
$allCourse = array();
$sumCourse = array();
$section = array();
$semester = array();
$error = false;
for($i = 0 ; $i < $count ; $i++){
  $semester[@count($semester)] = mysqli_fetch_object($result);
}

if ($count > 0) {
  $regestration = true;
  $query = "SELECT r.id FROM request r WHERE r.student_id = ".$_SESSION['user']." AND r.semester_id =".$semester[0]->id;
  $result = @mysqli_query($connection, $query);
  $count = mysqli_num_rows($result);
  if($count == 0 ){
    $regestration = true;
    $query = "select c.* from course c where c.id NOT in (select co.course_id from completed co where co.student_id = ".$_SESSION['user']." ) AND c.chose NOT IN (select co.chose from completed co where co.chose in (select d.chose from course d where d.chose != 0 ))";
    $result = @mysqli_query($connection, $query);
    $count = mysqli_num_rows($result);
    if($count > 0){
      for($i = 0 ; $i < $count ; $i++){
        $allCourse[@count($allCourse)] = mysqli_fetch_object($result);
      }


      foreach ($allCourse as $key => $value) {
        $sumCourse = array();
        if($value->chose == 0){
          $query = "SELECT * FROM prerequisite p WHERE p.course_id = ".$value->id ;
          $result = @mysqli_query($connection, $query);
          $count1 = mysqli_num_rows($result);
          if($count1 == 0){
            $courses[@count($courses)] = $value;
          }else{
            $query = "select * from completed where course_id = ".$value->id;
            $result = @mysqli_query($connection, $query);
            $count2 = mysqli_num_rows($result);
            if($count2 > 0){
              $courses[@count($courses)] = $value;
            }
          }
        }else{
          $query = "SELECT * FROM prerequisite p WHERE p.course_id = ".$value->id ;
          $result = @mysqli_query($connection, $query);
          $count1 = mysqli_num_rows($result);
          if($count1 == 0){
            $courses[@count($courses)] = $value;
          }else{
            $arrayC = array();
            for($i = 0 ; $i < $count1 ; $i++){
              $arrayC[@count($arrayC)] = mysqli_fetch_object($result);
            }
            foreach ($arrayC as $key => $data) {
              $query = "select * from course c where c.group = ".$data->groups ;
              $result = @mysqli_query($connection, $query);
              $courseCount = mysqli_num_rows($result);
              $query = "select * from completed c where c.groups = ".$data->groups." AND student_id = 1";
              $result = @mysqli_query($connection, $query);
              $courseGroup = mysqli_num_rows($result);
              if($courseCount == $courseGroup){
                $courses[@count($courses)] = $value;
              }
            }

          }
        }
      }
    }else{
      $error = "There are no courses avilable for registration";
    }
  }else{
    $error = "You Already Submit Request";
  }
}else{
  $error = "There are no semester is open for registration";
}
//
?>
                <div class="page-wrapper-row full-height">
                    <div class="page-wrapper-middle">
                        <!-- BEGIN CONTAINER -->
                        <div class="page-container">
                            <!-- BEGIN CONTENT -->
                            <div class="page-content-wrapper">
                                <!-- BEGIN CONTENT BODY -->
                                <!-- BEGIN PAGE HEAD-->
                                <div class="page-head">
                                    <div class="container">
                                        <!-- BEGIN PAGE TITLE -->
                                        <div class="page-title">
                                            <h1>New Request

                                            </h1>
                                        </div>
                                        <!-- END PAGE TITLE -->
                                        <!-- BEGIN PAGE TOOLBAR -->

                                        <!-- END PAGE TOOLBAR -->
                                    </div>
                                </div>
                                <!-- END PAGE HEAD-->
                                <!-- BEGIN PAGE CONTENT BODY -->
                         <div class="page-container">

                            <!-- BEGIN CONTENT -->

                                <!-- BEGIN CONTENT BODY -->
                                <!-- BEGIN PAGE HEAD-->
                                <div class="page-head">
                                    <div class="container">
                                        <!-- BEGIN PAGE TITLE -->

                                        <!-- END PAGE TITLE -->
                                        <!-- BEGIN PAGE TOOLBAR -->

                                        <!-- END PAGE TOOLBAR -->
                                    </div>
                                </div>
                <div class="page-content">
                    <div class="container">
                        <div class="page-content-inner">
                          <div class="row">
                              <div class="col-md-12">
                                  <div class="row">
                                      <div class="col-md-12">
                                          <div class="portlet light ">
                                              <div class="portlet-title tabbable-line">
                                                  <div class="caption">
                                                      <i class="icon-globe font-green"></i>
                                                      <span class="caption-subject font-green bold uppercase">New Request</span>
                                                  </div>
                                              </div>
                                              <?php
                                                if($error == false){
                                                  ?>
                                                  <div class="portlet-body form">
                                                      <div class="tab-content">
                                                          <div class="tab-pane active" id="portlet_tab_1_1">
                                                              <div class="skin skin-minimal">
                                                                  <form role="form" method="post" action="test.php">
                                                                      <div class="form-body">
                                                                         <?php
                                                                             foreach ($courses as $key => $value) {
                                                                               if($value->group == 1){
                                                                                 $query = "select * from section where course_id = ".$value->id;
                                                                                 $result = @mysqli_query($connection, $query);
                                                                                 $count = mysqli_num_rows($result);
                                                                                 $array= array();
                                                                                 for($i = 0 ; $i < $count ; $i++){
                                                                                   $array[@count($array)] = mysqli_fetch_object($result);
                                                                                 }
                                                                                 ?>
                                                                                 <div class="form-group">
                                                                                     <label><?php echo $value->name; ?></label>
                                                                                     <div class="input-group">
                                                                                         <div class="icheck-list">
                                                                                           <?php
                                                                                           foreach ($array as $key => $data) {
                                                                                             ?>
                                                                                             <label>
                                                                                                 <input type="radio" value="<?php echo $data->id ?>" name="<?php echo "Course".$value->id; ?>" class="icheck"> <?php echo "Section : ".$data->section_number; ?></label>
                                                                                             <?php
                                                                                           }
                                                                                            ?>
                                                                                         </div>
                                                                                     </div>
                                                                                 </div>
                                                                                 <?php
                                                                               }
                                                                             }



                                                                             $checkgroup1 = false;
                                                                             $query = "select s.id , s.section_number , c.name from section s , course c where course_id in (";
                                                                             foreach ($courses as $key => $c) {
                                                                               if($c->chose == 1){
                                                                                 $checkgroup1 = true;
                                                                                 $query = $query.$c->id.",";
                                                                               }
                                                                             }
                                                                             if($checkgroup1){
                                                                               $query = substr_replace($query, " ) AND s.course_id = c.id" , -1);
                                                                               $result = @mysqli_query($connection, $query);
                                                                               $count = mysqli_num_rows($result);
                                                                               $array= array();
                                                                               for($i = 0 ; $i < $count ; $i++){
                                                                                 $array[@count($array)] = mysqli_fetch_object($result);
                                                                               }
                                                                               ?>
                                                                               <div class="form-group">
                                                                                   <label>Choses  1</label>
                                                                                   <div class="input-group">
                                                                                       <div class="icheck-list">
                                                                                         <?php
                                                                                         foreach ($array as $key => $g) {
                                                                                           ?>
                                                                                           <label>
                                                                                               <input type="radio" value="<?php echo $g->id ?>" name="choses1" class="icheck"> <?php echo "Course : ".$g->name." , Section : ".$g->section_number; ?></label>
                                                                                           <?php
                                                                                         }
                                                                                          ?>
                                                                                       </div>
                                                                                   </div>
                                                                               </div>
                                                                               <?php
                                                                             }

                                                                             $checkgroup2 = false;
                                                                             $query = "select s.id , s.section_number , c.name from section s , course c where course_id in (";
                                                                             foreach ($courses as $key => $c) {
                                                                               if($c->chose == 2){
                                                                                 $checkgroup2 = true;
                                                                                 $query = $query.$c->id.",";
                                                                               }
                                                                             }
                                                                             if($checkgroup2){
                                                                               $query = substr_replace($query, " ) AND s.course_id = c.id" , -1);
                                                                               $result = @mysqli_query($connection, $query);
                                                                               $count = mysqli_num_rows($result);
                                                                               $array= array();
                                                                               for($i = 0 ; $i < $count ; $i++){
                                                                                 $array[@count($array)] = mysqli_fetch_object($result);
                                                                               }
                                                                               ?>
                                                                               <div class="form-group">
                                                                                   <label>Choses 2</label>
                                                                                   <div class="input-group">
                                                                                       <div class="icheck-list">
                                                                                         <?php
                                                                                         foreach ($array as $key => $g) {
                                                                                           ?>
                                                                                           <label>
                                                                                               <input type="radio" value="<?php echo $g->id ?>" name="choses2" class="icheck"> <?php echo "Course : ".$g->name." , Section : ".$g->section_number; ?></label>
                                                                                           <?php
                                                                                         }
                                                                                          ?>
                                                                                       </div>
                                                                                   </div>
                                                                               </div>
                                                                               <?php
                                                                             }

                                                                             $checkgroup3 = false;
                                                                             $query = "select s.id , s.section_number , c.name from section s , course c where course_id in (";
                                                                             foreach ($courses as $key => $c) {
                                                                               if($c->chose == 3){
                                                                                 $checkgroup3 = true;
                                                                                 $query = $query.$c->id.",";
                                                                               }
                                                                             }
                                                                             if($checkgroup3){
                                                                               $query = substr_replace($query, " ) AND s.course_id = c.id" , -1);
                                                                               $result = @mysqli_query($connection, $query);
                                                                               $count = mysqli_num_rows($result);
                                                                               $array= array();
                                                                               for($i = 0 ; $i < $count ; $i++){
                                                                                 $array[@count($array)] = mysqli_fetch_object($result);
                                                                               }
                                                                               ?>
                                                                               <div class="form-group">
                                                                                   <label>Group 3</label>
                                                                                   <div class="input-group">
                                                                                       <div class="icheck-list">
                                                                                         <?php
                                                                                         foreach ($array as $key => $g) {
                                                                                           ?>
                                                                                           <label>
                                                                                               <input type="radio" value="<?php echo $g->id ?>" name="chose3" class="icheck"> <?php echo "Course : ".$g->name." , Section : ".$g->section_number; ?></label>
                                                                                           <?php
                                                                                         }
                                                                                          ?>
                                                                                       </div>
                                                                                   </div>
                                                                               </div>
                                                                               <?php
                                                                             }


                                                                             $query = "select s.id , s.section_number , c.name from section s , course c where course_id in (";
                                                                             $checkgroup4 = false;
                                                                             foreach ($courses as $key => $c) {
                                                                               if($c->chose == 4){
                                                                                 $checkgroup4 = true;
                                                                                 $query = $query.$c->id.",";
                                                                               }
                                                                             }
                                                                             if($checkgroup4){
                                                                               $query = substr_replace($query, " ) AND s.course_id = c.id" , -1);
                                                                               $result = @mysqli_query($connection, $query);
                                                                               $count = mysqli_num_rows($result);
                                                                               $array= array();
                                                                               for($i = 0 ; $i < $count ; $i++){
                                                                                 $array[@count($array)] = mysqli_fetch_object($result);
                                                                               }
                                                                               ?>
                                                                               <div class="form-group">
                                                                                   <label>Group 4</label>
                                                                                   <div class="input-group">
                                                                                       <div class="icheck-list">
                                                                                         <?php
                                                                                         foreach ($array as $key => $g) {
                                                                                           ?>
                                                                                           <label>
                                                                                               <input type="radio" value="<?php echo $g->id ?>" name="chose4" class="icheck"> <?php echo "Course : ".$g->name." , Section : ".$g->section_number; ?></label>
                                                                                           <?php
                                                                                         }
                                                                                          ?>
                                                                                       </div>
                                                                                   </div>
                                                                               </div>
                                                                               <?php
                                                                             }

                                                                          ?>
                                                                      </div>
                                                                      <div class="form-actions">
                                                                          <button type="submit" class="btn green">Submit</button>
                                                                      </div>
                                                                  </form>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <?php
                                                }else{
                                                    ?>
                                                    <div class="alert alert-danger">
                                                        <strong>Alert !</strong> <?php echo $error; ?>
                                                    </div>
                                                    <?php
                                                }

                                              ?>
                                          </div>
                                      </div>

                                  </div>
                              </div>
                          </div>
                        </div>
                        <!-- END PAGE CONTENT INNER -->
                    </div>
                </div>
<?php include 'footer.php' ?>
