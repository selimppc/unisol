<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">{{HTML::image('assets/icon/media-close-btn.png')}}</button>
    <h4 class="modal-title" style="text-align: center;color: #800080;font-size: x-large">Book Author Name :: {{isset($view_author->name) ? $view_author->name :''}}</h4>
</div>
<div class="modal-body">
    <div style="padding: 10px;">
        <table id="" class="table table-bordered table-hover table-striped">
            <tr>
                <td>Name:</td>
                <td>{{isset($view_author->name) ? $view_author->name :''}}</td>
            </tr>
            <tr>
                <td>Email:</td>
                <td>{{isset($view_author->email) ? $view_author->email : ''}}</td>
            </tr>
            <tr>
                <td>Phone:</td>
                <td>{{isset($view_author->phone) ? $view_author->phone : ''}}</td>
            </tr>
            <tr>
                <td>Address:</td>
                <td>{{isset($view_author->address) ? $view_author->address : ''}}</td>
            </tr>
            <tr>
                <td>Country:</td>
                <td>{{isset($view_author->relCountry->title) ? $view_author->relCountry->title : ''}}</td>
            </tr>
            <tr>
                <td>Note:</td>
                <td>{{isset($view_author->note) ? $view_author->note : ''}}</td>
            </tr>

        </table>
    </div>
</div>
<div class="modal-footer">
    <button class="btn btn-default btn-xs" data-dismiss="modal" type="button">Close</button>
</div>