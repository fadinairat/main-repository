@extends("layout.main")

@section("head")
<title>{{Config('constants.web_title')}} - {{trans('messages.form_title')}} </title>
<style>
.bee_title{
	font-weight:bold;
	color:#afaa28;
	font-family:"{{ trans("messages.font_bold") }}";
}
.bee_box{
	display:inline-table;
	font-weight:bold;
	font-family:"{{ trans("messages.font_bold") }}";
	width:30px;height:30px;background-color:#7A981E;color:white;text-align:center;
	border-radius:50%;
}
.right_cell{	
	cursor:pointer;
	text-align:center;
	padding-top:40px;width:100%;position: absolute;left:-100px;top:17px;height:320px;background-image:url({{URL::asset('').'public/images/beehive1.png' }});background-repeat:no-repeat;background-position:center;
}
.left_cell{
	padding-top:30px;
	text-align:center;
	width:100%;position: absolute;right:-100px;top:17px;height:320px;background-image:url({{URL::asset('').'public/images/beehive1.png' }});background-repeat:no-repeat;background-position:center;
}
.middle_cell{
	padding-top:30px;
	text-align:center;
	width:100%;position: absolute;top:175px;height:320px;background-repeat:no-repeat;left:0px;background-position:center;border-left:solid 1px #fff;background-image:url('{{URL::asset('').'public/images/beehive1.png' }}');
}
.hover_bee_box{
	padding-top:50px;
	cursor:pointer;
	text-align:center;
	padding-top:40px;width:100%;position: absolute;z-index:10;right:1px;top:0px;height:320px;background-image:url({{URL::asset('').'public/images/cell_filled.png' }});background-repeat:no-repeat;background-position:center;
	color:white;
	display:none;
}
.cell-img{
	max-width:165px;margin-top:30px;
	margin-right:auto;margin-left:auto;
}
.cont_div{
	max-width:60%;
	margin-right:auto;margin-left:auto;
	
}

.logo-cell{
	max-width:200px;margin-right:auto;margin-left:auto;
}
.big-cell{
	font-size:40px;
	font-weight:bold;
	font-family:"{{ trans("messages.font_bold") }}";
	color:#AFAA28;		
	text-align:center;
	width:100%;position: absolute;top:230px;height:320px;
}
.big-cell-fixed{
	font-size:25px;
	font-weight:bold;
	font-family:"{{ trans("messages.font_bold") }}";
	color:#AFAA28;		
	text-align:{{ trans("messages.text_align") }};
	width:100%;
}

.xs_div{
	display:none;
}
.fixed_cell{
	border:solid 3px #7A981E;
	padding:30px;
	position:relative;
	height:250px;
	overflow:hidden;
}
.hover_bee_table{	
	cursor:pointer;
	text-align:center;
	padding-top:40px;width:100%;position: absolute;z-index:10;
	top:0px;
	{{ trans("messages.text_align") }}:0px;
	height:244px;
	background-color:#AFAA28;
	color:white;
	display:none;
}

@media screen and (max-width: 960px) {
	.md_div{
		display:none;
	}
	.xs_div{
		display:block;
	}
	.cont_div{
		max-width:95%;
		margin-right:auto;margin-left:auto;
	}
}
</style>

@endsection

