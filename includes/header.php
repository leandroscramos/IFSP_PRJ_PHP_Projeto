<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<meta charset="utf-8">
		<title><?php echo $_SESSION["title"];?></title>
			
		<!-- CSS -->
		<!-- Tell the browser to be responsive to screen width -->
	  	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	  	<!-- Bootstrap 3.3.7 -->
	  	<link rel="stylesheet" href="includes/AdminLTE-2.4.2/bower_components/bootstrap/dist/css/bootstrap.min.css">
	  	<!-- Font Awesome -->
	  	<!--<link rel="stylesheet" href="includes/AdminLTE-2.4.2/bower_components/font-awesome/css/font-awesome.min.css">-->
	  	<link rel="stylesheet" href="includes/Fontawesome-5.13.0/css/all.css">

	  	<!-- Ionicons -->
	  	<link rel="stylesheet" href="includes/AdminLTE-2.4.2/bower_components/Ionicons/css/ionicons.min.css">
	  	<!-- Theme style -->
	  	<link rel="stylesheet" href="includes/AdminLTE-2.4.2/dist/css/AdminLTE.min.css">
	  	<!-- AdminLTE Skins. Choose a skin from the css/skins
	       folder instead of downloading all of them to reduce the load. -->
	  	<link rel="stylesheet" href="includes/AdminLTE-2.4.2/dist/css/skins/_all-skins.min.css">

		<!-- DataTables  -->		
		<link rel="stylesheet" href="includes/Datatables/dataTables.bootstrap.css">

	  	<!-- JS -->
	  	<!-- jQuery 3 -->
		<script src="includes/AdminLTE-2.4.2/bower_components/jquery/dist/jquery.min.js"></script>
		<!-- jQuery UI 1.11.4 -->
		<script src="includes/AdminLTE-2.4.2/bower_components/jquery-ui/jquery-ui.min.js"></script>
		<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
		<script>
		  $.widget.bridge('uibutton', $.ui.button);
		</script>
		<!-- Bootstrap 3.3.7 -->
		<script src="includes/AdminLTE-2.4.2/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<!-- AdminLTE App -->
		<script src="includes/AdminLTE-2.4.2/dist/js/adminlte.min.js"></script>

		<!-- DataTables -->		
		<script src="includes/Datatables/jquery.dataTables.min.js"></script>
		<script src="includes/Datatables/dataTables.bootstrap.min.js"></script>		

		<?php //Util::debug($_SESSION); ?>				

	</head>
<body class="hold-transition skin-green layout-top-nav">

