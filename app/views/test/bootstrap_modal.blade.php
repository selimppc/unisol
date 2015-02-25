<td>{{link_to_route('bootstrap.test','',array(1), array(
        'class'=>'edit-attendee btn btn-info btn-xs glyphicon glyphicon-pencil',
        'data-title' => 'Edit Attendee'))}} 
</td>

<a href="{{ URL::route('bootstrap.test', [1]) }}">
     <span class="menu-text"> Dashboard </span>
</a>


<script>
    $(document).ready(function(){
        $('.btn.edit-attendee').click(function(e){
            e.preventDefault();
            url = $(this).attr('href');
            BootstrapDialog.show({
                title: $(this).data('title'),
                message: $('<div></div>').load(url),
                buttons: [{
                    label: 'Update',
                    action: function(dialogRef) {
                        $('form').submit();
                    }
                }]
            });
        });
    });
</script>