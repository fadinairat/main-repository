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
			<div class="col-xs-12 col-sm-6 text-right stext" style="padding-top:0px;"><a href="{{URL::asset('')}}" class='stext'>{{trans("messages.home")}} &raquo;</a><?php echo $data["map"]; ?></div>
		</div>
		<div class="row"><div class="col-xs-12 text-center" ><p class="title" ><?php if(isset($data)) echo $data["title"]; ?></p></div></div>

		<div class="row">
			<?php
			if(isset($list)){
				foreach($list as $item){
				$item = get_object_vars($item);
				?>
				<div class="col-xs-6 col-sm-4 col-md-3" style="height:230px;overflow:hidden;padding:5px;" >
					<?php if($item['c_thumb'] !="" ){ ?><div style="width:100%;border:solid 1px #ccc;overflow:hidden;height:160px;overflow:hidden;"><a href="{{ genLink("Category",$item['c_id'],$item['c_'.\Session::get("prefix").'name']) }}" ><img src="{{ URL::asset('').processPath($item['c_thumb']) }}" class="img-responsive" style="margin-right:auto;margin-left:auto;" ></a></div><?php } ?>
					<div class="text-left text1"><a href="{{ URL::asset('Category/'.genID($item['c_id'])."/".friendly_encode($item['c_'.\Session::get("prefix").'name'])) }}" >{{ $item['c_'.\Session::get("prefix").'name'] }}</a></div>
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