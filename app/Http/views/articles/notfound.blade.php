@extends("layout.main")

@section("head")
<title>{{Config("contstants.web_title")."| Not Found"}}</title>
@endsection

@section("content")   
	<div class="container" style="min-height:500px;border-top:solid 1px #ccc;padding-top:30px;" >
		<div class="row"><div class="col-xs-12 text-center" ><img src="{{ URL::asset('') }}public/images/notfound.png" style="margin-right:auto;margin-left:auto;" align="center" class="img-responsive"></div></div>
	</div>
@endsection