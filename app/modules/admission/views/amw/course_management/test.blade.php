@foreach($model as $value)
    Course Management ID: {{ $value->id }} <br>
    Degree Title: {{ $value->relDegree->title }} <br>
    Department Title: {{ $value->relDegree->relDepartment->title }} <br>
    <br>
@endforeach