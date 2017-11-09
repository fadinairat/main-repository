@extends("layout.main")

@section("head")
<title>{{Config('constants.web_title')}} - {{ $data["head_title"] }}</title>
<META HTTP-EQUIV="Description" CONTENT="{{ $data["meta_description"] }}">
<META HTTP-EQUIV="Keywords" CONTENT="{{ $data["meta_keywords"] }}">

<link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" rel="stylesheet" type="text/css">
	<style type="text/css">
		
		h1 {
			font-family: 'Yanone Kaffeesatz', sans-serif;
			text-align: center;
			font-size: 77px;
			text-shadow: 0 0px 30px rgba(0, 0, 0, 0.2);
		}
		h2 {
			font-family: 'Yanone Kaffeesatz', sans-serif;
			font-size:30px;
			text-shadow: 0 0px 20px rgba(0, 0, 0, 0.3);
			color:#fff;
		}
		.monthly {
			box-shadow: 0 13px 40px rgba(0, 0, 0, 0.5);
			font-size: 0.8em;
		}

		input[type="text"] {
			padding: 15px;
			border-radius: 2px;
			font-size: 16px;
			outline: none;
			border: 2px solid rgba(255, 255, 255, 0.5);
			background: rgba(63, 78, 100, 0.27);
			color: #fff;
			width: 250px;
			box-sizing: border-box;
			font-family: "Trebuchet MS", Helvetica, sans-serif;
		}
		input[type="text"]:hover {
			border: 2px solid rgba(255, 255, 255, 0.7);
		}
		input[type="text"]:focus {
			border: 2px solid rgba(255, 255, 255, 1);
			background:#eee;
			color:#222;
		}

		.button {
			display: inline-block;
			padding: 15px 25px;
			margin: 25px 0 75px 0;
			border-radius: 3px;
			color: #fff;
			background: #000;
			letter-spacing: .4em;
			text-decoration: none;
			font-size: 13px;
		}
		.button:hover {
			background: #3b587a;
		}
		.desc {
			max-width: 250px;
			text-align: left;
			font-size:14px;
			padding-top:30px;
			line-height: 1.4em;
		}
		.resize {
			background: #222;
			display: inline-block;
			padding: 6px 15px;
			border-radius: 22px;
			font-size: 13px;
		}
		@media (max-height: 700px) {
			.sticky {
				position: relative;
			}
		}
		@media (max-width: 600px) {
			.resize {
				display: none;
			}
		}
	</style>
	<link rel="stylesheet" href="{{ URL::asset('') }}public/assets/css/{{ \Session::get('prefix') }}monthly.css">
@endsection

@section("content")   
	<div class="container" style="min-height:500px;border-top:solid 1px #ccc;padding-top:15px;" >
		<div class="page text-center">
			<div class="title" >{{ $data["title"] }}</div><br><Br>
			
			<div style="width:100%; max-width:600px; display:inline-block;">
				<div class="monthly" id="mycalendar"></div>
			</div>
			<br><br>
			
		</div>
	</div>
@endsection

@section("footer_js")
<script type="text/javascript" src="{{ URL::asset('') }}public/assets/js/{{ \Session::get('prefix') }}monthly.js"></script>
<script type="text/javascript">
	$(window).load( function() {

		$('#mycalendar').monthly({
			mode: 'event',
			//jsonUrl: 'events.json',
			//dataType: 'json'
			xmlUrl: '{{ URL::asset('') }}public/<?php echo \Session("prefix"); ?>calendar.xml'
		});

		$('#mycalendar2').monthly({
			mode: 'picker',
			target: '#mytarget',
			setWidth: '250px',
			startHidden: true,
			showTrigger: '#mytarget',
			stylePast: true,
			disablePast: true
		});

		switch(window.location.protocol){
			case 'http:':
			case 'https:':
			// running on a server, should be good.
			break;
			case 'file:':
				alert('Just a heads-up, events will not work when run locally.');
		}

	});
</script>

@endsection