<!DOCTYPE html>
<?php
include_once '../../includes/config.php';
if(array_key_exists("uu_uname",$_SESSION) && array_key_exists("uu_id",$_SESSION)){
?>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>elFinder 2.0</title>

		<!-- jQuery and jQuery UI (REQUIRED) -->
		<link rel="stylesheet" type="text/css" media="screen" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/smoothness/jquery-ui.css">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
		<link href='http://fonts.googleapis.com/css?family=Andika' rel='stylesheet' type='text/css'>
		<!-- elFinder CSS (REQUIRED) -->
		<link rel="stylesheet" type="text/css" media="screen" href="css/elfinder.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="css/theme.css">
		<!-- elFinder JS (REQUIRED) -->
		<script type="text/javascript" src="js/elfinder.min.js"></script>
		<!-- elFinder translation (OPTIONAL) -->
		<script type="text/javascript" src="js/i18n/elfinder.ru.js"></script>
		<!-- elFinder initialization (REQUIRED) -->
		<script type="text/javascript" charset="utf-8">
			// Helper function to get parameters from the query string.
			function getUrlParam(paramName) {
				var reParam = new RegExp('(?:[\?&]|&amp;)' + paramName + '=([^&]+)', 'i') ;				
				var match = window.location.search.match(reParam);
				return (match && match.length > 1) ? match[1] : '' ;
			}

			$().ready(function() {
				var funcNum = getUrlParam('CKEditorFuncNum');
				var elf = $('#elfinder').elfinder({
					url : 'php/connector.php',
					getFileCallback : function(file) {
						window.opener.CKEDITOR.tools.callFunction(funcNum, file);
						window.close();
					},
					resizable: false
				}).elfinder('instance');
			});
		</script>
		<style>
		body{font-family:'Andika',verdana}
		</style>
	</head>
	<body>

		<!-- Element where elFinder will be created (REQUIRED) -->
		<div id="elfinder"></div>

	</body>
</html>
<?php
}
else header("location:../../index.php");
?>
