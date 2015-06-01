<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">{{HTML::image('assets/icon/media-close-btn.png')}}</button>
    <h4 class="modal-title" style="text-align: center;color: #800080;">View RnC :: {{isset($view_r_c->title) ? $view_r_c->title :''}} Information</h4>
</div>
<div class="modal-body">
    <div style="padding: 10px;">
        <table id="" class="table table-bordered table-hover table-striped">
            <tr>
                <td>Title:</td>
                <td>{{isset($view_r_c->title) ? $view_r_c->title :''}}</td>
            </tr>
            <tr>
                <td>Abstract:</td>
                <td>{{isset($view_r_c->abstract) ? $view_r_c->abstract : ''}}</td>
            </tr>
            <tr>
                <td>Category:</td>
                <td>{{isset($view_r_c->relRnCCategory->title) ? $view_r_c->relRnCCategory->title : ''}}</td>
            </tr>
            <tr>
                <td>Publisher:</td>
                <td>{{isset($view_r_c->relRnCPublisher->title) ? $view_r_c->relRnCPublisher->title : ''}}</td>
            </tr>
            <tr>
                <td>Publication No:</td>
                <td>{{isset($view_r_c->publication_no) ? $view_r_c->publication_no : ''}}</td>
            </tr>
            <tr>
                <td>Details:</td>
                <td>{{isset($view_r_c->details) ? $view_r_c->details : ''}}</td>
            </tr>
            <tr>
                <td>Searching:</td>
                <td>{{isset($view_r_c->searching) ? $view_r_c->searching : ''}}</td>
            </tr>
            <tr>
                <td>Benefit Share(%):</td>
                <td>{{isset($view_r_c->benefit_share) ? $view_r_c->benefit_share : ''}}</td>
            </tr>
            <tr>
                <td>Price:</td>
                <td>{{isset($view_r_c->price) ? $view_r_c->price : ''}}</td>
            </tr>
            <tr>
                <td>Status:</td>
                <td>{{isset($view_r_c->status) ? $view_r_c->status : ''}}</td>
            </tr>
            <tr>
                <td>Reviewed By:</td>
                <td>{{isset($view_r_c->reviewed_by) ? $view_r_c->reviewed_by : ''}}</td>
            </tr>

        </table>
    </div>
</div>
<div class="modal-footer">
    <button class="btn btn-default btn-xs" data-dismiss="modal" type="button">Close</button>
</div>