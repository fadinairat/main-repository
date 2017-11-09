@extends("layout.main")

@section("head")
<title>{{Config('constants.web_title')}} - {{trans('messages.form_title')}} </title>
@endsection

@section("content")   
	<div class="container" style="min-height:500px;border-top:solid 1px #ccc;padding-top:15px;" >
		<!--<div class="{{trans('layout.text_align')}}" ></div>-->

		<div class="title">{{trans('messages.form_title')}}</div>

			<?php            
            if(session()->has('msg')){
                $icon = "";
                if(session()->get('alert_type') =="alert-success") $icon = "<i class='fa fa-check-circle' aria-hidden='true' style='font-size:35px;vertical-align:middle'></i>";
                echo "<div class='row' style='margin-top:15px;' ><div class='text-center col-xs-12 col-sm-8 col-sm-offset-2 col-centered alert ".session()->get('alert_type')."' >".session()->get('msg')." ".$icon."</div></div>";
            }
            //else{
            ?> 
			<div class="col-xs-12" style="background-color:#F1E80F;color:black;padding:15px;margin:15px;border-radius:7px;">
			تعلن جمعية التنمية الزراعية (الاغاثة الزراعية)- مركز تطوير الاعمال الزراعية  بالشراكة وبتمويل مؤسسة التعاون  عن اطلاق مشروع : تكوين الاعمال الزراعية الصغيرة للرياديين الشباب - الضفة الغربية ، وذلك بهدف دعم الشباب الريادي في في تكوين مشاريع ريادية  في القطاع الزراعي والتصنيع الغذائي. حيث ستشرف لجنة من الخبراء على عملية اختيار المستفيدين، فعلى الراغبين بالاستفادة من خدمات مركز تطوير الاعمال الزراعية والتمويل الاستثماري المرافق تعبئة النموذج 
			</div>
			

			<form method="POST" action="Form/Insert" id="project_form" >
			<div class="form_div">
				<Div class="row row1">
					<input type="hidden" name="lang" id="lang" value="{{trans('messages.form_lang')}}" />
					<div class="col-sm-3 col-md-4 col-xs-12 form_title2">{{trans('messages.form_field')}}</div>
					<div class="col-sm-9 col-md-8 col-xs-12 field_div">
						<select name="field" id="field" class="form-control" data-validation="required" data-validation-error-msg="{{trans('messages.req_field')}}">
							<option value=""></option>
							<?php
								foreach($fields as $row){
									$row = get_object_vars($row);
									echo "<option value='".$row['f_id']."'>".$row['f_'.\Session("prefix").'name']."</option>";
								}
							?>
						</select>
					</div>
				</div>

				<Div class="row row1">
					<div class="col-sm-3 col-md-4 col-xs-12 form_title2">{{trans('messages.form_name')}}</div>
					<div class="col-sm-9 col-md-8 col-xs-12 field_div"><input type="text" name="name" id="name" class="form-control" data-validation="required" 		 data-validation-error-msg="{{trans('messages.req_field')}}" /></div>
				</div>

				<Div class="row row1">
					<div class="col-sm-3 col-md-4 col-xs-12 form_title2">{{trans('messages.form_summary')}}</div>
					<div class="col-sm-9 col-md-8 col-xs-12 field_div"><textarea name="summary" id="summary" class="form-control" rows=5 data-validation="required" data-validation-error-msg="{{trans('messages.req_field')}}"></textarea></div>
				</div>

				<Div class="row row1">
					<div class="col-sm-3 col-md-4 col-xs-12 form_title2">{{trans('messages.form_successes')}}</div>
					<div class="col-sm-9 col-md-8 col-xs-12 field_div"><textarea name="successes" id="successes" class="form-control" rows=5  data-validation="required" data-validation-error-msg="{{trans('messages.req_field')}}"></textarea></div>
				</div>

				<Div class="row row1 title1">{{trans('messages.form_team_title')}}</div>
				<Div class="row row1">
					<div class="col-sm-3 col-md-4 col-xs-12 form_title2">{{trans('messages.form_applicant')}}</div>
					<div class="col-sm-9 col-md-8 col-xs-12 field_div">
						<input type="radio" onclick="showgen(true);" checked value="{{trans('messages.form_person')}}" name="applicant"  /> {{trans('messages.form_person')}} &nbsp;&nbsp;
						<input type="radio" onclick="showgen(false);" value="{{trans('messages.form_team')}}" name="applicant"  /> {{trans('messages.form_team')}} 
					</div>
				</div>

				
				<Div class="row row1" id="gen_row" >
					<div class="col-sm-3 col-md-4 col-xs-12 form_title2">{{trans('messages.form_gender')}}</div>
					<div class="col-sm-9 col-md-8 col-xs-12 field_div">
						<input type="radio" checked value="M" name="gender"  /> {{trans('messages.form_male')}} &nbsp;&nbsp;
						<input type="radio" value="F" name="gender"  /> {{trans('messages.form_female')}} 
					</div>
				</div>

				<Div class="row row1">
					<div class="col-sm-3 col-md-4 col-xs-12 form_title2">{{trans('messages.form_applicant_name')}}</div>
					<div class="col-sm-9 col-md-8 col-xs-12 field_div"><textarea name="team_name" id="team_name" class="form-control" rows=2 data-validation="required" data-validation-error-msg="{{trans('messages.req_field')}}" ></textarea></div>
				</div>

				<Div class="row row1">
					<div class="col-sm-3 col-md-4 col-xs-12 form_title2">{{trans('messages.form_emp_status')}}</div>
					<div class="col-sm-9 col-md-8 col-xs-12 field_div">
						<select name="emp_status" id="emp_status" class="form-control" data-validation="required" data-validation-error-msg="{{trans('messages.req_field')}}">
							<option value=""></option>
							<option value="{{trans('messages.status1')}}">{{trans('messages.status1')}}</option>
							<option value="{{trans('messages.status2')}}">{{trans('messages.status2')}}</option>
							<option value="{{trans('messages.status3')}}">{{trans('messages.status3')}}</option>
							<option value="{{trans('messages.status4')}}">{{trans('messages.status4')}}</option>
						</select>
					</div>
				</div>

				<Div class="row row1">
					<div class="col-sm-3 col-md-4 col-xs-12 form_title2">{{trans('messages.form_city')}}</div>
					<div class="col-sm-9 col-md-8 col-xs-12 field_div">
						<select name="city" id="city" class="form-control" data-validation="required" data-validation-error-msg="{{trans('messages.req_field')}}" >
							<option value=""></option>
							<?php
								foreach($cities as $row){
									$row = get_object_vars($row);
									echo "<option value='".$row['city_id']."'>".$row['city_'.\Session("prefix").'name']."</option>";
								}
							?>
						</select>
					</div>
				</div>

				<Div class="row row1">
					<div class="col-sm-3 col-md-4 col-xs-12 form_title2">{{trans('messages.form_age')}}</div>
					<div class="col-sm-9 col-md-8 col-xs-12 field_div"><input type="number" name="age" id="age" class="form-control" data-validation="required" data-validation-error-msg="{{trans('messages.req_field')}}" /></div>
				</div>

				<Div class="row row1">
					<div class="col-sm-3 col-md-4 col-xs-12 form_title2">{{trans('messages.form_email')}}</div>
					<div class="col-sm-9 col-md-8 col-xs-12 field_div"><input type="email" name="email" id="email" class="form-control" data-validation="required email" data-validation-error-msg="{{trans('messages.chk_email')}}"  /></div>
				</div>

				<Div class="row row1">
					<div class="col-sm-3 col-md-4 col-xs-12 form_title2">{{trans('messages.form_mobile')}}</div>
					<div class="col-sm-9 col-md-8 col-xs-12 field_div"><input type="text" name="mobile" id="mobile" class="form-control" data-validation="required" data-validation-error-msg="{{trans('messages.req_field')}}" /></div>
				</div>

				<Div class="row row1">
					<div class="col-sm-12 col-md-12 col-xs-12 field_div" align=center><input type="submit" name="submit" id="form_submit" value="{{trans('messages.form_submit')}}" class="btn btn-danger gray-btn" /></div>
				</div>

			</div>
		</form>

			<?php	
			//}
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