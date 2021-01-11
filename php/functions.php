<?php ob_start() ?>
	
<?php 
	// Redirects to another page 
	function redirect_to($new_location) {
		header("Location: " . $new_location);
		exit;
	}

 ?>
<?php ob_end_flush(); ?>

