<!DOCTYPE html>
<html lang="en">
	<head>
		{{ HTML::style('assets/etsb/etsb_css/bootstrap/bootstrap.min.css') }}
		{{ HTML::style('assets/etsb/etsb_css/datepicker/datepicker.css') }}
    </head>

	<body>


		<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>

			<div class="main-content">

				<div class="page-content">
					<div class="page-header position-relative">
						<h1>
							Form Elements
							<small>
								<i class="icon-double-angle-right"></i>
								Common form elements and layouts
							</small>
						</h1>
					</div><!--/.page-header-->

					<div class="row-fluid">
						<div class="span12">
							<!--PAGE CONTENT BEGINS-->

							<form class="form-horizontal" />

									<div class="row-fluid">
									<div class="span4">
										<div class="widget-box">

											<div class="widget-body">
												<div class="widget-main">
													<div class="row-fluid">
														<label for="id-date-picker-1">Date Picker</label>
													</div>

													<div class="control-group">
														<div class="row-fluid input-append">
															<input class="span10 date-picker" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy" />
															<span class="add-on">
																<i class="icon-calendar"></i>
															</span>
														</div>
													</div>


												</div>
											</div>


										</div>
									</div>

								</div>
							</form>

						</div><!--/.span-->
					</div><!--/.row-fluid-->
				</div><!--/.page-content-->


			</div><!--/.main-content-->
		</div><!--/.main-container-->

    <div class="main-container container-fluid">
        <div class="main-content">
            <h3>Factorial - Calculator</h3>
                <div>
                    {{ Form::open(array('url'=>'date-picker', 'class'=>'form-signin')) }}
                        <div>
                            <div class="form-group">
                                {{Form::text('factorial', null, ['class'=>'form-control'])}}
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn"> Click (n!)</button>
                        </div>
                    {{ Form::close() }}
                </div>

                {{isset($factorial) ? $factorial : "please input numbers"}}
        </div>
    </div>

    @foreach($data as $values)
        Year: {{$values->year_id}} <br>
        @foreach($values->semesterByYear as $semester)
            &nbsp; &nbsp; &nbsp;  Semester--: {{$semester->semester_id}}  <br>
            @foreach($semester->courseBySemester as $course)
                &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;  Course--: {{$course->course_id}}  <br>
            @endforeach
        @endforeach
         <br> <br>
    @endforeach


		{{ HTML::script('assets/js/jquery-2.1.1.min.js') }}
        {{ HTML::script('assets/etsb/etsb_js/bootstrap/bootstrap.min.js')}}
		{{ HTML::script('assets/etsb/etsb_js/datepicker/bootstrap-datepicker.min.js')}}
		<script type="text/javascript">
			$(function() {
				$('.date-picker').datepicker().next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
			});
		</script>
	</body>
</html>
