<div class="box-body table-responsive"><p>&nbsp;</p>
  <table id="" class="table table-bordered table-striped">
   <thead>
       <tr>
           <tr>
               <th> Name</th>
               <th> Email </th>
               <th> Phone</th>
               <th> Subject</th>
               <th> Priority</th>
               <th> Support Code</th>
               <th> Status</th>
               <th> Action</th>
           </tr>
       </tr>
   </thead>
   <tbody>
      @if(isset($support_data))
          <div>
               @foreach($support_data as $values)
                     <tr>
                         <td>{{$values->name}}</td>
                         <td>{{$values->email}}</td>
                         <td>{{$values->phone}}</td>
                         <td>{{$values->subject}}</td>
                         <td>{{$values->priority}}</td>
                         <td>{{$values->support_code}}</td>
                          <td>{{ucfirst($values->status)}}</td>
                         <td>
                             <a href="{{ URL::route('support-head.show',['id'=>$values->id]) }}" class="btn btn-xs btn-bitbucket" data-toggle="modal" data-target="#support" style="font-size: 12px" >View</a>
                             <a href="{{ URL::route('support-head.reply',['id'=>$values->id])}}" class="btn btn-info btn-xs" >Reply</a>
                         </td>
                     </tr>
                 @endforeach
          </div>
      @endif
   </tbody>
  </table>
  {{ $support_data->links() }}
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
        url : 'support-head/status/'+status+'?page=' + page,
        dataType: 'json'
    }).done(function (data) {
        $('#'+status).html(data);
    }).fail(function () {
        alert('Posts could not be loaded.');
        return false;
    });
}
</script>




