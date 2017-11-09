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
		<div class="row"><div class="col-xs-12 text-center" ><p class="title" ><?php echo $category["c_ar_name"]; ?></p></div></div>

		<?php if($category["c_ar_description"]!="") { ?><div class="row"><div class="col-xs-12 text" ><?php echo filterBody($category["c_ar_description"]) ?></div></div><?php } ?>

		<div class="row">
			<?php
			if(isset($pages)){
				foreach($pages as $page){
				?>
				<div class="col-xs-6 col-sm-4 col-md-3" style="height:230px;overflow:hidden;padding:5px;" >
					<?php if($page->p_thumb !="" ){ ?><div style="width:100%;border:solid 1px #ccc;overflow:hidden;height:160px;overflow:hidden;"><a href="{{ URL::asset('Article/'.genID($page->p_id)."/".friendly_encode($page->p_title)) }}" ><img src="{{ URL::asset('').processPath($page->p_thumb) }}" class="img-responsive" style="margin-right:auto;margin-left:auto;" ></a></div><?php } ?>
					<div class="text-left text1"><a href="{{ URL::asset('Article/'.genID($page->p_id)."/".friendly_encode($page->p_title)) }}" >{{ $page->p_title }}</a></div>
				</div>
				<?php
				}
			}
			?>
		</div>
		<div class="row"><div class="col-xs-12 text-center" >
			<?php if(isset($pages)) echo $pages->render(); ?>
		</div></div>

	</div>
@endsection