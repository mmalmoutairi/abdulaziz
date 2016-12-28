<?php
  include 'header.php';
  include '../db/db.php';
  $course = array();
  $id = $_GET['id'];
  $id = (int) $id;
  if($id != 0){
    $query = "SELECT r.id as r_id, u.id, u.first_name, u.student_id , u.middle_name, u.third_name, u.last_name FROM request r, USER u , section s WHERE r.section_id = ".$id." AND r.status = 1 AND r.student_id = u.id AND r.section_id = s.id AND s.dr_id = ".$_SESSION['user']." AND r.semester_id =( SELECT ss.id FROM semester ss ORDER BY ss.id DESC LIMIT 1 )";
    $result = @mysqli_query($connection, $query);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        for ($i = 0; $i < $count; $i++) {
            $course[@count($course)] = mysqli_fetch_object($result);
        }


    }
  }else{
    ?>
    <script>
        window.location = "index.php";
    </script>
    <?php
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
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>Admin Dashboard

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
                                <div class="col-md-12">
                                    <!-- BEGIN SAMPLE TABLE PORTLET-->

                                   <div class="col-md-12">
                                     <?php
                                     if(@count($course) > 0){
                                       ?>
                                        <form class="" action="addGrade.php?id=<?php echo $id ?>" method="post">
                                          <div class="portlet box green-dark">
                                              <div class="portlet-title">
                                                  <div class="caption">
                                                      <i class="fa fa-picture"></i>Student </div>
                                              </div>
                                              <div class="portlet-body">
                                                  <div class="table-scrollable">
                                                      <table class="table table-condensed table-hover">
                                                          <thead>
                                                              <tr>
                                                                  <th> # </th>
                                                                  <th>  Name </th>
                                                                  <th> University ID </th>
                                                                  <th> Grade  </th>

                                                              </tr>
                                                          </thead>
                                                          <tbody>
                                                            <?php
                                                            foreach ($course as $key => $value) {
                                                              $check = false;
                                                              $query = "select * from completed co where co.student_id = ".$value->id." AND co.course_id = (select c.id from course c where c.id = (select s.course_id from section s where  s.id = (select r.section_id from request r where r.id = ".$value->r_id."))) limit 1";
                                                              $result = @mysqli_query($connection, $query);
                                                              $count = mysqli_num_rows($result);
                                                              if($count > 0)
                                                                $check = true;

                                                              if(!$check){
                                                              ?>
                                                              <tr>
                                                                  <td> <?php echo $key+1; ?> </td>
                                                                  <td> <?php echo $value->first_name . " " . $value->middle_name . " " . $value->third_name . " " . $value->last_name ?> </td>
                                                                  <td> <?php echo $value->student_id ?> </td>
                                                                  <td>
                                                                     <input type="number" name="grade[]" min="0" max="100" placeholder="80"  required>
                                                                     <input type="hidden" name="request_id[]" value="<?php echo $value->r_id; ?>"  required>
                                                                   </td>

                                                              </tr>
                                                              <?php
                                                              }
                                                            }

                                                            ?>
                                                          </tbody>
                                                      </table>

                                                  </div>

                                              </div>

                                          </div>
                                          <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <button type="submit" name="addGrade" class="btn green">
                                                            <i class="fa fa-check"></i> Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                       <?php
                                     }else{
                                       ?>
                                       <script>
                                           window.location = "index.php";
                                       </script>
                                       <?php
                                     }
                                     ?>

                                    <!-- END CONDENSED TABLE PORTLET-->
                                </div>
                                    <!-- END SAMPLE TABLE PORTLET-->
                                </div>

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
<?php
  include 'footer.php';
?>
