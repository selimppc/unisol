@foreach($datas as $value)

    {{$value->id}}<br>
    {{$value->course_id}}<br>

    {{$value->year->title}}<br>
    {{$value->semester->title}}<br>
    {{$value->course->title}}<br>
    {{$value->course->subject->department->title}}<br>
    <br><br>
@endforeach