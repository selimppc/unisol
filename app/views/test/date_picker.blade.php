<!DOCTYPE html>
<!-- saved from url=(0051)http://eonasdan.github.io/bootstrap-datetimepicker/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">



        <link rel="stylesheet" type="text/css" media="screen" href="file:///C:/Users/ASUS/Desktop/Bootstrap%203%20Datepicker_files/bootstrap.min.css">

        <link href="http://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/d004434a5ff76e7b97c8b07c01f34ca69e635d97/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

	<script type="text/javascript" src="./Bootstrap 3 Datepicker_files/jquery-2.1.1.min.js"></script>
	
	<script type="text/javascript" src="./Bootstrap 3 Datepicker_files/bootstrap.min.js"></script>
	<script src="./Bootstrap 3 Datepicker_files/moment-with-locales.js"></script>
	<script src="./Bootstrap 3 Datepicker_files/bootstrap-datetimepicker.js"></script>
	
    </head>

    <body>


        <div class="container">
			
				<div class="col-md-9" role="main">

<h1 id="bootstrap-3-datepicker-v4-docs"> Datepicker </h1>


<h3 id="minimum-setup">Minimum Setup</h3>
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <div class="input-group date" id="datetimepicker1">
                    <input type="text" class="form-control">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
        </script>
    </div>
</div>

<h4 id="code">Code</h4>
<pre><code>&lt;div class="container"&gt;
&lt;div class="row"&gt;
&lt;div class='col-sm-6'&gt;
&lt;div class="form-group"&gt;
&lt;div class='input-group date' id='datetimepicker1'&gt;
&lt;input type='text' class="form-control" /&gt;
&lt;span class="input-group-addon"&gt;&lt;span class="glyphicon glyphicon-calendar"&gt;&lt;/span&gt;
&lt;/span&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;script type="text/javascript"&gt;
$(function () {
$('#datetimepicker1').datetimepicker();
});
&lt;/script&gt;
&lt;/div&gt;
&lt;/div&gt;
</code></pre>

<hr>
<h3 id="using-locales">Using Locales</h3>
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <div class="input-group date" id="datetimepicker2">
                    <input type="text" class="form-control">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker2').datetimepicker({
                    locale: 'ru'
                });
            });
        </script>
    </div>
</div>

<h4 id="code_1">Code</h4>
<pre><code>&lt;div class="container"&gt;
&lt;div class="row"&gt;
&lt;div class='col-sm-6'&gt;
&lt;div class="form-group"&gt;
&lt;div class='input-group date' id='datetimepicker2'&gt;
&lt;input type='text' class="form-control" /&gt;
&lt;span class="input-group-addon"&gt;&lt;span class="glyphicon glyphicon-calendar"&gt;&lt;/span&gt;
&lt;/span&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;script type="text/javascript"&gt;
$(function () {
$('#datetimepicker2').datetimepicker({
locale: 'ru'
});
});
&lt;/script&gt;
&lt;/div&gt;
&lt;/div&gt;
</code></pre>

<hr>
<h3 id="custom-formats">Custom Formats</h3>
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <div class="input-group date" id="datetimepicker3">
                    <input type="text" class="form-control">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker3').datetimepicker({
                    format: 'LT'
                });
            });
        </script>
    </div>
</div>

<h4 id="code_2">Code</h4>
<pre><code>&lt;div class="container"&gt;
&lt;div class="row"&gt;
&lt;div class='col-sm-6'&gt;
&lt;div class="form-group"&gt;
&lt;div class='input-group date' id='datetimepicker3'&gt;
&lt;input type='text' class="form-control" /&gt;
&lt;span class="input-group-addon"&gt;&lt;span class="glyphicon glyphicon-time"&gt;&lt;/span&gt;
&lt;/span&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;script type="text/javascript"&gt;
$(function () {
$('#datetimepicker3').datetimepicker({
format: 'LT'
});
});
&lt;/script&gt;
&lt;/div&gt;
&lt;/div&gt;
</code></pre>

<hr>
<h3 id="no-icon-input-field-only">No Icon (input field only):</h3>
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <input type="text" class="form-control" id="datetimepicker4">
        </div>
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker4').datetimepicker();
            });
        </script>
    </div>
