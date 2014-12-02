<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title> {{ $title }}</title>

<!-- BOOTSTRAP CSS (REQUIRED ALL PAGE)-->
{{ HTML::style('assets/css/bootstrap.min.css') }}
{{ HTML::style('assets/css/style.css') }}
{{HTML::style('assets/js/jquery.dataTables.min.css')}}
{{HTML::style('assets/css/dropzone.css')}}


</head>
<body>


<nav id="myNavbar" class="navbar navbar-default navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
       <a class="navbar-brand" href="#">{{ $title }}</a> 
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="nav navbar-nav">
             
            </ul>
        </div>
    </div>
</nav>
<div class="container" style="margin-top: 60px;">

   @yield('container')
 
</div>


{{ HTML::script('assets/js/jquery.min.js') }}
{{ HTML::script('assets/js/bootstrap.min.js') }}
{{ HTML::script('assets/js/jquery.tablesorter.min.js') }}
{{ HTML::script('assets/js/jquery.jscroll.min.js') }}
{{HTML::script('assets/js/jquery.dataTables.min.js')}}
{{HTML::script('assets/js/dropzone.js')}}


</body>

  <script>
       $( document ).ready(function()
        {
                  
                 $('#confirm-delete').on('show.bs.modal', function(e) {
                      $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
                      $('.debug-url').html('Delete URL: <strong>' + $(this).find('.danger').attr('href') + '</strong>');
                  });

              $('#myTable').tablesorter(); //for table sorting
              
                 // for table filter
                  $('#dataTableId').DataTable();
        
                //to refresh button in modal
                // $('.dropclose').on('click', function(event) {
                //   event.preventDefault();
                //   window.location.reload();
                // });
                
               $('.close').on('click', function(event) {
                event.preventDefault();
                window.location.reload();
              });
          
        // JS: infinite scroll
       
                  $('.scroll').jscroll({
                      autoTrigger: true,
                      nextSelector: '.pagination li.active + li a',
                      contentSelector: 'div.scroll',
                      callback: function() {
                          $('ul.pagination:visible:first').hide();
                      }
                  });
      

     // select All records for batch delete

          $("#hide-button").hide();

          $(".checkbox").change(function() {
              if(this.checked) {
                  $('.myCheckbox').prop('checked', true);
                   $("#hide-button").show();
              }
              if(!this.checked) {
                  $('.myCheckbox').prop('checked', false);
                   $("#hide-button").hide();
              }
          });

          $('.myCheckbox').on('change', function(event) {
            event.preventDefault();
            if ($('.myCheckbox:checked').length > 0) {
                $("#hide-button").show();
            } else {
                $("#hide-button").hide();
            }
          });

  //for image show in modal in upload.blade.php file starts
       $('.image_thumbs li img').on('click',function(){
            var src = $(this).attr('data_description');
            //var src= $(this).attr('src').replace('thumbs/thumb_', 'user_photos/');            
            var img = '<img src="' + src + '" class="img-responsive"/>';
            $('#myModal').modal();
            $('#myModal').on('shown.bs.modal', function(){
                $('#myModal .modal-body').html(img);
            });
            $('#myModal').on('hidden.bs.modal', function(){
                $('#myModal .modal-body').html('');
            });               
       });  

   //for image show in modal in upload.blade.php file ends
      

  //paginations search
  $('#searchStr').keyup(function() {
      var that = this;
      $.each($('.searchBody tr'),
      function(i, val) {
          if ($(val).text().toLowerCase().indexOf($(that).val().toLowerCase()) == -1) 
          {
              $('.searchBody tr').eq(i).hide();
          } else {
              $('.searchBody tr').eq(i).show();
          }
      });
   });

  
    });

</script>

</body>
</html>
