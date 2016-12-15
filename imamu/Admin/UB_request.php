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
                        <h1>Admin Requset management

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
                            <a href="#">Requset Information</a>
                            <i class="fa fa-circle"></i>
                        </li>

                    </ul>
                    <!-- END PAGE BREADCRUMBS -->
                    <!-- BEGIN PAGE CONTENT INNER -->
                    <div class="page-content-inner">

                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN SAMPLE TABLE PORTLET-->
                                <form class="register-form" action="index.php" method="post">


                                    <div class="form-group">
                                        <label class="control-label visible-ie8 visible-ie9">Status</label>
                                        <select name="country" id="country_list" class="select2 form-control">
                                            <option value="Prerequisite"></option>
                                            <option value="AF">acceptable</option>
                                            <option value="AF">unacceptable</option>
                                            <option value="AF">Has a problem</option>

                                        </select>
                                    </div>



                                    <div class="form-actions">
                                        <button type="submit" id="register-submit-btn" class="btn btn-success uppercase pull-left">Update</button>
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
