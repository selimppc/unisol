<ul class="sidebar-menu">
    <li>
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-book" style="color:#f012be"></i>
            <span>Library</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{URL::to('library/book/category')}}"></i><i class="fa fa-stack-overflow text-blue"></i>  Category</a></li>
            <li><a href="{{URL::to('library/book/author')}}"></i><i class="fa fa-users text-green"></i> Author</a></li>
            <li><a href="{{URL::to('library/book/publisher')}}"></i><i class="fa  fa-print text-purple"></i> Publisher</a></li>
            <li><a href="{{URL::to('library/book/')}}"></i><i class="fa fa-book text-light-blue"></i> Books</a></li>
            <li><a href="{{URL::to('library/book/transaction')}}"></i><i class="fa fa-dollar text-green"></i> Books Transaction</a></li>
        </ul>
    </li>


</ul>



