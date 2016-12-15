<?php
include 'header.php';
include '../db/db.php';
$query = "SELECT * FROM `course` order by id desc";
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
        <div class="page-container">
            <div class="page-head">
                <div class="container">
                    <div class="page-title">
                        <h1>Admin section management</h1>
                    </div>
                </div>
            </div>
            <div class="page-content">
                <div class="container">
                    <div class="page-content-inner">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN SAMPLE TABLE PORTLET-->
                                <form class="register-form" action="controller/ADDSECTION.php" method="post">

                                    <div class="form-group">
                                        <label for="single" class="control-label">Section Number</label>
                                        <input class="form-control placeholder-no-fix" type="text" placeholder=" Section Number" name="section_number" minlength= "6" required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="single" class="control-label">Room</label>
                                        <input class="form-control placeholder-no-fix" type="text" placeholder="Room" name="room" required/>
                                    </div>

                                    <div class="form-group">
                                        <label for="single" class="control-label">Cours</label>
                                        <select id="single" name="course_id" class="form-control select2" required >
                                            <option value="">Select</option>
                                            <?php
                                                foreach ($array as $key => $value) {
                                                  ?>
                                                  <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
                                                  <?php
                                                }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-sm-offset-1">
                                        <label class="mt-checkbox mt-checkbox-outline">
                                            <input type="checkbox" name="day[]" value="sun"> Sunday
                                            <span></span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-outline">
                                            <input type="checkbox" name="day[]" value="mon"> Monday
                                            <span></span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-outline">
                                            <input type="checkbox" name="day[]" value="tue"> Tuesday
                                            <span></span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-outline">
                                            <input type="checkbox" name="day[]" value="wed"> Wednesday
                                            <span></span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-outline">
                                            <input type="checkbox" name="day[]" value="thu"> Thursday
                                            <span></span>
                                        </label>
                                    </div>

                                    <div class="form-group">
                                        <label for="single" class="control-label">Start</label>
                                        <input class="form-control placeholder-no-fix" type="time" placeholder=" Taime" name="start" required />
                                    </div>

                                    <div class="form-group">
                                        <label for="single" class="control-label">End</label>
                                        <input class="form-control placeholder-no-fix" type="time" placeholder=" Taime" name="end" required />
                                    </div>

                                    <div class="form-group">
                                        <label for="single" class="control-label">Maximum Student</label>
                                        <input class="form-control placeholder-no-fix" type="text" placeholder=" maximum" name="max" required />
                                    </div>

                                    <div class="form-actions">
                                        <button type="submit" name="AddSection" id="register-submit-btn" class="btn btn-success uppercase pull-left">Add</button>
                                    </div>

                                </form>
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
<?php
include 'footer.php'
?>
