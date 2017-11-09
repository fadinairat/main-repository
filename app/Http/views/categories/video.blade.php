@extends("layout.main")

@section("head")
<title>{{Config('constants.web_title')}} - {{ $data["head_title"] }}</title>
<META HTTP-EQUIV="Description" CONTENT="{{$data["meta_description"]}}">
<META HTTP-EQUIV="Keywords" CONTENT="{{$data["meta_keywords"]}}">
<?php if(isset($data["og_image"] )) { ?><meta property="og:image" content="<?php echo $data["og_image"]; ?>">
<link rel="image_src" type="image/<?php echo $data["og_ext"]; ?>" href="<?php echo $data["og_image"]; ?>" /><?php } ?>
@endsection

@section("content")   
	<div class="container" style="min-height:500px;border-top:solid 1px #ccc;padding-top:15px;" >
		<div class="row">			
			<div class="col-xs-12 col-sm-6 text-right stext" style="padding-top:0px;"><a href="{{URL::asset('')}}" class='stext'>{{trans("messages.home")}} &raquo;</a><?php echo $map; ?></div>
		</div>
		<?php 
		if(isset($video)){
		
		?>
		<div class="row"><div class="col-xs-12 text-center" ><p class="title" ><?php echo $video['f_'.\Session::get("prefix").'title']; ?></p></div></div>


		<div class="row video_body" >
			<div class="col-xs-12 text-center">
			<?php echo $video['f_source']; ?>
			</div>
			<div class="col-xs-12">			
			<?php echo $video['f_'.\Session::get("prefix").'description']; ?>
			</div>
		</div>
		
		<?php
		}
		?>
	</div>
@endsection