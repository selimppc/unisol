{{--<ul class="sidebar-menu">
    <li class="active">
        <a href="index.html">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
    </li>--}}

    <li class="treeview">
        <a href="#">
            <i class="fa fa-bar-chart-o"></i><span> Master Setup </span><i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{URL::route('product')}}"><i class="fa fa-angle-double-right"></i> Product Master</a></li>
            <li><a href="{{URL::route('product/category')}}"><i class="fa fa-angle-double-right"></i> Product Category</a></li>
            <li><a href="{{URL::route('supplier')}}"><i class="fa fa-angle-double-right"></i> Supplier Master</a></li>
            <li><a href="{{URL::route('master-setup')}}"><i class="fa fa-angle-double-right"></i> Settings </a></li>

        </ul>
    </li>

    <li class="treeview">
            <a href="#">
                <i class="fa fa-bar-chart-o"></i><span> Inventory </span><i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{URL::route('requisition')}}"><i class="fa fa-angle-double-right"></i> Requisition</a></li>
                <li><a href="{{URL::route('purchase-order')}}"><i class="fa fa-angle-double-right"></i> Purchase Order</a></li>
                <li><a href="{{URL::route('grn')}}"><i class="fa fa-angle-double-right"></i> GRN </a></li>
                <li><a href="{{URL::route('stock-view')}}"><i class="fa fa-angle-double-right"></i> Stock View </a></li>
                <li><a href="{{URL::route('stock-dispatch')}}"><i class="fa fa-angle-double-right"></i> Stock Dispatch </a></li>
                <li><a href="{{URL::route('deliver-stock')}}"><i class="fa fa-angle-double-right"></i> Deliver  </a></li>
                <li><a href="{{URL::route('stock-adjustment')}}"><i class="fa fa-angle-double-right"></i> Stock Adjustment </a></li>
                <li><a href="{{URL::route('index-setup')}}"><i class="fa fa-angle-double-right"></i> Settings </a></li>

            </ul>
        </li>

    <li class="treeview">
                <a href="#">
                    <i class="fa fa-bar-chart-o"></i><span> Account Payable </span><i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{URL::route('index-account-payable')}}"><i class="fa fa-angle-double-right"></i> Invoice </a></li>
                    <li><a href="{{URL::route('manage-ap')}}"><i class="fa fa-angle-double-right"></i> Manage AP </a></li>

                </ul>
            </li>
{{--</ul>--}}

