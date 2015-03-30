<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4>View Question Paper List</h4>
</div>

<div style="padding-left: 8%; width: 90%;">
    <div class="modal-body">



    {{ Form::open() }}
        <table id="example" class="table table-striped  table-bordered"  >
              <thead>
                   {{ Form::submit('Delete Items', array('class'=>'btn btn-danger btn-xs', 'id'=>'hide-button', 'style'=>'display:none'))}}

                     <br>
                     <tr>
                        <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                        <th>Title</th>
                        <th>Type</th>
                        <th>Marks</th>
                        <th>Action</th>
                     </tr>
          </thead>
          <tbody>
              @foreach($view_adm_qp_items as $view_adm_qp_items_list)
                    <tr>
                        <td><input type="checkbox" name="id[]" class="myCheckbox" value="{{ $view_adm_qp_items_list['id'] }}"></td>

                        <td>{{ $view_adm_qp_items_list->title }}</td>

                        <td>{{ $view_adm_qp_items_list->question_type }}</td>

                        <td>{{ $view_adm_qp_items_list->marks }}</td>

                        <td>
                            <a href="{{ URL::route('admission.faculty.question-papers.question-items-list-view',['id'=>$view_adm_qp_items_list->id]) }}" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal">View</a>
                            <a href="{{ URL::route('admission.faculty.question-papers.question-items-list-edit',['id'=>$view_adm_qp_items_list->id]) }}" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal" >Edit</a>
                        </td>
                    </tr>
              @endforeach
          </tbody>
        </table>

        <a href="" class="pull-right btn btn-info" span class="glyphicon-refresh">Close</a>
    {{ Form::close() }}





        &nbsp;
        </br>
        &nbsp;
    </div>
</div>