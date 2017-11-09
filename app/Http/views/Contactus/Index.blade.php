@extends("layout.main")

@section("head")
<title>{{Config('constants.web_title')}} <?php if(isset($head_data['title'])) echo "-".$head_data["title"]; ?></title>
<META HTTP-EQUIV="Description" CONTENT="<?php if(isset($head_data['meta_description'])) echo "-".$head_data["meta_description"]; ?>">
<META HTTP-EQUIV="Keywords" CONTENT="<?php if(isset($head_data['meta_keywords'])) echo "-".$head_data["meta_keywords"]; ?>">
<?php if(isset($head_data["og_image"] )) { ?><meta property="og:image" content="<?php echo $head_data["og_image"]; ?>">
<link rel="image_src" type="image/<?php echo $head_data["og_ext"]; ?>" href="<?php echo $head_data["og_image"]; ?>" /><?php } ?>
@endsection

@section("content")   
	<div class="container" style="min-height:500px;border-top:solid 1px #ccc;padding-top:15px;" >
		<div class="row">			
			<div class="col-xs-12 col-sm-6 {{trans('layout.text_align')}} stext" style="padding-top:0px;"><a href="{{URL::asset('').Request::segment(1)}}" class='stext'>{{trans('messages.home')}} &raquo;</a></div>
		</div>
		<?php
		if(count($page)>0){

		?>
		<div class="row"><div class="col-xs-12 text-center" ><p class="title" >{{$page[0]["p_title"]}}</p><br><Br><?php echo $page[0]["p_body"]; ?></div></div>
		<?php
		}
		?>

		<div class="row"><?php if(isset($data["message"])) { ?><div class="col-xs-12 col-sm-8 col-centered text-center col-sm-offset-2 alert <?php echo $data["alert_type"]; ?>"><?php echo $data["message"]; ?></div> <?php } ?></div>


		<div class="row"><div class="col-xs-12">
		<form method="POST" action="<?php echo URL::asset(\Session::get("locale")."/Contactus"); ?>" id="project_form" >
			<div class="form_div">				
				<Div class="row row1">
					<div class="col-sm-3 col-md-4 col-xs-12 form_title2">{{trans('messages.name')}} <font color=red>*</font></div>
					<div class="col-sm-9 col-md-8 col-xs-12 field_div"><input type="text" name="name" id="name" value="<?php if(isset($data["name"])) echo $data["name"]; ?>" class="form-control" data-validation="required" data-validation-error-msg="{{trans('messages.req_field')}}" /></div>
				</div>

				<Div class="row row1">
					<div class="col-sm-3 col-md-4 col-xs-12 form_title2">{{trans('messages.email')}} <font color=red>*</font></div>
					<div class="col-sm-9 col-md-8 col-xs-12 field_div"><input type="email" name="email" id="email" value="<?php if(isset($data["email"])) echo $data["email"]; ?>" class="form-control" data-validation="required" data-validation-error-msg="{{trans('messages.req_field')}}" /></div>
				</div>

				<Div class="row row1">
					<div class="col-sm-3 col-md-4 col-xs-12 form_title2">{{trans('messages.message_subject')}} <font color=red>*</font></div>
					<div class="col-sm-9 col-md-8 col-xs-12 field_div">
						<input type="text" class="form-control" name="subject" id="subject" data-validation="required" data-validation-error-msg="{{trans('messages.req_field')}}" value="<?php if(isset($data["subject"])) echo $data["subject"]; ?>">
					</div>
				</div>
				
				<Div class="row row1">
					<div class="col-sm-3 col-md-4 col-xs-12 form_title2">{{trans('messages.message_body')}} <font color=red>*</font></div>
					<div class="col-sm-9 col-md-8 col-xs-12 field_div">
						<textarea class="form-control" name="body" id="body" data-validation="required" data-validation-error-msg="{{trans('messages.req_field')}}" style="height:80px;" maxlength=300 ><?php if(isset($data["body"])) echo $data["body"]; ?></textarea>
					</div>
				</div>

				<Div class="row row1">
					<div class="col-sm-12 col-md-12 col-xs-12 field_div" align=center><input type="submit" name="submit" id="form_submit" value="{{trans('messages.send_msg_btn')}}" class="btn btn-danger gray-btn" /></div>
				</div>

			</div>
		</form>
		</Div></Div>

		<div class="row"><div class="col-xs-12" style="margin-top:30px;">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3389.0317237977542!2d35.20664831515872!3d31.85135198126134!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzHCsDUxJzA0LjkiTiAzNcKwMTInMzEuOCJF!5e0!3m2!1sen!2sus!4v1496309410727" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div></div>			
		
	</div>


@endsection