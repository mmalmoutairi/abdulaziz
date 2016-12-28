<?php
include 'header.php';
include '../db/db.php';
$array = array();
$student = array();
$course = array();
$semester = array();
$feadback= array();
$request = array();
$id = $_GET['id'];
$id = (int) $id;
if ($id != 0) {
    $query = "select * from `request` where `id` = " . $id;
    $result = @mysqli_query($connection, $query);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        for ($i = 0; $i < $count; $i++) {
            $array[@count($array)] = mysqli_fetch_object($result);
        }

        $request = $array;

        $query = "select f.* , u.first_name , u.middle_name , u.third_name , u.last_name from feedback f , user u where f.request_id = ".$id." AND u.id = f.sender ORDER by f.id DESC";
        $result = @mysqli_query($connection, $query);
        $count = @mysqli_num_rows($result);
        if($count > 0){
          for ($i = 0; $i < $count; $i++) {
              $feadback[@count($feadback)] = mysqli_fetch_object($result);
          }
        }

        // get User Information
        $query = "select  `first_name`, `middle_name`, `third_name`, `last_name`, `student_id`, `national_id` from `user` where `role_id` = 2 AND `id` = ".$array[0]->student_id;
        $result = @mysqli_query($connection, $query);
        $count = mysqli_num_rows($result);
        if($count > 0){
          for ($i = 0; $i < $count; $i++) {
              $student[@count($student)] = mysqli_fetch_object($result);
          }
        } else {
            ?>
            <script>
                window.location = "index.php";
            </script>
            <?php
        }
        //get Course Information
        $query = "select s.* , c.name as name_course from section s , course c where s.id = ".$array[0]->section_id." AND s.course_id = c.id";
        $result = @mysqli_query($connection, $query);
        $count = mysqli_num_rows($result);
        if($count > 0){
          for ($i = 0; $i < $count; $i++) {
              $course[@count($course)] = mysqli_fetch_object($result);
          }
        } else {
            ?>
            <script>
                window.location = "index.php";
            </script>
            <?php
        }
        // get semester information
        $query = "select * from `semester` where `id` = ".$array[0]->semester_id;
        $result = @mysqli_query($connection, $query);
        $count = mysqli_num_rows($result);
        if($count > 0){
          for ($i = 0; $i < $count; $i++) {
              $semester[@count($semester)] = mysqli_fetch_object($result);
          }
        } else {
            ?>
            <script>
                window.location = "index.php";
            </script>
            <?php
        }



    } else {
        ?>
        <script>
            window.location = "index.php";
        </script>
        <?php
    }
} else {
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
            <div class="page-content">
                    <div class="container">
                        <div class="page-content-inner">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Begin: life time stats -->
                                    <div class="portlet light portlet-fit portlet-datatable ">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="icon-settings font-dark"></i>
                                                <span class="caption-subject font-dark sbold uppercase"> Request # <?php echo $id; ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="tabbable-line">
                                                <ul class="nav nav-tabs nav-tabs-lg">
                                                    <li class="active">
                                                        <a href="#tab_1" data-toggle="tab" aria-expanded="true"> Details </a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tab_1">
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="portlet yellow-crusta box">
                                                                    <div class="portlet-title">
                                                                        <div class="caption">
                                                                            <i class="fa fa-cogs"></i>Student Details </div>
                                                                    </div>
                                                                    <div class="portlet-body">
                                                                        <div class="row static-info">
                                                                            <div class="col-md-5 name"> Student Id : </div>
                                                                            <div class="col-md-7 value"> <?php echo $student[0]->student_id; ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row static-info">
                                                                            <div class="col-md-5 name"> Studen Name: </div>
                                                                            <div class="col-md-7 value"> <?php echo $student[0]->first_name . " " . $student[0]->middle_name . " " . $student[0]->third_name . " " . $student[0]->last_name ?> </div>
                                                                        </div>
                                                                        <div class="row static-info">
                                                                            <div class="col-md-5 name"> National Id: </div>
                                                                            <div class="col-md-7 value">
                                                                                <?php echo $student[0]->national_id; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="portlet blue-hoki box">
                                                                    <div class="portlet-title">
                                                                        <div class="caption">
                                                                            <i class="fa fa-cogs"></i>Course Details </div>
                                                                    </div>
                                                                    <div class="portlet-body">
                                                                        <div class="row static-info">
                                                                            <div class="col-md-5 name"> Course Name: </div>
                                                                            <div class="col-md-7 value"> <?php echo $course[0]->name_course; ?> </div>
                                                                        </div>
                                                                        <div class="row static-info">
                                                                            <div class="col-md-5 name"> Section No : </div>
                                                                            <div class="col-md-7 value"> <?php echo $course[0]->section_number; ?> </div>
                                                                        </div>
                                                                        <div class="row static-info">
                                                                            <div class="col-md-5 name"> Maximum Student: </div>
                                                                            <div class="col-md-7 value"> <?php echo $course[0]->max_studemt; ?> </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12">
                                                                <div class="portlet green-meadow box">
                                                                    <div class="portlet-title">
                                                                        <div class="caption">
                                                                            <i class="fa fa-cogs"></i>Semester Details
                                                                        </div>
                                                                    </div>
                                                                    <div class="portlet-body">
                                                                        <div class="row static-info">
                                                                            <div class="col-md-12 value">Semester Name :  <?php echo $semester[0]->name; ?>
                                                                                <br>Semester Status : <?php
                                                                                  if($semester[0]->isActive == 1){
                                                                                    echo "Open";
                                                                                  }else{
                                                                                    echo "Close";
                                                                                  }
                                                                                 ?>
                                                                                </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                          <div class="blog-page blog-content-2">
                                                              <div class="row">
                                                                  <div class="col-lg-12">
                                                                      <div class="blog-single-content bordered blog-container">
                                                                          <div class="blog-comments">
                                                                              <h3 class="sbold blog-comments-title">FeedBack</h3>
                                                                              <div class="c-comment-list">
                                                                                <?php
                                                                                if(@count($feadback) > 0){
                                                                                  foreach ($feadback as $key => $value) {
                                                                                    ?>
                                                                                    <hr>
                                                                                    <div class="media">
                                                                                        <div class="media-body">
                                                                                            <h4 class="media-heading">
                                                                                                <?php echo $value->first_name . " " . $value->middle_name . " " . $value->third_name . " " . $value->last_name ?>
                                                                                            </h4><?php echo $value->comment; ?></div>
                                                                                    </div>

                                                                                    <?php
                                                                                  }
                                                                                }else{
                                                                                  ?>
                                                                                  <h4 class="media-heading">
                                                                                    No Comment
                                                                                  </h4>
                                                                                  <?php
                                                                                }

                                                                                ?>
                                                                              </div>
                                                                              <?php
                                                                                if($request[0]->status == 4){
                                                                                  ?>
                                                                                  <h3 class="sbold blog-comments-title">Add Comment</h3>
                                                                                  <form action="addComment.php?id=<?php echo $id; ?>" method="post">
                                                                                      <div class="form-group">
                                                                                          <textarea rows="8" name="comment" placeholder="Write comment here ..." class="form-control c-square"></textarea>
                                                                                      </div>
                                                                                      <div class="form-group">
                                                                                          <button type="submit" name="addComment" class="btn blue uppercase btn-md sbold btn-block">Submit</button>
                                                                                      </div>
                                                                                  </form>

                                                                                  <?php
                                                                                }
                                                                              ?>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End: life time stats -->
                                </div>
                            </div>
                        </div>
                        <!-- END PAGE CONTENT INNER -->
                    </div>
                </div>
        </div>

    </div>
    <!-- END CONTAINER -->
</div>
<?php
include 'footer.php'
?>
