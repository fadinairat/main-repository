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
		<div class="row"><div class="col-xs-12 text-center" ><p class="title" >{{trans('messages.search_result')}}</p></div></div>

		<div class="row"><?php if(isset($data["message"])) { ?><div class="col-xs-12 col-sm-8 col-centered text-center col-sm-offset-2 alert <?php echo $data["alert_type"]; ?>"><?php echo $data["message"]; ?></div> <?php } ?></div>

		<div class="row">
			<?php
			if(isset($list)){
				foreach($list as $item){
				?>
				<div class="col-xs-6 col-sm-4 col-md-3 text-center" style="height:230px;overflow:hidden;" >
					<?php if($item->p_thumb !="" ){ ?><div style="width:100%;border:solid 1px #ccc;overflow:hidden;height:160px;overflow:hidden;"><a href="{{ URL::asset(\Session::get('locale').'/Article/'.genID($item->p_id)."/".friendly_encode($item->p_title)) }}" ><img src="{{ URL::asset('').processPath($item->p_thumb) }}" class="img-responsive" style="margin-right:auto;margin-left:auto;" ></a></div><?php } ?>
					<div class="text1 text-center"><a href="{{ URL::asset(\Session::get('locale').'/Article/'.genID($item->p_id)."/".friendly_encode($item->p_title)) }}" >{{ $item->p_title }}</a></div>
				</div>
				<?php
				}
			}
			?>
		</div>
		
		<div class="row"><div class="col-xs-12 text-center" >
			<?php if(isset($list)) echo $list->render(); ?>
		</div></div>

	</div>
@endsection