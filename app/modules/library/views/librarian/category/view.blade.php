<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">{{HTML::image('assets/icon/media-close-btn.png')}}</button>
    <h4 class="modal-title" style="text-align: center;color: #800080;font-size: x-large">Book Category</h4>
</div>
<div class="modal-body">
    <div style="padding: 10px;">
        <table id="" class="table table-bordered table-hover table-striped">
            <tr>
                <td>Code:</td>
                <td>
                    {{isset($view_category->code) ? $view_category->code : '' }}
                </td>
            </tr>
            <tr>
                <td>Title:</td>
                <td>
                    {{isset($view_category->title) ? $view_category->title : '' }}
                </td>
            </tr>
            <tr>
                <td>Description:</td>
                <td>
                    {{isset($view_category->description) ? $view_category->description : '' }}
                </td>
            </tr>

        </table>
    </div>
</div>
<div class="modal-footer">
    <button class="btn btn-default btn-xs" data-dismiss="modal" type="button">Close</button>
</div>