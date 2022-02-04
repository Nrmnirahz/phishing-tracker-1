<?php
function alert($value) { 
$_SESSION['message'] = $value;
}

if (isset($_SESSION['message'])) { ?>
	<div class="container">
		<div class="alert alert-light alert-dismissible fade show" role="alert">
			<?php echo $_SESSION['message']; ?>
			<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
		</div>
	</div>
<?php } 
	unset($_SESSION['message']);
?>


