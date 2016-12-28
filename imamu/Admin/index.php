<?php
include 'header.php';
include '../db/db.php';
$query = "select count(r.id) as accept from request r where r.semester_id = (select s.id from semester s ORDER by s.id DESC limit 1) AND r.status = 1";
$result = @mysqli_query($connection, $query);
$count = mysqli_num_rows($result);
$accept = array();
if ($count > 0) {
    for ($i = 0; $i < $count; $i++) {
        $accept[@count($accept)] = mysqli_fetch_object($result);
    }
}

$query = "select count(r.id) as reject from request r where r.semester_id = (select s.id from semester s ORDER by s.id DESC limit 1) AND r.status = 2";
$result = @mysqli_query($connection, $query);
$count = mysqli_num_rows($result);
$reject = array();
if ($count > 0) {
    for ($i = 0; $i < $count; $i++) {
        $reject[@count($reject)] = mysqli_fetch_object($result);
    }
}


$query = "select count(r.id) as pending from request r where r.semester_id = (select s.id from semester s ORDER by s.id DESC limit 1) AND r.status = 3";
$result = @mysqli_query($connection, $query);
$count = mysqli_num_rows($result);
$pending = array();
if ($count > 0) {
    for ($i = 0; $i < $count; $i++) {
        $pending[@count($pending)] = mysqli_fetch_object($result);
    }
}



$query = "select count(r.id) as feedback from request r where r.semester_id = (select s.id from semester s ORDER by s.id DESC limit 1) AND r.status = 4";
$result = @mysqli_query($connection, $query);
$count = mysqli_num_rows($result);
$feedback = array();
if ($count > 0) {
    for ($i = 0; $i < $count; $i++) {
        $feedback[@count($feedback)] = mysqli_fetch_object($result);
    }
}

?>
<div class="page-wrapper-row full-height">
    <div class="page-wrapper-middle">
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <!-- BEGIN PAGE HEAD-->
                <div class="page-head">
                    <div class="container">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>Admin Dashboard

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
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="dashboard-stat2 ">
                                        <div class="display">
                                            <div class="number">
                                                <h3 class="font-green-sharp">
                                                    <span data-counter="counterup" data-value="<?php echo $accept[0]->accept; ?>"><?php echo $accept[0]->accept; ?></span>
                                                </h3>
                                                <small>Accept Request</small>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="dashboard-stat2 ">
                                        <div class="display">
                                            <div class="number">
                                                <h3 class="font-red-haze">
                                                    <span data-counter="counterup" data-value="<?php echo $pending[0]->pending; ?>"><?php echo $pending[0]->pending; ?></span>
                                                </h3>
                                                <small>Pending Request</small>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="dashboard-stat2 ">
                                        <div class="display">
                                            <div class="number">
                                                <h3 class="font-blue-sharp">
                                                    <span data-counter="counterup" data-value="<?php echo $reject[0]->reject; ?>"><?php echo $reject[0]->reject; ?></span>
                                                </h3>
                                                <small>Reject Request</small>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="dashboard-stat2 ">
                                        <div class="display">
                                            <div class="number">
                                                <h3 class="font-purple-soft">
                                                    <span data-counter="counterup" data-value="<?php echo $feedback[0]->feedback; ?>"><?php echo $feedback[0]->feedback; ?></span>
                                                </h3>
                                                <small>Feedback Request</small>
                                            </div>

                                        </div>

                                    </div>
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
</div>
<?php
include 'footer.php'
?>
