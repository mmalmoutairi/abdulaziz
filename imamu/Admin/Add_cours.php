<?php
include 'header.php'
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
                        <h1>Course management</h1>
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
                                ?>
                                <!-- BEGIN SAMPLE TABLE PORTLET-->
                                <form class="register-form" action="controller/add_Course.php" method="post">

                                    <div class="form-group">
                                        <h5>course</h5>
                                        <label class="control-label visible-ie8 visible-ie9">Course</label>
                                        <input class="form-control placeholder-no-fix" type="text" placeholder="Course Name" name="name" required /> </div>
                                    <div class="form-group">
                                        <h5>Code</h5>
                                        <label class="control-label visible-ie8 visible-ie9">Code </label>
                                        <input class="form-control placeholder-no-fix" type="text" placeholder="Course Code" name="code" required /> </div>
                                    <div class="form-group">
                                        <h5>Hours</h5>
                                        <label class="control-label visible-ie8 visible-ie9">Hours</label>
                                        <input class="form-control placeholder-no-fix" type="number" min="0" placeholder="Couse Hours" name="hours" required/> </div>
                                    <div class="form-actions">
                                        <button type="submit" name="addCourse" id="register-submit-btn" class="btn btn-success uppercase pull-left">Add</button>
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
