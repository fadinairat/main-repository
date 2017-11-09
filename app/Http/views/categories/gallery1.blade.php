@extends("layout.main")

@section("head") <title>{{Config('constants.web_title')}} - {{
$data["head_title"] }}</title> <META HTTP-EQUIV="Description"
CONTENT="{{$data["meta_description"]}}"> <META HTTP-EQUIV="Keywords"
CONTENT="{{$data["meta_keywords"]}}"> <?php if(isset($data["og_image"] )) {
?><meta property="og:image" content="<?php echo $data["og_image"]; ?>"> <link
rel="image_src" type="image/<?php echo $data["og_ext"]; ?>" href="<?php echo
$data["og_image"]; ?>" /><?php } ?> @endsection

@section("content")  

<link rel="stylesheet" type="text/css" href="{{ URL::asset('') }}public/assets/fancybox/jquery.fancybox.css" media="screen" />
<link rel="stylesheet" type="text/css" href="{{ URL::asset('') }}public/assets/fancybox/helpers/jquery.fancybox-buttons.css?v=2.0.3" />

    <div class="container" >
    <div class="row">     
      <div class="col-xs-12 col-sm-6 text-right stext" style="padding-top:0px;"><a href="{{URL::asset('')}}" class='stext'>{{trans("messages.home")}} &raquo;</a><?php echo $map; ?></div><br><Br>
    </div>
    </div>
    <?php
    if(isset($cat_details)){
        $cat_details = get_object_vars($cat_details);
    }
    ?>
    <?php if(isset($cat_details)){ ?><div class="title" style="text-align:right;"><?php echo $cat_details['c_'.\Session::get("prefix").'name']; ?></div><br><?php } ?>

    <div class="container" >
    <div class="row">
        <!--End jQuery Fancybox-->

        <div style="width:100%;" align="center">
        <?php 
          if(isset($list)){
            foreach($list as $item){
              $item = get_object_vars($item);
          ?>
          <div class="col-md-3 col-sm-4 col-xs-12" style="margin-bottom:15px;height:150px;overflow:hidden;float:right;padding-right:7px;padding-left:7px;"> <a class="fancybox-buttons" data-fancybox-group="button" href="<?php echo URL::asset('').processPath($item['f_file']); ?>" title="<?php echo $item['f_'.\Session::get("prefix").'description']?>"><img src="<?php echo URL::asset('').processPath($item['f_file']); ?>" class="img-responsive" alt=""></a></div>
          <?php
          }//foreach
        }//if isset

        ?>
        </div>
    </div>
    </div>
    <!-- #endregion Jssor Slider End -->
@endsection

@section("footer_js")
    <!--Begin jQuery Fancybox-->
<script type="text/javascript" src="{{ URL::asset('') }}public/assets/fancybox/jquery.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('') }}public/assets/fancybox/jquery.mousewheel-3.0.6.pack.js"></script>
<script type="text/javascript" src="{{ URL::asset('') }}public/assets/fancybox/jquery.fancybox.js"></script>
<script type="text/javascript" src="{{ URL::asset('') }}public/assets/fancybox/helpers/jquery.fancybox-buttons.js?v=2.0.3"></script>

<script type="text/javascript">
$(document).ready(function() {
  $('.fancybox-buttons').fancybox({
    openEffect  : 'none',
    closeEffect : 'none',
    prevEffect : 'none',
    nextEffect : 'none',
    closeBtn  : false,
    helpers : {
      title : {
        type : 'inside'
      },
      buttons : {}
    },
    afterLoad : function() {
      //this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
      this.title = this.title;
    }
  });     
});
</script>

@endsection
