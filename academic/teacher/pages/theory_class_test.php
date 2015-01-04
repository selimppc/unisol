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
            <h2 class="page-header">Class Test :: Teacher</h2>
            <div class="row">
                <div class="col-md-12">
                    <!-- Custom Tabs -->
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab">Class Test(Manual)  </a></li>
                            <li><a href="#tab_2" data-toggle="tab">Class Test (Online)</a></li>

                            <li class="pull-right" class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-gear"></i>&nbsp;</a>
                                <ul class="dropdown-menu">
                                    <li role="presentation" data-toggle="modal" data-target="#addClass"><a role="menuitem" tabindex="-1" href="#"> Add Class Test </a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <button class="pull-right btn btn-success btn-sm"  data-toggle="modal" data-target="#addClassTest" >
                                    Add New Result
                                </button><br>
                                <b>&nbsp;</b>

                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th> Class Test </th>
                                            <th> Topics CT-1 </th>
                                            <th> Topics CT-2</th>
                                            <th> Student Name </th>
                                            <th> Student ID </th>
                                            <th> Marks of CT-1 </th>
                                            <th> Marks of CT-2 </th>
                                            <th> Average Mark </th>
                                            <th> Action </th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td> Algorithm </td>
                                                <td> Graph Algorithm, Sequence Algorithms, Search   </td>
                                                <td> Cryptography, Distributed systems algorithms   </td>
                                                <td> Ratna Akter </td>
                                                <td> 011142093 </td>
                                                <td> 18 </td>
                                                <td> 16 </td>

                                                <td> 17 </td>
                                                <td width="120">
                                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                        View
                                                    </button>
                                                    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#addClassTest">
                                                        Edit
                                                    </button>
                                                    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> Numerical Methods </td>
                                                <td>Basic Numerical Concepts </td>
                                                <td> Shofiq Reza </td>
                                                <td> NM004</td>
                                                <td> 14 </td>
                                                <td> 10 </td>
                                                <td width="120">
                                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                        View
                                                    </button>
                                                    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#addClassTest">
                                                        Edit
                                                    </button>
                                                    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> Numerical Methods </td>
                                                <td>Basic Numerical Concepts </td>
                                                <td> Shofiq Reza </td>
                                                <td> NM004</td>
                                                <td> 14 </td>
                                                <td> 10 </td>
                                                <td width="120">
                                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                        View
                                                    </button>
                                                    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#addClassTest">
                                                        Edit
                                                    </button>
                                                    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> Numerical Methods </td>
                                                <td>Basic Numerical Concepts </td>
                                                <td> Shofiq Reza </td>
                                                <td> NM004</td>
                                                <td> 14 </td>
                                                <td> 10 </td>
                                                <td width="120">
                                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                        View
                                                    </button>
                                                    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#addClassTest">
                                                        Edit
                                                    </button>
                                                    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td> Digital Signal Processing </td>
                                                <td>Signal Processing </td>
                                                <td> Samia Jahan </td>
                                                <td> DG004</td>
                                                <td> 15</td>
                                                <td> 13</td>
                                                <td width="120">
                                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                        View
                                                    </button>
                                                    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#addClassTest">
                                                        Edit
                                                    </button>
                                                    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td> Image Processing </td>
                                                <td>Basic Signal Processing </td>
                                                <td>  Shajahan Kabir</td>
                                                <td> DI004</td>
                                                <td> 15</td>
                                                <td> 12</td>
                                                <td width="120">
                                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                        View
                                                    </button>
                                                    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#addClassTest">
                                                        Edit
                                                    </button>
                                                    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Data Structure </td>
                                                <td>Data Analysis </td>
                                                <td> Kabir Ahmed</td>
                                                <td> DS004</td>
                                                <td> 15</td>
                                                <td> 10</td>
                                                <td width="120">
                                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                        View
                                                    </button>
                                                    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#addClassTest">
                                                        Edit
                                                    </button>
                                                    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Algorithms </td>
                                                <td> Algorithms theory</td>
                                                <td>Rafiq Ahmed</td>
                                                <td> AI004</td>
                                                <td> 16</td>
                                                <td> 16</td>
                                                <td width="120">
                                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                        View
                                                    </button>
                                                    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#addClassTest">
                                                        Edit
                                                    </button>
                                                    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Numerical Analysis</td>
                                                <td> Numerical Rules</td>
                                                <td> Samia Jahan </td>
                                                <td> NM004</td>
                                                <td> 14</td>
                                                <td> 11</td>
                                                <td width="120">
                                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                        View
                                                    </button>
                                                    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#addClassTest">
                                                        Edit
                                                    </button>
                                                    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td> Digital Signal Processing </td>
                                                <td>Signal Processing </td>
                                                <td> Samia Jahan </td>
                                                <td> DG004</td>
                                                <td> 15</td>
                                                <td> 13</td>
                                                <td width="120">
                                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                        View
                                                    </button>
                                                    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#addClassTest">
                                                        Edit
                                                    </button>
                                                    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td> Image Processing </td>
                                                <td>Basic Signal Processing </td>
                                                <td>  Shajahan Kabir</td>
                                                <td> DI004</td>
                                                <td> 15</td>
                                                <td> 12</td>
                                                <td width="120">
                                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                        View
                                                    </button>
                                                    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#addClassTest">
                                                        Edit
                                                    </button>
                                                    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Data Structure </td>
                                                <td>Data Analysis </td>
                                                <td> Kabir Ahmed</td>
                                                <td> DS004</td>
                                                <td> 15</td>
                                                <td> 10</td>
                                                <td width="120">
                                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                        View
                                                    </button>
                                                    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#addClassTest">
                                                        Edit
                                                    </button>
                                                    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td>Algorithms </td>
                                                <td> Algorithms theory</td>
                                                <td>Rafiq Ahmed</td>
                                                <td> AI004</td>
                                                <td> 16</td>
                                                <td> 16</td>
                                                <td width="120">
                                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                        View
                                                    </button>
                                                    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#addClassTest">
                                                        Edit
                                                    </button>
                                                    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Numerical Analysis</td>
                                                <td> Numerical Rules</td>
                                                <td> Samia Jahan </td>
                                                <td> NM004</td>
                                                <td> 14</td>
                                                <td> 11</td>
                                                <td width="120">
                                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                        View
                                                    </button>
                                                    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#addClassTest">
                                                        Edit
                                                    </button>
                                                    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td> Digital Signal Processing </td>
                                                <td>Signal Processing </td>
                                                <td> Samia Jahan </td>
                                                <td> DG004</td>
                                                <td> 15</td>
                                                <td> 13</td>
                                                <td width="120">
                                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                        View
                                                    </button>
                                                    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#addClassTest">
                                                        Edit
                                                    </button>
                                                    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td> Image Processing </td>
                                                <td>Basic Signal Processing </td>
                                                <td>  Shajahan Kabir</td>
                                                <td> DI004</td>
                                                <td> 15</td>
                                                <td> 12</td>
                                                <td width="120">
                                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                        View
                                                    </button>
                                                    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#addClassTest">
                                                        Edit
                                                    </button>
                                                    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td>Data Structure </td>
                                                <td>Data Analysis </td>
                                                <td> Kabir Ahmed</td>
                                                <td> DS004</td>
                                                <td> 15</td>
                                                <td> 10</td>
                                                <td width="120">
                                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                        View
                                                    </button>
                                                    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#addClassTest">
                                                        Edit
                                                    </button>
                                                    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td>Algorithms </td>
                                                <td> Algorithms theory</td>
                                                <td>Rafiq Ahmed</td>
                                                <td> AI004</td>
                                                <td> 16</td>
                                                <td> 16</td>
                                                <td width="120">
                                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                        View
                                                    </button>
                                                    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#addClassTest">
                                                        Edit
                                                    </button>
                                                    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Numerical Analysis</td>
                                                <td> Numerical Rules</td>
                                                <td> Samia Jahan </td>
                                                <td> NM004</td>
                                                <td> 14</td>
                                                <td> 11</td>
                                                <td width="120">
                                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                        View
                                                    </button>
                                                    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#addClassTest">
                                                        Edit
                                                    </button>
                                                    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td> Structural Programing Language </td>
                                                <td> Array, String, Pointer, List </td>
                                                <td> If/Else, Flow Chart, Swiss Case  </td>
                                                <td> Selim Reza </td>
                                                <td> 011143125 </td>
                                                <td> 19 </td>
                                                <td> 17 </td>
                                                <td> 18 </td>
                                                <td width="120">
                                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                        View
                                                    </button>
                                                    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#addClassTest">
                                                        Edit
                                                    </button>
                                                    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td> Data Structure </td>
                                                <td> Data types, Linear data structures, Trees </td>
                                                <td> Queue, Deque, Stack, String, Tree, Graph </td>
                                                <td> Tanvir jahan </td>
                                                <td> 011152215 </td>
                                                <td> 16 </td>
                                                <td> 18 </td>
                                                <td> 17 </td>
                                                <td width="120">
                                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                        View
                                                    </button>
                                                    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#addClassTest">
                                                        Edit
                                                    </button>
                                                    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td> Operating System </td>
                                                <td> Processes and system calls, Processes and threads, Scheduling </td>
                                                <td> Resources and deadlocks, File systems , Network programming (TCP/IP stack and sockets), Distributed File Systems   </td>
                                                <td> Shafiqul Haque</td>
                                                <td> 011143135 </td>
                                                <td> 19 </td>
                                                <td> 18 </td>
                                                <td> 18.5 </td>
                                                <td width="120">
                                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                        View
                                                    </button>
                                                    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#addClassTest">
                                                        Edit
                                                    </button>
                                                    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>

                                        </tbody>

                                    </table>
                                </div><!-- /.box -->
                            </div><!-- /.tab-pane -->

                            <div class="tab-pane" id="tab_2">
                                <!-- START CUSTOM TABS -->
                                <h2 class="page-header">&nbsp;</h2>
                                <div class="row">
                                <div class="col-md-12">
                                <!-- Custom Tabs -->
                                <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li><a href="#tab_3" data-toggle="tab"> Question Papers  </a></li>
                                    <li><a href="#tab_4" data-toggle="tab">Evaluation</a></li>

                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_3">
                                        <button class="pull-right btn btn-success btn-sm"  data-toggle="modal" data-target="#addQuestionPaper" >
                                            Add Question Paper
                                        </button><br>

                                        <b>Question:</b>

                                        <div class="box-body table-responsive">
                                            <table id="example3" class="table table-bordered table-striped">
                                                <thead>
                                                <tr>
                                                    <th>Subject</th>
                                                    <th>Type</th>
                                                    <th>Questions</th>
                                                    <th>Options</th>
                                                    <th>Answer</th>
                                                    <th>Comments</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                    <tr>
                                                        <td> Data Structure </td>
                                                        <td> Descriptive </td>
                                                        <td> What are the different kind of Data types? </td>
                                                        <td> N/A </td>
                                                        <td> N/A </td>
                                                        <td> Answer maybe different from different students. </td>
                                                        <td> open </td>
                                                        <td>
                                                            <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                                View
                                                            </button>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td> Algorithm </td>
                                                        <td> MCQ </td>
                                                        <td> The memory address of fifth element of an array can be calculated by the formula is : </td>
                                                        <td> A. LOC(Array[5]=Base(Array)+w(5-lower bound), where w is the number of words per memory cell for the array <br>
                                                             B. LOC(Array[5])=Base(Array[5])+(5-lower bound), where w is the number of words per memory cell for the array <br>
                                                             C. LOC(Array[5])=Base(Array[4])+(5-Upper bound), where w is the number of words per memory cell for the array <br>
                                                             D. None of above  </td>
                                                        <td> A. LOC(Array[5]=Base(Array)+w(5-lower bound), where w is the number of words per memory cell for the array </td>
                                                        <td> Only one Option </td>
                                                        <td> open </td>
                                                        <td>
                                                            <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                                View
                                                            </button>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td> Operating System </td>
                                                        <td> MCQ </td>
                                                        <td> Process is? </td>
                                                        <td> A. program in High level language kept on disk <br>
                                                             B.	contents of main memory <br>
                                                             C.	a program in execution <br>
                                                             D.	a job in secondary memory <br>
                                                             E.	None of the above </td>
                                                        <td> C. a program in execution </td>
                                                        <td> Only One Answer </td>
                                                        <td> open </td>
                                                        <td>
                                                            <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                                View
                                                            </button>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td> Data-Base Management System </td>
                                                        <td> MCQ </td>
                                                        <td> Database is a collection of _______ </td>
                                                        <td> 1.Program, 2.Data ,3.Modules ,4.None of These  </td>
                                                        <td> 2.Data </td>
                                                        <td> comments </td>
                                                        <td> open </td>
                                                        <td>
                                                            <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                                View
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </tbody>

                                            </table>
                                        </div><!-- /.box -->
                                    </div><!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_4">

                                        <div class="box-body table-responsive">
                                            <table id="example4" class="table table-bordered table-striped">
                                                <thead>
                                                <tr>
                                                    <th> Subject </th>
                                                    <th> Type </th>
                                                    <th> Questions </th>
                                                    <th> Options </th>
                                                    <th> Answer </th>
                                                    <th> Number </th>
                                                    <th> Action </th>
                                                </tr>
                                                </thead>
                                                <tbody>



                                                    <tr>
                                                        <td> Data Structure </td>
                                                        <td> Descriptive </td>
                                                        <td> What are the different kind of Data types? </td>
                                                        <td> N/A </td>
                                                        <td> N/A </td>
                                                        <td> 5 </td>

                                                        <td>
                                                            <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                                View
                                                            </button>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td> Algorithm </td>
                                                        <td> MCQ </td>
                                                        <td> The memory address of fifth element of an array can be calculated by the formula is: </td>
                                                        <td> A. LOC(Array[5]=Base(Array)+w(5-lower bound), where w is the number of words per memory cell for the array <br>
                                                            B. LOC(Array[5])=Base(Array[5])+(5-lower bound), where w is the number of words per memory cell for the array <br>
                                                            C. LOC(Array[5])=Base(Array[4])+(5-Upper bound), where w is the number of words per memory cell for the array <br>
                                                            D. None of above  </td>
                                                        <td> A. LOC(Array[5]=Base(Array)+w(5-lower bound), where w is the number of words per memory cell for the array </td>
                                                        <td> 5 </td>
                                                        <td>
                                                            <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                                View
                                                            </button>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td> Operating System </td>
                                                        <td> MCQ </td>
                                                        <td> Process is? </td>
                                                        <td> A. program in High level language kept on disk <br>
                                                            B.	contents of main memory <br>
                                                            C.	a program in execution <br>
                                                            D.	a job in secondary memory <br>
                                                            E.	None of the above </td>
                                                        <td> C. a program in execution </td>
                                                        <td> 5 </td>
                                                        <td>
                                                            <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                                View
                                                            </button>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td> Data-Base Management System </td>
                                                        <td> MCQ </td>
                                                        <td> Database is a collection of _______ </td>
                                                        <td> 1.Program, 2.Data ,3.Modules ,4.None of These  </td>
                                                        <td> 2.Data </td>
                                                        <td> 5 </td>
                                                        <td>
                                                            <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                                View
                                                            </button>
                                                        </td>
                                                    </tr>

                                                </tbody>

                                            </table>
                                        </div><!-- /.box -->
                                    </div><!-- /.tab-pane -->
                                </div><!-- /.tab-content -->
                                </div><!-- nav-tabs-custom -->
                                </div><!-- /.col -->


                                </div> <!-- /.row -->
                                <!-- END CUSTOM TABS -->
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

<?php include('modals/_modal_theory_class_test.php') ?>
<?php include('../_footer.php'); ?>
