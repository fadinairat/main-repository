<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
<!-- BOOTSTRAP CORE STYLE  -->
<link href="{{ URL::asset('') }}public/assets/css/bootstrap.css" rel="stylesheet" />
<link href="<?php if(\Session::get("locale_id","1")=="1") echo URL::asset('').trans("assets.rtl_bootstrap"); ?>" rel="stylesheet" />
<!-- FONT AWESOME STYLE  -->
<link href="{{ URL::asset('') }}public/assets/css/font-awesome.css" rel="stylesheet" />
<!-- ANIMATE STYLE  -->
<link href="{{ URL::asset('') }}public/assets/css/animate.css" rel="stylesheet" />
<!-- FLEXSLIDER STYLE  -->
<link href="{{ URL::asset('') }}public/assets/css/flexslider.css" rel="stylesheet" />
<link href="{{ URL::asset('') }}public/assets/css/jquery.<?php echo \Session::get("prefix"); ?>bxslider.css" rel="stylesheet" />
<!-- CUSTOM STYLE  -->
<link href="{{ URL::asset('') }}public/assets/css/main_style.css" rel="stylesheet" />
<link href="{{ URL::asset("public/assets/css/".\Session::get("prefix")."style.css")}}" rel="stylesheet" />
<!-- GOOGLE FONTS  -->
<link href="https://fonts.googleapis.com/css?family=Cairo:400,700,900|Changa" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css' />
<link rel='shortcut icon' type='image/x-icon' href='{{URL::asset('public')}}/favicon.ico' />
