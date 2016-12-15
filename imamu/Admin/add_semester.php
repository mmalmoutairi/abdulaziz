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
                                <form class="register-form" action="controller/AddSemester.php" method="post">

                                    <div class="form-group">
                                        <h5>Semester Name</h5>
                                        <label class="control-label visible-ie8 visible-ie9"> Semester Name</label>
                                        <input class="form-control placeholder-no-fix" type="text" placeholder=" Semester" name="name" /> </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <div class="mt-radio-list">
                                                <label class="mt-radio"> Open
                                                    <input value="1" name="status" type="radio">
                                                    <span></span>
                                                </label>
                                                <label class="mt-radio"> Close
                                                    <input value="2" name="status" type="radio">
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    <div class="form-actions">
                                        <button type="submit" name="AddSemester" id="register-submit-btn" class="btn btn-success uppercase pull-left">Add</button>
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
