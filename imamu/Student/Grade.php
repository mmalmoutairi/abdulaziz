<?php
include 'header.php';

include '../db/db.php';
$array = array();
$query = "select cp.grade , co.name , co.hours from completed cp , course co where cp.student_id = ".$_SESSION['user']." AND cp.course_id = co.id";
$result = @mysqli_query($connection, $query);
$count = mysqli_num_rows($result);
for ($i = 0; $i < $count; $i++) {
    $array[@count($array)] = mysqli_fetch_object($result);
}
 ?>
<div class="page-wrapper-row full-height">
    <div class="page-wrapper-middle">
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
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
                                    <!-- BEGIN CONDENSED TABLE PORTLET-->

                                    <div class="portlet box red">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-picture"></i>Grude </div>

                                        </div>
                                        <div class="portlet-body">
                                          <?php
                                          if(@count($array) > 0){
                                            ?>
                                            <div class="table-scrollable">
                                                <table class="table table-condensed table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th> # </th>
                                                            <th>  Name Cours </th>
                                                            <th> Hours </th>
                                                            <th> Grade  </th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                      <?php
                                                      foreach ($array as $key => $value) {
                                                        ?>
                                                        <tr>
                                                            <td> <?php echo $key+1; ?> </td>
                                                            <td> <?php echo $value->name ?> </td>
                                                            <td> <?php echo $value->hours ?> </td>
                                                            <td> <?php echo $value->grade; ?></td>
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
                                                <strong>Alert !</strong> you dont finish any Courses
                                            </div>
                                            <?php
                                          }


                                          ?>
                                        </div>

                                    </div>

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
<?php include 'footer.php' ?>
