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
			<div class="col-xs-12 col-sm-6 {{trans('layout.text_align')}} stext" style="padding-top:0px;"><a href="{{URL::asset('').Request::segment(1)}}" class='stext'>{{trans('messages.home')}} &raquo;</a><?php echo $map; ?></div>
		</div>
		<div class="row"><div class="col-xs-12 text-center" ><p class="title" >{{$page["p_title"]}}</p></div></div>
		
		<div class="row" ><div class="col-xs-12 text" >		
			<?php echo filterBody($page['p_body']); ?>

			<ul>
			<?php 
			$menus = App\Http\Models\Menus::getAllMenus(); 
			foreach($menus as $menu){
				if($menu->m_parent==0){
					echo "<li><a href='".URL::asset('').processLink($menu->m_link)."' >".$menu->m_name."</a></li>";	
					foreach($menus as $row){
						$start = 0;
						if($row->m_parent == $menu->m_id){//Sub Menus
							if($start ==0){
								echo "<li><ul>";
								$start =1;
							}
							echo "<li><a href='".URL::asset('').processLink($row->m_link)."' >".$row->m_name."</a></li>";							
						}
						if($start ==1){ echo "</ul></li>"; $start =0;}
					}					
				}				
				//foreach($menus as $row){

				//}
			}
			?>
			</ul>
		</div></div>

	</div>
@endsection