</div>

<h4 id="code_3">Code</h4>
<pre><code>&lt;div class="container"&gt;
&lt;div class="row"&gt;
&lt;div class='col-sm-6'&gt;
&lt;input type='text' class="form-control" id='datetimepicker4'/&gt;
&lt;/div&gt;
&lt;script type="text/javascript"&gt;
$(function () {
$('#datetimepicker4').datetimepicker();
});
&lt;/script&gt;
&lt;/div&gt;
&lt;/div&gt;
</code></pre>

<hr>
<h3 id="enableddisabled-dates">Enabled/Disabled Dates</h3>
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <div class="input-group date" id="datetimepicker5">
                    <input type="text" class="form-control">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker5').datetimepicker({
                    defaultDate: "11/1/2013",
                    disabledDates: [
                        moment("12/25/2013"),
                        new Date(2013, 11 - 1, 21),
                        "11/22/2013 00:53"
                    ]
                });
            });
        </script>
    </div>
</div>

<h4 id="code_4">Code</h4>
<pre><code>&lt;div class="container"&gt;
&lt;div class="row"&gt;
&lt;div class='col-sm-6'&gt;
&lt;div class="form-group"&gt;
&lt;div class='input-group date' id='datetimepicker5'&gt;
&lt;input type='text' class="form-control" /&gt;
&lt;span class="input-group-addon"&gt;&lt;span class="glyphicon glyphicon-calendar"&gt;&lt;/span&gt;
&lt;/span&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;script type="text/javascript"&gt;
$(function () {
$('#datetimepicker5').datetimepicker({
defaultDate: "11/1/2013",
disabledDates: [
moment("12/25/2013"),
new Date(2013, 11 - 1, 21),
"11/22/2013 00:53"
]
});
});
&lt;/script&gt;
&lt;/div&gt;
&lt;/div&gt;
</code></pre>

<hr>
<h3 id="linked-pickers">Linked Pickers</h3>
<div class="container">
    <div class="col-md-5">
        <div class="form-group">
            <div class="input-group date" id="datetimepicker6">
                <input type="text" class="form-control">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="form-group">
            <div class="input-group date" id="datetimepicker7">
                <input type="text" class="form-control">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function () {
        $('#datetimepicker6').datetimepicker();
        $('#datetimepicker7').datetimepicker();
        $("#datetimepicker6").on("dp.change", function (e) {
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        });
        $("#datetimepicker7").on("dp.change", function (e) {
            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
        });
    });
</script>

<h4 id="code_5">Code</h4>
<pre><code>&lt;div class="container"&gt;
&lt;div class='col-md-5'&gt;
&lt;div class="form-group"&gt;
&lt;div class='input-group date' id='datetimepicker6'&gt;
&lt;input type='text' class="form-control" /&gt;
&lt;span class="input-group-addon"&gt;&lt;span class="glyphicon glyphicon-calendar"&gt;&lt;/span&gt;
&lt;/span&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;div class='col-md-5'&gt;
&lt;div class="form-group"&gt;
&lt;div class='input-group date' id='datetimepicker7'&gt;
&lt;input type='text' class="form-control" /&gt;
&lt;span class="input-group-addon"&gt;&lt;span class="glyphicon glyphicon-calendar"&gt;&lt;/span&gt;
&lt;/span&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;script type="text/javascript"&gt;
$(function () {
$('#datetimepicker6').datetimepicker();
$('#datetimepicker7').datetimepicker();
$("#datetimepicker6").on("dp.change",function (e) {
$('#datetimepicker7').data("DateTimePicker").minDate(e.date);
});
$("#datetimepicker7").on("dp.change",function (e) {
$('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
});
});
&lt;/script&gt;
</code></pre>

<hr>
<h3 id="custom-icons">Custom Icons</h3>
<div class="container">
    <div class="col-sm-6" style="height:130px;">
        <div class="form-group">
            <div class="input-group date" id="datetimepicker8">
                <input type="text" class="form-control">
                <span class="input-group-addon">
                    <span class="fa fa-calendar">
                    </span>
                </span>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker8').datetimepicker({
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                }
            });
        });
    </script>
</div>

