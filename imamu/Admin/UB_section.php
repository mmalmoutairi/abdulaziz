<?php
include 'header.php';
include '../db/db.php';
$array = array();
$id = $_GET['id'];
$id = (int) $id;
if ($id != 0) {
    $query = "select * from `section` where `id` = " . $id;
    $result = @mysqli_query($connection, $query);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        for ($i = 0; $i < $count; $i++) {
            $array[@count($array)] = mysqli_fetch_object($result);
        }
    } else {
        ?>
        <script>
            window.location = "section.php";
        </script>
        <?php
    }

    $query = "SELECT * FROM `course` order by id desc";
    $result = @mysqli_query($connection, $query);
    $count = mysqli_num_rows($result);
    $course = array();
    if ($count > 0) {
        for ($i = 0; $i < $count; $i++) {
            $course[@count($course)] = mysqli_fetch_object($result);
        }
    }
} else {
    ?>
    <script>
        window.location = "section.php";
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
                        <h1>Section Management

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
                                <form class="register-form" action="controller/UP_Section.php?id=<?php echo $array[0]->id; ?>" method="post">

                                    <div class="form-group">
                                        <label for="single" class="control-label">Section Number</label>
                                        <input class="form-control placeholder-no-fix" type="text" placeholder="<?php echo $array[0]->section_number; ?>" name="section_number" minlength= "6"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="single" class="control-label">Room</label>
                                        <input class="form-control placeholder-no-fix" type="text" placeholder="<?php echo $array[0]->room; ?>" name="room"/>
                                    </div>

                                    <div class="form-group">
                                        <label for="single" class="control-label">Cours</label>
                                        <select id="single" name="course_id" class="form-control select2" >
                                            <?php
                                                foreach ($course as $key => $value) {
                                                  ?>
                                                  <option value="<?php echo $value->id; ?>" <?php if($value->id == $array[0]->course_id) echo "selected" ?> ><?php echo $value->name; ?></option>
                                                  <?php
                                                }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-sm-offset-1">
                                        <label class="mt-checkbox mt-checkbox-outline">
                                            <input type="checkbox" name="day[]" value="sun"  <?php if($array[0]->sun == 1) echo "checked" ?>> Sunday
                                            <span></span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-outline">
                                            <input type="checkbox" name="day[]" value="mon" <?php if($array[0]->mon == 1) echo "checked" ?>> Monday
                                            <span></span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-outline">
                                            <input type="checkbox" name="day[]" value="tue" <?php if($array[0]->tue == 1) echo "checked" ?>> Tuesday
                                            <span></span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-outline">
                                            <input type="checkbox" name="day[]" value="wed" <?php if($array[0]->wed == 1) echo "checked" ?>> Wednesday
                                            <span></span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-outline">
                                            <input type="checkbox" name="day[]" value="thu" <?php if($array[0]->thu == 1) echo "checked" ?>> Thursday
                                            <span></span>
                                        </label>
                                    </div>

                                    <div class="form-group">
                                        <label for="single" class="control-label">Start : <?php echo $array[0]->start_time; ?></label>
                                        <input class="form-control placeholder-no-fix" type="time" placeholder="" name="start" />
                                    </div>

                                    <div class="form-group">
                                        <label for="single" class="control-label">End : <?php echo $array[0]->finish_time; ?></label>
                                        <input class="form-control placeholder-no-fix" type="time" placeholder=" Taime" name="end" />
                                    </div>

                                    <div class="form-group">
                                        <label for="single" class="control-label">Maximum Student</label>
                                        <input class="form-control placeholder-no-fix" type="text" placeholder=" <?php echo $array[0]->max_studemt; ?>" name="max" />
                                    </div>

                                    <div class="form-actions">
                                        <button type="submit" name="UpdateSection" id="register-submit-btn" class="btn btn-success uppercase pull-left">Update</button>
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
<?php
include 'footer.php'
?>
