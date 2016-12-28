<?php
include 'header.php';
include '../db/db.php';
$query = "SELECT * FROM `semester` order by `id` desc";
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
                        <h1>Semester management

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
                                            <div class="actions"><a class="btn btn-transparent red btn-outline btn-circle btn-sm active" href="add_semester.php"><i class="fa fa-plus"></i>Add Semester</a></div>
                                        </div>
                                        <div class="caption">
                                            <i class="fa fa-comments"></i>semester </div>
                                        <div class="tools">
                                            <a href="javascript:;" class="collapse"> </a>
                                            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                            <a href="javascript:;" class="reload"> </a>
                                            <a href="javascript:;" class="remove"> </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-scrollable">
                                          <?php
                                          if(@count($array) > 0){
                                            ?>
                                            <table class="table table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th> # </th>
                                                        <th>  semester  </th>
                                                        <th>  Status  </th>
                                                        <th> Update </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  <?php
                                                    foreach ($array as $key => $value) {
                                                      ?>
                                                      <tr>
                                                          <td> <?php echo $key+1; ?> </td>
                                                          <td>  <a href="#"><?php echo $value->name; ?></a></td>
                                                          <?php
                                                          if($value->isActive == 1){
                                                            ?>
                                                            <td>  <span class="label label-sm label-success"> Active </span> </td>
                                                            <?php
                                                          }else{
                                                            ?>
                                                            <td> <span class="label label-sm label-danger"> Blocked </span> </td>
                                                            <?php
                                                          }

                                                          ?>
                                                          <td> <a href="UB_semester.php?id=<?php echo $value->id; ?>" class="btn btn-outline btn-circle btn-sm purple">
                                                                  <i class="fa fa-edit"></i> Update </a></td>
                                                      </tr>
                                                      <?php
                                                    }
                                                   ?>
                                                </tbody>
                                            </table>
                                            <?
                                          }else{
                                              ?>
                                              <div class="alert alert-danger">
                                                  <strong>Alert !</strong> No Semester Added
                                              </div>

                                              <?php
                                          }

                                          ?>

                                        </div>
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
