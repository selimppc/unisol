$('#confirm-delete').on('show.bs.modal', function (e) {
    $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
    $('.debug-url').html('Delete URL: <strong>' + $(this).find('.danger').attr('href') + '</strong>');
});

//$('#myTable').tablesorter(); //for table sorting

// for table filter
//$('#dataTableId').DataTable();

//to refresh button in modal
// $('.dropclose').on('click', function(event) {
//   event.preventDefault();
//   window.location.reload();
// });

//to refresh button in modal
$('.close').on('click', function (event) {
    event.preventDefault();
    window.location.reload();
});

// select All records for batch delete

$("#hide-button").hide();

$(".checkbox").change(function () {
    if (this.checked) {
        $('.myCheckbox').prop('checked', true);
        $("#hide-button").show();
    }
    if (!this.checked) {
        $('.myCheckbox').prop('checked', false);
        $("#hide-button").hide();
    }
});

$('.myCheckbox').on('change', function (event) {
    event.preventDefault();
    if ($('.myCheckbox:checked').length > 0) {
        $("#hide-button").show();
    } else {
        $("#hide-button").hide();
    }
});

//ends

//paginations onpage filter
$('#searchStr').keyup(function () {
    var that = this;
    $.each($('.searchBody tr'),
        function (i, val) {
            if ($(val).text().toLowerCase().indexOf($(that).val().toLowerCase()) == -1) {
                $('.searchBody tr').eq(i).hide();
            } else {
                $('.searchBody tr').eq(i).show();
            }
        });
});


//Modal subEdit for subject start. this only shows the value according their id

$('.subEdit').on('click', function () {
    var subId = $(this).data('id');
    var url = "editvalue";
    $.ajax({
        url: url,
        type: 'GET',
        data: {subjectId: subId},
    })
        .done(function (data) {

            var obj = $.parseJSON(data);
            var action_url = "update/" + obj['id'];
            $('.edit-modal').find('.updateForm').attr('action', action_url);
            $('.edit-modal').find('select[name="department_id"]').val(obj['department_id']);
            $('.edit-modal').find('input[name="title"]').val(obj['title']);
            $('.edit-modal').find('textarea[name="description"]').val(obj['description']);

        });

});


//subject details show on their id into modal

$('.subDetails').on('click', function () {
    var dep = $(this).closest("tr").find(".deptName").text();
    var title = $(this).closest("tr").find(".subTitle").text();
    var desc = $(this).closest("tr").find(".subDesc").text();

    $('.details-modal').find('.department').text(dep);
    $('.details-modal').find('.title').text(title);
    $('.details-modal').find('.description').text(desc);

});

// To refresh textbox value and it will not catch the previous value
$('#confirm-edit').on('hidden.bs.modal', function (e) {
    $(this)
        .find("input,textarea,select")
        .val('')
        .end();
});


// To refresh button
$('.close').on('click', function (event) {
    event.preventDefault();
    window.location.reload();
});

// To search and filter all datatable

$('#example').dataTable({
    paging: false

});
$('#example1').dataTable({
    paging: false

});
$('#example2').dataTable({
    paging: false

});
$('#example3').dataTable({
    paging: false

});
$('#example4').dataTable({
    paging: false

});


//for term add new datepicker

$('.datepicker').datepicker({
    format: 'yyyy/mm/dd',
    place: function () {

        if (this.isInline)
            return;
        var zIndex = parseInt(this.element.parents().filter(function () {
                return $(this).css('z-index') != 'auto';
            }).first().css('z-index')) + 10;
        var offset = this.component ? this.component.offset() : this.element.offset();
        var height = this.component ? this.component.outerHeight(true) : this.element.outerHeight(true);
        var isInModal = this.element.parents('.modal').length;
        var top = offset.top + height;
        if (isInModal) {
            top = top - 40;
        }
        this.picker.css({
            top: top,
            left: offset.left,
            zIndex: zIndex
        });
    }
});

/***********************ACM COURSE CONFIG GENERATION STARTS***********************/

function addCourseListItem()
{
    var listItem = $('.addConfigListItem').val();
    var listItemTitle = $( ".addConfigListItem option:selected" ).text();
    var course_id = $('.course_id').val();
    var course_title = $('.course_title').val();
    var course_evalution_marks = $('.course_evalution_marks').val();

    var contentBody = $('.acm_course_config_list');
    var trLen = $('.acm_course_config_list tr').length;

    // $( ".addConfigListItem option:selected" ).remove();

    var str = '';
    str += '<tr>';
    str += '<td width="170px"><input type="hidden" name="course_id[]" value="'+course_id+'" /><input type="hidden" name="acm_marks_dist_item_id[]" value="'+listItem+'" />'+listItemTitle+'</td>';
    str += '<td><input type="text" name="marks_percent[]" class="amw_marks_percent'+trLen+'" onChange="calculateActualMarks(this.className, '+course_evalution_marks+',this.value)" required/> </td>';
    str += '<td><input type="checkbox" name="isReadOnly[]" value="1" class="amw_isReadOnly"/> </td>';
    str += '<td><input type="radio" name="isDefault'+trLen+'" value="1" class="amw_isDefault"/><span>Yes</span><input type="radio" name="isDefault'+trLen+'" value="0" class="amw_isDefault"/><span>No</span></td>';
    str += '<td><input type="text" name="actual_marks[]" class="amw_actual_marks"/> </td>';
    str += '<td><a class="btn btn-default btn-sm" id="removeTrId'+trLen+'" onClick="deleteNearestTr(this.id)"><span class="glyphicon glyphicon-trash text-danger"></span></a></td>';
    str += '</tr>';

    contentBody.append(str);
}


function calculateActualMarks(class_name, course_evalution_marks, selected_percent_marks)
{
    var total = (selected_percent_marks/100)*course_evalution_marks;
    var actual_marks = $('.'+class_name).closest('tr').find('.amw_actual_marks').val(total);
    // console.log(class_name+"//"+total);
}

function deleteNearestTr(getId)
{
    console.log(getId);
    var whichtr = $('#'+getId).closest("tr");
    whichtr.fadeOut(500).remove();
}

/***********************ACM COURSE CONFIG GENERATION ENDS***********************/