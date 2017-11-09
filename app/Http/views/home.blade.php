@extends("layout.main")

@section("head")
<title>{{trans("messages.title")}}</title>
@endsection

@section("content")   

    <div id="slideshow-sec">
        <div id="carousel-div" class="carousel slide" data-ride="carousel" >                   
            <div class="carousel-inner">
                <?php $i =0;
                foreach($data["slider"] as $page){                                              
                    $active=" active"; 
                    if($i !=0) $active = "";
                    $title = $page->p_title;
                    if($page->p_url !="") $title = "<a href='".$page->p_url."' >".$title."</a>";
                    ?>
                    <div class="item<?php echo $active; ?>">
                        <img src="{{ URL::asset('').processPath($page->p_thumb) }}" alt="" />
                        <div class="carousel-caption">
                        <h1 class="wow slideInLeft" data-wow-duration="2s" > <?php echo $title; ?></h1>      
                        <h2 class="wow slideInRight" data-wow-duration="2s" ><?php echo $page->p_subtitle; ?><br><br>
                            <a class="btn btn-default btn-lg" href="{{ URL::asset(\Session::get('locale').'/Form') }}" >{{ trans("messages.apply_now") }}</a>
                        </h2>  
                        </div>                           
                    </div>
                <?php 
                    $i++; 
                }
                ?>                       
            </div>            
        </div>
    </div>
    <!-- SLIDESHOW SECTION END-->
    <div class="container">
        <div class="row">
            <div class="text-center about_text">
                <?php
                if(isset($data["services_det"])){
                    echo $data["services_det"]['c_'.\Session("prefix").'description'];
                }
                ?>                
            </div>
            
            <div class="col-xs-12">
            <?php 
            if(Session::get("locale_id")=="2"){
            ?>
            <div id="bxslider1">
              <h1 style="margin-right: 17px;" class="title1"><a href="{{ genLink('Category',9,'') }}" ><?php echo $data["services_det"]['c_'.\Session("prefix").'name']; ?> </a></h1>
                <ul class="bxslider">
                    <?php 
                    $i =0;
                    if(isset($data["services"])){
                        foreach($data["services"] as $page){                                                
                            $active=" active"; 
                            if($i !=0) $active = "";
                            $thumb = "";
                            if($page->p_thumb !="") $thumb = URL::asset('').processPath($page->p_thumb);
                            ?>
                             <li class="slide" id="item<?php echo ($i+1); ?>"><img src="<?php echo $thumb; ?>" title="{{ $page->p_title }} <div class='read_more' data-id='<?php echo $page->p_id; ?>' data-title='<?php echo filterTitle($page->p_title); ?>'>{{trans("messages.read_more")}}</div>" /></li>
                        <?php 
                            $i++; 
                        }
                    }
                    
                    ?>
                
                </ul>
            </div>
            <?php
            }
            else{
            ?>
            <div style="direction:rtl;">
                <h1 style="margin-right: 17px;" class="title1"><a href="{{ genLink('Category',9,'') }}" ><?php echo $data["services_det"]['c_'.\Session("prefix").'name']; ?></a></h1>
                <div class="slider1">                    
                    <?php 
                    $i =0;
                    if(isset($data["services"])){
                        foreach($data["services"] as $page){                                                
                            $active=" active"; 
                            if($i !=0) $active = "";
                            $thumb = "";
                            if($page->p_thumb !="") $thumb = URL::asset('').processPath($page->p_thumb);
                            ?>
                             <div class="slide" id="item<?php echo ($i+1);?>"><img src="<?php echo $thumb; ?>"><a href='{{ genLink('Article',$page->p_id,$page->p_title) }}' class='readmore'>{{trans("messages.read_more")}}</a>
                                <div class="caption_cont">
                                        <div class="caption_txt" ><?php echo filterTitle($page->p_title); ?></div>
                                        <div class="read_more" data-id="<?php echo $page->p_id; ?>" data-title="<?php echo filterTitle($page->p_title); ?>" >اقرأ المزيد</div>
                                </div>
                             </div>
                            <?php 
                            $i++; 
                        }
                    }                    
                    ?>                   
                </div>
            </div>
            <?php
            }
            ?>
            </div>
        </div>
    </div>
    <Br>
    
    <!-- BELOW SLIDESHOW SECTION END-->
     
     <!-- TAG HOME SECTION END-->
   
            <div class="container">
             
        <div class="row pad-set">
            
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <h1 class="title1"><a href="{{ genLink('Category',10,'') }}" >{{trans('messages.video')}}</a></h1>
                <div class="video_area">
                <br />
                <?php
                if(isset($data["video"]) && count($data["video"])>0){
                    
                    //$video = get_object_vars($data["video"]);
                    echo  $data["video"][0]["f_source"];
                    //echo $data["video"]['f_source'];
                }
                ?>
                <!--<iframe class="vedio-style" width="100%" height="215" src="https://www.youtube.com/embed/0yof2ixOFsY" frameborder="0" allowfullscreen></iframe>-->
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <div class="">
                    <h1 class="title1"><a href="{{ genLink("Category",6,trans('messages.projects')) }}" ><?php echo $data["projects_cat"]['c_'.\Session("prefix").'name']; ?></a></h1>
                   
                <div class="row">
                    <?php 
                    $i =0;
                    if(isset($data["projects"])){
                        foreach($data["projects"] as $page){                                                
                            $active=" active"; 
                            if($i !=0) $active = "";
                            ?>
                            <div class="col-md-6" >
                                <div class="row">
                                    <?php if($page->p_thumb !="") { ?><div class="col-md-4">
                                        <a href="{{ genLink('Article',$page->p_id,$page->p_title) }}"><img class="img-responsive" src="{{ URL::asset('').processPath($page->p_thumb) }}" /></a>
                                    </div>
                                    <?php 
                                    }
                                    ?>
                                    <div class="col-md-8" style="margin-top:15px;">
                                        <div class="title2"><?php echo "<a href='".genLink('Article',$page->p_id,$page->p_title)."' class='title2' >".$page->p_title."</a>"; ?></div>
                                        <div class="border"></div>
                                        <div class="description">{{ $page->p_summary }}</div>
                                    </div>
                                </div>
                            </div>
                        <?php 
                            $i++; 
                        }
                    }                   
                    ?>
                   
                </div>
                </div>
                
            </div>
            </div>
          </div>      
  
        <section class="experts">
            <div class="container">                
                <div class="expertsbody" style="padding-top:0px;">
                    <!--<div class="text-center main-header" ><h1>{{trans("messages.adv_long")}}</h1></div><br>-->
                        <?php
                        /*if(isset($data["adv"]) && count($data["adv"])>0){
                            echo $data["adv"][0]['p_body'];
                        } */                      
                        ?>
                    <ul class="bxslider2">
                    <?php 
                    $i =0;
                    if(isset($data["experts"])){
                        foreach($data["experts"] as $page){                                             
                            $active=" active"; 
                            if($i !=0) $active = "";
                            ?>
                            <li style="text-align:center;overflow:hidden;height:250px;" class="text-center"><img src="{{ URL::asset('').processPath($page->p_thumb) }}" title="" style="margin-right:auto;margin-left:auto;width:120%" /></li>
                        <?php 
                        /*<div>{{ $page->p_title }}</div> <div> {{$page->p_subtitle}} </div><div><a href='{{ $page->p_url }}' target='_blank' class='#'><i class='fa fa-facebook' aria-hidden='true'></i></a><a href='{{ $page->p_url }}' target='_blank' class='#'><i class='fa fa-twitter' aria-hidden='true'></i></a></div>*/
                            $i++; 
                        }
                    }                   
                    ?>                   
                    </ul>
                    
                </div>
            </div>
        </section>
     <!--JUST SECTION END-->
     <div class="container " >
             <div class="row ">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!--<hr />-->
               
                <!--
                 <div class="flexslider carousel" >
                    <ul class="slides">            
                    <?php 
                    $i =0;
                    if(isset($data["partners"])){                        
                        foreach($data["partners"] as $page){  
                            //$page = get_object_vars($page);                            
                            ?>
                            <li><a href="<?php echo $page['p_url'] ?>" target="_blank" ><img src="{{ URL::asset(''.processPath($page['p_thumb'])) }}" /></a></li>
                            <?php 
                            $i++; 
                        }
                    }                   
                    ?>
                    </ul>
                    </div>
                <hr />
                
                -->
                <h1 class="title1"><?php echo $data["partners_cat"]['c_'.\Session("prefix").'name']; ?></h1>
                <?php 
                $i = 0;
                if(isset($data["partners"])){                        
                    foreach($data["partners"] as $page){
                        //$page = get_object_vars($page);                            
                        ?>
                        <div class='col-xs-4'><a href="<?php echo $page['p_url'] ?>" target="_blank" ><img src="{{ URL::asset(''.processPath($page['p_thumb'])) }}" class="img-responsive" style="margin-right:auto;margin-left:auto;max-width:60%;" /></a></div>
                        <?php 
                        $i++; 
                    }
                }                   
                ?>
                </div>
            </div>
         </div>
