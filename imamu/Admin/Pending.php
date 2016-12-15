<?php
session_start();
include 'header.php';
include '../db/db.php';
$query = "select r.id ,  u.first_name , u.middle_name , u.third_name , u.last_name , s.name as semester_name , c.name as course_name from request r , user u , semester s , course c where r.student_id = u.id AND r.semester_id = s.id AND r.course_id = c.id and r.status = 3 order by `id` desc";
$result = @mysqli_query($connection, $query);
$count = mysqli_num_rows($result);
$array = array();
if ($count > 0) {
    for ($i = 0; $i < $count; $i++) {
        $array[@count($array)] = mysqli_fetch_object($result);
    }
}
?>
<div class="page-wrapper-row full-height">
    <div class="page-wrapper-middle">
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN CONTENT -->

            <!-- BEGIN CONTENT BODY -->
            <!-- BEGIN PAGE HEAD-->
            <div class="page-head">
                <div class="container">
                    <!-- BEGIN PAGE TITLE -->
                    <div class="page-title">
                        <h1>Requset management

                        </h1>
                    </div>
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
                            <div class="col-md-12">
                                <!-- BEGIN SAMPLE TABLE PORTLET-->
                                <div class="portlet box green">
                                    <div class="portlet-title">

                                        <div class="caption">
                                            <i class="fa fa-comments"></i>Requset </div>
                                    </div>
                                    <div class="portlet-body">
                                      <?php
                                            if(@count($array) > 0){
                                              ?>
                                              <div class="table-scrollable">
                                                  <table class="table table-striped table-hover">
                                                      <thead>
                                                          <tr>
                                                              <th> # </th>
                                                              <th>  nomber request   </th>
                                                              <th>  Name of request   </th>
                                                              <th>  Course Name   </th>
                                                              <th>  Semester Name   </th>
                                                              <th> View </th>
                                                          </tr>
                                                      </thead>
                                                      <tbody>
                                                        <?php
                                                        foreach ($array as $key => $value) {
                                                          ?>
                                                          <tr>
                                                              <td><?php echo $key+1; ?></td>
                                                              <td><?php echo $value->id; ?></td>
                                                              <td><?php echo $value->first_name . " " . $value->middle_name . " " . $value->third_name . " " . $value->last_name ?></td>
                                                              <td><?php echo $value->course_name; ?></td>
                                                              <td><?php echo $value->semester_name; ?></td>
                                                              <td> <a href="ViewRequest.php?id=<?php echo $value->id; ?>" class="btn btn-outline btn-circle btn-sm purple">
                                                                      <i class="fa fa-edit"></i> View </a></td>
                                                          </tr>
                                                          <?php
                                                        }
                                                        ?>
                                                      </tbody>
                                                  </table>
                                              </div>
                                              <?php
                                            }else{
                                                ?>
                                                <div class="alert alert-danger">
                                                    <strong>Alert !</strong> No Request Pending
                                                </div>
                                                <?php
                                            }
                                      ?>
                                    </div>
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

    </div>
    <!-- END CONTAINER -->
</div>
<?php
include 'footer.php'
?>
