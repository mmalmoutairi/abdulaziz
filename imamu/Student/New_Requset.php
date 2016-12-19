<?php
session_start();
if (isset($_SESSION['user'])) {
    if ($_SESSION['role'] != 2) {
        header("Location: ../login.php", false);
    }
} else {
    header("Location: ../login.php", false);
}


include '../db/db.php';
$query = "SELECT * FROM `semester` WHERE isActive = 1 ORDER BY id DESC limit 1";
$result = @mysqli_query($connection, $query);
$count = mysqli_num_rows($result);
$regestration = false;
$courses = array();
$allCourse = array();
$sumCourse = array();
$section = array();
$error = false;
if ($count > 0) {

  $regestration = true;
  $query = "select c.* from course c where c.id NOT in (select co.course_id from completed co where co.student_id = ".$_SESSION['user']." ) AND c.chose NOT IN (select co.chose from completed co where co.chose in (select d.chose from course d where d.chose != 0 ))";
  $result = @mysqli_query($connection, $query);
  $count = mysqli_num_rows($result);
  if($count > 0){
    for($i = 0 ; $i < $count ; $i++){
      $allCourse[@count($allCourse)] = mysqli_fetch_object($result);
    }


    foreach ($allCourse as $key => $value) {
      $sumCourse = array();
      if($value->chose == 0){
        $query = "SELECT * FROM prerequisite p WHERE p.course_id = ".$value->id ;
        $result = @mysqli_query($connection, $query);
        $count1 = mysqli_num_rows($result);
        if($count1 == 0){
          $courses[@count($courses)] = $value;
        }else{
          $query = "select * from completed where course_id = ".$value->id;
          $result = @mysqli_query($connection, $query);
          $count2 = mysqli_num_rows($result);
          if($count2 > 0){
            $courses[@count($courses)] = $value;
          }
        }
      }else{
        $query = "SELECT * FROM prerequisite p WHERE p.course_id = ".$value->id ;
        $result = @mysqli_query($connection, $query);
        $count1 = mysqli_num_rows($result);
        if($count1 == 0){
          $courses[@count($courses)] = $value;
        }else{
          $arrayC = array();
          for($i = 0 ; $i < $count1 ; $i++){
            $arrayC[@count($arrayC)] = mysqli_fetch_object($result);
          }
          foreach ($arrayC as $key => $data) {
            $query = "select * from course c where c.group = ".$data->groups ;
            $result = @mysqli_query($connection, $query);
            $courseCount = mysqli_num_rows($result);
            $query = "select * from completed c where c.groups = ".$data->groups." AND student_id = 1";
            $result = @mysqli_query($connection, $query);
            $courseGroup = mysqli_num_rows($result);
            if($courseCount == $courseGroup){
              $courses[@count($courses)] = $value;
            }
          }

        }
      }
    }
  }else{
    $error = "There are no courses avilable for registration";
  }
}else{
  $error = "There are no semester is open for registration";
}
//

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Requset</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #3 for bootstrap form wizard demos using Twitter Bootstrap Wizard Plugin" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="../assets/global/plugins/icheck/skins/all.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="../assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="../assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="../assets/layouts/layout3/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/layouts/layout3/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="../assets/layouts/layout3/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->


        <body class="page-container-bg-solid">
            <div class="page-wrapper">
                <div class="page-wrapper-row">
                    <div class="page-wrapper-top">
                        <!-- BEGIN HEADER -->
                        <div class="page-header">
                            <!-- BEGIN HEADER TOP -->
                            <div class="page-header-top">
                                <div class="container">
                                    <!-- BEGIN LOGO -->
                                    <div class="page-logo">
                                        <a href="index.html">
                                            <img src="../assets/layouts/layout3/img/logo-default.jpg" alt="logo" class="logo-default">
                                        </a>
                                    </div>
                                    <!-- END LOGO -->
                                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                                    <a href="javascript:;" class="menu-toggler"></a>
                                    <!-- END RESPONSIVE MENU TOGGLER -->
                                    <!-- BEGIN TOP NAVIGATION MENU -->
                                    <!-- END TOP NAVIGATION MENU -->
                                </div>
                            </div>
                            <!-- END HEADER TOP -->
                            <!-- BEGIN HEADER MENU -->
                            <div class="page-header-menu">
                                <div class="container">
                                    <!-- الهيدر -->
                                    <div class="hor-menu  ">
                                        <ul class="nav navbar-nav">
                                            <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown active">
                                                <a href="Index.html"> Dashboard
                                                    <span class="arrow"></span>
                                                </a>

                                            </li>


                                          <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                                                <a href="javascript:;"> Requset
                                                    <span class="arrow"></span>
                                                </a>
                                                <ul class="dropdown-menu pull-left">
                                                     <li aria-haspopup="true" class=" ">
                                                        <a href="New_Requset.html" class="nav-link  ">  New Requset </a>
                                                    </li>
                                                    <li aria-haspopup="true" class=" ">
                                                        <a href="request.html" class="nav-link  ">  Requset </a>
                                                    </li>


                                                </ul>
                                            </li>
                                              <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown active">
                                                <a href="Grude.html"> Grude
                                                    <span class="arrow"></span>
                                                </a>

                                            </li>


                                        </ul>
                                    </div>


                                    <!-- END MEGA MENU -->
                                </div>
                            </div>
                            <!-- END HEADER MENU -->
                        </div>
                        <!-- END HEADER -->
                    </div>
                </div>
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
                                            <h1>DR

                                            </h1>
                                        </div>
                                        <!-- END PAGE TITLE -->
                                        <!-- BEGIN PAGE TOOLBAR -->

                                        <!-- END PAGE TOOLBAR -->
                                    </div>
                                </div>
                                <!-- END PAGE HEAD-->
                                <!-- BEGIN PAGE CONTENT BODY -->
                         <div class="page-container">

                            <!-- BEGIN CONTENT -->

                                <!-- BEGIN CONTENT BODY -->
                                <!-- BEGIN PAGE HEAD-->
                                <div class="page-head">
                                    <div class="container">
                                        <!-- BEGIN PAGE TITLE -->

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
                                  <div class="row">
                                      <div class="col-md-12">
                                          <div class="portlet light ">
                                              <div class="portlet-title tabbable-line">
                                                  <div class="caption">
                                                      <i class="icon-globe font-green"></i>
                                                      <span class="caption-subject font-green bold uppercase">New Request</span>
                                                  </div>
                                              </div>
                                              <?php
                                                if($error == false){
                                                  ?>
                                                  <div class="portlet-body form">
                                                      <div class="tab-content">
                                                          <div class="tab-pane active" id="portlet_tab_1_1">
                                                              <div class="skin skin-minimal">
                                                                  <form role="form" method="post" action="test.php">
                                                                      <div class="form-body">
                                                                         <?php
                                                                             foreach ($courses as $key => $value) {
                                                                               if($value->group == 1){
                                                                                 $query = "select * from section where course_id = ".$value->id;
                                                                                 $result = @mysqli_query($connection, $query);
                                                                                 $count = mysqli_num_rows($result);
                                                                                 $array= array();
                                                                                 for($i = 0 ; $i < $count ; $i++){
                                                                                   $array[@count($array)] = mysqli_fetch_object($result);
                                                                                 }
                                                                                 ?>
                                                                                 <div class="form-group">
                                                                                     <label><?php echo $value->name; ?></label>
                                                                                     <div class="input-group">
                                                                                         <div class="icheck-list">
                                                                                           <?php
                                                                                           foreach ($array as $key => $data) {
                                                                                             ?>
                                                                                             <label>
                                                                                                 <input type="radio" value="<?php echo $data->id ?>" name="<?php echo "Course".$value->id; ?>" class="icheck"> <?php echo "Section : ".$data->section_number; ?></label>
                                                                                             <?php
                                                                                           }
                                                                                            ?>
                                                                                         </div>
                                                                                     </div>
                                                                                 </div>
                                                                                 <?php
                                                                               }
                                                                             }



                                                                             $checkgroup1 = false;
                                                                             $query = "select s.id , s.section_number , c.name from section s , course c where course_id in (";
                                                                             foreach ($courses as $key => $c) {
                                                                               if($c->chose == 1){
                                                                                 $checkgroup1 = true;
                                                                                 $query = $query.$c->id.",";
                                                                               }
                                                                             }
                                                                             if($checkgroup1){
                                                                               $query = substr_replace($query, " ) AND s.course_id = c.id" , -1);
                                                                               die($query);
                                                                               $result = @mysqli_query($connection, $query);
                                                                               $count = mysqli_num_rows($result);
                                                                               $array= array();
                                                                               for($i = 0 ; $i < $count ; $i++){
                                                                                 $array[@count($array)] = mysqli_fetch_object($result);
                                                                               }
                                                                               ?>
                                                                               <div class="form-group">
                                                                                   <label>Choses  1</label>
                                                                                   <div class="input-group">
                                                                                       <div class="icheck-list">
                                                                                         <?php
                                                                                         foreach ($array as $key => $g) {
                                                                                           ?>
                                                                                           <label>
                                                                                               <input type="radio" value="<?php echo $g->id ?>" name="choses1" class="icheck"> <?php echo "Course : ".$g->name." , Section : ".$g->section_number; ?></label>
                                                                                           <?php
                                                                                         }
                                                                                          ?>
                                                                                       </div>
                                                                                   </div>
                                                                               </div>
                                                                               <?php
                                                                             }

                                                                             $checkgroup2 = false;
                                                                             $query = "select s.id , s.section_number , c.name from section s , course c where course_id in (";
                                                                             foreach ($courses as $key => $c) {
                                                                               if($c->chose == 2){
                                                                                 $checkgroup2 = true;
                                                                                 $query = $query.$c->id.",";
                                                                               }
                                                                             }
                                                                             if($checkgroup2){
                                                                               $query = substr_replace($query, " ) AND s.course_id = c.id" , -1);
                                                                               $result = @mysqli_query($connection, $query);
                                                                               $count = mysqli_num_rows($result);
                                                                               $array= array();
                                                                               for($i = 0 ; $i < $count ; $i++){
                                                                                 $array[@count($array)] = mysqli_fetch_object($result);
                                                                               }
                                                                               ?>
                                                                               <div class="form-group">
                                                                                   <label>Choses 2</label>
                                                                                   <div class="input-group">
                                                                                       <div class="icheck-list">
                                                                                         <?php
                                                                                         foreach ($array as $key => $g) {
                                                                                           ?>
                                                                                           <label>
                                                                                               <input type="radio" value="<?php echo $g->id ?>" name="choses2" class="icheck"> <?php echo "Course : ".$g->name." , Section : ".$g->section_number; ?></label>
                                                                                           <?php
                                                                                         }
                                                                                          ?>
                                                                                       </div>
                                                                                   </div>
                                                                               </div>
                                                                               <?php
                                                                             }

                                                                             $checkgroup3 = false;
                                                                             $query = "select s.id , s.section_number , c.name from section s , course c where course_id in (";
                                                                             foreach ($courses as $key => $c) {
                                                                               if($c->chose == 3){
                                                                                 $checkgroup3 = true;
                                                                                 $query = $query.$c->id.",";
                                                                               }
                                                                             }
                                                                             if($checkgroup3){
                                                                               $query = substr_replace($query, " ) AND s.course_id = c.id" , -1);
                                                                               $result = @mysqli_query($connection, $query);
                                                                               $count = mysqli_num_rows($result);
                                                                               $array= array();
                                                                               for($i = 0 ; $i < $count ; $i++){
                                                                                 $array[@count($array)] = mysqli_fetch_object($result);
                                                                               }
                                                                               ?>
                                                                               <div class="form-group">
                                                                                   <label>Group 3</label>
                                                                                   <div class="input-group">
                                                                                       <div class="icheck-list">
                                                                                         <?php
                                                                                         foreach ($array as $key => $g) {
                                                                                           ?>
                                                                                           <label>
                                                                                               <input type="radio" value="<?php echo $g->id ?>" name="chose3" class="icheck"> <?php echo "Course : ".$g->name." , Section : ".$g->section_number; ?></label>
                                                                                           <?php
                                                                                         }
                                                                                          ?>
                                                                                       </div>
                                                                                   </div>
                                                                               </div>
                                                                               <?php
                                                                             }


                                                                             $query = "select s.id , s.section_number , c.name from section s , course c where course_id in (";
                                                                             $checkgroup4 = false;
                                                                             foreach ($courses as $key => $c) {
                                                                               if($c->chose == 4){
                                                                                 $checkgroup4 = true;
                                                                                 $query = $query.$c->id.",";
                                                                               }
                                                                             }
                                                                             if($checkgroup4){
                                                                               $query = substr_replace($query, " ) AND s.course_id = c.id" , -1);
                                                                               $result = @mysqli_query($connection, $query);
                                                                               $count = mysqli_num_rows($result);
                                                                               $array= array();
                                                                               for($i = 0 ; $i < $count ; $i++){
                                                                                 $array[@count($array)] = mysqli_fetch_object($result);
                                                                               }
                                                                               ?>
                                                                               <div class="form-group">
                                                                                   <label>Group 4</label>
                                                                                   <div class="input-group">
                                                                                       <div class="icheck-list">
                                                                                         <?php
                                                                                         foreach ($array as $key => $g) {
                                                                                           ?>
                                                                                           <label>
                                                                                               <input type="radio" value="<?php echo $g->id ?>" name="chose4" class="icheck"> <?php echo "Course : ".$g->name." , Section : ".$g->section_number; ?></label>
                                                                                           <?php
                                                                                         }
                                                                                          ?>
                                                                                       </div>
                                                                                   </div>
                                                                               </div>
                                                                               <?php
                                                                             }

                                                                          ?>
                                                                      </div>
                                                                      <div class="form-actions">
                                                                          <button type="submit" class="btn green">Submit</button>
                                                                      </div>
                                                                  </form>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <?php
                                                }else{
                                                    ?>
                                                    <div class="alert alert-danger">
                                                        <strong>Alert !</strong> <?php echo $error; ?>
                                                    </div>
                                                    <?php
                                                }

                                              ?>
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
                  <!-- END PAGE CONTENT BODY -->
                  <!-- END CONTENT BODY -->
              </div>

          </div>
          <!-- END CONTAINER -->
      </div>
  </div>
  <div class="page-wrapper-row">
      <div class="page-wrapper-bottom">
          <!-- BEGIN FOOTER -->
          <!-- BEGIN PRE-FOOTER -->

          <!-- END PRE-FOOTER -->
          <!-- BEGIN INNER FOOTER -->
          <div class="page-footer">
              <div class="container"> 2017 &copy; Imamu
              </div>
          </div>
          <div class="scroll-to-top">
              <i class="icon-arrow-up"></i>
          </div>
          <!-- END INNER FOOTER -->
          <!-- END FOOTER -->
      </div>
  </div>
</div>
<!-- BEGIN QUICK NAV -->

<div class="quick-nav-overlay"></div>
        <!-- END FOOTER -->
        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="../assets/global/plugins/icheck/icheck.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="../assets/pages/scripts/form-icheck.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="../assets/layouts/layout3/scripts/layout.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/layout3/scripts/demo.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>
