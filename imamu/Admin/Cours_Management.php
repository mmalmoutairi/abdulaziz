<?php
session_start();
include 'header.php';
include '../db/db.php';
$query = "SELECT * FROM `course` order by `id` desc";
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
                        <h1>Course management

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

                    <!-- END PAGE BREADCRUMBS -->
                    <!-- BEGIN PAGE CONTENT INNER -->
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
                                            <div class="actions">
                                                <div class="actions"><a class="btn btn-transparent red btn-outline btn-circle btn-sm active" href="Add_cours.php"><i class="fa fa-plus"></i>Add Course</a></div>
                                            </div>
                                        </div>
                                        <div class="caption">
                                            <i class="fa fa-comments"></i>course </div>
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
                                            if (@count($array) > 0) {
                                                ?>
                                                <table class="table table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th> # </th>
                                                            <th>  course  </th>
                                                            <th> Code </th>
                                                            <th>  Hours </th>
                                                            <th> Update </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php
                                                        foreach ($array as $key => $value) {
                                                            ?>
                                                            <tr>
                                                                <td> <?php echo $key + 1; ?> </td>
                                                                <td>  <a href="#"><?php echo $value->name; ?></a></td>
                                                                <td> <?php echo $value->code; ?> </td>
                                                                <td> <?php echo $value->hours; ?> </td>
                                                                <td> <a href="UB_cours.php?id=<?php echo $value->id; ?>" class="btn btn-outline btn-circle btn-sm purple">
                                                                        <i class="fa fa-edit"></i> Update </a></td>
                                                            </tr>
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                <div class="alert alert-danger">
                                                    <strong>Alert !</strong> No Course Added
                                                </div>

                                                <?php
                                            }
                                            ?>
                                          </tbody>
                                      </table>
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
