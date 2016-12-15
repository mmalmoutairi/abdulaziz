<?php
include 'header.php';
include '../db/db.php';
$array = array();
$id = $_GET['id'];
$id = (int) $id;
if ($id != 0) {
    $query = "select * from `user` where `id` = " . $id;
    $result = @mysqli_query($connection, $query);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        for ($i = 0; $i < $count; $i++) {
            $array[@count($array)] = mysqli_fetch_object($result);
        }
    } else {
        ?>
        <script>
            window.location = "Employees_management.php";
        </script>
        <?php
    }
} else {
    ?>
    <script>
        window.location = "Employees_management.php";
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
                        <h1>Update Employee

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
                            <a href="#">Employee Information</a>
                            <i class="fa fa-circle"></i>
                        </li>

                    </ul>
                    <!-- END PAGE BREADCRUMBS -->
                    <!-- BEGIN PAGE CONTENT INNER -->
                    <div class="page-content-inner">

                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN SAMPLE TABLE PORTLET-->
                                <form class="register-form" action="controller/UB_Employee.php?id=<?php echo $array[0]->id; ?>" method="post">

                                    <div class="form-group">
                                        <label class="control-label visible-ie8 visible-ie9"> First Name</label>
                                        <input class="form-control placeholder-no-fix" type="text" placeholder=" <?php echo $array[0]->first_name; ?>" name="first_name" /> </div>
                                    <div class="form-group">
                                        <label class="control-label visible-ie8 visible-ie9">Middle Name </label>
                                        <input class="form-control placeholder-no-fix" type="text" placeholder="<?php echo $array[0]->middle_name; ?> " name="middle_name" /> </div>
                                    <div class="form-group">
                                        <label class="control-label visible-ie8 visible-ie9">Third Name</label>
                                        <input class="form-control placeholder-no-fix" type="text" placeholder="<?php echo $array[0]->third_name; ?>" name="third_name" /> </div>
                                    <div class="form-group">
                                        <label class="control-label visible-ie8 visible-ie9">Last Name</label>
                                        <input class="form-control placeholder-no-fix" type="text" placeholder="<?php echo $array[0]->last_name; ?>" name="last_name" /> </div>
                                    <div class="form-group">
                                        <label class="control-label visible-ie8 visible-ie9">National ID</label>
                                        <input class="form-control placeholder-no-fix" type="text" placeholder="<?php echo $array[0]->national_id; ?>" name="national_id" /> </div>
                                    <div class="form-group">
                                        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                                        <label class="control-label visible-ie8 visible-ie9">Email</label>
                                        <input class="form-control placeholder-no-fix" type="text" placeholder="<?php echo $array[0]->email; ?>" name="email" /> </div>
                                    <div class="form-group">
                                        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                                        <label class="control-label visible-ie8 visible-ie9">Password</label>
                                        <input class="form-control placeholder-no-fix" type="text" placeholder="Password" name="password"> </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="status">
                                            <option value="">choose</option>
                                            <option value="1">Active</option>
                                            <option value="2">Block</option>
                                        </select>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" id="register-submit-btn" name="updateEmployee" class="btn btn-success uppercase pull-left">Update</button>
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
