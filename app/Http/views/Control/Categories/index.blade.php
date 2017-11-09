@extends("Control.Layout.main")


@section("head")
<title>{{trans("messages.title")}}</title>
@endsection

@section("content")  
<!--BEGIN TITLE & BREADCRUMB PAGE-->
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">
            Index1</div>
    </div>
    <ol class="breadcrumb page-breadcrumb pull-right">
        <li><i class="fa fa-home"></i>&nbsp;<a href="/Control/">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li class="hidden"><a href="#">Index1</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li class="active">Index1</li>
    </ol>
    <div class="clearfix">
    </div>
</div>
<!--END TITLE & BREADCRUMB PAGE-->

<div class="page-content editor-label">
    <div class="page-content">
        
    </div>
</div>


@endsection
