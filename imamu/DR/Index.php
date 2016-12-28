<?php
include 'header.php';
include '../db/db.php';
$course = array();
$query = "select s.id , s.section_number , s.sun , s.mon , s.tue , s.wed , s.thu , c.name , c.hours from section s , request r , course c where s.dr_id = ".$_SESSION['user']." AND s.id = r.section_id AND r.status = 1 AND s.course_id = c.id AND r.semester_id = (select ss.id from semester ss ORDER by id desc limit 1)";
$result = @mysqli_query($connection, $query);
$count = mysqli_num_rows($result);
if ($count > 0) {
    for ($i = 0; $i < $count; $i++) {
        $course[@count($course)] = mysqli_fetch_object($result);
    }
}


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
                      <div class="page-content-inner">

                          <div class="row">
                            <?php
                              if(@count($course) > 0){
                                ?>
                                <div class="col-md-12">
                                    <!-- BEGIN SAMPLE TABLE PORTLET-->
                                    <div class="row widget-row">
                                      <?php
                                        foreach ($course as $key => $value) {
                                          ?>
                                          <div class="col-md-4">
                                              <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                                  <div class="widget-thumb-wrap">
                                                      <h4 class="widget-thumb-heading">
                                                        <a href="Student.php?id=<?php echo $value->id ?>">
                                                          <?php echo $value->name ?> : Section <?php echo $value->section_number ?>
                                                        </a>

                                                      </h4>
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
                                        <strong>Alert !</strong> You Dont have any courses in this semester
                                    </div>

                                </div>
                                <?php
                              }
                             ?>

                          </div>
                      </div>
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

<?php
  include 'footer.php';
?>
