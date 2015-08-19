<div class='form-group'>
   {{ Form::label('salary_from', 'Salary From') }}
   {{ Form::text('salary_from', Input::old('salary_from'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('salary_to', 'Salary To') }}
   {{ Form::text('salary_to', Input::old('salary_to'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('tax', 'Tax') }} (%)
   {{ Form::text('tax', Input::old('tax'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('gender', 'Gender') }}
   {{ Form::select('gender', array(''=>'Select Gender','male'=>'Male','female'=>'Female'),Input::old('gender'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('nationality', 'Nationality') }}
   {{ Form::select('nationality', array(''=>'Select your Natinality',
   'afghan' => 'Afghan','albanian' => 'Albanian','algerian' => 'Algerian','american' => 'American',
   'andorran' => 'Andorran','angolan' => 'Angolan','antiguans' => 'Antiguans','argentinean' => 'Argentinean',
   'armenian' => 'Armenian','australian' => 'Australian','austrian' => 'Austrian','azerbaijani' => 'Azerbaijani',
   'bahamian' => 'Bahamian','bahraini' => 'Bahraini','bangladeshi' => 'Bangladeshi','barbadian' => 'Barbadian',
   'barbudans' => 'Barbudans','batswana' => 'Batswana','belarusian' => 'Belarusian','belgian' => 'Belgian',
   'belizean' => 'Belizean','beninese' => 'Beninese','bhutanese' => 'Bhutanese','bolivian' => 'Bolivian',
   'bosnian' => 'Bosnian','brazilian' => 'Brazilian','british' => 'British','bruneian' => 'Bruneian',
   'bulgarian' => 'Bulgarian','burkinabe' => 'Burkinabe','burmese' => 'Burmese','burundian' => 'Burundian',
   'cambodian' => 'Cambodian', 'cameroonian' => 'Cameroonian','canadian' => 'Canadian','cape-verdean' => 'Cape Verdean',
   'central-african' => 'Central African','chadian' => 'Chadian','chilean' => 'Chilean','chinese' => 'Chinese',
   'colombian' => 'Colombian','comoran' => 'Comoran','congolese' => 'Congolese','costa Rican' => 'Costa Rican',
   'croatian' => 'Croatian','cuban' => 'Cuban','cypriot' => 'Cypriot','czech' => 'Czech',
   'danish' => 'Danish','djibouti' => 'Djibouti','dominican' => 'Dominican','dutch' => 'Dutch',
   'east-timorese' => 'East Timorese','ecuadorean' => 'Ecuadorean','egyptian' => 'Egyptian','emirian' => 'Emirian',
   'equatorial-guinean' => 'Equatorial Guinean','eritrean' => 'Eritrean','estonian' => 'Estonian','ethiopian' => 'Ethiopian',
   'fijian' => 'Fijian','filipino' => 'Filipino','finnish' => 'Finnish','french' => 'French',
   'gabonese' => 'Gabonese','gambian' => 'Gambian','georgian' => 'Georgian','german' => 'German',
   'ghanaian' => 'Ghanaian','greek' => 'Greek','grenadian' => 'Grenadian','guatemalan' => 'Guatemalan',
   'guinea-bissauan' => 'Guinea-Bissauan','guinean' => 'Guinean','guyanese' => 'Guyanese','haitian' => 'Haitian',
   'herzegovinian' => 'Herzegovinian','honduran' => 'Honduran','hungarian' => 'Hungarian','i-kiribati' => 'I-Kiribati',
   'icelander' => 'Icelander','indian' => 'Indian','indonesian' => 'Indonesian','iranian' => 'Iranian',
   'iraqi' => 'Iraqi','irish' => 'Irish','israeli' => 'Israeli','italian' => 'Italian',
   'ivorian' => 'Ivorian','jamaican' => 'Jamaican','japanese' => 'Japanese','jordanian' => 'Jordanian',
   'kazakhstani' => 'Kazakhstani','kenyan' => 'Kenyan','kittian-nevisian' => 'Kittian and Nevisian',
   'kuwaiti' => 'Kuwaiti','kyrgyz' => 'Kyrgyz','laotian' => 'Laotian','latvian' => 'Latvian',
   'lebanese' => 'Lebanese','liberian' => 'Liberian','libyan' => 'Libyan','liechtensteiner' => 'Liechtensteiner',
   'lithuanian' => 'Lithuanian','luxembourger' => 'Luxembourger','macedonian' => 'Macedonian','malagasy' => 'Malagasy',
   'malawian' => 'Malawian','malaysian' => 'Malaysian','maldivan' => 'Maldivan','malian' => 'Malian',
   'maltese' => 'Maltese','marshallese' => 'Marshallese','mauritanian' => 'Mauritanian','mauritian' => 'Mauritian',
   'mexican' => 'Mexican','micronesian' => 'Micronesian','moldovan' => 'Moldovan','monacan' => 'Monacan',
   'mongolian' => 'Mongolian','moroccan' => 'Moroccan','mosotho' => 'Mosotho','motswana' => 'Motswana',
   'mozambican' => 'Mozambican','namibian' => 'Namibian','nauruan' => 'nauruan','nepalese' => 'Nepalese',
   'new-zealander' => 'New Zealander','nicaraguan' => 'Nicaraguan','nigerian' => 'Nigerian','nigerien' => 'Nigerien',
   'north Korean' => 'North Korean','northern Irish' => 'Northern Irish','norwegian' => 'Norwegian','omani' => 'Omani',
   'pakistani' => 'Pakistani','palauan' => 'Palauan','panamanian' => 'Panamanian','papua New Guinean' => 'Papua New Guinean',
   'paraguayan' => 'Paraguayan','peruvian' => 'Peruvian','polish' => 'Polish','portuguese' => 'Portuguese',
   'qatari' => 'Qatari','romanian' => 'Romanian','russian' => 'Russian','rwandan' => 'Rwandan',
   'saint-lucian' => 'Saint Lucian','salvadoran' => 'Salvadoran','samoan' => 'Samoan','san-marinese' => 'San Marinese',
   'sao-tomean' => 'Sao Tomean','saudi' => 'Saudi','scottish' => 'Scottish','senegalese' => 'Senegalese',
   'serbian' => 'Serbian','seychellois' => 'Seychellois','sierra-leonean' => 'Sierra Leonean','singaporean' => 'Singaporean',
   'slovakian' => 'Slovakian','slovenian' => 'Slovenian','solomon-islander' => 'Solomon Islander','somali' => 'Somali',
   'south-african' => 'South African', 'south-korean' => 'South Korean','spanish' => 'Spanish','sri-lankan' => 'Sri Lankan',
   'sudanese' => 'Sudanese','surinamer' => 'Surinamer','swazi' => 'Swazi','swedish' => 'Swedish','swiss' => 'Swiss',
   'syrian' => 'Syrian','taiwanese' => 'Taiwanese','tajik' => 'Tajik','tanzanian' => 'Tanzanian',
   'thai' => 'Thai','togolese' => 'Togolese','tongan' => 'Tongan','trinidadian or Tobagonian' => 'Trinidadian or Tobagonian',
   'tunisian' => 'Tunisian','turkish' => 'Turkish', 'tuvaluan' => 'Tuvaluan','ugandan' => 'Ugandan','ukrainian' => 'Ukrainian',
   'uruguayan' => 'Uruguayan','uzbekistani' => 'Uzbekistani','venezuelan' => 'Venezuelan','vietnamese' => 'Vietnamese',
   'welsh' => 'Welsh','yemenite' => 'Yemenite','zambian' => 'Zambian','zimbabwean' => 'Zimbabwean'),Input::old('nationality'),
   ['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('additional_tax_amount', 'Additional Tax Amount') }}
   {{ Form::text('additional_tax_amount', Input::old('additional_tax_amount'),['class'=>'form-control', 'required']) }}
</div>

{{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
<a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

<p>&nbsp;</p>
