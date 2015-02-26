<h1>Dropdown</h1>
{{ Form::open() }}
        <select id="make" name="make">
            <option>Select Car Make</option>
            <option value="1">Toyota</option>
            <option value="2">Honda</option>
            <option value="3">Mercedes</option>
        </select>
        <br>
        <select id="model" name="model">
            <option>Please choose car make first</option>
        </select>
    {{ Form::close();}}