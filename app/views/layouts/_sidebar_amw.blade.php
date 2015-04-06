<ul class="sidebar-menu">
    <li class="active">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-download" style="color: #803a0f"></i>
            <span>Admission</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li class="active"><a tabindex="-1" a href="{{ URL::to('admission/amw/degree') }}"></i><i class="fa fa-flask" style="color: #db4509"></i> Degree (Amw)</a></li>
            <li><a tabindex="-1" a href="{{ URL::to('admission/amw/admission-test-home') }}"></i><i class="fa fa-flask" style="color: #db4509"></i> Admission Test (Ex,Qp, QPE)</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-leaf" style="color: #09b021"></i>
            <span>Common</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            {{--<li><a href="#"><i class="fa fa-angle-double-right"></i> Common</a></li>--}}
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-book"style="color: #2aabd2"></i>
            <span>Academic</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            {{--<li><a tabindex="-1" a href="{{URL::to('academic/amw/') }}"><i class="fa fa-location-arrow" style="color: #003399"></i>Mark Distribution Item</a></li>
            <li><a tabindex="-1" a href="{{URL::to('academic/amw/config/') }}"> <i class="fa fa-wrench" style="color: #24AA7A"></i>Course Config</a></li>
--}}
        </ul>
    </li>


    <li class="treeview">
        <a href="#">
            <i class="fa fa-pencil" style="color: #800080"></i>
            <span>Examination</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            {{--<li><a tabindex="-1" href="{{  URL::to('examination/amw/examination') }}"><i class="fa fa-pencil-square" style="color: #0f8080"></i> Prepare Question Paper</a></li>--}}
        </ul>
    </li>

</ul>