<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-th">
            </span>Semester</a>
        </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
        <div class="panel-body">
            <table class="table">
                <tr>
                    <td>
                        <a href="{{ action('SemesterController@index') }}">All semester</a> <span class="label label-success"></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="{{ action('SemesterController@create') }}">Create New Semester</a> <span class="label label-info"></span>
                    </td>
                </tr>
                <tr>

                </tr>
            </table>
        </div>
    </div>
    </div>


    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-user">
                </span>Degree Level</a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse">
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td>
                            <a href="{{ action('DegreeLevelController@index') }}">Show All Degree level</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="{{ action('DegreeLevelController@create') }}">Create a New Degree level</a> <span class="label label-info"></span>
                        </td>
                    </tr>

                </table>
            </div>
        </div>
        </div>





    {{--<div class="panel panel-default">--}}
    {{--<div class="panel-heading">--}}
        {{--<h4 class="panel-title">--}}
            {{--<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-user">--}}
            {{--</span>Account</a>--}}
        {{--</h4>--}}
    {{--</div>--}}
    {{--<div id="collapseThree" class="panel-collapse collapse">--}}
        {{--<div class="panel-body">--}}
            {{--<table class="table">--}}
                {{--<tr>--}}
                    {{--<td>--}}
                        {{--<a href="http://www.jquery2dotnet.com">Change Password</a>--}}
                    {{--</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<td>--}}
                        {{--<a href="http://www.jquery2dotnet.com">Notifications</a> <span class="label label-info">5</span>--}}
                    {{--</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<td>--}}
                        {{--<a href="http://www.jquery2dotnet.com">Import/Export</a>--}}
                    {{--</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<td>--}}
                        {{--<span class="glyphicon glyphicon-trash text-danger"></span><a href="http://www.jquery2dotnet.com" class="text-danger">--}}
                            {{--Delete Account</a>--}}
                    {{--</td>--}}
                {{--</tr>--}}
            {{--</table>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="panel panel-default">--}}
    {{--<div class="panel-heading">--}}
        {{--<h4 class="panel-title">--}}
            {{--<a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><span class="glyphicon glyphicon-file">--}}
            {{--</span>Reports</a>--}}
        {{--</h4>--}}
    {{--</div>--}}
    {{--<div id="collapseFour" class="panel-collapse collapse">--}}
        {{--<div class="panel-body">--}}
            {{--<table class="table">--}}
                {{--<tr>--}}
                    {{--<td>--}}
                        {{--<span class="glyphicon glyphicon-usd"></span><a href="http://www.jquery2dotnet.com">Sales</a>--}}
                    {{--</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<td>--}}
                        {{--<span class="glyphicon glyphicon-user"></span><a href="http://www.jquery2dotnet.com">Customers</a>--}}
                    {{--</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<td>--}}
                        {{--<span class="glyphicon glyphicon-tasks"></span><a href="http://www.jquery2dotnet.com">Products</a>--}}
                    {{--</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<td>--}}
                        {{--<span class="glyphicon glyphicon-shopping-cart"></span><a href="http://www.jquery2dotnet.com">Shopping Cart</a>--}}
                    {{--</td>--}}
                {{--</tr>--}}
            {{--</table>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}