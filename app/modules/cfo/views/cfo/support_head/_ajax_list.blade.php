<div class="box-body table-responsive"><p>&nbsp;</p>
  <div id="post-ajax">
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
                             @if(($values->status =='closed'))
                                 <a href="{{ URL::route('support-head.show',['id'=>$values->id]) }}" class="btn btn-xs btn-bitbucket" data-toggle="modal" data-target="#support" style="font-size: 12px" >View</a>
                             @else
                                 <a href="{{ URL::route('support-head.show',['id'=>$values->id]) }}" class="btn btn-xs btn-bitbucket" data-toggle="modal" data-target="#support" style="font-size: 12px" >View</a>
                                 <a href="{{ URL::route('support-head.reply',['id'=>$values->id])}}" class="btn btn-info btn-xs" >Reply</a>
                             @endif
                             </td>
                         </tr>
                     @endforeach
              </div>
          @endif
       </tbody>
      </table>

        <div class="pagination" style="margin-left:2%">
          {{ $support_data->links() }}
        </div>
    </div>
</div>

<script>
// Ajax pagination
$(function() {
    $('#post-ajax').on('click', '.pagination a', function (e) {
        getPosts($(this).attr('href').split('page=')[1]);
        e.preventDefault();
    });
});

function getPosts(page) {
    $.ajax({
        url : 'cfo/support-head/status/open?page=' + page,
        dataType: 'json'
    }).done(function (data) {
        $('#post-ajax').html(data);
    }).fail(function () {
        alert('Posts could not be loaded.');
    });
}
</script>


