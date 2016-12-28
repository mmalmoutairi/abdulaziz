<?php
include 'header.php';
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
                                <a href="table.php">Requset management</a>
                                <i class="fa fa-circle"></i>
                            </li>

                        </ul>
                        <!-- END PAGE BREADCRUMBS -->
                        <!-- BEGIN PAGE CONTENT INNER -->
                        <div class="page-content-inner">

                            <div class="row">
                                <div class="col-md-12">
                                    <!-- BEGIN SAMPLE TABLE PORTLET-->
                                    <div class="portlet box green">
                                        <div class="portlet-title">

                                            <div class="caption">
                                                <i class="fa fa-comments"></i>Requset </div>
                                            <div class="tools">
                                                <a href="javascript:;" class="collapse"> </a>
                                                <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                                <a href="javascript:;" class="reload"> </a>
                                                <a href="javascript:;" class="remove"> </a>
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="table-scrollable">
                                                <table class="table table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th> # </th>
                                                            <th>  nomber request   </th>

                                                            <th>  Status   </th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                             <td> 1 </td>
                                                             <td>43251</td>

                                                              <td>  <span class="label label-sm label-success"> acceptable </span> </td>

                                                        </tr>
                                                        <tr>
                                                            <td> 2</td>
                                                            <td>4653</td>

                                                            <td> <span class="label label-sm label-danger"> unacceptable </span> </td>


                                                        </tr>
                                                        <tr>
                                                            <td> 3</td>
                                                            <td>4653</td>

                                                            <td> <span class="label label-sm label-warning"> Has a problem </span> </td>


                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
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
</div>

<?php include 'footer.php' ?>