<h4 id="code_6">Code</h4>
<pre><code>&lt;div class="container"&gt;
&lt;div class="col-sm-6" style="height:130px;"&gt;
&lt;div class="form-group"&gt;
&lt;div class='input-group date' id='datetimepicker8'&gt;
&lt;input type='text' class="form-control" /&gt;
&lt;span class="input-group-addon"&gt;&lt;span class="fa fa-calendar"&gt;
&lt;/span&gt;
&lt;/span&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;script type="text/javascript"&gt;
$(function () {
$('#datetimepicker8').datetimepicker({
icons: {
time: "fa fa-clock-o",
date: "fa fa-calendar",
up: "fa fa-arrow-up",
down: "fa fa-arrow-down"
}
});
});
&lt;/script&gt;
&lt;/div&gt;
</code></pre>

<hr>
<h3 id="view-mode">View Mode</h3>
<div class="container">
    <div class="col-sm-6" style="height:130px;">
        <div class="form-group">
            <div class="input-group date" id="datetimepicker9">
                <input type="text" class="form-control">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar">
                    </span>
                </span>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker9').datetimepicker({
                viewMode: 'years'
            });
        });
    </script>
</div>

<h4 id="code_7">Code</h4>
<pre><code>&lt;div class="container"&gt;
&lt;div class="col-sm-6" style="height:130px;"&gt;
&lt;div class="form-group"&gt;
&lt;div class='input-group date' id='datetimepicker9'&gt;
&lt;input type='text' class="form-control" /&gt;
&lt;span class="input-group-addon"&gt;&lt;span class="glyphicon glyphicon-calendar"&gt;
&lt;/span&gt;
&lt;/span&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;script type="text/javascript"&gt;
$(function () {
$('#datetimepicker9').datetimepicker({
viewMode: 'years'
});
});
&lt;/script&gt;
&lt;/div&gt;
</code></pre>

<hr>
<h3 id="min-view-mode">Min View Mode</h3>
<div class="container">
    <div class="col-sm-6" style="height:130px;">
        <div class="form-group">
            <div class="input-group date" id="datetimepicker10">
                <input type="text" class="form-control">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar">
                    </span>
                </span>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker10').datetimepicker({
                viewMode: 'years',
                format: 'MM/YYYY'
            });
        });
    </script>
</div>

<h4 id="code_8">Code</h4>
<pre><code>&lt;div class="container"&gt;
&lt;div class="col-sm-6" style="height:130px;"&gt;
&lt;div class="form-group"&gt;
&lt;div class='input-group date' id='datetimepicker10'&gt;
&lt;input type='text' class="form-control" /&gt;
&lt;span class="input-group-addon"&gt;&lt;span class="glyphicon glyphicon-calendar"&gt;
&lt;/span&gt;
&lt;/span&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;script type="text/javascript"&gt;
$(function () {
$('#datetimepicker10').datetimepicker({
viewMode: 'years',
format: 'MM/YYYY'
});
});
&lt;/script&gt;
&lt;/div&gt;
</code></pre>

<hr>
<h3 id="disabled-days-of-the-week">Disabled Days of the Week</h3>
<div class="container">
    <div class="col-sm-6" style="height:130px;">
        <div class="form-group">
            <div class="input-group date" id="datetimepicker11">
                <input type="text" class="form-control">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar">
                    </span>
                </span>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker11').datetimepicker({
                daysOfWeekDisabled: [0, 6]
            });
        });
    </script>
</div>

<h4 id="code_9">Code</h4>
<pre><code>&lt;div class="container"&gt;
&lt;div class="col-sm-6" style="height:130px;"&gt;
&lt;div class="form-group"&gt;
&lt;div class='input-group date' id='datetimepicker11'&gt;
&lt;input type='text' class="form-control" /&gt;
&lt;span class="input-group-addon"&gt;&lt;span class="glyphicon glyphicon-calendar"&gt;
&lt;/span&gt;
&lt;/span&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;script type="text/javascript"&gt;
$(function () {
$('#datetimepicker11').datetimepicker({
daysOfWeekDisabled: [0,6]
});
});
&lt;/script&gt;
&lt;/div&gt;
</code></pre>

