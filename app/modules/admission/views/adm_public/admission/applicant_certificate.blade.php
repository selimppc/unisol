<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Certificate</h4>
</div>

<div class="modal-body">
     <div style="padding: 20px;">
           <div class="span9 well">

                <table>
                    <tr>
                        <th></th>
                        <td class="etsb-image-doc">{{ $model->certificate != null ? HTML::image('/applicant_images_public/'.$model->certificate) :  HTML::image('/img/no_file.jpg') }}</td>
                    </tr>
                </table>
           </div>
           <a href="" class="pull-right btn btn-xs btn-default" span class="glyphicon-refresh">Close</a>
     </div>
</div>
