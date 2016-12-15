<?php
include 'header.php';
include '../db/db.php';
$array = array();
$id = $_GET['id'];
$id = (int) $id;
if ($id != 0) {
    $query = "select * from `semester` where `id` = " . $id;
    $result = @mysqli_query($connection, $query);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        for ($i = 0; $i < $count; $i++) {
            $array[@count($array)] = mysqli_fetch_object($result);
        }
    } else {
        ?>
        <script>
            window.location = "semester.php";
        </script>
        <?php
    }
} else {
    ?>
    <script>
        window.location = "semester.php";
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
                        <h1>Admin semester management

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
                    <!-- BEGIN PAGE BREADCRUMBS -->
                    <ul class="page-breadcrumb breadcrumb">
                        <li>
                            <a href="#">Update Semester </a>
                            <i class="fa fa-circle"></i>
                        </li>

                    </ul>
                    <!-- END PAGE BREADCRUMBS -->
                    <!-- BEGIN PAGE CONTENT INNER -->
                    <div class="page-content-inner">

                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN SAMPLE TABLE PORTLET-->
                                <form class="register-form" action="controller/UP_SEMESTER.php?id=<?php echo $array[0]->id; ?>" method="post">

                                    <div class="form-group">
                                        <h5>Semester Name</h5>
                                        <label class="control-label visible-ie8 visible-ie9"> Semester Name</label>
                                        <input class="form-control placeholder-no-fix" type="text" placeholder=" <?php echo $array[0]->name; ?>" name="name" /> </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <div class="mt-radio-list">
                                            <label class="mt-radio"> Open
                                                <input value="1" name="status" type="radio"  <?php if($array[0]->isActive == 1) echo "checked" ?>>
                                                <span></span>
                                            </label>
                                            <label class="mt-radio"> Close
                                                <input value="2" name="status" type="radio" <?php if($array[0]->isActive == 2) echo "checked" ?>>
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-actions">
                                        <button type="submit" name="UpdateSemester" id="register-submit-btn" class="btn btn-success uppercase pull-left">Update</button>
                                    </div>
                                </form>
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
