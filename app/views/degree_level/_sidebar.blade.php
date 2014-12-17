    {{--<ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">--}}
        {{--<li class="active">--}}
            {{--<a href="{{ action('DegreeLevelController@index') }}"><i class="icon-chevron-right"></i>Degree Level</a>--}}
        {{--</li>--}}

        {{--<li>--}}
            {{--<a href="{{ action('DegreeLevelController@create') }}"><i class="icon-chevron-right"></i> Create </a>--}}
        {{--</li>--}}


        {{--<li>--}}
            {{--<a href=""><span class="badge badge-success pull-right">731</span> View All</a>--}}
        {{--</li>--}}

    {{--</ul>--}}


    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-user">
                </span>Degree Level</a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in">
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td>
                            <a href="{{ action('DegreeLevelController@index') }}">Show All Degree level</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="{{ action('DegreeLevelController@create') }}">Create a New Degree level</a> <span class="label label-info">5</span>
                        </td>
                    </tr>
                    {{--<tr>--}}
                        {{--<td>--}}
                            {{--<a href="http://www.jquery2dotnet.com">Import/Export</a>--}}
                        {{--</td>--}}
                    {{--</tr>--}}

                </table>
            </div>
        </div>
        </div>

    <div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-folder-close">
            </span>Content</a>
        </h4>
    </div>
    <div id=" collapseThree" class="panel-collapse collapse">
        <div class="panel-body">
            <table class="table">
                <tr>
                    <td>
                        <span class="glyphicon glyphicon-pencil text-primary"></span><a href="http://www.jquery2dotnet.com">Articles</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="glyphicon glyphicon-flash text-success"></span><a href="http://www.jquery2dotnet.com">News</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="glyphicon glyphicon-file text-info"></span><a href="http://www.jquery2dotnet.com">Newsletters</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="glyphicon glyphicon-comment text-success"></span><a href="http://www.jquery2dotnet.com">Comments</a>
                        <span class="badge">42</span>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    </div>

    <div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-th">
            </span>Modules</a>
        </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
        <div class="panel-body">
            <table class="table">
                <tr>
                    <td>
                        <a href="http://www.jquery2dotnet.com">Orders</a> <span class="label label-success">$ 320</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.jquery2dotnet.com">Invoices</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.jquery2dotnet.com">Shipments</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.jquery2dotnet.com">Tex</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    </div>


    <div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><span class="glyphicon glyphicon-file">
            </span>Reports</a>
        </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse">
        <div class="panel-body">
            <table class="table">
                <tr>
                    <td>
                        <span class="glyphicon glyphicon-usd"></span><a href="http://www.jquery2dotnet.com">Sales</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="glyphicon glyphicon-user"></span><a href="http://www.jquery2dotnet.com">Customers</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="glyphicon glyphicon-tasks"></span><a href="http://www.jquery2dotnet.com">Products</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="glyphicon glyphicon-shopping-cart"></span><a href="http://www.jquery2dotnet.com">Shopping Cart</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    </div>
