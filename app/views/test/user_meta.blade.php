<h1> User Meta </h1>

 {{$userMeta}}

<p>&nbsp;</p>

{{--{{$userMeta['0']['user']->email_address}}--}}


@foreach ($userMeta as $userMeta)
  ID: {{$userMeta->id}} <br>
  User-Id: {{$userMeta->user_id}} <br>
  Fathers_name: {{$userMeta->fathers_name}} <br>
  Mothers_name: {{$userMeta->mothers_name}} <br>
  Fathers_occupation: {{$userMeta->fathers_occupation}} <br>
  Fathers_phone: {{$userMeta->fathers_phone}} <br>
  freedom_fighter: {{$userMeta->freedom_fighter}} <br>
  mothers_occupation: {{$userMeta->mothers_occupation}} <br>
  mothers_phone: {{$userMeta->mothers_phone}} <br>
  national_id: {{$userMeta->national_id}} <br>
  driving_licence: {{$userMeta->driving_licence}} <br>
  marital_status: {{$userMeta->marital_status}} <br>
  nationality: {{$userMeta->nationality}} <br>
  religion: {{$userMeta->religion}} <br>
  signature: {{$userMeta->signature}} <br>
  present_address: {{$userMeta->present_address}} <br>


<br>
    Email: {{$userMeta->user->email_address}}
@endforeach