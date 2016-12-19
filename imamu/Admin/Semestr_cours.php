<?php
session_start();
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
                                <form class="register-form" action="section_Semester.php" method="get">

                                  <div class="form-group">
                                        <h5>Semester</h5>
                                        <label class="control-label visible-ie8 visible-ie9">Prerequisite</label>
                                        <select name="semester" id="country_list" class="select2 form-control" required>
                                            <option value="">Select</option>
                                            <?php
                                              foreach ($array as $key => $value) {
                                                ?>
                                                <option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
                                                <?php
                                              }

                                             ?>
                                        </select>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" id="register-submit-btn" class="btn btn-success uppercase pull-left">Next</button>
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
