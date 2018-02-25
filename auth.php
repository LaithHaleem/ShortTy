<?php require 'core/init.php';
	  if(isset($_SESSION['user'])) {
	  	Redirect::Head('index.php');
	  }
	  IncPart::Inc('inc/parts/header');
	  IncPart::Inc('inc/parts/navbar');
?>

<?php
	  // Route Include Profile Parts Content
	  Routing::Route('inc/auth', trim($_GET['a']), 'auth');

?>

<?php IncPart::Inc('inc/parts/footer'); ?>