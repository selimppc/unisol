<?php include('../_header.php'); ?>

<div class="wrapper row-offcanvas row-offcanvas-left">
<!-- Left side column. contains the logo and sidebar -->

<?php include('../_sidebar.php'); ?>

<style>

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
<h1>Welcome to our Student Enrollment Pattttge</h1>


<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Course Details</h3>

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


<!-- /.box-header -->
<div class="box-body table-responsive no-padding">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Course Name</th>
            <th>Course Code</th>
            <th>Credit</th>
            <th>Per Credit Fee</th>
            <th>Total Amount</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Computer Architecture</td>
            <td>CSE-101</td>
            <td>3</td>
            <td>4500</td>
            <td>13500</td>

        </tr>
        <tr>
            <td>Computer Network</td>
            <td>CSE-003</td>
            <td>3</td>
            <td>4500</td>
            <td>13500</td>

        </tr>
        <tr>
            <td>Economics 2</td>
            <td>ECO-02</td>
            <td>3</td>
            <td>4500</td>
            <td>13500</td>

        </tr>
        <tr>
            <td>Physics 2</td>
            <td>PHY-02</td>
            <td>3</td>
            <td>4500</td>
            <td>13500</td>
        </tr>

        <tr>
            <td class="highrow"></td>
            <td class="highrow"></td>
            <td class="highrow"></td>
            <td class="highrow"><strong>Subtotal</strong></td>
            <td class="highrow">54000</td>
            <td class="highrow"></td>
        </tr>

        </tbody>
    </table>
</div>
<!-- /.box-body -->

<br><br><br><br><br>


<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Fees</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Enrolment Fee</th>
                        <th>Delay Charge</th>
                        <th>Library Charge</th>
                        <th>Lab Charge</th>
                        <th>Others</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>2000</td>
                        <td>0</td>
                        <td>33</td>
                        <td>500</td>
                        <td>500</td>
                        <td>3033</td>
                    </tr>
                    <tr>
                        <td>2000</td>
                        <td>0</td>
                        <td>0</td>
                        <td>500</td>
                        <td>0</td>
                        <td>2500</td>
                    </tr>
                    <tr>
                        <td>2000</td>
                        <td>0</td>
                        <td>12</td>
                        <td>500</td>
                        <td>250</td>
                        <td>2762</td>
                    </tr>
                    <tr>
                        <td>2000</td>
                        <td>0</td>
                        <td>55</td>
                        <td>500</td>
                        <td>500</td>
                        <td>3555</td>
                    </tr>

                    <tr>
                        <td class="highrow"></td>
                        <td class="highrow"></td>
                        <td class="highrow"></td>
                        <td class="highrow"></td>
                        <td class="highrow"><strong>Subtotal</strong></td>
                        <td class="highrow">11550</td>
                        <td class="highrow"></td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->


            <br><br><br><br>


            <div class="box-header">
                <h3 class="box-title">Payment Option</h3>

                <div class="box-tools">
                </div>
            </div>

            <!-- /.box-body2 -->
            <div class="box-body table-responsive no-padding">

                <label class="radio-inline">
                    <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Bank
                </label>

                <label class="radio-inline">
                    <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Bikash
                </label>

                <label class="radio-inline">
                    <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Mobile Banking
                </label>

                <label class="radio-inline">
                    <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Paypal
                </label>

                <label class="radio-inline">
                    <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> ATM / VISA Card
                </label>


            </div>
            <!-- /.box-body2 -->


        </div>
        <!-- /.box -->
    </div>
</div>

<div class="button-centre">
    <button type="button" class="btn btn-success">Submit</button>
</div>


</section>
<!-- /.content -->
</aside>
<!-- /.right-side -->
</div><!-- ./wrapper -->

<?php include('../_footer.php'); ?>
