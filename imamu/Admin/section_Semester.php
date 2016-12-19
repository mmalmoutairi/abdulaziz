<?php
include 'header.php';
include '../db/db.php';
$array = array();
$id = $_GET['semester'];
$id = (int) $id;
if ($id != 0) {
    $query = "select * from `semester` where `id` = " . $id;
    $result = @mysqli_query($connection, $query);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        for ($i = 0; $i < $count; $i++) {
            $array[@count($array)] = mysqli_fetch_object($result);
        }

        $query = "select s.section_number , s.id , c.name as course_name from section s , course c where s.course_id = c.id";
        $result = @mysqli_query($connection, $query);
        $count = mysqli_num_rows($result);
        $section = array();
        for ($i = 0; $i < $count; $i++) {
            $section[@count($section)] = mysqli_fetch_object($result);
        }

    } else {
        ?>
        <script>
            window.location = "Semestr_cours.php";
        </script>
        <?php
    }
} else {
    ?>
    <script>
        window.location = "Semestr_cours.php";
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
                        <h1>Admin Semester management

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


                                    <div class="portlet box green">
                                        <div class="portlet-title">
                                            <div class="actions">

                                            </div>
                                            <div class="caption">
                                                <i class="fa fa-comments"></i>Semester name </div>
                                        </div>
                                        <div class="portlet-body">
                                          <?php
                                            if(@count($section) > 0){
                                              ?>
                                              <form class="register-form" action="addSectionToSemester.php?semester=<?php echo $id ?>" method="post">
                                                <div class="table-scrollable">
                                                    <table class="table table-striped table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th> # </th>
                                                                <th>  Select </th>
                                                                <th>  Course  </th>
                                                                <th> Section </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                          <?php
                                                          foreach ($section as $key => $value) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $key+1; ?></td>
                                                                <td> <input type="checkbox" name="section[]" value="<?php echo $value->id ?>"></td>
                                                                <td><?php echo $value->course_name; ?></td>
                                                                <td><?php echo $value->section_number; ?></td>
                                                            </tr>
                                                            <?php
                                                          }


                                                           ?>
                                                        </tbody>
                                                    </table>
                                                </div>

                                              <div class="form-actions">
                                                  <button type="submit" id="register-submit-btn" class="btn btn-success uppercase pull-left">Next</button>
                                              </div>
                                          </form>
                                              <?php
                                            }else{
                                                ?>
                                                <div class="alert alert-danger">
                                                    <strong>Alert !</strong> No section in database
                                                </div>
                                                <?php
                                            }


                                          ?>
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
