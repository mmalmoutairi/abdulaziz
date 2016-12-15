<?php
session_start();
include 'header.php';
include '../db/db.php';
$query = "select s.* , c.name from section s , course c where s.course_id = c.id order by s.id desc";
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
                        <h1>Section management

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
                              <?php
                              if (isset($_SESSION["errors"])) {
                                  ?>
                                  <div class="alert alert-danger">
                                      <?php
                                      foreach ($_SESSION["errors"] as $key => $value) {
                                          ?>
                                          <strong>Error!</strong> <?php echo $value . "<br>"; ?>
                                          <?php
                                      }
                                      ?>
                                  </div>
                                  <?php
                                  unset($_SESSION["errors"]);
                              }

                              if (isset($_SESSION['success'])) {
                                  ?>
                                  <div class="alert alert-success">
                                      <strong>Success : </strong> <?php echo $_SESSION['success']; ?>
                                  </div>
                                  <?php
                                  unset($_SESSION["success"]);
                              }
                              ?>

                                <!-- BEGIN SAMPLE TABLE PORTLET-->
                                <div class="portlet box green">
                                    <div class="portlet-title">
                                        <div class="actions">
                                            <div class="actions"><a class="btn btn-transparent red btn-outline btn-circle btn-sm active" href="Add_section.php"><i class="fa fa-plus"></i>Add Section</a></div>
                                        </div>
                                        <div class="caption">
                                            <i class="fa fa-comments"></i>section </div>
                                        <div class="tools">
                                            <a href="javascript:;" class="collapse"> </a>
                                            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                            <a href="javascript:;" class="reload"> </a>
                                            <a href="javascript:;" class="remove"> </a>
                                        </div>
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
                                                        <th>  Room  </th>
                                                        <th>  Course  </th>
                                                        <th>  Start  </th>
                                                        <th>  End  </th>
                                                        <th>  Maximum </th>
                                                        <th> Update </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  <?php
                                                  foreach ($array as $key => $value) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $key+1; ?></td>
                                                        <td><?php echo $value->room; ?></td>
                                                        <td><?php echo $value->name; ?></td>
                                                        <td> <?php echo $value->start_time; ?></td>
                                                        <td> <?php echo $value->finish_time; ?></td>
                                                        <td> <?php echo $value->max_studemt; ?></td>
                                                        <td> <a href="UB_section.php?id=<?php echo $value->id; ?>" class="btn btn-outline btn-circle btn-sm purple">
                                                                <i class="fa fa-edit"></i> Update </a></td>
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
                                            <strong>Alert !</strong> No Section Added
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
