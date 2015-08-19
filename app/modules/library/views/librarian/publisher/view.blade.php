<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">{{HTML::image('assets/icon/media-close-btn.png')}}</button>
    <h4 class="modal-title" style="text-align: center;color: #800080;">View Book Publisher :: {{isset($view_publisher->name) ? $view_publisher->name :''}} Information</h4>
</div>
<div class="modal-body">
    <div style="padding: 10px;">
        <table id="" class="table table-bordered table-hover table-striped">
            <tr>
                <td>Name:</td>
                <td>{{isset($view_publisher->name) ? $view_publisher->name :''}}</td>
            </tr>
            <tr>
                <td>Company Name:</td>
                <td>{{isset($view_publisher->company_name) ? $view_publisher->company_name : ''}}</td>
            </tr>
            <tr>
                <td>Email:</td>
                <td>{{isset($view_publisher->email) ? $view_publisher->email : ''}}</td>
            </tr>
            <tr>
                <td>Phone:</td>
                <td>{{isset($view_publisher->phone) ? $view_publisher->phone : ''}}</td>
            </tr>
            <tr>
                <td>Address:</td>
                <td>{{isset($view_publisher->address) ? $view_publisher->address : ''}}</td>
            </tr>
            <tr>
                <td>Country:</td>
                <td>{{isset($view_publisher->relCountry->title) ? $view_publisher->relCountry->title : ''}}</td>
            </tr>
            <tr>
                <td>Note:</td>
                <td>{{isset($view_publisher->note) ? $view_publisher->note : ''}}</td>
            </tr>

        </table>
    </div>
</div>
<div class="modal-footer">
    <button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
</div>