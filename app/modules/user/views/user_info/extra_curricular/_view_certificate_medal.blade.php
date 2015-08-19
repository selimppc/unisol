
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">View Certificate Medal</h4>
</div>
<div class="modal-body">
    <div style="padding: 20px;">
        <table>
            <tr>
                <th></th>
                <td class="etsb-image-doc">{{ $model->certificate_medal != null ? HTML::image('user_images/certificates/'.$model->certificate_medal) :  HTML::image('/img/no_file.jpg') }}</td>
            </tr>
        </table>
    <br>
    <a href="" class="pull-right btn btn-xs btn-default" span class="glyphicon-refresh">Close</a>
    </div>
</div>










