<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">{{HTML::image('assets/icon/media-close-btn.png')}}</button>
    <h4 class="modal-title" style="text-align: center;color: #800080;">View RnC :: {{isset($view_r_c->title) ? $view_r_c->title :''}} Information</h4>
</div>
<div class="modal-body">
    <div style="padding: 10px;">
        <table id="" class="table table-bordered table-hover table-striped">
            <tr>
                <td><b>Title:</b></td>
                <td>{{isset($view_r_c->title) ? $view_r_c->title :''}}</td>
            </tr>
            <tr>
                <td><b>Abstract:</b></td>
                <td>{{isset($view_r_c->abstract) ? $view_r_c->abstract : ''}}</td>
            </tr>
            <tr>
                <td><b>Category:</b></td>
                <td>{{isset($view_r_c->relRncCategory->title) ? $view_r_c->relRncCategory->title : ''}}</td>
            </tr>
            <tr>
                <td><b>Publisher:</b></td>
                <td>{{isset($view_r_c->relRncPublisher->title) ? $view_r_c->relRncPublisher->title : ''}}</td>
            </tr>
            <tr>
                <td><b>Publication No:</b></td>
                <td>{{isset($view_r_c->publication_no) ? $view_r_c->publication_no : ''}}</td>
            </tr>
            <tr>
                <td><b>Details:</b></td>
                <td>{{isset($view_r_c->details) ? ucfirst($view_r_c->details) : ''}}</td>
            </tr>
            <tr>
                <td><b>Searching:</b></td>
                <td>{{isset($view_r_c->searching) ? ucfirst($view_r_c->searching) : ''}}</td>
            </tr>
            <tr>
                <td><b>Benefit Share:</b></td>
                <td>{{isset($view_r_c->benefit_share) ? $view_r_c->benefit_share : ''}} %</td>
            </tr>


            <tr>
                <td><b>Free Type Student:</b></td>
                <td>{{isset($view_r_c->free_type_student) ? $view_r_c->free_type_student : ''}} %</td>
            </tr>

            <tr>
                <td><b>Free Type Faculty:</b></td>
                <td>{{isset($view_r_c->free_type_faculty) ? $view_r_c->free_type_faculty : ''}} %</td>
            </tr>

            <tr>
                <td><b>Free Type Non User:</b></td>
                <td>{{isset($view_r_c->free_type_non_user) ? $view_r_c->free_type_non_user : ''}} %</td>
            </tr>


            <tr>
                <td><b>Price:</b></td>
                <td>{{isset($view_r_c->price) ? $view_r_c->price : ''}}</td>
            </tr>
            <tr>
                <td><b>Status:</b></td>
                <td>{{isset($view_r_c->status) ? ucfirst($view_r_c->status) : ''}}</td>
            </tr>
            <tr>
                <td><b>Reviewed By:</b></td>
                <td>{{isset($view_r_c->reviewed_by) ? $view_r_c->reviewed_by : ''}}</td>
            </tr>

        </table>
    </div>
</div>
<div class="modal-footer">
    <button class="btn btn-default btn-xs" data-dismiss="modal" type="button">Close</button>
</div>