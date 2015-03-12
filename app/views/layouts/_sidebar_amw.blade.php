<ul class="sidebar-menu">
    <li class="active">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-leaf" style="color: #09b021"></i>
            <span>Common</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-angle-double-right"></i> Common</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-book"style="color: #2aabd2"></i>
            <span>Academic</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a tabindex="-1" a href="{{URL::to('academic/amw/') }}"><i class="fa fa-location-arrow" style="color: #003399"></i>Mark Distribution Item</a></li>
            <li><a tabindex="-1" a href="{{URL::to('academic/amw/config/') }}"> <i class="fa fa-wrench" style="color: #24AA7A"></i>Course Config</a></li>

        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-download" style="color: #803a0f"></i>
            <span>Admission</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a tabindex="-1" a href="{{URL::to('amw/course_manage') }}"><i class="fa fa-crosshairs" style="color: #184f5d"></i> Course Management(Amw) </a></li>
            <li><a tabindex="-1" a href="{{URL::to('amw/degree_manage') }}"><i class="fa fa-flask" style="color: #db4509"></i> Degree Management(Amw) </a></li>
            <li><a tabindex="-1" a href="{{URL::to('admission_test/amw/index') }}"><i class="fa fa-thumbs-o-up" style="color: #1f7ee8"></i> Admission Test(Amw)</a></li>
            <li><a tabindex="-1" a href="{{ URL::to('admission_test/amw/mng_adm_test_subject') }}"><i class="fa fa-frown-o" style="color: #b12696"></i>Mng Admssn Tst Sbjct(Amw)</a></li>
            <li><a tabindex="-1" a href="{{ URL::to('admission_test/amw/adm-test-degree') }}"><i class="fa fa-bullhorn" style="color: #aa1c10"></i>Adm Test:Degree (Amw)</a></li>
            <li><a tabindex="-1" a href="{{ URL::to('admission_test/amw/adm-test-subject') }}"><i class="fa fa-bug" style="color: #914b09"></i>Adm Test:Subject (Amw)</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-pencil" style="color: #800080"></i>
            <span>Examination</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a tabindex="-1" href="{{  URL::to('examination/amw/examination') }}"><i class="fa fa-pencil-square" style="color: #0f8080"></i> Prepare Question Paper</a></li>
        </ul>
    </li>

</ul>