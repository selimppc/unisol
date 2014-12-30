<?php include('../_header.php'); ?>

<div class="wrapper row-offcanvas row-offcanvas-left">
<!-- Left side column. contains the logo and sidebar -->

<?php include('../_sidebar.php'); ?>

<style type="text/css">

    .button-centre {
        text-align: center;
    }
</style>



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
<h1>Welcome to our Examiner control panel</h1>


<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-header">
    <h3 class="box-title">Question preparation </h3>

    <div class="box-tools">
        <div class="input-group">
            <input type="text" name="table_search" class="form-control input-sm pull-right"
                   style="width: 150px;" placeholder="Search"/>

            <div class="input-group-btn">
                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </div>
</div>



            <div class="button-centre">
                <button type="button" disabled class="btn btn-success" >Create Question paper</button>
            </div>


<br><br><br><br><br>


<div class="row">
    <div class="col-xs-12">

            <div class="box-header">
                <h3 class="box-title">Taking Exam</h3>





            </div>
            <!-- /.box-header -->
        <div class="jumbotron table-responsive no-padding button-centre">

              <h3>Your Exam Centre is Dhaka University and your exam is on 12/12/12 on 3 pm. </h3>
              <h3>Please Contact with authority for details information </h3>
        </div>





            <br><br><br><br>



                        <div class="box-header">
                            <h3 class="box-title">Taking Exam</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">

                            <div class="jumbotron text-center">
                                <h2> Mid/Final Examination</h2>

                                <div class="">
                                    <label for="title">Subject Name</label>
                                    <input class="" id="title" placeholder="Subject Name">
                                </div>

                                <br><br>

                                <div class="">
                                    <label for="title">Obtain Marks</label>
                                    <input class="" id="title" placeholder="Marks">
                                </div>
                            </div>

                            <div class="button-centre">
                                <button type="button"  class="btn btn-success" >Submit</button>
                            </div>
                            </div>






                        </div>
                        <!-- /.box-body -->



</section>
<!-- /.content -->
</aside>
<!-- /.right-side -->
</div><!-- ./wrapper -->


<?php include('../_footer.php'); ?>

<script>

    $('#tooltip1').tooltip('options')
</script>