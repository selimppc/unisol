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
            <h2 class="page-header">Extracurricular Activities management :: Student </h2>
            <div class="row">
                <div class="col-md-12">
                    <!-- Custom Tabs -->
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab">Extra-curricular  </a></li>

                            <li class="pull-right" class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-gear"></i>&nbsp;</a>
                                <ul class="dropdown-menu">
                                <!--  <li role="presentation" data-toggle="modal" data-target="#addCategory"><a role="menuitem" tabindex="-1" href="#"> Add Category </a></li> -->

                                </ul>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">

                                <b>Extra-curricular:</b>

                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Gender</th>
                                            <th>Rules</th>
                                            <th>Eligibility</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php for($i = 0; $i < 5; $i++){ ?>
                                            <tr>
                                                <td> Sport and fitness </td>
                                                <td> There are countless opportunities to join a University sport club </td>
                                                <td> Male  </td>
                                                <td> Fierce, competition is guaranteed through the intercollegiate 'Cuppers' </td>
                                                <td> Student </td>
                                                <td> Open </td>
                                                <td width="140">
                                                    <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                        View
                                                    </button>
                                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#participateModal">
                                                        Participate
                                                    </button>

                                                </td>
                                            </tr>

                                            <tr>
                                                <td> Drama </td>
                                                <td> Fry, John Cleese, Emma Thompson, Tilda Swinton, and Tom Hiddleston </td>
                                                <td> Female  </td>
                                                <td> clubs and societies </td>
                                                <td> Student </td>
                                                <td> Participate </td>
                                                <td>
                                                    <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                        View
                                                    </button>

                                                </td>
                                            </tr>

                                            <tr>
                                                <td> Volunteering </td>
                                                <td> The Office of External Affairs and Communications' Public Engagement team work closely  </td>
                                                <td> Female  </td>
                                                <td> volunteer </td>
                                                <td> Student </td>
                                                <td> Approved </td>
                                                <td>
                                                    <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                        View
                                                    </button>
                                                </td>
                                            </tr>

                                        <?php } ?>




                                        </tbody>

                                    </table>
                                </div><!-- /.box -->
                            </div><!-- /.tab-pane -->

                        </div><!-- /.tab-content -->
                    </div><!-- nav-tabs-custom -->
                </div><!-- /.col -->


            </div> <!-- /.row -->
            <!-- END CUSTOM TABS -->





        </section>
        <!-- /.content -->
    </aside>
    <!-- /.right-side -->
</div><!-- ./wrapper -->

<?php include('modals/_modal_extra_curricular.php'); ?>
<?php include('../_footer.php'); ?>
