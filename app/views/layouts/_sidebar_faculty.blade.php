<ul class="sidebar-menu">
    <li class="active">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-bar-chart-o"></i>
            <span>Admission</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a tabindex="-1" a href="{{ URL::to('admission/faculty/admission-test') }}"><i class="fa fa-anchor" style="color: #db4509"></i>Admission Test </a></li>
            <li><a tabindex="-1" a href="{{ URL::to('admission/faculty/course') }}"><i class="fa fa-gift" style="color: #aa28db"></i> Course </a></li>
            <li><a tabindex="-1" a href="#"></i>Question paper (Come from Adm Test) </a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-book text-purple"></i>
            <span>Academic</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{URL::to('academic/faculty/course/config')}}"></i><i class="fa fa-stack-overflow text-blue"></i> Courses</a></li>
        </ul>
    </li>

    <li class="treeview">
            <a href="#">
                <i class="fa fa-edit" style="color: #09b021"></i>
                <span>Examination</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{URL::to('examination/faculty/examination-list')}}"></i><i class="fa fa-qrcode" style="color: #db8f18"></i> Examination</a></li>
{{--                <li><a href="{{URL::to('examination/faculty/question-paper')}}"></i><i class="fa fa-building-o" style="color: #4644db"></i> Question Paper</a></li>--}}
            </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-folder-open-o" style="color: #003399"></i>
            <span>Library</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a tabindex="-1" a href="{{ URL::to('library/faculty/book') }}"><i class="fa fa-search-plus" style="color: #db8f18"></i>Search Book</a></li>
            <li><a tabindex="-1" a href="{{ URL::to('library/faculty/my-book') }}"><i class="fa fa-book" style="color:deepskyblue"></i>My Book</a></li>

        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-credit-card" style="color: rgba(2, 128, 125, 0.85)"></i>
            <span>Research & Consultancy</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ URL::to('rnc/faculty/category/index') }}"></i><i class="fa fa-puzzle-piece" style="color: #0effae"></i>Category</a></li>
            <li><a href="{{ URL::to('rnc/faculty/config/index') }}"></i><i class="fa fa-cogs" style="color: #c69bff"></i>Config</a></li>
            <li><a href="{{ URL::to('rnc/faculty/publisher/index') }}"></i><i class="fa fa-print" style="color: #ff1465"></i>Publisher</a></li>
            <li><a href="{{ URL::to('rnc/faculty/research-paper/index') }}"></i><i class="fa fa-fire-extinguisher" style="color: rgb(219, 94, 17)"></i>Research Paper</a></li>

        </ul>
    </li>
</ul>