@endsection

@section("footer_js")

<!-- Modal -->
<div id="services" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <!-- Body is here -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

 <!--FLEXSLIDER SCRIPTS PLUGIN-->
<script src="{{ URL::asset('') }}public/assets/js/jquery.flexslider.js"></script>
<script src="{{ URL::asset('') }}public/assets/js/jquery.<?php echo Session::get("prefix"); ?>bxslider.js"></script>
 <!--CUSTOM SCRIPTS -->
<script src="{{ URL::asset('') }}public/assets/js/custom.js"></script>

<script type="text/javascript" >
    /*$(document).ready(function(){
    $('.bxslider').bxSlider({
        captions: true,
        minSlides: 1,
        maxSlides: 4,
        slideWidth: 266,
        slideMargin: 20,
        pager:false
    });*/
    $(document).ready(function(){
        $(".slider1 .slide").stop().hover(function(){
            $(this).find(".caption_cont").stop().fadeIn("fast");
        },function(){
            $(this).find(".caption_cont").stop().fadeOut("fast");      
        });

        $(".read_more").click(function(){
            var id = $(this).data("id");
            var title = $(this).data("title");

            $.ajax({url: "{{ URL::asset('Ajax/Service') }}"+"/"+id, success: function(result){
                //$("#div1").html(result);
                $("#services").find(".modal-body").html(result);
                $("#services").find(".modal-title").html(title);
            }});
            $('#services').modal('show');
        });

        $('#services').on('hidden.bs.modal', function () {
          // do something…
            $("#services").find(".modal-body").html("");
            $("#services").find(".modal-title").html("");
        })
    });
</script>
@endsection