$('#confirm-delete').on('show.bs.modal', function (e) {
    $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
    $('.debug-url').html('Delete URL: <strong>' + $(this).find('.danger').attr('href') + '</strong>');
});

$('#confirm-status-one').on('show.bs.modal', function (e) {
    $(this).find('.primary').attr('href', $(e.relatedTarget).data('href'));
    $('.debug-url').html('Status URL: <strong>' + $(this).find('.primary').attr('href') + '</strong>');
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

$('body').on('hidden.bs.modal', '.modal', function () {
    window.location.reload();
});

// select All records for batch delete

/*$("#hide-button").hide();

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
});*/

//*****************Common Module subject CRUD using js start*****************

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

//*********************Common Module subject CRUD using js End*****************************

// To refresh button
$('.close').on('click', function (event) {
    event.preventDefault();
    window.location.reload();
});

// To search and filter all datatable
$('#example').dataTable({
    "bPaginate": false,
    "bSort": false
});
$('#example1').dataTable({
    "bPaginate": false
});
$('#example2').dataTable({
    "bPaginate": false
});
$('#example3').dataTable({
    "bPaginate": false
});
$('#example4').dataTable({
    "bPaginate": false
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

//This function is working for amw and faculty calculateActualMarks in text filed

function calculateActualMarks(class_name, course_evalution_marks, selected_percent_marks)
{
    var total = (selected_percent_marks/100)*course_evalution_marks;
    var actual_marks = $('.'+class_name).closest('tr').find('.amw_actual_marks').val(total);
    // console.log(class_name+"//"+total);
}

/*function deleteNearestTr(getId, acmId)
{
    var is_config_id = acmId;
    if(is_config_id > 0){

        var check = confirm("Are you sure to delete this item??");
        if(check)
        {
            $.ajax({
                url: '/academic/amw/config/acmconfigdelete/ajax',
                type: 'POST',
                dataType: 'json',
                data: {acm_course_config_id: is_config_id}
            })
                .done(function(msg) {
                    console.log(msg);
                    var whichtr = $('#'+getId).closest("tr");
                    whichtr.fadeOut(500).remove();
                    arrayItems.pop(getId);//To stop additem if exist
                });
        }
        else
        {
            return false;
        }

    }else{
        //if acm_course_config id not found jst remove the tr form the popup. that not delete the data form the db.
        var whichtr = $('#'+getId).closest("tr");
        whichtr.fadeOut(500).remove();
        arrayItems.pop(getId);//To stop additem if exist
    }

}
*/

/***********************FACULTY MARKS DISTRIBUTION GENERATION START***********************/
$tableItemCounter = 0;//To stop additem if exist
var arrayItems=[];//To stop additem if exist

function editMarksListItem(itemid){
    arrayItems.push(itemid);
}

function addMarksDistItem() {

    var listItem = $('.addDistListItem').val();
    var listItemTitle = $(".addDistListItem option:selected").text();

    if(listItem == ""){
        alert("Please Select Valid Marks Distribution Item!");
        return;
    }


    item_id = parseInt($(".addDistListItem option:selected").val());//To stop additem if exist
    var index = $.inArray(item_id, arrayItems);//To stop additem if exist

    //To stop additem if exist
    if (index >= 0) {
        alert("Already Added Marks Distribution Item!");

    } else {
        counter = $('#facultyMarksDist tr').length - 2; //get the sequence number of that table item
        var course_id = $('.course_id').val();
        var course_title = $('.course_title').val();
        var course_evalution_marks = $('.course_evalution_marks').val();

        var contentBody = $('.acm_marks_dist_list');
        var trLen = $('.acm_marks_dist_list tr').length;

        // Insert item_id as INT to array otherwise it may be added like string
        arrayItems.push(parseInt(item_id));//To stop additem if exist

        var str = '';
        str += '<tr><input type="hidden" name="acm_config_id[]" value="" />';

        str += '<td width="130"><input type="hidden" name="course_id[]" value="' + course_id + '" /><input type="hidden" name="acm_marks_dist_item_id[]" value="' + listItem + '" />' + listItemTitle + '</td>';

        str += '<td><input type="text" name="marks_percent[]" class="amw_marks_percent' + trLen + '" onchange="calculateActualMarks(this.className, ' + course_evalution_marks + ',this.value)" required/> </td>';

        str += '<td><input type="text" name="actual_marks[]" class="amw_actual_marks" /> </td>';

        str += '<td><span></span></td>';

        str += '<td><input type="radio" name="isDefault[]" value="' + counter + '" class="amw_isDefault" /></td>';

        str += '<td><input type="radio" name="isAttendance[]" value="' + counter + '" class="amw_isAttendance' + trLen + '" /></td>';

        str += '<td><select name="policy_id[]" required="required" class="form-control"><option value="">Select Option</option><option value="attendance">Attendance</option><option value="best_one">BestOne</option><option value="avarage">Average</option><option value="avarage_top_n">Average of Top N</option><option value="sum">Sum</option><option value="single">Single</option></select></td>';


        str += '<td><a class="btn btn-default btn-sm" id="removedistTrId' + trLen + '" onClick="deleteMarkDistTr(this.id, 0)"><i class="fa  fa-trash-o" style="font-size: 15px;color: red"></i></a></td>';

        str += '</tr>';

        contentBody.append(str);
    }
}
    //*******************
//This function is used to calculate the total percent when add an item into popup. if total percent is more than 100, submit button will disapper instantly.
// if total marks percent is less than 100 then submit button will appear soon. This function is decleared in marks_percent text box in "onblur" event.
//*******************
//
//    function calculateTotalMarksPercent( src ) {
//        var sum = 0,
//            tbl = $(src).closest('tbody');
//
//        tbl.find('input.totalPer').each(function( index, elem ) {
//            var val = parseInt($(elem).val());
//            if( !isNaN( val ) ) {
//                sum += val;
//            }
//        });
//
//        if(sum > 100)
//        {
//            $('.saveInMarksDist').fadeOut(500);
//            $('body').find('.totalPerSum').html('<span class="text-danger">Total marks percent is more than 100.</span>');
//        }
//        else
//        {
//            $('.saveInMarksDist').fadeIn(500);
//            $('body').find('.totalPerSum').html('<strong>Total marks percent is : '+ sum.toFixed(2) +'</strong>');
//        }
//        //console.log("total marks is : "+ sum.toFixed(2));
//    }


