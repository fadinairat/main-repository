@extends("layout.main")

@section("content")   
    <div id="slideshow-sec">
        <div id="carousel-div" class="carousel slide" data-ride="carousel" >
                   
                    <div class="carousel-inner">
                        <div class="item active">

                            <img src="{{ URL::asset('') }}public/images/slider.png" alt="" />
                            <div class="carousel-caption">
                          <h1 class="wow slideInLeft" data-wow-duration="2s" > مركز تطوير الاعمال الزراعية</h1>      
                                 <h2 class="wow slideInRight" data-wow-duration="2s" >ندعم ونستثمر المشاريع الواعدة في قطاع الزراعة</h2>  
                            </div>
                           
                        </div>
                        <div class="item">
                            <img src="{{ URL::asset('') }}public/images/slider.png" alt="" />
                            <div class="carousel-caption">
                          <h1 class="wow slideInLeft" data-wow-duration="2s" > مركز تطوير الاعمال الزراعية</h1>      
                                 <h2 class="wow slideInRight" data-wow-duration="2s" >ندعم ونستثمر المشاريع الواعدة في قطاع الزراعة</h2>  
                            </div>
                        </div>
                        <div class="item">
                            <img src="{{ URL::asset('') }}public/images/slider.png" alt="" />
                            <div class="carousel-caption">
                          <h1 class="wow slideInLeft" data-wow-duration="2s" > مركز تطوير الاعمال الزراعية</h1>      
                                 <h2 class="wow slideInRight" data-wow-duration="2s" >ندعم ونستثمر المشاريع الواعدة في قطاع الزراعة</h2>  
                            </div>
                           
                        </div>
                    </div>
                    <!--INDICATORS-->
                     <ol class="carousel-indicators">
                        <li data-target="#carousel-div" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-div" data-slide-to="1"></li>
                        <li data-target="#carousel-div" data-slide-to="2"></li>
                    </ol>
                    <!--PREVIUS-NEXT BUTTONS-->
                     <a class="left carousel-control" href="#carousel-div" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-div" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
                </div>
    </div>
    <!-- SLIDESHOW SECTION END-->
    <div class="container">
        <div class="row">
            <div class="text1">
                نص هنا نص هنا نص هنا نص هنا نص هنا نص هنا نص هنا نص هنا نص هنا نص هنا نص هنا نص هنا نص هنا نص هنا نص هنا نص هنا نص هنا نص هنا نص هنا نص هنا نص هنا نص هنا نص هنا نص هنا 
            </div>
            
            <div id="bxslider1">
                <ul class="bxslider">
                  <li><img src="{{ URL::asset('') }}public/images/pic1.png" title="ندعم ونستثمر المشاريع الواعدة في قطاع الزراعة <a href='#' class='readmore'>إقرأ المزيد</a>" /></li>
                  <li><img src="{{ URL::asset('') }}public/images/pic2.png" /></li>
                  <li><img src="{{ URL::asset('') }}public/images/pic3.png" /></li>
                  <li><img src="{{ URL::asset('') }}public/images/pic4.png" /></li>
                  <li><img src="{{ URL::asset('') }}public/images/pic1.png" title="ندعم ونستثمر المشاريع الواعدة في قطاع الزراعة <a href='#' class='readmore'>إقرأ المزيد</a>" /></li>
                  <li><img src="{{ URL::asset('') }}public/images/pic2.png" /></li>
                  <li><img src="{{ URL::asset('') }}public/images/pic3.png" /></li>
                  <li><img src="{{ URL::asset('') }}public/images/pic4.png" /></li>
                </ul>
            </div>
        </div>
    </div>
    <Br>
    
    <!-- BELOW SLIDESHOW SECTION END-->
     
     <!-- TAG HOME SECTION END-->
   
            <div class="container">
             
        <div class="row pad-set">
            
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <h1 class="title1">فيديو</h2>
                <div class="">
                <br />
                <iframe class="vedio-style" width="100%" height="215" src="https://www.youtube.com/embed/0yof2ixOFsY" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <div class="">
                    <h1 class="title1">المشاريع</h2>
                    <br />
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4">
                                <a href="#"><img class="img-responsive" src="{{ URL::asset('') }}public/images/projectlogo1.png" /></a>
                            </div>
                            <div class="col-md-8">
                                <div class="title2">ندعم ونستثمر المشاريع الواعدة في قطاع الزراعة</div>
                                <div class="border"></div>
                                <div class="description">ندعم ونستثمر المشاريع الواعدة في قطاع الزراعةندعم ونستثمر المشاريع الواعدة في قطاع الزراعة</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4">
                                <a href="#"><img class="img-responsive" src="{{ URL::asset('') }}public/images/projectlogo2.png" /></a>
                            </div>
                            <div class="col-md-8">
                                <div class="title2">ندعم ونستثمر المشاريع الواعدة في قطاع الزراعة</div>
                                <div class="border"></div>
                                <div class="description">ندعم ونستثمر المشاريع الواعدة في قطاع الزراعةندعم ونستثمر المشاريع الواعدة في قطاع الزراعة</div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                
            </div>
            </div>
          </div>      
  
        <section class="experts">
            <div class="container">
                <div class="expertstitle">فريق الخبراء</div>
                <div class="expertsbody">
                    <ul class="bxslider2">
                    <li><img src="{{ URL::asset('') }}public/images/expert1.png" title="<div>اسم الخبير</div> <div> الوظيفة </div><div><a href='#' class='#'><i class='fa fa-facebook' aria-hidden='true'></i></a><a href='#' class='#'><i class='fa fa-twitter' aria-hidden='true'></i></a></div>" /></li>
                    <li><img src="{{ URL::asset('') }}public/images/expert2.png" title="<div>اسم الخبير</div> <div> الوظيفة </div><div><a href='#' class='#'><i class='fa fa-facebook' aria-hidden='true'></i></a><a href='#' class='#'><i class='fa fa-twitter' aria-hidden='true'></i></a></div>" /></li>
                    <li><img src="{{ URL::asset('') }}public/images/expert3.png" title="<div>اسم الخبير</div> <div> الوظيفة </div><div><a href='#' class='#'><i class='fa fa-facebook' aria-hidden='true'></i></a><a href='#' class='#'><i class='fa fa-twitter' aria-hidden='true'></i></a></div>" /></li>
                    <li><img src="{{ URL::asset('') }}public/images/expert4.png" title="<div>اسم الخبير</div> <div> الوظيفة </div><div><a href='#' class='#'><i class='fa fa-facebook' aria-hidden='true'></i></a><a href='#' class='#'><i class='fa fa-twitter' aria-hidden='true'></i></a></div>" /></li>
                    <li><img src="{{ URL::asset('') }}public/images/expert4.png" title="<div>اسم الخبير</div> <div> الوظيفة </div><div><a href='#' class='#'><i class='fa fa-facebook' aria-hidden='true'></i></a><a href='#' class='#'><i class='fa fa-twitter' aria-hidden='true'></i></a></div>" /></li>
                    </ul>
                </div>
            </div>
        </section>
     <!--JUST SECTION END-->
     <div class="container " >
             <div class="row ">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <hr />
                 <div class="flexslider carousel">
          <ul class="slides">
            <li>
                <img src="{{ URL::asset('') }}public/assets/img/client.jpg" />
                </li>
                 <li>
                <img src="{{ URL::asset('') }}public/assets/img/client.jpg" />
                </li>
               <li>
                <img src="{{ URL::asset('') }}public/assets/img/client.jpg" />
                </li>
               <li>
                <img src="{{ URL::asset('') }}public/assets/img/client.jpg" />
                </li>
            <li>
                <img src="{{ URL::asset('') }}public/assets/img/client.jpg" />
                </li>
                 <li>
                <img src="{{ URL::asset('') }}public/assets/img/client.jpg" />
                </li>
               <li>
                <img src="{{ URL::asset('') }}public/assets/img/client.jpg" />
                </li>
               <li>
                <img src="{{ URL::asset('') }}public/assets/img/client.jpg" />
                </li>
              <li>
                <img src="{{ URL::asset('') }}public/assets/img/client.jpg" />
                </li>
                 <li>
                <img src="{{ URL::asset('') }}public/assets/img/client.jpg" />
                </li>
               <li>
                <img src="{{ URL::asset('') }}public/assets/img/client.jpg" />
                </li>
               <li>
                <img src="{{ URL::asset('') }}public/assets/img/client.jpg" />
                </li>
              <li>
                <img src="{{ URL::asset('') }}public/assets/img/client.jpg" />
                </li>
                 <li>
                <img src="{{ URL::asset('') }}public/assets/img/client.jpg" />
                </li>
               <li>
                <img src="{{ URL::asset('') }}public/assets/img/client.jpg" />
                </li>
               <li>
                <img src="{{ URL::asset('') }}public/assets/img/client.jpg" />
                </li>
              <li>
                <img src="{{ URL::asset('') }}public/assets/img/client.jpg" />
                </li>
                 <li>
                <img src="{{ URL::asset('') }}public/assets/img/client.jpg" />
                </li>
               <li>
                <img src="{{ URL::asset('') }}public/assets/img/client.jpg" />
                </li>
               <li>
                <img src="{{ URL::asset('') }}public/assets/img/client.jpg" />
                </li>
          </ul>
        </div>
                <hr />
                </div>
            </div>
         </div>
@endsection