@section("content")   
<div class="container" style="min-height:500px;border-top:solid 1px #ccc;padding-top:15px;" >
	<div class="md_div">
	<div class="row" style="height:320px;margin-top:15px;">
		<div class="col-xs-6 col-md-4" style="height:200px;">
			<div class="text-center {{ trans("messages.text_align") }}_cell">
				<div class="bee_box" >1</div><span class="bee_title"> {!! trans("graph.st1_title") !!}</span><br>
				<img src="{{URL::asset('').'public/images/infograph/stage1.png' }} " class='img-responsive cell-img' >

				<div class="hover_bee_box" ><div class="cont_div" >{!! trans("graph.st1_desc") !!}</div></div>
			</div>			
		</div>	
		<div class="col-xs-6 col-md-4" style="height:200px;">
			<div class="middle_cell">
				<div class="bee_box" >7</div><span class="bee_title"> {!! trans("graph.st7_title") !!}</span><br>
				<img src="{{URL::asset('').'public/images/infograph/stage7.png' }} " class='img-responsive cell-img' >
				<div class="hover_bee_box" ><div class="cont_div" >{!! trans("graph.st7_desc") !!}</div></div>
			</div>
		</div>
		<div class="col-xs-6 col-md-4" style="height:200px;">
			<div class="{{ trans("messages.rev_text_align") }}_cell" style="background-image:none;padding-top:0px;">
				<img src="{{URL::asset('').'public/images/logo2.png' }}" class='logo-cell img-responsive' >
			</div>			
		</div>	
	</div>

	<div class="row" style="height:320px;">
		<div class="col-xs-6 col-md-4" style="height:200px;">
			<div class="text-center {{ trans("messages.text_align") }}_cell">
				<div class="bee_box" >2</div><span class="bee_title"> {!! trans("graph.st2_title") !!}</span><br>
				<img src="{{URL::asset('').'public/images/infograph/stage2.png' }} " class='img-responsive cell-img' >

				<div class="hover_bee_box" ><div class="cont_div" >{!! trans("graph.st2_desc") !!}</div></div>
			</div>
		</div>	
		<div class="col-xs-6 col-md-4" style="height:200px;">
			<div class="big-cell">{!! trans("graph.title") !!}</div>
			<div style="width:100%;position: absolute;top:175px;height:320px;background-repeat:no-repeat;left:0px;background-position:center;border-left:solid 1px #fff;">
			</div>

		</div>
		<div class="col-xs-6 col-md-4" style="height:200px;">
			<div class="{{ trans("messages.rev_text_align") }}_cell">
				<div class="bee_box" >6</div><span class="bee_title"> {!! trans("graph.st6_title") !!}</span><br>
				<img src="{{URL::asset('').'public/images/infograph/stage6.png' }} " class='img-responsive cell-img' >

				<div class="hover_bee_box" ><div class="cont_div" style="font-size:15px;" >{!! trans("graph.st6_desc") !!}	</div></div>
			</div>
		</div>	
	</div>

	<div class="row" style="height:320px;">
		<div class="col-xs-6 col-md-4" style="height:200px;">
			<div class="text-center {{ trans("messages.text_align") }}_cell">
				<div class="bee_box" >3</div><span class="bee_title"> {!! trans("graph.st3_title") !!}</span><br>
				<img src="{{URL::asset('').'public/images/infograph/stage3.png' }} " class='img-responsive cell-img' >
				<div class="hover_bee_box" ><div class="cont_div" >{!! trans("graph.st3_desc") !!}</div></div>
			</div>
		</div>	
		<div class="col-xs-6 col-md-4" style="height:200px;">
			<div class="middle_cell">
				<div class="bee_box" >4</div><span class="bee_title"> {!! trans("graph.st4_title") !!}</span><br>
				<img src="{{URL::asset('').'public/images/infograph/stage4.png' }} " class='img-responsive cell-img' >

				<div class="hover_bee_box" ><div class="cont_div" style="font-size:15px;" >{!! trans("graph.st4_desc") !!}</div></div>
			</div>
		</div>
		<div class="col-xs-6 col-md-4" style="height:200px;">
			<div class="{{ trans("messages.rev_text_align") }}_cell">
				<div class="bee_box" >5</div><span class="bee_title"> {!! trans("graph.st5_title") !!}</span><br>
				<img src="{{URL::asset('').'public/images/infograph/stage5.png' }} " class='img-responsive cell-img' >

				<div class="hover_bee_box" ><div class="cont_div" style="font-size:15px;" >{!! trans("graph.st5_desc") !!} </div></div>
			</div>
		</div>	
	</div>
	</div>

	<!-- Small Screens Content -->
	<div class="xs_div">
		<div class="row">
			<div class="col-xs-12" style="margin-top:15px;">	
				<div class="row">					
					<div class="col-xs-7" ><div class="big-cell-fixed">{!! trans("graph.title2") !!}</div></div>
					<div class="col-xs-5"><img src="{{ URL::asset('').'public/images/cell_logo.png' }}" style="max-width:100px;margin-left:0px;margin-right:auto;" class="img-responsive" ></div>
				</div>				
			</div>
			<div class="col-xs-12 col-sm-6" style="margin-top:15px;">				
				<div class="text-center fixed_cell">
					<div class="bee_box" >1</div><span class="bee_title"> {!! trans("graph.st1_title") !!}</span><br>
					<img src="{{URL::asset('').'public/images/infograph/stage1.png' }} " class='img-responsive cell-img' >

					<div class="hover_bee_table" ><div class="cont_div" >{!! trans("graph.st1_desc") !!}</div></div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6" style="margin-top:15px;">
				<div class="text-center fixed_cell">
					<div class="bee_box" >2</div><span class="bee_title"> {!! trans("graph.st21_title") !!}</span><br>
					<img src="{{URL::asset('').'public/images/infograph/stage2.png' }} " class='img-responsive cell-img' >

					<div class="hover_bee_table" ><div class="cont_div" >{!! trans("graph.st2_desc") !!}</div></div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6" style="margin-top:15px;">
			<div class="text-center fixed_cell">
					<div class="bee_box" >3</div><span class="bee_title"> {!! trans("graph.st3_title") !!}</span><br>
					<img src="{{URL::asset('').'public/images/infograph/stage3.png' }} " class='img-responsive cell-img' >

					<div class="hover_bee_table" ><div class="cont_div" >{!! trans("graph.st3_desc") !!}</div></div>
				</div>
			</div>

			<div class="col-xs-12 col-sm-6" style="margin-top:15px;">
				<div class="fixed_cell">
					<div class="bee_box" >4</div><span class="bee_title"> {!! trans("graph.st41_title") !!}</span><br>
					<img src="{{URL::asset('').'public/images/infograph/stage4.png' }} " class='img-responsive cell-img' >

					<div class="hover_bee_table" ><div class="cont_div" style="font-size:15px;" >{!! trans("graph.st4_desc") !!}</div></div>
				</div>
			</div>

			<div class="col-xs-12 col-sm-6" style="margin-top:15px;">
				<div class="fixed_cell">
					<div class="bee_box" >5</div><span class="bee_title"> {!! trans("graph.st51_title") !!}</span><br>
					<img src="{{URL::asset('').'public/images/infograph/stage5.png' }} " class='img-responsive cell-img' >

					<div class="hover_bee_table" ><div class="cont_div" style="font-size:15px;" >{!! trans("graph.st5_desc") !!}</div></div>
				</div>
			</div>

			<div class="col-xs-12 col-sm-6" style="margin-top:15px;">
				<div class="fixed_cell">
					<div class="bee_box" >6</div><span class="bee_title"> {!! trans("graph.st6_title") !!}</span><br>
					<img src="{{URL::asset('').'public/images/infograph/stage6.png' }} " class='img-responsive cell-img' >

					<div class="hover_bee_table" ><div class="cont_div" >{!! trans("graph.st6_desc") !!}</div></div>
				</div>
			</div>

			<div class="col-xs-12 col-sm-6" style="margin-top:15px;">
				<div class="fixed_cell">
					<div class="bee_box" >7</div><span class="bee_title"> {!! trans("graph.st7_title") !!}</span><br>
					<img src="{{URL::asset('').'public/images/infograph/stage7.png' }} " class='img-responsive cell-img' >

					<div class="hover_bee_table" ><div class="cont_div" >{!! trans("graph.st7_desc") !!}</div></div>
				</div>
			</div>

		</div>
	</div>


	<div class="row" style="height:80px;">
	<div class="col-xs-12"></div>
	</div>



	<div class="row" style="height:115px;">
		<div class="col-xs-12"></div>
	</div>
</div>
@endsection

@section("footer_js")
<script type="text/javascript">
$(document).ready(function(){
	
	$(".{{ trans("messages.text_align") }}_cell, .{{ trans("messages.rev_text_align") }}_cell, .middle_cell, .fixed_cell").stop().hover(function(){
		$(this).find(".hover_bee_box").stop().fadeIn("slow");
	},function(){
		$(this).find(".hover_bee_box").stop().fadeOut("fast");
	});

	$(".fixed_cell").stop().hover(function(){
		$(this).find(".hover_bee_table").stop().fadeIn("slow");
	},function(){
		$(this).find(".hover_bee_table").stop().fadeOut("fast");
	});
});
</script>

@endsection
