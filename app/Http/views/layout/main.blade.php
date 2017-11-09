<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
@include("partials._head")
@yield("head")

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-100353021-1', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body>
    @include("partials._nav")

    <!-- Page Content -->
    <div class="container-fluid" style="padding:0px;">

        @yield("content")
        <hr>
        @include ("partials._footer")

    </div>
    <!-- /.container -->

@include("partials._javascript")
@yield("footer_js")
</body>
</html>
