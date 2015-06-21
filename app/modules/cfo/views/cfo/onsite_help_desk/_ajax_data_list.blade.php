
<div class="box-body table-responsive"><p>&nbsp;</p>
  <table id="" class="table table-bordered table-striped">
   <thead>
       <tr>
           <tr>
               <th> Name</th>
               <th> Email </th>
               <th> Token Number </th>
               <th> Category</th>
               <th> Department</th>
               <th> Assigned To</th>
               <th> Status</th>
               <th> Action</th>
           </tr>
       </tr>
   </thead>
   <tbody>
      @if(isset($data))
         @foreach($data as $values)
            <tr>
               <td>
                  <a href="{{URL::route('help-desk.show',['id'=>$values->id])}}" data-toggle="modal" data-target="#help-desk"
                  class="btn-link" title="View Details" style="color:#800080">{{$values->name}}
                  </a>
               </td>
               <td>{{$values->email}}</td>
               <td style="color:#800080">{{$values->token_number}}</td>
               <td>{{$values->relCfoCategory->title}}</td>
               <td>{{$values->relDepartment->title}}</td>
               <td>{{$values->relUser->relUserProfile->first_name.' '.$values->relUser->relUserProfile->middle_name.' '.$values->relUser->relUserProfile->last_name}}</td>
               <td>{{strtoupper($values->status)}}</td>
               <td>
                  <a href="{{ URL::route('help-desk.show',['id'=>$values->id]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#help-desk" style="font-size: 12px;color: darkmagenta"><span class="fa fa-eye"></span></a>
                  <a class="btn btn-xs btn-default" href="{{ URL::route('help-desk.edit',['id'=>$values->id]) }}" data-toggle="modal" data-target="#help-desk" style="font-size: 12px;color: lightseagreen"><i class="fa fa-edit"></i></a>
                  <a data-href="{{ URL::route('help-desk.delete',$values->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" style="font-size: 12px;color: lightcoral"><span class="fa  fa-trash-o"></span></a>
               </td>
            </tr>
         @endforeach
      @endif
   </tbody>
  </table>
  {{ $data->links() }}
</div>

<script>
// Ajax pagination
$(function() {
    $('.tab-pane.active').on('click', '.pagination a', function (e) {
        e.preventDefault();
        page = $(this).attr('href').split('?page=')[1];
        tvar = $(this).attr('href').split('?page=')[0];
        status = tvar.split('/status/')[1];
        getPosts(status, page);
        return false;
    });
});

function getPosts(status, page) {
    $.ajax({
        url : 'help-desk/status/'+status+'?page=' + page,
        dataType: 'json'
    }).done(function (data) {
        $('#'+status).html(data);
    }).fail(function () {
        alert('Posts could not be loaded.');
        return false;
    });
}
</script>




