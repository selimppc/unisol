<?php include('../_header.php'); ?>

<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->

    <?php include('../_sidebar.php'); ?>


    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">


            <!-- START CUSTOM TABS -->
            <h2 class="page-header">Research Management</h2>
            <div class="row">
                <div class="col-md-12">
                    <!-- Custom Tabs -->
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab">Review  </a></li>
                            <li><a href="#tab_2" data-toggle="tab">Publication</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    Settings  <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#"> Add Category </a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#"> Add Publication </a></li>
                                </ul>
                            </li>
                            <li class="pull-right" class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-gear"></i>&nbsp;</a>
                                <ul class="dropdown-menu">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#"> Add Category </a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#"> Add Publication </a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <button class="pull-right btn btn-success btn-sm"  data-toggle="modal" data-target="#addResearchReview" >
                                    Add Review
                                </button><br>

                                <b>Review:</b>

                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Topics</th>
                                                <th>Documents</th>
                                                <th>Resources</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td> Renewal: The Ultimate Gift </td>
                                                <td> Consistently ranked the most highly-cited and pertinent publications in the field </td>
                                                <td> Science  </td>
                                                <td>
                                                    <span data-toggle="modal" data-target="#viewDetails">
                                                        <img src="../img/doc.png" width="50px" style="cursor: pointer">
                                                    </span>
                                                </td>
                                                <td> IEEE links </td>
                                                <td> Approved </td>
                                                <td>
                                                    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                        View
                                                    </button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td> The Science of Addiction </td>
                                                <td> How Science Has Revolutionized the Understanding of Drug Addiction </td>
                                                <td> Science  </td>
                                                <td>
                                                    <span data-toggle="modal" data-target="#viewDetails">
                                                        <img src="../img/doc.png" width="50px" style="cursor: pointer">
                                                    </span>
                                                </td>
                                                <td> http://www.drugabuse.gov/ </td>
                                                <td> Open </td>
                                                <td>
                                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#approvalModal">
                                                        Approve
                                                    </button>

                                                    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                        View
                                                    </button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td> Drug Abuse and Addiction </td>
                                                <td> Addiction is defined as a chronic, relapsing brain disease that is characterized by compulsive drug seeking and use, despite harmful consequences. </td>
                                                <td> Science  </td>
                                                <td>
                                                    <span data-toggle="modal" data-target="#viewDetails">
                                                        <img src="../img/doc.png" width="50px" style="cursor: pointer">
                                                    </span>
                                                </td>
                                                <td> publications/drugs-brains-behavior-science-addiction </td>
                                                <td> Open </td>
                                                <td>
                                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#approvalModal">
                                                        Approve
                                                    </button>

                                                    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                        View
                                                    </button>
                                                </td>
                                            </tr>

                                        </tbody>

                                    </table>
                                </div><!-- /.box -->
                            </div><!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_2">
                                The European languages are members of the same family. Their separate existence is a myth.
                                For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
                                in their grammar, their pronunciation and their most common words. Everyone realizes why a
                                new common language would be desirable: one could refuse to pay expensive translators. To
                                achieve this, it would be necessary to have uniform grammar, pronunciation and more common
                                words. If several languages coalesce, the grammar of the resulting language is more simple
                                and regular than that of the individual languages.
                            </div><!-- /.tab-pane -->
                        </div><!-- /.tab-content -->
                    </div><!-- nav-tabs-custom -->
                </div><!-- /.col -->


            </div> <!-- /.row -->
            <!-- END CUSTOM TABS -->



        </section><!-- /.content -->
    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->

<?php include('../_modal.php'); ?>

<?php include('../_footer.php'); ?>
