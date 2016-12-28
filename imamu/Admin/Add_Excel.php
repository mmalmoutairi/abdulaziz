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
                        <h1>Admin Student managemen

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
                                <div class="portlet light form-fit ">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-settings font-green"></i>
                                            <span class="caption-subject font-green sbold uppercase">Add Excel </span>
                                        </div>

                                    </div>
                                    <div class="portlet-body form">
                                        <!-- BEGIN FORM-->
                                        <form method="post" action="controller/addExcel.php" class="form-horizontal form-bordered" enctype="multipart/form-data" >
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3"> File</label>
                                                    <div class="col-md-9">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <span class="btn green btn-file">
                                                                <span class="fileinput-new"> Select Excel file </span>
                                                                <input type="file" name="userfile"> </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <button class="class="btn green"" type="submit" name="addExcel"><i class="fa fa-check"></i> Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- END FORM-->
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
