<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h3>View Question Item and Details </h3>
</div>

<div style="padding: 4%; ">
    <h4> Question Paper  # {{$question_item->title }}</h4>
    <table class="table table-striped  table-bordered"  >
        <thead>
            <tr>
                <th>Title</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <table class="table table-striped  table-bordered">
                    @foreach($question_item_details as $values)
                        <tr>
                            <td> {{ $values->title }}</td>
                            <td> {{ $values->answer }}</td>
                        </tr>
                    @endforeach
                    </table>
                </td>
            </tr>
        </tbody>
    </table>

    <a href="" class="pull-right btn-sm btn-default" span class="glyphicon-refresh">Close</a>
    &nbsp;
    </br>
    &nbsp;

</div>

