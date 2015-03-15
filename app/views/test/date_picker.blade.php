<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />

		<link href="assets/assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="assets/assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="assets/assets/css/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!--page specific plugin styles-->

		<link rel="stylesheet" href="assets/assets/css/jquery-ui-1.10.3.custom.min.css" />
		<link rel="stylesheet" href="assets/assets/css/chosen.css" />
		<link rel="stylesheet" href="assets/assets/css/datepicker.css" />
		<link rel="stylesheet" href="assets/assets/css/bootstrap-timepicker.css" />
		<link rel="stylesheet" href="assets/assets/css/daterangepicker.css" />
		<link rel="stylesheet" href="assets/assets/css/colorpicker.css" />

		<!--fonts-->

		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

		<!--ace styles-->

		<link rel="stylesheet" href="assets/assets/css/ace.min.css" />
		<link rel="stylesheet" href="assets/assets/css/ace-responsive.min.css" />
		<link rel="stylesheet" href="assets/assets/css/ace-skins.min.css" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/assets/css/ace-ie.min.css" />
		<![endif]-->

		<!--inline styles related to this page-->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

	<body>
		

		<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>

			

			<div class="main-content">
				<div class="breadcrumbs" id="breadcrumbs">
					

					<div class="nav-search" id="nav-search">
						<form class="form-search" />
							<span class="input-icon">
								<input type="text" placeholder="Search ..." class="input-small nav-search-input" id="nav-search-input" autocomplete="off" />
								<i class="icon-search nav-search-icon"></i>
							</span>
						</form>
					</div><!--#nav-search-->
				</div>

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

		<!--[if !IE]>-->

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

		<!--<![endif]-->


		<script src="assets/assets/js/bootstrap.min.js"></script>

		<script src="assets/assets/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="assets/assets/js/chosen.jquery.min.js"></script>
		<script src="assets/assets/js/date-time/bootstrap-datepicker.min.js"></script>
		<script src="assets/assets/js/jquery.autosize-min.js"></script>
		<script src="assets/assets/js/jquery.maskedinput.min.js"></script>
		<script src="assets/assets/js/ace-elements.min.js"></script>

	

		<script type="text/javascript">
			$(function() {
				
				$('.date-picker').datepicker().next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
			});
		</script>
	</body>
</html>
