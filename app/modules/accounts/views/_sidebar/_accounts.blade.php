{{--<ul class="sidebar-menu">
    <li class="active">
        <a href="index.html">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
    </li>--}}

    <li class="treeview">
        <a href="#">
            <i class="fa fa-usd"></i><span> General Ledger </span><i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ Route('char-of-accounts') }}"><i class="fa fa-angle-double-right"></i> Chart Of Accounts</a></li>
            <li><a href="{{Route('journal-voucher')}}"><i class="fa fa-angle-double-right"></i> Journal Voucher</a></li>
            <li><a href="{{Route('payment-voucher')}}"><i class="fa fa-angle-double-right"></i> Payment Voucher</a></li>
            <li><a href="{{Route('receipt-voucher')}}"><i class="fa fa-angle-double-right"></i> Receipt Voucher</a></li>
            <li><a href="{{Route('reverse-voucher')}}"><i class="fa fa-angle-double-right"></i> Reverse Entry </a></li>
            <li><a href="{{Route('setup-transaction')}}"><i class="fa fa-angle-double-right"></i> Settings </a></li>

        </ul>
    </li>



    <li class="treeview">
            <a href="#">
                <i class="fa fa-usd"></i><span> Account Receivable </span><i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ Route('applicant-receivable-index') }}"><i class="fa fa-angle-double-right"></i> Applicant </a></li>
                <li><a href="{{Route('student-receivable-index')}}"><i class="fa fa-angle-double-right"></i> Student </a></li>
                <li><a href="{{Route('setup-transaction')}}"><i class="fa fa-angle-double-right"></i> Settings </a></li>

            </ul>
        </li>










{{--</ul>--}}

