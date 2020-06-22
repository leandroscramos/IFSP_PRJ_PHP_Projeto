<?php 
$titulo="Intranet | HU UFSCar";
include $_SESSION["root"].'includes/header.php';
?>

<?php include $_SESSION["root"].'includes/menu.php';?>
	
	<div class="wrapper">
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
		<!-- Content Header (Page header) -->
			<!-- Main content -->
			<section class="content">				
				<div class="row">
					<img src="<?php echo $_SESSION["root"].'includes/bg.png'; ?>" width="100%"></img>
				</div> 
			</section>
		</div>		
	</div>
	<!-- /.content-wrapper -->
	<?php include $_SESSION["root"].'includes/footer.php'; ?>
</body>
</html>