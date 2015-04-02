
<div class="modal-body">
 {{Form::model($model, array('url'=>'admission/public/admission/update-applicant-acm-docs/'.$model->id, 'class'=>'form-horizontal','files'=>true))}}

    {{ Form::hidden('id', $model->id) }}
    @include('admission::adm_public.admission.add_acm_docs')

 {{ Form::close() }}
</div>


<script>
$(document).ready(function(){
    $("#board").click(function(){
        $(".board").show();
        $(".university").hide();
        $(".other").hide();
    });
    $("#university").click(function(){
        $(".board").hide();
        $(".other").hide();
        $(".university").show();
    });
    $("#other").click(function(){
            $(".board").hide();
            $(".university").hide();
            $(".other").show();
        });
});
</script>

<script>
//$(document).ready(function(){
    $("#division").click(function(){
        $(".division").show();
        $(".gpa").hide();
    });
    $("#gpa").click(function(){
        $(".division").hide();
        $(".gpa").show();
    });
//});
</script>



