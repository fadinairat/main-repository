<!--CORE SCRIPTS PLUGIN-->
<script src="{{ URL::asset('') }}public/assets/js/jquery-1.11.1.min.js"></script>
 <!--BOOTSTRAP SCRIPTS PLUGIN-->
<script src="{{ URL::asset('') }}public/assets/js/bootstrap.js"></script>
 <!--WOW SCRIPTS PLUGIN-->
<script src="{{ URL::asset('') }}public/assets/js/wow.js"></script>


<script type="text/javascript" >

$(document).ready(function (){
	
	$('.dropdown').stop().hover(function(){		

		$('#td' + this.id).show();				
	}, function (){
		$('#td' + this.id).hide();
	});

	
	
});

</script>