<?php
include 'header.php';
include '../db/db.php';
$semester = array();
$query = "SELECT * FROM `semester` ORDER BY id DESC limit 1";
$result = @mysqli_query($connection, $query);
$count = mysqli_num_rows($result);
for ($i = 0; $i < $count; $i++) {
    $semester[@count($semester)] = mysqli_fetch_object($result);
}

$courses = array();
$query = "select r.* , s.section_number , s.room , s.start_time , s.finish_time , s.sun , s.mon , s.tue , s.wed , s.thu , c.name , c.hours from request r , section s , course c where r.student_id = " . $_SESSION['user'] . " and r.semester_id = " . $semester[0]->id . " AND r.status = 1 AND r.section_id = s.id AND c.id = s.course_id";
$result = @mysqli_query($connection, $query);
$count = mysqli_num_rows($result);
for ($i = 0; $i < $count; $i++) {
    $courses[@count($courses)] = mysqli_fetch_object($result);
}





$query = "select r.* , s.section_number , s.room , s.start_time , s.finish_time , s.sun , s.mon , s.tue , s.wed , s.thu , c.name , c.hours from request r , section s , course c where r.student_id = 2 and r.semester_id = 1 AND r.status = 1 AND r.section_id = s.id AND c.id = s.course_id"
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
                            <h1>DR

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
                    <!-- END PAGE HEAD-->
                    <!-- BEGIN PAGE CONTENT BODY -->
                    <div class="page-content">
                        <div class="container">

                            <!-- BEGIN PAGE BREADCRUMBS -->

                            <!-- END PAGE BREADCRUMBS -->
                            <!-- BEGIN PAGE CONTENT INNER -->
                            <div class="page-content-inner">

                                <div class="row">
                                  <?php
                                    if(@count($courses) > 0){
                                      ?>
                                      <div class="col-md-12">
                                          <!-- BEGIN SAMPLE TABLE PORTLET-->
                                          <div class="row widget-row">
                                            <?php
                                              foreach ($courses as $key => $value) {
                                                ?>
                                                <div class="col-md-4">
                                                    <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                                        <div class="widget-thumb-wrap">
                                                            <h4 class="widget-thumb-heading"><?php echo $value->name ?> : Section <?php echo $value->section_number ?></h4>
                                                            <h4 class="widget-thumb-heading"><?php echo $value->hours ?> Hours</h4>
                                                            <h4 class="widget-thumb-heading">Study :
                                                              <br>
                                                              <?php
                                                              if($value->sun == 1)
                                                                echo "Sun<br>";
                                                              if($value->mon == 1)
                                                                echo "Mon<br>";
                                                              if($value->tue == 1)
                                                                echo "Tue<br>";
                                                              if($value->wed == 1)
                                                                echo "Wed<br>";
                                                              if($value->thu == 1)
                                                                echo "Thu<br>";

                                                              ?>

                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php
                                              }

                                             ?>
                                          </div>
                                      </div>
                                      <?php
                                    }else{
                                      ?>
                                      <div class="col-md-12">
                                          <div class="alert alert-danger">
                                              <strong>Alert !</strong> You Dont have any course accepted in this semester
                                          </div>

                                      </div>
                                      <?php
                                    }
                                   ?>

                                </div>

                            </div>
                            <!-- END PAGE CONTENT INNER -->
                        </div>
                    </div>
                    <!-- END PAGE CONTENT BODY -->
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END PAGE CONTENT BODY -->
                <!-- END CONTENT BODY -->
            </div>

        </div>
        <!-- END CONTAINER -->
    </div>
</div>
<?php include 'footer.php' ?>
