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
                        <h1>Admin User management

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
                            <a href="#">Employee Information</a>
                            <i class="fa fa-circle"></i>
                        </li>

                    </ul>
                    <!-- END PAGE BREADCRUMBS -->
                    <!-- BEGIN PAGE CONTENT INNER -->
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
                                <form name="myForm" onsubmit="return validateForm();" class="register-form" action="controller/addEmployee.php" method="post">

                                    <div class="form-group">
                                        <label class="control-label visible-ie8 visible-ie9">First Name </label>
                                        <input class="form-control placeholder-no-fix" type="text" placeholder="First Name " name="first_name" required />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label visible-ie8 visible-ie9">Middle Name</label>
                                        <input class="form-control placeholder-no-fix" type="text" placeholder="Middle Name" name="middle_name" required/> </div>
                                    <div class="form-group">
                                        <label class="control-label visible-ie8 visible-ie9">Third Name</label>
                                        <input class="form-control placeholder-no-fix" type="text" placeholder="Third Name" name="third_name" required /> </div>
                                    <div class="form-group">
                                        <label class="control-label visible-ie8 visible-ie9">Last Name</label>
                                        <input class="form-control placeholder-no-fix" type="text" placeholder="Last Name" name="last_name" required /> </div>
                                    <div class="form-group">
                                        <label class="control-label visible-ie8 visible-ie9">National ID</label>
                                        <span id="errNIN" class="help-block help-block-error"></span>
                                        <input class="form-control placeholder-no-fix" minlength="10" maxlength="10" type="text" placeholder="National ID" name="national_id" required /> </div>
                                    <div class="form-group">
                                        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                                        <label class="control-label visible-ie8 visible-ie9">Email</label>
                                        <input class="form-control placeholder-no-fix" type="email" placeholder="Email" name="email" required /> </div>
                                    <div class="form-group">
                                        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                                        <label class="control-label visible-ie8 visible-ie9">Password</label>
                                        <input class="form-control placeholder-no-fix" type="text" placeholder="Password" minlength="3" maxlength="25" name="password" required /> </div>


                                    <div class="form-actions">
                                        <button type="submit" id="register-submit-btn" name="addEmployee" class="btn btn-success uppercase pull-left">ADD</button>
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
<script type="text/javascript">

    function validateForm(){
      document.getElementById("errNIN").innerHTML = "";

      var national_id   = document.forms["myForm"]["national_id"].value.trim();
      if(isNaN(national_id)){
        document.getElementById("errNIN").innerHTML = "Please Enter Only Number!";
        document.forms["myForm"]["national_id"].focus();
        return false;
      }

      return true;
    }

</script>
<?php
include 'footer.php'
?>