<hr>
<h3 id="inline">Inline</h3>
<div class="container">
    <div class="col-sm-6">
        <div class="form-group">
            <div class="row">
                <div class="col-md-8">
                    <div id="datetimepicker12"><div class="bootstrap-datetimepicker-widget timepicker-sbs" style="display: block;"><div class="row"><div class="datepicker col-sm-6"><div class="datepicker-days" style="display: block;"><table class="table-condensed"><thead><tr><th class="prev" data-action="previous"><span class="glyphicon glyphicon-chevron-left"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5">March 2015</th><th class="next" data-action="next"><span class="glyphicon glyphicon-chevron-right"></span></th></tr><tr><th class="dow">Su</th><th class="dow">Mo</th><th class="dow">Tu</th><th class="dow">We</th><th class="dow">Th</th><th class="dow">Fr</th><th class="dow">Sa</th></tr></thead><tbody><tr><td data-action="selectDay" class="day weekend">1</td><td data-action="selectDay" class="day">2</td><td data-action="selectDay" class="day">3</td><td data-action="selectDay" class="day">4</td><td data-action="selectDay" class="day">5</td><td data-action="selectDay" class="day">6</td><td data-action="selectDay" class="day weekend">7</td></tr><tr><td data-action="selectDay" class="day weekend">8</td><td data-action="selectDay" class="day">9</td><td data-action="selectDay" class="day">10</td><td data-action="selectDay" class="day">11</td><td data-action="selectDay" class="day active today">12</td><td data-action="selectDay" class="day">13</td><td data-action="selectDay" class="day weekend">14</td></tr><tr><td data-action="selectDay" class="day weekend">15</td><td data-action="selectDay" class="day">16</td><td data-action="selectDay" class="day">17</td><td data-action="selectDay" class="day">18</td><td data-action="selectDay" class="day">19</td><td data-action="selectDay" class="day">20</td><td data-action="selectDay" class="day weekend">21</td></tr><tr><td data-action="selectDay" class="day weekend">22</td><td data-action="selectDay" class="day">23</td><td data-action="selectDay" class="day">24</td><td data-action="selectDay" class="day">25</td><td data-action="selectDay" class="day">26</td><td data-action="selectDay" class="day">27</td><td data-action="selectDay" class="day weekend">28</td></tr><tr><td data-action="selectDay" class="day weekend">29</td><td data-action="selectDay" class="day">30</td><td data-action="selectDay" class="day">31</td><td data-action="selectDay" class="day new">1</td><td data-action="selectDay" class="day new">2</td><td data-action="selectDay" class="day new">3</td><td data-action="selectDay" class="day new weekend">4</td></tr></tbody></table></div><div class="datepicker-months" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" data-action="previous"><span class="glyphicon glyphicon-chevron-left"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5">2015</th><th class="next" data-action="next"><span class="glyphicon glyphicon-chevron-right"></span></th></tr></thead><tbody><tr><td colspan="7"><span data-action="selectMonth" class="month">Jan</span><span data-action="selectMonth" class="month">Feb</span><span data-action="selectMonth" class="month active">Mar</span><span data-action="selectMonth" class="month">Apr</span><span data-action="selectMonth" class="month">May</span><span data-action="selectMonth" class="month">Jun</span><span data-action="selectMonth" class="month">Jul</span><span data-action="selectMonth" class="month">Aug</span><span data-action="selectMonth" class="month">Sep</span><span data-action="selectMonth" class="month">Oct</span><span data-action="selectMonth" class="month">Nov</span><span data-action="selectMonth" class="month">Dec</span></td></tr></tbody></table></div><div class="datepicker-years" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" data-action="previous"><span class="glyphicon glyphicon-chevron-left"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5">2010-2021</th><th class="next" data-action="next"><span class="glyphicon glyphicon-chevron-right"></span></th></tr></thead><tbody><tr><td colspan="7"><span data-action="selectYear" class="year">2010</span><span data-action="selectYear" class="year">2011</span><span data-action="selectYear" class="year">2012</span><span data-action="selectYear" class="year">2013</span><span data-action="selectYear" class="year">2014</span><span data-action="selectYear" class="year active">2015</span><span data-action="selectYear" class="year">2016</span><span data-action="selectYear" class="year">2017</span><span data-action="selectYear" class="year">2018</span><span data-action="selectYear" class="year">2019</span><span data-action="selectYear" class="year">2020</span><span data-action="selectYear" class="year">2021</span></td></tr></tbody></table></div></div><div class="timepicker col-sm-6"><div class="timepicker-picker"><table class="table-condensed"><tbody><tr><td><a href="http://eonasdan.github.io/bootstrap-datetimepicker/#" tabindex="-1" class="btn" data-action="incrementHours"><span class="glyphicon glyphicon-chevron-up"></span></a></td><td class="separator"></td><td><a href="http://eonasdan.github.io/bootstrap-datetimepicker/#" tabindex="-1" class="btn" data-action="incrementMinutes"><span class="glyphicon glyphicon-chevron-up"></span></a></td><td class="separator"></td></tr><tr><td><span class="timepicker-hour" data-time-component="hours" data-action="showHours">12</span></td><td class="separator">:</td><td><span class="timepicker-minute" data-time-component="minutes" data-action="showMinutes">25</span></td><td><button class="btn btn-primary" data-action="togglePeriod">PM</button></td></tr><tr><td><a href="http://eonasdan.github.io/bootstrap-datetimepicker/#" tabindex="-1" class="btn" data-action="decrementHours"><span class="glyphicon glyphicon-chevron-down"></span></a></td><td class="separator"></td><td><a href="http://eonasdan.github.io/bootstrap-datetimepicker/#" tabindex="-1" class="btn" data-action="decrementMinutes"><span class="glyphicon glyphicon-chevron-down"></span></a></td><td class="separator"></td></tr></tbody></table></div><div class="timepicker-hours" style="display: none;"><table class="table-condensed"><tbody><tr><td data-action="selectHour" class="hour">12</td><td data-action="selectHour" class="hour">01</td><td data-action="selectHour" class="hour">02</td><td data-action="selectHour" class="hour">03</td></tr><tr><td data-action="selectHour" class="hour">04</td><td data-action="selectHour" class="hour">05</td><td data-action="selectHour" class="hour">06</td><td data-action="selectHour" class="hour">07</td></tr><tr><td data-action="selectHour" class="hour">08</td><td data-action="selectHour" class="hour">09</td><td data-action="selectHour" class="hour">10</td><td data-action="selectHour" class="hour">11</td></tr></tbody></table></div><div class="timepicker-minutes" style="display: none;"><table class="table-condensed"><tbody><tr><td data-action="selectMinute" class="minute">00</td><td data-action="selectMinute" class="minute">05</td><td data-action="selectMinute" class="minute">10</td><td data-action="selectMinute" class="minute">15</td></tr><tr><td data-action="selectMinute" class="minute">20</td><td data-action="selectMinute" class="minute">25</td><td data-action="selectMinute" class="minute">30</td><td data-action="selectMinute" class="minute">35</td></tr><tr><td data-action="selectMinute" class="minute">40</td><td data-action="selectMinute" class="minute">45</td><td data-action="selectMinute" class="minute">50</td><td data-action="selectMinute" class="minute">55</td></tr></tbody></table></div></div></div><li class="picker-switch accordion-toggle"><table class="table-condensed"><tbody><tr></tr></tbody></table></li></div></div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker12').datetimepicker({
                inline: true,
		sideBySide: true
            });
        });
    </script>
</div>

<h4 id="code_10">Code</h4>
<pre><code>&lt;div class="container"&gt;
&lt;div class="col-sm-6"&gt;
&lt;div class="form-group"&gt;
&lt;div class='input-group date' id='datetimepicker12'&gt;
&lt;input type='text' class="form-control" /&gt;
&lt;span class="input-group-addon"&gt;&lt;span class="glyphicon glyphicon-calendar"&gt;
&lt;/span&gt;
&lt;/span&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;script type="text/javascript"&gt;
$(function () {
$('#datetimepicker12').datetimepicker({
inline: true,
sideBySide: true
});
});
&lt;/script&gt;
&lt;/div&gt;
</code></pre>

</div>
			</div>
        </div>

        

        
    

</body></html>