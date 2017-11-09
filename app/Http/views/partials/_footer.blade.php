<div class="footer-sec">
    <div class="container">
    <div class="row">
        <div class="col-sm-3 col-xs-12">
		<h3> {{trans('messages.who_we_are')}} </h3>
		<p style="padding-right:30px;font-size:0.8em" >
			<?php
			
			if(\Session::get("locale_id") == "2"){
				$whous = App\Http\Models\Pages::getPage(53);
				$contactus = App\Http\Models\Pages::getPage(52);	
				$usefullinks = App\Http\Models\Pages::getPage(51);		
			} 
			else{
				$whous = App\Http\Models\Pages::getPage(17);
				$contactus = App\Http\Models\Pages::getPage(25);	
				$usefullinks = App\Http\Models\Pages::getPage(26);	
			}
			
			if(isset($whous)){
				$page = $whous[0];
				echo "<div style='font-size:16px;' >".$page->p_summary."</div>";
			}
			?>
		</p>
        </div>
        <div class="col-sm-3 col-xs-12 social-div {{trans('layout.text_align')}}">
          
		<h3> {{trans('messages.useful_links')}} </h3>
            <span class="links">
            	<?php 
	           	if(isset($usefullinks)){
	           		$page = $usefullinks[0];
	           		echo filterBody($page->p_summary);
	           	}
           		?>
           		<!--
				<li><h4><a href="#" >رابط </a></h4></li>
				<li><h4><a href="#" >رابط </a></h4></li>
				<li><h4><a href="#" >رابط </a></h4></li>
				-->
			</span>		
        </div>
        <div class="col-sm-3 col-xs-12 footercontact">
        <h3> {{trans('messages.contact_us')}} </h3>
           	<?php 
           	if(isset($contactus)){
           		$page = $contactus[0];
           		echo filterBody($page->p_body);
           	}
			?>
        </div>

        <!--############### Calendar of Events ################# -->
        <div class="col-sm-3 col-xs-12" >
        	@include ("partials._calendar")
        </div>
        <!-- #### end of events -->
    </div>
	<div class="row">
	        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	            <hr />
	            <div class="col-xs-6" style="text-align:{{trans("layout.float")}};padding:5px;font-size:0.6em">
	                <a href="http://www.intertech.ps/" style="color:#fff;" target="_blank" >{{Lang::get('messages.intertech')}}</a>
	            </div>
	            <div class="col-xs-6 text-{{trans("layout.float_rev")}}" style="font-size:0.6em" >
	            	{{Lang::get('messages.rights_reserved')}}  
	            </div>
	        </div>
	</div>
	</div>
</div>
<!--FOOTER SECTION END-->
<!-- WE PUT SCRIPTS AT THE END TO LOAD PAGE FASTER-->