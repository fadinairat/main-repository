@extends("layout.main")

@section("head")
<title>{{Config('constants.web_title')}} - {{trans('messages.form_title')}} </title>
@endsection

@section("content")   
	<div class="container" style="min-height:500px;border-top:solid 1px #ccc;padding-top:15px;" >
		<!--<div class="{{trans('layout.text_align')}}" ></div>-->

		<div class="title">{{trans('messages.register_title')}}</div>

			<?php
			if(isset($data["message"]) && $data["message"]!=""){
				?>
				<div class="row" style="margin-top:30px;"><div class='col-centered col-xs-12 col-sm-8 col-sm-offset-2 alert {{$data["alert_type"]}} text-center'>{!! $data["message"] !!}</div></div>
				<?php
			}
			{
			?>
			<form method="POST" action="Login" id="project_form" >
			<div class="form_div">				
				<br><br>
				<Div class="row row1">
					<div class="col-sm-3 col-md-4 col-xs-12 form_title2">{{trans('messages.username')}}</div>
					<div class="col-sm-9 col-md-8 col-xs-12 field_div"><input type="email" name="username" id="username" value="<?php if(isset($data["username"])) echo $data["username"]; ?>" class="form-control" data-validation="required" data-validation-error-msg="{{trans('messages.req_field')}}"></div>
				</div>

				<Div class="row row1">
					<div class="col-sm-3 col-md-4 col-xs-12 form_title2">{{trans('messages.password')}}</div>
					<div class="col-sm-9 col-md-8 col-xs-12 field_div"><input type="password" name="password" id="password" class="form-control" data-validation="required" data-validation-error-msg="{{trans('messages.req_field')}}"></div>
				</div>

				<Div class="row row1">
					<div class="col-xs-12 form_title2 text-center"><a href="<?php echo URL::asset('Register'); ?>" >{{ trans('messages.register_as_new') }}</a></div>
				</div>

				
				<Div class="row row1">
					<div class="col-sm-12 col-md-12 col-xs-12 field_div" align=center><input type="submit" name="submit" id="form_submit" value="{{trans('messages.login')}}" class="btn btn-danger gray-btn" /></div>
				</div>

			</div>
		</form>

			<?php	
			}
		?>
		
	</div>
@endsection

@section('footer_js')
    <!--<script src="{{ URL::asset('public/assets/js/jquery.form-validator.min.js') }}"></script>-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js" /></script>
    <script type="text/javascript">
    	$(document).ready(function () {
    		$.validate({
			  form : '#project_form',
			   modules : 'html5'
			});
    	});

    	function showgen(show){
    		if(show){
    			$("#gen_row").show();
    		}
    		else $("#gen_row").hide();
    	}
    </script>
@stop