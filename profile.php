<?php require 'core/init.php';
	  IncPart::Inc('inc/parts/header');
	  IncPart::Inc('inc/parts/navbar');
?>

<?php
	  // Route Include Profile Parts Content
	  Routing::Route('inc/prof', trim($_GET['p']), 'profile');

?>

<?php IncPart::Inc('inc/parts/footer'); ?>